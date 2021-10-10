@extends("layouts.app")

@section('script')
  <script src="{{ asset('js/admin/room.js') }}"></script>
@endsection

@section('content')

    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoomModal">
            Add Room
        </button>
            <div id="roomTable" class="pt-2">
              {{-- Table Generated from room.js --}}
            </div>
    </div>
    
  <!-- Add Modal -->
  <div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- Add Form --}}
            <form id="addRoomForm" method="POST" action="{{route('room.store')}}">
                @csrf
                <div class="form-group mb-2">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Room Name">
                </div>

                <div class="form-group mb-2">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Room Description">
                </div>  

                <div class="form-group mb-2">
                    <label>Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Room Price">
                </div>

                <div class="form-group mb-2">
                    <label>Picture</label>
                    <input type="text" class="form-control" name="picture" placeholder="Room Price">
                </div>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Update Modal -->
  <div class="modal fade" id="editRoomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Room</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="editRoomForm">
            {{-- Table Generated from admin.js --}}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection