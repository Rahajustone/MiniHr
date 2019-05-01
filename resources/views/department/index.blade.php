@extends('shared.app')

@section('body')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-primary hover-cursor">&nbsp;&nbsp;Department</p>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{ route('department.create') }}">
                    <button class="btn btn-warning btn-lg  btn-icon mr-3 mt-2 mt-xl-0 font-weight-medium auth-form-btn text-white">
                        <i class="mdi mdi-plus text-white"></i>
                        Add
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Department Info</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Department Id</th>
                                <th>Department Name</th>
                                <th>Employees</th>
                                <th>Department Info</th>
                                <th>Created At</th>
                                <th><i class="mdi mdi-table-edit"></i>Edit</th>
                                <th><i class="mdi mdi-delete"></i> Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{ $department->id }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ count($department->employees) }}</td>
                                    <td>{{ $department->description }}</td>
                                    <td> {{ date('d-m-Y', strtotime($department->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('department.edit', ['id' => $department->id]) }}" class="btn btn-success btn-sm">
                                            <i class="mdi mdi-table-edit"></i>
                                            Edit 
                                        </a>
                                    </td>
                                    <td>
                                        {{ Form::open([ 'method'  => 'delete', 'route' => [ 'department.destroy', $department->id ] ]) }}
                                            <button class="btn btn-sm btn-danger">
                                                <i class="mdi mdi-delete-forever"></i>
                                                Delete
                                            </button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection