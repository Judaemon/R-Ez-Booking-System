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

                        <div class="col-12 col-md-12">
                            <div id="carouselExampleControls{{$rental->id}}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach (json_decode($rental->image_paths) as $image_path)
                                    <div class="carousel-item @if($loop->first)active @endif">
                                        <img src="{{asset('/img/'.$image_path) }}"
                                            style="width: 100%; height: 500px; object-fit: cover;">
                                    </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls{{$rental->id}}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls{{$rental->id}}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        {{-- {{$rental->image_paths}} --}}
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