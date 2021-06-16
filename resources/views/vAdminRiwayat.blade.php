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
        <h1 class="h3 mb-0 text-gray-800">Riwayat</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Daftar Riwayat
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
                                <th>Status</th>
                                @if (Auth::user()->role == 'admin')
                                <th>Hapus</th>
                                @endif
                            </tr>
                        </thead>
                        @foreach ($allTransaksi as $data)
                            <tbody>
                                <tr>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->jenis_pembayaran}}</td>
                                    <td>{{$data->jumlah_saldo}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td>{{$data->status}}</td>
                                    @if (Auth::user()->role == 'admin')
                                    <td class="text-center">
                                        <form action="{{'/riwayat/delete/'. $data->id}}" method="POST">
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                        @endforeach
                        {{-- {{ ($allTransaksi->links()) }} --}}
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
