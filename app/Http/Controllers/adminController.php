<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('admin/register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:admins',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
        $admin = new Admin([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->username),
        ]);
        $admin->save();
        return redirect()->route('login')->with('Success', 'Registrasi Berhasil, Silahkan Login!');
    }

    public function login()
    {
        $data['title'] = 'Login';
        return view('admin/login', $data);
    }

    public function login_action(Request $request)
    {
        Session::flash('username', $request->username);

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard-admin')->with('success', 'Berhasil Login');
        } else {
            return redirect()->route('login')->with('error', 'Username atau Password yang dimasukkan tidak valid');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard-admin');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}


