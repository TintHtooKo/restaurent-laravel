@extends('authenticate.master')
@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('register') }}" >
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Name..." value="{{old('name')}}">
                                            @error('name')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address..." value="{{old('email')}}">
                                            @error('email')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                            @error('password')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Confirm Password">
                                            @error('password_confirmation')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                    </div>
                                    <button type='submit' class="btn btn-primary btn-user btn-block">Register</button>
                                    <hr>
                                </form>
                                <hr>
                                {{-- <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            <img src="{{asset('admin/img/4885644.jpg')}}" style="width: 500px" alt="">
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection