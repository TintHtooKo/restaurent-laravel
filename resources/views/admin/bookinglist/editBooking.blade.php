@extends('admin.layout.master')
@section('content')
<div class="container">
    
    <a href="{{route('bookingList')}}" class="btn btn-warning mb-4"><i class="fa fa-arrow-left"></i></a>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card p-3 rounded shadow-sm">
                <div class="card-title bg-dark text-white p-3 text-center font-bold h5">Booking Detail</div>

                 <form action="{{route('bookingEdit', $booking->id)}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input readonly type="text" id="name" name="name" value="{{$booking->name}}"  class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input readonly type="email" id="email" name="email" value="{{$booking->email}}"  class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input readonly type="text" id="phone" name="phone" value="{{$booking->phone}}"  class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="mb-3">
                            <label for="table" class="form-label">Table Number</label>
                            <input readonly type="text" id="table" name="table" value="{{$booking->table_name}}" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="mb-3">
                            <label for="guest" class="form-label">No of Guest</label>
                            <input readonly type="text" id="guest" name="guest" value="{{$booking->no_of_guest}}" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input readonly type="text" id="date" name="datetime" value="{{$booking->datetime}}" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1" @if($booking->make_as_read == true) checked @endif>
                            <label class="form-check-label" for="exampleCheck1">Make As Read</label>
                        </div>                        
                        <div class="mb-3">
                            <input type="submit" value="Create" class="btn btn-primary w-100 rounded shadow-sm">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
