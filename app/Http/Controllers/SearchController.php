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
        $profile = Profile::where('user_id', auth()->id())->first();
        $users = User::where('id', '!=', auth()->id())->get();
        return view('user.matching.search', compact('users'), compact('profile'));
    }
    public function searchPartner(Request $request)
    {
        $searchType = $request->input('searchType');
        $profile = Profile::where('user_id', auth()->id())->first();
        if ($searchType == 'physical') {
            $results = $this->searchByPhysicalCriteria($request);
        } elseif ($searchType == 'nonPhysical') {
            $results = $this->searchByNonPhysicalCriteria($request);
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
        return view('user.matching.search', compact('results'), compact('profile'));
    }
    private function searchByPhysicalCriteria(Request $request)
    {
        $request->validate([
            'skincolor' => 'required',
            'haircolor' => 'required',
            'minWeight' => 'required|numeric',
            'maxWeight' => 'required|numeric',
            'minHeight' => 'required|numeric',
            'maxHeight' => 'required|numeric',
        ]);
        $results = PhysicalApp::where('skincolor', $request->input('skincolor'))
                        ->where('haircolor', $request->input('haircolor'))
                        ->whereBetween('weight', [$request->input('minWeight'), $request->input('maxWeight')])
                        ->whereBetween('height', [$request->input('minHeight'), $request->input('maxHeight')])
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
        ]);
        $results = User::whereBetween('age', [$request->input('minAge'), $request->input('maxAge')])
                        ->where('place_date', $request->input('place_date'))
                        ->where('quranMemory', '>=', $request->input('minHafalan'))
                        ->where('last_education', $request->input('last_education'))
                        ->where('married_status', $request->input('married_status'))
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
