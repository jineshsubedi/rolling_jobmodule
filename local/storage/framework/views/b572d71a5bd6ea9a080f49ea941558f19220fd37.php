<?php $__env->startSection('heading'); ?>
Staff
<small>Detail of Staff</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo e(url('/branchadmin/otstaff')); ?>">Staffs</a></li>
<li class="active">New Staffs</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(count($errors)): ?>
                <div class="row">
            <div class="col-xs-12">
            <div class="alert alert-danger">
             <?php foreach($errors->all() as $error): ?>
              <?php echo e('* : '.$error); ?></br>
             <?php endforeach; ?>
                </div>
            </div>
          </div>
       <?php endif; ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="panel panel-default">
        <div class="panel-heading">New Staffs</div>
        <div class="panel-body">
          <form method="POST" action="<?php echo e(url('/branchadmin/otstaff/save')); ?>" class="form-horizontal" enctype="multipart/form-data">
                     <?php echo csrf_field(); ?>

                     <input type="hidden" id="geo_location" name="geo_location" value="">
                <div class="row ">
                    <div class="col-md-6 col-sm-6">
                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                                <div class="box-title blueclr">
                                    <i class="fa fa-user"></i> Personal Details
                                </div>
                            </div>
                            <div class="portlet-body p-10">
                                <div class="form-body">
                                    
                                    <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label required">Name </label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="name" placeholder="Employee Name" value="<?php echo e(old('name')); ?>" type="text">
                                            <?php if($errors->has('name')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('f_name') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Parents Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="f_name" placeholder="Parent's Name" type="text" value="<?php echo e(old('f_name')); ?>">
                                             <?php if($errors->has('f_name')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('f_name')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
                                        <label class="control-label col-md-3">Date of Birth</label>
                                        <div class="col-md-9">
                                            
                                                <input class="form-control datepicker" name="dob" value="<?php echo e(old('dob')); ?>" type="text">
                                                 <?php if($errors->has('dob')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('dob')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                                
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('personal_email') ? ' has-error' : ''); ?>">
                                        <label class="control-label col-md-3">Personal E-mail</label>
                                        <div class="col-md-9">
                                            
                                                <input class="form-control" name="personal_email" value="<?php echo e(old('personal_email')); ?>" type="text">
                                                 <?php if($errors->has('personal_email')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('personal_email')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                                
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('citizenship_number') ? ' has-error' : ''); ?>">
                                        <label class="control-label col-md-3">Citizenship Number</label>
                                        <div class="col-md-9">
                                            
                                                <input class="form-control" name="citizenship_number" value="<?php echo e(old('citizenship_number')); ?>" type="text">
                                                 <?php if($errors->has('citizenship_number')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('citizenship_number')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                                
                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->has('emergency_contact_number') ? ' has-error' : ''); ?>">
                                        <label class="control-label col-md-3">Emergency Contact Number</label>
                                        <div class="col-md-9">
                                            
                                                <input class="form-control" name="emergency_contact_number" value="<?php echo e(old('emergency_contact_number')); ?>" type="text">
                                                 <?php if($errors->has('emergency_contact_number')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('emergency_contact_number')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                                
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('blood_group') ? ' has-error' : ''); ?>">
                                        <label class="control-label col-md-3">Blood Group</label>
                                        <div class="col-md-9">
                                            
                                                <input class="form-control" name="blood_group" value="<?php echo e(old('blood_group')); ?>" type="text">
                                                 <?php if($errors->has('blood_group')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('blood_group')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                                
                                        </div>
                                    </div>


                                    <div class="form-group <?php echo e($errors->has('education_level') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Education Qualification</label>
                                        <div class="col-md-7">
                                            <select class="form-control" id="education_level" name="education_level">
                                              <option value="">Select Education level</option>
                                              <?php foreach($datas['education_level'] as $education_level): ?>
                                                <?php if($education_level->id == old('education_level')): ?>
                                                <option selected="selected" value="<?php echo e($education_level->id); ?>"><?php echo e($education_level->name); ?></option>
                                                <?php else: ?>
                                                 <option value="<?php echo e($education_level->id); ?>"><?php echo e($education_level->name); ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('education_level')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('education_level')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-primary" onclick="openEducationModel()"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('faculty') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Faculty</label>
                                        <div class="col-md-7">
                                            <select class="form-control" name="faculty" id="faculty">

                                            </select>
                                             <?php if($errors->has('faculty')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('faculty')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-primary" onclick="openFacultyModel()"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('institute') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Institute</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="institute" value="<?php echo e(old('institute')); ?>">
                                            <?php if($errors->has('institute')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('institute')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('university') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">University/Board</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="university" value="<?php echo e(old('university')); ?>">
                                            <?php if($errors->has('university')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('university')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('education_year') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Completed Year</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="education_year" value="<?php echo e(old('education_year')); ?>">
                                            <?php if($errors->has('education_year')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('education_year')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Gender</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="gender">
                                              <?php foreach($datas['gender'] as $gender): ?>
                                                <?php if($gender['value'] == old('gender')): ?>
                                                <option selected="selected" value="<?php echo e($gender['value']); ?>"><?php echo e($gender['Title']); ?></option>
                                                <?php else: ?>
                                                 <option value="<?php echo e($gender['value']); ?>"><?php echo e($gender['Title']); ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('gender')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('gender')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('marital_status') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Marital Status</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="marital_status">
                                              <?php foreach($datas['marital_status'] as $marital_status): ?>
                                                <?php if($marital_status['value'] == old('marital_status')): ?>
                                                <option selected="selected" value="<?php echo e($marital_status['value']); ?>"><?php echo e($marital_status['Title']); ?></option>
                                                <?php else: ?>
                                                 <option value="<?php echo e($marital_status['value']); ?>"><?php echo e($marital_status['Title']); ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('marital_status')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('marital_status')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Phone</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="phone" placeholder="Contact Number" value="<?php echo e(old('dob')); ?>" type="text">
                                             <?php if($errors->has('phone')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('phone')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('contact_person') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Immediate Contact Person</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="contact_person" id="contact_person" value="<?php echo e(old('contact_person')); ?>">
                                             <?php if($errors->has('contact_person')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('contact_person')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('contact_person_number') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Contact Person Phone</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="contact_person_number" id="contact_person_number" value="<?php echo e(old('contact_person_number')); ?>">
                                             <?php if($errors->has('contact_person_number')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('contact_person_number')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('home_location') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Home Location</label>
                                        <div class="col-md-9">
                                            <button type="button" class="btn btn-default" id="btn-location"><i class="fa fa-map-marker"></i> Get Location</button>
                                            <div class="col-md-9 modal_body_map" id="body_map" style="display:none;">
                                              <div class="location-map" id="location-map">
                                                <div style="width: 100%; height: 200px;" id="map_canvas"></div>
                                              </div>
                                            </div>
                                            <input type="hidden" name="home_location" id="home_location" value="<?php echo e(old('home_location')); ?>">
                                             <?php if($errors->has('home_location')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('home_location')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('temporary_address') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Local Address</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="temporary_address" id="temporary_address"><?php echo e(old('temporary_address')); ?></textarea>
                                             <?php if($errors->has('temporary_address')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('temporary_address')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('permanent_address') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Permanent Address</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6">
                                                    <label class="col-md-5 control-label">District</label>
                                                    <div class="col-md-7">
                                                    <select class="form-control" name="district">
                                                         
                                                        <?php foreach($datas['district'] as $district): ?>
                                                        <?php if(old('district') == $district['value']): ?>
                                                        <option selected="selected" value="<?php echo e($district['value']); ?>"><?php echo e($district['value']); ?></option>
                                                        <?php else: ?>
                                                         <option value="<?php echo e($district['value']); ?>"><?php echo e($district['value']); ?></option>
                                                        <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                            <textarea class="form-control" name="permanent_address" id="permanent_address"><?php echo e(old('permanent_address')); ?></textarea>
                                            </div>
                                             <?php if($errors->has('permanent_address')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('permanent_address')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <h4><strong>Account Login</strong></h4>
                                    <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label required">Email</label>
                                        <div class="col-md-9">
                                            <input name="email" class="form-control" value="<?php echo e(old('email')); ?>" type="text">
                                             <?php if($errors->has('email')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label required">Password</label>
                                        <div class="col-md-9">
                                           
                                            <input name="password" class="form-control" value="" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label required">Confirm Password</label>
                                        <div class="col-md-9">
                                           
                                            <input name="password_confirmation" class="form-control" value="" type="password">
                                             <?php if($errors->has('password')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group <?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label required">Status</label>
                                        <div class="col-md-9">
                                           
                                            <select class="form-control" id="status" name="status">
                                                <?php foreach($datas['status'] as $status): ?>
                                                <?php if($status['value'] == old('status')): ?>
                                                <option value="<?php echo e($status['value']); ?>" selected="selected"><?php echo e($status['Title']); ?></option>
                                                <?php else: ?>
                                                <option value="<?php echo e($status['value']); ?>"><?php echo e($status['Title']); ?></option>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('status')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('status')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if(old('status') != '1'){
                                        $style = 'style=display:none';
                                    } else{
                                        $style = '';
                                    } ?>
                                     <div class="form-group resign" <?php echo e($style); ?>>
                                        <label class="col-md-3 control-label required">Date</label>
                                        <div class="col-md-9">
                                           
                                           <input type="text" class="form-control datepicker" name="resign_date" value="<?php echo e(old('resign_date')); ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group resign" <?php echo e($style); ?>>
                                        <label class="col-md-3 control-label required">Reason</label>
                                        <div class="col-md-9">
                                           
                                           <textarea class="form-control" name="resign_reason"><?php echo e(old('resign_reason')); ?></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="box box-warning box-solid">
                          <div class="box-header with-border">
                                <div class="box-title">
                                    <i class="fa fa-list-alt"></i> Company Details
                                </div>
                            </div>
                            
                            <div class="portlet-body p-10">
                                <div class="form-body">
                                    <div class="form-group <?php echo e($errors->has('supervisor') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Supervisor</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="supervisor">
                                                <option value="0">Select Supervisor</option>
                                                <?php foreach($datas['staffs'] as $staff): ?>
                                                    <?php if(old('supervisor') == $staff->id): ?>
                                                    <option selected="selected" value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                                                    <?php else: ?>
                                                    <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('supervisor')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('supervisor')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                     <div class="form-group <?php echo e($errors->has('weekend') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Weekend</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="weekend">
                                               
                                                <?php foreach($datas['days'] as $days): ?>
                                                    <?php if(old('weekend') == $days): ?>
                                                    <option selected="selected" value="<?php echo e($days); ?>"><?php echo e($days); ?></option>
                                                    <?php else: ?>
                                                    <option value="<?php echo e($days); ?>"><?php echo e($days); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('weekend')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('weekend')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('device_id') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Device ID</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="device_id" placeholder="Device ID" value="<?php echo e(old('device_id')); ?>" type="text">
                                             <?php if($errors->has('device_id')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('device_id')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                   
                                    <div class="form-group <?php echo e($errors->has('staffType') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Staff Type</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="staffType">
                                              <?php foreach($datas['staffType'] as $staffType): ?>
                                                <?php if($staffType['value'] == old('staffType')): ?>
                                                <option selected="selected" value="<?php echo e($staffType['value']); ?>"><?php echo e($staffType['Title']); ?></option>
                                                <?php else: ?>
                                                 <option value="<?php echo e($staffType['value']); ?>"><?php echo e($staffType['Title']); ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('staffType')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('staffType')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->has('employee_id') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Employee ID</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="employee_id" placeholder="RPPL-0001" value="<?php echo e(old('employee_id')); ?>">
                                             <?php if($errors->has('employee_id')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('employee_id')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?php if(auth()->guard('staffs')->user()->branch == 2 && auth()->guard('staffs')->user()->department == 4): ?>
                                    <div class="form-group <?php echo e($errors->has('branch') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Branch</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="branch">
                                            <option value="">Select Branch</option>
                                              <?php foreach($datas['branch'] as $branch): ?>
                                                <?php if($branch->id == old('branch')): ?>
                                                <option selected value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                                                <?php else: ?>
                                                 <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('branch')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('branch')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <input type="hidden" name="branch" value="<?php echo e(auth()->guard('staffs')->user()->branch); ?>">
                                    <?php endif; ?>

                                    

                                    <div class="form-group <?php echo e($errors->has('department') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Department</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="department" name="department">
                                              <option value="">Select Department</option>
                                                <?php foreach($datas['departments'] as $department): ?>
                                                  <?php if($department->id == old('department')): ?>
                                                  <option selected="selected" value="<?php echo e($department->id); ?>"><?php echo e($department->title); ?></option>
                                                  <?php else: ?>
                                                  <option value="<?php echo e($department->id); ?>"><?php echo e($department->title); ?></option>
                                                  <?php endif; ?>
                                                  <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('department')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('department')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->has('designation') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Designation</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="designation" id="designation">

                                            </select>
                                             <?php if($errors->has('designation')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('designation')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->has('shifttime') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Shifttime</label>
                                        <div class="col-md-7">
                                            <select class="form-control" id="shifttime" name="shifttime">
                                              <option value="">Select shifttime</option>
                                                <?php foreach($datas['shifttime'] as $shifttime): ?>
                                                  <?php if($shifttime->id == old('shifttime')): ?>
                                                  <option selected="selected" value="<?php echo e($shifttime->id); ?>"><?php echo e($shifttime->title.' ('.$shifttime->from.'-'.$shifttime->to.')'); ?></option>
                                                  <?php else: ?>
                                                  <option value="<?php echo e($shifttime->id); ?>"><?php echo e($shifttime->title.' ('.$shifttime->from.'-'.$shifttime->to.')'); ?></option>
                                                  <?php endif; ?>
                                                  <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('shifttime')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('shifttime')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                            
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-primary" onclick="openShiftModel()"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group <?php echo e($errors->has('employmentType') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Work Mode</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="employmentType" id="work_mode">
                                              <?php foreach($datas['employmentType'] as $employmentType): ?>
                                                <?php if($employmentType['value'] == old('employmentType')): ?>
                                                <option selected="selected" value="<?php echo e($employmentType['value']); ?>"><?php echo e($employmentType['Title']); ?></option>
                                                <?php else: ?>
                                                 <option value="<?php echo e($employmentType['value']); ?>"><?php echo e($employmentType['Title']); ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('employmentType')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('employmentType')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group <?php echo e($errors->has('salaryType') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Salary Type</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="salaryType" id="work_mode">
                                              <?php foreach($datas['salaryType'] as $salaryType): ?>
                                                <?php if($salaryType['value'] == old('salaryType')): ?>
                                                <option selected="selected" value="<?php echo e($salaryType['value']); ?>"><?php echo e($salaryType['Title']); ?></option>
                                                <?php else: ?>
                                                 <option value="<?php echo e($salaryType['value']); ?>"><?php echo e($salaryType['Title']); ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('salaryType')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('salaryType')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                     <div class="form-group <?php echo e($errors->has('business_department') ? ' has-error' : ''); ?>">
                                        <label class="control-label col-md-3">Business Department</label>
                                        <div class="col-md-9">
                                            
                                                <select class="form-control" name="business_department">
                                                    <option value="">Select Department</option>
                                                    <?php foreach($datas['department'] as $department): ?>
                                                    <?php if($department['value'] ==  old('business_department')): ?>
                                                    <option value="<?php echo e($department['value']); ?>" selected="selected"><?php echo e($department['value']); ?></option>
                                                    <?php else: ?>
                                                    <option value="<?php echo e($department['value']); ?>"><?php echo e($department['value']); ?></option>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                 <?php if($errors->has('business_department')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('business_department')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                                
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('joindate') ? ' has-error' : ''); ?>">
                                        <label class="control-label col-md-3">Date of Joining</label>
                                        <div class="col-md-3">
                                                <input class="form-control datepicker" id="joindate" name="joindate" onblur="getDate()" placeholder="2018-01-25" id="join_date" value="<?php echo e(old('joindate')); ?>" type="text" autocomplete="off">
                                               
                                             <?php if($errors->has('joindate')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('joindate')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-6" id="tenure"></div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('probation_end_date') ? ' has-error' : ''); ?>">
                                        <label class="control-label col-md-3">Probation End Date</label>
                                        <div class="col-md-9">
                                            <input class="form-control datepicker" id="probation_end_date" name="probation_end_date" value="<?php echo e(old('probation_end_date')); ?>" type="text" autocomplete="off">
                                               
                                             <?php if($errors->has('probation_end_date')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('probation_end_date')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('salary') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Joining Salary</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="salary" id="salary" placeholder="Current Salary" value="<?php echo e(old('salary')); ?>" type="text">
                                             <?php if($errors->has('salary')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('salary')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('bank_name') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Bank Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="bank_name" placeholder="Current bank_name" value="<?php echo e(old('bank_name')); ?>" type="text">
                                             <?php if($errors->has('bank_name')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('bank_name')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('account_number') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Bank Account Number</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="account_number" placeholder="Current account_number" value="<?php echo e(old('account_number')); ?>" type="text">
                                             <?php if($errors->has('account_number')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('account_number')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('pan') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">PAN Number</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="pan" placeholder="PAN Number" value="<?php echo e(old('pan')); ?>" type="text">
                                             <?php if($errors->has('pan')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('pan')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group <?php echo e($errors->has('pf') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">PF</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="pf" placeholder="Current pf" value="<?php echo e(old('pf')); ?>" type="text">
                                             <?php if($errors->has('pf')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('pf')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('primary_location') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Primary Location</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="primary_location" placeholder="latitute,longitute" value="<?php echo e(old('primary_location')); ?>" type="text">
                                             <?php if($errors->has('primary_location')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('primary_location')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                     <div class="form-group <?php echo e($errors->has('secondary_location') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Secondary Location</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="secondary_location" placeholder="latitute,longitute" value="<?php echo e(old('secondary_location')); ?>" type="text">
                                             <?php if($errors->has('secondary_location')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('secondary_location')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('assets_taken') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Assets Taken</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="assets_taken" id="assets_taken" value="<?php echo e(old('assets_taken')); ?>">
                                             <?php if($errors->has('assets_taken')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('assets_taken')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box box-danger box-solid tp10m">
                            <div class="box-header with-border">
                                <div class="box-title">
                                    <i class="fa fa-book"></i> Documents
                                </div>
                            </div>
                            <div class="portlet-body p-10">
                                <div class="form-body" id="dynamicFileForm">
                                    <div class="form-group <?php echo e($errors->has('photo') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">photo</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="photo" value="" type="file">
                                             <?php if($errors->has('photo')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('photo')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('resume') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Resume</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="resume" value="" type="file">
                                             <?php if($errors->has('resume')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('resume')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('offer_letter') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Offer Letter</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="offer_letter" value="" type="file">
                                             <?php if($errors->has('offer_letter')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('offer_letter')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group <?php echo e($errors->has('contract') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Contract Paper</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="contract" value="" type="file">
                                             <?php if($errors->has('contract')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('contract')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div> -->
                                    <div class="form-group <?php echo e($errors->has('id_proof') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Citizenship</label>
                                        <div class="col-md-9">
                                           <input class="form-control" name="id_proof" value="" type="file">
                                            <?php if($errors->has('id_proof')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('id_proof')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-default right" onclick="addMoreDynamicFileForm()">Add More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    
                   
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                
                                <div class="col-md-10 col-md-offset-3">
                                    <button type="submit" class="btn sendbtn">
                                    Save <i class="fa fa-fw fa-paper-plane"></i>
                                    </button>
                                </div>
                
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
    $(function() {
        $('.datepicker').datepicker();
    });
</script>

<script type="text/javascript">  
    var token = $('input[name=\'_token\']').val();
    $('#education_level').on('change', function(){
      var data = $(this).val();
        if (data != '') {
            $('#faculty_education_level').val(data) 
            getFaculty(data)
        } else{
            $('#faculty').html('<option value="">Select Faculty</option>');
        }
    })
    function getFaculty(data)
    {
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("/branchadmin/getfaculty")); ?>',
            data: 'id='+data+'&_token='+token,
            cache: false,
            success: function(html){
                $('#faculty').html(html);
            },
            error: function(error){
                console.log(error)
            }
        });
    }
</script>

<script type="text/javascript">
  $('#department').on('change', function(){

        var data = $(this).val();
        var token = $('input[name=\'_token\']').val();
        if (data != '') {
            $.ajax({
        type: 'POST',
        url: '<?php echo e(url("/branchadmin/department/get_designation")); ?>',
        data: 'id='+data+'&_token='+token,
        cache: false,
        success: function(html){
            $('#designation').html(html);
           
        }
    });
        } else{
            $('#designation').html('<option value="">Select designation</option>');
        }
  })
</script>

<script type="text/javascript">
    $('#work_mode').on('change', function(){
        var id = $(this).val();
        if(id == 1){
            var salary = '14000';
        } else if(id == 2){
            var salary = '9625';
        } else{
            salary = '';
        }
        
        $('#salary').val(salary);
        
    });
</script>

<script type="text/javascript">

    function getDate(){
    today = new Date();
    
    past = $('#join_date').val();

    array_date = past.split('-');

    past_date = new Date(array_date);

    function calcDate(date1,date2) {
        var diff = Math.floor(date1.getTime() - date2.getTime());
        var day = 1000 * 60 * 60 * 24;

        var days = Math.floor(diff/day);
        var months = Math.floor(days/31);
        var years = Math.floor(months/12);

        var message = date2.toDateString();
        message += " was "
        message += days + " days " 
        message += months + " months "
        message += years + " years ago \n"

        return message
        }


        a = calcDate(today,past_date);

    }
    $('#status').on('change', function(){
        var status = $(this).val();
        if(status != '1'){
            $('.resign').fadeIn();
        } else{
           
            $('.resign').fadeOut();
        }
    });
</script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyAoqaY2Xc_0pCgZdcoODLP5Qli-coBxnSI&v=3&libraries=panoramio&language=ne&region=NP">
</script>
<script type="text/javascript">
    $(document).ready(function(){
    var x = document.getElementById("demo");

    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
    } else {
    x.innerHTML = '<div class="alert alert-danger">Geolocation is not supported by this browser.</div>';
    }


    });
    function showPosition(position) {
    $('#geo_location').val(position.coords.latitude+','+position.coords.longitude)

    }

</script>

<script type="text/javascript">
    
    var map = null;
    var myMarker;
    var myLatlng;

    function initializeGMap(lat, lng) {
        myLatlng = new google.maps.LatLng(lat, lng);

        var myOptions = {
        zoom: 16,
        zoomControl: true,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: true,
        panoramio:true
        };

        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        myMarker = new google.maps.Marker({
        position: myLatlng,
        draggable: true
        });
        
        myMarker.setMap(map);
        
        google.maps.event.addListener(myMarker, 'dragend', function (event) {
            var latit = this.getPosition().lat();
            var longt = this.getPosition().lng();
            document.getElementById("home_location").value = latit+','+longt;
            
        });
    }
</script>
<script type="text/javascript">
    $('#btn-location').on('click', function(){
        var glocation = $('#geo_location').val();
            if(glocation != '')
            {
            
                $('#home_location').val(glocation);
                var data = glocation.split(',');
                //initialize(new google.maps.LatLng(data[0], data[1]));
                initializeGMap(data[0], data[1]);
                    $('#body_map').fadeIn();
                    
                    
            } else{
                alert('Please allow the location.');
            }
    })
</script>

<div class="modal fade bd-example-modal-lg" id="education-modal-add-level">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Education Level</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="testform" method="POST">
                    <?php echo csrf_field(); ?>

                    <div id="education_level_form">
                       <div class="row" id="educationlevel1">
                        <div class="col-md-6">
                            <div class="form-group"><label class="col-md-6 control-label">Level Title</label>
                                <div class="col-md-6"><input type="text" class="form-control" name="title[]"></div>
                            </div>
                        </div>
                        <div class="col-md-2"><button type="button" class="btn btn-danger margin-top-10 delete_desc"
                                onclick="removeEduLevelForm(1)"><i class="fa fa-times"></i></button></div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right margin-top-10">
                            <button type="button" class="btn btn-sm grey-mint pullri" onclick="addEduLevelForm()">Add
                                More Level</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-3">
                            <button type="button" id="saveEduLevelBtn" class="btn btn-primary">
                                Submit <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<script>
    var token = $("input[name=\"_token\"]").val();
    var eduCount = 1;
    function openEducationModel()
    {
        $('#education-modal-add-level').modal('show');
    }
    function addEduLevelForm()
    {
       eduCount++;
       var html = '<div class="row" id="educationlevel'+eduCount+'"><div class="col-md-6"><div class="form-group"><label class="col-md-6 control-label">Level Title</label><div class="col-md-6"><input type="text" class="form-control" name="title[]"></div></div></div><div class="col-md-2"><button type="button" class="btn btn-danger margin-top-10 delete_desc" onclick="removeEduLevelForm('+eduCount+')"><i class="fa fa-times"></i></button></div></div>';
       $('#education_level_form').append(html)

    }
    function removeEduLevelForm(eduCount)
    {
        $('#educationlevel'+eduCount).remove();
    }
    $('#saveEduLevelBtn').click(function(){
        var values = $("input[name='title[]']").map(function(){return $(this).val();}).get();
        $.ajax({
            url: '<?php echo e(route("branchadmin.addEducationLevel")); ?>',
            type: 'POST',
            data: '_token='+token+'&title='+values,
            cache: false,
            success: function(data){
                console.log(data.msg)
                if(data.msg){
                    getEducationLevel();
                    $('#education-modal-add-level').modal('hide');
                    alert('Education Level Saved')
                }
            },
            error: function(error){
                console.log(error)
            }
        });
    })
    function getEducationLevel()
    {
        $.ajax({
            url: '<?php echo e(route("branchadmin.getEducationLevel")); ?>',
            type: 'GET',
            data: '_token='+token,
            cache: false,
            success: function(data){
                var levels = data.msg
                $('#education_level').html('<option value="<?php echo e(null); ?>">Select Education Level</option>');
                $('#faculty_education_level').html('<option value="<?php echo e(null); ?>">Select Education Level</option>');
                $.each(levels, function(index, value){
                    $('#education_level').append($('<option>',{value:value.id}).text(value.name));
                    $('#faculty_education_level').append($('<option>',{value:value.id}).text(value.name));
                })
            }
        });
    }
</script>
<div class="modal fade bd-example-modal-lg" id="faculty-modal-add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Faculty</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="testform" method="POST">
                    <?php echo csrf_field(); ?>

                    <div id="faculty_form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-6 control-label">Education Level</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="faculty_education_level" name="education_level">
                                            <option value="">Select Education level</option>
                                            <?php foreach($datas['education_level'] as $education_level): ?>
                                            <?php if($education_level->id == old('education_level')): ?>
                                            <option selected="selected" value="<?php echo e($education_level->id); ?>"><?php echo e($education_level->name); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo e($education_level->id); ?>"><?php echo e($education_level->name); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row" id="faculty1">
                            <div class="col-md-6">
                                <div class="form-group"><label class="col-md-6 control-label">Faculty Name</label>
                                    <div class="col-md-6"><input type="text" class="form-control" name="name[]"></div>
                                </div>
                            </div>
                            <div class="col-md-2"><button type="button" class="btn btn-danger margin-top-10 delete_desc"
                                    onclick="removeFacultyForm(1)"><i class="fa fa-times"></i></button></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right margin-top-10">
                            <button type="button" class="btn btn-sm grey-mint pullri" onclick="addFacultyForm()">Add More Faculty</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-3">
                            <button type="button" id="saveFacultyBtn" class="btn btn-primary">
                                Submit <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<script>
    var token = $("input[name=\"_token\"]").val();
    var facultyCount = 1;
    function openFacultyModel()
    {
        $('#faculty-modal-add').modal('show');
    }
    function addFacultyForm()
    {
       facultyCount++;
       var html = '<div class="row" id="faculty'+facultyCount+'"><div class="col-md-6"><div class="form-group"><label class="col-md-6 control-label">Faculty Name</label><div class="col-md-6"><input type="text" class="form-control" name="name[]"></div></div></div><div class="col-md-2"><button type="button" class="btn btn-danger margin-top-10 delete_desc" onclick="removeFacultyForm('+facultyCount+')"><i class="fa fa-times"></i></button></div></div>';
       $('#faculty_form').append(html)
    }
    function removeFacultyForm(facultyCount)
    {
        $('#faculty'+facultyCount).remove();
    }
    $('#saveFacultyBtn').click(function(){
        var values = $("input[name='name[]']").map(function(){return $(this).val();}).get();
        var level = $('#faculty_education_level').val();
        $.ajax({
            url: '<?php echo e(route("branchadmin.addFacultyLevel")); ?>',
            type: 'POST',
            data: '_token='+token+'&name='+values+'&level_id='+level,
            cache: false,
            success: function(data){
                console.log(data.msg)
                if(data.msg){
                    $('#faculty-modal-add').modal('hide');
                    alert('Education Faculty Saved');
                    getFaculty(level)
                }
            },
            error: function(error){
                console.log(error)
            }
        });
    })
</script>
//new
<div class="modal fade bd-example-modal-lg" id="shift-modal-add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Shift</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="testform" method="POST">
                    <?php echo csrf_field(); ?>

                    <div id="shift">
                        <div class="row" id="shift_time_1">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Shift Title</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="shift_title[]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-6 control-label">Shift Start Time</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control timepicker" name="shift_from[]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-6 control-label">Shift End Time</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control timepicker" name="shift_to[]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger margin-top-10 delete_desc"
                                    onclick="$('#shift_time_1').remove();" data-toggle="tooltip" title="" type="button"
                                    data-original-title="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="shiftErrors" class="col-md-6"></div>
                        <div class="col-md-12 text-right margin-top-10">
                            <button onclick="addSift()" type="button" class="btn btn-sm grey-mint pullri">Add More
                                Sift</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-3">
                            <button type="button" id="saveShiftTimeBtn" class="btn btn-primary">
                                Submit <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('.timepicker').timepicker({
        'showDuration': true,
        'timeFormat': 'H:i:s',
        'minTime': '07:00:00',
    });
    });
    var token = $("input[name=\"_token\"]").val();
    var shiftCount = 1;
    function openShiftModel()
    {
        $('#shift-modal-add').modal('show');
    }
    function addSift()
    {
       shiftCount++;
       var html = '<div class="row" id="shift_time_'+shiftCount+'"><div class="col-md-4"><div class="form-group"><label class="col-md-4 control-label">Shift Title</label><div class="col-md-8"><input type="text" class="form-control" name="shift_title[]"></div></div></div><div class="col-md-3"><div class="form-group"><label class="col-md-6 control-label">Shift Start Time</label><div class="col-md-6"><input type="text" class="form-control timepicker" name="shift_from[]"></div></div></div><div class="col-md-3"><div class="form-group"><label class="col-md-6 control-label">Shift End Time</label><div class="col-md-6"><input type="text" class="form-control timepicker" name="shift_to[]"></div></div></div><div class="col-md-2"><button class="btn btn-danger margin-top-10 delete_desc" onclick="removeShiftForm('+shiftCount+')" type="button"><i class="fa fa-times"></i></button></div></div>';
       $('#shift').append(html);
       $('.timepicker').timepicker({
            'showDuration': true,
            'timeFormat': 'H:i:s',
            'minTime': '07:00:00',
        });
    }
    function removeShiftForm(shiftCount)
    {
        $('#shift_time_'+shiftCount).remove();
    }
    $('#saveShiftTimeBtn').click(function(){
        var title = $("input[name='shift_title[]']").map(function(){return $(this).val();}).get();
        var from = $("input[name='shift_from[]']").map(function(){return $(this).val();}).get();
        var to = $("input[name='shift_to[]']").map(function(){return $(this).val();}).get();
        $.ajax({
            url: '<?php echo e(route("branchadmin.addShiftTime")); ?>',
            type: 'POST',
            data: {
                _token : token,
                title : title,
                from: from,
                to: to
            },
            cache: false,
            success: function(data){
                console.log(data.msg)
                if(data.msg){
                    $('#shift-modal-add').modal('hide');
                    alert('Shift Time Saved');
                }
            },
            error: function(error){
                console.log(error)
                var errorText = '';
                    $.each(error.responseJSON, function(index, value){
                    errorText += '<br>'+'<span style="color:red;">'+value+'</span>'
                })
                $('#shiftErrors').html(errorText);
            }
        });
    })
</script>

<!-- dynamic file form  -->
<script>
var count = 0;
function addMoreDynamicFileForm()
{
    count++
    var formData = '<div class="form-group" id="dForm'+count+'"><div class="col-md-3 control-label"><input type="text" name="dform_label[]" placeholder="form label" class="form-control" required></div><div class="col-md-7"><input class="form-control" name="dform_file[]" type="file" required></div><div class="col-md-2"><button type="button" class="btn btn-warning" onclick="removeDynamicFileForm('+count+')"><i class="fa fa-trash"></i></button></div></div>';
    $('#dynamicFileForm').append(formData)
}
function removeDynamicFileForm(num)
{
    $('#dForm'+num).remove()
}
</script>
<script>
$('#joindate').change(function(){
    var joindate = $('#joindate').val();
    var dt = new Date(joindate)
    dt.setMonth( dt.getMonth() + 3 );
    var new_date = dt.getFullYear() + "-" + (dt.getMonth() + 1) + "-" + dt.getDate() 
    $('#probation_end_date').val(new_date);
})
</script>
    
<?php $__env->stopSection(); ?>

 
                          
                            
                     
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>