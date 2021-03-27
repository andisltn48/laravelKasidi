@extends('layouts/vLink')

@section('content')

<div class="container-fluid mt-5 pt-4 position-relative">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title fs-4">Isi Saldo</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        @foreach ($user as $data)
        <h1>{{$data->user_id}}</h1>
        <form method="POST" action="{{route('saldo.store')}}" enctype="multipart/form-data">
          @csrf
          {{-- @method(POST) --}}
          <div class="card-body">
            <fieldset>
              <div class="form-group">
                <label for="disabledTextInput">Nama</label>
                <input type="text" class="form-control" id="disabledTextInput" name="nama" value="{{$data->nama}}" readonly/>
              </div>
              <div class="form-group">
                <input type="hidden" class="form-control" id="disabledTextInput" name="id" value="{{$data->user_id}}">
              </div>
            </fieldset>
            <div class="form-group">
              <div class="form-group">
                  <label>Jumlah Saldo</label>
                    
                  <input type="Text" name="jumlahSaldo" class="form-control">
              </div>
            </div>
            <fieldset">
              <div class="form-group">
                <div class="form-group">
                  <label>Jenis Pembayaran</label>
                  <select name="jenisPembayaran" class="form-control" readonly/>
                    <option value="Top-up">Top-up</option>
                    <option value="Pembayaran">Pembayaran</option>
                  </select>         
                </div>
              </div>
            </fieldset>
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
        @endforeach
          <!-- /.card-body -->
    
          <div class="card-footer ml-auto">
            <button type="submit" class="btn btn-primary float-right">Submit</button>
          </div>
        </form>
    </div>
</div>
@endsection