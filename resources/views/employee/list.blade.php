@extends('layouts.app')
@section('content')
<div class="container">
  @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
  @endif
  <div class="row">
      <div class="col-md-12 text-right">
          <a href="{{route('employee.create')}}">Create Employee</a>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12">
        <table class="table table-striped">
            <thead>
              <tr>
                  <th>Company</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Email</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($Employee as $employee)
               <tr>
                  <td>
                    @if(!empty($employee->company))
                      {{$employee->company->name}}
                    @else
                    <span class="text-muted"><b>DELETED</b></span>
                    @endif

                  </td>
                  <td>{{$employee->first_name}}</td>
                  <td>{{$employee->last_name}}</td>
                  <td>{{$employee->email}}</td>
                  <td>{{$employee->phone}}</td>
                  <td>
                    <a href="{{route('employee.edit',array('id'=>rtrim(base64_encode($employee->id),'==')))}}"><i class="fa fa-edit">Edit</i></a>
                    <b>| </b>
                    <a href="{{route('employee.delete',array('id'=>rtrim(base64_encode($employee->id),'==')))}}"><i class="fa fa-trash">Delete</i></a>
                  </td>
               </tr>
               @endforeach
            </tbody>
        </table>
        {{ $Employee->links() }}
      </div>
  </div>
</div>
@stop
