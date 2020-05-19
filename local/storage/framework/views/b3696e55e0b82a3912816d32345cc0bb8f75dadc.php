<?php $__env->startSection('heading'); ?>
Training Type Create
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Training Type Create</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/select2/css/select2.css')); ?>">
<style>
    .select2-selection__rendered{line-height: 20px !important;}
</style>
<script src="<?php echo e(asset('assets/select2/js/select2.js')); ?>"></script>
<div class="row">
  <div class="col-xs-8">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">New Trainer</h3>
        </div>
      <div class="box-body">
      <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('staffs.training.trainer.update', $trainer->id)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <?php echo method_field('PUT'); ?>

       <div class="row">
            <div class="col-md-12" id="multiCategory">
                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e($trainer->name); ?>" placeholder="Trainer Name">
                        <?php if($errors->has('name')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('name')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('designation') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Designation</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="designation" name="designation" value="<?php echo e($trainer->designation); ?>" placeholder="Trainer designation">
                        <?php if($errors->has('designation')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('designation')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-group<?php echo e($errors->has('rate') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Rate</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="rate" name="rate" placeholder="0.00" value="<?php echo e($trainer->rate); ?>">
                        <?php if($errors->has('rate')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('rate')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <select name="charge_type" id="charge_type" class="form-control select2">
                            <option value="">Select Type</option>
                            <option value="1" <?php if($trainer->charge_type == 1): ?> selected <?php endif; ?>>Per Training</option>
                            <option value="2" <?php if($trainer->charge_type == 2): ?> selected <?php endif; ?>>Per Session</option>
                            <option value="3" <?php if($trainer->charge_type == 3): ?> selected <?php endif; ?>>Per Hour</option>
                        </select>
                        <?php if($errors->has('charge_type')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('charge_type')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('cv') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Charge Type</label>
                    <div class="col-md-8">
                        <input type="file" name="cv" class="form-control">
                        <?php if($trainer->cv): ?>
                        <a href="<?php echo e(asset('image/'.$trainer->cv)); ?>">
                            <img src="<?php echo e(asset('image/ms-word.png')); ?>" width="100px">
                        </a>
                        <?php endif; ?>
                        <?php if($errors->has('cv')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('cv')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
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
  <script>
      $('.select2').select2();
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>