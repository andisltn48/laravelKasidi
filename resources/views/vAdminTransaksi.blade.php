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
        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Daftar Transaksi
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jenis Transaksi</th>
                                <th>Jumlah Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Bukti Transaksi</th>
                                <th>Validasi</th>
                            </tr>
                        </thead>
                        @foreach ($allTransaksi as $data)
                            <tbody>
                                <tr>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->jenis_pembayaran}}</td>
                                    <td>{{$data->jumlah_saldo}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td><img class="myImg" src="{{'images/buktiPembayaran/'.$data->bukti_pembayaran}}" style="width:100%;max-width:50px"></td>
                                    <td class="text-center">
                                        <form action="{{ route('transaksi.updateStatus.store', $data->id) }}" method="POST">
                                            <button class="btn btn-primary" type="submit">Konfirmasi</button>
                                        </form>
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

<div class="modal modalImage fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <img id="popup-img" src="" alt="">
    </div>
  </div>
</div>
<script>
$('.myImg').click(function(){
    var src = $(this).attr('src');
    $('.modalImage').modal('show');
    $('#popup-img').attr('src',src);
});
</script>
@endsection
