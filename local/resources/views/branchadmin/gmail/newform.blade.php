@extends('branchadmin_master')
@section('heading')
New Job Level 
            <small>Detail of New Job Level</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/branchadmin/job_level') }}">Job Levels</a></li>
            <li class="active">Compose Mail</li>
@stop
@section('content')
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Compose Mail</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="{{ route('branchadmin.gmail.store') }}">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-10">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                         </div>
                            <div class="col-md-10">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-10">
                                <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label">Subject</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="subject" value="{{ old('subject') }}">

                                        @if ($errors->has('subject'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('subject') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-10">
                                <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label">Message</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="message"  cols="30" rows="8"></textarea>

                                        @if ($errors->has('message'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('message') }}</strong>
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