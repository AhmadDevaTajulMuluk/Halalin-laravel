<?php

namespace App\Http\Controllers;

use App\Models\Biodata\Educations;
use App\Models\Biodata\PhysicalApp;
use App\Models\Biodata\Religion;
use App\Models\Biodata\SelfApp;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $thisUser = User::where('id', auth()->id())->first();
        // Jika is_complete pengguna saat ini adalah 0, kembalikan ke halaman sebelumnya dengan pesan error
        if ($thisUser->is_complete === 0) {
            return back()->with('error', 'Lengkapi profil Anda terlebih dahulu.');
        }
        $profile = Profile::where('user_id', auth()->id())->first();
        $users = User::join('profiles', 'users.id', '=', 'profiles.user_id')
                    ->where('users.id', '!=', auth()->id())
                    ->where('users.is_complete', 1) // Memeriksa apakah pengguna sudah lengkap mengisi
                    ->where('profiles.gender', '!=', $profile->gender) // Memeriksa jenis kelamin tidak sama
                    ->get();
        foreach ($users as $user) {
            $selectedProfile = Profile::where('user_id', $user->id)->first();
            $education = Educations::where('user_id', $user->id)->first();
            $religion = Religion::where('user_id', $user->id)->first();
            $selfApps = SelfApp::where('user_id', $user->id)->first();
            
            if ($selectedProfile) {
                $user->fullname = $selectedProfile->fullname ?? null;
                $user->birth_date = $selectedProfile->birth_date ?? null;
                $user->place_date = $selectedProfile->place_date ?? null;
            }
            if ($education) {
                $user->last_education = $education->last_education ?? null;
            }
            if ($religion) {
                $user->quran = $religion->quranMemory ?? null;
            }
            if ($selfApps) {
                $user->motto = $selfApps->motto ?? null;
                $user->reason = $selfApps->taarufReason ?? null;
            }
        }
        return view('user.matching.search', compact('users'), compact('profile'));
    }
    public function searchPartner(Request $request)
    {
        $searchType = $request->input('searchType');
        $profile = Profile::where('user_id', auth()->id())->first();

        if (empty($searchType)) {
            return redirect()->route('search');
        } else{
            if ($searchType == 'physical') {
                $results = $this->searchByPhysicalCriteria($request);
            } elseif ($searchType == 'nonPhysical') {
                $results = $this->searchByNonPhysicalCriteria($request);
            }
        }

        foreach ($results as $result) {
            $selectedProfile = Profile::where('user_id', $result->user_id)->first();
            $education = Educations::where('user_id', $result->user_id)->first();
            $religion = Religion::where('user_id', $result->user_id)->first();
            $selfApps = SelfApp::where('user_id', $result->user_id)->first();
            $result->fullname = $selectedProfile->fullname;
            $result->birth_date = $selectedProfile->birth_date;
            $result->place_date = $selectedProfile->place_date;
            $result->last_education = $education->last_education;
            $result->quran = $religion->quranMemory;
            $result->motto = $selfApps->motto;
            $result->reason = $selfApps->taarufReason;
        }
        return view('user.matching.search', compact('results', 'profile'));
    }
    private function searchByPhysicalCriteria(Request $request)
    {
        $profile = Profile::where('user_id', auth()->id())->first();
        $request->validate([
            'skincolor' => 'required',
            'haircolor' => 'required',
            'minWeight' => 'required|numeric',
            'maxWeight' => 'required|numeric',
            'minHeight' => 'required|numeric',
            'maxHeight' => 'required|numeric',
        ],[
            'skincolor.required' => 'Warna kulit harus diisi',
            'haircolor.required' => 'Warna rambut harus diisi',
            'minWeight.required' => 'Berat minimal harus diisi',
            'maxWeight.required' => 'Berat maksimal harus diisi',
            'minHeight.required' => 'Tinggi minimal harus diisi',
            'maxHeight.required' => 'Tinggi maksimal harus diisi',
        ]);

        $results = PhysicalApp::join('users', 'physical_apps.user_id', '=', 'users.id')
                                ->join('profiles', 'physical_apps.user_id', '=', 'profiles.user_id')
                                ->where('users.is_complete', 1) // Memeriksa apakah pengguna sudah lengkap mengisi
                                ->where('profiles.gender', '!=', $profile->gender) // Memeriksa jenis kelamin tidak sama
                                ->where('physical_apps.skincolor', $request->input('skincolor'))
                                ->where('physical_apps.haircolor', $request->input('haircolor'))
                                ->whereBetween('physical_apps.weight', [$request->input('minWeight'), $request->input('maxWeight')])
                                ->whereBetween('physical_apps.height', [$request->input('minHeight'), $request->input('maxHeight')])
                                ->get();
        return $results;
    }

    private function searchByNonPhysicalCriteria(Request $request)
    {
        $request->validate([
            'minAge' => 'required|numeric',
            'maxAge' => 'required|numeric',
            'minHafalan' => 'required|numeric',
            'last_education' => 'required',
            'married_status' => 'required',
            'place_date' => 'required',
        ],[
            'minAge.required' => 'Usia minimal harus diisi',
            'maxAge.required' => 'Usia maksimal harus diisi',
            'minHafalan.required' => 'Hafalan minimal harus diisi',
            'last_education.required' => 'Pendidikan terakhir harus diisi',
            'married_status.required' => 'Status perkawinan harus diisi',
            'place_date.required' => 'Tempat lahir harus diisi',
        ]);

        $results = User::whereBetween('age', [$request->input('minAge'), $request->input('maxAge')])
                        ->where('place_date', $request->input('place_date'))
                        ->where('quranMemory', '>=', $request->input('minHafalan'))
                        ->where('last_education', $request->input('last_education'))
                        ->where('married_status', $request->input('married_status'))
                        ->where('is_complete', '1')
                        ->get();
        return $results;
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
