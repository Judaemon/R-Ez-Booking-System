@extends("layouts.app")

@section('headingTitle')
- Users
@endsection

@section('script')
@endsection

@section('content')

<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addUserForm" method='POST' action="{{ route('user.store') }}">
                @csrf
                <div class="modal-body">
                    <label for="Username">Username</label>
                    <input class="form-control" type="text" name="Username" placeholder="Username" required>

                    <label for="Password">Password</label>
                    <input class="form-control" type="password" name="Password" placeholder="Password" required>

                    <label for='Account_Type'>Account Type</label>
                    <select name="Account_Type" class='form-select mb-1'>
                        @foreach ($accountTypes as $accountType)
                        <option selected>{{$accountType}}</option>
                        @endforeach
                    </select>

                    <label for="Email">Email</label>
                    <input class="form-control" type="Email" name="Email" placeholder="Email" required>

                    <label for="Firstname">First name</label>
                    <input class="form-control" type="text" name="Firstname" placeholder="First name" required>

                    <label for="Lastname">Last name</label>
                    <input class="form-control" type="text" name="Lastname" placeholder="Last name" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    table.dataTable>thead .sorting:before, table.dataTable>thead .sorting_asc:before, table.dataTable>thead .sorting_desc:before, table.dataTable>thead .sorting_asc_disabled:before, table.dataTable>thead .sorting_desc_disabled:before {
        top: 1.6em;
        right: 1em;
        content: "↑";
    }
    table.dataTable>thead .sorting:after, table.dataTable>thead .sorting_asc:after, table.dataTable>thead .sorting_desc:after, table.dataTable>thead .sorting_asc_disabled:after, table.dataTable>thead .sorting_desc_disabled:after {
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
 
    div.dataTables_wrapper div.dataTables_filter label, input {
    width: 100% !important;
}
</style>

<div id="userTableContainer" class="container">

</div>
@endsection
