@extends('app')

@section('title')
    <i class="icofont-farmer" style="font-size: 29px;"></i> Ürünler
@stop

@section('description')
   SİSTEME EKLENEN ÜRÜNLER
@stop

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">
                        Kayıtlı Ürünler
                        @if(Auth::user()->permission == "admin")
                            <a href="{{ route('product.create') }}" class="float-right btn btn-info">+ Yeni Ürün Ek</a>
                        @endif
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
                            <th scope="col" class="border-0">Ekim Tarihi</th>
                            <th scope="col" class="border-0">Tahmini Top. Tarihi</th>
                            <th scope="col" class="border-0">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Products as $Sort => $Product)
                            <tr>
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
                                <td>{{ substr($Product->planting_date,0,10) }}</td>
                                <td>{{ substr($Product->crop_collecting_date,0,10) }}</td>
                                <td style="width: 150px">
                                    @if(Auth::user()->permission == "admin" or Auth::user()->permission == "satin_alma" or Auth::user()->permission == "planlama")
                                    <form action="{{ route('product.destroy',$Product->id) }}" method="post">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">

                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <a href="{{ route('product.edit',$Product->id) }}" class="btn btn-outline-primary">
                                                Düzenle
                                            </a>
                                            <button type="submit" class="btn btn-outline-danger">
                                                Sil
                                            </button>

                                    </div>
                                    </form>
                                    @else
                                        -
                                    @endif
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
