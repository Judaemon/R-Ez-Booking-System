<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

// para magamit yung DB for sql
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $accountTypes = array('Admin', 'User', 'Test', 'Choose course...');

    public function index()
    {
        return view('user', with(['accountTypes' => $this->accountTypes]));
    }

    // Show form
    public function create()
    {
        //
    }

    // Save 
    public function store(Request $request)
    {
        //
    }

    // public function show(User $user)
    public function show()
    {
        $users = DB::table('users')->get();
        // $users = DB::table('users')->where('preferences->dining->meal', 'salad')->get();

        // resources\views\components\adminComponents\userTable.blade.php
        return view('components.adminComponents.userTable', compact('users'));
    }

    // Show form
    public function edit(User $user)
    {
        //
    }

    // Update
    public function update(Request $request, User $user)
    {
        //
    }

    // Delete
    public function destroy(User $user)
    {
        //
    }
}
