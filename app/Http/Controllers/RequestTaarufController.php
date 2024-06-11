<?php

namespace App\Http\Controllers;

use App\Models\Relations;
use Illuminate\Http\Request;
use App\Models\RequestTaaruf;
use App\Models\User;

class RequestTaarufController extends Controller
{
    public function sendRequest($id)
    {
        // Ambil data user yang diajukan taaruf
        $requesterId = User::where('id', auth()->id())->first();
        $responserId = User::where('id', $id)->first();

        // Ambil data user yang mengajukan taaruf

        // Buat request taaruf baru
        $requestTaaruf = new RequestTaaruf([
            'requester_id' => $requesterId->id,
            'responser_id' => $responserId->id,
            'is_approved' => false, // Default status belum disetujui
        ]);

        // Simpan request taaruf ke dalam database
        $requestTaaruf->save();

        // Tampilkan pesan sukses atau alihkan ke halaman lain
        return redirect()->route('dashboard')->with('successTaaruf', 'Permintaan taaruf berhasil dikirim!');
    }

    public function approve(Request $request)
    {
        $requestTaaruf = RequestTaaruf::findOrFail($request->request_taaruf_id);
        $user = auth()->user();

        if ($requestTaaruf->responser_id == $user->id) {
            $requestTaaruf->is_approved = true;
            $requestTaaruf->save();

            return redirect()->route('chat')->with('success', 'Anda telah menyetujui undangan taaruf.');
        }

        return redirect()->route('chat')->with('error', 'Gagal menyetujui undangan taaruf.');
    }

    public function dampingi(Request $request)
    {
        $relation = Relations::findOrFail($request->pickable_relation_id);
        $ustadz = auth('ustadz')->user();
        $relation->ustadz_id = $ustadz->ustadz_id;
        $relation->start = true;
        $relation->save();
        return redirect()->route('ustadz.chat')->with('success', 'Anda telah menolak undangan taaruf.');
    }


    public function fetchNotifications($userId)
    {
        // Ambil semua undangan taaruf yang belum disetujui dengan pengguna saat ini sebagai responser
        $user = auth()->user();
        $invitations = RequestTaaruf::where('responser_id', $user->id)
            ->where('is_approved', false)
            ->with('requester.profile')
            ->get();

        return view('chat', compact('user', 'invitations'));
    }
}
