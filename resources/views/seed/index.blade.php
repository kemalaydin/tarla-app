@extends('app')

@section('title')
    <i class="icofont-wheat" style="font-size: 29px;"></i> Tohumlar
@stop

@section('description')
    SİSTEMDEKİ TOHUMLAR
@stop

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">
                        Kayıtlı Tohumlar
                        @if(Auth::user()->permission == "admin" or Auth::user()->permission == "satin_alma" or Auth::user()->permission == "planlama")
                            <a href="{{ route('seed.create') }}" class="float-right btn btn-info">+ Yeni Tohum Ekle</a>
                        @endif
                    </h6>

                </div>
                <div class="card-body p-0 pb-3">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0" style="width: 10px">#</th>
                            <th scope="col" class="border-0">Tohum İsmi</th>
                            <th scope="col" class="border-0">Ürün İsmi</th>
                            <th scope="col" class="border-0 text-center">Tedarikçi</th>
                            <th scope="col" class="border-0 text-center">Tarih</th>
                            <th scope="col" class="border-0 text-center">Tedarik Durumu</th>
                            <th scope="col" class="border-0 text-center">Stok Durumu</th>
                            <th scope="col" class="border-0 text-center">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Seeds as $Sort => $Seed)
                            <tr>
                                <td>{{ $Sort + 1 }}</td>
                                <td>
                                    {{ $Seed->seed_name }}
                                </td>
                                <td>
                                    {{ $Seed->productType->product_name }}
                                </td>
                                <td class="text-center">
                                    {{ $Seed->supplier->merchant_name }}
                                </td>
                                <td class="text-center">
                                    {{ $Seed->created_at->format('d.m.Y H:i') }}
                                </td>
                                <td class="text-center">
                                    @if($Seed->supply_status == "0")
                                        <span class="badge badge-danger shadow-lg">Tedarik Edilmedi</span>
                                    @elseif($Seed->supply_status == "1")
                                        <span class="badge badge-success">Tedarik Edildi</span>

                                    @else
                                        Geçersiz Kod
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{ $Seed->stock }}
                                </td>
                                <td style="width: 150px">
                                    @if(Auth::user()->permission == "admin" or Auth::user()->permission == "satin_alma" or Auth::user()->permission == "planlama")
                                    <form action="{{ route('seed.destroy',$Seed->id) }}" method="post">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">

                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}

                                            <a href="{{ route('seed.edit',$Seed->id) }}" class="btn btn-outline-primary">
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
                </div>
            </div>
        </div>
    </div>
@stop
