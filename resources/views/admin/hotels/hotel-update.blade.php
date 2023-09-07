@extends('layouts.admin')

@section('hotel')
    active
@endsection

@section('content')
    <div class="col">
        <h3 class="mb-3">Update Hotels</h3>
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
            <form method="POST" action="{{ url('hotels/update') }}" class="card-body" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $hotel->id }}">
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label class="form-label">Hotel Name*</label>
                        <input type="text" name="hotel_name" value="{{ $hotel->hotel_name }}" class="form-control"
                            placeholder="Enter Hotel Name" required>
                    </div>
                    <div class="col p-2">
                        <label class="form-label" for="email">Hotel Email*</label>
                        <input type="email" name="hotel_email" value="{{ $hotel->hotel_email }}" class="form-control"
                            placeholder="Enter Hotel Email" id="email" required>
                    </div>
                </div>
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label class="form-label">Hotel Phone*</label>
                        <input type="text" name="hotel_phone" value="{{ $hotel->hotel_phone }}" class="form-control"
                            placeholder="Enter Hotel Phone Number" required>
                    </div>
                    <div class="col p-2">
                        <label class="form-label">Hotel Map*</label>
                        <input type="text" name="hotel_map" value="{{ $hotel->hotel_map }}" class="form-control"
                            placeholder="Enter Hotel Map" required>
                    </div>
                </div>
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label class="form-label">Hotel Address*</label>
                        <input type="text" name="hotel_address" value="{{ $hotel->hotel_address }}" class="form-control"
                            placeholder="Enter Hotel Phone Number" id="phone" required>
                    </div>
                    <div class="col p-2">
                        <label class="form-label">Select Township*</label>
                        <select class="form-select" name="hotel_township" aria-label="Default select example" required>
                            {{-- <option selected>Choose Township</option> --}}
                            @foreach ($townships as $township)
                                <option value="">Choose Township</option>
                                <option value="{{ $township->id }}" {{ $hotel->township_id == $township->id ? 'selected' : '' }}>
                                    {{ $township->township_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label class="form-label">Description*</label>
                        <textarea name="hotel_desc" class="form-control" required placeholder="Enter Description.....">{{ $hotel->hotel_desc }}</textarea>
                    </div>
                </div>

                <h4 class="mt-3">Facilities</h4>
                <hr>
                <div class="col d-flex flex-wrap">
                    <div class="mx-2">
                        <input type="checkbox" {{ $hotel->pool == 1 ? 'checked' : '' }} name="pool" class="me-2"><span
                            class="fw-bold">Pool</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $hotel->spa == 1 ? 'checked' : '' }} name="spa" class="me-2"><span
                            class="fw-bold">Spa</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $hotel->car_parking == 1 ? 'checked' : '' }} name="car_parking"
                            class="me-2"><span class="fw-bold">Car Parking</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $hotel->bar == 1 ? 'checked' : '' }} name="bar"
                            class="me-2"><span class="fw-bold">Bar</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $hotel->city_view == 1 ? 'checked' : '' }} name="city_view"
                            class="me-2"><span class="fw-bold">City View</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $hotel->elevator == 1 ? 'checked' : '' }} name="elevator"
                            class="me-2"><span class="fw-bold">Elevator</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $hotel->wifi == 1 ? 'checked' : '' }} name="wifi" class="me-2"><span class="fw-bold">Wifi</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $hotel->restaurant == 1 ? 'checked' : '' }} name="restaurant"
                            class="me-2"><span class="fw-bold">Restaurant</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $hotel->gyn == 1 ? 'checked' : '' }} name="gyn" class="me-2"><span class="fw-bold">Gyn</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $hotel->air_con == 1 ? 'checked' : '' }} name="air_con"
                            class="me-2"><span class="fw-bold">Air Condition</span>
                    </div>
                </div>
                <hr>
                <div class="col">
                    <div class="col-12 col-md-6 col-lg-6 m-auto">
                        <img class="w-100 rounded mb-1" src="{{ asset('storage/hotel_photos/'.$hotel->hotel_photo) }}" alt="Photo">
                        <input type="file" accept="image/jpg,image/png,image/jpeg" name="hotel_photo"
                                class="form-control outline-warning">
                    </div>
                </div>
                <div class="col text-end mt-3">
                    <button type="submit" class="btn btn-outline-success">Update</button>
                </div>
            </form>
        </div>

        <h3 class="mt-5 mb-2">Other Photo</h3>
        <div class="card">
            <div class="col p-3">
                <h5 class="my-3">Add New Photos</h5>
                <form action="{{ url('hotels/photo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                        <input type="file" accept="image/jpg,image/png,image/jpeg" multiple name="photo[]"
                                class="form-control outline-warning" required>
                        <button type="submit" class="btn btn-outline-info">Save</button>
                    </div>
                </form>
            </div>
            <div class="col d-md-flex d-lg-flex flex-wrap">
                @foreach ($hotelPhotos as $hotelPhoto)
                    <div class="col-12 col-md-6 col-lg-6 p-2">
                        <img class="w-100 rounded mb-1" src="{{ asset('storage/hotel_photos/' . $hotelPhoto->photo) }}"
                            alt="Photo">
                        <form method="POST" action="{{ url('hotels/photo/update') }}" class="input-group" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $hotelPhoto->id }}">
                            <input type="file" accept="image/jpg,image/png,image/jpeg" name="photo"
                                class="form-control outline-warning" required>
                            <button type="submit" class="btn btn-outline-info">Update</button>
                            <a href="{{ url('hotels/photo/delete',$hotelPhoto->id) }}" class="btn btn-outline-danger">Delete</a>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('hotelJs')
    <script>
        $(document).ready(function() {

        })
    </script>
@endsection
