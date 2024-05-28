<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    //menampilkan form isi email & password
    function index(){
        return view('user.login');
    }

    //autentikasi dari fungsi index
    function login(Request $request){
        Session::flash('username',$request->username);

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            //kalau auth sukses
            return redirect('dashboard')->with('success','Berhasil Login');
        } else {
            //kalau auth gagal
            return redirect('login')->with('error','Username atau Password yang dimasukkan tidak valid');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('login')->with('success','berhasil Logout');
    }

    function register(){
        return view('user.register');
    }

    function create(Request $request){
        Session::flash('username',$request->username);
        Session::flash('email',$request->email);

        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:5|confirmed',
            'email' => 'required|email|unique:users',
        ],[
            'username.required' => 'Username Wajib Diisi',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Password Setidaknya diisi 5 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah pernah digunakan'
        ]);

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' =>Hash::make($request->password)
        ];
        User::create($data);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            //kalau auth sukses
            return redirect('dashboard')->with('success',Auth::user()->username.'Berhasil ');
        } else {
            //kalau auth gagal
            return redirect('login')->with('error','Username atau Password yang dimasukkan tidak valid');
        }
    }
}
