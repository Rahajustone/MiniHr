@extends('shared.app')

@section('body')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-primary hover-cursor">&nbsp;&nbsp;Position</p>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{ route('position.create') }}">
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
                <h4 class="card-title">Position Info</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Position Id</th>
                                <th>Position Name</th>
                                <th>Position Info</th>
                                <th>Created At</th>
                                <th><i class="mdi mdi-table-edit"></i>Edit</th>
                                <th><i class="mdi mdi-delete"></i> Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($positions as $position)   
                                <tr>
                                    <td>{{ $position->id }}</td>
                                    <td>{{ $position->name }}</td>
                                    <td>{{ $position->description }}</td>
                                    <td> {{ date('d-m-Y', strtotime($position->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('position.edit', ['id' => $position->id]) }}" class="btn btn-success btn-sm">
                                            <i class="mdi mdi-table-edit"></i>
                                            Edit 
                                        </a>
                                    </td>
                                    <td>
                                        {{ Form::open([ 'method'  => 'delete', 'route' => [ 'position.destroy', $position->id ] ]) }}
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
                    <hr>
                    <div class="d-flex justify-content-end align-items-end flex-wrap">
                        {{ $positions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection