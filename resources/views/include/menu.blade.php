<div class="nav-wrapper">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{route('index')}}">
                <i class="icofont-ui-home" style="font-size: 15px;"></i>
                <span>Ana Sayfa</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="icofont-gear-alt" style="font-size: 19px;"></i>
                <span>İşler</span>
            </a>
            <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item " href="{{route('user.index')}}">Yeni İş Ekle</a>
                <a class="dropdown-item " href="{{route('user.create')}}">Yaptığım İşler</a>
            </div>
        </li>

        @if(Auth::user()->permission == "admin")
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="icofont-users-alt-5" style="font-size: 19px;"></i>
                    <span>Kullanıcılar</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="{{route('user.index')}}">Kayıtlı Kullanıcılar</a>
                    <a class="dropdown-item " href="{{route('user.create')}}">Yeni Kullanıcı Ekle</a>
                </div>
            </li>
        @endif

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="icofont-farmer" style="font-size: 19px;"></i>
                <span>Tarlalar</span>
            </a>
            <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item " href="{{route('plant.index')}}">Tarlalar</a>
                @if(Auth::user()->permission == "satin_alma" || Auth::user()->permission == "admin" )
                    <a class="dropdown-item " href="{{route('plant.create')}}">Yeni Tarla Ekle</a>
                @endif

            </div>
        </li>

        @if(Auth::user()->permission != "ciftci" || Auth::user()->permission != "kalite_kontrol" )
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="icofont-wheat" style="font-size: 19px;"></i>
                    <span>Tohumlar</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="{{route('user.index')}}">Alınan Tohumlar</a>
                    @if(Auth::user()->permission == "satin_alma" || Auth::user()->permission == "admin" )
                        <a class="dropdown-item " href="{{route('user.index')}}">Alınması Beklenen Tohumlar</a>
                    @endif
                    @if(Auth::user()->permission == "satin_alma" || Auth::user()->permission == "admin" || Auth::user()->permission == "planlama" )
                        <a class="dropdown-item " href="{{route('user.create')}}">Yeni Tohum Ekle</a>
                    @endif
                </div>
            </li>
        @endif

        @if(Auth::user()->permission != "ciftci" || Auth::user()->permission != "kalite_kontrol" )
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="icofont-cement-mix" style="font-size: 19px;"></i>
                    <span>Gübreler</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="{{route('user.index')}}">Alınan Gübreler</a>
                    @if(Auth::user()->permission == "satin_alma" || Auth::user()->permission == "admin" )
                        <a class="dropdown-item " href="{{route('user.index')}}">Alınması Beklenen Gübreler</a>
                    @endif
                    @if(Auth::user()->permission == "satin_alma" || Auth::user()->permission == "admin" || Auth::user()->permission == "planlama" )
                        <a class="dropdown-item " href="{{route('user.create')}}">Yeni Gübre Ekle</a>
                    @endif
                </div>
            </li>
        @endif


        @if(Auth::user()->permission != "kalite_kontrol" )
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="icofont-fruits" style="font-size: 19px;"></i>
                    <span>Ürünler</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="{{route('user.index')}}">Ekilen Ürünler</a>
                    @if(Auth::user()->permission == "planlama" || Auth::user()->permission == "admin" )
                        <a class="dropdown-item " href="{{route('user.index')}}">Yeni Ürün Ekimi</a>
                    @endif
                    @if(Auth::user()->permission == "kalite_kontrol" || Auth::user()->permission == "admin" )
                        <a class="dropdown-item " href="{{route('user.create')}}">Ürün Kontrol</a>
                    @endif
                </div>
            </li>
        @endif


        @if(Auth::user()->permission == "admin" || Auth::user()->permission == "satin_alma" )
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="icofont-delivery-time" style="font-size: 19px;"></i>
                    <span>Tedarikçiler</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="{{route('user.index')}}">Tedarikçiler</a>
                    <a class="dropdown-item " href="{{route('user.create')}}">Yeni Tedarikçi Ekle</a>
                </div>
            </li>
        @endif

        @if(Auth::user()->permission == "admin" || Auth::user()->permission == "planlama" )
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="icofont-vehicle-delivery-van" style="font-size: 19px;"></i>
                    <span>Taşıyıcılar</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="{{route('user.index')}}">Taşıyıcılar</a>
                    <a class="dropdown-item " href="{{route('user.create')}}">Yeni Taşıyıcı Ekle</a>
                </div>
            </li>
        @endif

        @if(Auth::user()->permission == "admin" || Auth::user()->permission == "planlama" )
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="icofont-strawberry" style="font-size: 19px;"></i>
                    <span>Ürün Tipleri</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="{{route('user.index')}}">Ürün Tipleri</a>
                    <a class="dropdown-item " href="{{route('user.create')}}">Yeni Ürün Tipi Ekle</a>
                </div>
            </li>
        @endif

    </ul>
</div>
