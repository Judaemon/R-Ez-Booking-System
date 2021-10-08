@extends("layouts.app")

@section('content')

    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            Add User
        </button>
            <div id="userTable">
              {{-- Table Generated from admin.js --}}
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

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="E-mail Address">
                </div>
               
                <div class="form-group">
                    <label>Account Type</label>
                    <input type="text" class="form-control" name="account_type" placeholder="Account Type">
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>  

                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="firstname" placeholder="First Name">
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                </div>

                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="number" class="form-control" name="contact_number" placeholder="Contact Number">
                </div>

                <div class="form-group">
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

@section('script')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="js/user.js"></script>
@endsection