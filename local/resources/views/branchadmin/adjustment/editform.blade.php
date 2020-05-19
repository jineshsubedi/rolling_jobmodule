@extends('branchadmin_master')
@section('heading')
 Branch Admin
            <small>Adjustment Request</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/branchadmin/adjustment') }}">Adjustment Requests</a></li>
            <li class="active">Edit Adjustment</li>
@stop
@section('content')
 @if(count($errors))
                <div class="row">
            <div class="col-xs-12">
            <div class="alert alert-danger">
             @foreach($errors->all() as $error)
              {{ '* : '.$error }}</br>
             @endforeach
                </div>
            </div>

          </div>
       @endif
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Adjustment</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="{{ url('/branchadmin/adjustment/update') }}">
                      <input type="hidden" name="id" value="{{$data['req']->id}}">
                        {!! csrf_field() !!}
                        <div class="row">
                         <div class="col-md-10">
                        
                        
                          <div class="form-group{{ $errors->has('login_date') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Login Date</label>

                            <div class="col-md-9">
                            
                           <input type="text" required name="login_date" class="form-control datepicker" value="{{$data['login_date']}}">
                              
                             @if ($errors->has('login_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login_date') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('login_time') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Login Time</label>

                            <div class="col-md-9">
                            
                           <input type="text" required name="login_time" class="form-control timepicker" value="{{$data['login_time']}}">
                              
                             @if ($errors->has('login_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login_time') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('logout_time') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Logout Time</label>

                            <div class="col-md-9">
                            
                           <input type="text" required name="logout_time" class="form-control timepicker" value="{{$data['logout_time']}}">
                              
                             @if ($errors->has('logout_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('logout_time') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('adjustment_reason') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Adjustment Reason</label>

                            <div class="col-md-9">
                            <select class="form-control" name="adjustment_reason">
                              @foreach($data['reasons'] as $reason)
                                @if($reason->id == $data['req']->adjustment_reason)
                                <option selected="selected" value="{{$reason->id}}">{{$reason->title}}</option>
                                @else
                                <option value="{{$reason->id}}">{{$reason->title}}</option>
                                @endif
                              @endforeach
                            </select>
                                                         
                             @if ($errors->has('adjustment_reason'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adjustment_reason') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                        </div>

                            <div class="form-group{{ $errors->has('time_to_be_adjusted') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Time to be Adjusted</label>

                            <div class="col-md-9">
                            
                           <input type="text" required name="time_to_be_adjusted" class="form-control timepicker" value="{{$data['time_to_be_adjusted']}}">
                              
                             @if ($errors->has('time_to_be_adjusted'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('time_to_be_adjusted') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                        </div>


                            <div class="form-group{{ $errors->has('informed_to') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Informed To</label>

                            <div class="col-md-9">
                            
                           <input type="text" required name="informed_to" class="form-control" value="{{$data['req']->informed_personnel}}">
                              
                             @if ($errors->has('informed_to'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('informed_to') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Remarks</label>

                            <div class="col-md-9">
                            
                           <textarea  required name="remarks" class="form-control" >{{$data['req']->remarks}}</textarea>
                              
                             @if ($errors->has('remarks'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('remarks') }}</strong>
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

 <script type="text/javascript">
   $(function () {
    $('.timepicker').timepicker({
      showMeridian: false,
      use24hours: true,
      format: 'HH:mm'

    });
    $('.datepicker').datepicker();
});
 </script>
@endsection