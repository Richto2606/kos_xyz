<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->username === 'admin' && $request->password === 'admin123') {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['login' => 'Username atau password salah!']);
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login')->with('success', 'Logout berhasil!');
    }

    public function kirimWA()
    {
        return back()->with('success', 'WhatsApp terkirim ke semua penyewa!');
    }

    public function kirimEmail()
    {
        return back()->with('success', 'Email terkirim ke semua penyewa!');
    }

    public function kirimReminder()
    {
        return back()->with('success', 'Reminder H-3 terkirim!');
    }
}