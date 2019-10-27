<?php

namespace App\Http\Controllers;

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
}
