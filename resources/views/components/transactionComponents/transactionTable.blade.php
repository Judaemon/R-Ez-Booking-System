<table id="dishTable" class="table table-tripped table-hover table-light">
    <thead class="table-dark text-center">
        <th>ID</th>
        <th>User Name</th>
        <th>Room Name</th>
        <th>Payment Status</th>
        <th>Title</th>
        <th>Booking Date</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
        <tr>
            <td> {{$transaction->id}} </td>
            <td> {{$transaction->user_name}} </td>
            <td> {{$transaction->room_name}} </td>
            <td> {{$transaction->payment_status}} </td>
            <td> {{$transaction->title}} </td>
            <td> {{$transaction->booking_date}} </td>
            <td>
                <div class='d-flex justify-content-around'>
                    <form method="POST" action="{{route('transactions.cancel',$transaction->id)}}" class="cancelDishForm">
                        @csrf
                        @method('DELETE')
                        <button transaction_id="{{$transaction->id}}" type='submit' class='dishDeleteBtn myButton btn btn-danger mx-2'>Delete</button>
                    </form>
    
                    {{-- div for copying the interaction btn and form above --}}
                    <div style="display: block; margin-top: 0em; margin-block-end: 1em;">
                        <button transaction_id="{{$transaction->id}}" type='button' class='btn btn-info mx-2 myButton' id='transactionUpdateBtn' data-bs-toggle='modal'
                        data-bs-target='#updateTransactionModal'>Update</button>
                    </div>
                </div>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
