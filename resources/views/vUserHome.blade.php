@extends('layouts/vNav')
@include('layouts/vLink')

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
                  @for ($i=0; $i < count($tasks); $i++)
                    <li>{{$tasks[$i]}}</li>
                  @endfor ()
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-lg-5">
            <div class="card bg-gradient-success">
                <div class="card-header border-0">
  
                  <h3 class="card-title">
                    <i class="far fa-calendar-alt"></i>
                    Calendar
                  </h3>
                  <!-- tools card -->
                  <div class="card-tools">
                    <!-- button with a dropdown -->
                    <div class="btn-group">
                      <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                        <i class="fas fa-bars"></i>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a href="#" class="dropdown-item">Add new event</a>
                        <a href="#" class="dropdown-item">Clear events</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">View calendar</a>
                      </div>
                    </div>
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                  <!-- /. tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body pt-0">
                  <!--The calendar -->
                  <div id="calendar" style="width: 100%"></div>
                </div>
                <!-- /.card-body -->
            </div>
          </div>
        </div>

    
        {{-- <div class="taskCalendar mt-5 pt-5">
            <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- TO DO List -->
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
                    <li>
                      <!-- todo text -->
                      <span class="text">Design a nice theme</span>
                      <!-- Emphasis label -->
                      <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                    </li>
                    <li>
                      <span class="text">Make the theme responsive</span>
                      <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                      <div class="tools">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="text">Let theme shine like a star</span>
                      <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                      <div class="tools">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="text">Let theme shine like a star</span>
                      <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                      <div class="tools">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="text">Check your messages and notifications</span>
                      <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                      <div class="tools">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="text">Let theme shine like a star</span>
                      <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                      <div class="tools">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash-o"></i>
                      </div>
                    </li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5">
              <div class="card bg-gradient-success">
                  <div class="card-header border-0">
    
                    <h3 class="card-title">
                      <i class="far fa-calendar-alt"></i>
                      Calendar
                    </h3>
                    <!-- tools card -->
                    <div class="card-tools">
                      <!-- button with a dropdown -->
                      <div class="btn-group">
                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                          <i class="fas fa-bars"></i>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <a href="#" class="dropdown-item">Add new event</a>
                          <a href="#" class="dropdown-item">Clear events</a>
                          <div class="dropdown-divider"></div>
                          <a href="#" class="dropdown-item">View calendar</a>
                        </div>
                      </div>
                      <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                    <!-- /. tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body pt-0">
                    <!--The calendar -->
                    <div id="calendar" style="width: 100%"></div>
                  </div>
                  <!-- /.card-body -->
              </div>
            </section>
          </div> --}}
    @endforeach 
</div>
@endsection