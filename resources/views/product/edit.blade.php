@extends('app')

@section('title')
    <i class="icofont-delivery-time" style="font-size: 29px;"></i> EKİLEN ÜRÜNÜ DÜZENLE
@stop

@section('description')
    SİSTEMDEKİ EKİLEN ÜRÜNÜ DÜZENLE
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Ekilen Ürünü Düzenle</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <form action="{{ route('product.update', $Product->id) }}" method="post">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        Ürün Tipi
                                        <select class="form-control" name="product_type" id="productType" required>
                                            <option disabled selected>Ürün Tipi Seçiniz...</option>
                                            @foreach($ProductTypes as $ProductType)
                                                <option value="{{ $ProductType->id }}" @if($Product->product_type == $ProductType->id) selected @endif >{{ $ProductType->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        Ekim Yapılacak Tarla
                                        <select class="form-control" name="plantation_id" required>
                                            <option disabled selected>Tarla Seçiniz...</option>
                                            @foreach($Plants as $Plants)
                                                <option value="{{ $Plants->id }}" @if($Product->plantation_id == $Plants->id) selected @endif >{{ $Plants->garden_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        Kullanılacak Gübre
                                        <select class="form-control" name="fertilizer_id" required>
                                            <option disabled selected>Gübre Seçiniz...</option>
                                            @foreach($Fertilizers as $Fertilizer)
                                                <option value="{{ $Fertilizer->id }}" @if($Product->fertilizer_id == $Fertilizer->id) selected @endif >{{$Fertilizer->fertilizer_name}} ( Stok Durumu : @if($Fertilizer->supply_status == 0) Yok @else (Var) @endif - {{ $Fertilizer->supplier->merchant_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        Kullanılacak Tohum
                                        <select class="form-control" name="seed_id" id="seed" required>
                                            @foreach($Seeds as $Seed)
                                            <option disabled selected value="{{$Seed->id}}" @if ($Product->seed_id == $Seed->id) selected @endif> {{$Seed->seed_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <script>
                                    $('#productType').on('change', function (e) {
                                        var optionSelected = $("option:selected", this);
                                        var valueSelected = this.value;
                                        // Make a request for a user with a given ID
                                        axios.post('/getProductSeed', {
                                            params: {
                                                productType: valueSelected,
                                                _token: "{{ csrf_token() }}"
                                            }
                                        })
                                            .then(function (response) {
                                                $("#seed").html("<option selected disabled>Tohum Seçiniz...</option>");
                                                $.each(response.data,function(index,element) {
                                                    $("#seed").append("<option value='"+element["id"]+"'>"+element["seed_name"]+" - ( Stock : "+ element["stock"] +" )</option>");
                                                });
                                            });
                                    });
                                </script>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        Ekim Tarihi
                                        <input type="date" class="form-control" name="planting_date" placeholder="Ekim Tarihi" required />
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        Hasat Tarihi
                                        <input type="date" class="form-control" name="crop_collecting_date" required />

                                    </div>
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
