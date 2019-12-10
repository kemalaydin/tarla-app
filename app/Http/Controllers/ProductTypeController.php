<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ProductTypes = ProductType::get();
        return view('product-type.index',compact('ProductTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product-type.create');
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
            'product_type' => 'required'
        ]);
        if($validatedData->fails()) {
            return redirect()->back()
                ->withErrors($validatedData)
                ->withInput();
        }

        $NewProductType = ProductType::create($request->except('_token'));
        if($NewProductType){
            Alert::toast('Ürün Tipi Başarıyla Eklendi','success');
            return redirect()->route('product-type.index');
        }else{
            Alert::toast('Bir Hata Meydana Geldi','danger');
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
        $ProductType = ProductType::findOrFail($id);
        return view('product-type.edit',compact('ProductType'));
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
        $ProductType = ProductType::findOrFail($id)->update($request->except('_method','_token'));
        if($ProductType){
            Alert::toast('Ürün Tipi Başarıyla Güncellendi','success');
            return redirect()->route('product-type.index');
        }else{
            Alert::toast('Bir Hata Meydana Geldi','danger');
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
        $ProductType = ProductType::findOrFail($id)->delete();
        Alert::toast('Başarıyla Silindi','warning');
        return redirect()->back();
    }
}
