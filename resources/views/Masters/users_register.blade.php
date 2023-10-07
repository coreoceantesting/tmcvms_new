@extends('layouts.master')

<style>
    .card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 0.75rem!important;
}
ul {
    list-style: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
}
</style>
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-12 mb-4">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header text-white bg-primary align-items-center d-flex" style="justify-content: space-between;"><strong>Users List</strong> <a href="{{route('add.users')}}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="Name"><strong>Name</strong></label>
                            <input type="text" style="border: solid 1px" class="form-control" placeholder="Name" name="name" id="name" value="{{ request('name') }}">
                          </div>

                            <div class="form-group col-md-6">
                                <label for="role"><strong>Role</strong></label>
                                <select class="form-control" id="role" name="role">
                                    <option value="">Select user type</option>
                                    <option value="hod" {{ request('role') === 'hod' ? 'selected' : '' }}>HOD</option>
                                    <option value="staff" {{ request('role') === 'staff' ? 'selected' : '' }}>Staff</option>
                                    <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary"><i class="fa fa-filter" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @if(count($user_list) > 0)
                @foreach($user_list as $data)
                <tbody>
                    <tr>
                        <th>{{$data->id}}</th>
                        <td>{{$data->name}}</td>
                        <td>{{$data->role}}</td>
                        <td><a href="{{ route('edit.users', $data->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmationModal{{ $data->id }}">
                            <i class="fas fa-trash"></i>
                        </button></td>
                    </tr>
                </tbody>
                <!-- Modal -->
                <div class="modal fade" id="confirmationModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel{{ $data->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmationModalLabel{{ $data->id }}">Confirm Deletion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to mark this User as deleted?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <form method="POST" action="{{ route('delete.users', $data->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p>No Record Found</p>
            @endif
        </table>
    </div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
