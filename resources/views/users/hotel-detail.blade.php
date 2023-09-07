@extends('../layouts.user')

@section('content')
    <div class="container my-3">
        <h2 class="text-center mb-5">{{ $hotel->hotel_name }}</h2>
        {{-- <div style="max-width: 600px;" class="m-auto mb-5">
            <input type="search" name="" placeholder="Search Hotel Name or Township"
                class="form-control border-danger rounded-pill">
        </div> --}}
        <div class="col my-3">
            <div class="col d-block d-md-flex d-lg-flex">
                <div class="col-12 col-md-8 col-lg-8">
                    <div id="carouselExampleAutoplaying" class="carousel slide mb-3" data-bs-ride="carousel">
                        <div style="max-height: 450px;" class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/hotel_photos/'.$hotel->hotel_photo) }}" class="d-block w-100" alt="Photo">
                            </div>
                            @foreach ($hotelPhotos as $hotelPhoto)
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/hotel_photos/'.$hotelPhoto->photo) }}" class="d-block w-100" alt="Photo">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col ps-3">
                    <h3 class="mb-3"><i class="fa-solid fa-hotel me-2"></i>{{ $hotel->hotel_name }}</h3>
                    <h6><i class="fa-solid fa-envelope-circle-check me-2"></i>{{ $hotel->hotel_email }}</h6>
                    <h6><i class="fa-solid fa-phone me-2"></i>{{ $hotel->hotel_phone }}</h6>
                    <h6><i class="fa-solid fa-address-card me-2"></i>{{ $hotel->hotel_address }}</h6>
                    <h6><i class="fa-solid fa-location-dot me-2"></i><a href="#">{{ $hotel->hotel_map }}</a></h6>
                    <hr>
                    <h4 class="mb-3">Property amenities</h4>
                    <div class="col d-flex">
                        <div class="col">
                            <h6><i class="fa-solid fa-wifi me-2"></i>Free Wifi</h6>
                            <h6><i class="fa-solid fa-car me-2"></i>Car Parking</h6>
                            <h6><i class="fa-solid fa-tree-city me-2"></i>City View</h6>
                            <h6><i class="fa-solid fa-person-swimming me-2"></i>Pool</h6>
                            <h6><i class="fa-solid fa-elevator me-2"></i>Elevator</h6>
                        </div>
                        <div class="col">
                            <h6><i class="fa-solid fa-utensils me-2"></i>Restaurant</h6>
                            <h6><i class="fa-solid fa-dumbbell me-2"></i>Gyn</h6>
                            <h6><i class="fa-solid fa-wand-magic-sparkles me-2"></i>Spa</h6>
                            <h6><i class="fa-solid fa-temperature-arrow-down me-2"></i>Air Condition</h6>
                            <h6><i class="fa-solid fa-champagne-glasses me-2"></i>Bar</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <h3 class="mb-3">All Rooms</h3>
        <div class="col d-flex flex-wrap">
            @foreach ($rooms as $room)
                <div class="col-12 col-md-4 col-lg-4 p-1">
                    <div class="card">
                        <img class="w-100 rounded" src="{{ asset('storage/room_photos/'.$room->room_photo) }}" alt="Photo">
                    </div>
                    <div class="p-1">
                        <h6><i class="fa-solid fa-list-check me-2"></i>Room Number-{{ $room->room_number }}</h6>
                        <h6><i class="fa-solid fa-florin-sign me-2"></i>Floor-{{ $room->room_floor }}</h6>
                        <h6><i class="fa-solid fa-dollar-sign me-2"></i>30000 ks per nignt</h6>
                        <h6><i class="fa-solid fa-bed me-2"></i>{{ $room->room_bad }} bed {{ $room->room_person }} person</h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
