@extends('layouts.app')

@section('script')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>

{{-- <script src="{{ asset('js/admin/scheduler.js') }}"></script> --}}
<script src="{{ asset('js/admin/scheduler.js') }}"></script>
@endsection

<style>
    #calendar a {
        text-decoration: none !important;
    }

</style>

@section('content')
<div class="container pt-3">

    <div id='calendar'></div>

</div>
@endsection
