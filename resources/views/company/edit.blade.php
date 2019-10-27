@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-12 text-right">
          <a href="{{route('company.list')}}">All Companies</a>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12">
          <form action="{{route('company.update')}}" method="post" enctype="multipart/form-data">
             @csrf
             <input type="hidden" name="txtHiddenCompanyId" id="txtHiddenCompanyId" value="{{rtrim(base64_encode($company->id),'==')}}">
             <div class="form-group">
                <label for="exampleInputEmail1">Company Name</label>
                <input type="text" value="{{$company->name}}" class="form-control" id="txtCompanyName" name="txtCompanyName" aria-describedby="companyNameHelp" placeholder="enter name of company">
                <small id="companyNameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                @if($errors->has('txtCompanyName'))
                  <span class="text-danger">{{$errors->first('txtCompanyName')}}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Company Email</label>
                <input type="email" value="{{$company->email}}" class="form-control" id="txtComapanyEmail" name="txtComapanyEmail" placeholder="Email">
                @if($errors->has('txtComapanyEmail'))
                  <span class="text-danger">{{$errors->first('txtComapanyEmail')}}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Company Website</label>
                <input type="text" value="{{$company->website}}" class="form-control" id="txtComapanyWebsite" name="txtComapanyWebsite" placeholder="Website">
                @if($errors->has('txtComapanyWebsite'))
                  <span class="text-danger">{{$errors->first('txtComapanyWebsite')}}</span>
                @endif
              </div>
              <div class="form-group">
                 <label for="fileCompanyLogo">Company Logo</label>
                 <input type="file"  class="form-control-file" id="fileCompanyLogo" name="fileCompanyLogo">
                 @if($errors->has('fileCompanyLogo'))
                   <span class="text-danger">{{$errors->first('fileCompanyLogo')}}</span>
                 @endif
               </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
  </div>
</div>
@stop
