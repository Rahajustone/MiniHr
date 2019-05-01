@extends('shared.app')

@section('body')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <a class="text-muted  hover-cursor" href="{{ route('position.index') }}">&nbsp;&nbsp;Position&nbsp;/&nbsp;</a>
                    <p class="text-primary hover-cursor">Update Position</p>
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
                <h4 class="card-title">Add Position</h4>
                <form class="forms-sample" action="{{ route('position.update', [ 'id' => $position->id ] )}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Position Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Position Name" name="name" value="{{ $position->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea class="form-control" id="Description" rows="4" name="description" required>{{ $position->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-info mr-2">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection