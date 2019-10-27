<div class="nav-wrapper">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{route('index')}}">
                <i class="icofont-ui-home" style="font-size: 15px;"></i>
                <span>Ana Sayfa</span>
            </a>
        </li>
        @if(Auth::user()->permission == "admin")
            <li class="nav-item">
                <a class="nav-link" href="{{route('index')}}">
                    <i class="icofont-users-alt-5" style="font-size: 19px;"></i>
                    <span>Kullanıcılar</span>
                </a>
            </li>
        @endif
    </ul>
</div>
