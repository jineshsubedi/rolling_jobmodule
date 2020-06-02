<?php $__env->startSection('heading'); ?>
New Job Level 
            <small>Detail of New Job Level</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo e(url('/branchadmin/job_level')); ?>">Job Levels</a></li>
            <li class="active">Compose Mail</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Compose Mail</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('branchadmin.gmail.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-md-10">
                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label class="col-md-2 control-label">Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">
                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                         </div>
                            <div class="col-md-10">
                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <label class="col-md-2 control-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">

                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-10">
                                <div class="form-group<?php echo e($errors->has('subject') ? ' has-error' : ''); ?>">
                                    <label class="col-md-2 control-label">Subject</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="subject" value="<?php echo e(old('subject')); ?>">

                                        <?php if($errors->has('subject')): ?>
                                            <span class="help-block">
                                            <strong><?php echo e($errors->first('subject')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-10">
                                <div class="form-group<?php echo e($errors->has('message') ? ' has-error' : ''); ?>">
                                    <label class="col-md-2 control-label">Message</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="message"  cols="30" rows="8"></textarea>

                                        <?php if($errors->has('message')): ?>
                                            <span class="help-block">
                                            <strong><?php echo e($errors->first('message')); ?></strong>
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