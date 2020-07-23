<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index(){
        return view('login');
    }
    public function login(Request $request)
    {
       if (Auth::attempt(['email' => $request->login_email, 'password' => $request->login_password])) {
            return redirect()->route('admin.allUsers');
        }
        return redirect()->route('admin.login')->withErrors('Email veya şifre hatalı!');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
