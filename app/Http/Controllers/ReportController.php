<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Room;

use App\Models\Booking;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    // public function index()
    // {
       
    // }
    
    // public function create()
    // {
    //     //
    // }

    // public function store(Request $request)
    // {
    //     //
    // }

    // public function show($id)
    // {
    //     //
    // }

    // public function edit($id)
    // {
    //     //
    // }

    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // public function destroy($id)
    // {
    //     //
    // }

    // private function countData($status){

    //     $dataCount = DB::table('transactions')
    //                 ->select(DB::raw('count(*) as total_rows'))
    //                 ->where('transaction_status', '=', $status,)
    //                 ->get();

    //     return $dataCount;
    // }

    // public function getGraphData(){
    //     $filterList = ["On-going", "Booked", "Cancelled", "Finished"];
    //     $yeet = "";
    //     foreach ($filterList as $key => $value) {
    
    //       if ($key == 3) {
            
    //         $yeet .= $this->countData($value);

    //         $graphData = Transactions::where('transaction_status', '=', 'Cancelled')->count(); 
            
    //         $graphData = $yeet->count();
    //         $graphData .= $this->countData($value);
    //       }else {

    //         $yeet .= $this->countData($value);

    //         $graphData = Transactions::where('transaction_status', '=', "$yeet")->count().", ";
            
    //         $graphData = $yeet->count().", ";
    //         $graphData .= $this->countData($value).", ";
    //       }
    //     }
    
    //     return response()->json([
    //         'status'=> 1,
    //         'graphData' => $graphData,
    //         'yeet' => $yeet,
    //         'value' => $value
    //     ]);
    //   }

    public function getBookingCount()
    {
        // $total = DB::table('users')
        // ->select(DB::raw('count(*) as userCount'), 'account_type')
        //    //   DB::raw('count(*) as total_rows') 
        // ->groupBy('account_type')
        // ->get();

        $total = DB::table('bookings')
        ->select(DB::raw('count(*) as bookingCount'), 'booking_status')
        ->groupBy('booking_status')
        ->get();

        return response()->json([
            'status' => 0,
            'bookingCount' => $total->toArray()
        ]);
    }

}
