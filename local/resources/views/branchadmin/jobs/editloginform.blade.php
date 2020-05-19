@extends('admin_master')
@section('heading')
Edit Job 
            <small>Detail of Edit Job</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/admin/jobs') }}">Jobs</a></li>
            <li class="active">Edit Job</li>
@stop
@section('content')
<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Job</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="{{ url('/admin/jobs/update') }}">
                        {!! csrf_field() !!}
                        <div class="row">
                         <div class="col-md-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab-general" data-toggle="tab">General Information</a></li>
                                <li><a href="#tab-data" data-toggle="tab">Requirements</a></li>
                                <li><a href="#tab-head" data-toggle="tab">Form</a></li>
                                
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-general">

                                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label required">Job Title</label>

                            <div class="col-md-10">
                                <input type="text" id="title" class="form-control" name="title" value="{{ $data['jobs']->title }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('seo_url') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label required">Job Seo Url</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="seo_url" name="seo_url" value="{{ old('seo_url') }}">

                                @if ($errors->has('seo_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seo_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('job_category') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label required">Category by Function</label>
                            <div class="col-md-10">
                                <select name="job_category" id="job_category" class="form-control select2" >
                                    <?php foreach($datas['job_category'] as $job_category){ 
                                        if(old('job_category') == $job_category->id) {
                                        ?>
                                        <option selected="selected" value="{{ $job_category->id }}">{{ $job_category->name }} </option>
                                    <?php } else { ?>
                                            <option value="{{ $job_category->id }}">{{ $job_category->name }} </option>
                                    <?php }} ?>
                                </select>
                                @if ($errors->has('job_category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('organization_type') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label required">Category by Industry</label>
                            <div class="col-md-10">
                                <select name="organization_type" id="organization_type" class="form-control select2" >
                                    <?php foreach($datas['type'] as $type){ 
                                        if(old('organization_type') == $type->id) {
                                        ?>
                                        <option selected="selected" value="{{ $type->id }}">{{ $type->name }} </option>
                                    <?php } else { ?>
                                            <option value="{{ $type->id }}">{{ $type->name }} </option>
                                    <?php }} ?>
                                </select>
                                @if ($errors->has('organization_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('organization_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('job_providor') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label required">Job Providor</label>
                            <div class="col-md-10">
                                <select name="job_providor" id="job_providor" class="form-control select2" >
                                    <?php foreach($datas['job_providor'] as $job_providor){ 
                                        if(old('job_providor') == $job_providor->id) {
                                        ?>
                                        <option selected="selected" value="{{ $job_providor->id }}">{{ $job_providor->name }} </option>
                                    <?php } else { ?>
                                            <option value="{{ $job_providor->id }}">{{ $job_providor->name }} </option>
                                    <?php }} ?>
                                </select>
                                @if ($errors->has('job_providor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_providor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('job_type') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label required">Job Type</label>
                            <div class="col-md-10">
                                <select name="job_type" id="job_type" class="form-control select2" >
                                    <?php foreach($datas['job_type'] as $job_type){ 
                                        if(old('job_type') == $job_type['value']) {
                                        ?>
                                        <option selected="selected" value="{{ $job_type['value'] }}">{{ $job_type['value'] }} </option>
                                    <?php } else { ?>
                                            <option value="{{ $job_type['value'] }}">{{ $job_type['value'] }} </option>
                                    <?php }} ?>
                                </select>
                                @if ($errors->has('job_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('job_level') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label required">Job Level</label>
                            <div class="col-md-10">
                                <select name="job_level" id="job_level" class="form-control select2" >
                                    <?php foreach($datas['job_level'] as $job_level){ 
                                        if(old('job_level') == $job_level->id) {
                                        ?>
                                        <option selected="selected" value="{{ $job_level->id }}">{{ $job_level->name }} </option>
                                    <?php } else { ?>
                                            <option value="{{ $job_level->id }}">{{ $job_level->name }} </option>
                                    <?php }} ?>
                                </select>
                                @if ($errors->has('job_level'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('job_availiability') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label required">Job Availiability</label>
                            <div class="col-md-10">
                                <select name="job_availiability" id="job_availiability" class="form-control select2" >
                                    <?php foreach($datas['job_availiability'] as $job_availiability){ 
                                        if(old('job_availiability') == $job_availiability['value']) {
                                        ?>
                                        <option selected="selected" value="{{ $job_availiability['value'] }}">{{ $job_availiability['value'] }} </option>
                                    <?php } else { ?>
                                            <option value="{{ $job_availiability['value'] }}">{{ $job_availiability['value'] }} </option>
                                    <?php }} ?>
                                </select>
                                @if ($errors->has('job_availiability'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_availiability') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('job_location') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label required">Job Location</label>
                            <div class="col-md-10">
                                <select name="job_location[]" id="job_location" class="form-control" multiple="multiple" >
                                    <?php foreach($datas['job_location'] as $job_location){ 
                                        if(old('job_location') == $job_location->id) {
                                        ?>
                                        <option selected="selected" value="{{ $job_location->id }}">{{ $job_location->name }} </option>
                                    <?php } else { ?>
                                            <option value="{{ $job_location->id }}">{{ $job_location->name }} </option>
                                    <?php }} ?>
                                </select>
                                @if ($errors->has('job_location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('minimum_experience') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label required">Minimum Experience</label>
                            <div class="col-md-10">
                                <select name="minimum_experience" id="minimum_experience" class="form-control select2"  >
                                    <?php for ($i=0; $i < 21; $i++) { 
                                       if ($i == 0 || $i == 1) {
                                           $title = 'Year';
                                       } else {
                                        $title = 'Years';
                                       }
                                        if(old('minimum_experience') == $i) {
                                        ?>
                                        <option selected="selected" value="{{ $i }}">{{$i.' '.$title}} Years</option>
                                    <?php } else { ?>
                                            <option value="{{ $i }}">{{$i.' '.$title}}</option>
                                    <?php }} ?>
                                </select>
                                @if ($errors->has('minimum_experience'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('minimum_experience') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label ">Education</label>
                            <div class="col-md-10">
                            <div class="col-md-6 {{ $errors->has('education_level') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label required"> Level</label>
                                <div class="col-md-8">
                                    <select name="education_level" id="education_level" class="form-control select2"  >
                                        <option value="">Select Level</option>
                                        <?php foreach($datas['education_level'] as $education_level){ 
                                            if(old('education_level') == $education_level->id) {
                                            ?>
                                            <option selected="selected" value="{{ $education_level->id }}">{{ $education_level->name }} </option>
                                        <?php } else { ?>
                                                <option value="{{ $education_level->id }}">{{ $education_level->name }} </option>
                                        <?php }} ?>
                                    </select>
                                    @if ($errors->has('education_level'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('education_level') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>
                             <div class="col-md-6 {{ $errors->has('faculty') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label required">Faculty</label>
                                <div class="col-md-8">
                                    <select name="faculty" id="faculty" class="form-control select2">
                                       <option value="">Select Faculty</option>
                                    </select>
                                    @if ($errors->has('faculty'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('faculty') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        </div>
                         <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label required">Position</label>
                            <div class="col-md-10">
                                <select name="position" id="position" class="form-control select2"  >
                                    <?php for ($i=0; $i < 501; $i++) { 
                                       
                                        if(old('position') == $i) {
                                        ?>
                                        <option selected="selected" value="{{ $i }}">{{$i}}</option>
                                    <?php } else { ?>
                                            <option value="{{ $i }}">{{$i}}</option>
                                    <?php }} ?>
                                </select>
                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('vacancy_code') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label required">Vacancy Code</label>
                            <div class="col-md-10">
                                <input type="text" id="vacancy_code" name="vacancy_code" class="form-control" value="{{old('vacancy_code')}}">
                                @if ($errors->has('vacancy_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vacancy_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('deadline') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label required">Deadline</label>
                            <div class="col-md-10">
                                <input type="text" id="deadline" name="deadline" class="form-control" value="{{old('deadline')}}">
                                @if ($errors->has('deadline'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deadline') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label ">External Link</label>
                            <div class="col-md-10">
                                <input type="text" id="external_link" name="external_link" class="form-control" value="{{old('external_link')}}">
                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('salary_unit') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label required">Salary Unit</label>
                            <div class="col-md-10">
                                <select name="salary_unit" id="salary_unit" class="form-control" >
                                    <?php foreach($datas['salary_unit'] as $salary_unit){ 
                                        if(old('salary_unit') == $salary_unit->id) {
                                        ?>
                                        <option selected="selected" value="{{ $salary_unit->id }}">{{ $salary_unit->title }} </option>
                                    <?php } else { ?>
                                            <option value="{{ $salary_unit->id }}">{{ $salary_unit->title }} </option>
                                    <?php }} ?>
                                </select>
                                @if ($errors->has('salary_unit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary_unit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Salary Negotiable</label>
                            <div class="col-md-10">
                                <label class="checkbox-inline"> <input type="radio" id="negotiable" checked="checked" name="negotiable" value="1">Yes</label>
                                <label class="checkbox-inline"> <input type="radio" id="negotiable" name="negotiable" value="0">No</label>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label ">Salary</label>
                            <div class="col-md-10">
                                <input type="text" id="salary" name="salary" class="form-control" value="{{old('salary')}}">
                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label ">Prefered Gender</label>
                            <div class="col-md-10">
                                <select name="gender" id="gender" class="form-control select2" >
                                    <?php foreach($datas['gender'] as $gender){ 
                                        if(old('gender') == $gender['value']) {
                                        ?>
                                        <option selected="selected" value="{{ $gender['value'] }}">{{ $gender['value'] }} </option>
                                    <?php } else { ?>
                                            <option value="{{ $gender['value'] }}">{{ $gender['value'] }} </option>
                                    <?php }} ?>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label ">Minimum Age</label>
                            <div class="col-md-10">
                                <select name="minimum_age" id="minimum_age" class="form-control select2"  >
                                    <?php for ($i=18; $i < 80; $i++) { 
                                       
                                        if(old('minimum_age') == $i) {
                                        ?>
                                        <option selected="selected" value="{{ $i }}">{{$i}} Years</option>
                                    <?php } else { ?>
                                            <option value="{{ $i }}">{{$i}} Years</option>
                                    <?php }} ?>
                                </select>
                                
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label ">Maximum Age</label>
                            <div class="col-md-10">
                                <select name="maximum_age" id="maximum_age" class="form-control select2"  >
                                    <?php for ($i=18; $i < 80; $i++) { 
                                       
                                        if(old('maximum_age') == $i) {
                                        ?>
                                        <option selected="selected" value="{{ $i }}">{{$i}} Years</option>
                                    <?php } else { ?>
                                            <option value="{{ $i }}">{{$i}} Years</option>
                                    <?php }} ?>
                                </select>
                               
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label required">Apply Type</label>
                            <div class="col-md-10">

                                <label class="checkbox-inline"> <input type="radio" id="apply_type"  name="apply_type" value="1">Only CV</label>
                                <label class="checkbox-inline"> <input type="radio" id="apply_type" checked="checked" name="apply_type" value="2">Normal</label>
                                
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-md-2 control-label required">Job Setting</label>
                            <div class="col-md-10">

                                <label class="checkbox-inline"> <input type="radio" id="job_setting" checked="checked" name="job_setting" value="1">Online Apply</label>
                                <label class="checkbox-inline"> <input type="radio" id="job_setting"  name="job_setting" value="2">Email Apply</label>
                                <label class="checkbox-inline"> <input type="radio" id="job_setting"  name="job_setting" value="3">Post Apply</label>
                                <label class="checkbox-inline"> <input type="radio" id="job_setting"  name="job_setting" value="2">Online & Email Apply</label>
                                
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-2 control-label ">E-mails</label>
                            <div class="col-md-10">
                               <input type="text" name="emails" class="form-control" placeholder="info@yourdomain.com,ceo@yourdomain.com" value="{{old('emails')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label required">Status</label>
                            <div class="col-md-10">
                                <select name="status" id="status" class="form-control" >
                                    @foreach($datas['status'] as $status)
                                    <option value="{{$status['value']}}">{{$status['title']}}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>

                       




</div>

                    <div class="tab-pane" id="tab-data">
                         <div class="form-group">
                            <label class="col-md-2 control-label">Description</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>

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
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Specification</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="specification" name="specification">{{old('specification')}}</textarea>

                                <script>
      
       
                                    CKEDITOR.replace('specification',
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
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Education Description</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="education_description" name="education_description">{{old('education_description')}}</textarea>

                                <script>
      
       
                                    CKEDITOR.replace('education_description',
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
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Specific Requirements</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="specific_requirement" name="specific_requirement">{{old('specific_requirement')}}</textarea>

                                <script>
      
       
                                    CKEDITOR.replace('specific_requirement',
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
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Specific Instructions</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="specific_instruction" name="specific_instruction">{{old('specific_instruction')}}</textarea>

                                <script>
      
       
                                    CKEDITOR.replace('specific_instruction',
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
                            </div>
                        </div>

                       

                    </div>
                    <div class="tab-pane education-box" id="tab-head">
                                                <table class="table table-bordered table-hover">

                            <thead>
                                <th>Label</th>
                                <th>Input Type</th>
                                <th>Options</th>
                                <th>Required</th>
                               
                                
                                <th></th>
                            </thead>
                            <tbody id="job_form">
                                <tr id="job_form-row-0">
                                    <td><input type="text" name="job_form[0][label]" class="form-control"></td>
                                    <td><select class="form-control" name="job_form[0][types]">@foreach($datas["form_type"] as $types) <option value="{{$types["value"]}}">{{$types["value"]}}</option> @endforeach</select></td>
                                    <td><input type="text" name="job_form[0][options]" placeholder="option1,option2" class="form-control"></td>
                                    <td><select class="form-control" name="job_form[0][require]"><option value="1">Required</option><option value="2">Non Required</option></select></td>
                                    
                                    
                                    <td><button type="button" onclick="$('#job_form-row-0').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                                </tr>

                            </tbody>
                            <tfoot><tr><td colspan="5"><button type="button" onclick="addJobForms();" data-toggle="tooltip" title="Add More Training" class="btn btn-primary"><i class="fa fa-plus-circle"></i>Add More Fields</button></td></tr></tfoot>
                        </table>

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
<?php $today = date('Ymd'); ?>
<script type="text/javascript">
    $(document).on('change', '#education_level', function(){

        var data = $(this).val();
        var token = $('input[name=\'_token\']').val();
        if (data != '') {
            $.ajax({
        type: 'POST',
        url: '{{url("/admin/faculty/getfaculty")}}',
        data: 'id='+data+'&_token='+token,
        cache: false,
        success: function(html){
            $('#faculty').html(html);
           
        }
    });
        }else{
            html = '<option value="0">Select Faculty</option>';
            $('#faculty').html(html);
        }
    });
    $('#title').blur(function(){
        var data = $(this).val();
        var today = '{{$today}}';
        var fleter = data.match(/\b\w/g).join('');

        var se_url = data.replace(/ /g,"-");
        $('#vacancy_code').val(fleter+'-'+today);
        $('#seo_url').val(se_url);
    });
</script>
<script type="text/javascript">
$.fn.tabs = function() {
  var selector = this;
  
  this.each(function() {
    var obj = $(this); 
    
    $(obj.attr('href')).hide();
    
    $(obj).click(function() {
      $(selector).removeClass('selected');
      
      $(selector).each(function(i, element) {
        $($(element).attr('href')).hide();
      });
      
      $(this).addClass('selected');
      
      $($(this).attr('href')).show();
      
      return false;
    });
  });

  $(this).show();
  
  $(this).first().click();
};
</script>
<script type="text/javascript">
$(function() {
 
  $(".select2").select2({ width: '100%' });
  $('#deadline').datepicker();
});


</script>
<script type="text/javascript">
     var job_form_row = 1;
    function addJobForms()
    {
       
        html = '<tr id="job_form-row-'+job_form_row+'">';
        html += '<td><input type="text" name="job_form['+job_form_row+'][label]" class="form-control"></td>';
        html += '<td><select class="form-control" name="job_form['+job_form_row+'][types]">@foreach($datas["form_type"] as $types) <option value="{{$types["value"]}}">{{$types["value"]}}</option> @endforeach</select></td>';
        html += '<td><input type="text" name="job_form['+job_form_row+'][options]" placeholder="option1,option2" class="form-control"></td>';
        html += '<td><select class="form-control" name="job_form['+job_form_row+'][require]"><option value="1">Required</option><option value="2">Non Required</option></select></td>';
                                                
        html += '<td><button type="button" onclick="$(\'#job_form-row-'+job_form_row+'\').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td></tr>';
        $('#job_form').append(html);

  job_form_row++;
    };
</script>
@endsection