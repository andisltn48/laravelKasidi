@extends('layouts/vNav')

@section('content')

<div class="container-fluid mt-5 pt-4 position-relative">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title fs-4">Form Pembayaran</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="" enctype="multipart/form-data">
          @csrf
          {{-- @method(POST) --}}
          <div class="card-body">
            <fieldset>
              <div class="form-group">
                <label for="disabledTextInput">Nama</label>
                <input type="text" class="form-control" id="disabledTextInput" name="nama" value="{{Auth::user()->name}}" disabled/>
                </select>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                  <label for="disabledTextInput">Pilih Task</label>
                  <select id="namatask" name="namaTask" class="form-control" >
                  @foreach ($task as $item)
                      <option value="{{$item->nama_task}}">{{$item->nama_task}}</option>
                  @endforeach
                  </select>
                  </div>
            </fieldset>
            <fieldset>
              <div class="form-group">
                <label for="disabledTextInput">Harga</label>
                <input type="text" class="form-control" id="hargaTask" name="hargaTask" value="" readonly/>
                {{-- <select name="namaTask" class="form-control" >
                @foreach ($allTransaksi as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                </select> --}}
                </div>
          </fieldset>

            {{-- <div class="form-group">
              <div class="form-group">
                  <label>Jumlah Uang</label>

                  <input type="Text" name="jumlahSaldo" class="form-control">
              </div>
            </div> --}}
            <fieldset>
              <div class="form-group">
                <div class="form-group">
                  <label>Keterangan Transaksi</label>
                  <input type="text" class="form-control" id="disabledTextInput" name="nama">

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
          <!-- /.card-body -->

          <div class="ml-auto">
            <button type="submit" class="btn btn-primary float-right">Submit</button>
          </div>
        </form>
    </div>
</div>
<script type=text/javascript>
  $(document).ready(function() {
      $("#namatask").on('change', function () {
          var namataskId = $(this).val();
          console.log(namataskId)
          $.ajax({
              type:"GET",
              url:"{{url('getHargaTask')}}",
              data:{name:namataskId},
              success:function(data) {

                  $.each(data,function(key,value){
                      $("#hargaTask").val(value.harga);
                  });

              }
          })
      })
  })
</script>
@endsection
