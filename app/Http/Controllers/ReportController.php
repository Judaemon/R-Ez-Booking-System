<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    public function index()
    {
       
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    private function countData($status){

        $dataCount = DB::table('transactions')
                    ->select(DB::raw('count(*) as total_rows'))
                    ->where('payment_status', '=', $status,)
                    ->get();

        return $dataCount;
    }

    public function getGraphData(){
        $filterList = ["On-going", "Pending", "Cancelled", "Finished"];
        $graphData = "";
        foreach ($filterList as $key => $value) {
    
          if ($key == 3) {
            $graphData .= $this->countData($value);
          }else {
            $graphData .= $this->countData($value).", ";
          }
        }
    
        return response()->json([
            'status'=> 1,
            'graphData' => $graphData
        ]);
      }
}
