@extends('admin.layout.master')
@section('content')
<div class="">
    <h3 class="text-center mb-3">User List</h3>
    <div class="d-flex justify-content-between mx-5">
        <div class="my-3">
        </div>
        <div class=" my-3">
            <form action="{{route('userList')}}" method="get">
                @csrf
                <div class="input-group">
                    <input type="text" name="search" value="{{request('search')}}" class=" form-control" placeholder="Search ...">
                    <button class="btn bg-dark text-white" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Created At</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($user as $item)
                <tr>
                    <th scope="row">{{$loop->iteration }}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->role}}</td>
                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                    <td class=" d-flex">
                        @if (Auth::user()->role == 'superadmin')
                        <a href="{{route('userDelete', $item->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        @endif
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection