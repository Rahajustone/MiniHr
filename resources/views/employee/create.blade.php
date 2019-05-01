@extends('shared.app')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('body')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="d-flex">
                    <i class="mdi mdi-account-multiple text-muted hover-cursor"></i>
                    <a class="text-muted  hover-cursor" href="{{ route('employee.index') }}">&nbsp;Employee&nbsp;/&nbsp;</a>
                    <p class="text-primary hover-cursor">Create Employee</p>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{ url()->previous() }}">
                    <button class="btn btn-light bg-dark btn-icon mr-3 mt-2 mt-xl-0 font-weight-medium auth-form-btn">
                        <i class="mdi mdi-backup-restore text-white"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @if ($errors->any())
        <div class="col-md-12 grid-margin alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Employee</h4>
                <form class="forms-sample" action="{{ route('employee.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">First Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="First Name" name="name" required value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputLastName1">Last Name</label>
                        <input type="text" class="form-control" id="exampleInputLastName1" placeholder="Last Name" name="surname" required value="{{ old('surname') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Birthday</label>
                        <input type="date" class="form-control" id="exampleInputName1"  name="birthday" required value="{{ old('birthday') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Salary</label>
                        <input type="number" step="any" class="form-control" id="exampleInputName1" placeholder="Salary" name="salary" required value="{{ old('salary') }}">
                    </div>
                    <div class="form-group">
                        <label>Department</label>
                        <div class="">
                            <select class="form-control" name="department_id">
                                @if(count($departments)>0)
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}"> {{  $department->name }}</option>
                                    @endforeach
                                @else
                                <option disabled selected>Please Add a Department</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <div class="">
                            <select class="form-control js-example-basic-multiple" name="positions[]" multiple="multiple">
                                @if(count($positions)>0)
                                    @foreach($positions as $position)
                                        <option value="{{ $position->id }}"> {{  $position->name }}</option>
                                    @endforeach
                                @else
                                <option disabled selected>Please Add a Position</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div class="">
                            <select class="form-control" name="status">
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Experience">Experience</label>
                        <textarea class="form-control" id="Experience" rows="4" name="experience" required>{{ old('experience') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
@endsection