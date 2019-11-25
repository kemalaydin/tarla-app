<?php

namespace App\Http\Controllers;

use App\Model\Fertilizer;
use App\Model\Plantation;
use App\Model\Product;
use App\Model\ProductType;
use App\Model\Seed;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Product::paginate(20);
        return view('product.index',compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ProductCode = strtoupper("ta".Carbon::now()->format('d').Carbon::now()->format('m').Carbon::now()->format('Y').Str::random(5));
        $ProductTypes = ProductType::get();
        $Plants = Plantation::get();
        $Fertilizers = Fertilizer::get();
        $Seeds = Seed::get();
        return view('product.create',compact('Plants','Fertilizers','Seeds','ProductTypes','ProductCode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Product = Product::create($request->except('_token'));
        if($Product){
            Alert::toast('Ürün Başarıyla Ekildi','success');
            return redirect()->route('product.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
