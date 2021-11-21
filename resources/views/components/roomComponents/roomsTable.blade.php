<table id="roomTable" class="table table-tripped table-hover table-light">
    <thead class="table-dark text-center">
        <tr>
        <th class="col-md-2" scope="col">ID</th>
        <th class="col-md-2" scope="col">Name</th>
        <th class="col-md-2" scope="col">Description</th>
        <th class="col-md-2" scope="col">Price</th>
        <th class="col-md-2" scope="col">Recommended Capacity</th>
        <th class="col-md-2" scope="col">Image</th>
        <th class="col-md-2" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rooms as $room)
        <tr>
            <td>{{$room->id}}</td>
            <td>{{$room->room_type}}</td>
            <td>{{$room->room_count}}</td>
            <td>{{$room->price}}</td>
            <td>{{$room->recommended_capacity}}</td>
            <td> 
            {{-- <img 
                src="{{ asset('img/' . $room->image_path) }}"
                alt="wow" height="200" width="200"> --}}
            </td>
            <td>
            <div class='d-flex justify-content-around'>
                    <form method="POST" class="deleteRoom" dataId="{{$room->id}}"
                        action="{{route('room.destroy',$room->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" style="width: 100px; margin: 2px;" type="submit">Delete</button>
                    </form>
    
                    {{-- div for copying the interaction btn and form above --}}
                    <div style="display: block; margin-top: 0em; margin-block-end: 1em;">
                        <button room_id="{{$room->id}}" type='button' class='btn btn-info mx-2 myButton' id='roomUpdateBtn' data-bs-toggle='modal'
                        data-bs-target='#updateRoomModal'>Update</button>
                    </div>
                </div>
                {{-- <a href="" class="btn btn-info updateButton" style='width: 100px; margin: 2px;'>Edit</a> --}}
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
