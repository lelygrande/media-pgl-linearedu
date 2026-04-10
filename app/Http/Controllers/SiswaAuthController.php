<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class SiswaAuthController extends Controller
{
    public function showLogin()
    {
        return view('siswa.loginSiswa');
    }

    public function showRegister()
    {
        return view('siswa.registrasiSiswa');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nis' => 'required|string|max:20|unique:siswa,nis',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:siswa,email',
            'kelas' => 'required|in:8A,8B,8C',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $siswa = Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('siswa')->login($siswa);

        $request->session()->regenerate();

        return redirect()->route('peta-konsep')
            ->with('success', 'Registrasi berhasil. Selamat belajar!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::guard('siswa')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->route('peta-konsep')
                ->with('success', 'Login berhasil.');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('siswa')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Berhasil logout.');
    }
}