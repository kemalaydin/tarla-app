@extends('app')

@section('title')
    <i class="icofont-delivery-time" style="font-size: 29px;"></i> Yeni Tedarikçi Ekle
@stop

@section('description')
    SİSTEME YENİ BİR GÜBRE EKLEYİN
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Yeni Gübre Ekleyin</h6>
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
                    <form action="{{ route('fertilizer.store') }}" method="post">
                    {{csrf_field()}}
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationServer01" name="fertilizer_name" placeholder="Gübre Adı" required>
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
                                        </select>
                                    </div>
                                    @endif
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <input type="submit" value="Kaydet" class="float-right btn btn-success" />
                                        </div>
                        </div>
                    </li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
@stop
