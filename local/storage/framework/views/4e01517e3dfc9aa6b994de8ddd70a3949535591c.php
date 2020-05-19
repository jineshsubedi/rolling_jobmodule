<?php $__env->startSection('heading'); ?>
New Staff
<small>Detail of New Staff</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo e(url('/branchadmin/on-boarding')); ?>">Onboarding Staffs</a></li>
<li class="active">New Staff</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">Add On Board Staff</h3>
              </div>
              <div class="box-body">
              <form  method="POST" action="<?php echo e(url('/branchadmin/on-boarding/save')); ?>" enctype="multipart/form-data">
                   <?php echo csrf_field(); ?>

                  
                   <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                      <label>Full Name:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                          </div>
                          <input name="name" type="text" class="form-control " value="<?php echo e(old('name')); ?>" placeholder="john doe" required>
                        </div>
                        <?php if($errors->has('name')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('name')); ?></strong>
                    </span>
                    <?php endif; ?>
                   </div>
                   <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                      <label>Email:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-envelope-o"></i>
                          </div>
                          <input name="email" type="email" class="form-control" placeholder="johndoe@mail.com" value="<?php echo e(old('email')); ?>" required>
                        </div>
                        <?php if($errors->has('email')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                    <?php endif; ?>
                   </div>
                   <div class="form-group <?php echo e($errors->has('department_id') ? ' has-error' : ''); ?>">
                      <label>Department:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-graduation-cap"></i>
                          </div>
                          <select name="department_id" id="department_id" class="form-control" required>
                            <option value="">Select Department</option>
                            <?php foreach($departments as $department): ?>
                            <option value="<?php echo e($department->id); ?>"><?php echo e($department->title); ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <?php if($errors->has('department_id')): ?>
                          <span class="help-block">
                            <strong><?php echo e($errors->first('department_id')); ?></strong>
                          </span>
                        <?php endif; ?>
                   </div>
                   <div class="form-group <?php echo e($errors->has('designation_id') ? ' has-error' : ''); ?>">
                      <label>Designation:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-graduation-cap"></i>
                          </div>
                          <select name="designation_id" id="designation_id" class="form-control" required>
                            <option value="">Select Department</option>
                          </select>
                        </div>
                        <?php if($errors->has('designation_id')): ?>
                        <span class="help-block">
                          <strong><?php echo e($errors->first('designation_id')); ?></strong>
                        </span>
                        <?php endif; ?>
                   </div>
                   <div id="supervisor" class="form-group <?php echo e($errors->has('supervisor') ? ' has-error' : ''); ?>">
                      <label>Assign Supervisor:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-chevron-down"></i>
                          </div>
                          <select name="supervisor" class="form-control select2" style="width: 100%;">
                              <option value="<?php echo e(null); ?>">Select Supervisor</option>
                              <?php foreach($users as $user): ?>
                          <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option> 
                              <?php endforeach; ?>
                            </select>
                        </div>
                        <?php if($errors->has('supervisor')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('supervisor')); ?></strong>
                    </span>
                    <?php endif; ?>
                   </div>
                   <div id="staffType" class="form-group <?php echo e($errors->has('staffType') ? ' has-error' : ''); ?>">
                      <label>Staff Type:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-upload"></i>
                          </div>
                          <select name="staffType" id="" class="form-control">
                            <option value="2">Staff</option>
                            <option value="1">Supervisor</option>
                            <option value="3">Branchadmin</option>
                          </select>
                        </div>
                       <?php if($errors->has('staffType')): ?>
                      <span class="help-block">
                        <strong><?php echo e($errors->first('staffType')); ?></strong>
                      </span>
                      <?php endif; ?>
                   </div>
                   <div class="form-group <?php echo e($errors->has('nature_of_job') ? ' has-error' : ''); ?>">
                      <label>Nature of Job:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-black-tie"></i>
                          </div>
                          <select name="nature_of_job" class="form-control">
                            <option value="1" <?php if(old('nature_of_job')=='1'): ?> selected <?php endif; ?>>Full Time</option>
                            <option value="2" <?php if(old('nature_of_job')=='2'): ?> selected <?php endif; ?>>Part Time</option>
                          </select>
                        </div>
                        <?php if($errors->has('nature_of_job')): ?>
                        <span class="help-block">
                          <strong><?php echo e($errors->first('nature_of_job')); ?></strong>
                        </span>
                        <?php endif; ?>
                   </div>
                   <div class="form-group <?php echo e($errors->has('nature_of_employment') ? ' has-error' : ''); ?>">
                      <label>Nature of Employment:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-neuter" aria-hidden="true"></i>
                          </div>
                          <select name="nature_of_employment" id="nature_of_employment" class="form-control" required>
                            <option value="Temporary">Temporary</option>
                            <option value="Permanent">Permanent</option>
                          </select>
                        </div>
                        <?php if($errors->has('nature_of_employment')): ?>
                        <span class="help-block">
                          <strong><?php echo e($errors->first('nature_of_employment')); ?></strong>
                        </span>
                        <?php endif; ?>
                   </div>
                   
                   <div  class="form-group <?php echo e($errors->has('trail_period') ? ' has-error' : ''); ?>">
                      <label>Trail Period:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-chevron-down"></i>
                          </div>
                          <select id="trail_period" name="trail_period" class="form-control select2" style="width: 100%;">
                              <option value="<?php echo e(null); ?>">is Trail Period?</option>
                              <option value="1">YES</option>
                              <option value="0">NO</option>
                          </select>
                      </div>
                        <?php if($errors->has('trail_period')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('trail_period')); ?></strong>
                    </span>
                    <?php endif; ?>
                   </div>
                   <div id="no_of_days" class="form-group">
                      <label>No Of Days:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-check"></i>
                          </div>
                          <input name="no_of_days" type="number" class="form-control">
                      </div>
                   </div>
                   <div id="trail_start_date" class="form-group">
                      <label>Trail Start Date:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input name="trail_start_date" type="text" class="form-control datepicker" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                        </div>
                   </div>
                   <div id="joining_date" class="form-group <?php echo e($errors->has('joining_date') ? ' has-error' : ''); ?>">
                      <label>Joining Date:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input name="joining_date" type="text" class="form-control datepicker" value="<?php echo e(old('joining_date')); ?>" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                      </div>
                     <?php if($errors->has('joining_date')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('joining_date')); ?></strong>
                    </span>
                    <?php endif; ?>
                   </div>
                   
                   <div id="cv" class="form-group <?php echo e($errors->has('cv') ? ' has-error' : ''); ?>">
                      <label>CV:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-upload"></i>
                          </div>
                          <input name="cv" type="file" class="form-control">
                        </div>
                       <?php if($errors->has('cv')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('cv')); ?></strong>
                    </span>
                    <?php endif; ?>
                   </div>
                   <hr>
                   <div id="letter_type" class="form-group <?php echo e($errors->has('letter_type') ? ' has-error' : ''); ?>">
                      <label>Offer Letter:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                              <i class="fa fa-paper-plane"></i>
                          </div>
                          <!-- <input name="letter_type" type="file" class="form-control"> -->
                          <select name="letter_type" class="form-control">
                            <option value="">Select Letter Type</option>
                            <?php foreach($letter_types as $type): ?>
                            <option value="<?php echo e($type->id); ?>"><?php echo e($type->title); ?></option>
                            <?php endforeach; ?>
                          </select>
                      </div>
                     <?php if($errors->has('letter_type')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('letter_type')); ?></strong>
                    </span>
                    <?php endif; ?>
                   </div>
                   <div class="form-group <?php echo e($errors->has('letter_accept_date') ? ' has-error' : ''); ?>">
                      <label>Offer Letter Accept Date:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-graduation-cap"></i>
                        </div>
                        <input name="letter_accept_date" type="letter_accept_date" class="form-control datepicker" placeholder="letter accept date" value="<?php echo e(old('letter_accept_date')); ?>" required>
                      </div>
                      <?php if($errors->has('letter_accept_date')): ?>
                      <span class="help-block">
                        <strong><?php echo e($errors->first('letter_accept_date')); ?></strong>
                      </span>
                      <?php endif; ?>
                   </div>
                   <div class="form-group <?php echo e($errors->has('level') ? ' has-error' : ''); ?>">
                      <label>level:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-sitemap"></i>
                          </div>
                          <input name="level" type="level" class="form-control" placeholder="Level" value="<?php echo e(old('level')); ?>" required>
                        </div>
                        <?php if($errors->has('level')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('level')); ?></strong>
                    </span>
                    <?php endif; ?>
                   </div>
                   <div class="form-group <?php echo e($errors->has('gross_salary') ? ' has-error' : ''); ?>">
                      <label>gross_salary:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-money"></i>
                          </div>
                          <input name="gross_salary" type="gross_salary" class="form-control" placeholder="20000" value="<?php echo e(old('gross_salary')); ?>" required>
                        </div>
                        <?php if($errors->has('gross_salary')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('gross_salary')); ?></strong>
                    </span>
                    <?php endif; ?>
                   </div>
                   <div class="form-group">
                     <input type="submit" class="btn btn-primary" value="SUBMIT">
                   </div>
                 </form>
              </div>
          </div>
      </div>
  </div>
<script>
$(document).ready(function(){
  $('#no_of_days').hide();
  $('#trail_start_date').hide();
  $('#joining_date').hide();
  
  $('select#trail_period').change(function() {
    var trail = $(this).children("option:selected").val();
    if(trail==1){
      $('#no_of_days').show();
      $('#trail_start_date').show();
      $('#joining_date').hide();
    }else{
      $('#no_of_days').hide();
      $('#trail_start_date').hide();
      $('#joining_date').show();
    }
  })

  $('.datepicker').datepicker();
 
})
</script>

<script>
    var CSRF_TOKEN = $('input[name=\'_token\']').val();
  $('#department_id').change(function(){
    var department = $(this).val();
    $('#designation_id').html('<option>Select Designation</option>')
    $.ajax({
        url: "<?php echo e(url('/branchadmin/department/get_designation')); ?>",
        type: 'POST',
        data:{
            _token: CSRF_TOKEN,
            id: department
        },
        dataType: 'JSON',
        success:function(data){
          $.each(data, function(index, value){
          $('#designation_id').append('<option value="'+value.id+'">'+value.title+'</option>')

          })
        },
        error: function(error){
          console.log(error)
        }
      });
  })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>