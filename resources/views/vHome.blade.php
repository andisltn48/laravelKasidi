@extends('layouts/vNav')
@include('layouts/vLink')

@section('content')
<div class="container-fluid">
    @foreach ($user as $data)
        <h1 class="text-success fw-bolder fs-2 pt-4">Halo<span class="text-dark">, {{$data->nama}}</span></h1>
        <hr>
        <div class="d-flex align-items-center saldo">
            <div class="saldoValue">
                <h6 class="fw-bold fs-3">Sisa Saldo</h6>
                <h2>{{$data->saldo}}</h2>
            </div>
            <div class="ms-auto addSaldo">
                <a class="btn btn-success fw-bolder" href="#" role="button">
                    <i class="fas fa-plus"></i>
                    Isi Saldo
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection