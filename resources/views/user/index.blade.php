@extends('app')

@section('title')
    <i class="icofont-users-alt-5" style="font-size: 29px;"></i> Kullanıcılar
@stop

@section('description')
    Kullanıcılarınız aynı zamanda çalışanlarınızdır.
@stop

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">
                        Kayıtlı Kullanıcılar
                        <a href="{{ route('user.create') }}" class="float-right btn btn-info">+ Yeni Kullanıcı Ekle</a>
                    </h6>

                </div>
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">#</th>
                            <th scope="col" class="border-0 text-left">Adı Soyadı</th>
                            <th scope="col" class="border-0">Departman</th>
                            <th scope="col" class="border-0">Kayıt Tarihi</th>
                            <th scope="col" class="border-0">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Users as $Sort => $User)
                            <tr>
                                <td>{{ $Sort + 1 }}</td>
                                <td style="text-align: left">
                                    <img src="{{ URL($User->avatar->path) }}" class="rounded-circle mr-2" style="width: 30px; height: 30px;"/>
                                    {{ $User->name.' '.$User->surname }}
                                </td>
                                <td>{{ $User->permission }}</td>
                                <td>{{ $User->created_at }}</td>
                                <td style="width: 150px">
                                    <form action="{{ route('user.destroy',$User->id) }}" method="post">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">

                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <a href="{{ route('user.edit',$User->id) }}" class="btn btn-outline-primary">
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
