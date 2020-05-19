@extends('branchadmin_master')
@section('heading')
Job location's Detail 
            <small>Detail of Job location</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/branchadmin/joblocation') }}">Job Locations</a></li>
            <li class="active">Edit Job location</li>
@stop
@section('content')
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Job location's Detail</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="{{ route('branchadmin.job_location.update', $data->id) }}">
                        <input type="hidden" name="id" value="<?php echo $data->id;?>" />
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
                        <div class="row">
                         <div class="col-md-10">
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Name</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" value="{{ $data->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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