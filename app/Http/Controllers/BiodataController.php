<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Biodata\SelfApp;



class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::where('user_id', auth()->id())->first();
        $selfApp = SelfApp::where('user_id', auth()->id())->first();
        
        return view('user.biodata', compact('profile', 'selfApp'));
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
    public function storeProfile(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'fullname' => 'required|string|max:50',
            'phone_number' => 'required|string|max:15',
            'place_date' => 'required|string|max:30',
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:15',
            'job' => 'required|string|max:30',
            'salary' => 'required|numeric',
            'married_status' => 'required|string|max:30',
            'ethnic' => 'required|string|max:30',
        ], [
            'image.required' => 'Silahkan masukkan foto terlebih dahulu',
            'image.mimes' => 'Foto harus berekstensi JPEG/JPG/PNG/GIF',
            'image.max' => 'Foto maksimal berukuran 2MB',
            'fullname.required' => 'Silahkan Masukkan Nama Anda',
            'fullname.max' => 'Nama Maksimal diisi 50 karakter',
            'phone_number.required' => 'Silahkan Masukkan Nomor Telepon Anda',
            'phone_number.max' => 'Nomor Telepon Maksimal diisi 15 karakter',
            'place_date.required' => 'Silahkan Masukkan Tempat dan Tanggal Lahir',
            'place_date.max' => 'Tempat dan Tanggal Lahir Maksimal diisi 30 karakter',
            'birth_date.required' => 'Silahkan Masukkan Tanggal Lahir Anda',
            'birth_date.date' => 'Tanggal Lahir harus berformat tanggal yang valid',
            'gender.required' => 'Silahkan Masukkan Jenis Kelamin Anda',
            'gender.max' => 'Jenis Kelamin Maksimal diisi 15 karakter',
            'job.required' => 'Silahkan Masukkan Pekerjaan Anda',
            'job.max' => 'Pekerjaan Maksimal diisi 30 karakter',
            'salary.required' => 'Silahkan Masukkan Gaji Anda',
            'salary.numeric' => 'Gaji harus berupa angka',
            'married_status.required' => 'Silahkan Masukkan Status Pernikahan Anda',
            'married_status.max' => 'Status Pernikahan Maksimal diisi 30 karakter',
            'ethnic.required' => 'Silahkan Masukkan Etnis Anda',
            'ethnic.max' => 'Etnis Maksimal diisi 30 karakter',
        ]);

        $data = [
            'user_id' => auth()->user()->id,
            'fullname' => $request->input('fullname'),
            'phone_number' => $request->input('phone_number'),
            'place_date' => $request->input('place_date'),
            'birth_date' => $request->input('birth_date'),
            'gender' => $request->input('gender'),
            'job' => $request->input('job'),
            'salary' => $request->input('salary'),
            'married_status' => $request->input('married_status'),
            'ethnic' => $request->input('ethnic'),
        ];

        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $image_extension = $image_file->extension();
            $image_name = date('ymdhis').".".$image_extension;
            $image_file->move(public_path('image'), $image_name);
            $data['image'] = $image_name;
        } else {
            return back()->withErrors(['image' => 'Image upload failed.']);
        }

        Profile::create($data);

        return redirect()->route('biodata')->with('success', 'Profil berhasil disimpan!');
    }
    public function storeSelfApp(Request $request)
    {
        $request->validate([
            'motto' => 'required|string|max:255',
            'lifegoals' => 'required|string|max:255',
            'hobbies' => 'required|string|max:255',
            'favThings' => 'required|string|max:255',
            'positiveTraits' => 'required|string|max:255',
            'negativeTraits' => 'required|string|max:255',
            'taarufReason' => 'required|string|max:255',
        ],[
            'motto.required' => 'Silahkan Masukkan Motto Anda',
            'lifegoals.required' => 'Silahkan Masukkan Goals Anda',
            'hobbies.required' => 'Silahkan Masukkan Hobi Anda',
            'favThings.required' => 'Silahkan Masukkan Hal yang disukai Anda',
            'positiveTraits.required' => 'Silahkan Masukkan Sifat Positif Anda',
            'negativeTraits.required' => 'Silahkan Masukkan Sifat Negatif Anda',
            'taarufReason.required' => 'Silahkan Masukkan Alasan Anda taaruf',
        ]);

        $data = [
            'user_id' => auth()->user()->id,
            'motto' => $request->input('motto'),
            'lifegoals' => $request->input('lifegoals'),
            'hobbies' => $request->input('hobbies'),
            'favThings' => $request->input('favThings'),
            'positiveTraits' => $request->input('positiveTraits'),
            'negativeTraits' => $request->input('negativeTraits'),
            'taarufReason' => $request->input('taarufReason'),
        ];

        SelfApp::create($data);
        return redirect()->back('biodata')->with('success', 'Gambaran diri berhasil disimpan!');
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
        // $profile = Profile::where('user_id', auth()->id())->first();
        // return view('user.biodata', ['profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
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
