<?php

namespace App\Http\Controllers;

use App\Model\Plantation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = "kemal";
        $Plants = Plantation::get();
        return view('plant.index',compact('Plants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Plant = Plantation::create($request->except('_token'));
        if($Plant){
            Alert::toast('Tarla Başarıyla Eklendi','success');
            return redirect()->route('plant.index');
        }else{
            Alert::toast('Bir hata meydana geldi, tekrar deneyin','danger');
            return redirect()->back();
        }
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
        $Plant = Plantation::findOrFail($id);
        return view('plant.edit',compact('Plant'));
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
        $Plant = Plantation::findOrFail($id)->update($request->except('_token','_method'));
        if($Plant){
            Alert::toast('Tarla Başarıyla Güncellendi','info');
            return redirect()->back();
        }else{
            Alert::toast('Bir hata meydana geldi, tekrar deneyiniz','danger');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PlantDelete = Plantation::findOrFail($id)->delete();
        if($PlantDelete){
            Alert::toast('Tarla Başarıyla Silindi','info');
            return redirect()->route('plant.index');
        }else{
            Alert::toast('Bir hata meydana geldi','danger');
            return redirect()->route('plant.index');
        }
    }
}
