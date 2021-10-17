@extends("layouts.app")

@section('content')

<form method="POST" action="{{route('updateProfile',$profile->id)}}">
    @csrf
    @method('POST')
    <h1>{{$profile->username}}</h1>
    <h1>{{$profile->id}}</h1>
    <input type="text" class="form-control" placeholder="Color" name="firstname" value="{{$profile->firstname}}">
    <input type="text" class="form-control" placeholder="Color" name="lastname" value="{{$profile->lastname}}">
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection 