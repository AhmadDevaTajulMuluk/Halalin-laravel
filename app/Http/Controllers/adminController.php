<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
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
            'password' => 'required|confirmed',
        ]);

        $admin = new Admin([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $admin->save();
        return redirect()->route('admin.login')->with('success', 'Registrasi Berhasil, Silahkan Login!');
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
            return redirect()->route('admin.login')->with('error', 'Username atau Password yang dimasukkan tidak valid');
        }
    }

    public function dashboard()
    {
        $admins = Admin::all();
        return view('admin.dashboard-admin', compact('admins'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:admins',
            'password' => 'required',
        ]);

        $admin = new Admin([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $admin->save();
        return redirect()->route('admin.dashboard-admin')->with('success', 'Admin created successfully');
    }

    public function edit($admin_id)
    {
        $admin = Admin::findOrFail($admin_id);
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, $admin_id)
    {
        $request->validate([
            'name' => 'required',
            'username' => [
                'required',
                Rule::unique('admins')->ignore($admin_id, 'admin_id'),
            ],
        ]);

        $admin = Admin::findOrFail($admin_id);
        $admin->name = $request->name;
        $admin->username = $request->username;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();
        return redirect()->route('admin.dashboard-admin')->with('success', 'Admin updated successfully');
    }

    public function destroy($admin_id)
    {
        $admin = Admin::findOrFail($admin_id);
        $admin->delete();
        return redirect()->route('admin.dashboard-admin')->with('success', 'Admin deleted successfully');
    }
}
