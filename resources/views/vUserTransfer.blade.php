@extends('layouts/vNav')

@section('content')

<div class="container-fluid mt-5 pt-4 position-relative">
    @if (session('pesan'))
    <div class="alert alert-danger alert-dismissble">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
    <h4><i class="icon fa fa-check"></i>Failed!</h4>
    {{ session('pesan') }}.
    </div>
    @endif
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title fs-4">Form Transfer</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('transfer.store')}}" enctype="multipart/form-data">
          @csrf
          {{-- @method(POST) --}}
          <div class="card-body">
            <fieldset>
              <div class="form-group">
                <label for="disabledTextInput">Nama Pengirim</label>
                <input type="text" class="form-control" id="disabledTextInput" name="nama" value="{{$user->name}}" readonly>
                {{-- <input type="hidden" class="form-control" id="disabledTextInput" name="nama" value="{{Auth::user()->id}}" > --}}
                </select>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                  <label for="disabledTextInput">Jenis Transaksi</label>
                  {{-- <input type="text" class="form-control" id="disabledTextInput" name="nama" value="{{$user->nama}}" readonly/> --}}
                  <select name="jenis_pembayaran" class="form-control" readonly="readonly">
                  {{-- @foreach ($transaksi as $item) --}}
                      <option value="Transfer" selected>Transfer</option>
                      <option value="Transfer">Pembayaran</option>
                      <option value="Transfer">Top-up</option>
                  {{-- @endforeach --}}
                  </select>
                  </div>
            </fieldset>
            <fieldset>
              <div class="form-group">
                <label for="disabledTextInput">Tujuan Transfer</label>
                {{-- <input type="text" class="form-control" id="disabledTextInput" name="nama" value="{{$user->nama}}" readonly/> --}}
                <select name="tujuan" class="form-control" >
                @foreach ($YA as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                </select>
                </div>
          </fieldset>
            <input type="hidden" name="userId" value="{{$User->user_id}}">
            <div class="form-group">
              <div class="form-group">
                  <label>Jumlah Uang</label>

                  <input type="Text" name="jumlah_saldo" class="form-control">
              </div>
            </div>
            <fieldset>
              <div class="form-group">
                <div class="form-group">
                  <label>Keterangan Transaksi</label>
                  <input type="text" class="form-control" id="disabledTextInput" name="keterangan">

                </div>
              </div>
            </fieldset>
            {{-- <div class="form-group">
              <div class="form-group">
                  <label>Password</label>

                  <input type="Text" name="password" class="form-control">
              </div>
            </div> --}}
            <div class="form-group">
              <label for="exampleInputFile">Bukti Pembayaran <span class="fw-normal">(Foto harus format jpg atau png)</span></label>
              <div class="input-group">
                <div>
                  <input type="file" name="bukti_pembayaran" class="form-control" @error('bukti_pembayaran') is-invalid @enderror>
                  <div class="text-red">
                    @error('bukti_pembayaran')
                        {{ $message }}
                    @enderror
                  </div>
                  {{-- <label class="custom-file-label" for="exampleInputFile"></label> --}}
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="ml-auto">
            <a href="#" data-toggle="modal" data-target="#logoutModal">
            <button type="submit" class="btn btn-primary float-right">Submit</button>
          </a>
          </div>

          <input type="button" value="Add to Cart"
          <?php if ($pin == '0'){ ?> disabled <?php   } ?>
          onclick="addtocart(<?php echo $row["prod_id"]?>)" />


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Masukkan PIN</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">×</span>
              </button>
          </div>
          {{-- <div class="modal-body">Anda Yakin? Duitlo ini</div> --}}

          <input type="password" name="pin" pattern="[0-9]{4}" class="form-control tengah p3 col-sm-5 mx-auto" maxlength="4">

          <div class="modal-footer">

              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              {{-- <a class="btn btn-success" href="login.html">Logout</a> --}}

                <button type="submit" class="btn btn-success">Kirim</button>

          </div>
      </div>
  </div>
</div>

        </form>
    </div>
</div>

@endsection
