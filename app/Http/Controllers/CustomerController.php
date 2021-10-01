<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // $customer = DB::table('customers')->get();
        // return view('customers',compact('customer'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        // Customer::create($request->all());
        // return response()->json([
        //     'code'=>0
        // ]);
    }
    public function show()
    {
        // $customers = DB::table('customers')->get();
        // return view('customers', compact('customers'));
    }
    public function edit(Customer $customer)
    {
        //
    }
    public function update(Request $request, Customer $customer)
    {
        //
    }
    public function destroy(Customer $customer)
    {
    //     $query = $customer->delete();
    //     $customer->delete();

    //     if($query){
    //         return response()->json([
    //             'message' => 'Data deleted successfully!'
    //             ]);
    //     }else{
    //         return response()->json([
    //             'message' => 'Data deleted unsuccessfully!'
    //             ]);
    //     }
     }
}
