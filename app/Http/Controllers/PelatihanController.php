<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\Pelatihan;
use App\Models\User;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::where('user_id', auth()->id())->first();
        $pelatihans = Pelatihan::all();
        return view('user.pelatihan', compact('profile', 'pelatihans'));
    }

    public function render()
    {
        $profile = Profile::where('user_id', auth()->id())->first();
        return view('components.navbar', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profile = Profile::where('user_id', auth()->id())->first();
        $user = User::where('id', auth()->id())->first();
        $pelatihans = Pelatihan::all();
        $pelatihanIni = Pelatihan::where('nomor_bab', $id)->first();

        $prevBab = Pelatihan::where('nomor_bab', '<', $id)->orderBy('nomor_bab', 'desc')->first();
        $nextBab = Pelatihan::where('nomor_bab', '>', $id)->orderBy('nomor_bab', 'asc')->first();

        if ($pelatihanIni->nomor_bab == 3 && $user->pelatihan_completion == 0) {
            return redirect()->back()->with('error', 'Tidak bisa mengakses ke bab 3 jika bab 2 belum selesai');
        }

        if ($pelatihanIni->nomor_bab == 2 && $user->pelatihan_completion != 2) {;
            $user->pelatihan_completion = 1;
            $user->save();
        }

        if ($pelatihanIni->nomor_bab == 3 && $user->pelatihan_completion != 3) {;
            $user->pelatihan_completion = 2;
            $user->save();
        }

        $totalbab = $pelatihans->count();
        $completedBab = $user->pelatihan_completion;;
        $completionPercentage = $totalbab > 0 ? ($completedBab / $totalbab) * 100 : 0;

        return view('user.pelatihan', compact('profile', 'user', 'pelatihans', 'pelatihanIni', 'prevBab', 'nextBab', 'completionPercentage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
