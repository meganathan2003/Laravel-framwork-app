<!-- Below the code just for we have to write the directive like import -->
@extends('layouts.app')
@section('rowContent')
<div class="card">
    <div class="card-body">
        <p style="font-size:20px; font-weight:bold;">Employee details</p>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" value="{{$employee->id}}" readonly>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" value="{{$employee->email}}" readonly>
        </div>

        <div class="form-group">
            <label for="joining_date">Joining date</label>
            <input type="date" class="form-control" value="{{$employee->joining_date}}" readonly>
        </div>

        <div class="form-group">
            <label for="salary">Joining salary</label>
            <input type="number" class="form-control" value="{{$employee->salary}}" readonly>
        </div>

        <div class="form-group">
            <label for="is_active">Active</label><br>
            <input type="checkbox" {{$employee->is_active=='1'?'checked':''}} readonly />
        </div>
        <a href="/employees" class="btn btn-primary">Back</a>
    </div>
</div>
@endsection