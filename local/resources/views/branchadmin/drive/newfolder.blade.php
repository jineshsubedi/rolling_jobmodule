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
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="{{ route('branchadmin.drive.storefolder') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="parent_folder" value="{{$folder_id}}">
                        <div class="row">
                         <div class="col-md-10">
                            <div class="form-group{{ $errors->has('folder_name') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label required">Folder Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="folder_name" value="{{ old('folder_name') }}">
                                    @if ($errors->has('folder_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('folder_name') }}</strong>
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