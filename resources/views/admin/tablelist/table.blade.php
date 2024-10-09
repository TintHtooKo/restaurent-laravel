@extends('admin.layout.master')
@section('content')
    <div class="row mx-5">
        <div class="col-lg-4 col-md-6 col-sm-12 mx-lg-5 mb-4">
            <h3>Create New Table</h3>
            <form action="{{route('addTable')}}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="table-name">Table</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter table name">
                    @error('name')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="">
                    <input type="submit" value="Create" class="btn btn-primary w-100">
                </div>
            </form>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="table-responsive">
                <h3>Table List</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Table</th>
                            <th scope="col">Is Available</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($table as $item)
                            <tr>
                                <td>{{ $item->table_number }}</td>
                                <td>
                                    @if($item->is_available)
                                        <span class="bg-danger text-white px-2">No</span>
                                    @else
                                        <span class="bg-success text-white px-2">Yes</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    @if (Auth::user()->role == 'superadmin')
                                        <a href="{{route('editTablePage', $item->id)}}" class="btn btn-warning mx-2"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('deleteTable', $item->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <span class=" d-flex justify-content-end mx-5">{{$table->links()}}</span>
            </div>
        </div>
    </div>
@endsection
