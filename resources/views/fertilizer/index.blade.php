@extends('app')

@section('title')
    <i class="icofont-delivery-time" style="font-size: 29px;"></i> Gübreler

@stop

@section('description')
    SİSTEMDEKİ GÜBRELER
@stop

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">
                        Kayıtlı Gübreler
                        <a href="{{ route('fertilizer.create') }}" class="float-right btn btn-info">+ Yeni Gübre Ekle</a>
                    </h6>

                </div>
                <div class="card-body p-0 pb-3">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0" style="width: 10px">#</th>
                            <th scope="col" class="border-0">Gübre İsmi</th>
                            <th scope="col" class="border-0 text-center">Tedarikçi</th>
                            <th scope="col" class="border-0 text-center">Tarih</th>
                            <th scope="col" class="border-0 text-center">Tedarik Durumu</th>
                            <th scope="col" class="border-0 text-center">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Fertilizers as $Sort => $Fertilizer)
                            <tr>
                                <td>{{ $Sort + 1 }}</td>
                                <td>
                                    {{ $Fertilizer->fertilizer_name }}
                                </td>
                                <td class="text-center">
                                    {{ $Fertilizer->supplier->merchant_name }}
                                </td>
                                <td class="text-center">
                                    {{ $Fertilizer->created_at->format('d.m.Y H:i') }}
                                </td>
                                <td class="text-center">
                                    @if($Fertilizer->supply_status == "0")
                                        <span class="badge badge-danger shadow-lg">Tedarik Edilmedi</span>
                                    @elseif($Fertilizer->supply_status == "1")
                                        <span class="badge badge-success">Tedarik Edildi</span>

                                    @else
                                        Geçersiz Kod
                                    @endif
                                </td>
                                <td style="width: 150px">
                                    <form action="{{ route('fertilizer.destroy',$Fertilizer->id) }}" method="post">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">

                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}

                                            <a href="{{ route('fertilizer.edit',$Fertilizer->id) }}" class="btn btn-outline-primary">
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
