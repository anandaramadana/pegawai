<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'email wajib diisi',
                'password.required' => 'password wajib diisi',
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            // Jika berhasil login, dapatkan role pengguna
            $role = Auth::user()->role;

            // Arahkan pengguna berdasarkan peran (role)
            if ($role == 'admin') {
                return redirect('/admin');
            } elseif ($role == 'pegawai') {
                return redirect('/');
            } else {
                // Tambahkan logika lain jika ada peran lainnya
                return redirect('/');
            }
        } else {
            return back()->with('loginError', 'Login Gagal, Silahkan Masukkan Email dan Password yang Benar! ');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
