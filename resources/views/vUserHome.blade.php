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
    @foreach ($user as $data)
        <h1 class="text-success fw-bolder fs-2 pt-3">Halo<span class="text-dark">, {{$data->nama}}</span></h1>
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
              <h2>Rp {{$data->saldo}}</h2>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="/saldo">
                <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Saldo</button>
              </a>
            </div>
        </div>

        <div class="row taskCalendar mt-5 pt-5">
          <div class="col-lg-7">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Task
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">
                  {{-- @foreach ($tasks as $item)
                    
                  @endforeach --}}
                  {{-- @for ($i=0; $i < count($tasks); $i++)
                    <li>{{$tasks[$i]}}</li>
                  @endfor () --}}
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-lg-5">
               
          </div>
        </div>

    
        
    @endforeach 
</div>
@endsection