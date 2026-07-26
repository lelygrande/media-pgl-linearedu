<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
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
        // Supaya token yang diketik kecil tetap dianggap sama
        $request->merge([
            'token_kelas' => strtoupper(trim($request->token_kelas)),
        ]);

        $request->validate([
            'nis' => 'required|string|max:20|unique:siswa,nis',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:siswa,email',
            'token_kelas' => 'required|string|exists:kelas,token_kelas',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $kelas = Kelas::where('token_kelas', $request->token_kelas)->firstOrFail();

        $siswa = Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,

            // Kelas sekarang diambil dari token
            'kelas_id' => $kelas->id,

            // Sementara kalau kolom kelas lama masih ada di tabel siswa
            'kelas' => $kelas->nama_kelas,

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
