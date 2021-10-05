@extends("layouts.app")

@section('content')

    <div class="container">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRentalModal">
            Add Rental
        </button>
            <div id="rentalTable">
              {{-- Table Generated from admin.js --}}
            </div>
    </div>
    
  <!-- Modal -->
  <div class="modal fade" id="addRentalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Rental</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- Add Form --}}
            <form id="addRentalForm" method="POST" action="{{route('rental.store')}}">
                @csrf

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Rental Name">
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Rental Price">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Rental Description">
                </div>  

                <div class="form-group">
                    <label>Picture</label>
                    <input type="text" class="form-control" name="picture" placeholder="Picture">
                </div>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="js/rental.js"></script>
@endsection