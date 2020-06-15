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
        <div class="row">

            <a href="<?php echo e(route('googledrive.api.guide')); ?>" target="_blank" class="btn btn-primary right"><i class="fa fa-file"></i>  How to setup Drive API</a>
        </div>
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Enter API details
                    <a href="https://console.developers.google.com/" target="_blank" class="btn btn-primary">Google API console</a>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('googledrive.api.update')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="staff_id" value="<?php echo e(auth()->guard('staffs')->user()->id); ?>">
                        <div class="row">
                         <div class="col-md-10">
                            <div class="form-group<?php echo e($errors->has('client_id') ? ' has-error' : ''); ?>">
                                <label class="col-md-2 control-label required">Client ID</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="client_id" value="<?php echo e($data->client_id); ?>">
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
                                    <input type="text" class="form-control" name="client_secret" value="<?php echo e($data->client_secret); ?>">
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
                            <div class="form-group<?php echo e($errors->has('refresh_token') ? ' has-error' : ''); ?>">
                                <label class="col-md-2 control-label required">Refresh Token</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="refresh_token" value="<?php echo e($data->refresh_token); ?>">
                                    <?php if($errors->has('refresh_token')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('refresh_token')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                         <div class="col-md-10">
                            <div class="form-group<?php echo e($errors->has('drive_folder_id') ? ' has-error' : ''); ?>">
                                <label class="col-md-2 control-label required">Drive Folder ID</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="drive_folder_id" value="<?php echo e($data->drive_folder_id); ?>">
                                    <?php if($errors->has('drive_folder_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('drive_folder_id')); ?></strong>
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