<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        // mengecek validasi yang harus di inputkan
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // mencari email dan password yang sesuai kalau benar tendang
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.index'));
        }
        // kalau gagal kembalikan dengan membawa error variabelnya
        return back()->withErrors([
            'email' => 'Email atau password salah.',
            // gk boleh hilang di inputan
        ])->withInput($request->only('email'));
    }

    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        // mengecek validasi yang harus di inputkan 
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // membuat akun di database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // mengembalikan ke halaman login dengan membawa pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function logout(Request $request)
    {
        // menghapus smua data yang login
        Auth::logout();
        // menghapus session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // mengembalikan ke halaman login
        return redirect()->route('login');
    }
}
