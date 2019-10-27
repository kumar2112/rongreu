@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-12 text-right">
          <a href="{{route('employee.list')}}">All Employees</a>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12">
          <form action="{{route('employee.update')}}" method="post" >
             @csrf
             <input type="hidden" name="txtHiddenEmployeeId" id="txtHiddenEmployeeId" value="{{rtrim(base64_encode($employee->id),'==')}}">
             <div class="form-group">
                <label for="exampleInputEmail1">Employe First Name</label>
                <input value="{{$employee->first_name}}" type="text" class="form-control" id="txtEmployeeFirstName" name="txtEmployeeFirstName" aria-describedby="EmployeeNameHelp" placeholder="First Name">
                <small id="EmployeeNameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                @if($errors->has('txtEmployeeFirstName'))
                  <span class="text-danger">{{$errors->first('txtEmployeeFirstName')}}</span>
                @endif
              </div>
              <div class="form-group">
                 <label for="txtEmployeeLastName">Employe Last Name</label>
                 <input value="{{$employee->last_name}}" type="text" class="form-control" id="txtEmployeeLastName" name="txtEmployeeLastName" aria-describedby="EmployeeNameHelp" placeholder="Last Name">
                 <small id="EmployeeNameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                 @if($errors->has('txtEmployeeLastName'))
                   <span class="text-danger">{{$errors->first('txtEmployeeLastName')}}</span>
                 @endif
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Employee Email</label>
                <input value="{{$employee->email}}" type="email" class="form-control" id="txtEmployeeEmail" name="txtEmployeeEmail" placeholder="Email">
                @if($errors->has('txtEmployeeEmail'))
                  <span class="text-danger">{{$errors->first('txtEmployeeEmail')}}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Employee Phone</label>
                <input value="{{$employee->phone}}" type="text" class="form-control" id="txtEmployeePhone" name="txtEmployeePhone" placeholder="Phone">
                @if($errors->has('txtEmployeePhone'))
                  <span class="text-danger">{{$errors->first('txtEmployeePhone')}}</span>
                @endif
              </div>
              <div class="form-group">
                 <label for="selEmployeeCompany">Select Employee</label>
                 <select class="form-control" id="selEmployeeCompany" name="selEmployeeCompany">
                   <option value="">Select Company</option>
                   @if(!empty($Companies))
                       @foreach ($Companies as $companies)
                       <option value="{{$companies->id}}"  {{$employee->company_id==$companies->id?"selected":""}}>{{$companies->name}}</option>
                       @endforeach
                   @endif
                 </select>
                 @if($errors->has('selEmployeeCompany'))
                   <span class="text-danger">{{$errors->first('selEmployeeCompany')}}</span>
                 @endif
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
  </div>
</div>
@stop
