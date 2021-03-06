@extends("layouts.app")

@section('script')

@endsection

@section('content')

    <div class="container p-3">
        <div class="main-body">
        
              <div class="row gutters-sm">

                <div class="col-md-4 mb-3">
                  <div class="card mb-3" style="height: 105%;">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                      <img 
                       @if (empty($user->image_path))
                       src ="{{asset('img/users/def_img.png')}}" 
                       @else
                       src="{{asset('img/users/' . $user->image_path)}}" 
                       @endif
                       alt="Admin" class="rounded-circle" width="150">
                        <!-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">    -->
                        <div class="mt-3">
                          <h4>{{$user->firstname}} {{$user->lastname}}</h4>
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
