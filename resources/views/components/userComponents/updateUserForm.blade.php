<form id="updateUserForm" method="POST" action="{{route('user.update',$user->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" id="input_email" name="email" value="{{$user->email}}" >
        <span class="invalid-feedback fw-bold error-text email_error" role="alert"></span>
    </div>
    <!-- <div class="form-group">
        <label>Account Type</label>
        <input type="text" class="form-control" id="input_account_type" name="account_type" value="{{$user->account_type}}" >
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
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" id="input_username" name="username" value="{{$user->username}}" >
        <span class="invalid-feedback fw-bold error-text username_error" role="alert"></span>
    </div>
    <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" id="input_firstname" name="firstname" value="{{$user->firstname}}" >
        <span class="invalid-feedback fw-bold error-text firstname_error" role="alert"></span>
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" id="input_lastname" name="lastname" value="{{$user->lastname}}" >
        <span class="invalid-feedback fw-bold error-text lastname_error" role="alert"></span>
    </div>
    <div class="form-group">
        <label>Contact Number</label>
        <input type="text" class="form-control" id="input_contact_number" name="contact_number" value="{{$user->contact_number}}" >
        <span class="invalid-feedback fw-bold error-text contact_number_error" role="alert"></span>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" id="input_password" name="password" value="{{$user->password}}" >
        <span class="invalid-feedback fw-bold error-text password_error" role="alert"></span>
    </div>

    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>