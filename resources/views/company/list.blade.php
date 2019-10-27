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
          <a href="{{route('company.create')}}">Create Company</a>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12">
        <table class="table table-striped">
            <thead>
              <tr>
                  <th>Logo</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Website</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($Companies as $companies)
               <tr>
                  <td>
                    @if($companies->logo!='')
                      <img src='{{asset("storage/".$companies->logo)}}' width="100" height="100">
                    @endif

                  </td>
                  <td>{{$companies->name}}</td>
                  <td>{{$companies->email}}</td>
                  <td>{{$companies->website}}</td>
                  <td>
                    <a href="{{route('company.edit',array('id'=>rtrim(base64_encode($companies->id),'==')))}}"><i class="fa fa-edit">Edit</i></a>
                    <b>| </b>
                    <a href="{{route('company.delete',array('id'=>rtrim(base64_encode($companies->id),'==')))}}"><i class="fa fa-trash">Delete</i></a>
                  </td>
               </tr>
               @endforeach
            </tbody>
        </table>
        {{ $Companies->links() }}
      </div>
  </div>
</div>
@stop
