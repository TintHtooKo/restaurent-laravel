@extends('admin.layout.master')
@section('content')
<div class="container">
    <a href="{{route('adminMenu')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
    <div class="row">
        <div class="col-6 offset-3 card p-3 rounded shadow-sm">
            <div class="card-title bg-dark text-white p-3 text-center font-bold h5">Add New Menu</div>

            <form action="{{route('addMenu')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" value="{{old('name')}}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">
                        @error('name')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" value="{{old('price')}}" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Enter price">
                        @error('price')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
    
    
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" onchange="loadFile(event)" name="image" class="form-control mb-3 @error('image') is-invalid @enderror" >
                        <img id="output" src="{{asset('/demo.jpg')}}" class="img-profile img-thumbnail" alt="">
                        @error('image')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Create" class="btn btn-primary w-100 rounded shadow-sm">
                    </div>
                </div>
            </form>
            
        </div>
        
    </div>
</div>
@endsection