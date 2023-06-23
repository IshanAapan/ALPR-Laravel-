<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
    .card {
        width: 400px;
        margin: 70px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    img:hover {
        cursor: pointer;
    }

    ul {
        padding-left: 2px;

    }
</style>

@php
    $vehicles = DB::table('vehicles')->get();
    
@endphp

<div class="container">
    <div class="row">
        @foreach ($vehicles as $item)
            <div class="col col-4">
                <div class="card">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ $item->tag_image }}" alt="Image" class="img-fluid">
                        </div>
                        <div class="col-6">
                            <div class="card-body">
                                
                                <span>
                                    <ul style="list-style-type:disc">
                                        <li><b><i>Tag-Id :</i></b> {{ $item->tag_id }}</li>
                                        <li><b><i>Region :</i></b> {{ $item->region }}</li>
                                        <li><b><i>Make :</i></b> {{ $item->make = 'NULL' }}</li>
                                        <li><b><i>Model :</i></b> {{ $item->model = 'NULL' }}</li>
                                        <li><b><i>color :</i></b> {{ $item->color = 'NULL' }}</li>
                                        <li><b><i>Vehicle Type :</i></b> {{ $item->vehicle_type }}</li>
                                    </ul>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
