<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginPage(){
        return view('auth.login');
    }

    public function login(Request $request){
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            Alert::success('Başarılı !','Giriş İşleniniz Başarıyla Gerçekleştirildi.');
            return redirect('/');
        }else{
            Alert::toast('Eposta adresinizi veya Şifrenizi yanlış girdiniz. Lütfen bilgilerinizi kontrol ederek tekrar deneyiniz','warning');
            return redirect()->back()->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        Alert::toast('Çıkış İşlemi Başarılı','info');
        return redirect('login');
    }
}
