@extends('layouts.user')

@section('content') 
    <div class="container">
        <div class="col">
            <h4>Room Detail</h4>
            <div class="col my-3">
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col-12 col-md-8 col-lg-8">
                        <div id="carouselExampleAutoplaying" class="carousel slide mb-3" data-bs-ride="carousel">
                            <div style="max-height: 450px;" class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2a/37/f6/f4/cc72ff34-9a89-4cc9.jpg?w=800&h=-1&s=1"" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2a/37/f6/f4/cc72ff34-9a89-4cc9.jpg?w=800&h=-1&s=1"" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2a/37/f6/f4/cc72ff34-9a89-4cc9.jpg?w=800&h=-1&s=1"" class="d-block w-100" alt="...">
                                </div>
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
                        <h3 class="mb-3"><i class="fa-solid fa-hotel me-2"></i>Hotel Name</h3>
                        <h6><i class="fa-solid fa-envelope-circle-check me-2"></i>Hotel email</h6>
                        <h6><i class="fa-solid fa-phone me-2"></i>Hotel Phone</h6>
                        <h6><i class="fa-solid fa-address-card me-2"></i>Hotel address</h6>
                        <h6><i class="fa-solid fa-location-dot me-2"></i><a href="#">Hotel Map</a></h6>
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
        </div>
    </div>
@endsection