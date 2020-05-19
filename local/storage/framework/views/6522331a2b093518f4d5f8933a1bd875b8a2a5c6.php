<?php $__env->startSection('heading'); ?>
Notice Edit
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Notice Edit</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-title">
            <h3>Notice Edit</h3>
        </div>
      <div class="box-body">
      <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('staffs.notice.update', $notice->id)); ?>">
        <?php echo csrf_field(); ?>

        <?php echo method_field('PUT'); ?>

       <div class="row">
            <div class="col-md-10" id="multiCategory">
                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Title</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo e($notice->title); ?>" placeholder="Notice Title">
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
                        <textarea name="description" id="description" class="form-control"><?php echo e($notice->description); ?></textarea>
                        <?php if($errors->has('description')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('description')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('publish_date') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Publish Date</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control datepicker" id="publish_date" name="publish_date" value="<?php echo e($notice->publish_date); ?>" placeholder="Notice publish_date" autocomplete="off">
                        <?php if($errors->has('publish_date')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('publish_date')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('to_date') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">To Date</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control datepicker" id="to_date" name="to_date" value="<?php echo e($notice->to_date); ?>" placeholder="Notice to_date" autocomplete="off">
                        <?php if($errors->has('to_date')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('to_date')); ?></strong>
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