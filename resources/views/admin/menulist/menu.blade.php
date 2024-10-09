@extends('admin.layout.master')
@section('content')
<div class="">
    <h3 class="text-center mb-3">Menu List</h3>
    <div class="d-flex justify-content-between mx-5 ">
        <div class="my-3">
            <a href="{{route('addMenuPage')}}" class=" btn btn-sm rounded shadow-md bg-primary text-white"><i class="fa fa-plus"></i></a>
        </div>
        <div class=" my-3">
            <form action="{{route('adminMenu')}}" method="get">
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
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Created At</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($menu as $item)
                <tr>
                    <th scope="row">{{($menu->currentPage() - 1) * $menu->perPage() + $loop->iteration }}</th>
                    <td><img src="{{asset('menu/'.$item->image)}}" style="width: 60px" alt=""></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}} AED</td>
                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                    <td class=" d-flex">
                        <a href="{{route('editMenuPage', $item->id)}}" class="btn btn-warning mx-3"><i class="fa fa-eye"></i></a>
                        @if (Auth::user()->role == 'superadmin')                           
                            <a href="{{route('deleteMenu', $item->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <span class=" d-flex justify-content-end mx-5">{{$menu->links()}}</span>
    </div>
</div>
@endsection