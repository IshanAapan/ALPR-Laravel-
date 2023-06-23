<?php

use App\Http\Controllers\ParkingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('layout');
});
Route::get('/practice', function () {
    return view('prac');
});
Route::get('/welcom', function () {
    return view('welcom');
});

// Route::get('/edit', function () {
//     return view('editable', ['tag_id' => 'hello', 'region' => 'item->region', 'make' => 'item->make', 'model' => 'item->model', 'color' => 'item->color', 'vehicle_type' => 'item->vehicle_type']);
// });

// Route::get('/edit', function () {
//     return view('editable');
// })->name('edit');


Route::group(["prefix" => "parking"], function ($router) {
    $router->post('/scan', [ParkingController::class, "alprScan"]);
    $router->get('/image/{name}', [ParkingController::class, "getImage"]);
    $router->get('/db', [ParkingController::class, "fetch"]);
    $router->get('/editable/{id}', [ParkingController::class, "sending"])->name('edit');
    $router->put('/update/{id}', [ParkingController::class, "updating"]);

});
