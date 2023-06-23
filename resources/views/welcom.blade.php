<style>
    img {
        margin: 5px;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        text-align: center;
        margin: 30px;
    }
</style>


<h1 style="text-align:center">Display Data:-</h1>
<hr>
<div class="container">
    @php
        $vehicles = DB::table('vehicles')->get();
        
    @endphp
    {{-- <img src="{{$img}}" alt="pic" width="30%"> --}}
    <table style="width:100%">
        <tr>
            <th>id</th>
            <th>tag_id</th>
            <th>tag_image</th>
            <th>region</th>
            <th>make</th>
            <th>model</th>
            <th>color</th>
            <th>vehicle_type</th>
        </tr>

        @foreach ($vehicles as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->tag_id }}</td>
                <td><img src="{{ $item->tag_image }}" alt="pics"></td>
                <td>{{ $item->region }}</td>
                <td>{{ $item->make = 'NULL' }}</td>
                <td>{{ $item->model = 'NULL' }}</td>
                <td>{{ $item->color = 'NULL' }}</td>
                <td>{{ $item->vehicle_type }}</td>
            </tr>
        @endforeach
    </table>
</div>
