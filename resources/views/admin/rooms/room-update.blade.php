@extends('layouts.admin')

@section('room')
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
            <form method="POST" action="{{ url('rooms/update') }}" class="card-body" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $room->id }}">
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label class="form-label">Select Hotel*</label>
                        <select class="form-select" name="hotel_id" aria-label="Default select example" required>
                            @foreach ($hotels as $hotel)
                                <option value="{{ $hotel->id }}" {{ $room->hotel_id==$hotel->id? "selected":"" }}>{{ $hotel->hotel_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col p-2">
                        <label class="form-label">Room No*</label>
                        <input type="number" value="{{ $room->room_number }}" name="room_number" class="form-control" placeholder="Enterb Room Number"
                            required>
                    </div>
                </div>
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label class="form-label">Room Price*</label>
                        <input type="text" name="room_price" value="{{ $room->room_price }}" class="form-control" required>
                    </div>
                    <div class="col p-2">
                        <label class="form-label">Select bad</label>
                        <select class="form-select" name="room_bad" aria-label="Default select example" required>
                            <option value="1" {{ $room->room_bad==1? "selected":"" }}>One Bad</option>
                            <option value="2" {{ $room->room_bad==2? "selected":"" }}>Two Bad</option>
                            <option value="3" {{ $room->room_bad==3? "selected":"" }}>Three Bad</option>
                        </select>
                    </div>
                </div>
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label class="form-label">Select Person</label>
                        <select class="form-select" name="room_person" aria-label="Default select example" required>
                            <option value="1" {{ $room->room_person==1? "selected":"" }}>One Person</option>
                            <option value="2" {{ $room->room_person==2? "selected":"" }}>Two Persons</option>
                            <option value="3" {{ $room->room_person==3? "selected":"" }}>Three Persons</option>
                            <option value="4" {{ $room->room_person==4? "selected":"" }}>Four Persons</option>
                            <option value="5" {{ $room->room_person==5? "selected":"" }}>Five Persons</option>
                        </select>
                    </div>
                    <div class="col p-2">
                        <label class="form-label">Room Floor*</label>
                        <input type="number" name="room_floor" value="{{ $room->room_floor }}" class="form-control" required>
                    </div>
                </div>
                <div class="col d-block d-md-flex d-lg-flex">
                    <div class="col p-2">
                        <label class="form-label">Room Type*</label>
                        <select class="form-select" name="room_type" aria-label="Default select example" required>
                            <option value="1" {{ $room->room_type==1? "selected":"" }}>Simple</option>
                            <option value="2" {{ $room->room_type==2? "selected":"" }}>Premium</option>
                            <option value="3" {{ $room->room_type==3? "selected":"" }}>Vip</option>
                        </select>
                    </div>
                    <div class="col p-2">
                        <label class="form-label">Room Status*</label>
                        <select class="form-select" name="room_status" aria-label="Default select example" required>
                            <option value="1" {{ $room->room_status==1? "selected":"" }}>Good</option>
                            <option value="2" {{ $room->room_status==2? "selected":"" }}>Repair</option>
                            <option value="3" {{ $room->room_status==3? "selected":"" }}>Damaged</option>
                        </select>
                    </div>
                </div>
                <div class="col ">
                    <div class="col p-2">
                        <label for="desc" class="form-label">Description*</label>
                        <textarea name="room_desc" id="desc" class="form-control" required placeholder="Enter Description.....">{{ $room->room_desc }}</textarea>
                    </div>
                </div>

                <h4 class="mt-3">Facilities</h4>
                <hr>
                <div class="col d-flex flex-wrap">
                    <div class="mx-2">
                        <input type="checkbox" {{ $room->air_con == 1 ? 'checked' : '' }} name="air_con" class="me-2"><span
                            class="fw-bold">Air Condition</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $room->fun == 1 ? 'checked' : '' }} name="fun" class="me-2"><span
                            class="fw-bold">Fun</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $room->wifi == 1 ? 'checked' : '' }} name="wifi"
                            class="me-2"><span class="fw-bold">Wifi</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $room->tv == 1 ? 'checked' : '' }} name="tv"
                            class="me-2"><span class="fw-bold">Tv</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $room->breakfast == 1 ? 'checked' : '' }} name="breakfast"
                            class="me-2"><span class="fw-bold">Breakfast</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $room->lunch == 1 ? 'checked' : '' }} name="lunch"
                            class="me-2"><span class="fw-bold">Lunch</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $room->bathroom == 1 ? 'checked' : '' }} name="bath_room" class="me-2"><span class="fw-bold">Bath Room</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $room->city_view == 1 ? 'checked' : '' }} name="city_view"
                            class="me-2"><span class="fw-bold">City View</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $room->toilet == 1 ? 'checked' : '' }} name="toilet" class="me-2"><span class="fw-bold">Toilet</span>
                    </div>
                    <div class="mx-2">
                        <input type="checkbox" {{ $room->window == 1 ? 'checked' : '' }} name="window"
                            class="me-2"><span class="fw-bold">Window</span>
                    </div>
                </div>
                <hr>
                <div class="col">
                    <div class="col-12 col-md-6 col-lg-6 m-auto">
                        <img class="w-100 rounded mb-1" src="{{ asset('storage/room_photos/'.$room->room_photo) }}" alt="Photo">
                        <input type="file" accept="image/jpg,image/png,image/jpeg" name="room_photo"
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
                <form action="{{ url('rooms/photo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input type="file" accept="image/jpg,image/png,image/jpeg" multiple name="photo[]"
                                class="form-control outline-warning" required>
                        <button type="submit" class="btn btn-outline-info">Save</button>
                    </div>
                </form>
            </div>
            <div class="col d-md-flex d-lg-flex flex-wrap">
                @foreach ($otherPhotos as $otherPhoto)
                    <div class="col-12 col-md-6 col-lg-6 p-2">
                        <img class="w-100 rounded mb-1" src="{{ asset('storage/room_photos/' . $otherPhoto->photo) }}"
                            alt="Photo">
                        <form method="POST" action="{{ url('hotels/photo/update') }}" class="input-group" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $otherPhoto->id }}">
                            <input type="file" accept="image/jpg,image/png,image/jpeg" name="photo"
                                class="form-control outline-warning" required>
                            <button type="submit" class="btn btn-outline-info">Update</button>
                            <a href="{{ url('hotels/photo/delete',$otherPhoto->id) }}" class="btn btn-outline-danger">Delete</a>
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
