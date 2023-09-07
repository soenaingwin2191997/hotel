@extends('layouts.admin')

@section('room')
    action
@endsection

@section('content')
    <div class="col">
        <h3 class="mb-3">Rooms</h3>
        <div class="col mb-2">
            <form action="#">
                <input type="search" name="" class="form-control m-auto border-danger rounded-pill" style="max-width: 350px;" placeholder="Search By Room No">
            </form>
        </div>
        <div class="col d-flex">
            <div class="col">
                <div class="dropdown d-inline">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Choose Hotels
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                <span class="h5 ms-3">Total-{{ $rooms->count() }}</span>
            </div>
            <div class="col text-end">
                <a class="btn btn-outline-success" href="{{ url('rooms/add') }}">Add Rooms</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Hotel Name</th>
                    <th>Room Number</th>
                    <th>Room Type</th>
                    <th>Room Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->hotel_name }}</td>
                        <td>{{ $room->room_number }}</td>
                        <td>
                            @if ($room->room_type==1)
                                <span class="badge bg-success">Simple</span>
                            @elseif ($room->room_type==2)
                                <span class="badge bg-info">Premium</span>
                            @else
                                <span class="badge bg-primary">Vip</span>
                            @endif
                        </td>
                        <td>
                            @if ($room->room_status=='1')
                                <span class="badge bg-success">Good</span>
                            @elseif ($room->room_status=='2')
                                <span class="badge bg-info">Repair</span>
                            @else
                                <span class="badge bg-danger">Damaged</span>
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-info roomViewBtn" data-bs-toggle="modal" data-bs-target="#roomViewModal" roomId="{{ $room->id }}">View</a>
                            <a href="#" class="btn btn-sm btn-outline-success">Update</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

     <!-- Room View Modal -->
     <div class="modal fade" id="roomViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Room Detail</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="rooms">
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('hotelJs')
    <script>
        $(document).ready(function(){
            $('.roomViewBtn').click(function(){
                $roomId=$(this).attr('roomId');
                $.ajax({
                    type:'get',
                    url:"{{ url('ajax/rooms') }}",
                    dataType:"json",
                    data:{
                        'id':$roomId,
                    },
                    success:function(res){
                        $('#rooms').html(`
                            <div class="col d-block d-md-flex d-lg-flex">
                                <div class="col">
                                    <img class="w-100" src="{{ asset('storage/room_photos/${res[`room_photo`]}') }}" alt="Photo">
                                </div>
                                <div class="col ps-3">
                                    <table class="table">
                                        <tr>
                                            <th>Hotel Name</th>
                                            <th>${res['hotel_name']}</th>
                                        </tr>
                                        <tr>
                                            <th>Floor</th>
                                            <th>${res['room_floor']}</th>
                                        </tr>
                                        <tr>
                                            <th>Room Price</th>
                                            <th>${res['room_price']} Ks</th>
                                        </tr>
                                        <tr>
                                            <th>Person</th>
                                            <th>${res['room_person']}</th>
                                        </tr>
                                        <tr>
                                            <th>Room bad</th>
                                            <th>${res['room_bad']}</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        `);
                    }
                })
            });
        });
    </script>
@endsection
