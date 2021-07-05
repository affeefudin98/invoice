<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();

            $success['token'] = $user->api_token;

            return response()->json([
                'success' => true,
                'token' => $success,
                'user' => $user
            ]);
        } else {
            return response()->json([
                    'success' => false,
                    'message' => 'Invalid Email or Password',
                ], 401);
        }
    }
}
