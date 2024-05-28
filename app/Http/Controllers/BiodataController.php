<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.biodata');
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
        $request->validate([
            'username' => 'required|string|max:50',
            'nomor_telepon' => 'required|string|max:15',
            'tempat_lahir' => 'required|string|max:30',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|boolean',
            'pekerjaan' => 'required|string|max:50',
            'gaji' => 'required|integer',
            'status' => 'required|string',
            'suku' => 'required|string|max:50',
        ]);

        $data = [
            'username' => $request-> input('username'),
            'nomor_telepon' => $request-> input('nomor_telepon'),
            'tempat_lahir' => $request-> input('tempat_lahir'),
            'jenis_kelamin' => $request-> input('jenis_kelamin'),
            'pekerjaan' => $request-> input('pekerjaan'),
            'gaji' => $request-> input('gaji'),
            'status' => $request-> input('status'),
            'suku' => $request-> input('suku')
        ];
    
        Biodata::create($data);

        return redirect()->route('biodata')->with('success', 'Data berhasil disimpan!');
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
