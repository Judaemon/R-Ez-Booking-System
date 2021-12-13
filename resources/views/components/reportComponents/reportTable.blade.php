<table class="table table-tripped table-light mt-2">
    <thead class="table-dark text-center justify-content-center">
      <tr>
        <th class="p-2 py-3" scope="col">ID</th>
        <th class="p-2 py-3" scope="col">User Id</th>
        <th class="p-2 py-3" scope="col">Payment Method</th>
        <th class="p-2 py-3" scope="col">Amount Paid</th>
        <th class="p-2 py-3" scope="col">Total Price</th>
        <th class="p-2 py-3" scope="col">Booking Status</th>
        <th class="p-2 py-3" scope="col">Date Start</th>
        <th class="p-2 py-3" scope="col">Date End</th>
        <th class="p-2 py-3" scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($filterTables as $filterTable)
      <tr>
        <td class="px-1 text-break">{{$filterTable->id}}</td>
        <td class="px-1 text-break">{{$filterTable->user_id}}</td>
        <td class="px-1 text-break">{{$filterTable->payment_method}}</td>
        <td class="px-1 text-break">{{$filterTable->amount_paid}}</td>
        <td class="px-1 text-break">{{$filterTable->total_price}}</td>
        <td class="px-1 text-break">{{$filterTable->booking_status}}</td>
        <td class="px-1 text-break">{{$filterTable->start}}</td>
        <td class="px-1 text-break">{{$filterTable->end}}</td>
        <td class="px-1 text-break">
          <button class="btn btn-primary">
            Print Reciept
          </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>