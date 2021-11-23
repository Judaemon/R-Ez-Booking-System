@extends('layouts.app')

@section('script')
<script src="{{ asset('js/booking.js') }}"></script>
@endsection

<style>
    #test {
        background: url('{{ URL::asset('/img/welcome_page/welcomecoverphoto.png') }}') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
    }

    .myPointer {
        cursor: pointer;
    }
</style>

@section('content')
<div id="test" class="">
    <div class="row justify-content-center p-2 p-md-5 m-0">
        <div class="border border-white rounded-2 border-3 row bg-primary mx-2 w-100 ">
            <form class="text-white" id="addBookingForm" method="POST" enctype="multipart/form-data" action="{{route('booking.store')}}">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="row">
                            <div class="form-group col-12 col-md-6 ">
                                <label for="start" class="col-md-5 col-form-label">Check In</label>
                                <input id="input_start" type="date" min class="m-0 form-control" name="start"
                                    placeholder="yyyy/mm/dd">

                                <span class="invalid-feedback fw-bold error-text start_error" role="alert"></span>
                            </div>
                            <div class="form-group col-12 col-md-6 ">
                                <label for="end" class="col-md-5 col-form-label">Check Out</label>
                                <input id="input_end" type="date" min="2021-10-17" class="m-0 form-control" name="end"
                                    placeholder="yyyy/mm/dd">

                                <span class="invalid-feedback fw-bold error-text end_error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="adult" class="col-md-5 col-form-label">Adult (18+)</label>
                                <input id="input_adult" type="number" class="m-0 form-control" name="adult" placeholder="1"
                                    value="1">

                                <span class="invalid-feedback fw-bold error-text adult_error"></span>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="children" class="col-md-5 col-form-label">Children (0-17)</label>
                                <input id="input_children" type="text" class="m-0 form-control" name="children"
                                    placeholder="0" value="0">

                                <span class="invalid-feedback fw-bold error-text children_error"></span>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="description" class="col-md-5 col-form-label">Description</label>
                            <textarea id="input_description" placeholder="Description (max 250 word)" class="m-0 form-control"
                                style="height: 120px" maxlength="250" name="description"></textarea>

                            <span class="invalid-feedback fw-bold error-text description_error"></span>
                        </div>

                        <div class="form-group col-12">
                            <label for="address" class="col-md-5 col-form-label">Address</label>
                            <input id="input_address" type="text" class="m-0 form-control" name="address"
                                    placeholder="Address">
                            
                            <span class="invalid-feedback fw-bold error-text address_error"></span>
                            <div class="px-1">
                                <p class="small text-danger">*For covid protocol.</p>
                            </div>
                        </div>

                        {{-- href of btn here for easy viewing of btn --}}
                        <span id="viewingRental"></span>

                        {{-- BOOKED ITEMS --}}
                        <div class="col-12">
                            <label for="description" class="col-md-5 col-form-label pb-0">Rooms Booked</label>
                            
                            <div id="bookedRoomsContainer">
                                <div class="form-group col-12 d-flex justify-content-between my-1 text-center">
                                    <p class="m-0 form-control p-2"> No rooms booked </p>
                                </div>
                            </div>
                        </div>

                        {{-- RESERVED RENTALS --}}
                        <div class="col-12">
                            <label for="description" class="col-md-5 col-form-label pb-0">Reserved Rentals</label>
                            
                            <div id="reservedRentalContainer">
                                <div class="form-group col-12 d-flex justify-content-between my-1 text-center">
                                    <p class="m-0 form-control p-2"> No rentals reserved </p>
                                </div>
                            </div>
                            {{-- <div class="form-group col-12 d-flex justify-content-between my-1">
                                <input id="room_id" type="text" class="m-0 form-control" name="room_id"
                                    placeholder="0" value="name of room">
                                <a href="#" class="btn btn-danger selectRoomBtn w-25 selectRoomBtn">Remove</a>
                            </div> --}}
                        </div>
                        <div class="form-group col-12">
                            <label for="total_price" class="col-md-5 col-form-label">Total price</label>
                            <input id="total_price" type="number" readonly class="m-0 form-control" name="total_price"
                                placeholder="total price">

                            <span class="invalid-feedback fw-bold error-text total_price_error"></span>
                        </div>
                    </div>

                    {{-- LEFT SIDE --}}
                    <div class="col-12 col-md-5">
                        <div id="menu">
                            <div class="panel list-group">
                                <a href="#" class="col-md-12 myPointer" data-bs-toggle="collapse" data-bs-target="#roomsContainer"
                                    data-bs-parent="#menu" aria-expanded="true">
                                    <label class="col-form-label text-white myPointer">Rooms List</label>
                                    <span class="m-2 bi bi-house-fill text-white"></span>
                                </a>
                                <div id="roomsContainer" class="sublinks collapse show">
                                    <div class="bg-light col-12 text-black p-2 text-center">
                                        Select Check-in and Check-out dates
                                    </div>
                                </div>

                                <a href="#" class="col-md-12" data-bs-toggle="collapse" data-bs-target="#rentalContainer"
                                    data-bs-parent="#menu">
                                    <label class="col-form-label text-white">Select
                                        Rentals</label>
                                    <span class="m-2 bi bi-bucket-fill text-white"></span>

                                </a>
                                <div id="rentalContainer" class="sublinks collapse show">
                                    <div class="bg-light col-12 text-black p-2 text-center">
                                        Select Check-in and Check-out dates
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 mt-2">
                        <button type="submit" class="float-end w-25 btn btn-primary bg-white text-black">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
