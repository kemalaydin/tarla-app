@extends('app')

@section('title')
    <i class="icofont-users-alt-5" style="font-size: 29px;"></i> Yeni Kullanıcı Ekle
@stop

@section('description')
    SİSTEME YENİ BİR ÇALIŞAN EKLEYİN
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Yeni Çalışan Ekleyin</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <form action="{{ route('user.store') }}" method="post">
                    {{csrf_field()}}
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="validationServer01" name="name" placeholder="Personel Adı" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="validationServer02" name="surname" placeholder="Personel Soyadı" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="permission" required>
                                        <option disabled selected>Görev...</option>
                                        <option value="admin">Yönetici</option>
                                        <option value="ciftci">Çiftçi</option>
                                        <option value="satin_alma">Satın Alma</option>
                                        <option value="planlama">Planlama</option>
                                        <option value="kalite_kontrol">Kalite Kontrol</option>
                                        <option value="tasiyici">Taşıyıcı</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputPassword4" name="email" placeholder="Eposta adresi">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Şifre">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Kaydet" class="float-right btn btn-success" />
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
