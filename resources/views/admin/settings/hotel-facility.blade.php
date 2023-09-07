@extends('layouts.admin')

@section('content')
    <div class="col">
        <h4 class="my-3">Hotel Facilities</h4>
        <div class="col d-flex">
            <div class="col">
                <h5>Total- 10</h5>
            </div>
            <div class="col text-end">
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addFacilityModel">Add Facility</button>
            </div>
        </div>
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Facility Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hotelfacilities as $hotelFacility)
                        <tr>
                            <td>{{ $hotelFacility->id }}</td>
                            <td>{{ $hotelFacility->facility_name }}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-info">Edit</button>
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addFacilityModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ url('hotel-facility/add') }}" class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Hotel Facility</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name">Hotel Facility Name</label>
                        <input type="text" name="facility_name" id="name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
