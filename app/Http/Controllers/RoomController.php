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
        return view('room',compact('rooms'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        // Room::create($request->all());
        // return response()->json([
        //     'code'=>0
        // ]);
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:rooms',
            'description' => 'required|string',
            'price' => 'required|Numeric',
            'recommended_capacity' => 'required|Numeric',
            'picture' => 'required|string|max:255',
        ]);
        
        if ($validated->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validated->errors()->toArray()
            ]);
        }

        Room::create($request->all());

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
            'picture' => 'required|string|max:255',
        ]);
        
        if ($validated->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validated->errors()->toArray()
            ]);
        }

        $room->update($request->all());
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
}
