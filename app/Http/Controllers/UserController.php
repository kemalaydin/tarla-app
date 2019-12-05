<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = User::get();
        return view('user.index')->with(compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'email' => 'required|unique:users|max:255',
            'name' => 'required',
            'password' => 'required',
            'permission' => 'required'
        ]);
         if($validatedData->fails()) {
             return redirect()->back()
         ->withErrors($validatedData)
         ->withInput();
           }
        $User = new User();
        foreach($request->except('_token','password') as $key => $value){
            $User->$key = $value;
        }
        $User->password = Hash::make($request->get('password'));
        $User->save();
        Alert::toast('Kullanıcı Başarıyla Eklendi','success');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $User = User::findOrFail($id);
        return view('user.edit',compact('User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $User = User::findOrFail($id);
        foreach($request->except('_token','password','_method') as $key => $value){
            $User->$key = $value;
        }
        if($request->get('password') != ""){
            $User->password = Hash::make($request->get('password'));
        }
        $User->save();
        Alert::toast('Kullanıcı Başarıyla Güncellendi','info');
        return redirect()->route('user.index',$User->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::findOrFail($id);
        // User Resimleri Silinecek
        $User->delete();
        Alert::toast('Kullanıcı Başarıyla Silindi','info');
        return redirect()->back();
    }
}
