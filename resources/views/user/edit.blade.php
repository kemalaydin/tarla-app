@extends('app')

@section('title')
    <i class="icofont-users-alt-5" style="font-size: 29px;"></i> Kullanıcıyı Düzenle
@stop

@section('description')
    SİSTEMDEKİ ÇALIŞANI DÜZENLEYİN
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">{{$User->name.' '.$User->surname}}</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <form action="{{ route('user.update',$User->id) }}" method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="validationServer01" name="name" placeholder="Personel Adı" value="{{ $User->name }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="validationServer02" name="surname" placeholder="Personel Soyadı" value="{{ $User->surname }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="permission" required>
                                        <option disabled>Görev...</option>
                                        <option @if($User->permission == "admin") selected @endif value="admin">Yönetici</option>
                                        <option @if($User->permission == "ciftci") selected @endif value="ciftci">Çiftçi</option>
                                        <option @if($User->permission == "satin_alma") selected @endif value="satin_alma">Satın Alma</option>
                                        <option @if($User->permission == "planlama") selected @endif value="planlama">Planlama</option>
                                        <option @if($User->permission == "kalite_kontrol") selected @endif value="kalite_kontrol">Kalite Kontrol</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputPassword4" value="{{ $User->email }}" name="email" placeholder="Eposta adresi">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Boş bırakılırsa değiştirilmez.">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Düzenle" class="float-right btn btn-success" />
                                </div>
                            </div>
                        </div>
                    </li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
@stop
