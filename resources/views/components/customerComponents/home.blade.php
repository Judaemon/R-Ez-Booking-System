@extends('layouts.app')

@section('content')
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Room</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-4">
                <img src="{{ URL::asset('img\welcome_page\hut.jpg'); }}" alt="" style="width: 100%; border-radius: 5%;">
              </div>
              <div class="col-md-8">
                <div class="row">
                    <p>Description</p>
                    <p>Details</p>
                </div>
                <div class="row">
                    <input type="date">
                </div>
                
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Rent</button>
        </div>
      </div>
    </div>
  </div>


<div class="container">
    <h1>Rent</h1>
    <div class="row">
        <div class="col-md-8">

            <button type="button" class="btn btn-secondary" style="width: 6rem">Rooms</button>
            <button type="button" class="btn btn-secondary" style="width: 6rem">Rentals</button>
            <button type="button" class="btn btn-secondary" style="width: 6rem">Other</button>

            <div style="margin-top: 1rem">

              <div style="margin-top: 1rem; margin-bottom: 1rem">
                  <div style="border-bottom: 1px solid gray;"></div>
              </div>
              <div data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                  <div class="row">
                      <div class="col-md-3">
                          <img src="{{ URL::asset('img\kubo_fan_room\kubo1.jpg'); }}" alt="" style="width: 100%; border-radius: 10%;">
                      </div>
                      <div class="col-md-9">
                          <p>Kubo Fan Room</p>
                          <p>Description</p>
                      </div>
                  </div>
              </div>
            
            </div>

            <div style="margin-top: 1rem">

              <div style="margin-top: 1rem; margin-bottom: 1rem">
                  <div style="border-bottom: 1px solid gray;"></div>
              </div>
              <div data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                  <div class="row">
                      <div class="col-md-3">
                          <img src="{{ URL::asset('img\superior_room\superior1.jpg'); }}" alt="" style="width: 100%; border-radius: 10%;">
                      </div>
                      <div class="col-md-9">
                          <p>Superior Room</p>
                          <p>Description</p>
                      </div>
                  </div>
              </div>
              
            </div>

            <div style="margin-top: 1rem">

              <div style="margin-top: 1rem; margin-bottom: 1rem">
                  <div style="border-bottom: 1px solid gray;"></div>
              </div>
              <div data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                  <div class="row">
                      <div class="col-md-3">
                          <img src="{{ URL::asset('img\villa_room\villa1.jpg'); }}" alt="" style="width: 100%; border-radius: 10%;">
                      </div>
                      <div class="col-md-9">
                          <p>Villa</p>
                          <p>Description</p>
                      </div>
                  </div>
              </div>
            
            </div>

            <div style="margin-top: 1rem">

              <div style="margin-top: 1rem; margin-bottom: 1rem">
                  <div style="border-bottom: 1px solid gray;"></div>
              </div>
              <div data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                  <div class="row">
                      <div class="col-md-3">
                          <img src="{{ URL::asset('img\couple_bhut\couple1.jpg'); }}" alt="" style="width: 100%; border-radius: 10%;">
                      </div>
                      <div class="col-md-9">
                          <p>Couple Beach Hut</p>
                          <p>Description</p>
                      </div>
                  </div>
              </div>
            
            </div>
            <div style="margin-top: 1rem">

              <div style="margin-top: 1rem; margin-bottom: 1rem">
                  <div style="border-bottom: 1px solid gray;"></div>
              </div>
              <div data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                  <div class="row">
                      <div class="col-md-3">
                          <img src="{{ URL::asset('img\regular_bhut\regular1.jpg'); }}" alt="" style="width: 100%; border-radius: 10%;">
                      </div>
                      <div class="col-md-9">
                          <p>Regular Beach Hut</p>
                          <p>Description</p>
                      </div>
                  </div>
              </div>
            
            </div>
            <div style="margin-top: 1rem">

              <div style="margin-top: 1rem; margin-bottom: 1rem">
                  <div style="border-bottom: 1px solid gray;"></div>
              </div>
              <div data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                  <div class="row">
                      <div class="col-md-3">
                          <img src="{{ URL::asset('img\barkada_bhut\barkada1.jpg'); }}" alt="" style="width: 100%; border-radius: 10%;">
                      </div>
                      <div class="col-md-9">
                          <p>Barkada Beach Hut</p>
                          <p>Description</p>
                      </div>
                  </div>
              </div>
            
            </div>
            
        </div>
        
        <div class="col-md-4">
            <div class="card mb-3">

                <h3 class="card-header">Summary</h3>
                <div class="card-body">
                    
                </div>
                
        </div>
    </div>
</div>
@endsection