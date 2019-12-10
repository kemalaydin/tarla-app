<?php

namespace App\Http\Controllers;

use App\Model\ProductType;
use App\Model\Seed;
use App\Model\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Seeds = Seed::get();
        return view('seed.index',compact('Seeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ProductTypes = ProductType::get();
        $Suppliers = Supplier::get();
        return view('seed.create',compact('ProductTypes','Suppliers'));
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
            'product_type' => 'required',
            'supplier_id' => 'required',
            'supply_status' => 'required',
        ]);
        if($validatedData->fails()) {
            return redirect()->back()
                ->withErrors($validatedData)
                ->withInput();
        }


        $NewSeed = Seed::create($request->except('_token'));
        if($NewSeed){
            Alert::toast('Tohum başarıyla eklendi','success');
            return redirect()->route('seed.index');
        }else{
            Alert::toast('Bir hata meydana geldi','danger');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ProductTypes = ProductType::get();
        $Suppliers = Supplier::get();
        $Seed = Seed::findOrFail($id);
        return view('seed.edit',compact('Seed','ProductTypes','Suppliers'));
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
        $Seed = Seed::findOrFail($id)->update($request->except('_method','_token'));
        if($Seed){
            Alert::toast('Tohum başarıyla güncellendi','success');
            return redirect()->route('seed.index');
        }else{
            Alert::toast('bir hata meydana geldi','danger');
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
        $Seed = Seed::findOrFail($id)->delete();
        Alert::toast('Başarıyla Silindi','warning');
        return redirect()->back();

    }
}
