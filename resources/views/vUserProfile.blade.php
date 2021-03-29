@extends('layouts/vLink')

@section('content')
    <div class="">
        <div class="container-fluid mt-5 pt-5">
            @if (session('pesan'))
                <div class="alert alert-success alert-dismissble">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i
                            class="fas fa-times"></i></button>
                    <h4><i class="icon fa fa-check"></i>Success!</h4>
                    {{ session('pesan') }}.
                </div>
            @endif
            @foreach ($user as $data)
                <div class="row">
                    <div class="col-auto m-5">
                        <img class="rounded" src="{{ url('images/fotoProfile/' . $data->foto) }}" alt="">
                    </div>
                    <div class="col mt-5 ms-2">
                        <div class="nama">
                            <label class="fw-bold" for="">Nama</label>
                            <p>{{ $data->nama }}</p>
                        </div>
                        <div class="nim">
                            <label class="fw-bold" for="">NIM</label>
                            <p>{{ $data->nim }}</p>
                        </div>
                        <div class="email">
                            <label class="fw-bold" for="">Email</label>
                            <p>{{ $data->email }}</p>
                        </div>

                        <div class="jenisKelamin">
                            <label class="fw-bold" for="">Jenis Kelamin</label>
                            <p>{{ $data->jenis_kelamin }}</p>
                        </div>
                        <div class="prodi">
                            <label class="fw-bold" for="">Prodi</label>
                            <p>{{ $data->prodi }}</p>
                        </div>
                        <div class="jurusan">
                            <label class="fw-bold" for="">Jurusan</label>
                            <p>{{ $data->jurusan }}</p>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('profile.editProfile.create', $data->user_id) }}">
                                <button type="submit" class="btn btn-warning  align-item-bottom">Edit Data</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
