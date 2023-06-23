<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .card {
        width: 400px;
        background-color: rgba(243, 252, 255, 0.749);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        margin-left: 10px;
        margin-top: 5px;
        margin-bottom: 42px;
    }

    img:hover {
        cursor: pointer;
    }

    ul {
        padding-left: 4px;
    }

    body {
        background-color: black;
    }

    li {
        font-size: 14px;
    }

    .ti {
        text-transform: uppercase;
    }

    i:hover {
        /* padding-left: 40px; */
        cursor: pointer;
    }

    i {
        color: black
    }
    button{
        width: 400px;
        height: 40px;
        border-radius: 5px;
        margin-right: 3px;
    }
</style>


{{-- @php
    $vehicles = DB::table('vehicles')->get();
    
@endphp --}}


<body>
    <div class="container">
        <div class="row">
            @foreach ($db as $item)
                <div class="col col-4">
                    <div class="card">
                        <div class="row">
                            <div class="col-5">
                                <img src="{{ $item->tag_image }}" alt="Image" class="img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="card-body">

                                    <ul id="data" style="list-style-type:disc">
                                        <li class="ti"><b><i>Tag-Id :</i></b> {{ $item->tag_id }}</li>
                                        <li class="ti"><b><i>Region :</i></b> {{ $item->region }}</li>
                                        <li><b><i>Make :</i></b> {{ $item->make }}</li>
                                        <li><b><i>Model :</i></b> {{ $item->model }}</li>
                                        <li><b><i>color :</i></b> {{ $item->color }}</li>
                                        <li><b><i>Vehicle Type :</i></b> {{ $item->vehicle_type }}</li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <a href="{{route('edit',['id'=>$item->id])}}"><button><i class="fa fa-pencil"></i></button></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>