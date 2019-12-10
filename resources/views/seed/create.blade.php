@extends('app')

@section('title')
    <i class="icofont-wheat" style="font-size: 29px;"></i> Yeni Tohum Ekle
@stop

@section('description')
    SİSTEME YENİ BİR TOHUM EKLEYİN
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Yeni Tohum Ekleyin</h6>
                </div>
                <ul class="list-group list-group-flush">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('seed.store') }}" method="post">
                    {{csrf_field()}}
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="product_type" required>
                                        <option disabled selected="selected">Lütfen Ürün Tipi Seçin</option>
                                        @foreach($ProductTypes as $ProductType)
                                            <option value="{{ $ProductType->id }}">{{ $ProductType->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="supplier_id" required>
                                        <option disabled selected="selected">Lütfen Tedarikçi Seçiniz</option>
                                        @foreach($Suppliers as $Supplier)
                                            <option value="{{ $Supplier->id }}">{{ $Supplier->merchant_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if(Auth::user()->permission == 0 || Auth::user()->permission == "3")
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="supply_status" required>
                                        <option selected disabled>Tedarik Durumunu Seçiniz...</option>
                                        <option value="0">Tedarik Edilmedi</option>
                                        <option value="1">Tedarik Edildi</option>

                                    </select>                                </div>

                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input class="form-control" name="stock" placeholder="Alınacak Adet" required/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input class="form-control" name="seed_name" placeholder="Tohum İsmi" required />
                                </div>
                            </div>

                            @endif

                        </div>
                        <div class="form-group mb-5">
                            <input type="submit" value="Kaydet" class="float-right btn btn-success" />
                        </div>
                    </li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
@stop
