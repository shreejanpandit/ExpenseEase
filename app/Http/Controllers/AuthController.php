<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    

    public function login()
    {
        return view('auth.login');
    }

   public function loginPost(Request $request){

   }


   public function register()
    {
        return view('auth.register');
    }

   public function registerPost(Request $request){

    $request->validate([
        "name" => "required|string|max:255",
        "email" => "required|string|email|max:255|unique:users",
        "password" => "required|string|min:8|confirmed",
    ]);
     // Create a new user
     $user = new User;
     $user->name = $request->name;
     $user->email = $request->email;
     $user->password = Hash::make($request->password);
     if ($user->save()) {
        // Redirect or perform other actions after registration
     return redirect()->route('auth.login')->with('success', 'Registration successful. Please login.');
     }
     return redirect(route('auth.register'));
 
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
    return redirect()->route('auth.login')->with('success', '{{$request->name}}Registered successfully. Please login.');
     
 
   }
}
