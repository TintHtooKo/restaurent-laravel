@extends('admin.layout.master')
@section('content')
    <div class="">
        <a href="{{route('adContact')}}" class="btn btn-warning"><i class="fa-solid fa-arrow-left"></i></a>
        <h3 class="text-center mb-3">Contact Message Detail</h3>
        <div class="row">
            <div class="col-5 offset-3">
                <div class="">
                    <h5>Name : {{$contact->name}}</h5>
                    <h5>Email : {{$contact->email}}</h5>
                    <h5>Subject : {{$contact->subject}}</h5>
                    <h5>Message : {{$contact->message}}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection