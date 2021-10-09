<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Rental;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

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
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:rentals',
            'price' => 'required|Numeric',
            'description' => 'required|string|max:255',
            'picture' => 'required|string|max:255',
        ]);
        
        if ($validated->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validated->errors()->toArray()
            ]);
        }

        Rental::create($request->all());

        return response()->json([
            'status'=> 1,
            'msg' => "New rental has been successfully created."
        ]);
    }

    public function show(Rental $rental)
    {
        // 
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
        $query = $rental->delete();

        if(!$query){
            return response()->json([
                'code' => 0,
                'message' => 'Data deleted successfully!'
            ]);
        }

        return response()->json([
            'code' => 1,
            'message' => 'Data deleted unsuccessfully!'
        ]);
    }

    public function showAllRental()
    {
        $rentals = DB::table('rentals')->get();
        return view('components.rentalComponents.rentalsTable', compact('rentals'));
    }
}
