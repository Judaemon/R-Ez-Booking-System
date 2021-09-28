@extends("layouts.app")

@section('content')
<body>
    <h1>TEST YAWA</h1>

        <div class="card">
            <div id="roomTable">

            </div>                 
        </div>           

</body>
@endsection

@section('script')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="js/room.js"></script>
@endsection