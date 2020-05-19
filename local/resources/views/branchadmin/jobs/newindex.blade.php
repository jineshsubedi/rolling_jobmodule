@extends('branchadmin_master')
@section('heading')
Jobs
            <small>List of Jobs</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Jobs</li>
@stop
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="row">
        <a href="#" class="btn btn-primary right"><i class="fa fa-fw fa-plus"></i>Add New Jobs</a>
      </div>
     
      <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Jobs</h3>
        </div>
        <div class="box-body">
                  

        </div>
      </div>
    </div>
<div>
@stop()