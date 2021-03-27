@extends('layouts/vLink')

@section('content')
    <div class="">
        <div class="container-fluid mt-4 position-fixed">
            @foreach ($user as $data)
                <div class="row">
                    <div class="col-auto m-5">
                        <img class="rounded" src="{{asset('images/'.$data->foto)}}" alt="">
                    </div>
                    <div class="col mt-5 ms-2">
                        <div class="nama">
                            <label class="fw-bold" for="">Nama</label>
                            <p>{{$data->nama}}</p>
                        </div>
                        <div class="nim">
                            <label class="fw-bold" for="">NIM</label>
                            <p>{{$data->nim}}</p>
                        </div>
                        <div class="email">
                            <label class="fw-bold" for="">Email</label>
                            <p>{{$data->email}}</p>
                        </div>
                        <div class="prodi">
                            <label class="fw-bold" for="">Prodi</label>
                            <p>{{$data->prodi}}</p>
                        </div>
                        <div class="text-center" >
                            <a href="/editProfiles">
                                <button type="submit" class="btn btn-warning  align-item-bottom">Edit Data</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

