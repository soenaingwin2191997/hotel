@extends('layouts.admin')

@section('reservation')
    active
@endsection

@section('content')
    <div class="col overflow-auto">
        <h3 class="mb-3">Reservations</h3>
        <div class="col mb-2">
            <form method="GET" action="{{ url('reservations/search') }}">
                <input type="search" name="search" class="form-control m-auto border-danger rounded-pill"
                    style="max-width: 350px;" value="{{ request('search') }}" placeholder="Search With Name or Phone No">
            </form>
        </div>
        <div class="col d-flex">
            <div class="col">
                <span class="h5 ms-3">Total-{{ $total }}</span>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Room Number</th>
                    <th>Check In Date</th>
                    <th>Check Out Date</th>
                    <th>Days</th>
                    <th>Room Type</th>
                    <th>View</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->name }}</td>
                        <td>{{ $reservation->room_number }}</td>
                        <td class="text-success">{{ $reservation->check_in_date }}</td>
                        <td class="text-danger">{{ $reservation->check_out_date }}</td>
                        <td>
                            {{ Carbon\Carbon::parse($reservation->check_in_date)->diffInDays(Carbon\Carbon::parse($reservation->check_out_date)) }}
                            Days
                        </td>
                        <td>
                            @if ($reservation->room_type == 1)
                                <span class="badge bg-success">Simple</span>
                            @elseif ($reservation->room_type == 2)
                                <span class="badge bg-info">Premium</span>
                            @else
                                <span class="badge bg-primary">Vip</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-info reservationViewBtn"
                                reservationId="{{ $reservation->id }}" data-bs-toggle="modal"
                                data-bs-target="#reservationModal">View</button>
                        </td>
                        <td>
                            @if ($reservation->action==1)
                            <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Pending
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ url("reservations/2/$reservation->id") }}">Accept</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ url("reservations/3/$reservation->id") }}">Reject</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ url("reservations/4/$reservation->id") }}">Delete</a></li>
                                </ul>
                            </div>
                            @elseif ($reservation->action==2)
                            <div class="dropdown">
                                <button class="btn btn-sm btn-success dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Accept
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ url("reservations/1/$reservation->id") }}">Pending</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ url("reservations/3/$reservation->id") }}">Reject</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ url("reservations/4/$reservation->id") }}">Delete</a></li>
                                </ul>
                            </div>
                            @elseif ($reservation->action==3)
                            <div class="dropdown">
                                <button class="btn btn-sm btn-warning dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Reject
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ url("reservations/1/$reservation->id") }}">Pending</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ url("reservations/2/$reservation->id") }}">Accept</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ url("reservations/4/$reservation->id") }}">Delete</a></li>
                                </ul>
                            </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reservations->links() }}
    </div>

    <!-- Reservation View Modal -->
    <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reservations Detail</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="reservations">

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
        $(document).ready(function() {
            $('.reservationViewBtn').click(function() {
                $reservationtId = $(this).attr('reservationId');
                $.ajax({
                    type: 'get',
                    url: "{{ url('ajax/reservations') }}",
                    dataType: 'json',
                    data: {
                        'id': $reservationtId,
                    },
                    success: function(res) {
                        $('#reservations').html(`
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>${res['name']}</th>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <th>${res['email']}</th>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <th>${res['phone']}</th>
                                </tr>
                                <tr>
                                    <th>Nrc</th>
                                    <th>${res['nrc']}</th>
                                </tr>
                                <tr>
                                    <th>Passport</th>
                                    <th>${res['passport']}</th>
                                </tr>
                                <tr>
                                    <th>Hotel Name</th>
                                    <th>${res['hotel_name']}</th>
                                </tr>
                                <tr>
                                    <th>Room Number</th>
                                    <th>${res['room_number']}</th>
                                </tr>
                                <tr>
                                    <th>Price(One Night)</th>
                                    <th>${res['room_price']} Ks</th>
                                </tr>
                            </table>
                        `);
                    }
                });
            });
        });
    </script>
@endsection
