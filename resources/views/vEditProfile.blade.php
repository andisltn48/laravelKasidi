@extends('layouts/vLink')

@section('content')
    <div class="container-fluid mt-5 pt-4 position-relative">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title fs-4">Edit Profil</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            @foreach ($user as $data)
                <form method="POST" action="{{ route('profile.editProfile.store', $data->user_id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="disabledTextInput">Nama</label>
                                    <input type="text" class="form-control" id="disabledTextInput" name="nama"
                                        value="{{ $data->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="disabledTextInput">Email</label>
                                    <input type="text" class="form-control" id="disabledTextInput" name="email"
                                        value="{{ $data->email }}" readonly />
                                </div>
                                <div class="form-group">
                                    <label for="disabledTextInput">Nim</label>
                                    <input type="text" class="form-control" id="disabledTextInput" name="nim"
                                        value="{{ $data->nim }}">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenisKelamin" class="form-control" value="{{ $data->jenis_kelamin }}">
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="disabledTextInput">Prodi</label>
                                    <input type="text" class="form-control" id="disabledTextInput" name="prodi"
                                        value="{{ $data->prodi }}">
                                </div>
                                <div class="form-group">
                                    <label for="disabledTextInput">Jurusan</label>
                                    <input type="text" class="form-control" id="disabledTextInput" name="jurusan"
                                        value="{{ $data->jurusan }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Foto Profil<span class="fw-normal">(Foto harus
                                            format jpg atau png)</span></label>
                                    <div class="input-group">
                                        <div>
                                            <input type="file" name="foto" class="form-control"
                                                @error('foto') is-invalid @enderror>
                                            <div class="text-red">
                                                @error('foto')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            {{-- <label class="custom-file-label" for="exampleInputFile"></label> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            @endforeach
            <!-- /.card-body -->

            <div class="card-footer ml-auto">
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
            </form>
        </div>
    </div>
@endsection
