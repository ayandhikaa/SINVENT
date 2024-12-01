<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Menampilkan halaman login jika pengguna belum login
    public function login(Request $request)
    {
        // Cek apakah pengguna sudah login
        if (Auth::check()) {
            return redirect()->route('kategori.index'); // Redirect ke kategori jika sudah login
        }

        // Tampilkan halaman login
        return view('login-regis');
    }

    // Proses autentikasi pengguna
    public function actionlogin(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'email' => 'required|string|email|max:255', // Validasi email
            'password' => 'required|string|min:3', // Validasi password
        ]);

        $credentials = $validated;

        // Coba login menggunakan kredensial yang diberikan
        $user = User::where('email', $credentials['email'])->first();
    
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Login berhasil, simpan sesi dan redirect ke halaman kategori
            Auth::login($user);
            return redirect()->route('kategori.index');
        } else {
            // Jika login gagal, beri pesan error dan kembali ke halaman login
            Session::flash('error', 'Username atau Password Salah');
            return redirect()->back()->withInput(); // Kembalikan input yang sudah dimasukkan
        }
    }

    // Logout pengguna dan redirect ke halaman login
    public function actionlogout()
    {
        // Logout pengguna
        Auth::logout();

        // Hapus sesi yang ada
        Session::flush();

        // Redirect ke halaman login setelah logout
        return redirect()->route('login');
    }
}
