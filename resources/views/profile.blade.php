@extends("layouts.app")

@section('content')

    <div class="container">
        <div class="main-body">
        
              <div class="row gutters-sm">

                <div class="col-md-4 mb-3">
                  <div class="card mb-3" style="height: 105%;">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <h4>{{$user->firstname}} {{$user->lastname}}</h4>
                          <p class="text-secondary mb-1">{{$user->username}}</p>
                          <p class="text-muted font-size-sm">{{$user->address}}</p>
                        </div>
                      </div>
                    </div>
                  </div>    
                </div>

                <div class="col-md-8">
                  <div class="card mb-3 h-100">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          {{$user->firstname}} {{$user->lastname}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          {{$user->email}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Contact Number</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          {{$user->contact_number}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          {{$user->address}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-12">
                            {{-- FIX THE LINK --}}
                          <a class="btn btn-info" href="{{route('editProfile')}}">Edit</a>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
    
            </div>
        </div>


@endsection