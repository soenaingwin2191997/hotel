@extends('layouts.admin')

@section('content')
    <div class="col">
        <h4 class="my-3">Towhships</h4>
        <div class="col d-flex">
            <div class="col">
                <h5>Total- <span>{{ $townships->count() }}</span></h5>
            </div>
            <div class="col text-end">
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#townshipAddModel">Add Township</button>
            </div>
        </div>
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Township Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($townships as $township)
                        <tr>
                            <td>{{ $township->id }}</td>
                            <td>{{ $township->township_name }}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-info towhshipUpdateBtn" townshipUpdateId="{{ $township->id }}" data-bs-toggle="modal" data-bs-target="#townshipUpdateModel">Edit</button>
                                <a href="{{ url('townships/delete',$township->id) }}" class="btn btn-sm btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--Add Modal -->
    <div class="modal fade" id="townshipAddModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ url('townships') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Towhship</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="name">Township Name</label>
                        <input type="text" name="township_name" id="name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>

    <!--Update Modal -->
    <div class="modal fade" id="townshipUpdateModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ url('townships/update') }}" class="modal-content">
                @csrf
                <input type="hidden" id="townshipId" name="id">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Towhship</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="townshipName">Township Name</label>
                        <input type="text" name="township_name" id="townshipName" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('hotelJs')
    <script>
        $(document).ready(function(){
            $('.towhshipUpdateBtn').click(function(){
                $townshipUpdateId=$(this).attr('townshipUpdateId');
                $.ajax({
                    type:'get',
                    url:'{{ url('ajax/townships') }}',
                    dataType:'json',
                    data:{
                        'id':$townshipUpdateId,
                    },
                    success:function(res){
                        $('#townshipId').val(res['id']);
                        $('#townshipName').val(res['township_name']);
                    },
                    error:function(jqXHR, textStatus, errorThrown){
                        console.error("Error:", errorThrown);
                    }
                });
            });
        });
    </script>
@endsection
