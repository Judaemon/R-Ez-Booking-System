<table id="rentalTable" class="table table-tripped table-hover table-light">
    <thead class="table-dark text-center">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Count</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            {{-- <th scope="col">Image</th> --}}
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rentals as $rental)
        <tr>
            <td>{{$rental->id}}</td>
            <td>{{$rental->rental_type}}</td>
            <td>{{$rental->rental_count}}</td>
            <td>{{$rental->price}}</td>
            <td>{{$rental->description}}</td>
            {{-- <td> 
            <img 
                src="{{ asset('img/' . $rental->image_path) }}"
                alt="wow" height="200" width="200">
            </td> --}}
            <td>
                <div class='d-flex justify-content-around'>
                    <form method="POST" class="deleteRental" dataId="{{$rental->id}}"
                        action="{{route('rental.destroy',$rental->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" style="width: 100px; margin: 2px;" type="submit">Delete</button>
                    </form>
    
                    {{-- div for copying the interaction btn and form above --}}
                    <div style="display: block; margin-top: 0em; margin-block-end: 1em;">
                        <button room_id="{{$rental->id}}" type='button' class='btn btn-info mx-2 myButton' id='rentalUpdateBtn' data-bs-toggle='modal'
                        data-bs-target='#updateRentalModal'>Update</button>
                    </div>
                </div>
                {{-- <a href="" class="btn btn-info updateButton" style='width: 100px; margin: 2px;'>Edit</a> --}}
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
