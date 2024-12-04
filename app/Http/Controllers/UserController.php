<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)){
            return response()->json([
                'message' => 'error logging in.'
            ], 400);
        }

        // $user = Auth::getProvider()->retrieveByCredentials($credentials);
        if(!Auth::attempt($credentials)){
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $token = $user->createToken('freshtrack_token')->plainTextToken;
        $cookie = cookie(
            'freshtrack_token',
            $token,
            config('session.lifetime')
        );

        return response()->json([
            'message' => 'succesfully logged in.',
        ])->cookie($cookie);
    }

    public function register(RegisterRequest $request){
        $user = User::create($request->validated());

        return response()->json([
            'message' => 'succesfully registered.'
        ]);
    }
}
