@extends("layouts.app")

@section('content')

<div class="container">

    <h1 class="mt-4">Rentals</h1>
    
    <div class="row mt-4" style="text-align: center">

        <div class="col-12 col-md-4">

            <a><img data-bs-toggle="modal" data-bs-target="#atvRental" src="{{ URL::asset('/img/rentals/ATV_Solo/atv_rental.jpg') }}" style="width: 100%; height: 500px; object-fit: cover; cursor: pointer;"></a>
            <h3 class="mt-2">ATV</h3>

        </div>

        <div class="col-12 col-md-4">
            <a><img data-bs-toggle="modal" data-bs-target="#volleyballRental" src="{{ URL::asset('/img/rentals/Volleyball/volleyball_rental.jpg') }}" style="width: 100%; height: 500px; object-fit: cover; cursor: pointer;"></a>
            <h3 class="mt-2">Volleyball</h3>

            
        </div>

        <div class="col-12 col-md-4">
            <a><img data-bs-toggle="modal" data-bs-target="#tentRental" src="{{ URL::asset('/img/rentals/tent/tent_rental.jpg') }}" style="width: 100%; height: 500px; object-fit: cover; cursor: pointer;"></a>
            <h3 class="mt-2">Tent</h3>

        </div>

    </div>

    <div class="row mt-4" style="text-align: center">

        <div class="col-12 col-md-12">

            <a><img data-bs-toggle="modal" data-bs-target="#surfRental" src="{{ URL::asset('img\welcome_page\surf.png'); }}"  style="width: 100%; cursor: pointer;"></a>
            
            <h3 class="mt-2">Surf</h3>

        </div>

    </div>

</div>

{{-- ATV --}}
<div class="modal fade" id="atvRental" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ URL::asset('/img/rentals/ATV_Solo/atv_rental.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                    </div>

                    <div class="col-12 col-md-6">

                        <div class="row">
                            <div class="col-12">
                                <h2>ATV Solo / With Backride</h2>
                            </div>   
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <p>Enjoy the thrilling and adrenaline pumping trails that we have for you. Or ride with a partner over the sand and dirt.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h3><i class="bi bi-tag"></i>Solo: ₱800/hour</h3>
                                <h3>Backride: ₱1200/hour</h3>
                            </div>
                            
                            <div class="col-6">
                                <h3><i class="bi bi-person"></i> 10 ATV <br>1-2 persons</h3>
                            </div>
                        </div>
                        
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>

{{-- Volleyball --}}
<div class="modal fade" id="volleyballRental" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <div id="carouselExampleControls2" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ URL::asset('/img/rentals/Volleyball/volleyball_rental.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                    </div>

                    <div class="col-12 col-md-6">

                        <div class="row">
                            <div class="col-8">
                                <h2>Volleyball</h2>
                            </div>   
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <p>Have a fun and exciting match of beach volleyball with your friends.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h3><i class="bi bi-tag"></i> ₱250/2hrs</h3>
                            </div>
                            
                            <div class="col-6">
                                <h3><i class="bi bi-person"></i> 2-6 persons</h3>
                            </div>
                        </div>
                        
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>

{{-- Tent --}}
<div class="modal fade" id="tentRental" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <div id="carouselExampleControls3" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ URL::asset('/img/rentals/tent/tent_rental.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls3" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls3" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                    </div>

                    <div class="col-12 col-md-6">

                        <div class="row">
                            <div class="col-8">
                                <h2>Tent</h2>
                            </div>   
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <p>Experience the great outdoors and relax as you hear the waves roll in front of you.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h3><i class="bi bi-tag"></i> ₱550</h3>
                            </div>
                            
                            <div class="col-6">
                                <h3><i class="bi bi-person"></i> 2-4 persons</h3>
                            </div>
                        </div>

                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>

{{-- Surf --}}
<div class="modal fade" id="surfRental" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <div id="carouselExampleControls4" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ URL::asset('/img/rentals/surf/surf_rental.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls4" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls4" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                    </div>

                    <div class="col-12 col-md-6">

                        <div class="row">
                            <div class="col-8">
                                <h2>Surf</h2>
                            </div>   
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <p>Ride the incredible waves of Liwliwa.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h3><i class="bi bi-tag"></i> ₱1000 / board and instructor</h3>
                            </div>
                            
                            <div class="col-6">
                                <h3><i class="bi bi-person"></i> 1 person</h3>
                            </div>
                        </div>

                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>

@endsection

