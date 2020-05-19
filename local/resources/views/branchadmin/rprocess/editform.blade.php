@extends('branchadmin_master')
@section('heading')
Recruitment Process Detail 
            <small>Detail of Currency</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/branchadmin/recruitment_process') }}">Recruitment Process</a></li>
            <li class="active">Edit Recruitment Process</li>
@stop
@section('content')
<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Recruitment Process Detail</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="{{ route('branchadmin.recruitment_process.update', $data->id) }}">
                        <input type="hidden" name="id" value="<?php echo $data->id;?>" />
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
                        <div class="row">
                        <div class="col-md-10">
                         <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Title</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="title" value="{{ $data->title }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">Description</label>

                            <div class="col-md-10">
                                <textarea class="form-control" name="description" id="description">{{ $data->description }}</textarea>
                                
                                 <script>
      
       
                                    CKEDITOR.replace('description',
                                    {
                                        filebrowserBrowseUrl : '{{ url("assets/ckfinder/ckfinder.html")}}',
                                        filebrowserImageBrowseUrl : '{{ url("assets/ckfinder/ckfinder.html?type=Images")}}',
                                        filebrowserFlashBrowseUrl : '{{ url("assets/ckfinder/ckfinder.html?type=Flash")}}',
                                        filebrowserUploadUrl : '{{ url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")}}',
                                        filebrowserImageUploadUrl : '{{ url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")}}',
                                        filebrowserFlashUploadUrl : '{{ url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")}}',
                                        enterMode: CKEDITOR.ENTER_BR
                                    });
                                   
                                    
                                 
                                </script>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
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