@extends('app')

@section('title')
    <i class="icofont-farmer" style="font-size: 29px;"></i> Tarla Düzenle
@stop

@section('description')
    SİSTEMDEKİ TARLAYI DÜZENLEYİN
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">{{ $Plant->garden_name }}</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <form action="{{ route('plant.update',$Plant->id) }}" method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationServer01" name="garden_name" value="{{$Plant->garden_name}}" placeholder="Tarla Adı" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputPassword4" name="area" value="{{$Plant->area}}" placeholder="Tarla Alanı ( M2 )" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Düzenle" class="float-right btn btn-success" />
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
