@foreach ($rentals as $rental)
    <div class="bg-light text-black p-2 d-flex justify-content-between">
        <div class="col-12 col-md-9" data-bs-toggle="modal" data-bs-target="#viewRentalInfoModal{{$rental->id}}">
            ({{$rental->id}}) {{$rental->name}}
        </div>
        <div class="col-12 col-md-3">
            <a href="#viewingRental" rental_id="{{$rental->id}}" rental_name="{{$rental->name}}" class="btn btn-primary w-100 selectRentalBtn">Reserve</a> 
        </div>
    </div>
    <div class="modal fade " id="viewRentalInfoModal{{$rental->id}}" tabindex="-1" aria-labelledby="viewRentalInfoModal" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewRentalInfoModal">Rental Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row text-black">
                    <div class="col-12 col-md-4">
                        <img class="w-75" src="{{ asset('img/' . $rental->image_path) }}" alt="{{$rental->name}}">
                    </div>
                    <div class="col-12 col-md-8">
                        <h3>{{$rental->name}}</h3>
                        <p class="my-4">{{$rental->description}}</p>
                        <div class="d-flex justify-content-between">
                            <div class="col-12 col-md-6 text-right">Price: <br> &nbsp &nbsp &nbsp ₱ {{$rental->price}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach