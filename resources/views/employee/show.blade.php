@extends('shared.app')

@section('body')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="d-flex">
                    <i class="mdi mdi-account-multiple text-muted hover-cursor"></i>
                    <a class="text-primary hover-cursor" href="{{ route('employee.index') }}">&nbsp;&nbsp;Employees</a>
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

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Employee Info</h4>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="">
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Birthday</th>
                                <th>Salary</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-capitalize">
                                <td>{{ $employee->name }} </td>
                                <td>{{ $employee->surname }}</td>
                                <td>{{ date('d-m-Y', strtotime($employee->birthday)) }}</td>
                                <td>{{ $employee->salary }}</td>
                                <td>
                                    @if($employee->department)
                                        {{ $employee->department->name }}
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
                                <td>{{ $employee->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <p>Positions</p>
                    @if($employee->positions)
                        <blockquote class="blockquote blockquote-danger">
                            <ul class="list-arrow">
                                @foreach($employee->positions as $position)
                                    <li>{{ $position->name }}</li>
                                 @endforeach
                            </ul>                            
                        </blockquote>
                    @endif
                </div>
                <div>
                    <p>Experience Info</p>
                    <blockquote class="blockquote blockquote-primary">
                        <p>{{ $employee->experience }}</p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
