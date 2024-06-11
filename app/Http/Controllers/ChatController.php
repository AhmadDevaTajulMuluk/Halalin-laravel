<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Relations;
use App\Models\RequestTaaruf;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::where('user_id', auth()->id())->first();
        if (auth('ustadz')->check()) {
            $userId = User::where('id', auth('ustadz')->id())->first();
        } else {
            $userId = User::where('id', auth()->id())->first();
        }
        $invitations = RequestTaaruf::where('responser_id', $userId->id)
            ->where('is_approved', false)
            ->join('users', 'request_taarufs.requester_id', '=', 'users.id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->select('request_taarufs.*', 'profiles.*')
            ->get();
        $histories = RequestTaaruf::where('responser_id', $userId->id)
            ->where('is_approved', 1)
            ->join('users', 'request_taarufs.requester_id', '=', 'users.id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->select('request_taarufs.*', 'profiles.*')
            ->get();
        $relations = Relations::where('maleuser_id', $userId->id)
            ->orWhere('femaleuser_id', $userId->id)
            ->get();
        foreach ($relations as $relation) {
            if ($relation->maleuser_id == $userId->id) {
                $relation->profilCalon = Profile::where('user_id', $relation->femaleuser_id)->first();
            } else {
                $relation->profilCalon = Profile::where('user_id', $relation->maleuser_id)->first();
            }
        }

        return view('user.chat.chat', compact('profile', 'invitations', 'relations', 'histories'));
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
