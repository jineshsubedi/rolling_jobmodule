@extends('branchadmin_master')
@section('heading')
New Job Level 
            <small>Detail of New Job Level</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Google API</li>
@stop
@section('content')
 <div class="row">
    <div class="col-xs-12">
        <div class="row">
            <a href="https://developers.google.com/gmail/api/auth/web-server" target="_blank" class="btn btn-primary right"><i class="fa fa-file"></i>  How to setup Drive API</a>
        </div>
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Enter API details
                    <a href="https://console.developers.google.com/" target="_blank" class="btn btn-primary">Google API console</a>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="{{ route('gmail.api.store') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="staff_id" value="{{auth()->guard('staffs')->user()->id}}">
                        <div class="row">
                         <div class="col-md-10">
                            <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label required">Project ID</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="project_id" value="{{ old('project_id') }}">
                                    @if ($errors->has('project_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('project_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                         <div class="col-md-10">
                            <div class="form-group{{ $errors->has('client_id') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label required">Client ID</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="client_id" value="{{ old('client_id') }}">
                                    @if ($errors->has('client_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('client_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        </div>
                         <div class="row">
                         <div class="col-md-10">
                            <div class="form-group{{ $errors->has('client_secret') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label required">Client Secret</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="client_secret" value="{{ old('client_secret') }}">
                                    @if ($errors->has('client_secret'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('client_secret') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        </div>
                         <div class="row">
                         <div class="col-md-10">
                            <div class="form-group{{ $errors->has('redirect_url') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label required">Redirect URL</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="redirect_url" value="{{ old('redirect_url') }}">
                                    @if ($errors->has('redirect_url'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('redirect_url') }}</strong>
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