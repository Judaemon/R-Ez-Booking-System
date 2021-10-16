<form id="updateRentalForm" method="POST" action="{{route('rental.update',$rental->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" value="{{$rental->name}}" >
    </div>

    <div class="form-group">
        <label>Description</label>
        <input type="text" class="form-control" name="description" value="{{$rental->description}}">
    </div>  

    <div class="form-group">
        <label>Price</label>
        <input type="number" class="form-control" name="price" value="{{$rental->price}}">
    </div>

    <div class="form-group">
        <label>Picture</label>
        <input type="text" class="form-control" name="picture" value="{{$rental->picture}}" >
    </div>

    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>