<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return view('room');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Room $room)
    {
        //
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
