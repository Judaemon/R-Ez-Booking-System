<table id="bookingTable" class="table table-tripped table-hover table-light">
    <thead class="table-dark text-center">
        <th>ID</th>
        <th>User Id</th>
        <th>Payment Method</th>
        <th>Amount Paid</th>
        <th>Total Price</th>
        <th>Booking Status</th>
        <th>Description</th>
        <th>Date End</th>
        <th>Date Start</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($bookings as $booking)
        <tr>
            <td> {{$booking->id}} </td>
            <td> {{$booking->user_id}} </td>
            <td> {{$booking->payment_method}} </td>
            <td> {{$booking->amount_paid}} </td>
            <td> {{$booking->total_price}} </td>
            <td> {{$booking->booking_status}} </td>
            <td> {{$booking->description}} </td>
            <td> {{$booking->start}} </td>
            <td> {{$booking->end}} </td>
            <td>
                <div class='d-flex justify-content-around'>
                    {{-- <form method="POST" action="{{route('transactions.cancel',$transaction->id)}}" class="cancelDishForm">
                        @csrf
                        @method('DELETE')
                        <button transaction_id="{{$transaction->id}}" type='submit' class='dishDeleteBtn myButton btn btn-danger mx-2'>Delete</button>
                    </form> --}}
    
                    {{-- div for copying the interaction btn and form above --}}
                    {{-- <div style="display: block; margin-top: 0em; margin-block-end: 1em;">
                        <button transaction_id="{{$transaction->id}}" type='button' class='btn btn-info mx-2 myButton' id='transactionUpdateBtn' data-bs-toggle='modal'
                        data-bs-target='#updateTransactionModal'>Update</button>
                    </div> --}}
                </div>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
