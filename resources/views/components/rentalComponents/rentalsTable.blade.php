<div class="table-responsive">
<table id="rentalTable" class="table table-tripped table-hover table-light">
    <thead class="table-dark text-center">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Type</th>
            <th scope="col">Count</th>
            <th scope="col">Price</th>
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
            <td class="w-25">
                    {{-- div for copying the interaction btn and form above --}}
                    <div class="d-flex justify-content-around">
                        <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#viewRentalModal{{$rental->id}}">View</button>
                        
                        <button room_id="{{$rental->id}}" type='button' class='btn btn-info mx-2 myButton'
                            id='rentalUpdateBtn' data-bs-toggle='modal'
                            data-bs-target='#updateRentalModal'>Update</button>

                            <form method="POST" class="deleteRental" dataId="{{$rental->id}}"
                                action="{{route('rental.destroy',$rental->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                    </div>
                {{-- <a href="" class="btn btn-info updateButton" style='width: 100px; margin: 2px;'>Edit</a> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

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
                        <div id="carouselExampleControls{{$rental->id}}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach (json_decode($rental->image_paths) as $image_path)
                                    <div class="carousel-item @if($loop->first)active @endif">
                                            <img src="{{asset('/img/'.$image_path) }}" style="width: 100%; height: 500px; object-fit: cover;">
                                    </div>
                                @endforeach                   
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{$rental->id}}" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{$rental->id}}" data-bs-slide="next">
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
                                <p>{{$rental->description}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h3><i class="bi bi-tag"></i> {{$rental->price}}</h3>
                            </div>
                            
                            <div class="col-6">
                                <h3><i class="bi bi-person"></i> {{$rental->rental_count}} Count</h3>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endforeach
