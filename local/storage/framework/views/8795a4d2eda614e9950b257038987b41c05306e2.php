<?php $__env->startSection('heading'); ?>
New Job Level 
            <small>Detail of New Job Level</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo e(url('/branchadmin/job_level')); ?>">Job Levels</a></li>
            <li class="active">New Job Level</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">New Calendar Event</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('branchadmin.drive.storeinfolder')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="folder_id" value="<?php echo e($folder_id); ?>">
                        <div class="row">
                         <div class="col-md-10">
                            <div class="form-group<?php echo e($errors->has('document') ? ' has-error' : ''); ?>">
                                <label class="col-md-2 control-label required">Document</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control" name="document" value="<?php echo e(old('name')); ?>">
                                    <?php if($errors->has('document')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('document')); ?></strong>
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
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>