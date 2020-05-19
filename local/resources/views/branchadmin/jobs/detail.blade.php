@extends('employer_master')
@section('heading')
Detail of {{$datas['job_title']}} 
           
@stop
@section('breadcrubm')
 <li><a href="{{ url('/employer') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/employer/jobs') }}">Jobs</a></li>
            <li class="active">Detail of {{$datas['job_title']}}</li>
@stop
@section('content')
<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
 <div class="row">
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
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Detail of {{$datas['job_title']}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" id="testform" method="POST" action="{{ url('/employer/jobs/detail/update') }}">
                       
                        <input type="hidden" name="jobs_id" value="{{$datas['jobs_id']}}">
                        {!! csrf_field() !!}
                        <div class="row">
                         <div class="col-md-12">
                            <div class="form-group {{$errors->has('status') ? ' has-error' : ''}}">
                                <label class="label-control required col-md-2">Job Status</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="status">
                                        @foreach($datas['process_status'] as $status)
                                        @if($datas['status'] == $status->id)
                                        <option selected="selected" value="{{$status->id}}">{{$status->title}}</option>
                                        @else
                                        <option value="{{$status->id}}">{{$status->title}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="details">
                    <?php $detail_rows = 0; ?>
                         @if(is_array(old('details')) > 0)
                                @if(count(old('details')) > 0)
                            

                            @foreach(old('details') as $key => $old)
                            <div class="row" id="detail_row_{{$detail_rows}}">
                                <div class="col-md-12 row-detail" >
                                     <button type="button" onclick="$('#detail_row_{{$detail_rows}}').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger" style="position: absolute;top: 2px; right: 2px; z-index: 9;"><i class="fa fa-minus-circle"></i></button>
                                    <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group {{ $errors->has('details.'.$key.'.title') ? ' has-error' : '' }}">
                                        <label class="label-control required col-md-12 text-center">Detail Of</label>
                                        <div class="col-md-12">
                                        <select class="form-control" name="details[{{$detail_rows}}][title]">
                                            @foreach($datas['title'] as $title)
                                            @if($old['title'] == $title['value'])
                                            <option selected="selected" value="{{$title['value']}}">{{$title['title']}}</option>
                                            @else
                                            <option value="{{$title['value']}}">{{$title['title']}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                     @if ($errors->has('details.'.$key.'.title'))
                                                    <span class="help-block">
                                                        {{ $errors->first('details.'.$key.'.title') }}
                                                    </span>
                                                @endif
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group {{ $errors->has('details.'.$key.'.detail_date') ? ' has-error' : '' }}">
                                        <label class="label-control required col-md-12 text-center">Event Date</label>
                                        <div class="col-md-12">
                                             <input type="text" name="details[{{$detail_rows}}][detail_date]" class="form-control date" value="{{$old['detail_date']}}">
                                    @if ($errors->has('details.'.$key.'.detail_date'))
                                                    <span class="help-block">
                                                        {{ $errors->first('details.'.$key.'.detail_date') }}
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group {{ $errors->has('details.'.$key.'.description') ? ' has-error' : '' }}">
                                        <label class="label-control required col-md-12 text-center">Description</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="details[{{$detail_rows}}][description]">{{$old['description']}}</textarea>
                                    @if ($errors->has('details.'.$key.'.description'))
                                                    <span class="help-block">
                                                        {{ $errors->first('details.'.$key.'.description') }}
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group {{ $errors->has('details.'.$key.'.success_message') ? ' has-error' : '' }}">
                                        <label class="label-control col-md-12 text-center">Success Message</label>
                                        <div class="col-md-12">
                                             <textarea class="form-control" name="details[{{$detail_rows}}][success_message]">{{$old['success_message']}}</textarea>
                                    @if ($errors->has('details.'.$key.'.success_message'))
                                                    <span class="help-block">
                                                        {{ $errors->first('details.'.$key.'.success_message') }}
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group {{ $errors->has('details.'.$key.'.error_message') ? ' has-error' : '' }}">
                                        <label class="label-control col-md-12 text-center">Error Message</label>
                                        <div class="col-md-12">
                                             <textarea class="form-control" name="details[{{$detail_rows}}][error_message]">{{$old['error_message']}}</textarea>
                                    @if ($errors->has('details.'.$key.'.error_message'))
                                                    <span class="help-block">
                                                        {{ $errors->first('details.'.$key.'.error_message') }}
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                </div>


                            </div>
                         
                            </div>
                            </div>
                                    
                                    <?php $detail_rows++;?>
                                    @endforeach
                                    @endif
                                    @elseif(count($datas['report']) > 0)
                                    @foreach($datas['report'] as $report)


                                    <div class="row" id="detail_row_{{$detail_rows}}">
                                <div class="col-md-12 row-detail">
                                    <button type="button" onclick="$('#detail_row_{{$detail_rows}}').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger" style="position: absolute;top: 2px; right: 2px; z-index: 9;"><i class="fa fa-minus-circle"></i></button>
                                    <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group ">
                                        <label class="label-control required col-md-12 text-center">Detail Of</label>
                                        <div class="col-md-12">
                                        <select class="form-control" name="details[{{$detail_rows}}][title]">
                                            @foreach($datas['title'] as $title)
                                            @if($report->detail_type == $title['value'])
                                            <option selected="selected" value="{{$title['value']}}">{{$title['title']}}</option>
                                            @else
                                            <option value="{{$title['value']}}">{{$title['title']}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="label-control required col-md-12 text-center">Event Date</label>
                                        <div class="col-md-12">
                                             <input type="text" name="details[{{$detail_rows}}][detail_date]" class="form-control date" value="{{$report->detail_date}}">
                                   
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label class="label-control required col-md-12 text-center">Description</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="details[{{$detail_rows}}][description]">{{$report->description}}</textarea>
                                  
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label class="label-control col-md-12 text-center">Success Message</label>
                                        <div class="col-md-12">
                                             <textarea class="form-control" name="details[{{$detail_rows}}][success_message]">{{$report->success_message}}</textarea>
                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group ">
                                        <label class="label-control col-md-12 text-center">Error Message</label>
                                        <div class="col-md-12">
                                             <textarea class="form-control" name="details[{{$detail_rows}}][error_message]">{{$report->error_message}}</textarea>
                                    
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                          
                            </div>
                            </div>




                                   
                                    <?php $detail_rows++;?>
                                    @endforeach
                                    @else
                                    <div class="row" id="detail_row_{{$detail_rows}}">
                                <div class="col-md-12 row-detail">
                                    <button type="button" onclick="$('#detail_row_{{$detail_rows}}').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger" style="position: absolute;top: 2px; right: 2px; z-index: 9;"><i class="fa fa-minus-circle"></i></button>
                                    <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group ">
                                        <label class="label-control required col-md-12 text-center">Detail Of</label>
                                        <div class="col-md-12">
                                        <select class="form-control" name="details[{{$detail_rows}}][title]">
                                            @foreach($datas['title'] as $title)
                                           
                                            <option value="{{$title['value']}}">{{$title['title']}}</option>
                                            
                                            @endforeach
                                        </select>
                                    
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="label-control required col-md-12 text-center">Event Date</label>
                                        <div class="col-md-12">
                                             <input type="text" name="details[{{$detail_rows}}][detail_date]" class="form-control date" value="">
                                   
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label class="label-control required col-md-12 text-center">Description</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="details[{{$detail_rows}}][description]"></textarea>
                                  
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label class="label-control col-md-12 text-center">Success Message</label>
                                        <div class="col-md-12">
                                             <textarea class="form-control" name="details[{{$detail_rows}}][success_message]">You are selected for ..........</textarea>
                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group ">
                                        <label class="label-control col-md-12 text-center">Error Message</label>
                                        <div class="col-md-8">
                                             <textarea class="form-control" name="details[{{$detail_rows}}][error_message]">Your are not selected for .....</textarea>
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            </div>
                            </div>
                                    @endif
                                </div>
                               <div class="row">
                                <div class="col-md-12">
                                            <button type="button" onclick="addDetail();" data-toggle="tooltip" title="Add More Detail" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i>Add More Detail</button>
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
</div>
<script type="text/javascript">
$(function() {
  
  $('.date').datepicker();
  
});

    var detail_rows = '{{$detail_rows + 1}}';
    function addDetail()
    {
        var html = '<div class="row" id="detail_row_'+detail_rows+'"><div class="col-md-12 row-detail"> <button type="button" onclick="$(\'#detail_row_'+detail_rows+'\').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger" style="position: absolute;top: 2px; right: 2px; z-index: 9;"><i class="fa fa-minus-circle"></i></button><div class="row">';
            html += '<div class="col-md-2"> <div class="form-group "><label class="label-control required col-md-12 text-center">Detail Of</label><div class="col-md-12"><select class="form-control" name="details['+detail_rows+'][title]"> @foreach($datas["title"] as $title)<option value="{{$title["value"]}}">{{$title["title"]}}</option> @endforeach </select></div></div></div>';
            html += '<div class="col-md-2"><div class="form-group"><label class="label-control required col-md-12 text-center">Event Date</label><div class="col-md-12"> <input type="text" name="details['+detail_rows+'][detail_date]" class="form-control date" value=""> </div> </div> </div>';
            html += '<div class="col-md-3"><div class="form-group "><label class="label-control required col-md-12 text-center">Description</label><div class="col-md-12"> <textarea class="form-control" name="details['+detail_rows+'][description]"></textarea> </div></div> </div>';
            html += '<div class="col-md-3"><div class="form-group "><label class="label-control col-md-12 text-center">Success Message</label><div class="col-md-12"><textarea class="form-control" name="details['+detail_rows+'][success_message]">You are selected for ..........</textarea></div></div></div> ';
            html += '<div class="col-md-2"><div class="form-group "><label class="label-control col-md-12 text-center">Error Message</label><div class="col-md-12"><textarea class="form-control" name="details['+detail_rows+'][error_message]">Your are not selected for .....</textarea></div> </div></div></div> </div>';
            
      
        $('#details').append(html);
        detail_rows++;

        $('.date').datepicker();
    }
</script>
@endsection