@extends('layouts/vNav')

@section('content')
<div class="container-fluid">
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissble">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
    <h4><i class="icon fa fa-check"></i>Success!</h4>
    {{ session('pesan') }}.
    </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Daftar Pengguna
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Prodi</th>
                                <th>Jurusan</th>
                                <th>Saldo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($allUser as $data)
                            <tbody>
                                <tr>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->nim}}</td>
                                    <td>{{$data->prodi}}</td>
                                    <td>{{$data->jurusan}}</td>
                                    <td>{{$data->saldo}}</td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col">
                                                <form action="{{'/user/delete/'. $data->id}}" method="POST">
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                </form>
                                            </div>
                                            <div class="col">
                                                <form action="{{route('task.add.create',$data->id)}}" method="GET">
                                                    <button class="btn btn-primary" type="submit">Tambah Task</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
