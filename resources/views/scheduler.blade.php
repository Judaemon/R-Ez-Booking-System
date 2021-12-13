@extends("layouts.app")

@section('script')

{{-- <script src="{{ asset('js/dashboard.js') }}"></script> --}}
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>
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

    <div class="my-3">
        <div class="d-inline p-2">Pending <span class=" d-inline px-2 text-white" style="background-color: #2f8dfa;"></span></div>
        <div class="d-inline p-2">Booked <span class="  d-inline px-2 text-white" style="background-color: #1fd0bf;"></span></div>
        <div class="d-inline p-2">Canceled <span class="d-inline px-2 text-white" style="background-color: #eb648b;"></span></div>
        <div class="d-inline p-2">Declined <span class="d-inline px-2 text-white" style="background-color: #f8c753;"></span></div>
        <div class="d-inline p-2">On-Going <span class="d-inline px-2 text-white" style="background-color: #eb7e30;"></span></div>
        <div class="d-inline p-2">Finished <span class="d-inline px-2 text-white" style="background-color: #a93790;"></span></div>
    </div>
</div>


<!-- View Modal -->
<div class="modal fade " id="viewShedulerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Rental</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="viewSchedulerForm">
                    {{-- Table Generated from scheduler.js --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

