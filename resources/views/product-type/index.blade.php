@extends('app')

@section('title')
    <i class="icofont-delivery-time" style="font-size: 29px;"></i> Ürün Tipleri
@stop

@section('description')
    Sistemdeki ürün tipleri
@stop

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">
                        Kayıtlı Ürün Tipleri
                        <a href="{{ route('product-type.create') }}" class="float-right btn btn-info">+ Yeni Ürün Tipi Ekle</a>
                    </h6>

                </div>
                <div class="card-body p-0 pb-3">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0" style="width: 10px">#</th>
                            <th scope="col" class="border-0">Ürün İsmi</th>
                            <th scope="col" class="border-0 text-center">Tipi</th>
                            <th scope="col" class="border-0 text-center">Yetişme Süresi</th>
                            <th scope="col" class="border-0 text-center">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ProductTypes as $Sort => $ProductType)
                            <tr>
                                <td>{{ $Sort + 1 }}</td>
                                <td>
                                    @if (file_exists(public_path('images/product/'.'/'.Str::slug($ProductType->product_name).'.png')))
                                        <img src="{{ URL('images/product/') }}/{{ Str::slug($ProductType->product_name) }}.png" class="mr-1" width="25" />
                                    @else
                                        <img src="{{ URL('images/product/') }}/{{ Str::slug($ProductType->product_type) }}.png" class="mr-1" width="25" />
                                    @endif
                                    {{ $ProductType->product_name }}</td>
                                <td class="text-center">{{ $ProductType->product_type }}</td>
                                <td class="text-center">{{ $ProductType->growth_time }}</td>
                                <td style="width: 150px">
                                    <form action="{{ route('product-type.destroy',$ProductType->id) }}" method="post">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">

                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}

                                            <a href="{{ route('product-type.edit',$ProductType->id) }}" class="btn btn-outline-primary">
                                                Düzenle
                                            </a>
                                            <button type="submit" class="btn btn-outline-danger">
                                                Sil
                                            </button>

                                    </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
