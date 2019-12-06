@extends('app')

@section('title')
    <i class="icofont-delivery-time" style="font-size: 29px;"></i> Yeni Ürün Tipi Ekle
@stop

@section('description')
    SİSTEME YENİ BİR ÜRÜN TİPİ EKLEYİN
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Yeni Ürün Tipi Ekleyin</h6>
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
                    <form action="{{ route('product-type.store') }}" method="post">
                    {{csrf_field()}}
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationServer01" name="product_name" placeholder="Ürün Adı" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="product_type" required>
                                        <option disabled selected="selected">Lütfen Seçiniz</option>
                                        <option value="Sebze">Sebze</option>
                                        <option value="Meyve">Meyve</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationServer01" name="growth_time" placeholder="Yetişme Süresi ( Gün )" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Kaydet" class="float-right btn btn-success" />
                                </div>
                            </div>
                        </div>
                    </li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
@stop
