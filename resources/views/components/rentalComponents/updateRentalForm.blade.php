<form id="updateRentalForm" method="POST" enctype="multipart/form-data" action="{{route('rental.update',$rental->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" id="input_name" name="name" value="{{$rental->rental_type}}" >
        <span class="invalid-feedback fw-bold error-text name_error" role="alert"></span>
    </div>
    
    <div class="form-group">
        <label>Count</label>
        <input type="text" class="form-control" id="input_count" name="name" value="{{$rental->rental_count}}" >
        <span class="invalid-feedback fw-bold error-text name_error" role="alert"></span>
    </div>

    <div class="form-group">
        <label>Count</label>
        <input type="number" class="form-control" id="input_count" name="count" value="{{$rental->rental_count}}">
        <span class="invalid-feedback fw-bold error-text price_error" role="alert"></span>
    </div>

    <div class="form-group">
        <label>Price</label>
        <input type="number" class="form-control" id="input_price" name="price" value="{{$rental->price}}">
        <span class="invalid-feedback fw-bold error-text price_error" role="alert"></span>
    </div>

    <div class="form-group">
        <label>Description</label>
        <input type="text" class="form-control" id="input_description" name="description" value="{{$rental->description}}">
        <span class="invalid-feedback fw-bold error-text description_error" role="alert"></span>
    </div>  

    <!-- <div class="form-group">
        <label>Picture</label>
        <input type="text" class="form-control" id="input_picture" name="picture" value="{{$rental->picture}}" >
        <span class="invalid-feedback fw-bold error-text picture_error" role="alert"></span>
    </div> -->

    {{-- <div class="form-group mb-2">
        <label>image</label>
        <input type="file" class="form-control" id="input_image" name="image_path">
        <span class="invalid-feedback fw-bold error-text image_error" role="alert"></span>
    </div> --}}

    <form method="post" action="{{url('file')}}" enctype="multipart/form-data">
        @csrf

        <div id="imgInputs">
            <div class="row" id="imageInput0">
                <div class="col-9">
                    <input type="file" name="image_paths[]" class="form-control">
                </div>
                <div class="col-3">
                    <button class="btn btn-success w-100" id='addImageBtn' type="button">Add</button>
                </div>
            </div>
            
            {{-- <div class="row" id="imageInput2">
                <div class="col-8">
                    <input type="file" name="image_paths[]" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-danger removeImageInputBtn" inputContainer="imageInput2" inputContainerID=2 type="button">Remove</button>     
                </div>
            </div> --}}
            
        </div>
    </form>   

    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>