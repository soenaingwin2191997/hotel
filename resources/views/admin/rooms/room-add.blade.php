@extends('layouts.admin')

@section('room')
    active
@endsection

@section('content')
    <div class="col">
        <h3 class="mb-3">Add Room</h3>
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
            <form method="POST" action="{{ url('rooms') }}" class="card-body" enctype="multipart/form-data">
                @csrf
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label class="form-label">Select Hotel</label>
                        <select class="form-select" name="hotel_id" aria-label="Default select example" required>
                            <option selected value="">Choose Hotel</option>
                            @foreach ($hotels as $hotel)
                                <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col p-2">
                        <label class="form-label">Room No</label>
                        <input type="number" name="room_number" class="form-control" placeholder="Enterb Room Number"
                            required>
                    </div>
                </div>
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label class="form-label">Room Photo</label>
                        <input type="file" accept="image/jpg,image/png,image/jpeg" name="room_photo" class="form-control"
                            required>
                    </div>
                    <div class="col p-2">
                        <label class="form-label">Other Photo</label>
                        <input type="file" accept="image/jpg,image/png,image/jpeg" name="room_other_photo[]" multiple
                            class="form-control">
                    </div>
                </div>
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label class="form-label">Room Price</label>
                        <input type="text" name="room_price" class="form-control" required>
                    </div>
                    <div class="col p-2">
                        <label class="form-label">Select bad</label>
                        <select class="form-select" name="room_bad" aria-label="Default select example" required>
                            <option selected value="">Choose Bad</option>
                            <option value="1">One Bad</option>
                            <option value="1">Two Bad</option>
                            <option value="1">Three Bad</option>
                        </select>
                    </div>
                </div>
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label class="form-label">Select Person</label>
                        <select class="form-select" name="room_person" aria-label="Default select example" required>
                            <option selected value="">Choose Person</option>
                            <option value="1">One Person</option>
                            <option value="2">Two Persons</option>
                            <option value="3">Three Persons</option>
                            <option value="4">Four Persons</option>
                            <option value="5">Five Persons</option>
                        </select>
                    </div>
                    <div class="col p-2">
                        <label class="form-label">Room Floor</label>
                        <input type="number" name="room_floor" class="form-control" required>
                    </div>
                </div>
                <div class="col ">
                    <div class="col p-2">
                        <label for="desc" class="form-label">Description</label>
                        <textarea name="room_desc" id="desc" class="form-control" required placeholder="Enter Description....."></textarea>
                    </div>
                </div>

                <h4 class="mt-3">Room Feature</h4>
                <hr>
                <div class="col d-flex flex-wrap">
                    <div class="mx-2">
                        <input type="checkbox" name="air_con" class="me-2"><span class="fw-bold">Air Con</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="fun" class="me-2"><span class="fw-bold">Fun</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="wifi" class="me-2"><span class="fw-bold">Wifi</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="tv" class="me-2"><span class="fw-bold">Tv</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="breakfast" class="me-2"><span class="fw-bold">Breakfast</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="bathroom" class="me-2"><span class="fw-bold">Bath Room</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="city_view" class="me-2"><span class="fw-bold">City View</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="toilet" class="me-2"><span class="fw-bold">Toilet</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" name="window" class="me-2"><span class="fw-bold">Window</span>
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
