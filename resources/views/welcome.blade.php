@extends("layouts.app")

@section('content')

<img src="{{ URL::asset('/img/welcome_page/test1.png') }}" alt="" style="width: 100%;margin-top: -24px;">
<div class="container">

    <div class="jumbotron jumbotron-fluid" style="margin-top: 5rem">
        <div class="container">
          <h1 class="display-4 text-center">Promised land beach resort</h1>
          <p class="lead text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur deleniti labore recusandae libero earum magnam ipsum dolore? Expedita veritatis, voluptatibus tempore ducimus repudiandae quam deleniti magni animi. Obcaecati, commodi aliquid.</p>
        </div>
    </div>

    <div class="row" style="margin-top: 5rem">

            <div class="col-6">
            <img src="{{ URL::asset('img\welcome_page\room1.png'); }}"  style="width: 100%">
            <p style="font-size:35px; margin-top:2rem">Beach Hut</p>
            <p style="font-size:20px;">insert description for the beach hut</p> 
            </div>

            <div class="col-6">
            <img src="{{ URL::asset('img\welcome_page\room2.png'); }}"  style="width: 100%">
            <p style="font-size:35px; margin-top:2rem">Villa</p>
            <p style="font-size:20px;">insert description for the villa</p>
            </div>

    </div>
</div>

    <div class="row" style="margin-top: 5rem">
        <img src="{{ URL::asset('img\welcome_page\liwliwa.png'); }}"  style="width: 100%">
        <h1 class="display-4 text-center" style="font-size:55px; margin-top:2rem">Liwliwa</h1>
        <p class="text-center" style="font-size:20px;">insert description for the liwliwa</p>
    </div>

<div class="container">

    <div class="row" style="margin-top: 5rem">
        <div class="col-6">
            <h1 class="display-4 text-center" style="font-size:55px; margin-top:2rem">About Us</h1>
            <p class="text-center" style="font-size:20px;">insert description for the resort</p>
        </div>
        <div class="col-6">
            <img src="{{ URL::asset('img\welcome_page\promisedsign.png'); }}"  style="width: 100%">
        </div>
    </div> 

</div>

<div class="row d-flex justify-content-center" style="margin-top: 5rem">
    <div class="col-8">
        <img src="{{ URL::asset('img\welcome_page\surf.png'); }}"  style="width: 100%">
    </div>
    <div class="col-3">
        <img src="{{ URL::asset('img\welcome_page\wedding.png'); }}"  style="width: 100%">
    </div>
        <h1 class="display-4 text-center" style="font-size:55px; margin-top:2rem">Accomodations</h1>
        <p class="text-center" style="font-size:20px;">weddings and shit</p>
</div>
<div class="container">
    
    <div class="row" style="margin-top: 5rem">
        <div class="col-4">
            <img src="{{ URL::asset('/img/welcome_page/standingpicture.png') }}" alt="" style="width: 100%;margin-top: -24px;">
            <h1>Gallery?</h1>
        </div>
        <div class="col-4">
            <img src="{{ URL::asset('/img/welcome_page/standingpicture.png') }}" alt="" style="width: 100%;margin-top: -24px;">
            <h1>Rentals?</h1>
        </div>
        <div class="col-4">
            <img src="{{ URL::asset('/img/welcome_page/standingpicture.png') }}" alt="" style="width: 100%;margin-top: -24px;">
            <h1>Location?</h1>
        </div>
    </div>

</div>

@endsection

@section('script')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="js/room.js"></script>
@endsection