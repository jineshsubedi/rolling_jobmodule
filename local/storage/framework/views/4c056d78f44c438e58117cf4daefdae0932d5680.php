<?php $__env->startSection('heading'); ?>
Event Create
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Event Create</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-title">
            <h3>Event Create</h3>
        </div>
      <div class="box-body">
      <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('staffs.event.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

       <div class="row">
            <div class="col-md-10" id="multiCategory">
                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Title</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title')); ?>" placeholder="Event Title">
                        <?php if($errors->has('title')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('title')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Description</label>
                    <div class="col-md-8">
                        <textarea name="description" id="description" class="form-control"><?php echo e(old('description')); ?></textarea>
                        <?php if($errors->has('description')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('description')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('from') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Start Date</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control datepicker" id="from" name="from" value="<?php echo e(old('from')); ?>" placeholder="Notice from" autocomplete="off">
                        <?php if($errors->has('from')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('from')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('to') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">End Date</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control datepicker" id="to" name="to" value="<?php echo e(old('to')); ?>" placeholder="Notice to" autocomplete="off">
                        <?php if($errors->has('to')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('to')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('attachment') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">End Date</label>
                    <div class="col-md-8">
                        <input type="file" class="form-control" name="attachment" id="attachment">
                        <?php if($errors->has('attachment')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('attachment')); ?></strong>
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
    $('.datepicker').datepicker();
    CKEDITOR.replace('description')      
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>