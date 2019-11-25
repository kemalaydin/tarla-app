@extends('app')

@section('title')
    <i class="icofont-delivery-time" style="font-size: 29px;"></i> Tohum Düzenle
@stop

@section('description')
    SİSTEMDEKİ TOHUMU DÜZENLE
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Tohum Düzenle</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <form action="{{ route('seed.update', $Seed->id) }}" method="post">
                    {{csrf_field()}}
                        {{ method_field('PUT') }}
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="product_type" required>
                                        @foreach($ProductTypes as $ProductType)
                                            <option value="{{ $ProductType->id }}" @if($Seed->product_type == $ProductType->id) selected @endif >{{ $ProductType->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="supplier_id" required>
                                        <option disabled selected="selected">Lütfen Tedarikçi Seçiniz</option>
                                        @foreach($Suppliers as $Supplier)
                                            <option value="{{ $Supplier->id }}"  @if($Seed->supplier_id == $Supplier->id) selected @endif>{{ $Supplier->merchant_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if(Auth::user()->permission == 0 || Auth::user()->permission == "3")
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="supply_status" required>
                                        <option value="0" @if($Seed->supply_status == "0") selected @endif>Tedarik Edilmedi</option>
                                        <option value="1" @if($Seed->supply_status == "1") selected @endif>Tedarik Edildi</option>

                                    </select>                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input class="form-control" name="stock" value="{{ $Seed->stock }}" />
                                </div>

                            </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" name="seed_name" value="{{ $Seed->seed_name }}" placeholder="Tohum İsmi" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Kaydet" class="float-right btn btn-success" />
                                    </div>
                                </div>
                            @endif
                        </div>
                    </li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
@stop
