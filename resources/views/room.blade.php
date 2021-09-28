@extends("layouts.app")

@section('content')

    <div class="container">
            <div id="roomTable">
              {{-- Table Generated from admin.js --}}
            </div>
    </div>      


@endsection

@section('script')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="js/room.js"></script>
@endsection