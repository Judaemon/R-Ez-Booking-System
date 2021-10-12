<?php

namespace App\Http\Controllers;

use App\Models\Rental;

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
        
        $events = [];

        // $events[] = [
        //     'title' => trim($source['prefix'] . " " . $model->{$source['field']}
        //         . " " . $source['suffix']),
        //     'start' => $crudFieldValue,
        //     'url'   => route($source['route'], $model->id),
        // ];

        // foreach ($transactions as $key => $transaction) {
        //     // array_push($event, 1, 2);

        // }

        return response()->json($transactions);
        // $events->toJson(JSON_PRETTY_PRINT);

        return response()->json([
            'status'=> 1,
            'transactions' => $transactions
        ]);
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
}
