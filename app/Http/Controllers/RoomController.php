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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        $rooms = DB::table('rooms')->get();
        return view('components.room.roomsTable', compact('rooms'));
    }

    public function edit(Room $room)
    {
        //
    }

    public function update(Request $request, Room $room)
    {
        //
    }

    public function destroy(Room $room)
    {
        //
    }
}
