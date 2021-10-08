<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Room;
use Illuminate\Http\Request;

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
        Room::create($request->all());
        return response()->json([
            'code'=>0
        ]);
    }

    public function show()
    {
        $rooms = DB::table('rooms')->get();
        return view('components.roomComponents.roomsTable', compact('rooms'));
    }

    public function edit(Room $room)
    {
        return view('components.roomComponents.updateForm',compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        //
    }

    public function destroy(Room $room)
    {
        $query = $room->delete();
        $room->delete();

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
