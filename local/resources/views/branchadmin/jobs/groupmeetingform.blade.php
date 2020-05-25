@extends('branchadmin_master')
@section('heading')
    Selected Application for Final Selection
    <small>Calling for Group Zoom meeting</small>
@stop
@section('breadcrubm')
    <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Selected Application for Zoom meeting</li>
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="panel panel-default">
                    <div class="panel-heading">Callig Zoom meetig</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" id="testform" method="POST" action="{{ url('/branchadmin/jobs/application/callGroupMeeting') }}">
                            {!! csrf_field() !!}
                            @foreach($datas['employee_id'] as $employee_id)
                                <input type="hidden"  name="id[]" value="{{ $employee_id}}">
                            @endforeach
                            <input type="hidden"  name="job_id" value="{{ $datas['job_id']}}">
                            <input type="hidden"  name="tab_id" value="{{ $datas['tab_id']}}">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group{{ $errors->has('topic') ? ' has-error' : '' }}">
                                        <label class="col-md-2 control-label required">Topic</label>

                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="topic" value="{{ old('topic') }}">

                                            @if ($errors->has('topic'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('topic') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="col-md-2 control-label required">Password</label>

                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="password" placeholder="maximum 10 character" value="{{ old('password') }}">

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                        <label class="col-md-2 control-label required">Start Time</label>
                                        <div class="col-md-6">
                                            <input type="date" id="start_date" name="start_date" class="form-control" value="{{date('Y-m-d')}}" min="value="{{date('Y-m-d')}}"">
                                            @if ($errors->has('deadline'))
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
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-fw fa-save"></i>Call meeting
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(function() {
            $('#start_date').datepicker();
        });
    </script>

@endsection