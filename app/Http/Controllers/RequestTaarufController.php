<?php

namespace App\Http\Controllers;

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
        return redirect()->route('dashboard')->with('success', 'Permintaan taaruf berhasil dikirim!');
    }
    public function fetchNotifications($userId)
    {
        // Ambil semua undangan taaruf yang belum disetujui dengan pengguna saat ini sebagai responser
        $invitations = RequestTaaruf::where('responser_id', $userId)
            ->where('is_approved', false)
            ->get();

        return $invitations;
    }
}
