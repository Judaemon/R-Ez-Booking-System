<form id="updateUserForm" method="POST" action="{{route('user.update',$user->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" value="{{$user->email}}" >
    </div>
    <div class="form-group">
        <label>Account Type</label>
        <input type="text" class="form-control" name="account_type" value="{{$user->account_type}}" >
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" value="{{$user->username}}" >
    </div>
    <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}" >
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" >
    </div>
    <div class="form-group">
        <label>Contact Number</label>
        <input type="text" class="form-control" name="contact_number" value="{{$user->contact_number}}" >
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" name="password" value="{{$user->password}}" >
    </div>

    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>