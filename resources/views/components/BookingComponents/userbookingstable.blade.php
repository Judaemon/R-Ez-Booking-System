<table id="bookingTable" class="table table-tripped table-hover table-light">
    <thead class="table-dark text-center">
        <th>Booking Id user</th>
        <th>Payment Method</th>
        <th>Amount Paid</th>
        <th>Total Price</th>
        <th>Booking Status</th>
        {{-- <th>Date Start</th>
        <th>Date End</th> --}}
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($bookings as $booking)
        <tr>
            <td> {{$booking->id}} </td>
            <td> {{$booking->payment_method}} </td>
            <td> {{$booking->amount_paid}} </td>
            <td> {{$booking->total_price}} </td>
            <td> {{$booking->booking_status}} </td>
            {{-- <td> {{$booking->start}} </td>
            <td> {{$booking->end}} </td> --}}
            <td>
                <div class='row'>
                    <div class="col">
                        <button class="btn btn-info w-100" type="button" data-bs-toggle="modal"
                        data-bs-target="#viewBookingModal{{$booking->id}}">View</button>
                      </div>
                </div>
                               
                    @if ($booking->booking_status == "Pending")
                    <div class="row pt-2">  
                        <div class="col">
                            <form method="POST" class="acceptForm" action="{{route('acceptBooking',$booking->id)}}" id="acceptForm">
                                @csrf
                                @method('POST')
                                <input hidden value='{{$booking->id}}' type='text' name='id' required>
                                <button booking_id="{{$booking->id}}" type='submit' class='btn btn-success 
                                     myButton w-100' style="background-color: #1fd0bf; color:#fff">Accept</button>
                            </form>
                        </div>
                        <div class="col">
                            <form method="POST" class="declineForm" action="{{route('declineBooking',$booking->id)}}" id="declineForm">
                                @csrf
                                @method('POST')
                                <input hidden value='{{$booking->id}}' type='text' name='id' required>
                                <button booking_id="{{$booking->id}}" type='submit' class='btn  myButton w-100' 
                                        id='bookingCancelBtn' style="background-color: #f8c753; color:#fff">Decline</button>
                            </form>
                        </div>
                    </div>

                    @elseif($booking->booking_status == "Booked")
                        <div class="col pt-2">
                            <form method="POST" class="ongoingForm" action="{{route('ongoingBooking',$booking->id)}}" id="declineForm">
                                @csrf
                                @method('POST')
                                <input hidden value='{{$booking->id}}' type='text' name='id' required>
                                <button booking_id="{{$booking->id}}" type='submit' class='btn btn-danger myButton w-100' 
                                        id='bookingOngoingBtn' style="background-color: #eb7e30; color:#fff">On-Going</button>
                            </form>
                        </div>
                    @elseif($booking->booking_status == "On-going")
                        <div class="col pt-2">
                            <form method="POST" class="finishForm" action="{{route('finishBooking',$booking->id)}}" id="declineForm">
                                @csrf
                                @method('POST')
                                <input hidden value='{{$booking->id}}' type='text' name='id' required>
                                <button booking_id="{{$booking->id}}" type='submit' class='btn btn-danger myButton w-100' 
                                        id='bookingAcceptBtn' style="background-color: #a93790; color:#fff">Finish</button>
                            </form>
                        </div>
                    @endif       
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach ($bookings as $booking)
<div class="modal fade " id="viewBookingModal{{$booking->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Booking Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
