<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Room;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = DB::table('rooms')->get();
        $amenities = array('Free Wifi','Free Breakfast');
        return view('room',compact('rooms','amenities'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    { 
        $input = $request->all();

        $validated = Validator::make($request->all(), [
            'room_type' => 'required|string|max:255|unique:rooms',
            'room_count' => 'required|Numeric',
            'description' => 'required|string',
            'price' => 'required|Numeric',
            'amenities' => 'array',
            'recommended_capacity' => 'required|Numeric',
            'maximum_capacity' => 'required|Numeric',
            'image_paths' => 'required|array', 
        ]);
        
      
        if ($validated->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validated->errors()->toArray()
            ]);
        }

        foreach($input['image_paths'] as $key => $value){
            $newImageName = 'rooms/' .$request->room_type. '/' . $request->room_type .'_'. $key.'.'. $value->extension();
            $value->move(public_path('img/rooms/'.$request->room_type), $newImageName);
            $origName[] = $newImageName;
        }

        foreach($input['amenities'] as $key => $value){
            $allAmenities[] = $value;
        }

        Room::create([
            'room_type' => $request->input('room_type'),
            'room_count' => $request->input('room_count'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'recommended_capacity' => $request->input('recommended_capacity'),
            'maximum_capacity' => $request->input('maximum_capacity'),
            'amenities' => json_encode($allAmenities),
            'image_paths' => json_encode($origName),
        ]);

        return response()->json([
            'status'=> 1,
            'msg' => "New rental has been successfully created."
        ]);
        
        return response()->json([
            'status'=> 1,
            'msg' => "New rental has been successfully created."
        ]);
    }

    public function show()
    {
        // $rooms = DB::table('rooms')->get();
        // return view('components.roomComponents.roomsTable', compact('rooms'));
    }

    public function edit(Room $room)
    {
        return view('components.roomComponents.updateForm',compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:rooms,name,'.$room->id,
            'description' => 'required|string',
            'price' => 'required|Numeric',
            'recommended_capacity' => 'required|Numeric',
            //'picture' => 'required|string|max:255',
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

        //$room->update($request->all());
        $room->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'recommended_capacity' =>$request->input('recommended_capacity'),
            'image_path' => $newImageName,
        ]);
        

        return response()->json([
            'status' => 1,
            'message' => 'Data Updated successfully!'
        ]);
    }

    public function destroy(Room $room)
    {
        $query = $room->delete();
        $room->delete();

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
    
    public function showAllRoom()
    {
        $rooms = DB::table('rooms')->get();
        return view('components.roomComponents.roomsTable', compact('rooms'));
    }
    public function getAmenities()
    {
        $amenities = array('Free Wifi','Free Breakfast');
        return response()->json([
            'code' => 1,
            'message' => $amenities
        ]);
    }
}
