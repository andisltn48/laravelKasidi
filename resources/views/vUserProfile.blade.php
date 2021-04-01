@extends('layouts/vNav')

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

                <div class="row">
                    <div class="col-auto m-5">
                        <img class="rounded" src="{{ url('images/fotoProfile/' . $User->foto) }}" alt="">
                    </div>
                    <div class="col mt-5 ms-2">
                        <div class="nama">
                            <label class="fw-bold" for="">Nama</label>
                            <p>{{ $user->nama }}</p>
                        </div>
                        <div class="nim">
                            <label class="fw-bold" for="">NIM</label>
                            <p>{{ $user->nim }}</p>
                        </div>
                        <div class="email">
                            <label class="fw-bold" for="">Email</label>
                            <p>{{ $User->email }}</p>
                        </div>

                        <div class="jenisKelamin">
                            <label class="fw-bold" for="">Jenis Kelamin</label>
                            <p>{{ $user->jenis_kelamin }}</p>
                        </div>
                        <div class="prodi">
                            <label class="fw-bold" for="">Prodi</label>
                            <p>{{ $user->prodi }}</p>
                        </div>
                        <div class="jurusan">
                            <label class="fw-bold" for="">Jurusan</label>
                            <p>{{ $user->jurusan }}</p>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('profile.editProfile.create', $user->user_id) }}">
                                <button type="submit" class="btn btn-warning  align-item-bottom">Edit Data</button>
                            </a>
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection
