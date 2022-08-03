<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends BaseController
{
    function admin(){
        return view('auth.login');
    }

    function login(Request $request){
        $request->validate([
            'name'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt($request->only('name','password'))){
            return redirect('dashboard');
        }
        return redirect('login')->withErrors('Login Details are not valid');
    }

    function register_view(){
        return view('auth.register');
    }
    function register(Request $request){
       $request->validate([
           'name'=>'required',
           'email'=>'required|unique:users|email',
           'password'=>'required|confirmed'
       ]);

       User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>Hash::make($request->password)
       ]);
        if(Auth::attempt($request->only('email','password'))){
            return redirect('dashboard');
        }
        return redirect('register')->withErrors('Error');
    }
    function dashboard(){
        return view('dashboard');
    }
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect('');
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
