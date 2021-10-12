<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->account_type == 'user') {
            return view('components\customerComponents\home');
        }
        
        return view('components\adminComponents\home');
    }

    public function viewProfile(User $user)
    {
        // $id = $user->input('id');
        $user =  User::find($user);

        // $profile = DB::table('user')->get();
        return view('profile',compact('user'));
    }

    public function edit(Request $user)
    {
        // $user =  User::find($user);
        // $user = User::where('id',$user)->first();
        dump($user);

        return view('profile', compact('user'));
    }
}
