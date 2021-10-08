
<table class="table">
    <thead>
        <th>ID</th>
        <th>Username</th>
        <th>Role</th>
        <th>Email</th>
        <th>Contact Number</th>
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
            <td> {{$user->contact_number}} </td>
            <td> {{$user->firstname}} </td>
            <td> {{$user->lastname}} </td>
            <td>
                <a href="" class="btn btn-info updateButton" style='width: 100px; margin: 2px;'>Edit</a> 
                <form method="POST" class="deleteUser" dataId="{{$user->id}}" action="{{route('user.destroy',$user->id)}}">
                    @csrf 
                    @method('DELETE')
                    <button class="btn btn-danger" style="width: 100px; margin: 2px;" type="submit">Delete</button>
            </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>