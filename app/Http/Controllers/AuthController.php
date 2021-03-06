<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // baru

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function proses_login(Request $request)
    {
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->hasRole('admin')) {
                return redirect('history');
            } elseif ($user->hasRole('user')) {
                return redirect('cagar');
            }
            return redirect('/');
        }
        return redirect('login')->with('error', 'Login gagal! Silahkan periksa email dan password anda!');
    }

    public function dashboard()
    {
        $user = Auth::user();
            
        if ($user->hasRole('admin')) {
            return redirect('history');
        } elseif ($user->hasRole('user')) {
            return redirect('cagar');
        }
        return redirect('/');
    }
    
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}