<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{

    /**
     * Handle a user registration attempt.
     */
    public function register(Request $request){

        try{
            $request->validate([
                'name' => 'required|string|max:250',
                'email' => 'required|email|max:250|unique:users',
                'password' => 'required|min:8'
            ]);
        } catch (\Throwable $th) {
            return response(['message' => "Incorrectly formatted credentials"], 400);
        }

        try{
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]); 
        }catch(\Throwable $th){
            return response(['message' => "Something went wrong on our end"], 500);
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response(['message' => __('auth.failed')], 422);
        }

        $token = auth()->user()->createToken('client-app');
        return ['token' => $token->plainTextToken];
    }

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
        } catch (\Throwable $th) {
            return response(['message' => "Incorrectly formatted credentials"], 400);
        }

        if (!Auth::attempt($credentials)) {
            return response(['message' => __('auth.failed')], 422);
        }

        $token = auth()->user()->createToken('client-app');
        return ['token' => $token->plainTextToken];
    }

    /**
     * Handle a logout attempt.
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->noContent();
    }

    /**
     * Handle an attempt to get user information.
     */
    public function me(Request $request)
    {
        return $request->user();
    }
}
