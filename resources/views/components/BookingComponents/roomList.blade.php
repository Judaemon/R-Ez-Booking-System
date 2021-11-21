@foreach ($rooms as $room)
    <div class="bg-light text-black p-2 d-flex justify-content-between">
        <div class="col-12 col-md-9" data-bs-toggle="modal" data-bs-target="#viewRoomInfoModal{{$room->id}}">
            {{$room->room_type}} 
            {{-- {{$room->room_count}} / {{$room->availableRoom}} / {{$room->occupiedRoom}}   --}}
            Available rooms: 
            <span count=
            @if (!Empty($room->occupiedRoom))
                    {{$room->availableRoom}}
                @else
                    {{$room->room_count}}
                @endif
             id="availableRoomCount{{$room->id}}">
                @if (!Empty($room->occupiedRoom))
                    {{$room->availableRoom}}
                @else
                    {{$room->room_count}}
                @endif
            </span>
        </div>
        <div class="col-12 col-md-3">
            <a id="addRoom{{$room->id}}" href="#viewingRental" room_id="{{$room->id}}" room_type="{{$room->room_type}}" class="btn btn-primary w-100 selectRoomBtn @if (!is_null($room->availableRoom) && $room->availableRoom == 0) disabled @endif">Book</a> 
        </div>
    </div>
    <div class="modal fade " id="viewRoomInfoModal{{$room->id}}" tabindex="-1" aria-labelledby="viewRoomInfoModal" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewRoomInfoModal">Room Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row text-black">
                    <div class="col-12 col-md-4">
                        <p>image</p>
                        <p>{{$room->image_paths}}</p>
                        {{-- <img class="w-75" src="{{ asset('img/' . $room->image_path) }}" alt="{{$room->name}}"> --}}
                    </div>
                    <div class="col-12 col-md-8">
                        <h3>{{$room->room_type}}</h3>
                        <p class="my-4">{{$room->description}}</p>
                        <div class="d-flex justify-content-between">
                            <div class="col-12 col-md-6">
                                <div>
                                    Recommended Capacity: <br> &nbsp &nbsp &nbsp {{$room->recommended_capacity}} People
                                </div>
                                <div>
                                    Max Capacity: <br> &nbsp &nbsp &nbsp {{$room->maximum_capacity}} People
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-right">Price: <br> &nbsp &nbsp &nbsp ₱ {{$room->price}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach

{{-- <div class="bg-light text-black p-2 row">
    <div class="col-12 col-md-9" data-bs-toggle="modal"
        data-bs-target="#viewRoomInfoModal">
        Room type (min to max people)
    </div>
    <div class="col-12 col-md-3">
        <button class="btn btn-primary selectRoomBtn h-100">Book</button>
    </div>
</div>
<div class="modal fade " id="viewRoomInfoModal" tabindex="-1"
    aria-labelledby="viewRoomInfoModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewRoomInfoModal">Room Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body row text-black">
                <div class="col-12 col-md-4">
                    <img class="w-75"
                        src="{{ URL::asset('img\superior_room\superior1.jpg'); }}"
                        alt="">
                </div>
                <div class="col-12 col-md-8">
                    <h3>name</h3>
                    <p class="my-4">Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Ut,
                        corrupti dignissimos. Enim, cupiditate earum quas dolores,
                        obcaecati inventore,
                        odit cum doloribus atque quaerat ut exercitationem eum
                        accusantium autem
                        veritatis harum.</p>
                    <div class="d-flex justify-content-between">
                        <div class="col-12 col-md-6">capacity</div>
                        <div class="col-12 col-md-6 text-right">price</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}