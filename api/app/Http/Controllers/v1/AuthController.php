<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        return response($user, Response::HTTP_CREATED);
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        //Validate if a user with the email exists
        $user = User::where(['email' => $fields['email']])->first();
        //Validate if the password is correct
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Incorrect email or password'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('superSECRETkey')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, Response::HTTP_OK);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Logged out'
        ], Response::HTTP_OK);
    }
}
