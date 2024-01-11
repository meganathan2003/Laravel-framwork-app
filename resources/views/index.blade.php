<!-- Below the code just for we have to write the directive like import -->
@extends('layouts.app')
@section('rowContent')
@if(session()->has('message'))
<!-- We can access using session method -->
<div class="alert alert-sucess">
    {{session()->get('message')}} 
</div>
@endif
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <strong>Employee List</strong>
                <!--    Below the routing for blade engine should understand that this route is a function so we use some braces     -->
                <a href="{{route('employee.create')}}" class="btn btn-primary btn-xs float-end py-0">Create Employee</a> 
                <table class="table table-responsive table-bordered table-stripped" style="margin-top:10px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joining Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $key => $employee)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->joining_date}}</td>
                            <td><span type="button" class="btn btn-success btn-xs py-0">{{$employee->is_active == 1?'Active':''}}</span></td>
                            <td>
                                <a href="{{route('employee.show',$employee->id)}}" class="btn btn-primary btn-xs py-0">Show</a>
                                <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-warning btn-xs py-0">Edit</a>
                                <form action="" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-xs py-0">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Below the links method for show the paginate links this is default provide by paginate class and bootstap -->
                {{$employees->links()}}
            </div>
        </div>
    </div>
</div>
@endsection