<form id="updateRentalForm" method="POST" enctype="multipart/form-data" action="{{route('rental.update',$rental->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group mb-2">
        <label>Type</label>
        <input type="text" class="form-control" id="input_rental_type" name="rental_type" value="{{$rental->rental_type}}" >
        <span class="invalid-feedback fw-bold error-text rental_type_error" role="alert"></span>
    </div>

    <div class="form-group mb-2">
        <label>Count</label>
        <input type="number" class="form-control" id="input_rental_count" name="rental_count" value="{{$rental->rental_count}}">
        <span class="invalid-feedback fw-bold error-text rental_count_error" role="alert"></span>
    </div>

    <div class="form-group mb-2">
        <label>Price</label>
        <input type="number" class="form-control" id="input_price" name="price" value="{{$rental->price}}">
        <span class="invalid-feedback fw-bold error-text price_error" role="alert"></span>
    </div>

    <div class="form-group mb-2">
        <label>Description</label>
        <input type="text" class="form-control" id="input_description" name="description" value="{{$rental->description}}">
        <span class="invalid-feedback fw-bold error-text description_error" role="alert"></span>
    </div>  

    <div class="form-group mb-2 mb-2">
        <label>Images</label>
        <span class="invalid-feedback fw-bold error-text image_paths_error" role="alert"></span>
        <div id="imgInputs" class="row">
            {{-- add image --}}
            <div class="col-4 my-2" id="addImageAfterLol">
                <img class="card-img-top" src="{{asset('/img/upload-image.png') }}" alt="upload image">
                <div class="d-flex align-items-end">
                    <button class="btn btn-success w-100 addImageBtn" rental_type={{$rental->id}} imageCounter="{{count(json_decode($rental->image_paths))-1}}" id="addImageBtn{{$rental->id}}" type="button">add</button>
                </div>
            </div>

            {{-- saved imge --}}
            @foreach (json_decode($rental->image_paths) as $image_path)
                <div class="col-4 my-2" id="{{$rental->id}}Image{{ $loop->index }}">
                    <img class="card-img-top" src="{{asset('/img/'.$image_path) }}" alt="{{$rental->rental_type}}">
                    <div class="">
                        <input hidden type="text" value="{{$image_path}}" name="image_paths_original[]" class="form-control">
                        <button class="btn btn-danger w-100 removeImageBtn" ImageContainer="{{$rental->id}}Image{{ $loop->index }}" addImageBtnId="addImageBtn{{$rental->id}}" type="button">remove</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="float-end">  
        <button type="button" class="btn btn-secondary border-2 border-primary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary border-2 border-primary ml-2">Save changes</button>
    </div>
</form>