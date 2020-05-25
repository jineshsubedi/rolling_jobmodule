<?php $__env->startSection('heading'); ?>
    Selected Application for Final Selection
    <small>Callig for Zoom meeting</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
    <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Selected Application for Zoom meeting</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="panel panel-default">
                    <div class="panel-heading">Callig Zoom meetig</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(url('/branchadmin/jobs/application/meeting/')); ?>">
                            <?php echo csrf_field(); ?>

                            <input type="hidden"  name="id" value="<?php echo e($datas['employee']->id); ?>">
                            <input type="hidden"  name="job_id" value="<?php echo e($datas['job_id']); ?>">
                            <input type="hidden"  name="tab_id" value="<?php echo e($datas['tab_id']); ?>">
                                <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group<?php echo e($errors->has('topic') ? ' has-error' : ''); ?>">
                                        <label class="col-md-2 control-label required">Topic</label>

                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="topic" value="<?php echo e(old('topic')); ?>">

                                            <?php if($errors->has('topic')): ?>
                                                <span class="help-block">
                                                <strong><?php echo e($errors->first('topic')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                        <label class="col-md-2 control-label required">Password</label>

                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="password" placeholder="maximum 10 character" value="<?php echo e(old('password')); ?>">

                                            <?php if($errors->has('password')): ?>
                                                <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('start_date') ? ' has-error' : ''); ?>">
                                        <label class="col-md-2 control-label required">Start Time</label>
                                        <div class="col-md-6">
                                            <input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo e(date('Y-m-d')); ?>" min="value="<?php echo e(date('Y-m-d')); ?>"">
                                            <?php if($errors->has('deadline')): ?>
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
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-fw fa-save"></i>Call meeting
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(function() {
            $('#start_date').datepicker();
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>