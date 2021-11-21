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

        $rooms = DB::select("SELECT *, (rooms.room_count - t2.occupiedRoom) as availableRoom
        FROM `rooms` 
        LEFT JOIN (	SELECT rooms.id AS occupiedRoomsID, count(*) AS occupiedRoom
                FROM `rooms`
                LEFT JOIN `room_booking`
                    ON rooms.id = room_booking.room_id
                    WHERE (room_booking.start BETWEEN '".$checkIn."' AND '".$checkOut."') 
                    OR (room_booking.end BETWEEN '".$checkIn."' AND '".$checkOut."')
                GROUP BY rooms.room_type) AS t2
        ON rooms.id = t2.occupiedRoomsID");

        // return response()->json([
        //     'status'=> 1,
        //     'checkIn' => $checkIn,
        //     'checkOut' => $checkOut,
        //     'transactions' => $rooms
        // ]);

        return view('components.bookingComponents.roomList', compact('rooms'));
    }

    public function getAvailableRentals(Request $request)
    {
        $checkIn = $request->input('checkIn');
        $checkOut = $request->input('checkOut');
        
        $rentals = DB::select("SELECT *, (rentals.rental_count - t2.occupiedRental) as availableRental
        FROM `rentals` 
        LEFT JOIN (	SELECT rentals.id AS occupiedRentalsID, count(*) AS occupiedRental
                FROM `rentals`
                LEFT JOIN `booking_rental`
                    ON rentals.id = booking_rental.rental_id
                    WHERE (booking_rental.start BETWEEN '".$checkIn."' AND '".$checkOut."') 
                    OR (booking_rental.end BETWEEN '".$checkIn."' AND '".$checkOut."')
                GROUP BY rentals.rental_type) AS t2
        ON rentals.id = t2.occupiedRentalsID");

        //  return response()->json([
        //     'status'=> 1,
        //     'transactions' => $rentals
        // ]);

        return view('components.bookingComponents.rentalList', compact('rentals'));
    }
}
