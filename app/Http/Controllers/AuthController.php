<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (auth()->check()) {
            return redirect('/dashboard');
        }

        return view('auth.login');
    }

    public function showRegister()
    {
        if (auth()->check()) {
            return redirect('/dashboard');
        }

        return view('auth.register');
    }

    // 🔐 LOGIN PROCESS
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/dashboard'); // 👈 FIXED
        }

        return back()->withErrors([
            'email' => 'Invalid login details'
        ]);
    }

    // 📝 REGISTER PROCESS
public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/login');
}

//  📝 LOGOUT
public function logout() {
    Auth::logout();

    request() -> session() -> invalidate();
    request() -> session() -> regenerateToken();

    return redirect('/login');
}
     }