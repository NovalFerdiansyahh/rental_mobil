<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller


{
    public function me (){
        return [
            'NIS' => 3103120168,
            'Name' => 'Noval F',
            'Phone' => '081215318009',
            'Class' => 'XII RPL 5'
         ];
    }

    public function register(Request $request) {
        $field = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:13',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $field['name'],
            'phone' => $field['phone'],
            'email' => $field['email'],
            'password' => bcrypt($field['password'])
        ]);

        $token = $user->CreateToken('tokenku')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        //check email
        $user = User::where('email', $fields['email'])->first();

        //check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'unauthorized'
            ], 401);
        }

        $token = $user->createToken('tokenku')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
