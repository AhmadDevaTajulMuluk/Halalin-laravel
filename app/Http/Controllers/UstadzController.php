<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Profile;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Ustadz;

class UstadzController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('ustadz')->check()) {
            return redirect()->route('ustadz.dashboard');
        }

        return view('ustadz.login');
    }

    public function login(Request $request)
    {
        Session::flash('username', $request->username);

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('ustadz')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('ustadz.dashboard')->with('success', 'Berhasil Login');
        } else {
            return redirect()->route('ustadz.login')->with('error', 'Username atau Password yang dimasukkan tidak valid');
        }
    }

    // public function showRegisterForm()
    // {
    //     return view('ustadz.register');
    // }

    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'username' => 'required|unique:ustadz',
    //         'password' => 'required|confirmed',
    //         'phone' => 'required',
    //     ]);

    //     $ustadz = new Ustadz([
    //         'name' => $request->name,
    //         'username' => $request->username,
    //         'password' => Hash::make($request->password),
    //         'phone' => $request->phone,
    //     ]);
    //     $ustadz->save();

    //     return redirect()->route('ustadz.login')->with('success', 'Registrasi berhasil, silahkan login!');
    // }

    public function dashboard()
    {
        $ustadz = Ustadz::where('ustadz_id', auth('ustadz')->id())->first();
        $articles = Article::latest()->take(5)->get();
        $testimoni = Testimoni::all();
        return view('ustadz.dashboard', compact('ustadz', 'articles', 'testimoni'));
    }

    public function render()
    {
        $ustadz = Ustadz::where('user_id', auth()->id())->first();
        return view('components.navbarustadz', compact('ustadz'));
    }

    public function artikel()
    {
        $ustadz = Ustadz::where('ustadz_id', auth('ustadz')->id())->first();
        $articles = Article::paginate(5); // Menampilkan 10 artikel per halaman
        return view('ustadz.artikel', compact('ustadz', 'articles'));
    }

    public function chat()
    {
        $ustadz = Ustadz::where('ustadz_id', auth('ustadz')->id())->first();
        return view('ustadz.chat', compact('ustadz'));
    }

    // public function index()
    // {
    //     $ustadz = Ustadz::all();
    //     return view('ustadz.index', compact('ustadzs'));
    // }

    // public function create()
    // {
    //     return view('ustadz.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'username' => 'required|unique:ustadz',
    //         'password' => 'required|confirmed',
    //         'phone' => 'required',
    //     ]);

    //     $ustadz = new Ustadz([
    //         'name' => $request->name,
    //         'username' => $request->username,
    //         'password' => Hash::make($request->password),
    //         'phone' => $request->phone,
    //     ]);
    //     $ustadz->save();

    //     return redirect()->route('ustadz.index')->with('success', 'Ustadz created successfully');
    // }

    // public function edit($ustadz_id)
    // {
    //     $ustadz = Ustadz::find($ustadz_id);
    //     return view('ustadz.edit', compact('ustadz'));
    // }

    // public function update(Request $request, $ustadz_id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'username' => 'required|unique:ustadz,username,' . $ustadz_id,
    //         'phone' => 'required',
    //     ]);

    //     $ustadz = Ustadz::find($ustadz_id);
    //     $ustadz->name = $request->name;
    //     $ustadz->username = $request->username;
    //     $ustadz->phone = $request->phone;

    //     if ($request->filled('password')) {
    //         $ustadz->password = Hash::make($request->password);
    //     }

    //     $ustadz->save();

    //     return redirect()->route('ustadz.index')->with('success', 'Ustadz updated successfully');
    // }

    // public function destroy($ustadz_id)
    // {
    //     $ustadz = Ustadz::find($ustadz_id);
    //     $ustadz->delete();

    //     return redirect()->route('ustadz.index')->with('success', 'Ustadz deleted successfully');
    // }

    public function logout(Request $request)
    {
        Auth::guard('ustadz')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('ustadz.login');
    }
}
