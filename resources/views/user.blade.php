@extends("layouts.app")

@section('script')
  <script src="{{ asset('js/admin/user.js') }}"></script>
@endsection

@section('content')

    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            Add User
        </button>
            <div id="userTable" class="pt-2">
              {{-- Table Generated from user.js --}}
            </div>
    </div>
    
  <!-- Modal -->
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
               
                <div class="form-group mb-2">
                    <label>Account Type</label>
                    <input type="text" class="form-control" id="input_account_type" name="account_type" placeholder="Account Type">
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

@endsection