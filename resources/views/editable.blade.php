<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
    .btn:hover {
        cursor: pointer;
        
    }

    .inputs {
        margin-top: 45px;
    }

    hr {
        margin-top: 40px;
    }

    label {
        margin-right: 8px;
    }

    h3 {
        display: inline;
        margin-right: 261px;
        font-size: 20px;
    }

    .h1 {
        margin-bottom: 40px;
    }

    .inpt {
        margin-right: 200px;
    }

    .tr {
        margin-bottom: 94px;
    }

    #color {
        margin-left: 10px;
    }

    #make {
        margin-left: 20px;
    }

    .btn {
        margin-top: 77px;
        margin-left: 550px;
        background-color: black;
        color: rgb(250, 248, 248)
    }
    .h-color{
        margin-left: 60px;
    }
    .h-make{
        margin-left: 20px;
    }
    .reg{
        margin-left: 495px;
    }
    .vt{
        margin-left: 920px;
    }
    .make{
        margin-left: 470px;
    }
    .color{
        margin-left: 500px;
    }
</style>


<div class="container">
    <form action="{{ $url }}" method="post">
        @csrf
        @method('PUT')
        <div class="display">
            <div class="h1">
                <h3>Tag-id : {{ $data->tag_id }}</h3>
                <h3 id="reg">Region : {{ $data->region }}</h3>
                <h3 id="h-make">Make : {{ $data->make }}</h3>
            </div>
            <div class="h2">
                <h3>Model : {{ $data->model }}</h3>
                <h3 class="h-color">Color : {{ $data->color }}</h3>
                <h3 class="h-vt">Vehicle Type : {{ $data->vehicle_type }}</h3>
            </div>

        </div>
        <hr>
        <div class="inputs">
            <div class="tr">
                <label for="tagid">Tag-ID</label>
                <input type="text" class="inpt" name="tag" value={{ $data->tag_id }}>
                <label for="region">Region</label>
                <input type="text" class="inpt" name="region" value={{ $data->region }}>
                <label for="make">Make</label>
                <input type="text" id="make" name="make" value={{ $data->make }}>

                <p class="text-danger">
                    @error('tag')
                        {{$message}}    
                    @enderror
                </p>
                <span class="text-danger reg">
                    @error('region')
                        {{$message}}    
                    @enderror
                </span> 
                <span class="text-danger make">
                    @error('make')
                        {{$message}}    
                    @enderror
                </span> 
            </div>
            <div class="mm">
                <label for="model">Model</label>
                <input type="text"class="inpt" name="model" value={{ $data->model }}>
                <label for="color">Color</label>
                <input type="text"class="inpt" id="color" name="color" value={{ $data->color }}>
                <label for="Vehicle Type" id="lbl_v">Vehicle Type</label>
                <input type="text" id="vehicle" name="vt" value={{ $data->vehicle_type }}>
                <p class="text-danger">
                    @error('model')
                        {{$message}}    
                    @enderror
                </p>
                <span class="text-danger color">
                    @error('color')
                        {{$message}}    
                    @enderror
                </span>
                <span class="text-danger vt">
                    @error('vt')
                        {{$message}}    
                    @enderror
                </span>
            </div>
            <input type="submit" value="UPDATE" class="btn btn-dark">
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
