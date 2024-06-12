<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = User::query()
                    ->where('username', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->paginate(10);
        
        return view('admin.users.index', compact('users'));
    }

    public function destroy($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}

