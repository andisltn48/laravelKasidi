@extends('layout/vLink')

@section('content')
    <section class="container sc-login">
        <div class="row ">
            <div class="col loginImage">
                <img  class="img-fluid " src="{{asset('images/loginImage.svg')}}" alt="kkk">
            </div>
            <div class="col loginField">
                <form class="formLogin" action="/login" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admin as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->username}}</td>
                                <td>{{$data->password}}</td>
                            </tr>                    
                        @endforeach
                    </tbody>
                </table>
        </div>
    </section>
@endsection
