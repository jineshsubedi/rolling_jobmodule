<?php $__env->startSection('heading'); ?>
Job Level's Detail 
            <small>Detail of Job Level</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo e(url('/branchadmin/job_level')); ?>">Job Levels</a></li>
            <li class="active">Edit Job Level</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Job Level's Detail</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('branchadmin.calendar.update', $data->id)); ?>">
                        <input type="hidden" name="id" value="<?php echo $data->id;?>" />
                        <?php echo csrf_field(); ?>

                        <?php echo method_field('PUT'); ?>

                        <div class="row">
                            <div class="col-md-10">
                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <label class="col-md-2 control-label">Title</label>

                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="title" value="<?php echo e($data['summary']); ?>">

                                    <?php if($errors->has('title')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('title')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-10">
                            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                <label class="col-md-2 control-label required">Description</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="description" value="<?php echo e($data['description']); ?>">
                                    <?php if($errors->has('description')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('description')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                            <div class="col-md-10">
                                <div class="form-group<?php echo e($errors->has('start_date') ? ' has-error' : ''); ?>">
                                    <label class="col-md-2 control-label required">Start Time</label>
                                    <div class="col-md-6">
                                        <input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo e(date('Y-m-d')); ?>" min="value="<?php echo e(date('Y-m-d')); ?>"">
                                        <?php if($errors->has('start_date')): ?>
                                            <span class="help-block">
                                                        <strong><?php echo e($errors->first('start_date')); ?></strong>
                                                    </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="time"  name="start_time" class="form-control" value="10:00">
                                        <?php if($errors->has('start_time')): ?>
                                            <span class="help-block">
                                                        <strong><?php echo e($errors->first('start_time')); ?></strong>
                                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group<?php echo e($errors->has('end_date') ? ' has-error' : ''); ?>">
                                    <label class="col-md-2 control-label required">End Time</label>
                                    <div class="col-md-6">
                                        <input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo e(date('Y-m-d')); ?>" min="value="<?php echo e(date('Y-m-d')); ?>"">
                                        <?php if($errors->has('end_date')): ?>
                                            <span class="help-block">
                                                        <strong><?php echo e($errors->first('end_date')); ?></strong>
                                                    </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="time"  name="end_time" class="form-control" value="12:00">
                                        <?php if($errors->has('end_time')): ?>
                                            <span class="help-block">
                                                        <strong><?php echo e($errors->first('end_time')); ?></strong>
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