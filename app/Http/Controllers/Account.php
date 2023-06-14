<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Users;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class Account extends Controller
{
    

    public function show()
    {
        $roles= Role::all();

        return view('auth.register',['roles' =>$roles]); //return register page

    }

    public function showLogin()
    {
        return view('auth.login'); //return login page

    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required',

        ]);

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        }
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == '1') {
                return redirect()->intended('/');
            } 
            elseif(($user->role == '2')){

            }
            else {
                return redirect()->intended('/');
            }
        }
        
        return redirect('/')->with('error', 'Invalid login credentials');


    }

    public function store(Request $request)
    {

        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->all(), [

                'email' => 'required|email|max:100',
                'name' => 'required|min:5|max:1000',
                'password' => 'required|confirmed|max:16|min:6',

            ]);

            if ($validator->fails()) {

                return redirect()->back()

                    ->withErrors($validator)

                    ->withInput();

            }


            $user = DB::table('users')->where('email', $request->email)->first();
            if (!$user) {
                $newUser = new Users();
                $newUser->email = $request->email;
                $newUser->password = Hash::make($request->password);
                $newUser->name = $request->name;
                $newUser->role_id = $request->role;
                $newUser->save();

                return redirect()->route('welcome.login')->with('message', 'Create success!');
            } else {

                return redirect()->route('welcome.register')->with('message', 'Create failed!');

            }

        }

    }

    public function logout()
    {

        Auth::logout();

        return redirect()->route('welcome.login');

    }
}
