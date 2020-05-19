<?php $__env->startSection('heading'); ?>
Edit Training Program
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Edit Training Program</li>
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
            <h3 class="box-title">Edit Training Program</h3>
        </div>
      <div class="box-body">
      <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('staffs.training_program.update', $program->id)); ?>">
        <?php echo csrf_field(); ?>

        <?php echo method_field('PUT'); ?>

       <div class="row">
            <div class="col-md-12">
                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Title</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo e($program->title); ?>">
                        <?php if($errors->has('title')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('title')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">status</label>
                    <div class="col-md-8">
                        <select name="status" id="status" class="form-control select2">
                            <option value="">Select Status</option>
                            <option value="0" <?php if($program->status==0): ?> selected <?php endif; ?>>Active</option>
                            <option value="1" <?php if($program->status==1): ?> selected <?php endif; ?>>InAvtive</option>
                        </select>
                        <?php if($errors->has('status')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('status')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12 col-md-offset-4">
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