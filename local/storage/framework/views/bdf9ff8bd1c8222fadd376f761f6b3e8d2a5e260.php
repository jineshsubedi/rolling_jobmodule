<?php $__env->startSection('heading'); ?>
View Survey
<small>Detail of Survey</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo e(url('/branchadmin/staff-survey')); ?>">Surveys</a></li>
<li class="active">Survey</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="panel panel-default">
        <div class="panel-heading">Survey</div>
        <div class="panel-body">
         
            <div class="row">
              <div class="col-md-10">
                <div class="box box-success border p-10">
                  <div class="form-horizontal">
                  <div class="form-group">
                    <label class="col-md-3 control-label required">Posted By</label>
                    <div class="col-md-9">
                      
                    <input type="text" class="form-control" readonly="readonly" value="<?php echo e(\App\Adjustment_staff::getName($data->adjustment_staff_id)); ?>">
                      
                    </div>
                  </div>
                  <?php ($datas = json_decode($data->others)); ?>
                  <?php foreach($datas as $data): ?>
                  <div class="form-group">
                    <label class="col-md-3 control-label required"><?php echo e($data->title); ?></label>
                    <div class="col-md-9">
                      
                     <textarea class="form-control" readonly="readonly" name="most" ><?php echo e($data->answer); ?></textarea>
                      
                    </div>
                  </div>
                  <?php endforeach; ?>
                 
                  
                  </div>
                </div>
                
               
                
                
              </div>
              
              
            </div>
            
            
          
          
        </div>
      </div>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>