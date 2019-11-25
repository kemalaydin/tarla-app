<?php

namespace App\Http\Controllers;

use App\Model\Seed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index(){
        $type = Auth::user()->permission;
        return view('home.'.$type);
    }

    public function getProductSeed(Request $request){
        $ProductType = $request->get('params')["productType"];
        $Seeds = Seed::where('product_type',$ProductType)->get();
        return $Seeds;
    }
}
