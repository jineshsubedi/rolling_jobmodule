<?php $__env->startSection('heading'); ?>
Job Level
            <small>List of Job Level</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Job Level</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
          <a href="<?php echo e(route('branchadmin.gmail.create')); ?>" class="btn btn-primary right"><i class="fa fa-fw fa-plus"></i>Compose</a>

      </div>
     
      <div class="box">
            <div class="box-body">
                <?php ($from = $data->getFrom()); ?>
                <span><?php echo $from['name'];?> (<?php echo e($from['email']); ?>)</span>
                <h1><?php echo e($data->getSubject()); ?></h1>
                <div>
                    <?php echo $data->getHtmlBody(); ?>

                </div>

          </div><!-- /.box-body -->
      </div>
    </div>
  <div>
  <div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
      </div>
    </div>
  </div>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>