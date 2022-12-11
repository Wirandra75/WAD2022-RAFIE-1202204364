<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        $variasi_warna = [
            '#3563e9' => 'Blue',
            '#0dcaf0' => 'Cyan',
        ];
        $ambilNavbar = Cookie::get('warna_navbar');
        $setelNavbar= Cookie::get('warna_navbar') ? Cookie::get('warna_navbar') : '#3563e9';
        return view('profile', compact('variasi_warna', 'ambilNavbar', 'setelNavbar'));
    }

    public function update(Request $request, User $user) {
        if($request->password === null || $request->konfirmasi_password === null) {
            User::where('id', $user->id)->update([
                'name' => $request->name,
                'no_hp' => $request->no_hp
            ]);
        } else {
            $request->validate(['konfirmasi_password' => 'same:password']);
            User::where('id', $user->id)->update([
                'name' => $request->name,
                'no_hp' => $request->no_hp,
                'password' => Hash::make($request->password)
            ]);
        }

        Cookie::queue('warna_navbar', $request->navbar);

        return redirect('/profile')->with('notif_kuning', 'Data berhasil diupdate');
    }
}
