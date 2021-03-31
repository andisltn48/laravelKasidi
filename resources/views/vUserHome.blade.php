@extends('layouts/vLink')
{{-- @extends('layouts/vLink') --}}

@section('content')
<div class="container-fluid mt-5 pt-5 position-relative userHome">
  @if (session('pesan'))
  <div class="alert alert-success alert-dismissble">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
    <h4><i class="icon fa fa-check"></i>Success!</h4>
    {{ session('pesan') }}.
  </div>
  @endif

  <h1 class="text-success fw-bolder fs-2 pt-3">Halo<span class="text-dark">, {{$user->nama}}</span></h1>
  <hr>
  <div class="card saldoCard mt-4">
    <div class="card-header bg-success">
      <h3 class="card-title fs-2 fw-bold text-dark">
        <i class="fas fa-wallet"></i>
        Saldo
      </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <h2>Rp {{$user->saldo}}</h2>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a href="{{route('saldo.tambahSaldo.create',$user->user_id)}}">
        <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Saldo</button>
      </a>
    </div>
  </div>

  <div class="card col-lg-7" style="position: relative; left: 0px; top: 0px;">
    <div class="card-header ui-sortable-handle" >
      <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
        TASK
      </h3>

      <div class="card-tools">
        <ul class="pagination pagination-sm">
          <li class="page-item"><a href="#" class="page-link">«</a></li>
          <li class="page-item"><a href="#" class="page-link">1</a></li>
          <li class="page-item"><a href="#" class="page-link">2</a></li>
          <li class="page-item"><a href="#" class="page-link">3</a></li>
          <li class="page-item"><a href="#" class="page-link">»</a></li>
        </ul>
      </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <ul class="todo-list ui-sortable" data-widget="todo-list">
        @foreach ($task as $item)
        <li @if($item->status=='LUNAS') class="done" @endif>
          <span class="handle ui-sortable-handle">
            <i class="fas fa-ellipsis-v"></i>
            <i class="fas fa-ellipsis-v"></i>
          </span>
          <div class="icheck-primary d-inline ml-2">
            <input type="checkbox" value="" name="todo2" id="todoCheck2" @if($item->status=='LUNAS') checked="" @endif disabled>
            <label for="todoCheck2"></label>
          </div>
          <span class="text">{{$item->nama_task}}</span>
          <small class="badge badge-info"><i class="far fa-clock"></i> {{$item->batas_pembayaran}}</small>
          <div class="tools">
            <i class="fas fa-edit"></i>
            <i class="fas fa-trash-o"></i>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>






</div>
@endsection