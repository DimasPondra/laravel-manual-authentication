<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // View Page Register
    public function register()
    {
        return view('auth.register');
    }

    // Register
    public function createRegister(RegisterRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($request->password);
        User::create($data);

        return redirect()->route('view-login');
    }

    // View Page Login
    public function login()
    {
        return view('auth.login');
    }

    // Login
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard.index');
        }

        return back()->with('loginFailed', 'login failed!');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
