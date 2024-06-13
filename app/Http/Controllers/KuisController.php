<?php

namespace App\Http\Controllers;

use App\Models\Kuis\Jawaban;
use App\Models\Kuis\Soal;
use App\Models\User;
use Illuminate\Http\Request;

class KuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $soals = Soal::with('jawabans')->get();
        $soals = $soals->shuffle();
        return view('user.kuis', compact('soals'));
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
        if ($request->has('jawaban')) {
            $jawabanBenar = 0;
            $jawabanDiberikan = [];
            $jawabanDipilih = $request->jawaban;
            

            foreach ($request->jawaban as $jawabanId) {
                $jawaban = Jawaban::find($jawabanId);
                $jawabanDiberikan[] = $jawaban; // Kumpulkan jawaban ke array
                if ($jawaban && $jawaban->benar) {
                    $jawabanBenar++;
                }
            }
        } else {
            return redirect()->back()->with('error', 'Anda Belum Memilih Jawaban');
        }

        $totalSoal = Soal::count();
        if(count($request->jawaban) < $totalSoal){
            return redirect()->back()->with('error', 'Anda harus mengisi semua soal');
        }
        $nilai = round(($jawabanBenar / $totalSoal) * 100, 1);
        $jumlah_benar = $jawabanBenar;
        $jumlah_salah = $totalSoal - $jawabanBenar;
        $user = User::where('id', auth()->id())->first();
        if ($nilai > 70.0) {
            $user->pelatihan_completion = 3;
            $user->save();
            }
        return view('user.hasil', compact('nilai', 'jawabanDiberikan', 'jumlah_benar', 'jumlah_salah', 'jawabanDipilih'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
