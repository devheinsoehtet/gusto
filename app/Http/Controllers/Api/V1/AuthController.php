<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {
        $validatedRegisterData = $request->validated();

        $user = User::create([
            'name' => $validatedRegisterData['name'],
            'email' => $validatedRegisterData['email'],
            'password' => Hash::make($validatedRegisterData['password']),
        ]);

        return response()->json([
            'message' => 'success',
            'user' => $user,
        ]);

    }

    public function login(LoginRequest $request)
    {

        $validatedLoginData = $request->validated();

        abort_unless(Auth::attempt($validatedLoginData), 401, 'incorrect email or password');
        
        $user = Auth::user();
        
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'success',
            'user' => $user,
            'auth_token' => $token
        ]);
    }

    public function logout(User $user)
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
