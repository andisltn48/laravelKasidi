@extends('layouts/vLink')

@section('content')
@csrf

<div class="container-fluid mt-5 pt-4 position-relative">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title fs-4">Isi Saldo</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="/saldo/insert" enctype="multipart/form-data">
          <div class="card-body">
           
            @foreach ($user as $data)
            <div class="form-group">
              <label for="disabledTextInput">Nama</label>
              <input type="text" class="form-control" id="disabledTextInput" name="nama" value="{{$data->nama}}">
            </div>
            @endforeach
            <div class="form-group">
                <div class="form-group">
                    <label>Tanggal Pembayaran:</label>
                      
                    <input type="date" name="tanggal" class="form-control">
                </div>
            </div>
            <div class="form-group">
              <div class="form-group">
                  <label>Jumlah Saldo:</label>
                    
                  <input type="Text" name="jumlahSaldo" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Bukti Pembayaran <span class="fw-normal">(Foto harus format jpg atau png)</span></label>
              <div class="input-group">
                <div>
                  <input type="file" name="foto_pembayaran" class="form-control" @error('foto_pembayaran') is-invalid @enderror>
                  <div class="text-red">
                    @error('foto_pembayaran')
                        {{ $message }}
                    @enderror
                  </div>
                  {{-- <label class="custom-file-label" for="exampleInputFile"></label> --}}
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
    
          <div class="card-footer ml-auto">
            <button type="submit" class="btn btn-primary float-right">Submit</button>
          </div>
        </form>
    </div>
</div>
@endsection