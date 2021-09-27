<table id="userTable" class="table table-tripped table-hover table-light">
    <thead class="table-dark text-center">
        <th>ID</th>
        <th>Username</th>
        <th>Role</th>
        <th>Email</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td> {{$user->id}} </td>
            <td> {{$user->username}} </td>
            <td> {{$user->account_type}} </td>
            <td> {{$user->email}} </td>
            <td> {{$user->firstname}} </td>
            <td> {{$user->lastname}} </td>
            <td class='d-flex justify-content-around'>
                <form method="POST" action="{{route('user.destroy',$user->id)}}" class="deleteUserForm">
                    @csrf
                    @method('DELETE')
                    <button User_ID="{{$user->id}}" type='submit' class='userDeleteBtn myButton btn btn-danger mx-2'>Delete</button>
                </form>

                {{-- div for copying the interaction btn and form above --}}
                <div style="display: block; margin-top: 0em; margin-block-end: 1em;">
                    <button User_ID="{{$user->id}}" type='button' class='btn btn-info mx-2 myButton' id='userUpdateBtn' data-bs-toggle='modal'
                    data-bs-target='#updateUserModal'>Update</button>
                </div>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
