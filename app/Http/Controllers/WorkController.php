<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use function GuzzleHttp\Promise\queue;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Product::latest()->paginate(20);
        return view('work.index',compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $work_code = Str::random(5);

        $WorkFinished = Work::where('work_type','tasima')->where('product_id',$request->get('product_id'))->count();

        if($WorkFinished > 0){
            Alert::toast('Ürün Teslim Edilmiştir, İşlem Yapılamaz','error');
            return redirect()->back();
        }

        if($request->get('work_type') == "4"){
            $WorkControl = Work::where('work_type','ekme')->where('product_id',$request->get('product_id'))->count();
            if($WorkControl > 0){
                Alert::toast('Bu ürün için ekme işlemi yapıldı','warning');
                return redirect()->back();

            }
        }

        if($request->get('work_type') == "6"){
            $WorkControl = Work::where('work_type','toplama')->where('product_id',$request->get('product_id'))->count();
            if($WorkControl > 0){
                Alert::toast('Bu ürün için toplama işlemi yapıldı','warning');
                return redirect()->back();

            }
        }

        if($request->get('work_type') == "8"){
            $WorkControl = Work::where('work_type','kalite_kontrol')->where('product_id',$request->get('product_id'))->count();
            if($WorkControl > 0){
                Alert::toast('Bu ürün için kalite kontrol işlemi yapıldı','warning');
                return redirect()->back();

            }
        }


        if($request->get('work_type') == "5"){
            $WorkControl = Work::where('work_type',"ekme")->where('product_id',$request->get('product_id'))->count();
            if($WorkControl < 1){
                Alert::toast('Sulama ve Bakım işleminden önce ekim işlemi yapılmalı','error');
                return redirect()->back();
            }
        }

        if($request->get('work_type') == "6"){
            $WorkControl = Work::where('work_type',"sulama")->where('product_id',$request->get('product_id'))->count();
            if($WorkControl < 1){
                Alert::toast('Toplamadan önce Sulama ve Bakım işlemi yapılmalı','error');
                return redirect()->back();
            }
        }

        if($request->get('work_type') == "7"){
            $WorkControl = Work::where('work_type',"kalite_kontrol")->where('product_id',$request->get('product_id'))->count();
            if($WorkControl < 1){
                Alert::toast('Sevkiyat işleminden önce Kalite Kontrol işlemi yapılmalı','error');
                return redirect()->back();
            }
        }

        if($request->get('work_type') == "8"){
            $WorkControl = Work::where('work_type',"toplama")->where('product_id',$request->get('product_id'))->count();
            if($WorkControl < 1){
                Alert::toast('Kalite Kontrol işleminden önce Toplama işlemi yapılmalı','error');
                return redirect()->back();
            }
        }
        $NewWork = Work::create(array_merge($request->except('_token'),['work_code' => $work_code]));
        if($NewWork){
            Alert::toast('İş Başarıyla Eklendi','success');
            return redirect()->route('work.index');
        }else{
            Alert::toast('Bir Hata Meydana Geldi','danger');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Product = Product::findOrFail($id);
        return view('work.show',compact('Product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show_works($product_id)
    {
        $Product = Product::findOrFail($product_id);
        $Works = Work::where('product_id',$product_id)->orderBy('id','desc')->get();
        return view('work.works',compact('Product','Works'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function myWorks()
    {
        $MyWorks = Work::where('user_id',Auth::user()->id)->get();
        return view('work.my',compact('MyWorks'));
    }

    public function destroy(Work $work){
        $work->delete();
        Alert::toast('Silme işlemi başarılı','warning');
        return redirect()->back();
    }
}
