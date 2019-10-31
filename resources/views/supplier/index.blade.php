@extends('app')

@section('title')
    <i class="icofont-delivery-time" style="font-size: 29px;"></i> Tedarikçiler
@stop

@section('description')
    Hammadde tedarik ettiğiniz kurum veya kişiler.
@stop

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">
                        Kayıtlı Tedarikçiler
                        <a href="{{ route('supplier.create') }}" class="float-right btn btn-info">+ Yeni Tedarikçi Ekle</a>
                    </h6>

                </div>
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">#</th>
                            <th scope="col" class="border-0 text-left">Tedarikçi Adı</th>
                            <th scope="col" class="border-0">Telefon</th>
                            <th scope="col" class="border-0">Adres</th>
                            <th scope="col" class="border-0">Eklenme Tarihi</th>
                            <th scope="col" class="border-0">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Suppliers as $Sort => $Supplier)
                            <tr>
                                <td>{{ $Sort + 1 }}</td>
                                <td style="text-align: left">
                                    {{ $Supplier->merchant_name }}
                                </td>
                                <td>{{ $Supplier->phone }}</td>
                                <td>{{ $Supplier->address }}</td>
                                <td>{{ $Supplier->created_at }}</td>
                                <td style="width: 150px">
                                    <form action="{{ route('supplier.destroy',$Supplier->id) }}" method="post">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">

                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}

                                            <a href="{{ route('supplier.edit',$Supplier->id) }}" class="btn btn-outline-primary">
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
