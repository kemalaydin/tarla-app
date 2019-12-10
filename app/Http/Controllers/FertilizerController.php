<?php

namespace App\Http\Controllers;

use App\Model\Fertilizer;
use App\Model\ProductType;
use App\Model\Seed;
use App\Model\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FertilizerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Fertilizers = Fertilizer::get();
        return view('fertilizer.index', compact('Fertilizers') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $Suppliers = Supplier::get();
        return view('fertilizer.create',compact('Suppliers'));
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
            'supplier_id' => 'required',
            'supply_status' => 'required'
        ]);
        if($validatedData->fails()) {
            return redirect()->back()
                ->withErrors($validatedData)
                ->withInput();
        }

        $NewFertilizer = Fertilizer::create($request->except('_token'));
        if($NewFertilizer){
            Alert::toast('Gübre başarıyla eklendi','success');
            return redirect()->route('fertilizer.index');
        }else {
            Alert::toast('Bir hata meydana geldi', 'danger');
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
        $Suppliers = Supplier::get();
        $Fertilizer = Fertilizer::findOrFail($id);
        return view('fertilizer.edit',compact('Fertilizer','Suppliers'));
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
        $Fertilizer = Fertilizer::findOrFail($id)->update($request->except('_method', '_token'));
        if ($Fertilizer) {
            Alert::toast('Gübre başarıyla güncellendi', 'success');
            return redirect()->route('fertilizer.index');
        } else {
            Alert::toast('bir hata meydana geldi', 'danger');
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
        $Fertilizer = Fertilizer::findOrFail($id)->delete();
        return redirect()->back();
    }
}
