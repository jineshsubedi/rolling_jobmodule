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
        <div class="row">
            <a href="https://www.dropbox.com/developers/reference/getting-started?_tk=guides_lp&_ad=guides2&_camp=get_started" target="_blank" class="btn btn-primary right"><i class="fa fa-file"></i>  How to setup Drive API</a>
        </div>
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Enter API details
                    <a href="https://www.dropbox.com/developers/documentation/http/overview" target="_blank" class="btn btn-primary">Dropbox API console</a>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="{{ route('dropbox.api.store') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="staff_id" value="{{auth()->guard('staffs')->user()->id}}">
                        <div class="row">
                            {{dd($errors->has('document'))}}
                            <div class="col-md-10">
                                <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label required">Document</label>
                                    <div class="col-md-10">
                                        <input type="file" class="form-control" name="document" value="{{ old('name') }}">
                                        @if ($errors->has('document'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('document') }}</strong>
                                        </span>
                                        @endif
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