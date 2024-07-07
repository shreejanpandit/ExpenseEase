<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    

    public function login()
    {
        return view('auth.login');
    }

   public function loginPost(Request $request){
    $rules = [
        
        "email" => "required",
        "password" => "required",

    ];
    $validator =   Validator::make(
        $request->all(),
        $rules
    );

    //check if validation pass
    if ($validator->fails()) {
        return redirect()->route('login')->withInput()->withErrors($validator);
    }

    $credentials = $request->only("email","password");
    if (Auth::attempt($credentials)) {
        return redirect()->intended(route("transaction.index"));
    }

   }


   public function register()
    {
        return view('auth.register');
    }

   public function registerPost(Request $request){
 
     $rules = [
        "name" => "required|string|max:255",
        "email" => "required|string|email|max:255|unique:users",
        "password" => "required|string|min:8|confirmed",

    ];
    $validator =   Validator::make(
        $request->all(),
        $rules
    );

    //check if validation pass
    if ($validator->fails()) {
        return redirect()->route('auth.register')->withInput()->withErrors($validator);
    }

    //inserting data into database
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();
    return redirect()->route('login')->with('success', 'New account created successfully. Please login.');
     
 
   }

   public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
