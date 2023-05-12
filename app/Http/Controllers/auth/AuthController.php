<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('Admin.auth.login');
    }

    public function handleLogin(LoginRequest $request)
    {
        // request validation ==> LoginRequest
        $data = $request->only('email', 'password');

        $loggedIn = Auth::attempt($data);
        if (!$loggedIn) {
            $msg = "Wrong Email or Password";
            return back()->withInput()->with('error', $msg);
        }
        
        return redirect(route('dashboard.admin.index'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('dashboard.admin.index'));
    }
}
