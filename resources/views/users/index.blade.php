@extends('../layouts.user')

@section('content')
    <div class="container my-3">
        <h2 class="text-center mb-5">
            <i class="fa-solid fa-hotel me-2"></i>
                Hotels
            <i class="fa-solid fa-hotel m2-2"></i>
            </h2>
        <div style="max-width: 600px;" class="m-auto mb-5">
            <form action="{{ url('users/hotel/search') }}" method="GET">
                <input style="height: 50px;" type="search" name="search" value="{{ request('search') }}" placeholder="Search Hotel By Name or Township" class="form-control border-danger rounded-pill fs-5">
            </form>
        </div>
        <div class="col my-3">
            <h3 class="mb-3">You Might Like These</h3>
            <div class="col d-flex flex-wrap">
                @foreach ($hotels as $hotel)
                    <div class="col-12 col-md-4 col-lg-3 p-1">
                        <img class="w-100 rounded" src="{{ asset('storage/hotel_photos/'.$hotel->hotel_photo) }}" alt="Photo">
                        <div class="p-1">
                            <h6>
                                <a href="{{ url('users/hotel/detail',$hotel->id) }}"><i class="fa-solid fa-hotel me-2"></i>{{ $hotel->hotel_name }}</a>
                            </h6>
                            <h6><i class="fa-solid fa-city me-2"></i>{{ $hotel->hotel_township }}</h6>
                            <h6><i class="fa-solid fa-location-dot me-2"></i>{{ $hotel->hotel_address }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection