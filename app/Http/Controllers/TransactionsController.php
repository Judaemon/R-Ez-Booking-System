<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
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

    public function show(Transactions $transactions)
    {
        //
    }

    public function edit(Transactions $transactions)
    {
        //
    }

    public function update(Request $request, Transactions $transactions)
    {
        //
    }

    public function destroy(Transactions $transactions)
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
        $transactions = DB::table('transactions')
        ->join('users', 'users.id', '=', 'transactions.user_id')
        ->join('rooms', 'rooms.id', '=', 'transactions.room_id')
        ->select('users.firstname', 'users.lastname', 'transactions.id', 'transactions.title', 'transactions.payment_status', 'transactions.start', 'transactions.end')
        ->get();

        return view('components.transactionComponents.transactionTable', compact('transactions'));
    }

    public function getAvailableRooms(Request $request)
    {
        $checkIn = $request->input('checkIn');
        $checkOut = $request->input('checkOut');
        
        $rooms = DB::table('rooms')
        ->leftJoin('transactions', 'rooms.id', '=', 'transactions.room_id')
        ->select('rooms.name', 'rooms.description', 'rooms.price', 'rooms.recommended_capacity', 'rooms.image_path', 'rooms.id', 'transactions.start', 'transactions.end')
        ->orwhere(function($q)use ($checkOut) {
            $q->whereDate('transactions.start', '>', $checkOut)
            ->orwhereNull('transactions.start');
        })
        ->orwhere(function($q) use ($checkIn) {
            $q->whereDate('transactions.end', '<', $checkIn)
            ->orwhereNull('transactions.end');
        })
        ->get();

        return view('components.transactionComponents.roomList', compact('rooms'));
    }

    public function getAvailableRentals(Request $request)
    {
        $checkIn = $request->input('checkIn');
        $checkOut = $request->input('checkOut');
        
        $rentals = DB::table('rentals')
        ->leftJoin('transactions', 'rentals.id', '=', 'transactions.rental_id')
        ->select('rentals.name', 'rentals.description', 'rentals.price', 'rentals.image_path', 'rentals.id', 'transactions.start', 'transactions.end')
        ->orwhere(function($q)use ($checkOut) {
            $q->whereDate('transactions.start', '>', $checkOut)
            ->orwhereNull('transactions.start');
        })
        ->orwhere(function($q) use ($checkIn) {
            $q->whereDate('transactions.end', '<', $checkIn)
            ->orwhereNull('transactions.end');
        })
        ->get();

        return view('components.transactionComponents.rentalList', compact('rentals'));
    }
}
