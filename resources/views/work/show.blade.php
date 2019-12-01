@extends('app')

@section('title')
    <i class="icofont-farmer" style="font-size: 29px;"></i> {{$Product->product_code}} Kodlu Ürün İçin Yeni Bir İş Ekle
@stop

@section('description')
    Sisteme yeni bir iş ekleyin
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Yeni İş Ekleyin</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <form action="{{ route('work.store') }}" method="post">
                    {{csrf_field()}}
                        <input type="hidden" name="product_id" value="{{ $Product->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::User()->id }}">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    İşlemi Yapan Kişi
                                    <input type="text" class="form-control" id="validationServer01"  value="{{ Auth::user()->name.' '.Auth::user()->surname. ' ( '.Auth::user()->permission.' ) ' }}" required readonly="true">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    İşlem
                                    <select class="form-control" name="work_type" required>
                                        <option disabled selected>Yapacağınız İşlemi Seçiniz...</option>
                                        @if(Auth::user()->permission == "satin_alma" or Auth::user()->permission == "admin")<option value="1">Tohum Alma</option>@endif
                                        @if(Auth::user()->permission == "satin_alma" or Auth::user()->permission == "admin")<option value="2">Gübre Alma</option>@endif
                                        @if(Auth::user()->permission == "planlama" or Auth::user()->permission == "admin")<option value="3">Planlama ( Tarla, Gübre, Tohum )</option>@endif
                                        @if(Auth::user()->permission == "ciftci" or Auth::user()->permission == "admin")<option value="4">Ekim Yapma</option>@endif
                                        @if(Auth::user()->permission == "ciftci" or Auth::user()->permission == "admin")<option value="5">Sulama & Bakım</option>@endif
                                        @if(Auth::user()->permission == "ciftci" or Auth::user()->permission == "admin")<option value="6">Toplama</option>@endif
                                        @if(Auth::user()->permission == "kalite_kontrol" or Auth::user()->permission == "admin")<option value="8">Kalite Kontrol</option>@endif
                                        @if(Auth::user()->permission == "tasiyici" or Auth::user()->permission == "admin")<option value="7">Taşıma - Sevkiyat</option>@endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    Açıklama
                                    <textarea class="form-control" name="details" placeholder="yapılan işlem ile ilgili kısa bilgi"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mt-4">
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
