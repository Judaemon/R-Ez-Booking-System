<table class="table">
    <thead>
        <tr>
        <th class="col-md-2" scope="col">ID</th>
        <th class="col-md-2" scope="col">Name</th>
        <th class="col-md-2" scope="col">Description</th>
        <th class="col-md-2" scope="col">Price</th>
        <th class="col-md-2" scope="col">Picture</th>
        <th class="col-md-2" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rooms as $room)
        <tr>
            <td>{{$room->id}}</td>
            <td>{{$room->name}}</td>
            <td>{{$room->description}}</td>
            <td>{{$room->price}}</td>
            <td>{{$room->picture}}</td>
            <td>
                {{-- <a id="editRoomButton" class="btn btn-info" style='width: 100px; margin: 2px;'>Edit</a> --}}
                <button type="button" id="editBtn" dataId="{{$room->id}}" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editRoomModal" style="width: 100px; margin: 2px;">
                    Edit
                </button>
                <form method="POST" class="deleteRoom" dataId="{{$room->id}}" action="{{route('room.destroy',$room->id)}}">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="width: 100px; margin: 2px;" >Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
