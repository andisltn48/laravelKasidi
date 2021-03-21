@extends('layout/vLink')

@section('content')
    <section class="sc-landingPage jumbroton">
        <div class="container-fluid">
            <h1 class="align-middle text-center fw-bolder text-success">Kasidi</h1>
            <p class="text-center fw-light text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas labore corporis eaque, nostrum eius sed.</p>
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
@endsection