<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getUserCount()
    {
        $total = DB::table('users')
        ->select(DB::raw('count(*) as userCount'), 'account_type')
        //       DB::raw('count(*) as total_rows')
        ->groupBy('account_type')
        ->get();

        return response()->json([
            'status' => 0,
            'userCount' => $total->toArray()
        ]);
    }

}
