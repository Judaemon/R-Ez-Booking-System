<table id="roomTable" class="table table-tripped table-hover table-light">
    <thead class="table-dark text-center">
        <tr>
            <th class="col-md-2" scope="col">ID</th>
            <th class="col-md-2" scope="col">Name</th>
            <th class="col-md-2" scope="col">Description</th>
            <th class="col-md-2" scope="col">Price</th>
            <th class="col-md-2" scope="col">Recommended Capacity</th>
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
                <div class='d-flex justify-content-around'>
                    <button class="btn btn-success" type="button" data-bs-toggle="modal"
                        data-bs-target="#viewRoomModal{{$room->id}}">View</button>

                    <button room_id="{{$room->id}}" type='button' class='btn btn-info mx-2 myButton' id='roomUpdateBtn'
                        data-bs-toggle='modal' data-bs-target='#updateRoomModal'>Update</button>

                    <form method="POST" class="deleteRoom" dataId="{{$room->id}}"
                        action="{{route('room.destroy',$room->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" style="width: 100px; margin: 2px;" type="submit">Delete</button>
                    </form>
                </div>
                {{-- <a href="" class="btn btn-info updateButton" style='width: 100px; margin: 2px;'>Edit</a> --}}

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach ($rooms as $room)
<div class="modal fade " id="viewRoomModal{{$room->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Room Description</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div id="carouselExampleControls{{$room->id}}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach (json_decode($room->image_paths) as $image_path)
                                <div class="carousel-item @if($loop->first)active @endif">
                                    <img src="{{asset('/img/'.$image_path) }}"
                                        style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls{{$room->id}}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls{{$room->id}}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">

                        <div class="row">
                            <div class="col-8">
                                <h2>{{$room->room_type}}</h2>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <p>{{$room->description}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h3><i class="bi bi-cash"></i> {{$room->price}}</h3>
                            </div>
                            
                            <div class="col-6">
                                <h3><i class="bi bi-key"></i> {{$room->room_count}} Count</h3>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <h5>Recommended: {{$room->recommended_capacity}}</h5>
                            </div>
                            
                            <div class="col-6">
                                <h5>Maximum: {{$room->maximum_capacity}}</h5>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <h3><i class="bi bi-collection"></i> Amenities</h3>
                                    @foreach (json_decode($room->amenities) as $amenities)
                                        <p class="ms-3"><i class="bi bi-nut"></i>{{$amenities}}</p>
                                    @endforeach
                            </div> 
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
