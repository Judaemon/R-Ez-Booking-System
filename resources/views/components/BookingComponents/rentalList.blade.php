@foreach ($rentals as $rental)
    <div class="bg-light text-black p-2 d-flex justify-content-between">
        <div class="col-12 col-md-9" data-bs-toggle="modal" data-bs-target="#viewRentalInfoModal{{$rental->id}}">
            {{$rental->rental_type}}
            {{-- {{$rental->rental_count}} / {{$rental->occupiedRental}} /  {{$rental->availableRental}}  --}}
            
            Available rentals: 
            <span count=
            @if (!Empty($rental->occupiedRental))
                {{$rental->availableRental}}
            @else
                {{$rental->rental_count}}
            @endif
             id="availableRentalCount{{$rental->id}}">
             @if (!Empty($rental->occupiedRental))
                {{$rental->availableRental}}
            @else
                {{$rental->rental_count}}
            @endif
            </span>
        </div>
        <div class="col-12 col-md-3">
            <a id="addRental{{$rental->id}}" href="#viewingRental" rental_id="{{$rental->id}}" rental_type="{{$rental->rental_type}}" rental_price="{{$rental->price}}" class="btn btn-primary w-100 selectRentalBtn @if (!is_null($rental->availableRental) && $rental->availableRental == 0) disabled @endif">Reserve</a> 
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
                        {{$rental->image_paths}}
                        {{-- <img class="w-75" src="{{ asset('img/' . $rental->image_path) }}" alt="{{$rental->rental_type}}"> --}}
                    </div>
                    <div class="col-12 col-md-8">
                        <h3>{{$rental->rental_type}}</h3>
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