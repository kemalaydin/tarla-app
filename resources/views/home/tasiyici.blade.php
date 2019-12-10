@extends('app')

@section('title')
    Hoş Geldiniz
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info">
                <b>Merhaba {{ Auth::user()->name.' '.Auth::user()->surname }}, </b><br>
                Sol tarafta bulunan menüden yapmak istediğiniz işlemini seçiniz.
            </div>
        </div>
    </div>
@stop
