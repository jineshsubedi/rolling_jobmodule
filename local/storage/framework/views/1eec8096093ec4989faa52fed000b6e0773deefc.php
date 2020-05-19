<?php $__env->startSection('heading'); ?>
Offboarding Staff
<small>Edit of Terminate user</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Termination</li>
<li class="active">create</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- <script src="<?php echo e(asset('assets/ckeditor/ckeditor.js')); ?>"></script> -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Edit Termination of Staff</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal"
                    action="<?php echo e(route('supervisor.termination.updateTermination',$termination->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo e(method_field('PUT')); ?>

                    <div id="staff" class="form-group <?php echo e($errors->has('staff') ? ' has-error' : ''); ?>">
                        <label class="col-md-3 control-label">Staff:</label>
                        <div class="input-form">
                            <div class="col-md-9">
                                <select name="staff" class="form-control select2 @error('staff') is-invalid @enderror"
                                    style="width: 100%;">
                                    <option value="null">Select Staff</option>
                                    <?php foreach($staffs as $staff): ?>
                                    <option value="<?php echo e($staff->id); ?>" <?php if($staff->id==$termination->staff_id): ?>
                                        selected <?php endif; ?>><?php echo e($staff->name); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>
                        <?php if($errors->has('staff')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('staff')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <input type="hidden" name="branch" value="<?php echo e(auth()->guard('staffs')->user()->branch); ?>">
                    <input type="hidden" name="start_date" value="<?php echo e(\Carbon\Carbon::now()->format('Y-m-d')); ?>">
                    <div id="termination_detail"
                        class="form-group <?php echo e($errors->has('termination_detail') ? ' has-error' : ''); ?>">
                        <label class="col-md-3 control-label">Termination Detail:</label>
                        <div class="input-form">
                            <div class="col-md-9">
                                <textarea id="description_terination" name="termination_detail"
                                    class="form-control @error('branch') is-invalid @enderror"><?php echo e($termination->termination_detail); ?></textarea>
                            </div>
                        </div>
                        <?php if($errors->has('termination_detail')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('termination_detail')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div id="end_date" class="form-group <?php echo e($errors->has('end_date') ? ' has-error' : ''); ?>">
                        <label class="col-md-3 control-label">End Date:</label>
                        <div class="input-form">
                            <div class="col-md-9">
                                <input name="end_date" id="datepicker" type="text"
                                    class="form-control @error('end_date') is-invalid @enderror"
                                    value="<?php echo e($termination->end_date); ?>"
                                    placeholder="<?php echo e(\Carbon\Carbon::today()->format('Y-m-d')); ?>" autocomplete="off">
                            </div>
                        </div>
                        <?php if($errors->has('end_date')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('end_date')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary tp10m">
                            Submit
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-m-d',
        });
        CKEDITOR.replace('description_terination');
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>