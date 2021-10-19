
@extends("layouts.app")

<style>
@media(max-width: 700px){
  #welcomelong{
    height: 250px;
    width: auto;
    object-fit: cover;
    object-position: 1%;
  }

  #trioimg{
    height: 400px;
    width: auto;
    object-fit: cover;
  }

  #triotext{
    margin-bottom: 5rem;
  }

}
</style>

@section('content')

<img id="welcomelong" src="{{ URL::asset('/img/welcome_page/welcomecoverphoto.png') }}" style="width: 100%;">



<div class="container">

        <div class="jumbotron jumbotron-fluid" style="margin-top: 5rem;">
            <div class="container">
              <h1 class="display-5 text-center">Promised land beach resort</h1>
              <p class="lead text-center" style="font-size:20px;">Sitting under the shining sun of the coast of Zambales, Promised land beach resort offers 
                  a break from the bustling cities and settle down and relax surrounded by nature.
              </p>
            </div>
        </div>
    
        <div class="row" style="margin-top: 5rem">
            <img id="welcomelong" src="{{ URL::asset('img\welcome_page\liwliwa.png'); }}"  style="width: 100%">
            <h1 class="display-5 text-center" style="margin-top:2rem">Liwliwa</h1>
            <p class="text-center" style="font-size:20px;">Located at San Felipe, Zambales, Liwliwa gives you a relaxing ambiance with the sea as far as the eye can see 
                on one side a a lush forest on the other Liwliwa is sure to deliver.
            </p>
        </div>

        <div class="row" style="margin-top: 5rem">
            <div class="col-12 col-md-6">
                <img src="{{ URL::asset('img\welcome_page\room1.png'); }}"  style="width: 100%">
                <p style="font-size:35px; margin-top:2rem; color: black;">Beach Hut</p>
                <p style="font-size:20px;">Encapsulating aestethic, the Beach Hut is a fitting choice for someone who enjoys style.</p> 
            </div>

            <div class="col-12 col-md-6">
                <img src="{{ URL::asset('img\welcome_page\room2.png'); }}"  style="width: 100%">
                <p style="font-size:35px; margin-top:2rem; color: black;">Villa</p>
                <p style="font-size:20px;">Experience Luxury with our near the shore Villa. Enjoy the sights that liwliwa provides, with its rooftop offering the perfect spot to relax and lounge.</p>
            </div>
        </div>
    
        {{-- <div class="row" style="margin-top: 5rem">
            <div class="col-6">
                <h1 class="display-4 text-center" style="margin-top:2rem">About Us</h1>
                <p class="text-center">insert description for the resort</p>
            </div>
            <div class="col-6">
                <img src="{{ URL::asset('img\welcome_page\promisedsign.png'); }}"  style="width: 100%">
            </div>
        </div>  --}}
    
        <div class="row d-flex justify-content-center" style="margin-top: 5rem">
                <img id="welcomelong" src="{{ URL::asset('img\welcome_page\surf.png'); }}"  style="width: 100%">
                <h1 class="display-5 text-center" style="margin-top:2rem">Experiences</h1>
                <p class="text-center" style="font-size:20px;">With tons of activities to do, we wont leave you bored. Go and rip throught the dirt with 
                    an ATV or ride the waves on a surf board. We are sure to provide you with plenty of exciting memories that you wont forget.
                </p>
        </div>
        
        <div class="row" style="margin-top: 5rem;">
            <div class="col-12 col-md-4">
                <a href="{{ route('gallery') }}"><img  id="trioimg" src="{{ URL::asset('/img/welcome_page/standinggallery.png') }}" style="width: 100%;margin-top: -24px;"></a>
                <p id="triotext" style="color: black; margin-top: 0.5rem;" class="display-6 text-center">Gallery?</p>
            </div>
            <div class="col-12 col-md-4">
                <a href="{{ route('activities') }}"><img id="trioimg" src="{{ URL::asset('/img/welcome_page/standingrentals.png') }}" style="width: 100%;margin-top: -24px;"></a>
                <p id="triotext" style="color: black; margin-top: 0.5rem;" class="display-6 text-center">Rentals?</p>
            </div>
            <div class="col-12 col-md-4">
                <a href="{{ route('contact') }}"><img id="trioimg" src="{{ URL::asset('/img/welcome_page/standinglocation.png') }}" style="width: 100%;margin-top: -24px;"></a>
                <p id="triotext" style="color: black; margin-top: 0.5rem;" class="display-6 text-center">Contact Us</p>
            </div>
        </div>
</div>


@endsection

@section('script')
<script src="js/room.js"></script>
@endsection