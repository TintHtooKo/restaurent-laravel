@extends('user.layout.master')
@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
            </ol>
        </nav>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->


<!-- Reservation Start -->
<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
<div class="row g-0">
    <div class="col-md-6">
        <div class="video">
            <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                <span></span>
            </button>
        </div>
    </div>
    <div class="col-md-6 bg-dark d-flex align-items-center">
        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
            <h1 class="text-white mb-4">Book A Table Online</h1>
            <form action="{{route('booking')}}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" value="{{old('name',Auth::check() ? Auth::user()->name : '')}}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your Name">
                            <label for="name">Your Name</label>
                            @error('name')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" value="{{old('email', Auth::check() ? Auth::user()->email : '')}}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your Email">
                            <label for="email">Your Email</label>
                            @error('email')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating date" id="date3" data-target-input="nearest">
                            <input type="datetime-local" value="{{old('datetime')}}" name="datetime" class="form-control @error('datetime') is-invalid @enderror datetimepicker-input" id="datetime"  placeholder="Date & Time" />
                            <label for="datetime">Date & Time</label>
                            @error('datetime')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="number" value="{{old('guest')}}" name="guest" class="form-control @error('guest') is-invalid @enderror" placeholder="No Of Guest">
                            <label for="select1">No Of Guest</label>
                            @error('guest')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="number" value="{{old('phone')}}" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                            <label for="select1">Phone</label>
                            @error('phone')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select name="table" class="form-select @error('table') is-invalid @enderror" id="select1">
                                <option value="">Choose Table</option>
                                @foreach ($table as $item)
                                    <option value="{{$item->id}}"
                                    @if (old('table') == $item->id)
                                        selected
                                    @endif
                                    {{-- @if ($item->is_available == true)
                                        disabled
                                    @endif   
                                    class=" @if($item->is_available == true) text-danger @endif"  --}}
                                    >
                                        {{$item->table_number}} 
                                        {{-- @if ($item->is_available == true)
                                            <span>(Reserved)</span>
                                        @endif --}}
                                    </option>
                                @endforeach
                            </select>
                            <label for="message">Select Table</label>
                            @error('table')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content rounded-0">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- 16:9 aspect ratio -->
            <div class="ratio ratio-16x9">
                <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                    allow="autoplay"></iframe>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Reservation Start -->
@endsection

@section('customjs')
<script>
    const today = new Date();
    const localDateTime = today.getFullYear() + '-' +
        String(today.getMonth() + 1).padStart(2, '0') + '-' +
        String(today.getDate()).padStart(2, '0') + 'T' +
        String(today.getHours()).padStart(2, '0') + ':' +
        String(today.getMinutes()).padStart(2, '0');
    document.getElementById('datetime').min = localDateTime;
</script>

@endsection