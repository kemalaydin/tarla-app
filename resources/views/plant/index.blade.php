@extends('app')

@section('title')
    <i class="icofont-farmer" style="font-size: 29px;"></i> Tarlalar
@stop

@section('description')
    Sistemde işlem yapılabilen tarlalar.
@stop

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">
                        Kayıtlı Tarlalar
                        <a href="{{ route('plant.create') }}" class="float-right btn btn-info">+ Yeni Tarla Ekle</a>
                    </h6>

                </div>
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">#</th>
                            <th scope="col" class="border-0 text-left">Tarla</th>
                            <th scope="col" class="border-0">Alan</th>
                            <th scope="col" class="border-0">Eklenme Tarihi</th>
                            <th scope="col" class="border-0">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Plants as $Sort => $Plant)
                            <tr>
                                <td>{{ $Sort + 1 }}</td>
                                <td style="text-align: left">
                                    {{ $Plant->garden_name }}
                                </td>
                                <td>{{ $Plant->area }}<small>m<sup>2</sup></small></td>
                                <td>{{ $Plant->created_at }}</td>
                                <td style="width: 150px">
                                    <form action="{{ route('plant.destroy',$Plant->id) }}" method="post">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">

                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <a href="{{ route('plant.edit',$Plant->id) }}" class="btn btn-outline-primary">
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
