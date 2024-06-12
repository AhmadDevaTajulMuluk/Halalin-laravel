<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Profile;
use App\Models\Relations;
use App\Models\RequestTaaruf;
use App\Models\User;
use App\Models\Ustadz;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::where('user_id', auth()->id())->first();
        $userId = User::where('id', auth()->id())->first();
        $invitations = RequestTaaruf::where('responser_id', $userId->id)
            ->where('is_approved', false)
            ->join('users', 'request_taarufs.requester_id', '=', 'users.id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->select('request_taarufs.*', 'profiles.*')
            ->get();
        $histories = RequestTaaruf::where('responser_id', $userId->id)
            ->orWhere('requester_id', $userId->id)
            ->where('is_approved', 1)
            ->join('users', 'request_taarufs.requester_id', '=', 'users.id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->select('request_taarufs.*', 'profiles.*')
            ->get();
        foreach ($histories as $history) {
            $history->responser = Profile::where('user_id', $history->responser_id)->first();
            $history->requester = Profile::where('user_id', $history->requester_id)->first();
        }
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

        return view('user.chat.chat', compact('profile', 'invitations', 'relations', 'histories', 'userId'));
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
        $relation = Relations::where('hubungan_id', $id)->first();
        $relation->maleUser = Profile::where('user_id', $relation->maleuser_id)->first();
        $relation->femaleUser = Profile::where('user_id', $relation->femaleuser_id)->first();
        $relation->ustadz = Ustadz::where('ustadz_id', $relation->ustadz_id)->first();
        if (auth('web')->check()) {
            if (auth('web')->id() != $relation->maleuser_id && auth()->id() != $relation->femaleuser_id) {
                return redirect()->route('dashboard')->with('error', 'Anda tidak diizinkan mengakses chat ini.');
            }
        } else if (auth('ustadz')->check()) {
            if ($relation->ustadz_id != auth('ustadz')->id()) {
                return redirect()->back()->with('error', 'Anda tidak diizinkan mengakses chat ini.');
            }
        } else {
            return redirect()->back()->with('error', 'Anda tidak diizinkan mengakses chat ini.');
        }
        if (auth('web')->id() == $relation->maleuser_id || auth('web')->id() == $relation->femaleuser_id) {
            $sender = User::where('id', auth()->id())->first();
            $sender = $sender->username;
        } else if (auth('ustadz')->check()) {
            $sender = "ustadz";
        }
        $user = User::where('id', auth()->id())->first();
        $chats = Chat::where('hubungan_id', $id)->get();
        return view('user.chat.show', compact('relation', 'chats', 'sender', 'user'));
    }

    public function send(Request $request, $id)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'send_by' => 'required',
            'message' => 'required',
        ]);

        // Simpan pesan ke database
        Chat::create([
            'hubungan_id' => $id,
            'send_by' => $request->send_by,
            'messages' => $request->message,
            'send_at' => now(), // Atau gunakan waktu yang sesuai dengan aplikasi Anda
        ]);

        // Redirect kembali ke halaman chat atau lakukan aksi lain sesuai kebutuhan aplikasi Anda
        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
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
