@extends('layouts.admin')
@section('hotel')
    active
@endsection

@section('content')
    <div class="col">
        <h3 class="mb-3">Hotels</h3>
        <div class="col d-flex">
            <div class="col">
                <h5>Total-50</h5>
            </div>
            <div class="col text-end">
                <a class="btn btn-outline-success" href="{{ url('hotels/add') }}">Add Hotel</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Township</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hotels as $hotel)
                    <tr>
                        <td>{{ $hotel->id }}</td>
                        <td>{{ $hotel->hotel_name }}</td>
                        <td>{{ $hotel->township_name }}</td>
                        <td>{{ $hotel->hotel_phone }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-success hotelViewBtn" hotelId="{{ $hotel->id }}" data-bs-toggle="modal" data-bs-target="#hotelViewModal">View</button>
                            <a href="{{ url('hotels/update',$hotel->id) }}" class="btn btn-sm btn-outline-info">Update</a>
                            <a href="{{ url('hotels/delete',$hotel->id) }}" class="btn btn-sm btn-outline-danger">Delete</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Hotel View Modal -->
    <div class="modal fade" id="hotelViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hotel Detail</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="hotels">
                   
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
            $('.hotelViewBtn').click(function(){
                $hotelId=$(this).attr('hotelId');
                $.ajax({
                    type:'get',
                    url:"{{ url('ajax/hotels') }}",
                    dataType:'json',
                    data:{
                        'id':$hotelId,
                    },
                    success:function(res){
                        $('#hotels').html(`
                            <div class="col d-block d-md-flex d-lg-flex">
                                <div class="col">
                                    <img class="w-100" src="{{ asset('storage/hotel_photos/${res[`hotel_photo`]}') }}" alt="Photo">
                                </div>
                                <div class="col overflow-auto ps-3">
                                    <table class="table table-responsive">
                                        <tr>
                                            <th>Hotel Name</th>
                                            <th>${res['hotel_name']}</th>
                                        </tr>
                                        <tr>
                                            <th>Hotel Phone</th>
                                            <th>${res['hotel_phone']}</th>
                                        </tr>
                                        <tr>
                                            <th>Hotel Email</th>
                                            <th>${res['hotel_email']}</th>
                                        </tr>
                                        <tr>
                                            <th>Hotel Address</th>
                                            <th class=" text-wrap">${res['hotel_address']}</th>
                                        </tr>
                                        <tr>
                                            <th>Township</th>
                                            <th>${res['township_name']}</th>
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
