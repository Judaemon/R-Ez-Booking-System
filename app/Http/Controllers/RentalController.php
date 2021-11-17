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
            'image_path' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        
        if ($validated->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validated->errors()->toArray()
            ]);
        }
        $newImageName = 'uploaded/' . time() . '-' . $request->name . '.' . 
        $request->image_path->extension();

        $request->image_path->move(public_path('img/uploaded'), $newImageName);
        
        //Rental::create($request->all());
        Rental::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image_path' => $newImageName,
        ]);

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
        return view('components.rentalComponents.updateRentalForm',compact('rental'));
    }

    public function update(Request $request, Rental $rental)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:rentals,name,'.$rental->id,
            'price' => 'required|Numeric',
            'description' => 'required|string|max:255',
            'image_path' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        
        if ($validated->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validated->errors()->toArray()
            ]);
        }
        
        $newImageName = 'uploaded/' . time() . '-' . $request->name . '.' . 
        $request->image_path->extension();

        $request->image_path->move(public_path('img/uploaded'), $newImageName);

        //$rental->update($request->all());
        $rental->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image_path' => $newImageName,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Data Updated successfully!'
        ]);
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
