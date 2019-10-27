<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function login(Request $request){
        $User = User::where('email',$request->get('email'))->first();


        if($User){
            return response()->JSON([
                'token' => $User->api_token,
            ],200);
        }else{
            return response()->JSON([
                'message' => 'Kullanıcı Bulunamadı'
            ],404);
        }
    }
}
