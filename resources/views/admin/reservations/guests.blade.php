@extends('layouts.admin')
@section('guest')
    active
@endsection

@section('content')
    <div class="col overflow-auto">
        <h3 class="mb-3">Guests</h3>
        <div class="col mb-2">
            <form action="{{ url('guests/search') }}" method="GET">
                <input type="search" name="search" class="form-control m-auto border-danger rounded-pill" style="max-width: 350px;" value="{{ request('search') }}" placeholder="Search With Name or Phone No">
            </form>
        </div>
        <div class="col d-flex">
            <div class="col">
                <h5>Total-{{ $total }} | Show-{{ $guests->count() }}</h5>
            </div>
            <div class="col text-end">
                <a class="btn btn-outline-success" href="{{ url('guests/add') }}">Add Guest</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Check IN Date</th>
                    <th>Check Out Date</th>
                    <th>Day</th>
                    <th>Room Type</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guests as $guest)
                    <tr>
                        <td>{{ $guest->id }}</td>
                        <td>{{ $guest->name }}</td>
                        <td>{{ $guest->phone }}</td>
                        <td class="text-success">{{ $guest->check_in_date }}</td>
                        <td class="text-danger">{{ $guest->check_out_date }}</td>
                        <td>
                            {{ Carbon\Carbon::parse($guest->check_in_date)->diffInDays(Carbon\Carbon::parse($guest->check_out_date)) }}
                            Days
                        </td>
                        <td>
                            @if ($guest->room_type == 1)
                                <span class="badge bg-success">Simple</span>
                            @elseif ($guest->room_type == 2)
                                <span class="badge bg-info">Premium</span>
                            @else
                                <span class="badge bg-primary">Vip</span>
                            @endif
                        </td>
                        <td>
                            {{ Carbon\Carbon::parse($guest->check_in_date)->diffInDays(Carbon\Carbon::parse($guest->check_out_date)) * $guest->room_price }}
                            Ks
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-success guestViewBtn" guestId="{{ $guest->id }}"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">View</button>
                            <a href="{{ url('hotels/update', $guest->id) }}" class="btn btn-sm btn-outline-info">Update</a>
                            <a href="{{ url('hotels/delete', $guest->id) }}"
                                class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $guests->links() }}
    </div>

    <!-- Guest View Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Guest Detail</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="guests">

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
            $('.guestViewBtn').click(function() {
                $guestId = $(this).attr('guestId');
                $.ajax({
                    type: 'get',
                    url: "{{ url('ajax/guests') }}",
                    dataType: 'json',
                    data: {
                        'id': $guestId,
                    },
                    success: function(res) {
                        $('#guests').html(`
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
                                    <th>Unknown</th>
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
