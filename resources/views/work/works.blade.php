@extends('app')

@section('title')
    <i class="icofont-gear-alt" style="font-size: 29px;"></i> {{ $Product->product_code }} Kodlu ürün için yapılan işler
@stop

@section('description')

@stop

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">
                        Yapılan İşler
                    </h6>

                </div>
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">Ürün Kodu</th>
                            <th scope="col" class="border-0">İşlem Kodu</th>
                            <th scope="col" class="border-0">İşlemi Yapan</th>
                            <th scope="col" class="border-0">Yapılan İşlem</th>
                            <th scope="col" class="border-0">İşlem Detayı</th>
                            <th scope="col" class="border-0">Tarih</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Works as $Work)
                            <tr>
                                <td>{{ $Work->product->product_code }}</td>
                                <td>{{ $Work->work_code }}</td>
                                <td><a href="{{ route('user.edit',$Work->user->id) }}">{{ $Work->user->name.' '.$Work->user->surname }}</a></td>
                                <td>{{ ucwords(str_replace("_"," ",$Work->work_type)) }}</td>
                                <td>{{ $Work->details }}</td>
                                <td>{{ $Work->created_at->format('d.m.Y H:i:s') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
