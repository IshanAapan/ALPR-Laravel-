<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

class ParkingController extends Controller
{
    function alprScan(Request $request)
    {
        $image = $request->file('image');
        $name = time() . "." . $image->extension();
        $imagePath = $image->storeAs('vehicle-images', $name);
        $url = "http://localhost:8000/parking/image/$name";


        $response = Http::withHeaders([
            "Authorization" => "Token df454c677c34ddef5a47b8869bb79a68720b2fd6"
        ])
            ->attach(
                'upload',
                file_get_contents($image),
                'photo.jpg'
            )
            ->POST('https://api.platerecognizer.com/v1/plate-reader/', [
                'regions' => 'us-ca',
                'mmc' => true,
            ]);

        // dd($response->json());

        $resp = $response->json();
        $tag_id = $resp['results'][0]['plate'];
        $region = $resp['results'][0]['region']['code'];
        // $tag_image=$resp['filename'];
        $vehicle_type = $resp['results'][0]['vehicle']['type'];
        // $user=1;
        $data = Vehicle::create([
            // 'user_id'=>$user,
            'tag_id' => $tag_id,
            'region' => $region,
            'tag_image' => $url,
            'vehicle_type' => $vehicle_type
        ]);

        return response()->json($data, 200);
    }

    function getImage($name)
    {
        $path = Storage::path('vehicle-images/' . $name);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    function fetch()
    {
        $db = Vehicle::all();
        $data = compact('db');
        return view('layout')->with($data);
    }


    function sending($id){
        $data=Vehicle::find($id);  
        $url=url("parking/update/$id");
        return view('editable',compact('data','url'));
    }

    function updating(Request $request, $id){
        // dd($request->all());

        $request->validate(
            [
                'tag' => 'required | alpha_num',
                'region'=>'required',
                'make'=>'required',
                'model'=>'required',
                'color'=>'required',
                'vt'=>'required',
            ]
        );

        $data=Vehicle::find($id);
        $data->tag_id=$request->get('tag');
        $data->region=$request->get('region');
        $data->make=$request->get('make');
        $data->model=$request->get('model');
        $data->color=$request->get('color');
        $data->vehicle_type=$request->get('vt');
        $data->save();
        return redirect('parking/db');
    }
}
