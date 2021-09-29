<table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Description</th>
        <th scope="col">Picture</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rentals as $rental)
        <tr>
            <td>{{$rental->id}}</td>
            <td>{{$rental->name}}</td>
            <td>{{$rental->price}}</td>
            <td>{{$rental->description}}</td>
            <td>{{$rental->picture}}</td>
            <td>
                <a href="" class="btn btn-info updateButton" style='width: 100px; margin: 2px;'>Edit</a> 
                <form method="POST" class="deleteRental" dataId="{{$rental->id}}" action="{{route('rental.destroy',$rental->id)}}">
                    @csrf 
                    @method('DELETE')
                    <button class="btn btn-danger" style="width: 100px; margin: 2px;" type="submit">Delete</button>
            </form>
            </td>
 
        </tr>
        @endforeach
    </tbody>
    
</table>
