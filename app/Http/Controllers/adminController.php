<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Ustadz;

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

    public function showUstadz()
    {
        $ustadz = Ustadz::all();
        return view('admin.tb_ustadz', compact('ustadz'));
    }

    public function createUstadz()
    {
        return view('admin.create_ustadz');
    }

    public function storeUstadz(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:ustadz',
            'password' => 'required|confirmed',
            'phone' => 'required',
        ]);

        Ustadz::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
        ]);

        return redirect()->route('admin.ustadz')->with('success', 'Ustadz created successfully');
    }

    // public function editUstadz($ustadz_id)
    // {
    //     $ustadz = Ustadz::findOrFail($ustadz_id);
    //     return view('admin.edit_ustadz', compact('ustadz'));
    // }

    // public function updateUstadz(Request $request, $ustadz_id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'username' => [
    //             'required',
    //             Rule::unique('ustadz')->ignore($ustadz_id, 'ustadz_id'),
    //         ],
    //         'phone' => 'required',
    //         'password' => 'nullable|confirmed',
    //     ]);

    //     try {
    //         $password = $request->filled('password') ? bcrypt($request->password) : Ustadz::findOrFail($ustadz_id)->password;

    //         DB::statement('CALL UpdateUstadz(?, ?, ?, ?, ?)', [
    //             $ustadz_id,
    //             $request->name,
    //             $request->username,
    //             $request->phone,
    //             $password
    //         ]);

    //         return redirect()->route('admin.ustadz')->with('success', 'Ustadz updated successfully');
    //     } catch (\Exception $e) {
    //         return redirect()->route('admin.edit_ustadz', ['ustadz_id' => $ustadz_id])
    //             ->withErrors(['error' => 'Update failed: ' . $e->getMessage()]);
    //     }
    // }

    public function editUstadz($ustadz_id)
    {
        $ustadz = Ustadz::findOrFail($ustadz_id);
        return view('admin.edit_ustadz', compact('ustadz'));
    }

    public function updateUstadz(Request $request, $ustadz_id)
    {
        $request->validate([
            'name' => 'required',
            'username' => [
                'required',
                Rule::unique('ustadz')->ignore($ustadz_id, 'ustadz_id'),
            ],
            'phone' => 'required',
            'password' => 'nullable|confirmed',
        ]);

        DB::beginTransaction();

        try {
            $ustadz = Ustadz::findOrFail($ustadz_id);
            $ustadz->update([
                'name' => $request->name,
                'username' => $request->username,
                'phone' => $request->phone,
                'password' => $request->filled('password') ? bcrypt($request->password) : $ustadz->password,
            ]);

            DB::commit();
            return redirect()->route('admin.ustadz')->with('success', 'Ustadz updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.edit_ustadz', ['ustadz_id' => $ustadz_id])
                ->withErrors(['error' => 'Update failed: ' . $e->getMessage()]);
        }
    }

    public function destroyUstadz($ustadz_id)
    {
        Ustadz::findOrFail($ustadz_id)->delete();
        return redirect()->route('admin.ustadz')->with('success', 'Ustadz deleted successfully');
    }
}
