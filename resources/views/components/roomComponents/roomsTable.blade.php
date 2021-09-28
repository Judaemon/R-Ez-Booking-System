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
                <a href="" class="btn btn-info updateButton" style='width: 100px; margin: 2px;'>Edit</a> 
                <form method="POST" class="deleteRoom" dataId="{{$room->id}}" action="{{route('room.destroy',$room->id)}}">
                    @csrf 
                    @method('DELETE')
                    <button class="btn btn-danger" style="width: 100px; margin: 2px;" type="submit">Delete</button>
            </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
