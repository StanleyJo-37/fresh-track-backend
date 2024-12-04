<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        dd($credentials);

        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password));

        return $user->createToken($request->device_name)->plainTextToken;
    }

    public function register(RegisterRequest $request){
        $user = User::create($request->validated());

        return response()->json([
            'message' => 'succesfully registered.'
        ]);
    }
}
