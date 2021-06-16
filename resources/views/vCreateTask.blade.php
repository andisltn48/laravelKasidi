@extends('layouts/vNav')

@section('content')

<div class="container-fluid mt-5 pt-4 position-relative">
    <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title fs-4">Create Task</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('task.addtask.store',$user->user_id)}}" enctype="multipart/form-data">
          @csrf
          {{-- @method(POST) --}}
          <div class="card-body">
            <div class="form-group">
                <label for="disabledTextInput">Nama Task</label>
                <input type="text" class="form-control" id="disabledTextInput" name="nama">
            </div>
            <div class="form-group">
            <div>
                <label>Jumlah Pembayaran</label>

                <input type="Text" name="harga" class="form-control">
            </div>
            </div>
            <div class="form-group">
                <label for="disabledTextInput">Keterangan Task</label>
                <input type="text" class="form-control" id="disabledTextInput" name="keterangan">
            </div>
            <div class="form-group">
                <label for="disabledTextInput">Batas Pembayaran Task</label>
                <input type="date" class="form-control" id="disabledTextInput" name="batasPembayaran">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="ml-auto">
            <button type="submit" class="btn btn-primary float-right">Submit</button>
          </div>
        </form>
    </div>
</div>
@endsection
