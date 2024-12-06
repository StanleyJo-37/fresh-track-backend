<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticateController extends Controller
{

    public function loginView()
    {
        return view('/login.index');
    }

    public function registerView()
    {
        return view('/register.index');
    }

    public function authenticate(Request $request)
    {

        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function register() {
        try{

        } catch(Exception $err){

        }
    }
}
