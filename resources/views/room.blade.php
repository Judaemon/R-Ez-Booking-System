@extends("layouts.app")

@section('script')
<script src="{{ asset('js/admin/room.js') }}"></script>

<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')
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

<div class="container">
    <h1>Rooms</h1>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Add Form --}}
                <form id="addRoomForm" method="POST" action="{{route('room.store')}}">
                    @csrf
                    <div class="form-group mb-2">
                        <label>Name</label>
                        <input type="text" class="form-control" id="input_name" name="name" placeholder="Room Name">
                        <span class="invalid-feedback fw-bold error-text name_error" role="alert"></span>
                    </div>

                    <div class="form-group mb-2">
                        <label>Description</label>
                        <input type="text" class="form-control" id="input_description" name="description"
                            placeholder="Room Description">
                        <span class="invalid-feedback fw-bold error-text description_error" role="alert"></span>
                    </div>

                    <div class="form-group mb-2">
                        <label>Price</label>
                        <input type="number" class="form-control" id="input_price" name="price"
                            placeholder="Room Price">
                        <span class="invalid-feedback fw-bold error-text price_error" role="alert"></span>
                    </div>

                    <div class="form-group mb-2">
                        <label>Picture</label>
                        <input type="text" class="form-control" id="input_picture" name="picture"
                            placeholder="Room Price">
                        <span class="invalid-feedback fw-bold error-text picture_error" role="alert"></span>
                    </div>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add New Room</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="editRoomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="editRoomForm">
                    {{-- Table Generated from admin.js --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div id="roomTableContainer" class="container">
</div>
@endsection
