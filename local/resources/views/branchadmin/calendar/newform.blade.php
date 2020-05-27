@extends('branchadmin_master')
@section('heading')
New Job Level 
            <small>Detail of New Job Level</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/branchadmin/job_level') }}">Job Levels</a></li>
            <li class="active">New Job Level</li>
@stop
@section('content')
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">New Calendar Event</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="{{ route('branchadmin.calendar.store') }}">
                        {!! csrf_field() !!}
                        <div class="row">
                         <div class="col-md-10">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label required">Title</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="title" value="{{ old('name') }}">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label required">Description</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="description" value="{{ old('name') }}">
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label required">Start Time</label>
                                    <div class="col-md-6">
                                        <input type="date" id="start_date" name="start_date" class="form-control" value="{{date('Y-m-d')}}" min="value="{{date('Y-m-d')}}"">
                                        @if ($errors->has('start_date'))
                                            <span class="help-block">
                                                        <strong>{{ $errors->first('start_date') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <input type="time"  name="start_time" class="form-control" value="10:00">
                                        @if ($errors->has('start_time'))
                                            <span class="help-block">
                                                        <strong>{{ $errors->first('start_time') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label required">End Time</label>
                                    <div class="col-md-6">
                                        <input type="date" id="end_date" name="end_date" class="form-control" value="{{date('Y-m-d')}}" min="value="{{date('Y-m-d')}}"">
                                        @if ($errors->has('end_date'))
                                            <span class="help-block">
                                                        <strong>{{ $errors->first('end_date') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <input type="time"  name="end_time" class="form-control" value="12:00">
                                        @if ($errors->has('end_time'))
                                            <span class="help-block">
                                                        <strong>{{ $errors->first('end_time') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-fw fa-save"></i>Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection