<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {
    
    public function login() {
        return view('admin/login');
    }
    public function login_post(Request $request) {
        if (Auth::attempt(['email' => $email, 'password' => $password, 'is_admin' => 1])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'invalid' => 'The provided credentials do not match our records.',
        ]);
    }
}
