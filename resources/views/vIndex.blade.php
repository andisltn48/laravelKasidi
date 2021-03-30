<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{asset('css/bootstrap.min.css')}}>
    <link rel="stylesheet" href={{asset('css/style.css')}}>
    <title>Kasidi</title>
</head>
<body>
@if (Route::has('login'))
    <section class="sc-landingPage ">
        <div class="container-fluid">
            <h1 class="align-middle text-center fw-bolder text-success">Kasidi</h1>
            <p class="text-center fw-light text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas labore corporis eaque, nostrum eius sed.</p>
            @auth
            <a href="{{ url('/home') }}">
                <button type="button" class="btn btn-primary">Home</button>
            </a>
            @else
                <div class="text-center bttnLogin mt-5 pt-5">
                    <a href="{{ route('login') }}">
                        <button type="button" class="btn btn-primary">Login</button>
                    </a>
                </div>

                @if (Route::has('register'))
                    <div class="text-center bttnRegister mt-4">
                        <a href="{{ route('register') }}">
                            <button type="button" class="btn btn-primary">Daftar Kasidi Sekarang!</button>
                        </a>
                    </div>
                @endif
            @endauth
        </div>
    </section>
@endif
</body>
</html>