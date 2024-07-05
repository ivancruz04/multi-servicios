<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" crossorigin="anonymous">
    <title>Ingresar</title>
</head>
<body>
    <div class="wrapper">
        <div class="logo">
            <img src="{{asset('img/logo.png')}}" alt="">
        </div>
        <div class="text-center mt-4 name">
            Qwikly
        </div>
        <form class="p-3 mt-3" action="{{ route('validar') }}" method="POST">
            @csrf
            @if ($errors->has('email'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('email') }}
            </div>
            @endif
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="email" id="email" placeholder="Correo">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="password" placeholder="Contraseña">
            </div>
            <button class="btn mt-3" type="submit">Ingresar</button>
        </form>
        <div class="text-center fs-6">
            <a href="#">© Qwikly -</a> <a href="#">MX</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
</body>

</html>