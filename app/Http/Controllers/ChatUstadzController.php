<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Relations;
use App\Models\RequestTaaruf;
use App\Models\Ustadz;
use Illuminate\Http\Request;

class ChatUstadzController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ustadz = Ustadz::where('ustadz_id', auth('ustadz')->id())->first();
        $requestTaaruf = RequestTaaruf::all();
        $pickableRelations = Relations::where('ustadz_id', null)->get();
        foreach ($pickableRelations as $pickableRelation) {
            $pickableRelation->maleUser = Profile::where('user_id', $pickableRelation->maleuser_id)->first();
            $pickableRelation->femaleUser = Profile::where('user_id', $pickableRelation->femaleuser_id)->first();
        }
        $relations = Relations::where('ustadz_id', $ustadz->ustadz_id)->get();
        foreach ($relations as $relation) {
            $relation->maleUser = Profile::where('user_id', $relation->maleuser_id)->first();
            $relation->femaleUser = Profile::where('user_id', $relation->femaleuser_id)->first();
        }
        return view('ustadz.chat', compact('pickableRelations', 'requestTaaruf', 'relations', 'ustadz'));
    }

    public function render()
    {
        $ustadz = Ustadz::where('ustadz_id', auth()->id())->first();
        return view('components.navbarustadz', compact('ustadz'));
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
