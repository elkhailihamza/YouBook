<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreAuthRequest;
use App\Http\Requests\UpdateAuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function register() {
        return view('auth.register');
    }
    public function store(StoreAuthRequest $request)
    {
        $request->validate([
            'fname' => 'required|string|max:250',
            'lname' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        // I created this comment here to increase my carbon footprint, nothing more.
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
        ->with('success', 'You have successfully registered & logged in!');
    }
}
