@extends('shared.app')

@section('body')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="d-flex">
                    <i class="mdi mdi-account-multiple text-muted hover-cursor"></i>
                    <p class="text-primary hover-cursor">&nbsp;&nbsp;Employees</p>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{ route('employee.create') }}">
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
                <h4 class="card-title">Employee Info</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="">
                                <th>Full Name</th>
                                <th>Department Name</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th>Details</th>
                                <th><i class="mdi mdi-table-edit"></i>Edit</th>
                                <th><i class="mdi mdi-delete"></i> Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr class="text-capitalize">
                                    <td>{{ $employee->name }} {{ $employee->surname }}</td>
                                    <td>
                                        @if($employee->department)
                                            {{ $employee->department->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($employee->positions)
                                            @foreach($employee->positions as $position)
                                                <label class="badge badge-outline-dark">{{ $position->name }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if($employee->status == 1)
                                            <button class="btn btn-light">
                                                Enabled
                                            </button>
                                        @else
                                            <button class="btn btn-light">
                                                Disabled
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('employee.show', ['id' => $employee->id]) }}" class="btn btn-warning text-white">
                                            Details
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('employee.edit', ['id' => $employee->id]) }}" class="btn btn-success btn-sm">
                                            <i class="mdi mdi-table-edit"></i> 
                                        </a>
                                    </td>
                                    <td>
                                        {{ Form::open([ 'method'  => 'delete', 'route' => [ 'employee.destroy', $employee->id ] ]) }}
                                            <button class="btn btn-sm btn-danger">
                                                <i class="mdi mdi-delete-forever"></i>
                                            </button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach        
                        </tbody>
                    </table>
                    <hr>
                    <div class="d-flex justify-content-end align-items-end flex-wrap">
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection