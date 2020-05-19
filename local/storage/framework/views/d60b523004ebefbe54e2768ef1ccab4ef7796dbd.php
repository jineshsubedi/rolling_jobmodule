<?php $__env->startSection('heading'); ?>
Jobs
            <small>List of Jobs</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Jobs</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xs-12">
      <div class="row">
        <a href="#" class="btn btn-primary right"><i class="fa fa-fw fa-plus"></i>Add New Jobs</a>
      </div>
     
      <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Jobs</h3>
        </div>
        <div class="box-body">
                  

        </div>
      </div>
    </div>
<div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>