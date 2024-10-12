@extends('admin.layout.master')
@section('content')
    <div class="">
        <a href="{{route('adContact')}}" class="btn btn-warning"><i class="fa-solid fa-arrow-left"></i></a>
        <h3 class="text-center mb-3">Contact Message Detail</h3>
        <div class="row">
            <div class="col-5 offset-3">
                <div class="">
                    <p>Name : {{$contact->name}}</p>
                    <p>Email : {{$contact->email}}</p>
                    <p>Subject : {{$contact->subject}}</p>
                    <p>Message : {{$contact->message}}</p>
                    <form action="{{route('contactUpdate',$contact->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="{{$contact->name}}">
                        <input type="hidden" name="email" value="{{$contact->email}}">
                        <input type="hidden" name="subject" value="{{$contact->subject}}">
                        <textarea class="d-none" name="message" id="" cols="30" rows="10">{{$contact->message}}</textarea>
                        <div class="mb-3">
                            <label class="form-label">Make As Read</label>
                            <select name="check" id="" class="form-control ">
                                <option value="0" {{$contact->make_as_read? 'selected' : ''}}>Still Doesn't Read</option>
                                <option value="1" {{$contact->make_as_read? 'selected' : ''}}>ALready Read</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Create" class="btn btn-primary w-100 rounded shadow-sm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection