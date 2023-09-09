@extends('layouts.admin')

@section('guest')
    active
@endsection

@section('content')
    <div class="col">
        <h3 class="mb-3">Guest Update</h3>
        <div class="card p-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('guests/update') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $guest->user_id }}">
                <input type="hidden" name="id" value="{{ $guest->id }}">
                <div class="col d-md-flex d-lg-flex">
                    <div class="col p-1 m-1">
                        <select id="guestHotelSelect" class="form-select" name="hotel_id" aria-label="Default select example" required>
                            <option value="">Select Hotel*</option>
                            @foreach ($hotels as $hotel)
                                <option value="{{ $hotel->id }}" {{ $guest->hotel_id==$hotel->id? "selected": "" }}>{{ $hotel->hotel_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col p-1 m-1">
                        <select class="form-select" id="guestRoomSelect" name="room_id" aria-label="Default select example" required>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}" {{ $guest->room_id==$room->id? "selected":"" }}>{{ $room->room_number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col d-md-flex d-lg-flex">
                    <div class="col p-1 m-1">
                        <label class="form-label">Name*</label>
                        <input type="text" value="{{ $guest->name }}" name="name" class="form-control" required>
                    </div>
                    <div class="col p-1 m-1">
                        <label class="form-label">Email*</label>
                        <input type="email" value="{{ $guest->email }}" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="col d-md-flex d-lg-flex">
                    <div class="col p-1 m-1">
                        <label class="form-label">Phone*</label>
                        <input type="number" value="{{ $guest->phone }}" name="phone" class="form-control" required>
                    </div>
                    <div class="col p-1 m-1">
                        <label class="form-label">Birthday</label>
                        <input type="date" value="{{ $guest->birthday }}" name="birthday" class="form-control">
                    </div>
                </div>
                <div class="col d-md-flex d-lg-flex">
                    <div class="col p-1 m-1">
                        <label class="form-label">Nrc</label>
                        <input type="text" value="{{ $guest->nrc }}" name="nrc" class="form-control">
                    </div>
                    <div class="col p-1 m-1">
                        <label class="form-label">Passport</label>
                        <input type="text" value="{{ $guest->passport }}" name="passport" class="form-control">
                    </div>
                </div>
                <div class="col d-md-flex d-lg-flex">
                    <div class="col p-1 m-1">
                        <label class="form-label">Check In Date*</label>
                        <input type="date" value="{{ $guest->check_in_date }}" name="check_in_date" class="form-control" required>
                    </div>
                    <div class="col p-1 m-1">
                        <label class="form-label">Check Out Date*</label>
                        <input type="date" value="{{ $guest->check_out_date }}" name="check_out_date" class="form-control" required>
                    </div>
                </div>
                <div class="col p-2 text-end">
                    <button type="submit" class="btn btn-outline-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('hotelJs')
    <script>
        $(document).ready(function(){
            $('#guestHotelSelect').change(function(){
                $hotelId=$(this).val();
                $.ajax({
                    type:'get',
                    url:"{{ url('ajax/guests/hotel') }}",
                    dataType:'json',
                    data:{
                        'id':$hotelId,
                    },
                    success:function(res){
                        $list='';
                        for($i=0; $i<res.length; $i++){
                            $list+=`
                                <option value="${res[$i]['id']}">${res[$i]['room_number']}</option>
                            `;
                        }
                        $('#guestRoomSelect').html($list);
                    }
                });
            });
        });
    </script>
@endsection