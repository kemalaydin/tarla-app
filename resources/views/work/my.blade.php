@extends('app')

@section('title')
    <i class="icofont-gear-alt" style="font-size: 29px;"></i> Yaptığınız İşler
@stop

@section('description')
    SİSTEMDEKİ YAPTIĞINIZ İŞLER
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
                            <th scope="col" class="border-0">#</th>
                            <th scope="col" class="border-0 text-left">Ürün Kodu</th>
                            <th scope="col" class="border-0">Yapılan İşlem</th>
                            <th scope="col" class="border-0">İşlem Detayı</th>
                            <th scope="col" class="border-0">Tarih</th>
                            <th scope="col" class="border-0">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($MyWorks as $Sort => $MyWork)
                            <tr>
                                <td>{{ $Sort + 1 }}</td>
                                <td class="text-left">{{ $MyWork->product->product_code }}</td>
                                <td>{{ ucwords(str_replace("_"," ",$MyWork->work_type)) }}</td>
                                <td>{{ $MyWork->details }}</td>
                                <td>{{ $MyWork->created_at->format('d.m.Y H:i') }}</td>
                                <td style="width: 150px">
                                    @if($MyWork->created_at->diffInDays(\Carbon\Carbon::now()) < 1 && $MyWork->created_at->diffInSeconds(\Carbon\Carbon::now()) < 3600)
                                        <form action="{{ route('work.destroy',$MyWork->id) }}" method="post">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-outline-danger">
                                                    Sil
                                                </button>
                                            </div>
                                        </form>
                                    @else
                                        İşlem Yapılamaz
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
