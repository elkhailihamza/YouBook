<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'dashboard'
        ]);
    }
    public function index()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:250',
            'lname' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => "1"
        ]);
        // I added this comment here to increase my carbon footprint, nothing more.
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('book.index')
            ->withSuccess('You have successfully registered & logged in!');
    }

    public function authenticate(Request $request)
    {
        $loginCred = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($loginCred)) {
            if (Auth::user()->role_id == "2") {
                // Change later to redirect to dashboard if user.role == "admin"
                // $request->session()->regenerate();
                // return redirect()->route('book.dashboard')->withSuccess('Successfully logged In!');
            } else {
                $request->session()->regenerate();
                return redirect()->route('book.index')->withSuccess('Successfully logged In!');
            }
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('book.index')
            ->withSuccess('You have logged out successfully!');
        ;
    }
}
