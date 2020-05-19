<?php $__env->startSection('heading'); ?>
Edit Job 
            <small>Detail of Edit Job</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo e(url('/branchadmin/jobs')); ?>">Jobs</a></li>
            <li class="active">Edit Job</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('assets/ckeditor/ckeditor.js')); ?>"></script>
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Job</div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" id="testform" method="POST" action="<?php echo e(url('/branchadmin/jobs/update')); ?>">
                        <input type="hidden" name="id" id="job_id" value="<?php echo e($datas['jobs']->id); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                         <div class="col-md-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab-general" data-toggle="tab">General Information</a></li>
                                <li><a href="#tab-data" data-toggle="tab">Requirements</a></li>
                                <li><a href="#tab-head" data-toggle="tab">Form</a></li>
                                
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-general">

                                    <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label required">Job Title</label>

                            <div class="col-md-10">
                                <input type="text" id="title" class="form-control" name="title" value="<?php echo e($datas['jobs']->title); ?>">

                                <?php if($errors->has('title')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('seo_url') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label required">Job Seo Url</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="seo_url" name="seo_url" value="<?php echo e($datas['jobs']->seo_url); ?>">

                                <?php if($errors->has('seo_url')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('seo_url')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('branch') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label required">Job Providor</label>
                            <div class="col-md-10">
                                <select name="branch" id="branch" class="form-control select2" >
                                    <?php foreach($datas['branch'] as $branch){ 
                                        if($datas['jobs']->branch_id == $branch->id) {
                                        ?>
                                        <option selected="selected" value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?> </option>
                                    <?php } else { ?>
                                            <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?> </option>
                                    <?php }} ?>
                                </select>
                                <?php if($errors->has('branch')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('branch')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('job_level') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label required">Job Level</label>
                            <div class="col-md-10">
                                <select name="job_level" id="job_level" class="form-control select2" >
                                    <option value="">Select Job Level</option>
                                    <?php foreach($datas['job_level'] as $job_level){ 
                                        if($datas['jobs']->job_level == $job_level->id) {
                                        ?>
                                        <option selected="selected" value="<?php echo e($job_level->id); ?>"><?php echo e($job_level->name); ?> </option>
                                    <?php } else { ?>
                                            <option value="<?php echo e($job_level->id); ?>"><?php echo e($job_level->name); ?> </option>
                                    <?php }} ?>
                                </select>
                                <?php if($errors->has('job_level')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('job_level')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('job_availiability') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label required">Job Availiability</label>
                            <div class="col-md-10">
                                <select name="job_availiability" id="job_availiability" class="form-control select2" >
                                    <?php foreach($datas['job_availiability'] as $job_availiability){ 
                                        if($datas['jobs']->job_availability == $job_availiability['value']) {
                                        ?>
                                        <option selected="selected" value="<?php echo e($job_availiability['value']); ?>"><?php echo e($job_availiability['value']); ?> </option>
                                    <?php } else { ?>
                                            <option value="<?php echo e($job_availiability['value']); ?>"><?php echo e($job_availiability['value']); ?> </option>
                                    <?php }} ?>
                                </select>
                                <?php if($errors->has('job_availiability')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('job_availiability')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('job_location') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label required">Job Location</label>
                            <div class="col-md-10">
                                <select name="job_location[]" id="job_location" class="form-control select2" multiple="multiple" >
                                    <?php foreach($datas['job_location'] as $job_location){ 
                                        if(in_array($job_location->id,$datas['jobs_location'])) {
                                        ?>
                                        <option selected="selected" value="<?php echo e($job_location->id); ?>"><?php echo e($job_location->name); ?> </option>
                                    <?php } else { ?>
                                            <option value="<?php echo e($job_location->id); ?>"><?php echo e($job_location->name); ?> </option>
                                    <?php }} ?>
                                </select>
                                <?php if($errors->has('job_location')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('job_location')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('minimum_experience') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label ">Minimum Experience</label>
                            <div class="col-md-10">
                                <select name="minimum_experience" id="minimum_experience" class="form-control select2"  >
                                    <?php for ($i=0; $i < 21; $i++) { 
                                       if ($i == 0 || $i == 1) {
                                           $title = 'Year';
                                       } else {
                                        $title = 'Years';
                                       }
                                        if($datas['jobs']->min_experience == $i) {
                                        ?>
                                        <option selected="selected" value="<?php echo e($i); ?>"><?php echo e($i.' '.$title); ?> </option>
                                    <?php } else { ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e($i.' '.$title); ?></option>
                                    <?php }} ?>
                                </select>
                                <?php if($errors->has('minimum_experience')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('minimum_experience')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-2 control-label ">Experience</label>
                            <div class="col-md-10">
                            <table class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                <th>Experience On</th>
                                <th>Duration</th>
                               
                                <th>Format</th>
                                                           
                                <th></th>
                            </tr></thead>
                            <tbody id="job_experience">
                             <?php $experience_row = 0; ?>
                             <?php if(is_array(old('job_experience'))): ?>
                                <?php if(count(old('job_experience')) > 0): ?>
                            

                            <?php foreach(old('job_experience') as $key => $oldexp): ?>
                              <tr id="job-experience-row-<?php echo e($experience_row); ?>">
                                    <td class="<?php echo e($errors->has('job_experience.'.$key.'.exp_id') ? ' has-error' : ''); ?>">
                                     <select name="job_experience[<?php echo e($experience_row); ?>][exp_id]" class="form-control select2"  >
                                        <option value="">Select Experience</option>
                                        <?php foreach($datas['experiences'] as $experience){ 
                                            if($oldexp['exp_id'] == $experience->id) {
                                            ?>
                                            <option selected="selected" value="<?php echo e($experience->id); ?>"><?php echo e($experience->name); ?> </option>
                                        <?php } else { ?>
                                                <option value="<?php echo e($experience->id); ?>"><?php echo e($experience->name); ?> </option>
                                        <?php }} ?>
                                    </select>


                                    <?php if($errors->has('job_experience.'.$key.'.exp_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('job_experience.'.$key.'.exp_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    
                                    </td>
                                  
                                    <td><input name="job_experience[<?php echo e($experience_row); ?>][experience]" class="form-control" value="<?php echo e($oldexp['experience']); ?>" type="text"></td>
                                    <td><select class="form-control" name="job_experience[<?php echo e($experience_row); ?>][exp_format]">
                                    <?php foreach($datas['exp_format'] as $format): ?>
                                        <?php if($oldexp['exp_format'] == $format['value']): ?>
                                    <option selected value="<?php echo e($format['value']); ?>"><?php echo e($format['value']); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($format['value']); ?>"><?php echo e($format['value']); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    </select></td>
                                    
                                    
                                    <td><button type="button" onclick="$('#job-experience-row-<?php echo e($experience_row); ?>').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                                </tr>
                                <?php $experience_row++; ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                <?php elseif(count($datas['job_experiences']) > 0): ?>
                                <?php foreach($datas['job_experiences'] as $jexp): ?>
                                <tr id="job-experience-row-<?php echo e($experience_row); ?>">
                                    <td>
                                     <select name="job_experience[<?php echo e($experience_row); ?>][exp_id]" class="form-control select2"  >
                                        <option value="">Select Experience</option>
                                        <?php foreach($datas['experiences'] as $experience): ?>
                                        <?php if($jexp->experience_id == $experience->id): ?>
                                                <option selected="selected" value="<?php echo e($experience->id); ?>"><?php echo e($experience->name); ?> </option>
                                        <?php else: ?>
                                            <option value="<?php echo e($experience->id); ?>"><?php echo e($experience->name); ?> </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                                                    
                                    </td>
                                  
                                    <td><input name="job_experience[<?php echo e($experience_row); ?>][experience]" class="form-control" value="<?php echo e($jexp->experience); ?>" type="text"></td>
                                    <td><select class="form-control" name="job_experience[<?php echo e($experience_row); ?>][exp_format]">
                                    <?php foreach($datas['exp_format'] as $format): ?>
                                        <?php if($jexp->exp_format == $format['value']): ?>
                                    <option selected="selected" value="<?php echo e($format['value']); ?>"><?php echo e($format['value']); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($format['value']); ?>"><?php echo e($format['value']); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    </select></td>
                                    
                                    
                                    <td><button type="button" onclick="$('#job-experience-row-<?php echo e($experience_row); ?>').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                                </tr>
                                <?php $experience_row++; ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                                            </tbody>
                            <tfoot><tr><td colspan="4"><button type="button" onclick="addExperience();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add More Experience"><i class="fa fa-plus-circle"></i>Add More Experience</button></td></tr></tfoot>
                        </table>
                            
                             
                            
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label ">Education</label>
                            <div class="col-md-10">
                            <table class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                <th>Education Level</th>
                                <th>Faculty</th>
                                <th>Experience</th>
                                <th>Format</th>
                                   <th>Percent</th>                         
                                  <th>CGPA</th>
                                  <th>Others</th>                         
                                <th></th>
                            </tr></thead>
                            <tbody id="job_education">
                            <?php $education_row = 1; ?>
                            <?php if(is_array(old('job_education'))): ?>
                             <?php if(count(old('job_education')) > 0): ?>
                            

                            <?php foreach(old('job_education') as $key => $oldedu): ?>
                            <tr id="job-education-row-<?php echo e($education_row); ?>">
                                    <td class="<?php echo e($errors->has('job_education.'.$key.'.education_level') ? ' has-error' : ''); ?>">
                                     <select name="job_education[<?php echo e($education_row); ?>][education_level]" id="<?php echo e($education_row); ?>" class="form-control select2 level_id"  >
                                        <option value="">Select Level</option>
                                        <?php foreach($datas['education_level'] as $education_level){ 
                                            if($oldedu['education_level'] == $education_level->id) {
                                            ?>
                                            <option selected="selected" value="<?php echo e($education_level->id); ?>"><?php echo e($education_level->name); ?> </option>
                                        <?php } else { ?>
                                                <option value="<?php echo e($education_level->id); ?>"><?php echo e($education_level->name); ?> </option>
                                        <?php }} ?>
                                    </select>
                                    <?php if($errors->has('job_education.'.$key.'.education_level')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('job_education.'.$key.'.education_level')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    
                                    </td>
                                    <td><select name="job_education[<?php echo e($education_row); ?>][faculty]" id="faculty<?php echo e($education_row); ?>" class="form-control select2">
                                        <?php echo \App\Faculty::getFaculties($oldedu['education_level'],$oldedu['faculty']); ?>
                                    </select></td>
                                    <td><input name="job_education[<?php echo e($education_row); ?>][experience]" class="form-control" value="<?php echo e($oldedu['experience']); ?>" type="text"></td>
                                     <td><select class="form-control" name="job_education[<?php echo e($education_row); ?>][exp_format]">
                                    <?php foreach($datas['exp_format'] as $format): ?>
                                        <?php if($oldedu['exp_format'] == $format['value']): ?>
                                    <option selected value="<?php echo e($format['value']); ?>"><?php echo e($format['value']); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($format['value']); ?>"><?php echo e($format['value']); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    </select></td>
                                    
                                     <td><input name="job_education[<?php echo e($education_row); ?>][percent]" class="form-control" value="<?php echo e($oldedu['percent']); ?>" type="text"></td>
                                    <td><input name="job_education[<?php echo e($education_row); ?>][cgpa]" class="form-control" value="<?php echo e($oldedu['cgpa']); ?>" type="text"></td>
                                    <td><input name="job_education[<?php echo e($education_row); ?>][others]" class="form-control" value="<?php echo e($oldedu['others']); ?>" type="text"></td>
                                    <td><button type="button" onclick="$('#job-education-row-<?php echo e($education_row); ?>').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                                </tr>
                                <?php $education_row++; ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                <?php elseif(count($datas['job_educations']) > 0): ?>
                                <?php foreach($datas['job_educations'] as $je): ?>
                                <tr id="job-education-row-<?php echo e($education_row); ?>">
                                    <td class="">
                                     <select name="job_education[<?php echo e($education_row); ?>][education_level]" id="<?php echo e($education_row); ?>" class="form-control select2 level_id"  >
                                        <option value="">Select Level</option>
                                        <?php foreach($datas['education_level'] as $education_level){ 
                                            if($je->education_level_id == $education_level->id) {
                                            ?>
                                            <option selected="selected" value="<?php echo e($education_level->id); ?>"><?php echo e($education_level->name); ?> </option>
                                        <?php } else { ?>
                                                <option value="<?php echo e($education_level->id); ?>"><?php echo e($education_level->name); ?> </option>
                                        <?php }} ?>
                                    </select>
                                 
                                    
                                    </td>
                                    <td><select name="job_education[<?php echo e($education_row); ?>][faculty]" id="faculty<?php echo e($education_row); ?>" class="form-control select2">
                                      <?php echo \App\Faculty::getFaculties($je->education_level_id,$je->faculty_id); ?>
                                    </select></td>
                                    <td><input name="job_education[<?php echo e($education_row); ?>][experience]" value="<?php echo e($je->experience); ?>" class="form-control" type="text"></td>
                                    <td><select class="form-control" name="job_education[<?php echo e($education_row); ?>][exp_format]">
                                       <?php foreach($datas['exp_format'] as $format): ?>
                                        <?php if($je->exp_format == $format['value']): ?>
                                    <option selected value="<?php echo e($format['value']); ?>"><?php echo e($format['value']); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($format['value']); ?>"><?php echo e($format['value']); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    </select></td>
                                    <td><input name="job_education[<?php echo e($education_row); ?>][percent]" class="form-control" value="<?php echo e($je->percent); ?>" type="text"></td>
                                    <td><input name="job_education[<?php echo e($education_row); ?>][cgpa]" class="form-control" value="<?php echo e($je->cgpa); ?>" type="text"></td>
                                    <td><input name="job_education[<?php echo e($education_row); ?>][others]" class="form-control" value="<?php echo e($je->others); ?>" type="text"></td>
                                    
                                    <td><button type="button" onclick="$('#job-education-row-<?php echo e($education_row); ?>').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                                </tr>
                                <?php $education_row++; ?>
                                <?php endforeach; ?>

                                <?php endif; ?>
                                
                              
                                                            </tbody>
                            <tfoot><tr><td colspan="8"><button type="button" onclick="addEducation();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add More Education"><i class="fa fa-plus-circle"></i>Add More Education</button></td></tr></tfoot>
                        </table>
                            
                             
                            
                        </div>
                        </div>
                         <div class="form-group<?php echo e($errors->has('position') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label ">Number of Position</label>
                            <div class="col-md-10">
                                <select name="position" id="position" class="form-control select2"  >
                                    <?php for ($i=0; $i < 501; $i++) { 
                                       
                                        if($datas['jobs']->position == $i) {
                                        ?>
                                        <option selected="selected" value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                    <?php } else { ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                    <?php }} ?>
                                </select>
                                <?php if($errors->has('position')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('position')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('vacancy_code') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label required">Vacancy Code</label>
                            <div class="col-md-10">
                                <input type="text" id="vacancy_code" name="vacancy_code" class="form-control" value="<?php echo e($datas['jobs']->vacancy_code); ?>">
                                <?php if($errors->has('vacancy_code')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('vacancy_code')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('deadline') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label required">Deadline</label>
                            <div class="col-md-10">
                                <input type="text" id="deadline" name="deadline" class="form-control" value="<?php echo e($datas['jobs']->deadline); ?>">
                                <?php if($errors->has('deadline')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('deadline')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label ">External Link</label>
                            <div class="col-md-10">
                                <input type="text" id="external_link" name="external_link" class="form-control" value="<?php echo e($datas['jobs']->external_link); ?>">
                                
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('salary_unit') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label required">Salary Unit</label>
                            <div class="col-md-10">
                                <select name="salary_unit" id="salary_unit" class="form-control" >
                                    <?php foreach($datas['salary_unit'] as $salary_unit){ 
                                        if($datas['jobs']->salary_unit == $salary_unit->id) {
                                        ?>
                                        <option selected="selected" value="<?php echo e($salary_unit->id); ?>"><?php echo e($salary_unit->title); ?> </option>
                                    <?php } else { ?>
                                            <option value="<?php echo e($salary_unit->id); ?>"><?php echo e($salary_unit->title); ?> </option>
                                    <?php }} ?>
                                </select>
                                <?php if($errors->has('salary_unit')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('salary_unit')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Salary Negotiable</label>
                            <div class="col-md-10">
                                <?php if($datas['jobs']->negotiable == 1): ?>
                                <label class="checkbox-inline"> <input type="radio" id="negotiable" checked="checked" name="negotiable" value="1">Yes</label>
                                <label class="checkbox-inline"> <input type="radio" id="negotiable" name="negotiable" value="0">No</label>
                                <?php else: ?>
                                <label class="checkbox-inline"> <input type="radio" id="negotiable"  name="negotiable" value="1">Yes</label>
                                <label class="checkbox-inline"> <input type="radio" id="negotiable" checked="checked" name="negotiable" value="0">No</label>
                                <?php endif; ?>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label ">Salary</label>
                            <div class="col-md-10">
                                <input type="text" id="salary" name="salary" class="form-control" value="<?php echo e($datas['jobs']->minimum_salary); ?>">
                                
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label ">Prefered Gender</label>
                            <div class="col-md-10">
                                <select name="gender" id="gender" class="form-control select2" >
                                    <option value="">Select Gender</option>
                                    <?php foreach($datas['gender'] as $gender){ 
                                        if($datas['jobs']->gender == $gender['value']) {
                                        ?>
                                        <option selected="selected" value="<?php echo e($gender['value']); ?>"><?php echo e($gender['value']); ?> </option>
                                    <?php } else { ?>
                                            <option value="<?php echo e($gender['value']); ?>"><?php echo e($gender['value']); ?> </option>
                                    <?php }} ?>
                                </select>
                                <?php if($errors->has('gender')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('gender')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label ">Minimum Age</label>
                            <div class="col-md-10">
                                <select name="minimum_age" id="minimum_age" class="form-control select2"  >
                                    <option value="">Select Age</option>
                                    <?php for ($i=18; $i < 80; $i++) { 
                                       
                                        if($datas['jobs']->min_age == $i) {
                                        ?>
                                        <option selected="selected" value="<?php echo e($i); ?>"><?php echo e($i); ?> Years</option>
                                    <?php } else { ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?> Years</option>
                                    <?php }} ?>
                                </select>
                                
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label ">Maximum Age</label>
                            <div class="col-md-10">
                                <select name="maximum_age" id="maximum_age" class="form-control select2"  >
                                    <option value="">Select Age</option>
                                    <?php for ($i=18; $i < 80; $i++) { 
                                       
                                        if($datas['jobs']->max_age == $i) {
                                        ?>
                                        <option selected="selected" value="<?php echo e($i); ?>"><?php echo e($i); ?> Years</option>
                                    <?php } else { ?>
                                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?> Years</option>
                                    <?php }} ?>
                                </select>
                               
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label required">Validation Email</label>
                            <div class="col-md-10">
                                <?php foreach($datas['setting'] as $apply_type): ?>
                                    <?php if($datas['jobs']->apply_type == $apply_type['value']): ?>
                                        <label class="checkbox-inline"> <input type="radio" id="apply_type" checked="checked" name="apply_type" value="<?php echo e($apply_type['value']); ?>"><?php echo e($apply_type['title']); ?></label>
                                    <?php else: ?>
                                    <label class="checkbox-inline"> <input type="radio" id="apply_type" name="apply_type" value="<?php echo e($apply_type['value']); ?>"><?php echo e($apply_type['title']); ?></label>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                
                                
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-md-2 control-label required">Job Setting</label>
                            <div class="col-md-10">
                                <?php foreach($datas['application'] as $job_setting): ?>
                                    <?php if($datas['jobs']->setting == $job_setting['value']): ?>
                                        <label class="checkbox-inline"> <input type="radio" id="job_setting" checked="checked" name="job_setting" value="<?php echo e($job_setting['value']); ?>"><?php echo e($job_setting['title']); ?></label>
                                    <?php else: ?>
                                        <label class="checkbox-inline"> <input type="radio" id="job_setting"  name="job_setting" value="<?php echo e($job_setting['value']); ?>"><?php echo e($job_setting['title']); ?></label>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                
                              
                                
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-2 control-label ">E-mails</label>
                            <div class="col-md-10">
                               <input type="text" name="emails" class="form-control" placeholder="info@yourdomain.com,ceo@yourdomain.com" value="<?php echo e($datas['jobs']->emails); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label required">Status</label>
                            <div class="col-md-10">
                                <select name="status" id="status" class="form-control" >
                                    <?php foreach($datas['status'] as $status): ?>
                                        <?php if($datas['jobs']->status == $status['value']): ?>
                                            <option selected="selected" value="<?php echo e($status['value']); ?>"><?php echo e($status['title']); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($status['value']); ?>"><?php echo e($status['title']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </select>
                            </div>
                        </div>

                       <div class="form-group">
                            <label class="col-md-2 control-label required">Process Status</label>
                            <div class="col-md-10">
                                <select name="process_status" id="process_status" class="form-control" >
                                    <?php foreach($datas['process_status'] as $process_status): ?>
                                        <?php if($datas['jobs']->process_status == $process_status->id): ?>
                                            <option selected="selected" value="<?php echo e($process_status->id); ?>"><?php echo e($process_status->title); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($process_status->id); ?>"><?php echo e($process_status->title); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label ">Job Publish Date</label>
                            <div class="col-md-10">
                                <input type="text" id="publish_date" name="publish_date" class="form-control" value="<?php echo e($datas['jobs']->publish_date); ?>">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-2 control-label ">Line Manager/Reports To</label>
                            <div class="col-md-10">
                                <input type="text" name="line_manager" class="form-control" value="<?php echo e($datas['jobs']->line_manager); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label ">Assignment Handled By</label>
                            <div class="col-md-10">
                                <input type="text" name="assingment_handler" class="form-control" value="<?php echo e($datas['jobs']->assingment_handler); ?>">
                            </div>
                        </div>
                        <div class="form-group <?php echo e($errors->has('file') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label">File</label>

                            <div class="col-md-10">
                            
                                       <input type="file" name="file" accept="application/pdf" class="form-control" /> 
                                       <?php if(!empty($datas['jobs']->job_file)): ?> 

                                       <div class="pdf_thumb"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <div class="remove" title="Remove File"><i class="fa fa-times" aria-hidden="true"></i>
</div><div class="title"><?php echo e(str_replace('file/', '', $datas['jobs']->job_file)); ?></div>
                                       </div>
                                       
                                       <?php endif; ?>
                                       <input type="hidden" id="file_name" name="file_name" value="<?php echo e($datas['jobs']->job_file); ?>">    
                                        <?php if($errors->has('file')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('file')); ?></strong>
                                    </span>
                                <?php endif; ?>        

                               
                            </div>
                        </div>
                         
                         <div class="form-group">
                            <label class="col-md-2 control-label ">Advertise Detail</label>
                            <div class="col-md-10">
                                <input type="text" name="advertise_detail" class="form-control" value="<?php echo e($datas['jobs']->advertise_detail); ?>">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-2 control-label ">Advertise Link</label>
                            <div class="col-md-10">
                                <input type="text" name="advertise_link" class="form-control" value="<?php echo e($datas['jobs']->advertise_link); ?>">
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-md-2 control-label">Image</label>

                            <div class="col-md-10">
                            <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="<?php echo e(asset($datas['image'])); ?>" alt="" title="" data-placeholder="<?php echo e(asset($datas['placeholder'])); ?>" /></a>
                  <input type="hidden" name="image" value="<?php echo e($datas['jobs']->image); ?>" id="input-image" />

                               
                            </div>
                        </div>

                    <div class="form-group">
                            <label class="col-md-2 control-label ">Sort Order</label>
                            <div class="col-md-10">
                                <input type="text" name="sort_order" class="form-control" value="<?php echo e($datas['jobs']->sort_order); ?>">
                            </div>
                        </div>

</div>

                    <div class="tab-pane" id="tab-data">
                         <div class="form-group">
                            <label class="col-md-2 control-label">Description</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="description" name="description"><?php echo e($datas['jobs_requirements']->description); ?></textarea>

                                <script>
      
       
                                    CKEDITOR.replace('description',
                                    {
                                        filebrowserBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html")); ?>',
                                        filebrowserImageBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Images")); ?>',
                                        filebrowserFlashBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Flash")); ?>',
                                        filebrowserUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")); ?>',
                                        filebrowserImageUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")); ?>',
                                        filebrowserFlashUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")); ?>',
                                        enterMode: CKEDITOR.ENTER_BR
                                    });
                                   
                                    
                                 
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Specification</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="specification" name="specification"><?php echo e($datas['jobs_requirements']->specification); ?></textarea>

                                <script>
      
       
                                    CKEDITOR.replace('specification',
                                    {
                                        filebrowserBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html")); ?>',
                                        filebrowserImageBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Images")); ?>',
                                        filebrowserFlashBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Flash")); ?>',
                                        filebrowserUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")); ?>',
                                        filebrowserImageUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")); ?>',
                                        filebrowserFlashUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")); ?>',
                                        enterMode: CKEDITOR.ENTER_BR
                                    });
                                   
                                    
                                 
                                </script>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Education Description</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="education_description" name="education_description"><?php echo e($datas['jobs_requirements']->education_description); ?></textarea>

                                <script>
      
       
                                    CKEDITOR.replace('education_description',
                                    {
                                        filebrowserBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html")); ?>',
                                        filebrowserImageBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Images")); ?>',
                                        filebrowserFlashBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Flash")); ?>',
                                        filebrowserUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")); ?>',
                                        filebrowserImageUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")); ?>',
                                        filebrowserFlashUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")); ?>',
                                        enterMode: CKEDITOR.ENTER_BR
                                    });
                                   
                                    
                                 
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Job Processing Status</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="specific_requirement" name="specific_requirement"><?php echo e($datas['jobs_requirements']->specific_requirement); ?></textarea>

                                <script>
      
       
                                    CKEDITOR.replace('specific_requirement',
                                    {
                                        filebrowserBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html")); ?>',
                                        filebrowserImageBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Images")); ?>',
                                        filebrowserFlashBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Flash")); ?>',
                                        filebrowserUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")); ?>',
                                        filebrowserImageUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")); ?>',
                                        filebrowserFlashUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")); ?>',
                                        enterMode: CKEDITOR.ENTER_BR
                                    });
                                   
                                    
                                 
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">CONFIDENTIAL</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="specific_instruction" name="specific_instruction"><?php echo e($datas['jobs_requirements']->specific_instruction); ?></textarea>

                                <script>
      
       
                                    CKEDITOR.replace('specific_instruction',
                                    {
                                        filebrowserBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html")); ?>',
                                        filebrowserImageBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Images")); ?>',
                                        filebrowserFlashBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Flash")); ?>',
                                        filebrowserUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")); ?>',
                                        filebrowserImageUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")); ?>',
                                        filebrowserFlashUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")); ?>',
                                        enterMode: CKEDITOR.ENTER_BR
                                    });
                                   
                                    
                                 
                                </script>
                            </div>
                        </div>

                       

                    </div>
                    <div class="tab-pane education-box" id="tab-head">
                        <div class="box box-default box-solid"><div class="box-header with-border">
                          <h3 class="box-title">Defalt Form Fields</h3>

                         
                          <!-- /.box-tools -->
                        </div></div>
                        <div class="form-group">
                            
                            <?php foreach($datas['form_fields'] as $fields): ?>
                            <div class=" col-md-3 ">
                               
                                <div class="form-check">
                                    <?php if(is_array($datas['jobs_f_fields'])): ?>
                                    <?php if(in_array($fields['value'],$datas['jobs_f_fields'])): ?>
                                    <input type="checkbox" checked="checked" class="form-check-input" name="form_fields[]" value="<?php echo e($fields['value']); ?>" >
                                    <?php else: ?>
                                    <input type="checkbox"  class="form-check-input" name="form_fields[]" value="<?php echo e($fields['value']); ?>" >
                                    <?php endif; ?>
                                    <?php else: ?>
                                     <input type="checkbox" checked="checked" class="form-check-input" name="form_fields[]" value="<?php echo e($fields['value']); ?>" >
                                    <?php endif; ?>
                                    <label class="form-check-label" ><?php echo e($fields['title']); ?></label>
                                </div>
                               
                            </div>
                            <?php endforeach; ?>
                                 <div class=" col-md-3">
                               
                               <label class="form-check-label" >Location Title</label>
                                    <input type="text" class="form-control" name="location_title" value="<?php echo e($datas['jobs']->location_title); ?>" >
                                    
                                
                               
                            </div>
                        </div>
                        <div class="box box-default box-solid"><div class="box-header with-border">
                          <h3 class="box-title">Education Levels</h3>

                         
                          <!-- /.box-tools -->
                        </div></div>
                        <div class="form-group">
                            <div class=" col-md-3">
                               
                                <div class="form-check">
                                    <?php if($datas['jobs']->emanual == 1): ?>
                                    <input type="checkbox" checked="checked" class="form-check-input" name="manual_education" value="1" >
                                    <?php else: ?>
                                    <input type="checkbox" class="form-check-input" name="manual_education" value="1" >
                                    <?php endif; ?>
                                    <label class="form-check-label" >Manual Entry</label>
                                </div>
                               
                            </div>
                            <?php foreach($datas['education_level'] as $elevels): ?>
                            <div class=" col-md-3">
                               
                                <div class="form-check">
                                    <?php if(is_array($datas['education_levels'])): ?>
                                    <?php if(in_array($elevels->id,$datas['education_levels'])): ?>
                                    <input type="checkbox" checked="checked" class="form-check-input" name="education_levels[]" value="<?php echo e($elevels->id); ?>" >
                                    <?php else: ?> 
                                    <input type="checkbox" class="form-check-input" name="education_levels[]" value="<?php echo e($elevels->id); ?>" >
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <input type="checkbox" class="form-check-input" name="education_levels[]" value="<?php echo e($elevels->id); ?>" >
                                    <?php endif; ?>
                                    <label class="form-check-label" ><?php echo e($elevels->name); ?></label>
                                </div>
                               
                            </div>
                            <?php endforeach; ?>

                        </div>



                            <div class="box box-default box-solid">
                            <div class="box-header with-border">
                          <h3 class="box-title">Marks</h3>

                         
                          <!-- /.box-tools -->
                        </div></div>
                        <div class="form-group">
                            
                            <div class="col-md-6">
                         <label class="col-md-6 control-label">Education Marks</label>
                            <div class=" col-md-6">
                             <input type="text" name="edu_marks" value="<?php echo e($datas['jobs']->edu_marks); ?>" class="form-control">
                               
                            </div>

                        </div>


                            <div class="col-md-6">
                         <label class="col-md-6 control-label">Experience Marks</label>
                            <div class=" col-md-6">
                             <input type="text" name="exp_marks" value="<?php echo e($datas['jobs']->exp_marks); ?>" class="form-control">
                               
                            </div>

                        </div>

                        </div>

                                       <table class="table table-bordered table-hover">

                            <thead>
                                <th>Parent</th>
                                <th>Label</th>
                                <th>Input Type</th>
                                <th>Options</th>
                                <th>Required</th>
                                <th>Marks</th>
                                <th>Extra</th>
                                <!-- <th>Extra Label</th> -->
                                <!-- <th>Extra Type</th> -->
                                
                                <th></th>
                            </thead>
                            <tbody id="job_form">
                                  <?php $i = 0; ?>
                                <?php if(count($datas['jobs_form']) > 0): ?>
                                <?php foreach($datas['jobs_form'] as $jf): ?>
                               <tr id="job_form_row_<?php echo e($i); ?>"><td><?php echo e(\App\JobForm::getTitle($jf->parent_id)); ?></td><td><?php echo e($jf->f_lable); ?></td><td><?php echo e($jf->f_type); ?></td><td><?php echo e($jf->list_menu); ?></td><td><?php echo e($jf->requ == 1 ? 'Required' : 'Not Required'); ?></td><td><?php echo e($jf->marks); ?></td><td><?php echo e($jf->extra); ?></td><td><button type="button" onclick="editFormData('<?php echo e($i); ?>','<?php echo e($jf->id); ?>');" data-toggle="tooltip" title="Edit" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                               <button type="button" onclick="removeFormData('<?php echo e($i); ?>','<?php echo e($jf->id); ?>');" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td></tr>
                               <?php $i++; ?>
                                <?php endforeach; ?>
                                <?php endif; ?>

                          
                               
                            </tbody>
                            <tfoot>        <tr>
                                    <td><input type="hidden" id="parent_id" class="form-control" value=""><input type="text" class="parent form-control" value=""></td>
                                    <td><input type="text" id="label" class="form-control"></td>
                                    <td><select class="form-control" id="types"><?php foreach($datas["form_type"] as $types): ?> <option value="<?php echo e($types["value"]); ?>"><?php echo e($types["value"]); ?></option> <?php endforeach; ?></select></td>
                                    <td><input type="text" id="options" placeholder="option1,option2" class="form-control"></td>
                                    <td><select class="form-control" id="require"><option value="1">Required</option><option value="2">Non Required</option></select></td>
                                    <td><input type="text" class="form-control" id="marks" placeholder="5,2"></td>
                                    <td><input type="text" class="form-control" id="extra" placeholder=""></td>
                                    <td><button type="button" onclick="addForms();" data-toggle="tooltip" title="Add Form" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                                        </td>
                                </tr></tfoot>
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
     $(document).on('change', '.level_id', function(){
        var id = $(this).attr('id');
        var data = $(this).val();
        var token = $('input[name=\'_token\']').val();
        if (data != '') {
            $.ajax({
        type: 'POST',
        url: '<?php echo e(url("/branchadmin/getfaculty")); ?>',
        data: 'id='+data+'&_token='+token,
        cache: false,
        success: function(data){
            // $('#faculty'+id).html(html);
            $.each(data, function(index, value){
                $('#faculty'+id).append($('<option>',{value:value.id}).text(value.name));
            });
        }
    });
        } else{
            $('#faculty'+id).html('<option value="">Select Faculty</option>');
        }
    });
    $('#title').blur(function(){
        var data = $(this).val();
        

        var se_url = data.replace(/ /g,"-");
       
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
  $('#publish_date').datepicker();
});


</script>

<script type="text/javascript">
    var job_edu_row = '<?php echo e($education_row + 1); ?>';
    function addEducation()
    {
        html = '<tr id="job-education-row-'+job_edu_row+'">';
        html += '<td ><select name="job_education['+job_edu_row+'][education_level]" id="'+job_edu_row+'" class="form-control select2 level_id"  ><option value="">Select Level</option><?php foreach($datas["education_level"] as $education_level): ?> <option value="<?php echo e($education_level->id); ?>"><?php echo e($education_level->name); ?> </option><?php endforeach; ?> </select></td>';
        html += '<td><select name="job_education['+job_edu_row+'][faculty]" id="faculty'+job_edu_row+'" class="form-control select2"><option value="">Select Faculty</option></select></td>';
        html += '<td><input name="job_education['+job_edu_row+'][experience]" class="form-control" type="text"></td>';
        html += '<td><select class="form-control" name="job_education['+job_edu_row+'][exp_format]"><option value="Year">Year</option><option value="Month">Month</option></select></td>';
         html += ' <td><input name="job_education['+job_edu_row+'][percent]" class="form-control" type="text"></td>';
        html += '<td><input name="job_education['+job_edu_row+'][cgpa]" class="form-control" type="text"></td>';
        html += '<td><input name="job_education['+job_edu_row+'][others]" class="form-control" type="text"></td>'; 
        html += '<td><button type="button" onclick="$(\'#job-education-row-'+job_edu_row+'\').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td></tr>';
        $('#job_education').append(html);
        job_edu_row++;
    };
</script>

<script type="text/javascript">

var exp_row = '<?php echo e($experience_row + 1); ?>';
function addExperience()
{
    html = '<tr id="job-experience-row-'+exp_row+'">';
    html += '<td><select name="job_experience['+exp_row+'][exp_id]" class="form-control select2"  ><option value="">Select Experience</option><?php foreach($datas["experiences"] as $experience): ?><option value="<?php echo e($experience->id); ?>"><?php echo e($experience->name); ?> </option><?php endforeach; ?></select></td>';
    html += '<td><input name="job_experience['+exp_row+'][experience]" class="form-control" value="" type="text"></td>';
    html += '<td><select class="form-control" name="job_experience['+exp_row+'][exp_format]"><option value="Year">Year</option><option value="Month">Month</option></select></td>';
    html += '<td><button type="button" onclick="$(\'#job-experience-row-'+exp_row+'\').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td></tr>';
    $('#job_experience').append(html);
    exp_row++;
}

</script>
<script type="text/javascript">
$(document).delegate('button[data-toggle=\'image\']', 'click', function() {
    $('#modal-image').remove();

    $(this).parents('.note-editor').find('.note-editable').focus();

    $.ajax({
      url: '<?php echo e(url('/branchadmin/filemanager')); ?>',
      dataType: 'html',
      beforeSend: function() {
        $('#button-image i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
        $('#button-image').prop('disabled', true);
      },
      complete: function() {
        $('#button-image i').replaceWith('<i class="fa fa-upload"></i>');
        $('#button-image').prop('disabled', false);
      },
      success: function(html) {
        $('body').append('<div id="modal-image" class="modal">' + html + '</div>');

        $('#modal-image').modal('show');
      }
    });
  });
  // Image Manager
  $(document).delegate('a[data-toggle=\'image\']', 'click', function(e) {
    e.preventDefault();

    $('.popover').popover('hide', function() {
      $('.popover').remove();
    });

    var element = this;

    $(element).popover({
      html: true,
      placement: 'right',
      trigger: 'manual',
      content: function() {
        return '<button type="button" id="button-image" class="btn btn-primary"><i class="fa fa-pencil"></i></button> <button type="button" id="button-clear" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>';
      }
    });

    $(element).popover('show');

    $('#button-image').on('click', function() {
      $('#modal-image').remove();

      $.ajax({
        url: '<?php echo e(url('/branchadmin/filemanager')); ?>' + '?target=' + $(element).parent().find('input').attr('id') + '&thumb=' + $(element).attr('id'),
        dataType: 'html',
        beforeSend: function() {
          $('#button-image i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
          $('#button-image').prop('disabled', true);
        },
        complete: function() {
          $('#button-image i').replaceWith('<i class="fa fa-pencil"></i>');
          $('#button-image').prop('disabled', false);
        },
        success: function(html) {
          $('body').append('<div id="modal-image" class="modal" style="display: block; padding-right: 17px;" >' + html + '</div>');

          $('#modal-image').modal('show');
        }
      });

      $(element).popover('hide', function() {
        $('.popover').remove();
      });
    });

    $('#button-clear').on('click', function() {
      $(element).find('img').attr('src', $(element).find('img').attr('data-placeholder'));

      $(element).parent().find('input').attr('value', '');

      $(element).popover('hide', function() {
        $('.popover').remove();
      });
    });
  });

</script>
<script type="text/javascript">
    $('.remove').click(function(){
  var token = $('input[name=\'_token\']').val();
  var file_name = $('#file_name').val();

  $.ajax({
            type: "POST",
            url: "<?php echo e(url('admin/article/removeFile')); ?> ",
            data: 'file='+file_name+'&_token='+token,
            success: function(data){
        
        if(data == 'Success'){
          $('.pdf_thumb').remove();
          $('#file_name').val('');
          
        }else if(data == 'File Not Found'){

           $('#error_message').remove();
          $('.pdf_thumb').append('<div id="error_message" class="alert alert-danger"><h4>'+data+'</h4></div>');
          $('#file_name').val('');
        } else{
          
           $('#error_message').remove();
          $('.pdf_thumb').append('<div id="error_message" class="alert alert-danger"><h4>'+data+'</h4></div>');
          
        }
        
            }
        });
  

});
</script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
<script type="text/javascript">
    $(document).on('click', '.parent', function(){
        $(this).autocomplete({
          source: '<?php echo e(url("branchadmin/jobs/autoJobs/?jobs_id=".$datas["jobs"]->id)); ?>',
          minlength:1,
          autoFocus:true,
          select:function(e,ui){
            $('#parent_id').val(ui.item.id);
            $('#parent').val('');
          }
      });
});
</script>

<script type="text/javascript">
    function addForms(){
        var job_id = $('#job_id').val();
        var job_form_row = '<?php echo e($i); ?>';
        var pid = $('#parent_id').val();
        var label = $('#label').val();
        var types = $('#types').val();
        var options = $('#options').val();
        var require = $('#require').val();
        var marks = $('#marks').val();
        var extra = $('#extra').val();
        var token = $('input[name=\'_token\']').val();

        if (label != '' && types != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo e(url("/branchadmin/jobs/addJobFormData")); ?>',
                data: 'pid='+pid+'&_token='+token+'&label='+encodeURIComponent(label)+'&types='+types+'&options='+encodeURIComponent(options)+'&require='+require+'&marks='+marks+'&extra='+encodeURIComponent(extra)+'&row='+job_form_row+'&job_id='+job_id,
                cache: false,
                success: function(html){
                 
                    $('#job_form').append(html);
                  
                    $('#parent_id').val('');
                    $('#label').val('');
                    $('#types').val('');
                    $('#options').val('');
                    $('#require').val('');
                    $('#marks').val('');
                    $('#extra').val('');
                }
            });
        }
        job_form_row++;
        
    }
</script>

<script type="text/javascript">
    function updateForms(rowid,id){
        var job_id = $('#job_id').val();
       
        var pid = $('#parent_id_'+rowid).val();
        var label = $('#label_'+rowid).val();
        var types = $('#types_'+rowid).val();
        var options = $('#options_'+rowid).val();
        var require = $('#require_'+rowid).val();
        var marks = $('#marks_'+rowid).val();
        var extra = $('#extra_'+rowid).val();
        var token = $('input[name=\'_token\']').val();

        if (label != '' && types != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo e(url("/branchadmin/jobs/updateJobForm")); ?>',
                data: 'pid='+pid+'&_token='+token+'&label='+encodeURIComponent(label)+'&types='+types+'&options='+encodeURIComponent(options)+'&require='+require+'&marks='+marks+'&extra='+encodeURIComponent(extra)+'&row='+rowid+'&job_id='+job_id+'&fid='+id,
                cache: false,
                success: function(html){
                 
                    $('#job_form_row_'+rowid).html(html);
                  
                   
                }
            });
        }
        
        
    }
</script>


<script type="text/javascript">
    function removeFormData(id,fid){
      
        var token = $('input[name=\'_token\']').val();

        if (id != '' && fid != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo e(url("/branchadmin/jobs/deleteJobForm")); ?>',
                data: 'id='+fid+'&_token='+token+'&row_id='+id,
                cache: false,
                success: function(html){
                    var htmls = html.split('|');
                 
                   if (htmls[0] == 'success') {
                    $('#job_form_row_'+htmls[2]).remove();
                   } else{
                        alert(htmls[1]);
                       }
                  
                
                }
            });
        }
        
        
    }
</script>
<script type="text/javascript">
    function editFormData(id,fid){
      
        var token = $('input[name=\'_token\']').val();

        if (id != '' && fid != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo e(url("/branchadmin/jobs/editJobForm")); ?>',
                data: 'id='+fid+'&_token='+token+'&row_id='+id,
                cache: false,
                success: function(html){
                    var htmls = html.split('|');
                 
                   if (htmls[0] == 'success') {
                    $('#job_form_row_'+htmls[2]).html(htmls[1]);
                   } else{
                        alert(htmls[1]);
                       }
                  
                
                }
            });

        }


        
        
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>