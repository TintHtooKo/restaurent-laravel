@extends('admin.layout.master')
@section('content')
   <div class="container">
        <h3>Profile</h3>
        <div class="row">
            <div class="col-12 col-md-4 offset-md-2 text-center mb-4 mb-md-0">
                <img src="{{asset('admin/img/undraw_profile.svg')}}" class="img-fluid" style="width:250px" alt="Profile Image">
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <h5>Name: {{Auth::user()->name}}</h5>
                    <h5>Email: {{Auth::user()->email}}</h5>
                </div>
                <div class="d-flex flex-column flex-md-row">
                    <a href="{{route('editProfilePage')}}" class="btn btn-primary mb-2 mb-md-0 mr-md-2">Edit Profile</a>
                    <a href="{{route('changePasswordPage')}}" class="btn btn-warning">Change Password</a>
                </div>
            </div>
        </div>
   </div>
@endsection
