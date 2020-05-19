@extends('branchadmin_master')
@section('heading')
Documents of {{$emp->firstname.' '.$emp->middlename.' '.$emp->lastname}}
           
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/branchadmin/jobs') }}">Jobs</a></li>
            <li class="active"></li>
@stop
@section('content')
<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
 <div class="row">
     
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Detail of </div>
                <div class="panel-body">
                    @if(count($documents) > 0)
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-md-12">
                            <h4>Client Document</h4>
                        </div>
                    </div>
                    @foreach($documents as $doc)
                    <div class="row" id="document_{{$doc->id}}" style="margin-bottom: 15px; padding: 5px; border-bottom: 1px solid #cccccc;">
                        <div class="col-md-10">
                            {{$doc->title}}
                        </div>
                        <div class="col-md-2">
                            <button type="button" onclick="deleteFile('{{$doc->id}}')" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" id="testform" method="POST" action="{{ url('/branchadmin/jobs/file_upload/save') }}">
                       
                        <input type="hidden" name="applicant_id" value="{{$id}}">
                         <input type="hidden" name="job_id" value="{{$job_id}}">
                        {!! csrf_field() !!}
                        <div class="row">
                        <div class="col-md-12" id="file_field">
                        <?php $file_row = 0; ?>

                                @if(is_array(old('emp_file')) > 0)
                                @if(count(old('emp_file')) > 0)
                            

                            @foreach(old('emp_file') as $key => $old)
                        <div id="row_{{$file_row}}" class="row">
                         <div class="col-md-5">
                            <div class="form-group {{ $errors->has('emp_file.'.$key.'.title') ? ' has-error' : '' }}">
                                <label class="label-control required col-md-4">Document Title</label>
                                <div class="col-md-8">
                                    <input type="text" name="emp_file[{{$key}}][title]" class="form-control">
                                    @if ($errors->has('emp_file.'.$key.'.title'))
                                                    <span class="help-block">
                                                        {{ $errors->first('emp_file.'.$key.'.title') }}
                                                    </span>
                                                @endif
                                </div>
                            </div>
                        </div>
                            
                            <div class="col-md-5">
                            <div class="form-group {{ $errors->has('emp_file.'.$key.'.file') ? ' has-error' : '' }}">
                                <label class="label-control required col-md-4">Document</label>
                                <div class="col-md-8">
                                    <input type="file" name="emp_file[{{$key}}][file]" class="form-control">
                                    @if ($errors->has('emp_file.'.$key.'.file'))
                                                    <span class="help-block">
                                                        {{ $errors->first('emp_file.'.$key.'.file') }}
                                                    </span>
                                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                         <button type="button" onclick="$('#row_{{$file_row}}').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
                        </div>
                    </div>
                    <?php $file_row++;?>
                               @endforeach
                               @endif
                               @else
                               <div id="row_{{$file_row}}" class="row">
                                 <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="label-control required col-md-4">File Title</label>
                                        <div class="col-md-8">
                                            <input type="text" name="emp_file[{{$file_row}}][title]" class="form-control">
                                           
                                        </div>
                                    </div>
                                </div>
                                    
                                    <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="label-control required col-md-4">File Title</label>
                                        <div class="col-md-8">
                                            <input type="file" name="emp_file[{{$file_row}}][file]" class="form-control">
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                 <button type="button" onclick="$('#row_{{$file_row}}').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
                                </div>
                            </div>
                               @endif
                               </div>
                               </div>
                       <div class="row">
                        <div class="col-md-12"> 
                            <button type="button" onclick="addFiles();" data-toggle="tooltip" title="Add More Files" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i>Add More Files</button>


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
   var row_file =  '{{$file_row + 1}}';
   function addFiles()
   {
    html = '<div id="row_'+row_file+'" class="row"><div class="col-md-5"><div class="form-group"><label class="label-control required col-md-4">File Title</label><div class="col-md-8"><input type="text" name="emp_file['+row_file+'][title]" class="form-control"> </div></div></div>';
                                    
    html += '<div class="col-md-5"><div class="form-group"><label class="label-control required col-md-4">File Title</label><div class="col-md-8"><input type="file" name="emp_file['+row_file+'][file]" class="form-control"></div></div></div>';
    html += '<div class="col-md-2"> <button type="button" onclick="$(\'#row_'+row_file+'\').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></div></div>';
    $('#file_field').append(html);
    row_file++;
   }

   function deleteFile(id)
   {
    var token = $('input[name=\'_token\']').val();
    if (id != '') {
        $.ajax({
            type: 'POST',
            url: '{{url("/branchadmin/jobs/documents/delete")}}',
            data: 'id='+id+'&_token='+token,
            cache: false,
            success: function(html){
                if (html == 'Success') {
                    $('#document_'+id).remove();
                } else{
                    alert(html)
                }
                
               
            }
        });
    }
   }
</script>
@endsection