@extends('app')

@section('title')
    <i class="icofont-delivery-time" style="font-size: 29px;"></i> Ürün Tipini Düzenle
@stop

@section('description')
    Ürün Tipini Güncelleyin
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">{{ $ProductType->product_name }} isimli ürünü düzenleyin</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <form action="{{ route('product-type.update',$ProductType->id) }}" method="post">
                    {{csrf_field()}}
                        {{ method_field('PUT') }}
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationServer01"  name="product_name" value="{{ $ProductType->product_name }}" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="product_type" required>
                                        <option value="Sebze" @if($ProductType->product_type == "Sebze") selected @endif>Sebze</option>
                                        <option value="Meyve" @if($ProductType->product_type == "Meyve") selected @endif>Meyve</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationServer01" name="growth_time" value="{{ $ProductType->growth_time }}" required>
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
