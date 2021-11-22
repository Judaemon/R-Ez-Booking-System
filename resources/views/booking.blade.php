@extends('layouts.app')

@section('script')

<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script src="{{ asset('js/admin/booking.js') }}"></script>

@endsection

@section('content')
<div class="container p-3">
    <h1>Bookings</h1>
</div>

<div id="bookingTableContainer" class="container">
</div>

<!-- Add Modal -->
<div class="modal fade" id="addBookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Rental</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Add Form --}}
                <form id="addRentalForm" method="POST" enctype="multipart/form-data" action="{{route('booking.store')}}">
                    @csrf



                    <div class="mt-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add New Rental</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    table.dataTable>thead .sorting:before,
    table.dataTable>thead .sorting_asc:before,
    table.dataTable>thead .sorting_desc:before,
    table.dataTable>thead .sorting_asc_disabled:before,
    table.dataTable>thead .sorting_desc_disabled:before {
        top: 1.6em;
        right: 1em;
        content: "↑";
    }

    table.dataTable>thead .sorting:after,
    table.dataTable>thead .sorting_asc:after,
    table.dataTable>thead .sorting_desc:after,
    table.dataTable>thead .sorting_asc_disabled:after,
    table.dataTable>thead .sorting_desc_disabled:after {
        top: 1.7em;
        right: .5em;
        content: "↓";
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        margin: 2px 0;
        white-space: nowrap;
        justify-content: flex-start !important;
    }

    div.dataTables_wrapper div.dataTables_info {
        justify-content: flex-end !important;
        text-align: end !important;
        padding-top: 0em !important;
    }

    div.dataTables_wrapper div.dataTables_filter {
        text-align: left !important;
    }

    div.dataTables_wrapper div.dataTables_filter label,
    input {
        width: 100% !important;
    }

</style>

<div id="transactionTableContainer" class="container">

</div>
@endsection
