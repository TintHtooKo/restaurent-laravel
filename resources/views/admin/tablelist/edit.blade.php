@extends('admin.layout.master')
@section('content')
<div class="container">
    <a href="{{route('adminTable')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
    <div class="row">
        <div class="col-6 offset-3 card p-3 rounded shadow-sm">
            <div class="card-title bg-dark text-white p-3 text-center font-bold h5">Edit Table</div>

            <form action="{{route('editTable', $table->id)}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Table Name</label>
                        <input type="text" value="{{old('name', $table->table_number)}}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">
                        @error('name')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
    
                    {{-- <div class="mb-3">
                        <label class="form-label">Is Available</label>
                        <select name="available" id="" class="form-control  @error('available') is-invalid @enderror">
                            <option value="0" {{$table->is_available ? 'selected' : ''}}>Yes</option>
                            <option value="1" {{$table->is_available ? 'selected' : ''}}>No</option>
                        </select>
                        @error('available')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div> --}}
    
                    <div class="mb-3">
                        <input type="submit" value="Edit" class="btn btn-primary w-100 rounded shadow-sm">
                    </div>
                </div>
            </form>
            
        </div>
        
    </div>
</div>
@endsection