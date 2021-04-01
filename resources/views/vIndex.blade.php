@include('layouts/vLink')

</head>
<body>
@if (Route::has('login'))
    <section class="sc-landingPage">
        <div class="jumbroton">
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
        </div>
    </section>
@endif
</body>
</html>