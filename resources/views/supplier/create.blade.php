@extends('app')

@section('title')
    <i class="icofont-delivery-time" style="font-size: 29px;"></i> Yeni Tedarikçi Ekle
@stop

@section('description')
    Sisteme yeni bir tedarikçi ekleyin
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Yeni Tedarikçi Ekleyin</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <form action="{{ route('supplier.store') }}" method="post">
                    {{csrf_field()}}
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationServer01" name="merchant_name" placeholder="Tedarikçi Adı" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationServer01" name="phone" placeholder="Telefon Numarası" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <textarea type="text" class="form-control" id="inputPassword4" name="address" placeholder="Adres"></textarea>
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
