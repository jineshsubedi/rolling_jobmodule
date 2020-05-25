<?php $__env->startSection('heading'); ?>
New Job 
            <small>Detail of New Job</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo e(url('/branchadmin/jobs')); ?>">Jobs</a></li>
            <li class="active">New Job</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('assets/ckeditor/ckeditor.js')); ?>"></script>
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">New Job</div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" id="testform" method="POST" action="<?php echo e(url('/branchadmin/jobs/save')); ?>">
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
                                <input type="text" id="title" class="form-control" name="title" value="<?php echo e(old('title')); ?>">

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
                                <input type="text" class="form-control" id="seo_url" name="seo_url" value="<?php echo e(old('seo_url')); ?>">

                                <?php if($errors->has('seo_url')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('seo_url')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        

                        <div class="form-group<?php echo e($errors->has('branch') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label required">Branch</label>
                            <div class="col-md-10">
                                <select name="branch" id="branch" class="form-control select2" >
                                    <?php foreach($datas['branch'] as $branch){ 
                                        if(old('branch') == $branch->id) {
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
                                        if(old('job_level') == $job_level->id) {
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
                                        if(old('job_availiability') == $job_availiability['value']) {
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
                                        if(old('job_location') == $job_location->id) {
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
                                        if(old('minimum_experience') == $i) {
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
                                <?php else: ?>
                                <tr id="job-experience-row-<?php echo e($experience_row); ?>">
                                    <td>
                                     <select name="job_experience[<?php echo e($experience_row); ?>][exp_id]" class="form-control select2"  >
                                        <option value="">Select Experience</option>
                                        <?php foreach($datas['experiences'] as $experience): ?>
                                                <option value="<?php echo e($experience->id); ?>"><?php echo e($experience->name); ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                                                    
                                    </td>
                                  
                                    <td><input name="job_experience[<?php echo e($experience_row); ?>][experience]" class="form-control" value="" type="text"></td>
                                    <td><select class="form-control" name="job_experience[<?php echo e($experience_row); ?>][exp_format]">
                                    <?php foreach($datas['exp_format'] as $format): ?>
                                        
                                    <option value="<?php echo e($format['value']); ?>"><?php echo e($format['value']); ?></option>
                                   
                                    <?php endforeach; ?>
                                    </select></td>
                                    
                                    
                                    <td><button type="button" onclick="$('#job-experience-row-<?php echo e($experience_row); ?>').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                                </tr>
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
                                <?php else: ?>
                                <tr id="job-education-row-<?php echo e($education_row); ?>">
                                    <td class="<?php echo e($errors->has('education_level') ? ' has-error' : ''); ?>">
                                     <select name="job_education[<?php echo e($education_row); ?>][education_level]" id="<?php echo e($education_row); ?>" class="form-control select2 level_id"  >
                                        <option value="">Select Level</option>
                                        <?php foreach($datas['education_level'] as $education_level){ 
                                            if(old('education_level') == $education_level->id) {
                                            ?>
                                            <option selected="selected" value="<?php echo e($education_level->id); ?>"><?php echo e($education_level->name); ?> </option>
                                        <?php } else { ?>
                                                <option value="<?php echo e($education_level->id); ?>"><?php echo e($education_level->name); ?> </option>
                                        <?php }} ?>
                                    </select>
                                    <?php if($errors->has('education_level')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('education_level')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    
                                    </td>
                                    <td><select name="job_education[<?php echo e($education_row); ?>][faculty]" id="faculty<?php echo e($education_row); ?>" class="form-control select2">
                                       <option value="">Select Faculty</option>
                                    </select></td>
                                    <td><input name="job_education[<?php echo e($education_row); ?>][experience]" class="form-control" type="text"></td>
                                    <td><select class="form-control" name="job_education[<?php echo e($education_row); ?>][exp_format]"><option value="Year">Year</option><option value="Month">Month</option></select></td>
                                     <td><input name="job_education[<?php echo e($education_row); ?>][percent]" class="form-control" type="text"></td>
                                    <td><input name="job_education[<?php echo e($education_row); ?>][cgpa]" class="form-control" type="text"></td>
                                    <td><input name="job_education[<?php echo e($education_row); ?>][others]" class="form-control" type="text"></td>
                                    
                                    <td><button type="button" onclick="$('#job-education-row-<?php echo e($education_row); ?>').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                                </tr>
                                <?php endif; ?>
                                
                              
                                                            </tbody>
                            <tfoot><tr><td colspan="8"><button type="button" onclick="addEducation();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add More Education"><i class="fa fa-plus-circle"></i>Add More Education</button></td></tr></tfoot>
                        </table>
                            
                             
                            
                        </div>
                        </div>
                         <div class="form-group<?php echo e($errors->has('position') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label">Number of Position</label>
                            <div class="col-md-10">
                                <select name="position" id="position" class="form-control select2"  >
                                    <?php for ($i=0; $i < 501; $i++) { 
                                       
                                        if(old('position') == $i) {
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
                                <input type="text" id="vacancy_code" name="vacancy_code" class="form-control" value="<?php echo e(old('vacancy_code')); ?>">
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
                                <input type="text" id="deadline" name="deadline" class="form-control" value="<?php echo e(old('deadline')); ?>">
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
                                <input type="text" id="external_link" name="external_link" class="form-control" value="<?php echo e(old('external_link')); ?>">
                                
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('salary_unit') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label required">Salary Unit</label>
                            <div class="col-md-10">
                                <select name="salary_unit" id="salary_unit" class="form-control" >
                                    <?php foreach($datas['salary_unit'] as $salary_unit){ 
                                        if(old('salary_unit') == $salary_unit->id) {
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
                                <label class="checkbox-inline"> <input type="radio" id="negotiable" checked="checked" name="negotiable" value="1">Yes</label>
                                <label class="checkbox-inline"> <input type="radio" id="negotiable" name="negotiable" value="0">No</label>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label ">Salary</label>
                            <div class="col-md-10">
                                <input type="text" id="salary" name="salary" class="form-control" value="<?php echo e(old('salary')); ?>">
                                
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label ">Prefered Gender</label>
                            <div class="col-md-10">
                                <select name="gender" id="gender" class="form-control select2" >
                                    <option value="">Select Gender</option>
                                    <?php foreach($datas['gender'] as $gender){ 
                                        if(old('gender') == $gender['value']) {
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
                                       
                                        if(old('minimum_age') == $i) {
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
                                       
                                        if(old('maximum_age') == $i) {
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

                                <label class="checkbox-inline"> <input type="radio" id="apply_type"  name="apply_type" value="1">Required</label>
                                <label class="checkbox-inline"> <input type="radio" id="apply_type" checked="checked" name="apply_type" value="0">Not Required</label>
                                
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-md-2 control-label required">Job Setting</label>
                            <div class="col-md-10">

                                <label class="checkbox-inline"> <input type="radio" id="job_setting" checked="checked" name="job_setting" value="1">Online Apply</label>
                                <label class="checkbox-inline"> <input type="radio" id="job_setting"  name="job_setting" value="2">Email Apply</label>
                                <label class="checkbox-inline"> <input type="radio" id="job_setting"  name="job_setting" value="3">Post Apply</label>
                                <label class="checkbox-inline"> <input type="radio" id="job_setting"  name="job_setting" value="4">Online & Email Apply</label>
                                
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-2 control-label ">E-mails</label>
                            <div class="col-md-10">
                               <input type="text" name="emails" class="form-control" placeholder="info@yourdomain.com,ceo@yourdomain.com" value="<?php echo e(old('emails')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label required">Status</label>
                            <div class="col-md-10">
                                <select name="status" id="status" class="form-control" >
                                    <?php foreach($datas['status'] as $status): ?>
                                    <option value="<?php echo e($status['value']); ?>"><?php echo e($status['title']); ?></option>
                                    <?php endforeach; ?>
                                    </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label required">Process Status</label>
                            <div class="col-md-10">
                                <select name="process_status" id="process_status" class="form-control" >
                                    <?php foreach($datas['process_status'] as $process_status): ?>
                                    <option value="<?php echo e($process_status->id); ?>"><?php echo e($process_status->title); ?></option>
                                    <?php endforeach; ?>
                                    </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label ">Job Publish Date</label>
                            <div class="col-md-10">
                                <input type="text" id="publish_date" name="publish_date" class="form-control" value="<?php echo e(old('publish_date')); ?>">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-2 control-label ">Line Manager/Reports To</label>
                            <div class="col-md-10">
                                <input type="text" name="line_manager" class="form-control" value="<?php echo e(old('line_manager')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label ">Assignment Handled By</label>
                            <div class="col-md-10">
                                <input type="text" name="assingment_handler" class="form-control" value="<?php echo e(old('assingment_handler')); ?>">
                            </div>
                        </div>
                        <div class="form-group <?php echo e($errors->has('file') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label ">File</label>
                            <div class="col-md-10">
                                <input type="file" name="file" class="form-control" value="<?php echo e(old('file')); ?>">
                                <span style="color: RED; font-size: 10px;">Only pdf,doc,docx file format is accepted</span>
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
                                <input type="text" name="advertise_detail" class="form-control" value="<?php echo e(old('advertise_detail')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label ">Advertise Link</label>
                            <div class="col-md-10">
                                <input type="text" name="advertise_link" class="form-control" value="<?php echo e(old('advertise_link')); ?>">
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-md-2 control-label">Advertise Image</label>

                            <div class="col-md-10">
                            <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="<?php echo e(asset($datas['image'])); ?>" alt="" title="" data-placeholder="<?php echo e(asset($datas['image'])); ?>" /></a>
                  <input type="hidden" name="image" value="" id="input-image" />

                               
                            </div>
                        </div>

                       <div class="form-group">
                            <label class="col-md-2 control-label ">Sort Order</label>
                            <div class="col-md-10">
                                <input type="text" name="sort_order" class="form-control" value="<?php echo e(old('sort_order')); ?>">
                            </div>
                        </div>




</div>

                    <div class="tab-pane" id="tab-data">
                         <div class="form-group">
                            <label class="col-md-2 control-label">Description</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="description" name="description"><?php echo e(old('description')); ?></textarea>

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
                               <textarea class="form-control" id="specification" name="specification"><?php echo e(old('specification')); ?></textarea>

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
                               <textarea class="form-control" id="education_description" name="education_description"><?php echo e(old('education_description')); ?></textarea>

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
                               <textarea class="form-control" id="specific_requirement" name="specific_requirement"><?php echo e(old('specific_requirement')); ?></textarea>

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
                               <textarea class="form-control" id="specific_instruction" name="specific_instruction"><span style="color:#0033cc"><strong>&ldquo;Protocols for the confidentiality&rdquo;</strong></span> is designed to collect and maintain identifiable information about applicants. Data will be collected anonymously by the specified person and will be removed and destroyed as soon as possible by the completion of this specific assignment. No access to any other organizations/ person and shall be based on a &ldquo;need to know&rdquo; and &quot;minimum necessary&quot; standard.<br />
<br />
<span style="color:#FF0000"><strong>CONFIDENTIALITY PROTOCOL&mdash; PROTECTION OF INFORMATION OF APPLICANTS</strong></span><br />
<br />
<strong>STRICTLY CONFIDENTIAL</strong><br />
<br />
Information, applications and documents that are deemed to be of a highly sensitive nature or to be inadequately protected by the CONFI&not;DENTIAL classification shall be classified as STRICTLY CONFIDENTIAL and access to them shall be restricted solely to persons with a specific need for specific assignment only.<br />
<br />
The staffs of the Rolling Plans including client institution shall establish a control and tracking system for documents classified as STRICTLY CONFIDENTIAL, including the maintenance of control logs. Documents classified as STRICTLY CONFIDENTIAL shall be (i) maintained by only specific staff with written commitment; (ii) kept under security key or given equivalent protection when not in use; and (iii) in the case of physical documents, transmitted by an inner envelope indicating the classification marking and an outer envelope indicating no classification, or, in the case of documents in electronic form, transmitted by encrypted or password-secured system.<br />
<br />
For purposes of this protocol, the following individuals are deemed to have a specific need to know: (i) the executive consultant; (ii) the project manager/recruitment and selection consultant; (iii) the international consultant of Rolling Plans and; (v) the respective designated representatives of Government of Nepal.<br />
<br />
Confidentiality pertains to the treatment of information that an individual has disclosed in any documents/files of trust and with the expectation that it will not be divulged to others/ process without permission in ways that are inconsistent with the understanding of the original disclosure. Rolling Plans assure that the information shall be used for specific purpose published in this system and service only.<br />
<br />
When it is necessary to collect and maintain identifiable data, Rolling Plans will ensure that the protocol includes the necessary safeguards to maintain confidentiality of identifiable data and data security appropriate to the degree of risk from disclosure.</textarea>

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
                            <div class=" col-md-3">
                               
                                <div class="form-check">
                                    <input type="checkbox" checked="checked" class="form-check-input" name="form_fields[]" value="<?php echo e($fields['value']); ?>" >
                                    <label class="form-check-label" ><?php echo e($fields['title']); ?></label>
                                </div>
                               
                            </div>
                            <?php endforeach; ?>
                            <div class=" col-md-3">
                               
                               <label class="form-check-label" >Location Title</label>
                                    <input type="text" class="form-control" name="location_title" value="<?php echo e(old('location_title')); ?>" >
                                    
                                
                               
                            </div>

                        </div>

                        <div class="box box-default box-solid">
                            <div class="box-header with-border">
                          <h3 class="box-title">Education Levels</h3>

                         
                          <!-- /.box-tools -->
                        </div></div>
                        <div class="form-group">
                            <div class=" col-md-3">
                               
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="manual_education" value="1" >
                                    <label class="form-check-label" >Manual Entry</label>
                                </div>
                               
                            </div>
                            <?php foreach($datas['education_level'] as $elevels): ?>
                            <div class=" col-md-3">
                               
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="education_levels[]" value="<?php echo e($elevels->id); ?>" >
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
                             <input type="text" name="edu_marks" class="form-control">
                               
                            </div>

                        </div>


                            <div class="col-md-6">
                         <label class="col-md-6 control-label">Experience Marks</label>
                            <div class=" col-md-6">
                             <input type="text" name="exp_marks" class="form-control">
                               
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
                                <th></th>
                            </thead>
                            <tbody id="job_form">
                                <?php $i = 0; ?>
                                <?php if(count($datas['forms']) > 0): ?>
                                <?php foreach($datas['forms'] as $forms): ?>
                               <tr id="job_form_row_<?php echo e($i); ?>"><td><?php echo e(\App\TemporaryJobForm::getTitle($forms->parent_id)); ?></td><td><?php echo e($forms->f_lable); ?></td><td><?php echo e($forms->f_type); ?></td><td><?php echo e($forms->list_menu); ?></td><td><?php echo e($forms->requ == 1 ? 'Required' : 'Not Required'); ?></td><td><?php echo e($forms->marks); ?></td><td><?php echo e($forms->extra); ?></td><td><button type="button" onclick="removeForm('<?php echo e($i); ?>','<?php echo e($forms->id); ?>');" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td></tr>
                               <?php $i++; ?>
                                <?php endforeach; ?>
                                <?php endif; ?>

                            </tbody>
                            <tfoot>
                                 <tr>
                                    <td><input type="hidden" id="parent_id" class="form-control" value=""><input type="text" id="parent" class="form-control" value=""></td>
                                    <td><input type="text" id="label" class="form-control"></td>
                                    <td><select class="form-control" id="types"><?php foreach($datas["form_type"] as $types): ?> <option value="<?php echo e($types["value"]); ?>"><?php echo e($types["value"]); ?></option> <?php endforeach; ?></select></td>
                                    <td><input type="text" id="options" placeholder="option1,option2" class="form-control"></td>
                                    <td><select class="form-control" id="require"><option value="1">Required</option><option value="2">Non Required</option></select></td>
                                    <td><input type="text" class="form-control" id="marks" placeholder="5,2"></td>
                                    <td><input type="text" class="form-control" id="extra" placeholder=""></td>
                                    <td><button type="button" onclick="addForms();" data-toggle="tooltip" title="Add Form" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                                        </td>
                                </tr>
                               </tfoot>
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
<?php $today = date('y'); ?>
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
            $.each(data, function(index, value){
                $('#faculty'+id).append($('<option>',{value:value.id}).text(value.name));
            });
            // $('#faculty'+id).append(html);
        }
    });
        } else{
            $('#faculty'+id).html('<option value="">Select Faculty</option>');
        }
    });
    $('#title').blur(function(){
        var data = $(this).val();
        var today = '<?php echo e($today); ?>';
        var fleter = data.match(/\b\w/g).join('');

        var se_url = data.replace(/ /g,"-");
        $('#vacancy_code').val(fleter+'-<?php echo e($datas["vcode"]); ?>-'+today);
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
     var job_form_row = 1;
    function addJobForms()
    {
       
        html = '<tr id="job_form-row-'+job_form_row+'">';
        html += '<td><input type="text" name="job_form['+job_form_row+'][label]" class="form-control"></td>';
        html += '<td><select class="form-control" name="job_form['+job_form_row+'][types]"><?php foreach($datas["form_type"] as $types): ?> <option value="<?php echo e($types["value"]); ?>"><?php echo e($types["value"]); ?></option> <?php endforeach; ?></select></td>';
        html += '<td><input type="text" name="job_form['+job_form_row+'][options]" placeholder="option1,option2" class="form-control"></td>';
        html += '<td><select class="form-control" name="job_form['+job_form_row+'][require]"><option value="1">Required</option><option value="2">Non Required</option></select></td>';
        html += '<td><input type="text" name="job_form['+job_form_row+'][marks]" placeholder="5,4,3,2,1" class="form-control"></td>'
        html+= '<td><input type="text" name="job_form[0][extra]" placeholder="Enter Option Value" class="form-control"></td>'
        html+= '<td><select class="form-control" name="job_form[0][extratypes]"><?php foreach($datas["form_type"] as $types): ?> <option value="<?php echo e($types["value"]); ?>"><?php echo e($types["value"]); ?></option> <?php endforeach; ?></select></td>'
        html += '<td><button type="button" onclick="$(\'#job_form-row-'+job_form_row+'\').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td></tr>';
        $('#job_form').append(html);

  job_form_row++;
    };


    
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
    $('#parent').autocomplete({
        source: '<?php echo e(url('branchadmin/jobs/autocompleteJobs/')); ?>',
        minlength:1,
        autoFocus:true,
        select:function(e,ui){
            console.log(ui.item)
            $('#parent_id').val(ui.item.id);
            $('#parent').val('');
        }
});
</script>

<script type="text/javascript">
    function addForms(){
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
                url: '<?php echo e(url("/branchadmin/jobs/addJobForm")); ?>',
                data: 'pid='+pid+'&_token='+token+'&label='+label+'&types='+types+'&options='+options+'&require='+require+'&marks='+marks+'&extra='+extra+'&row='+job_form_row,
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
    function removeForm(id,fid){
      
        var token = $('input[name=\'_token\']').val();

        if (id != '' && fid != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo e(url("/branchadmin/jobs/deleteTempJobForm")); ?>',
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>