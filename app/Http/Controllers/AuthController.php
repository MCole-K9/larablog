<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){

        if ($request->method() == "GET"){
            return view("auth.register");
        }

       $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required|min:6",
            "password_confirmation" => "required|same:password"
        ]);



        User::create([
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "password" => Hash::make($request->input("password"))
        ]);

        return redirect()->route("login")->with("success", "You have successfully registered");
    }

    public function login(Request $request){

        if ($request->isMethod("GET")){
            return view("auth.login");
        }

        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required|min:6"
        ]);


        if(Auth::attempt($credentials)){
            return redirect()->route("Home")->with("success", "You have successfully logged in");
        }


        return redirect()->route('login')->withErrors("Invalid credentials");









    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("Home")->with("success", "You have successfully logged out");

    }
}
