<?php $__env->startSection('heading'); ?>
Resignation
<small>Create Resignation</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Resignation</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- <script src="<?php echo e(asset('assets/plugins/ckeditor/ckeditor.js')); ?>"></script> -->
<div class="row">
    <div class="col-xs-12">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Create Resignation</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" action="<?php echo e(route('staffs.resignation.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="staff" value="<?php echo e(auth()->guard('staffs')->user()->id); ?>">
                    <input type="hidden" name="branch" value="<?php echo e(auth()->guard('staffs')->user()->branch); ?>">
                    <input type="hidden" name="supervisor" value="<?php echo e(auth()->guard('staffs')->user()->supervisor); ?>">
                    <div id="resignation_detail" class="form-group <?php echo e($errors->has('staff') ? ' has-error' : ''); ?>">
                        <label class="col-md-3 control-label">Resignation detail:</label>
                        <div class="input-form">
                            <div class="col-md-9">
                                <textarea name="resignation_detail" id="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <?php if($errors->has('resignation_detail')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('resignation_detail')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <input name="resignation_date" type="hidden" value="<?php echo e(Date('Y-m-d')); ?>">
                    <div class="form-group">
                        <input type="submit" value="SUBMIT" class="btn btn-primary">
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div>
    </div>
</div>

<script type="text/javascript">
    CKEDITOR.replace('description');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>