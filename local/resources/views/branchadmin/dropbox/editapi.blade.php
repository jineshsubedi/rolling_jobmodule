@extends('branchadmin_master')
@section('heading')
New Job Level 
            <small>Detail of New Job Level</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Dropbox API</li>
@stop
@section('content')
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Enter API details</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="{{ route('dropbox.api.update') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="staff_id" value="{{auth()->guard('staffs')->user()->id}}">
                        <div class="row">
                         <div class="col-md-10">
                            <div class="form-group{{ $errors->has('access_token') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label required">Access Token</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="access_token" value="{{ $data->access_token }}">
                                    @if ($errors->has('access_token'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('access_token') }}</strong>
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