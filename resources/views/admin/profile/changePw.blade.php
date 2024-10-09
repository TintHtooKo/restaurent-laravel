@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body shadow">
                    <form action="{{route('changePassword')}}" method="POST" class="p-3" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label for="oldPassword" class="form-label">Old Password</label>
                            <input type="password" name="oldPassword" id="oldPassword" class="form-control @error('oldPassword') is-invalid @enderror" placeholder="Enter Old Password" >
                            @error('oldPassword')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" name="newPassword" id="newPassword" class="form-control @error('newPassword') is-invalid @enderror" placeholder="Enter New Password" >
                            @error('newPassword')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control @error('confirmPassword') is-invalid @enderror" placeholder="Confirm Password" >
                            @error('confirmPassword')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div>
                            <input type="submit" class="btn btn-dark text-white w-100" value="Change Password">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
