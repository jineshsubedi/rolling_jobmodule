<?php $__env->startSection('heading'); ?>
New Task
            
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="<?php echo e(url('/supervisor/tasks')); ?>"><i class="fa fa-users"></i> Tasks</a></li>  
            <li class="active">New Task</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
     
      
     
      <div class="box">
            <div class="box-body">
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
            <form id="task-form" method="POST" action="<?php echo e(url('/supervisor/tasks/savetask')); ?>" class="form-horizontal" enctype="multipart/form-data">
               <?php echo csrf_field(); ?>

               
               <div class="col-md-12">
                 <div class="form-group <?php echo e($errors->has('task_to') ? ' has-error' : ''); ?>">
                <label class="col-md-2 control-label required">Task To</label>
                <div class="col-md-10">
                  <select class="form-control" name="task_to" id="task_to">
                      <option value="">Select Staff</option>
                    <?php foreach($data['staffs'] as $staff): ?>
                    <?php if(old('task_to') == $staff->id): ?>
                    <option selected="selected" value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                    <?php else: ?>
                    <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                  
                  <?php if($errors->has('task_to')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('task_to')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                </div>
                 <div class="form-group <?php echo e($errors->has('kra') ? ' has-error' : ''); ?>">
                <label class="col-md-2 control-label required">kra</label>
                <div class="col-md-10">
                  <select class="form-control" name="kra" id="kra">
                   
                  </select>
                  
                  <?php if($errors->has('kra')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('kra')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                </div>
                <div class="form-group <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                <label class="col-md-2 control-label required">Title</label>
                <div class="col-md-10">
                  <input type="text" name="title" value="<?php echo e(old('title')); ?>" class="form-control">
                  <?php if($errors->has('title')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('title')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                </div>
                <div class="form-group <?php echo e($errors->has('weightage') ? ' has-error' : ''); ?>">
                <label class="col-md-2 control-label required">Weightage</label>
                <div class="col-md-10">
                  <input type="text" name="weightage" value="1" placeholder="1" class="form-control">
                  <?php if($errors->has('weightage')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('weightage')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                </div>
                 <div class="form-group <?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                <label class="col-md-2 control-label">Description</label>
                <div class="col-md-10">
                  <textarea class="form-control" name="description"><?php echo e(old('description')); ?></textarea>
                 
                  <?php if($errors->has('description')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('description')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                </div>


                 <div class="form-group <?php echo e($errors->has('finish_date') ? ' has-error' : ''); ?>">
                <label class="col-md-2 control-label required">Deadline</label>
                <div class="col-md-10">
                  <input type="text" name="finish_date" value="<?php echo e(old('finish_date')); ?>" class="form-control date">
                  <?php if($errors->has('finish_date')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('finish_date')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                </div>

                
                <div class="form-group <?php echo e($errors->has('task_number') ? ' has-error' : ''); ?>">
                <label class="col-md-2 control-label">Number of Task</label>
                <div class="col-md-10">
                  <input type="text" name="task_number" value="<?php echo e(old('task_number')); ?>" class="form-control">
                  <?php if($errors->has('task_number')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('task_number')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                </div>

                <div class="form-group <?php echo e($errors->has('project') ? ' has-error' : ''); ?>">
                <label class="col-md-2 control-label required">project</label>
                <div class="col-md-10">
                  <input type="text" name="project" value="<?php echo e(old('project')); ?>" class="form-control project">
                  <?php if($errors->has('project')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('project')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                </div>

                 <div class="form-group <?php echo e($errors->has('personal') ? ' has-error' : ''); ?>">
                <label class="col-md-2 control-label required">personal</label>
                <div class="col-md-10">

                    <select class="form-control" name="personal">
                       
                        <?php if(old('personal') == 0): ?>
                          <option selected="selected" value="0">No</option>
                          <option value="1">Yes</option>
                          <?php else: ?>
                          <option value="0">No</option>
                          <option selected="selected" value="1">Yes</option>
                        <?php endif; ?>
                       
                        </select>


                  
                  <?php if($errors->has('personal')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('personal')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
                </div>

                

                                  
                                      <div class="clearfix">
                    
                   
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-6 col-md-10">
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
                </div>
            </form>
                       

            
                  

          </div><!-- /.box-body -->
      </div>
    </div>
  <div>

  <div>
  </div>
  <script type="text/javascript">
     $('.date').datepicker({
      autoclose: true
    })
    $('#task_to').on('change', function () {
      var id = $(this).val();
      var token = $('input[name=\'_token\']').val();

      if (id != '') {
        $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/supervisor/tasks/getKra")); ?>',
            data: '_token='+token+'&id='+id,
            cache: false,
            success: function(html){
             $('#kra').html(html);
                
               
            }
      });
      }
    })
    
  </script>
  <script type="text/javascript">
    $('.project').autocomplete({

    source: '<?php echo e(url("supervisor/getProject/")); ?>',
          minlength:1,
          autoFocus:true,
          select:function(e,ui){
            $(this).val(ui.item.value);
             
          }

    });
  </script>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>