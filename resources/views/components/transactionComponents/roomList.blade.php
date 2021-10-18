@foreach ($rooms as $room)
    <div class="bg-light text-black p-2 row">
        <div class="col-12 col-md-9" data-bs-toggle="modal" data-bs-target="#viewRoomInfoModal">
            {{$room->name}}
        </div>
        <div class="col-12 col-md-3">
            <button class="btn btn-primary selectRoomBtn h-100">Book</button> 
        </div>
    </div>
    <div class="modal fade " id="viewRoomInfoModal" tabindex="-1" aria-labelledby="viewRoomInfoModal" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewRoomInfoModal">Room Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row text-black">
                    <div class="col-12 col-md-4">
                        <img class="w-75" src="{{ URL::asset('img\superior_room\superior1.jpg'); }}" alt="">
                    </div>
                    <div class="col-12 col-md-8">
                        <h3>name</h3>
                        <p class="my-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, corrupti dignissimos. Enim, cupiditate earum quas dolores, obcaecati inventore, odit cum doloribus atque quaerat ut exercitationem eum accusantium autem veritatis harum.</p>
                        <div class="d-flex justify-content-between">
                            <div class="col-12 col-md-6">capacity</div>
                            <div class="col-12 col-md-6 text-right">price</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach