@extends("layouts.app")

@section('script')
  <script src="{{ asset('js/admin/user.js') }}"></script>

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
    <div class="container p-3">
    <h1>Users</h1>
    </div>
    
  <!-- Add Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- Add Form --}}
            <form id="addUserForm" method="POST" action="{{route('user.store')}}">
                @csrf

                <div class="form-group mb-2">
                    <label>Email</label>
                    <input type="text" class="form-control" id="input_email" name="email" placeholder="E-mail Address">
                    <span class="invalid-feedback fw-bold error-text email_error" role="alert"></span>
                </div>
               
                <!-- <div class="form-group mb-2">
                    <label>Account Type</label>
                    <input type="text" class="form-control" id="input_account_type" name="account_type" placeholder="Account Type">
                    <span class="invalid-feedback fw-bold error-text account_type_error" role="alert"></span>
                </div> -->

                <div class="form-group mb-2">
                    <label for="account_type">Account Type</label>
                    </select>
                    <select type="text" class="form-control" id="input_account_type" name="account_type" placeholder="Account Type">
                    <option value="">Choose Account Type...</option>
                    <option value="admin">Admin</option>
                    <option value="employee">Employee</option>
                    <option value="user">User</option></select>
                    <span class="invalid-feedback fw-bold error-text account_type_error" role="alert"></span>
                </div>
                
                <div class="form-group mb-2">
                    <label>Username</label>
                    <input type="text" class="form-control" id="input_username" name="username" placeholder="Username">
                    <span class="invalid-feedback fw-bold error-text username_error" role="alert"></span>
                </div>  

                <div class="form-group mb-2">
                    <label>First Name</label>
                    <input type="text" class="form-control" id="input_firstname" name="firstname" placeholder="First Name">
                    <span class="invalid-feedback fw-bold error-text firstname_error" role="alert"></span>
                </div>

                <div class="form-group mb-2">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="input_lastname" name="lastname" placeholder="Last Name">
                    <span class="invalid-feedback fw-bold error-text lastname_error" role="alert"></span>
                </div>

                <div class="form-group mb-2">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" id="input_contact_number" name="contact_number" placeholder="Contact Number">
                    <span class="invalid-feedback fw-bold error-text contact_number_error" role="alert"></span>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="input_address" name="address" placeholder="Address">
                    <span class="invalid-feedback fw-bold error-text address_error" role="alert"></span>
                </div>

                <div class="form-group mb-2">
                    <label>Password</label>
                    <input type="text" class="form-control" id="input_password" name="password" placeholder="Password">
                    <span class="invalid-feedback fw-bold error-text password_error" role="alert"></span>
                </div>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add New User</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Update Modal -->
  <div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="editUserForm">
                    {{-- Table Generated from admin.js --}}
                </div>
            </div>
        </div>
    </div>
    </div>
<div id="userTableContainer" class="container">
</div>

@endsection