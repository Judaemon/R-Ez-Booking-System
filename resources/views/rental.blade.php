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
                        <input type="text" class="form-control" id="input_name" name="name" placeholder="Rental Name">
                        <span class="invalid-feedback fw-bold error-text name_error" role="alert"></span>
                    </div>

                    <div class="form-group mb-2">
                        <label>Price</label>
                        <input type="number" class="form-control" id="input_price" name="price"
                            placeholder="Rental Price">
                        <span class="invalid-feedback fw-bold error-text price_error" role="alert"></span>
                    </div>

                    <div class="form-group mb-2">
                        <label>Description</label>
                        <input type="text" class="form-control" id="input_description" name="description"
                            placeholder="Rental Description">
                        <span class="invalid-feedback fw-bold error-text description_error" role="alert"></span>
                    </div>

                    <div class="form-group mb-2">
                        <label>Picture</label>
                        <input type="text" class="form-control" id="input_picture" name="picture" placeholder="Picture">
                        <span class="invalid-feedback fw-bold error-text picture_error" role="alert"></span>
                    </div>

                    <div class="mt-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add New Rental</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
