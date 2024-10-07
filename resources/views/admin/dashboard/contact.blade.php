@extends('admin.layout.master')
@section('content')
    <div class="">
        <h3 class="text-center mb-3">Contact Message</h3>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($contact as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration }}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->subject}}</td>
                        <td>{{ Str::words($item->message, 13, '...') }}</td>
                        <td class=" d-flex">
                            <a href="{{route('contactDetail', $item->id)}}" class="btn btn-warning mx-3"><i class=" fa fa-eye"></i></a>
                            <a href="{{route('contactDelete', $item->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection