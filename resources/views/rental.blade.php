@extends("layouts.app")

@section('script')
<script src="{{ asset('js/admin/rental.js') }}"></script>
@endsection

@section('content')

<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRentalModal">
        Add Rental
    </button>
    <div id="rentalTable" class="pt-2">
        {{-- Table Generated from rental.js --}}
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

                    <div class="form-group mb-2">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Rental Name">
                    </div>

                    <div class="form-group mb-2">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Rental Price">
                    </div>

                    <div class="form-group mb-2">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Rental Description">
                    </div>

                    <div class="form-group mb-2">
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
