<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
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

    }

    public function edit(Request $profile)
    {
        $profile = Auth::user();

        return view('components.profileComponents.profileEdit', compact('profile'));
        
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return view('profile', compact('user'));
    }

    public function destroy($id)
    {
        //
    }
}
