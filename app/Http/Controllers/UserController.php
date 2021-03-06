<?php

namespace App\Http\Controllers;

// para magamit yung DB for sql
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $accountTypes = array('Admin', 'User', 'Test', 'Choose course...');

    public function index()
    {
        $users = DB::table('users')->get();
        return view('user', compact('users'), with(['accountTypes' => $this->accountTypes]));
    }

    // Show form
    public function create()
    {
        //
    }

    // Save 
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'account_type' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'contact_number' => 'required|Numeric',
            // 'contact_number' => 'required|regex:/^[(][0-9]{2}[)][\s][0-9]{3}[-][0-9]{4}$/',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'password' => 'required|string|min:8|max:255',

        ]);
        
        if ($validated->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validated->errors()->toArray()
            ]);
        }

        $request['password']  = Hash::make($request['password']);

        User::create($request->all());

        return response()->json([
            'status'=> 1,
            'msg' => "New rental has been successfully created."
        ]);

        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->name . '-' . $request->image->extension();

        $request->image->move(public_path('img.users', $newImageName));

        $user = User::create([
            'image_path' => $newImageName
        ]);

        dd($newImageName);

        // User::create($request->all());
        // return response()->json([
        //     'code'=>0
        // ]);

    //    $data = User::make($request, [
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'accountTypes' => ['required', 'string', 'max:255'],
    //         'firstname' => ['required', 'string', 'max:255'],
    //         'lastname' => ['required', 'string', 'max:255'],
    //         'contact_number' => ['required', 'int', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);

    //     User::create([
    //         'email' => $data['email'],
    //         'accountTypes' => $data['accountType'],
    //         'firstname' => $data['firstname'],
    //         'lastname' => $data['lastname'],
    //         'contact_number' => $data['contact_number'],
    //         'password' => Hash::make($data['password']),
    //     ]);

    }

    //public function show(User $user)
    public function show()
    {
        // $users = DB::table('users')->where('preferences->dining->meal', 'salad')->get();
        // resources\views\components\adminComponents\userTable.blade.php
        
        // $rooms = DB::table('users')->get();
        // return view('components.roomComponents.roomsTable', compact('users'));
    }

    // Show form
    public function edit(User $user)
    {
        return view('components.userComponents.updateUserForm',compact('user'));
    }

    // Update
    public function update(Request $request, User $user)
    {
        $validated = Validator::make($request->all(), [
            'account_type' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:users,email'.$user->id,
            // 'contact_number' => 'required|Numeric',
            // // 'contact_number' => 'required|regex:/^[(][0-9]{2}[)][\s][0-9]{3}[-][0-9]{4}$/',
            // 'firstname' => 'required|string|max:255',
            // 'lastname' => 'required|string|max:255',
            // 'password' => 'required|string|min:8|max:255',

        ]);
        
        if ($validated->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validated->errors()->toArray()
            ]);
        }

        $user->update($request->all());
        return response()->json([
            'status' => 1,
            'message' => 'Data Updated successfully!'
        ]);
    }

    // Delete
    public function destroy(User $user)
    {
        $query = $user->delete();
        $user->delete();

        if($query){
            return response()->json([
                'message' => 'Data deleted successfully!'
                ]);
        }else{
            return response()->json([
                'message' => 'Data deleted unsuccessfully!'
                ]);
        }
    }
    public function showAllUser()
    {
        $users = DB::table('users')->get();
        return view('components.userComponents.userTable', compact('users'));
    }
}
