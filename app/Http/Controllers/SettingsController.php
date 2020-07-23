<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index(){
        $id=Auth::user()->id;
        return view('settings',compact('id'));
    }

    public function resetUserPassword(Request $request){
        $userId = Auth::id();
        $user= Admin::find($userId);
        if ($request->newPassword != $request->confirmPassword){
            return redirect()->back()->withErrors('Şifreleri kontrol ediniz!');
        }
        $user->password = Hash::make($request->confirmPassword);
        $user->save();
        toastr()->success('Şifre başarıyla güncellendi!');
        return redirect()->back();
    }
}
