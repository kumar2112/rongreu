@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div clas="menu">
                       <ul>
                         <li><a href="{{route('company.list')}}">Manage Companies</a></li>
                         <li><a href="{{route('employee.list')}}">Manage Employees</a></li>
                      </ul
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
