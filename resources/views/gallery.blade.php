@extends("layouts.app")

@section('content')

<div class="container">

    <h1 class="mt-4">Rooms</h1>

    <div class="row mt-4" style="text-align: center">

        <div class="col-12 col-md-4">

            <a><img data-bs-toggle="modal" data-bs-target="#kuboFanRoom" src="{{ URL::asset('/img/kubo_fan_room/kubo1.jpg') }}" style="width: 100%; height: 500px; object-fit: cover; cursor: pointer;"></a>
            <h3 class="mt-2">Kubo Fan Room</h3>

        </div>

        <div class="col-12 col-md-4">
            <a><img data-bs-toggle="modal" data-bs-target="#SuperiorRoom" src="{{ URL::asset('/img/superior_room/superior1.jpg') }}" style="width: 100%; height: 500px; object-fit: cover; cursor: pointer;"></a>
            <h3 class="mt-2">Superior Room</h3>

            
        </div>

        <div class="col-12 col-md-4">
            <a><img data-bs-toggle="modal" data-bs-target="#VillaRoom" src="{{ URL::asset('/img/villa_room/villa1.jpg') }}" style="width: 100%; height: 500px; object-fit: cover; cursor: pointer;"></a>
            <h3 class="mt-2">Villa Room</h3>

        </div>

    </div>

    <div class="row mt-4" style="text-align: center">

        <div class="col-12 col-md-4">

            <a><img data-bs-toggle="modal" data-bs-target="#RegularRoom" src="{{ URL::asset('/img/regular_bhut/regular1.jpg') }}" style="width: 100%; height: 500px; object-fit: cover; cursor: pointer;"></a>
            <h3 class="mt-2">Regular Beach Hut</h3>

        </div>

        <div class="col-12 col-md-4">
            <a><img data-bs-toggle="modal" data-bs-target="#CoupleRoom" src="{{ URL::asset('/img/couple_bhut/couple1.jpg') }}" style="width: 100%; height: 500px; object-fit: cover; cursor: pointer;"></a>
            <h3 class="mt-2">Couple Beach Hut</h3>

            
        </div>

        <div class="col-12 col-md-4">
            <a><img data-bs-toggle="modal" data-bs-target="#BarkadaRoom" src="{{ URL::asset('/img/barkada_bhut/barkada1.jpg') }}" style="width: 100%; height: 500px; object-fit: cover; cursor: pointer;"></a>
            <h3 class="mt-2">Barkada Beach Hut</h3>

        </div>

    </div>

</div>

<!-- Modals Gallore-->

{{-- Kubo --}}
<div class="modal fade" id="kuboFanRoom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <img src="{{ URL::asset('/img/kubo_fan_room/kubo1.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/kubo_fan_room/kubo3.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/kubo_fan_room/kubo2.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
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
                            <div class="col-8">
                                <h2>Kubo Fan Room</h2>
                            </div>   
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <p>Experience one of what represents the Filipino Culture with our Kubo Room. The kubo which design allows for great airflow enables it to trully allow the sea air breaths throughout the room. 
                                    With its bunk beds we made sure that theres enough room for you and up to three other persons.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h3><i class="bi bi-tag"></i> 2500 php</h3>
                            </div>
                            
                            <div class="col-6">
                                <h3><i class="bi bi-person"></i> 2-4 persons</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h3><i class="bi bi-plus-square"></i> Amenities</h3>
                                <p>
                                    (Insert Amenities here)
                                </p>
                            </div> 
                        </div>
                        
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>

{{-- Superior --}}
<div class="modal fade" id="SuperiorRoom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <img src="{{ URL::asset('/img/superior_room/superior1.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/superior_room/superior2.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/superior_room/superior3.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
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
                                <h2>Superior Room</h2>
                            </div>   
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <p>Simple yet Elegant. With its space the superior room is able to accomodate up to 6 persons. Equipped with a TV and a small table the superior room is and amazing choice for a family or a group of friends.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h3><i class="bi bi-tag"></i> 5000 php</h3>
                            </div>
                            
                            <div class="col-6">
                                <h3><i class="bi bi-person"></i> 3-6 persons</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h3><i class="bi bi-plus-square"></i> Amenities</h3>
                                <p>
                                    (Insert Amenities here)
                                </p>
                            </div> 
                        </div>
                        
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>

{{-- Villa --}}
<div class="modal fade" id="VillaRoom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <img src="{{ URL::asset('/img/villa_room/villa1.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/villa_room/villa2.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/villa_room/villa3.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
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
                                <h2>Villa</h2>
                            </div>   
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <p>Experience Luxury with our near the shore Villa. With its rooftop overlooking the sea, enjoy the sunset with a drink then headback down to the airconditioned room with its 2 bunk beds, this could 
                                    easily accomodate up to 6 persons and still have plenty of floorspace.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h3><i class="bi bi-tag"></i> 7000 php</h3>
                            </div>
                            
                            <div class="col-6">
                                <h3><i class="bi bi-person"></i> 4-6 persons</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h3><i class="bi bi-plus-square"></i> Amenities</h3>
                                <p>
                                    (Insert Amenities here)
                                </p>
                            </div> 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- RegularHut --}}
<div class="modal fade" id="RegularRoom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <img src="{{ URL::asset('/img/regular_bhut/regular1.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/regular_bhut/regular2.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/regular_bhut/regular3.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/regular_bhut/regular4.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/regular_bhut/regular5.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
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
                                <h2>Regular Beach Hut</h2>
                            </div>   
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <p>Encapsulating aestethic, the Beach Hut is a fitting choice for a small family or a group of friends to experience style. Accomodating up to 4 persons the Beach Hut is sure to deliver.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h3><i class="bi bi-tag"></i> 4300 php</h3>
                            </div>
                            
                            <div class="col-6">
                                <h3><i class="bi bi-person"></i> 2-4 persons</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h3><i class="bi bi-plus-square"></i> Amenities</h3>
                                <p>
                                    (Insert Amenities here)
                                </p>
                            </div> 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- CoupleHut --}}
<div class="modal fade" id="CoupleRoom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <div id="carouselExampleControls5" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ URL::asset('/img/couple_bhut/couple1.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/couple_bhut/couple2.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/couple_bhut/couple3.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls5" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls5" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                    </div>

                    <div class="col-12 col-md-6">

                        <div class="row">
                            <div class="col-8">
                                <h2>Couple Beach Hut</h2>
                            </div>   
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <p>Have a romantic retreat with your significant other. Have an intimate and cozy stay with this beach hut built for couples to enjoy and relax.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h3><i class="bi bi-tag"></i> 3300 php</h3>
                            </div>
                            
                            <div class="col-6">
                                <h3><i class="bi bi-person"></i> 2 persons</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h3><i class="bi bi-plus-square"></i> Amenities</h3>
                                <p>
                                    (Insert Amenities here)
                                </p>
                            </div> 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- BarkadaHut --}}
<div class="modal fade" id="BarkadaRoom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <div id="carouselExampleControls6" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ URL::asset('/img/barkada_bhut/barkada1.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/barkada_bhut/barkada4.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/barkada_bhut/barkada5.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/barkada_bhut/barkada3.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/barkada_bhut/barkada2.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls6" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls6" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                    </div>

                    <div class="col-12 col-md-6">

                        <div class="row">
                            <div class="col-8">
                                <h2>Couple Beach Hut</h2>
                            </div>   
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <p>We give the best for you and your best buds with our Barkada Beach Hut. Enjoy the fun and exciting activities that liwliwa could give with your mates then settle down and relax as the night grows ever deeper. 
                                    Able to accomodate up to 8 people we made sure that theres no one getting left behind.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h3><i class="bi bi-tag"></i> 8000 php</h3>
                            </div>
                            
                            <div class="col-6">
                                <h3><i class="bi bi-person"></i> 8 persons</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h3><i class="bi bi-plus-square"></i> Amenities</h3>
                                <p>
                                    (Insert Amenities here)
                                </p>
                            </div> 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

