<table id="rentalTable" class="table table-tripped table-hover table-light">
    <thead class="table-dark text-center">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Type</th>
            <th scope="col">Count</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rentals as $rental)
        <tr>
            <td>{{$rental->id}}</td>
            <td>{{$rental->rental_type}}</td>
            <td>{{$rental->rental_count}}</td>
            <td>{{$rental->price}}</td>
            <td>{{$rental->description}}</td>
            <td>
                {{-- <img 
                src="{{ asset('img/' . $picture) }}"
                alt="wow" height="200" width="200"> --}}
                {{-- {{($rental->image_paths)}} --}}
                <?php foreach (json_decode($rental->image_paths)as $picture) { ?>
                {{-- <img src="{{ asset('img/' . $picture) }}" style="height:120px; width:200px"/> --}}
                <p>{{$picture}}</p>
                <?php } ?>
            </td>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewRentalModal{{$rental->id}}">View</button>
                <div class='d-flex justify-content-around'>
                    <form method="POST" class="deleteRental" dataId="{{$rental->id}}"
                        action="{{route('rental.destroy',$rental->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" style="width: 100px; margin: 2px;" type="submit">Delete</button>
                    </form>
                    {{-- div for copying the interaction btn and form above --}}
                    <div style="display: block; margin-top: 0em; margin-block-end: 1em;">
                        <button room_id="{{$rental->id}}" type='button' class='btn btn-info mx-2 myButton'
                            id='rentalUpdateBtn' data-bs-toggle='modal'
                            data-bs-target='#updateRentalModal'>Update</button>
                    </div>
                </div>
                {{-- <a href="" class="btn btn-info updateButton" style='width: 100px; margin: 2px;'>Edit</a> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach ($rentals as $rental)
<!-- View Modal -->

<div class="modal fade " id="viewRentalModal{{$rental->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Room Description</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">



            <div class="row">
                    <div class="col-12 col-md-6">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ URL::asset('/img/kubo_fan_room/kubo1.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/kubo_fan_room/kubo3.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ URL::asset('/img/kubo_fan_room/kubo2.jpg') }}" style="width: 100%; height: 500px; object-fit: cover;">
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                    </div>

                    <div class="col-12 col-md-6">

                        <div class="row">
                            <div class="col-8">
                                <h2>{{$rental->rental_type}}</h2>
                            </div>   
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <p>Experience one of what represents the Filipino Culture with our Kubo Room. The kubo which design allows for great airflow enables it to trully allow the sea air breaths throughout the room. 
                                    With its bunk beds we made sure that theres enough room for you and up to three other persons.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h3><i class="bi bi-tag"></i> 2500 php</h3>
                            </div>
                            
                            <div class="col-6">
                                <h3><i class="bi bi-person"></i> 2-4 persons</h3>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <h3><i class="bi bi-plus-square"></i> Amenities</h3>
                                <p>
                                    (Insert Amenities here)
                                </p>
                            </div> 
                        </div>
                    </div>
                </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endforeach
