<?php $__env->startSection('heading'); ?>
Branch
<span class="blueclr bold">Edit Branch</span>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="active">Branch</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Branch</h3>
            </div>
            <div class="box-body">
            <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('branchadmin.branch.branchUpdate', $branch->id)); ?>">
            <?php echo csrf_field(); ?>

            <?php echo method_field('PUT'); ?>

                <div class="row">
                    <div class="col-md-10" id="multiCategory">
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label required">Branch Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($branch->name); ?>" placeholder="Branch name">
                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>