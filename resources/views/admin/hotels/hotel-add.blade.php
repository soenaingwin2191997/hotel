@extends('layouts.admin')

@section('hotel')
    active
@endsection

@section('content')
    <div class="col">
        <h3 class="mb-3">Add Hotels</h3>
        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ url('hotels') }}" class="card-body" enctype="multipart/form-data">
                @csrf
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label for="name" class="form-label">Hotel Name*</label>
                        <input type="text" name="hotel_name" class="form-control" placeholder="Enter Hotel Name"
                            id="name" required>
                    </div>
                    <div class="col p-2">
                        <label class="form-label" for="email">Hotel Email*</label>
                        <input type="email" name="hotel_email" class="form-control" placeholder="Enter Hotel Email"
                            id="email" required>
                    </div>
                </div>
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label for="photo" class="form-label">Hotel Photo*</label>
                        <input type="file" accept="image/jpg,image/png,image/jpeg" name="hotel_photo" id="photo"
                            class="form-control" required>
                    </div>
                    <div class="col p-2">
                        <label class="form-label">Hotel Other Photo</label>
                        <input type="file" accept="image/jpg,image/png,image/jpeg" name="photo[]" multiple class="form-control">
                    </div>
                </div>
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label for="phone" class="form-label">Hotel Phone*</label>
                        <input type="number" name="hotel_phone" class="form-control" placeholder="Enter Hotel Phone Number"
                            id="phone" required>
                    </div>
                    <div class="col p-2">
                        <label class="form-label" for="map">Hotel Map*</label>
                        <input type="text" name="hotel_map" class="form-control" placeholder="Enter Hotel Map"
                            id="map" required>
                    </div>
                </div>
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label class="form-label">Hotel Address*</label>
                        <input type="text" name="hotel_address" class="form-control" required>
                    </div>
                    <div class="col p-2">
                        <label class="form-label">Select Township*</label>
                        <select class="form-select" name="township_id" aria-label="Default select example" required>
                            <option selected value="">Choose Township</option>
                            @foreach ($townships as $township)
                                <option value="{{ $township->id }}">{{ $township->township_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col p-2">
                    <label for="desc" class="form-label">Description*</label>
                    <textarea name="hotel_desc" id="desc" class="form-control" required placeholder="Enter Description....."></textarea>
                </div>

                <h4 class="mt-3">Facilities</h4>
                <hr>
                <div class="col d-flex flex-wrap">
                    <div class="mx-2">
                        <input type="checkbox" name="pool" class="me-2"><span class="fw-bold">Pool</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="spa" class="me-2"><span class="fw-bold">Spa</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="car_parking" class="me-2"><span class="fw-bold">Car Parking</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="bar" class="me-2"><span class="fw-bold">Bar</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="city_view" class="me-2"><span class="fw-bold">City View</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="elevator" class="me-2"><span class="fw-bold">Elevator</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="wifi" class="me-2"><span class="fw-bold">Wifi</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="restaurant" class="me-2"><span class="fw-bold">Restaurant</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="gyn" class="me-2"><span class="fw-bold">Gyn</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="air_con" class="me-2"><span class="fw-bold">Air Condition</span>
                    </div>
                </div>
                <hr>
                <div class="col text-end">
                    <button class="btn btn-outline-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('hotelJs')
    <script>
        $(document).ready(function() {

        })
    </script>
@endsection
