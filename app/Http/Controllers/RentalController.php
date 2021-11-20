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
        $rental = DB::table('rentals')->get();
        //$test = DB::table('rentals')->select("image_paths")->get();
        //dd($rental['image_paths']);
        return view('rental',compact('rental'));
        
    }

    public function create()
    {
        //
        
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validated = Validator::make($input, 
        [
            'rental_type' => 'required|string|max:255|unique:rentals',
            'rental_count' => 'required|Numeric',
            'price' => 'required|Numeric',
            'description' => 'required|string|max:255',
            'image_paths' => 'required|array',
        ]
        );
        
        if ($validated->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validated->errors()->toArray()
            ]);
        }

        foreach($input['image_paths'] as $key => $value){
            $newImageName = 'rentals/' .$request->rental_type. '/' . $request->rental_type .'_'. $key.'.'. $value->extension();
            $value->move(public_path('img/rentals/'.$request->rental_type), $newImageName);
            $origName[] = $newImageName;
        }

        Rental::create([
            'rental_type' => $request->input('rental_type'),
            'rental_count' => $request->input('rental_count'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image_paths' => json_encode($origName),
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
            'rental_type' => 'required|string|max:255|unique:rentals,name,'.$rental->id,
            'rental_count' => 'required|Numeric',
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
            'rental_type' => $request->input('name'),
            'rental_count' => $request->input('count'),
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
