<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function login(){
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('mobile-app')->accessToken;
            $success['user_id'] = $user->id;
            $success['email'] = $user->email;
            $success['name'] = $user->name;
            return response()->json($success, 200);
        } else {
            return response()->json('Email veya şifre yanlış.', 401);
        }
    }

    public function deneme(){
        return User::all();
    }
}
