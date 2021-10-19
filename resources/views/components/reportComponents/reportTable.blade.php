<table class="table table-tripped table-light mt-2">
    <thead class="thead-dark text-center justify-content-center">
    @foreach ($datacounts as $datacount)
    <tr>
        <th class="p-2 py-3" scope="col">Order ID</th>
        <th class="p-2 py-3" scope="col">Customer name</th>
        <th class="p-2 py-3" scope="col">Bento name</th>
        {{-- <th class="p-2 py-3" scope="col">Dish names</th>
        <th class="p-2 py-3" scope="col">payment_status</th>
        <th class="p-2 py-3" scope="col">total_price</th>
        <th class="p-2 py-3" scope="col">status</th>
        <th class="p-2 py-3" scope="col">title</th>
        <th class="p-2 py-3" scope="col">start</th>
        <th class="p-2 py-3" scope="col">end</th>
        <th class="p-2 py-3" scope="col">description</th> --}}
    </tr>
    </thead>
    <tbody>
    <tr>
        <th class="px-1 text-break">{{$datacount->id}}</th>
        <td class="px-1 text-break"></td>
        <td class="px-1 text-break"></td>
        {{-- <td class="px-1 text-break"></td>
        <td class="px-1 text-break"></td>
        <td class="px-1 text-break"></td>
        <td class="px-1 text-break"></td> --}}
    </tr>
    @endforeach
    </tbody>
</table>