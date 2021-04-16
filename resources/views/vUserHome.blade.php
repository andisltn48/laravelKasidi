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
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="{{route('saldo.tambahSaldo.create',$user->user_id)}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Saldo</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Saldo -->
        <div class="col-xl col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-3">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Saldo</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$saldoRupiah}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="card col-xl-7" style="position: relative; left: 0px; top: 0px;">
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
              <li @if($item->status=='LUNAS') style="pointer-events:none; opacity:0.6;"  @endif>
                <a href="{{route('task.pembayaran.create',$user->user_id)}}">
                  <span class="handle ui-sortable-handle text-dark">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-ellipsis-v"></i>
                  </span>
                  <div class="icheck-primary d-inline ml-2 text-dark">
                    <input type="checkbox" value="" name="todo2" id="todoCheck2" @if($item->status=='LUNAS') checked="" @endif disabled>
                    <label for="todoCheck2"></label>
                  </div>
                  <span class="text text-dark">{{$item->nama_task}}</span>
                  <small class="badge badge-info"><i class="far fa-clock"></i> {{$item->batas_pembayaran}}</small>
                  <div class="tools ">
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-o"></i>
                  </div>
                </a>
              </li>
            @endforeach
          </ul>
        </div>
    </div>
</div>

@endsection