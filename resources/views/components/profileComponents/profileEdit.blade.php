@extends("layouts.app")

@section('content')

<form method="POST" action="{{route('updateProfile',$profile->id)}}">
    {{-- @method('PUT') --}}
    @csrf
    <h1>{{$profile->username}}</h1>
    <h1>{{$profile->id}}</h1>
    <input type="text" type="hidden" class="form-control" name="id" value="{{$profile['id']}}">
    <input type="text" class="form-control" name="account_type" value="{{$profile['account_type']}}">
    <input type="text" class="form-control" name="username" value="{{$profile->username}}">
    <input type="text" class="form-control" name="firstname" value="{{$profile->firstname}}">
    <input type="text" class="form-control" name="lastname" value="{{$profile->lastname}}">
    <input type="text" class="form-control" name="contact_number" value="{{$profile->contact_number}}">
    <input type="text" class="form-control" name="address" value="{{$profile->address}}">
    <input type="text" class="form-control" name="email" value="{{$profile->email}}">
    <input type="text" class="form-control" name="password" value="{{$profile->password}}">

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection 