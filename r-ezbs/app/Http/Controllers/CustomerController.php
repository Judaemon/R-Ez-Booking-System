<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        //
        return view('customers');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Customer $customer)
    {
        //
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
        //
    }
}
