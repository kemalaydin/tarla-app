<?php

namespace App\Http\Controllers;

use App\Model\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Suppliers = Supplier::get();
        return view('supplier.index',compact('Suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Supplier = Supplier::create($request->except('_token'));
        if($Supplier){
            Alert::toast('Tedarikçi Eklendi','success');
            return redirect()->route('supplier.index');
        }else{
            Alert::toast('Bir hata meydana geldi','danger');
            return redirect()->back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Supplier = Supplier::findOrFail($id);
        return view('supplier.edit',compact('Supplier'));
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
        $Supplier = Supplier::findOrFail($id)->update($request->except('_token','_method'));
        if($Supplier){
            Alert::toast('Tedarikçi G.üncellendi','success');
            return redirect()->route('supplier.edit',$id);
        }else{
            Alert::toast('Bir hata meydana geldi','danger');
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
        $Supplier = Supplier::findOrFail($id)->delete();
        toast('Tedarikçi başarıyla silindi','info');
        return redirect()->back();
    }
}
