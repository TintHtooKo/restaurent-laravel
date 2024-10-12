
@extends('admin.layout.master')
@section('content')
<div class="">
    <h3 class="text-center mb-3">Booking List</h3>
    <div class="d-flex justify-content-between mx-5">
        <div class="my-3">
        </div>
        <div class=" my-3">
            <form action="{{route('bookingList')}}" method="get">
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
                <th scope="col">Phone</th>
                <th scope="col">Table No</th>
                <th scope="col">No of Guest</th>
                <th scope="col">Date Time</th>
                
                <th scope="col">Created At</th>
                <th></th>
              </tr>
            </thead>  
            <tbody>
            @foreach ($booking as $item)
                <tr style="@if($item->make_as_read == true) background-color: #E6E6E9; @endif">
                    <th scope="row" > <span class="@if($item->make_as_read == false)bg-danger text-white px-2 py-1 rounded @endif">{{$loop->iteration }}</span> </th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->table_name}}</td>
                    <td>{{$item->no_of_guest}}</td>
                    <td>{{\Carbon\Carbon::parse($item->datetime)->format('M d,Y H:i')}}</td>                   
                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                    <td class=" d-flex">
                        @if (Auth::user()->role == 'superadmin')
                        <a href="{{route('bookingEditPage',$item->id)}}" class="btn btn-warning mx-2"><i class="fa fa-eye"></i></a>
                        <a href="{{route('bookingDelete', $item->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
