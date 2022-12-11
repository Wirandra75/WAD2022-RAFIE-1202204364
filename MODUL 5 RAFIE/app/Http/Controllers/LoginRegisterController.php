<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            session()->flash('toast-kuning', 'Login berhasil');
            return redirect()->intended('/');
        }
        session()->flash('toast-merah', 'Gagal login');
        return back();
    }

    public function logout(Request $request) {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->withoutCookie('navbar');
    }

    public function register() {
        return view('register');
    }

    public function store(Request $request) {
        $request->validate([
            'no_hp' => 'numeric',
            'konfirmasi_password' => 'same:password'
        ]);
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password)
        ]);
        session()->flash('toast-biru', 'Register berhasil');
        return redirect('/login');
    }
}