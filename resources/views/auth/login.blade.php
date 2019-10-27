<!doctype html>
<html class="no-js h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ URL('styles/shards-dashboards.1.1.0.min.css') }}">
    <link rel="stylesheet" href="{{ URL('styles/extras.1.1.0.min.css') }}">
</head>
<body class="h-100">

@include('sweetalert::alert')
<div class="row no-gutters h-100">
    <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto">
        <div class="card">
            <div class="card-body">
                <img class="auth-form__logo d-table mx-auto mb-3" src="images/logo.png" alt="Tarla APP" style="width: 64px">
                <h5 class="auth-form__title text-center mb-4">Hesabınıza Giriş Yapın</h5>
                <form action="{{ route('login.post') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Eposta Adresiniz</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="örn: c.ozturk@tarlapp.com ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Şifreniz</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Şifreniz">
                    </div>

                    <button type="submit" class="btn btn-pill btn-accent d-table mx-auto">Giriş Yap</button>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
<script src="{{ URL('scripts/extras.1.1.0.min.js') }}"></script>
<script src="{{ URL('scripts/shards-dashboards.1.1.0.min.js') }}"></script>
<script src="{{ URL('scripts/app/app-blog-overview.1.1.0.js') }}"></script>
</body>
</html>
