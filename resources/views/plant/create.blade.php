@extends('app')

@section('title')
    <i class="icofont-farmer" style="font-size: 29px;"></i> Yeni Tarla Ekle
@stop

@section('description')
    SİSTEME YENİ BİR TARLA EKLEYİN
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Yeni Tarla Ekleyin</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <form action="{{ route('plant.store') }}" method="post">
                    {{csrf_field()}}
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationServer01" name="garden_name" placeholder="Tarla Adı" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputPassword4" name="area" placeholder="Tarla Alanı ( M2 )" required>
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
