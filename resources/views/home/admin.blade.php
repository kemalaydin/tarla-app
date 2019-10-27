@extends('app')

@section('description')
    Hoş Geldiniz
@stop

@section('content')
    <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Ürün</span>
                            <h6 class="stats-small__value count my-3">2,390</h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="stats-small__percentage stats-small__percentage--increase">4.7%</span>
                        </div>
                    </div>
                    <canvas height="140" class="blog-overview-stats-small-1 chartjs-render-monitor" style="display: block; height: 70px; width: 177px;" width="354"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Personel</span>
                            <h6 class="stats-small__value count my-3">182</h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
                        </div>
                    </div>
                    <canvas height="140" class="blog-overview-stats-small-2 chartjs-render-monitor" style="display: block; height: 70px; width: 177px;" width="354"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg col-md-4 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Yapılan İşler</span>
                            <h6 class="stats-small__value count my-3">8,147</h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="stats-small__percentage stats-small__percentage--decrease">3.8%</span>
                        </div>
                    </div>
                    <canvas height="140" class="blog-overview-stats-small-3 chartjs-render-monitor" style="display: block; height: 70px; width: 177px;" width="354"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg col-md-4 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Tarla</span>
                            <h6 class="stats-small__value count my-3">2,413</h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
                        </div>
                    </div>
                    <canvas height="140" class="blog-overview-stats-small-4 chartjs-render-monitor" style="display: block; height: 70px; width: 177px;" width="354"></canvas>
                </div>
            </div>
        </div>
    </div>
@stop
