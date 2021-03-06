<?php $__env->startSection('heading'); ?>
New Job Level 
            <small>Detail of New Job Level</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Google API</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Enter API details</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('gmail.api.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="staff_id" value="<?php echo e(auth()->guard('staffs')->user()->id); ?>">
                        <div class="row">
                         <div class="col-md-10">
                            <div class="form-group<?php echo e($errors->has('project_id') ? ' has-error' : ''); ?>">
                                <label class="col-md-2 control-label required">Project ID</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="project_id" value="<?php echo e(old('project_id')); ?>">
                                    <?php if($errors->has('project_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('project_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                         <div class="col-md-10">
                            <div class="form-group<?php echo e($errors->has('client_id') ? ' has-error' : ''); ?>">
                                <label class="col-md-2 control-label required">Client ID</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="client_id" value="<?php echo e(old('client_id')); ?>">
                                    <?php if($errors->has('client_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('client_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        </div>
                         <div class="row">
                         <div class="col-md-10">
                            <div class="form-group<?php echo e($errors->has('client_secret') ? ' has-error' : ''); ?>">
                                <label class="col-md-2 control-label required">Client Secret</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="client_secret" value="<?php echo e(old('client_secret')); ?>">
                                    <?php if($errors->has('client_secret')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('client_secret')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        </div>
                         <div class="row">
                         <div class="col-md-10">
                            <div class="form-group<?php echo e($errors->has('redirect_url') ? ' has-error' : ''); ?>">
                                <label class="col-md-2 control-label required">Redirect URL</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="redirect_url" value="<?php echo e(old('redirect_url')); ?>">
                                    <?php if($errors->has('redirect_url')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('redirect_url')); ?></strong>
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