<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Generate initials (e.g. Budi Santoso -> BS)
        $words = explode(' ', $user->name);
        $initials = '';
        foreach ($words as $w) {
            $initials .= strtoupper($w[0] ?? '');
        }
        $initials = substr($initials, 0, 2);

        return view('profile.index', compact('user', 'initials'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'status_akademik' => ['nullable', 'string', 'max:255'],
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status_akademik = $request->status_akademik;
        $user->save();

        return redirect('/profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
