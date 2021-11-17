<table id="userTable" class="table table-tripped table-hover table-light">
    <thead class="table-dark text-center">
        <th>ID</th>
        <th>Role</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>Address</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td> {{$user->id}} </td>
            <td> {{$user->account_type}} </td>
            <td> {{$user->email}} </td>
            <td> {{$user->contact_number}} </td>
            <td> {{$user->address}} </td>
            <td> {{$user->firstname}} </td>
            <td> {{$user->lastname}} </td>
            <td>
                <div class='d-flex justify-content-around'>
                    <div style="display: block; margin-top: 0em; margin-block-end: 1em;">
                        <button user_id="{{$user->id}}" type='button' class='btn btn-info mx-2 myButton' id='userUpdateBtn' data-bs-toggle='modal'
                        data-bs-target='#updateUserModal'>Update</button>
                    </div> 
                    <form method="POST" class="deleteUser" dataId="{{$user->id}}" action="{{route('user.destroy',$user->id)}}">
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-danger" style="width: 100px; margin: 2px;" type="submit">Delete</button>
                    </form>
                </div>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>