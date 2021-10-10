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
                    <input type="text" class="form-control" name="email" placeholder="E-mail Address">
                </div>
               
                <div class="form-group mb-2">
                    <label>Account Type</label>
                    <input type="text" class="form-control" name="account_type" placeholder="Account Type">
                </div>

                <div class="form-group mb-2">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>  

                <div class="form-group mb-2">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="firstname" placeholder="First Name">
                </div>

                <div class="form-group mb-2">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                </div>

                <div class="form-group mb-2">
                    <label>Contact Number</label>
                    <input type="number" class="form-control" name="contact_number" placeholder="Contact Number">
                </div>

                <div class="form-group mb-2">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Password">
                </div>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection