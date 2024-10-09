@extends('admin.layout.master')
@section('content')
<div class="container">
    <!-- Back Button -->
    <a href="{{route('profilePage')}}" class="btn btn-warning mb-4"><i class="fa fa-arrow-left"></i></a>

    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card p-3 rounded shadow-sm">

                <div class="card-title bg-dark text-white p-3 text-center font-bold h5">Edit Profile</div>
                <form action="{{route('editProfile')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" value="{{old('name',Auth::user()->name)}}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" >
                            @error('name')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" value="{{old('email',Auth::user()->email)}}" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" >
                            @error('email')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Update" class="btn btn-primary w-100 rounded shadow-sm">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
