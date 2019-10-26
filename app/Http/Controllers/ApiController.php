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
                'status' => 200,
                'token' => $User->api_token,
            ]);
        }else{
            return response()->JSON([
                'status' => 500,
                'message' => 'Kullanıcı Bulunamadı'
            ]);
        }
    }
}
