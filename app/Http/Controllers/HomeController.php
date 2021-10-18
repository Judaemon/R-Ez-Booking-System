<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        //  $validated = Validator::make($request, [
        //     'firstname' => ['required', 'string', 'max:255'],
        //     'lastname' => ['required', 'string', 'max:255'],
        //     'username' => ['required', 'string', 'max:255', 'unique:users'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'contact_number' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^(09)[0-9]{9}$/'],
        //     'address' => ['required','string', 'max:255'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     'password_confirmation'=> ['required', 'string', 'min:8'],
        // ]);
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'contact_number' => ['required', 'string', 'max:255'],
            'address' => ['required','string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'password_confirmation'=> ['nullable', 'string', 'min:8'],
        ]);
        
        $data = User::find($request->id);
        $data->firstname=$request->firstname;
        $data->lastname=$request->lastname;
        $data->email=$request->email;
        $data->contact_number=$request->contact_number;
        $data->address=$request->address;
        if ($request->password != null) {
            $data->password= Hash::make($request->password);
        }
        $data->save();
        return redirect()->route('viewProfile');
    }


}
