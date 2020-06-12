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
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Enter API details</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="{{ route('googledrive.api.update') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="staff_id" value="{{auth()->guard('staffs')->user()->id}}">
                        <div class="row">
                         <div class="col-md-10">
                            <div class="form-group{{ $errors->has('client_id') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label required">Client ID</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="client_id" value="{{ $data->client_id }}">
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
                                    <input type="text" class="form-control" name="client_secret" value="{{ $data->client_secret }}">
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
                            <div class="form-group{{ $errors->has('refresh_token') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label required">Refresh Token</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="refresh_token" value="{{ $data->refresh_token }}">
                                    @if ($errors->has('refresh_token'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('refresh_token') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                         <div class="col-md-10">
                            <div class="form-group{{ $errors->has('drive_folder_id') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label required">Drive Folder ID</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="drive_folder_id" value="{{ $data->drive_folder_id }}">
                                    @if ($errors->has('drive_folder_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('drive_folder_id') }}</strong>
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