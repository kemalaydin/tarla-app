@extends('app')

@section('title')
    <i class="icofont-farmer" style="font-size: 29px;"></i> İşler
@stop

@section('description')
    Sistemeki ürünler üzerine yapılan işlemler.
@stop

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">
                        Kayıtlı Ürünler
                    </h6>

                </div>
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">#</th>
                            <th scope="col" class="border-0 text-left">Ürün Tipi</th>
                            <th scope="col" class="border-0">Ürün Kodu</th>
                            <th scope="col" class="border-0">Ekili Tarla</th>
                            <th scope="col" class="border-0">Son İşlem</th>
                            <th scope="col" class="border-0">Yapan Kişi </th>
                            <th scope="col" class="border-0">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Products as $Sort => $Product)
                            <tr @if($Product->work()->count() > 0) @if($Product->work()->latest()->first()["work_type"] == "tasima") style="background: #ddd" @endif @endif>
                                <td>{{ $Sort + 1 }}</td>
                                <td style="text-align: left">
                                    @if (file_exists(public_path('images/product/'.'/'.Str::slug($Product->productType->product_name).'.png')))
                                        <img src="{{ URL('images/product/') }}/{{ Str::slug($Product->productType->product_name) }}.png" class="mr-1" width="25" />
                                    @else
                                        <img src="{{ URL('images/product/') }}/{{ Str::slug($Product->productType->product_type) }}.png" class="mr-1" width="25" />
                                    @endif
                                    {{ $Product->productType->product_name }}
                                </td>
                                <td>{{ $Product->product_code }}</td>
                                <td>{{ $Product->plantation->garden_name }}</td>
                                <td>
                                    @if($Product->work()->count() == 0)
                                        -
                                    @else
                                        {{ ucwords(str_replace("_"," ",$Product->work()->latest()->first()["work_type"])) }}
                                    @endif
                                </td>
                                <td>
                                    @if($Product->work()->count() == 0)
                                        -
                                    @else
                                        {{ $Product->work()->latest()->first()->user->name.' '.$Product->work()->latest()->first()->user->surname }}
                                    @endif
                                </td>
                                <td style="width: 150px">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                                    <a href="{{ route('work.show',$Product->id) }}" class="btn btn-outline-primary">
                                        Yeni İş Ekle
                                    </a>
                                    <a href="{{ route('work.work_show',$Product->id) }}" class="btn btn-outline-primary">
                                        Yapılan İşler
                                    </a>
                                        </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <center>
                        {{ $Products->links() }}
                    </center>
                </div>
            </div>
        </div>
    </div>
@stop
