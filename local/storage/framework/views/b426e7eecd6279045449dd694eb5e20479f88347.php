<?php $__env->startSection('heading'); ?>
Training Type Create
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Training Type Create</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-title">
            <h3>Training Type Create</h3>
        </div>
      <div class="box-body">
      <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('branchadmin.trainer.store')); ?>">
        <?php echo csrf_field(); ?>

       <div class="row">
            <div class="col-md-10" id="multiCategory">
                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>" placeholder="Trainer Name">
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
                        <input type="text" class="form-control" id="designation" name="designation" value="<?php echo e(old('designation')); ?>" placeholder="Trainer designation">
                        <?php if($errors->has('designation')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('designation')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('rate') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Rate</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="rate" name="rate" value="<?php echo e(old('rate')); ?>" placeholder="0.00">
                        <?php if($errors->has('rate')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('rate')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('charge_type') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Charge Type</label>
                    <div class="col-md-8">
                        <select name="charge_type" id="charge_type" class="form-control">
                            <option value="">Select Type</option>
                            <option value="1">Per Training</option>
                            <option value="2">Per Session</option>
                            <option value="3">Per Hour</option>
                        </select>
                        <?php if($errors->has('charge_type')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('charge_type')); ?></strong>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>