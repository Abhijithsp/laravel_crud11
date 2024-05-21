<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        return view('auth.dashboard');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('web')->attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
            Alert::success('success', 'user logged in successfully');
            return to_route('posts.index');
        } else {
            Alert::error('error', 'inavlid username  or password');
            return to_route('/');
        }

    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('login');
    }
}
