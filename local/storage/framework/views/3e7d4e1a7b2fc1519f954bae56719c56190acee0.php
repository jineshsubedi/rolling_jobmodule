<?php $__env->startSection('heading'); ?>
Staff
<small>Detail of Staff</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo e(url('/staffs/adjustment_staff')); ?>">Staffs</a></li>
<li class="active">Edit Staffs</li>
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
        <div class="panel-heading">Edit Staffs</div>
        <div class="panel-body">
          <form method="POST" action="<?php echo e(url('/staffs/adjustment_staff/update')); ?>" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo e($datas['staff']->id); ?>">
                     <?php echo csrf_field(); ?>

                      <input type="hidden" id="geo_location" name="geo_location" value="">
                <div class="row ">
                    <div class="col-md-6 col-sm-6">
                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                                <div class="box-title">
                                    <i class="fa fa-calendar"></i>Personal Details
                                </div>
                            </div>
                            <div class="portlet-body p-10">
                                <div class="form-body">
                                   
                                    <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label required">Name </label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="name" placeholder="Employee Name" value="<?php echo e($datas['staff']->name); ?>" type="text">
                                            <?php if($errors->has('name')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('f_name') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Parent's Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="f_name" placeholder="Parent's Name" type="text" value="<?php echo e($datas['staff']->f_name); ?>">
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
                                            
                                                <input class="form-control datepicker" name="dob" value="<?php echo e($datas['staff']->dob); ?>" type="text">
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
                                            
                                                <input class="form-control" name="personal_email" value="<?php echo e($datas['staff']->personal_email); ?>" type="text">
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
                                            
                                                <input class="form-control" name="citizenship_number" value="<?php echo e($datas['staff']->citizenship_number); ?>" type="text">
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
                                            
                                                <input class="form-control" name="emergency_contact_number" value="<?php echo e($datas['staff']->emergency_contact_number); ?>" type="text">
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
                                            
                                                <input class="form-control" name="blood_group" value="<?php echo e($datas['staff']->blood_group); ?>" type="text">
                                                 <?php if($errors->has('blood_group')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('blood_group')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                                
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('education_level') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Education Qualification</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="education_level" name="education_level">
                                              <option value="">Select Education level</option>
                                              <?php foreach($datas['education_level'] as $education_level): ?>
                                                <?php if($education_level->id == $datas['staff']->education_level): ?>
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
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('faculty') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Faculty</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="faculty" id="faculty">
                                              <?php foreach($datas['faculty'] as $faculty): ?>
                                              <?php if($faculty->id == $datas['staff']->faculty): ?>
                                              <option selected="selected" value="<?php echo e($faculty->id); ?>"><?php echo e($faculty->name); ?></option>
                                              <?php else: ?>
                                              <option value="<?php echo e($faculty->id); ?>"><?php echo e($faculty->name); ?></option>
                                              <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('faculty')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('faculty')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('institute') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Institute</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="institute" value="<?php echo e($datas['staff']->institute); ?>">
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
                                            <input type="text" class="form-control" name="university" value="<?php echo e($datas['staff']->university); ?>">
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
                                            <input type="text" class="form-control" name="education_year" value="<?php echo e($datas['staff']->education_year); ?>">
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
                                                <?php if($gender['value'] == $datas['staff']->gender): ?>
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
                                                <?php if($marital_status['value'] == $datas['staff']->marital_status): ?>
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
                                            <input class="form-control" name="phone" placeholder="Contact Number" value="<?php echo e($datas['staff']->phone); ?>" type="text">
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
                                            <input type="text" class="form-control" name="contact_person" id="contact_person" value="<?php echo e($datas['staff']->contact_person); ?>">
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
                                            <input type="text" class="form-control" name="contact_person_number" id="contact_person_number" value="<?php echo e($datas['staff']->contact_person_number); ?>">
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
                                            <button type="button" class="btn btn-success" id="btn-location"><i class="fa fa-map-marker"></i>Get Location</button>
                                            <div class="col-md-9 modal_body_map" id="body_map" style="display:none;">
                                              <div class="location-map" id="location-map">
                                                <div style="width: 100%; height: 200px;" id="map_canvas"></div>
                                              </div>
                                            </div>
                                            <input type="hidden" name="home_location" id="home_location" value="<?php echo e($datas['staff']->home_location); ?>">
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
                                            <textarea class="form-control" name="temporary_address" id="temporary_address"><?php echo e($datas['staff']->temporary_address); ?></textarea>
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
                                                        <?php if($datas['staff']->district == $district['value']): ?>
                                                        <option selected="selected" value="<?php echo e($district['value']); ?>"><?php echo e($district['value']); ?></option>
                                                        <?php else: ?>
                                                         <option value="<?php echo e($district['value']); ?>"><?php echo e($district['value']); ?></option>
                                                        <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                            <textarea class="form-control" name="permanent_address" id="permanent_address"><?php echo e($datas['staff']->permanent_address); ?></textarea>
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
                                            <input name="email" class="form-control" value="<?php echo e($datas['staff']->email); ?>" type="text">
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
                                           
                                            <input name="password" class="form-control" id="password" value="" type="password">
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
                                           
                                            <select id="status" class="form-control" name="status">
                                                <?php foreach($datas['status'] as $status): ?>
                                                <?php if($status['value'] == $datas['staff']->status): ?>
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
                                    
                                    
                                     <?php if($datas['staff']->status == 1){
                                        $style = 'style=display:none';
                                    } else{
                                        $style = '';
                                    } ?>
                                     <div class="form-group resign" <?php echo e($style); ?>>
                                        <label class="col-md-3 control-label required">Date </label>
                                        <div class="col-md-9">
                                           
                                           <input type="text" class="form-control datepicker" name="resign_date" value="<?php echo e($datas['staff']->resign_date); ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group resign" <?php echo e($style); ?>>
                                        <label class="col-md-3 control-label required">Reason</label>
                                        <div class="col-md-9">
                                           
                                           <textarea class="form-control" name="resign_reason"><?php echo e($datas['staff']->resign_reason); ?></textarea>
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
                                    <i class="fa fa-calendar"></i>Company Details
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
                                                    <?php if($datas['staff']->supervisor == $staff->id): ?>
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
                                                <option value="0">Select Supervisor</option>
                                                <?php foreach($datas['days'] as $days): ?>
                                                    <?php if($datas['staff']->weekend == $days): ?>
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
                                        <label class="col-md-3 control-label required">Device ID</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="device_id" placeholder="Device ID" value="<?php echo e($datas['staff']->device_id); ?>" type="text">
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
                                                <?php if($staffType['value'] == $datas['staff']->staffType): ?>
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
                                            <input type="text" class="form-control" name="employee_id" placeholder="RPPL-0001" value="<?php echo e($datas['staff']->employee_id); ?>">
                                             <?php if($errors->has('employee_id')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('employee_id')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="branch" value="<?php echo e($datas['staff']->branch); ?>">
                                    
                                    <div class="form-group <?php echo e($errors->has('department') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Department</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="department" name="department">
                                              <option value="">Select Department</option>
                                                <?php foreach($datas['departments'] as $department): ?>
                                                  <?php if($department->id == $datas['staff']->department): ?>
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
                                              <?php foreach($datas['designation'] as $designation): ?>
                                              <?php if($designation->id == $datas['staff']->designation): ?>
                                              <option selected="selected" value="<?php echo e($designation->id); ?>"><?php echo e($designation->title); ?></option>
                                              <?php else: ?>
                                              <option value="<?php echo e($designation->id); ?>"><?php echo e($designation->title); ?></option>
                                              <?php endif; ?>
                                              <?php endforeach; ?>
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
                                        <div class="col-md-9">
                                            <select class="form-control" id="shifttime" name="shifttime">
                                              <option value="">Select shifttime</option>
                                                <?php foreach($datas['shifttime'] as $shifttime): ?>
                                                  <?php if($shifttime->id == $datas['staff']->shiftTime): ?>
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
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('employmentType') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Work Mode</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="employmentType" id="work_mode">
                                              <?php foreach($datas['employmentType'] as $employmentType): ?>
                                                <?php if($employmentType['value'] == $datas['staff']->employmentType): ?>
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
                                                <?php if($salaryType['value'] == $datas['staff']->salaryType): ?>
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
                                                    <?php if($department['value'] == $datas['staff']->business_department): ?>
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
                                            
                                                <input class="form-control datepicker" id="joindate" name="joindate" value="<?php echo e($datas['staff']->joindate); ?>" type="text">
                                               
                                             <?php if($errors->has('joindate')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('joindate')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-6"><?php echo e($datas['different']); ?> </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('probation_end_date') ? ' has-error' : ''); ?>">
                                        <label class="control-label col-md-3">Probation End Date</label>
                                        <div class="col-md-9">
                                            <input class="form-control datepicker" id="probation_end_date" name="probation_end_date" value="<?php echo e($datas['staff']->probation_end_date); ?>" type="text">
                                               
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
                                            <input class="form-control" name="salary" placeholder="Current Salary" value="<?php echo e($datas['staff']->salary); ?>" type="text">
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
                                            <input class="form-control" name="bank_name" placeholder="Current bank_name" value="<?php echo e($datas['staff']->bank_name); ?>" type="text">
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
                                            <input class="form-control" name="account_number" placeholder="Current account_number" value="<?php echo e($datas['staff']->account_number); ?>" type="text">
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
                                            <input class="form-control" name="pan" placeholder="PAN Number" value="<?php echo e($datas['staff']->pan); ?>" type="text">
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
                                            <input class="form-control" name="pf" placeholder="Current pf" value="<?php echo e($datas['staff']->pf); ?>" type="text">
                                             <?php if($errors->has('pf')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('account_number')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                     <div class="form-group <?php echo e($errors->has('primary_location') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Primary Location</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="primary_location" placeholder="latitute,longitute" value="<?php echo e($datas['staff']->primary_location); ?>" type="text">
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
                                            <input class="form-control" name="secondary_location" placeholder="latitute,longitute" value="<?php echo e($datas['staff']->secondary_location); ?>" type="text">
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
                        <div class="box box-danger box-solid">
                            <div class="box-header with-border">
                                <div class="box-title">
                                    <i class="fa fa-calendar"></i>Documents
                                </div>
                            </div>
                            <div class="portlet-body p-10">
                                <div class="form-body" id="dynamicFileForm">
                                    <div class="form-group <?php echo e($errors->has('photo') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Photo</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="photo" value="" type="file">
                                             <?php if($errors->has('photo')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('photo')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-5" id="photo_row">
                                            <?php if($datas['staff']->image != ''): ?>
                                            <img src="<?php echo e(asset('/image/'.$datas['staff']->image)); ?>" style="width: 50px; float: left;">
                                            <a class="btn btn-warning" onclick="deleteFile('<?php echo e($datas['staff']->id); ?>','image')">Remove</a> 
                                            <a href="<?php echo e(asset('/image/'.$datas['staff']->image)); ?>" target="_blank" class="btn btn-primary" download="download">Download</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('resume') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Resume</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="resume" value="" type="file">
                                             <?php if($errors->has('resume')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('resume')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-5" id="resume_row">
                                            <?php if($datas['staff']->resume != ''): ?>
                                            <a class="btn btn-warning" onclick="deleteFile('<?php echo e($datas['staff']->id); ?>','resume')">Remove</a> 
                                            <a href="<?php echo e(asset('/image/'.$datas['staff']->resume)); ?>" target="_blank" class="btn btn-primary" download="download">Download</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('offer_letter') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Offer Letter</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="offer_letter" value="" type="file">
                                             <?php if($errors->has('offer_letter')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('offer_letter')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-5" id="offer_letter_row">
                                            <?php if($datas['staff']->offer_letter != ''): ?>
                                            <a  class="btn btn-warning" onclick="deleteFile('<?php echo e($datas['staff']->id); ?>','offer_letter')">Remove</a> 
                                            <a href="<?php echo e(asset('/image/'.$datas['staff']->offer_letter)); ?>" target="_blank" class="btn btn-primary" download="download">Download</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('appointment_letter') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Appointment Letter</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="appointment_letter" value="" type="file">
                                             <?php if($errors->has('appointment_letter')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('appointment_letter')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-5" id="appointment_letter_row">
                                            <?php if($datas['staff']->appointment_letter != ''): ?>
                                            <a  class="btn btn-warning" onclick="deleteFile('<?php echo e($datas['staff']->id); ?>','appointment_letter')">Remove</a> 
                                            <a href="<?php echo e(asset('/image/'.$datas['staff']->appointment_letter)); ?>" target="_blank" class="btn btn-primary" download="download">Download</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('contract') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Contract Paper</label>
                                        <div class="col-md-4">
                                            <!-- <input class="form-control" name="contract" value="" type="file">
                                             <?php if($errors->has('contract')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('contract')); ?></strong>
                                                </span>
                                            <?php endif; ?> -->
                                        </div>
                                        <div class="col-md-5" id="contract_row">
                                            <?php if($datas['staff']->contract != ''): ?>
                                            <a class="btn btn-warning" onclick="deleteFile('<?php echo e($datas['staff']->id); ?>','contract')">Remove</a> 
                                            <a href="<?php echo e(asset('/image/'.$datas['staff']->contract)); ?>" target="_blank" class="btn btn-primary" download="download">Download</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('id_proof') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Citizenship</label>
                                        <div class="col-md-4">
                                           <input class="form-control" name="id_proof" value="" type="file">
                                            <?php if($errors->has('id_proof')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('id_proof')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-5" id="id_proof_row">
                                            <?php if($datas['staff']->id_proof != ''): ?>
                                            <a class="btn btn-warning" onclick="deleteFile('<?php echo e($datas['staff']->id); ?>','id_proof')">Remove</a> 
                                            <a href="<?php echo e(asset('/image/'.$datas['staff']->id_proof)); ?>" target="_blank" class="btn btn-primary" download="download">Download</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php ($formDatas = json_decode($datas['staff']->dynamic_formData)); ?>
                                    <?php if($formDatas): ?>
                                        <?php for($i=0; $i<count($formDatas); $i++): ?>
                                        <div class="form-group" id="dataform<?php echo e($i); ?>">
                                            <div class="col-md-3 control-label">
                                                <input type="text" name="dform_label[]" placeholder="form label" value="<?php echo e($formDatas[$i]->label); ?>" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" name="dform_file[]" type="file" value="<?php echo e($formDatas[$i]->dFormFile); ?>">
                                            </div>
                                            <div class="col-md-5" id="id_proof_row">
                                                <?php if($datas['staff']->dynamic_formData != ''): ?>
                                                <a class="btn btn-warning" onclick="removeDataForm(<?php echo e($i); ?>, <?php echo e($datas['staff']->id); ?>)">Remove</a> 
                                                <a href="<?php echo e(asset('/image/'.$formDatas[$i]->dFormFile)); ?>" target="_blank" class="btn btn-primary" download="download">Download</a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                   
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
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" data-loading-text="Submitting..." class="demo-loading-btn btn green">
                                            <i class="fa fa-plus"></i>  Submit </button>
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
  $('#joindate').datepicker();
});

</script>


<script type="text/javascript">
  $('#education_level').on('change', function(){

        var data = $(this).val();
        var token = $('input[name=\'_token\']').val();
        if (data != '') {
            $.ajax({
        type: 'POST',
        url: '<?php echo e(url("/staffs/getfaculty")); ?>',
        data: 'id='+data+'&_token='+token,
        cache: false,
        success: function(data){
            console.log(data)
            var html = '<option value="">Select Faculty</option>'
            $.each(data, function(index, value){
                html += '<option value="'+value.id+'">'+value.name+'</option>';
            });
            $('#faculty').html(html);
        }
    });
        } else{
            $('#faculty').html('<option value="">Select Faculty</option>');
        }
  })
</script>

<script type="text/javascript">
  $('#department').on('change', function(){

        var data = $(this).val();
        var token = $('input[name=\'_token\']').val();
        if (data != '') {
            $.ajax({
        type: 'POST',
        url: '<?php echo e(url("/staffs/adjustment_staff/department/get_designation")); ?>',
        data: 'id='+data+'&_token='+token,
        cache: false,
        success: function(data){
                console.log(data)
                var html = '<option value="">Select designation</option>'
                $.each(data, function(index, value){
                    html += '<option value="'+value.id+'">'+value.title+'</option>';
                });
                $('#designation').html(html);
            }
        });
        } else{
            $('#designation').html('<option value="">Select designation</option>');
        }
  });
  $(document).ready(function(){
    $('#password').val('');
  })
</script>

<script type="text/javascript">
    function deleteFile(id,title)
    {
        var token = $('input[name=\'_token\']').val();
        if (id != '' && title != '') {
             $.ajax({
                type: 'POST',
                url: '<?php echo e(url("/staffs/adjustment_staff/deleteFile")); ?>',
                data: 'id='+id+'&_token='+token+'&title='+title,
                cache: false,
                success: function(data){
                    if (data == 'Success') {
                        $('#'+title+'_row').html('');
                    }
                    
                   
                }
        });
         }
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
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyAoqaY2Xc_0pCgZdcoODLP5Qli-coBxnSI&v=3&libraries=panoramio&language=ne&region=NP"></script>
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
              if(confirm('Are you sure, you want to change your home location?')){
              var latit = this.getPosition().lat();
              var longt = this.getPosition().lng();
                document.getElementById("home_location").value = latit+','+longt;
              }
                
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
    <?php if($datas['staff']->home_location != ''): ?>
    <script type="text/javascript">
    $(document).ready(function(){
        var glocation = '<?php echo e($datas["staff"]->home_location); ?>';
        var data = glocation.split(',');
                //initialize(new google.maps.LatLng(data[0], data[1]));
                  initializeGMap(data[0], data[1]);
                     $('#body_map').fadeIn();
    });
    
    </script>
    <?php endif; ?>


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
function removeDataForm(index, staff_id)
{
    $('#dataform'+index).remove()
    var CSRF_TOKEN = $('input[name=\'_token\']').val();
    $.ajax({
        url: "<?php echo e(url('/staffs/adjustment_staff/edit/removeDynamicFile')); ?>",
        type: 'POST',
        data:{
            _token: CSRF_TOKEN,
            index: index,
            staff_id: staff_id,
        },
        dataType: 'JSON',
        success:function(data){
            console.log(data)
        },
        error:function(error){
            console.log(error)
        }
    });
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

 
                          
                            
                     
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>