<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    function index(){
        return view('login-regis');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:3',
        ]);
    
        try {
            // Buat pengguna baru
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
            return redirect()->route('login-regis')->with('message', 'Register Berhasil! Silakan login.');
        } catch (\Exception $e) {
            // Jika ada error saat menyimpan data, log error
            \Log::error('Error during user registration: ' . $e->getMessage());
            return back()->withErrors(['msg' => 'Something went wrong! Please try again.']);
        }
    }
}