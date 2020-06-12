@extends('branchadmin_master')
@section('heading')
Job Level
            <small>List of Job Level</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Job Level</li>
@stop
@section('content')
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
          <a href="{{ route('branchadmin.gmail.index') }}" class="btn btn-primary"><i class="fa fa-list"></i>Back to index</a>
          <a href="{{ route('branchadmin.gmail.create') }}" class="btn btn-primary right"><i class="fa fa-fw fa-plus"></i>Compose</a>

      </div>
     
      <div class="box">
            <div class="box-body">
                @php($from = $data->getFrom())
                <span><?php echo $from['name'];?> ({{$from['email']}})</span>
                <h1>{{$data->getSubject()}}</h1>
                <div>
                    {!! $data->getHtmlBody() !!}
                </div>

          </div><!-- /.box-body -->
      </div>
    </div>
  <div>
  <div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
      </div>
    </div>
  </div>
  
@stop()