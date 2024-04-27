<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formlogin(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email Harus Di isi',
            'password.required'=>'Password Harus Di isi',
        ]);

        $infologin =[
            'email' =>$request->email,
            'password' =>$request->password,
        ];
        if(Auth::attempt($infologin)){
            return redirect('/dashboard')->with('success','Anda Berhasil Login');
        }else{
            return redirect('/login')->withErrors('Anda Gagal Login Email dan Password Salah')->withInput()->with('success','Login Berhasil');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success','Anda Sudah Logout');
    }
}
