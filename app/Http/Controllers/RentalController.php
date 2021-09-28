<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        //
        $rental = DB::table('rentals')->get();
        return view('rental',compact('rental'));
        
    }

    public function create()
    {
        //
        
    }
    public function store(Request $request)
    {
        //
        Rental::create($request->all());
        return response()->json([
            'code'=>0
        ]);
    }
    public function show()
    {
        $rentals = DB::table('rentals')->get();
        return view('components.rentalComponents.rentalsTable', compact('rentals'));
    }
    public function edit(Rental $rental)
    {
        //
    }
    public function update(Request $request, Rental $rental)
    {
        //
    }
    public function destroy(Rental $rental)
    {
        //
        $query = $rental->delete();
        $rental->delete();

        if($query){
            return response()->json([
                'message' => 'Data deleted successfully!'
                ]);
        }else{
            return response()->json([
                'message' => 'Data deleted unsuccessfully!'
                ]);
        }
    }
}
