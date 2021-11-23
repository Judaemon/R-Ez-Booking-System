<table id="bookingTable" class="table table-tripped table-hover table-light">
    <thead class="table-dark text-center">
        <th>User Id</th>
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
            <td> {{$booking->user_id}} </td>
            <td> {{$booking->payment_method}} </td>
            <td> {{$booking->amount_paid}} </td>
            <td> {{$booking->total_price}} </td>
            <td> {{$booking->booking_status}} </td>
            {{-- <td> {{$booking->start}} </td>
            <td> {{$booking->end}} </td> --}}
            <td>
                <div class='d-flex justify-content-around'>
                    <button class="btn btn-info" type="button" data-bs-toggle="modal" 
                        data-bs-target="#viewBookingModal{{$booking->id}}">View</button>

                        @if ($booking->booking_status == "Pending")
                            <form method="POST" class="acceptForm" action="{{route('acceptBooking',$booking->id)}}" id="acceptForm">
                                @csrf
                                @method('POST')
                                <input hidden value='{{$booking->id}}' type='text' name='id' required>
                                <button booking_id="{{$booking->id}}" type='submit' class='btn btn-success 
                                    mx-2 myButton' style="background-color: #1fd0bf; color:#fff">Accept</button>
                            </form>

                            <form method="POST" class="declineForm" action="{{route('declineBooking',$booking->id)}}" id="declineForm">
                                @csrf
                                @method('POST')
                                <input hidden value='{{$booking->id}}' type='text' name='id' required>
                                <button booking_id="{{$booking->id}}" type='submit' class='btn mx-2 myButton' 
                                        id='bookingCancelBtn' style="background-color: #f8c753; color:#fff">Decline</button>
                            </form>
                        @elseif($booking->booking_status == "Booked")
                            <form method="POST" class="ongoingForm" action="{{route('declineBooking',$booking->id)}}" id="declineForm">
                                @csrf
                                @method('POST')
                                <input hidden value='{{$booking->id}}' type='text' name='id' required>
                                <button booking_id="{{$booking->id}}" type='submit' class='btn btn-danger mx-2 myButton' 
                                        id='bookingOngoingBtn' style="background-color: #eb7e30; color:#fff">On-Going</button>
                            </form>
                        @elseif($booking->booking_status == "On-going")
                            <form method="POST" class="ongoingForm" action="{{route('declineBooking',$booking->id)}}" id="declineForm">
                                @csrf
                                @method('POST')
                                <input hidden value='{{$booking->id}}' type='text' name='id' required>
                                <button booking_id="{{$booking->id}}" type='submit' class='btn btn-danger mx-2 myButton' 
                                        id='bookingOngoingBtn' style="background-color: #eb7e30; color:#fff">On-Going</button>
                            </form>
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
