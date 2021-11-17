<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Booking $Booking)
    {
        //
    }

    public function edit(Booking $Booking)
    {
        //
    }

    public function update(Request $request, Booking $Booking)
    {
        //
    }

    public function destroy(Booking $Booking)
    {
        //
    }

    public function getAllTransaction()
    {
        $transactions = DB::table('transactions')->get();
        $color = '#000';
        //dd($transactions);
        // if ($transactions->-items->id == 4) {
        //     $color = "#FFFF00";
        // }
 //        created_at->format('Y-m-d')
          foreach ($transactions as $transaction)
          {
            if ($transaction->transaction_status == "Booked") {
                $color = "#FFA500";
            }else if ($transaction->transaction_status == "On-going"){
                $color = "#0000FF";
            }else if ($transaction->transaction_status == "Finished"){
                $color = "#00FF00";
            }else if ($transaction->transaction_status == "Cancelled"){
                $color = "#FF0000";
            }
           $events[] = [
            'id'=>$transaction->id,
            'user_id'=>$transaction->user_id,
            'room_id'=>$transaction->room_id,
            'rental_id'=>$transaction->rental_id,
            'payment_method'=>$transaction->payment_method,
            'total_price'=>$transaction->total_price,
            'transaction_status'=>$transaction->transaction_status,
            'title'=>$transaction->title,
            'start'=>$transaction->start,
            'end'=>$transaction->end,
            'description'=>$transaction->description,
            'color'=>$color
           ];
        }
       return $events;

        // $events[] = [
        //     'title' => trim($source['prefix'] . " " . $model->{$source['field']}
        //         . " " . $source['suffix']),
        //     'start' => $crudFieldValue,
        //     'url'   => route($source['route'], $model->id),
        // ];

        // foreach ($transactions as $key => $transaction) {
        //     // array_push($event, 1, 2);

        // }

        // return response()->json($transactions);
        // // $events->toJson(JSON_PRETTY_PRINT);

        // return response()->json([
        //     'status'=> 1,
        //     'transactions' => $transactions
        // ]);
    }

    public function showAllTransaction()
    {
        $booking = DB::table('booking')
        ->join('users', 'users.id', '=', 'booking.user_id')
        ->join('rooms', 'rooms.id', '=', 'booking.room_id')
        ->select('users.firstname', 'users.lastname', 'booking.id', 'booking.title', 'booking.payment_status', 'transactions.start', 'transactions.end')
        ->get();

        return view('components.transactionComponents.transactionTable', compact('booking'));
    }

    public function getAvailableRooms(Request $request)
    {
        $checkIn = $request->input('checkIn');
        $checkOut = $request->input('checkOut');
//         SELECT * FROM `rooms` 
// LEFT JOIN `bookings`
// ON rooms.id  = bookings.id
        $rooms = DB::table('rooms')
        ->leftJoin('bookings', 'rooms.id', '=', 'bookings.room_id')
        // ->select('rooms.room_type', 'rooms.room_count', 'rooms.description', 'rooms.price', 'rooms.recommended_capacity', 'rooms.maximum_capacity','rooms.image_paths', 'rooms.amenities','rooms.id', 'bookings.start', 'bookings.end')
        // ->orwhere(function($q)use ($checkOut) {
        //     $q->whereDate('bookings.start', '>', $checkOut)
        //     ->orwhereNull('bookings.start');
        // })
        // ->orwhere(function($q) use ($checkIn) {
        //     $q->whereDate('bookings.end', '<', $checkIn)
        //     ->orwhereNull('bookings.end');
        // })
        ->get();

        return response()->json([
            'status' => 0,
            'rooms' => $rooms
        ]);

        // dd($rooms);
        // return view('components.bookingComponents.roomList', compact('rooms'));
    }

    public function getAvailableRentals(Request $request)
    {
        $checkIn = $request->input('checkIn');
        $checkOut = $request->input('checkOut');
        
        $rentals = DB::table('rentals')
        ->leftJoin('booking', 'rentals.id', '=', 'booking.rental_id')
        ->select('rentals.name', 'rentals.description', 'rentals.price', 'rentals.image_path', 'rentals.id', 'transactions.start', 'transactions.end')
        ->orwhere(function($q)use ($checkOut) {
            $q->whereDate('booking.start', '>', $checkOut)
            ->orwhereNull('booking.start');
        })
        ->orwhere(function($q) use ($checkIn) {
            $q->whereDate('booking.end', '<', $checkIn)
            ->orwhereNull('booking.end');
        })
        ->get();

        return view('components.bookingComponents.rentalList', compact('rentals'));
    }
}
