<<<<<<< HEAD
@extends('layouts/vLink')

@section('content')
@if (Route::has('login'))
=======
@extends('layout/vLink')

@section('content')
>>>>>>> 8a025dde8ca3cd48507e3b7269ea1d880e65a40a
    <section class="sc-landingPage jumbroton">
        <div class="container-fluid">
            <h1 class="align-middle text-center fw-bolder text-success">Kasidi</h1>
            <p class="text-center fw-light text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas labore corporis eaque, nostrum eius sed.</p>
<<<<<<< HEAD
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
                   
            
=======
            <div class="text-center bttnLogin mt-5 pt-5">
                <a href="/login">
                    <button type="button" class="btn btn-primary">Login</button>
                </a>
            </div>
            <div class="text-center bttnRegister mt-4">
                <a href="/register">
                    <button type="button" class="btn btn-primary">Daftar Kasidi Sekarang!</button>
                </a>
            </div>
        </div>
    </section>
>>>>>>> 8a025dde8ca3cd48507e3b7269ea1d880e65a40a
@endsection