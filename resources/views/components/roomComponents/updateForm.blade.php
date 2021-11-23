<form id="updateRoomForm" method="POST" enctype="multipart/form-data" action="{{route('room.update',$room->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group mb-2">
        <label>Name</label>
        <input type="text" class="form-control" id="input_room_type" name="room_type" value="{{$room->room_type}}" >
        <span class="invalid-feedback fw-bold error-text room_type_error" role="alert"></span>
    </div>

    <div class="form-group mb-2">
        <label>Count</label>
        <input type="text" class="form-control" id="input_room_count" name="room_count" value="{{$room->room_count}}">
        <span class="invalid-feedback fw-bold error-text description_error" role="alert"></span>
    </div>  

    <div class="form-group mb-2">
        <label>Description</label>
        <input type="text" class="form-control" id="input_description" name="description" value="{{$room->description}}">
        <span class="invalid-feedback fw-bold error-text description_error" role="alert"></span>
    </div>  

    <div class="form-group mb-2">
        <label>Price</label>
        <input type="number" class="form-control" id="input_price" name="price" value="{{$room->price}}">
        <span class="invalid-feedback fw-bold error-text price_error" role="alert"></span>
    </div>

    <div class="form-group mb-2">
        <label>Recommended Capacity</label>
        <input type="number" class="form-control" id="input_recommended_capacity" name="recommended_capacity" value="{{$room->recommended_capacity}}">
        <span class="invalid-feedback fw-bold error-text recommended_capacity_error" role="alert"></span>
    </div>

    <div class="form-group mb-2">
        <label>Maximum Capacity</label>
        <input type="number" class="form-control" id="input_maximum_capacity" name="maximum_capacity" value="{{$room->maximum_capacity}}">
        <span class="invalid-feedback fw-bold error-text maximum_capacity_error" role="alert"></span>
    </div>

    <!-- <div class="form-group">
        <label>Picture</label>
        <input type="text" class="form-control" id="input_picture"name="picture" value="{{$room->picture}}" >
        <span class="invalid-feedback fw-bold error-text picture_error" role="alert"></span>
    </div> -->

    <!--  <div class="form-group mb-2 mb-2">
        <label>Amenities</label>
        <span class="invalid-feedback fw-bold error-text image_paths_error" role="alert"></span>
        <div id="imgInputs" class="row">
            {{-- add image --}}
            <div class="col-4 my-2" id="addImageAfterLol">
                <div class="d-flex align-items-end">
                    <button class="btn btn-success w-100 addImageBtn" room_type={{$room->id}} imageCounter="{{count(json_decode($room->image_paths))-1}}" id="addImageBtn{{$room->id}}" type="button">add</button>
                </div>
            </div>

            {{-- saved imge --}}
            @foreach (json_decode($room->amenities) as $amenitie)
                {{-- <p>
                    {{$amenitie}}
                </p> --}}
                <div class="col-4 my-2" id="{{$room->id}}Image{{ $loop->index }}">
                    <div class="">
                        <select class="form-select" id="input_amenities[]" name="amenities[]" placeholder="Amenities">
                            <option value=""></option>
                                @foreach($amenitiesLists as $amenitiesList)
                                    <option @if ($amenitie = $amenitiesList) selected @endif>
                                        
                                        {{$amenitiesList}}
                                    </option>
                                @endforeach
                        </select>
                        <button class="btn btn-danger w-100 removeImageBtn" ImageContainer="{{$room->id}}Image{{ $loop->index }}" addImageBtnId="addImageBtn{{$room->id}}" type="button">remove</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div> -->

    <div class="form-group mb-2 mb-2">
        <label>Images</label>
        <span class="invalid-feedback fw-bold error-text image_paths_error" role="alert"></span>
        <div id="imgInputs" class="row">
            {{-- add image --}}
            <div class="col-4 my-2" id="addImageAfterLol">
                <img class="card-img-top" src="{{asset('/img/upload-image.png') }}" alt="upload image">
                <div class="d-flex align-items-end">
                    <button class="btn btn-success w-100 addImageBtn" room_type={{$room->id}} imageCounter="{{count(json_decode($room->image_paths))-1}}" id="addImageBtn{{$room->id}}" type="button">add</button>
                </div>
            </div>

            {{-- saved imge --}}
            @foreach (json_decode($room->image_paths) as $image_path)
                <div class="col-4 my-2" id="{{$room->id}}Image{{ $loop->index }}">
                    <img class="card-img-top" src="{{asset('/img/'.$image_path) }}" alt="{{$room->room_type}}">
                    <div class="">
                        <input hidden type="text" value="{{$image_path}}" name="image_paths_original[]" class="form-control">
                        <button class="btn btn-danger w-100 removeImageBtn" ImageContainer="{{$room->id}}Image{{ $loop->index }}" addImageBtnId="addImageBtn{{$room->id}}" type="button">remove</button>
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