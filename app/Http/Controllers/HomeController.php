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

    public function viewProfile()
    {
        $user = Auth::user();

        // dd($user); // for testing

        return view('profile',compact('user'));
    }

    // if user wants to edit their own information 
    public function editProfile()
    {
        $profile = Auth::user();
        return view('components.profileComponents.profileEdit', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        // //dd($request->all());
        // $user->update($request->all());
        // //$user = $request->all();
        // // $user = Auth::user();
        // return redirect()->route('viewProfile', compact('user'));
        $data = User::find($request->id);
        $data->account_type=$request->account_type;
        $data->username=$request->username;
        $data->firstname=$request->firstname;
        $data->lastname=$request->lastname;
        $data->contact_number=$request->contact_number;
        $data->address=$request->address;
        $data->email=$request->email;
        $data->email=$request->email;
        $data->save();
        return redirect()->route('viewProfile');
    }


}
