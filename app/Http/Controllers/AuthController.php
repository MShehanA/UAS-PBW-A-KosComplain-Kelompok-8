<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

  
public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string'
    ]);

    if (!Auth::attempt($credentials, $request->boolean('remember'))) {
        return back()
            ->withErrors([
                'email' => 'Email atau password tidak sesuai.'
            ])
            ->onlyInput('email');
    }

    $request->session()->regenerate();

    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->role === 'penghuni') {
        return redirect()->route('resident.dashboard');
    }

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login')
        ->withErrors([
            'email' => 'Role akun tidak dikenali.'
        ]);
}


    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:190|unique:users,email',
            'phone' => 'required|string|max:25',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
            ]
        ]);

        $data['role'] = 'penghuni';

        $user = User::create($data);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()
            ->route('resident.dashboard')
            ->with('success', 'Akun berhasil dibuat. Selamat datang!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Kamu berhasil keluar.');
    }
}
