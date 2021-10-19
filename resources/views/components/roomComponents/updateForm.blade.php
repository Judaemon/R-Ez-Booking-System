<form id="updateRoomForm" method="POST" action="{{route('room.update',$room->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" id="input_name" name="name" value="{{$room->name}}" >
        <span class="invalid-feedback fw-bold error-text name_error" role="alert"></span>
    </div>

    <div class="form-group">
        <label>Description</label>
        <input type="text" class="form-control" id="input_description"name="description" value="{{$room->description}}">
        <span class="invalid-feedback fw-bold error-text description_error" role="alert"></span>
    </div>  

    <div class="form-group">
        <label>Price</label>
        <input type="number" class="form-control" id="input_price"name="price" value="{{$room->price}}">
        <span class="invalid-feedback fw-bold error-text price_error" role="alert"></span>
    </div>

    <div class="form-group">
        <label>Recommended Capacity</label>
        <input type="number" class="form-control" id="input_recommended_capacity" name="recommended_capacity" value="{{$room->recommended_capacity}}">
        <span class="invalid-feedback fw-bold error-text recommended_capacity_error" role="alert"></span>
    </div>

    <div class="form-group">
        <label>Picture</label>
        <input type="text" class="form-control" id="input_picture"name="picture" value="{{$room->picture}}" >
        <span class="invalid-feedback fw-bold error-text picture_error" role="alert"></span>
    </div>

    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>