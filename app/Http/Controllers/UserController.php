<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->only(['username', 'password']);

            if(!Auth::attempt($credentials)){
                return response()->json(['message' => 'Invalid credentials'], 401);
            }

            /** @var \App\Models\User $user **/
            $user = Auth::user();

            $user->tokens()->where('name', 'freshtrack_token')->delete();

            $token = $user->createToken('freshtrack_token')->plainTextToken;
            $cookie = cookie(
                'freshtrack_token',
                $token,
                config('session.lifetime')
            );
            
            Auth::login($user, $request->remember);
            return response()->json([
                'message' => 'succesfully logged in.',
                'token' => $token,
            ])->cookie($cookie);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Login failed.',
                'error' => $e->getMessage(),
            ], 500);
        }
        
    }

    public function register(RegisterRequest $request){

        $user = User::create($request->validated());

        return response()->json([
            'message' => 'succesfully registered.'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();

        $cookie = Cookie::forget('freshtrack_token');

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'message' => 'logged out succesfully'
        ])->withCookie($cookie);
    }
}
