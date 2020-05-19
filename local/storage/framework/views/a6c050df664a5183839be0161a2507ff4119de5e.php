<?php $__env->startSection('heading'); ?>
Staff
<small>Create of Staff History</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Staff</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel-heading">
                <h4>Create Staff History</h4>
            </div>
            <div class="box-body">
                <form class="form-horizontal" action="<?php echo e(route('staffs.emp_history.update', [$adjustment_staff->id, $history->id])); ?>"
                    method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" name="staff_id" id="staff_id" value="<?php echo e($adjustment_staff->id); ?>">
                    <input type="hidden" name="department" id="staff_id" value="<?php echo e($adjustment_staff->department); ?>">
                    <div class="col-md-8 btm10m">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Staff Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo e($adjustment_staff->name); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group <?php echo e($errors->has('type') ? ' has-error' : ''); ?>">
                            <label class="col-md-3 control-label">Service Type</label>
                            <div class="col-md-9">
                                <select class="form-control" id="type" name="type">
                                    <option value="">Select type</option>
                                    <option value="1" <?php if($history->type==1): ?> selected <?php endif; ?>>Department Transfer</option>
                                    <option value="2" <?php if($history->type==2): ?> selected <?php endif; ?>>Branch Transfer</option>
                                    <option value="3" <?php if($history->type==3): ?> selected <?php endif; ?>>Designation Change</option>
                                    <option value="4" <?php if($history->type==4): ?> selected <?php endif; ?>>Status Change</option>
                                    <option value="5" <?php if($history->type==5): ?> selected <?php endif; ?>>Salary Increment/Revised</option>
                                </select>
                                <?php if($errors->has('type')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('type')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Previous</label>
                            <div class="col-md-9" id="previous">
                                <input type="text" name="previous" class="form-control" autocomplete="off" value="<?php echo e($history->previous); ?>">
                                <?php if($errors->has('previous')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('previous')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Current</label>
                            <div class="col-md-9" id="current">
                                <input type="text" id="current" name="current" class="form-control" autocomplete="off" value="<?php echo e($history->current); ?>">
                                <?php if($errors->has('current')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('current')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Promoted Date</label>
                            <div class="col-md-9">
                                <input type="text" id="datepicker" name="promoted_date" class="form-control datepicker" placeholder="date" autocomplete="off" value="<?php echo e($history->promoted_date); ?>">
                                <?php if($errors->has('promoted_date')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('promoted_date')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary tp10m">
                                Submit
                                <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.datepicker').datepicker();
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var token = $('input[name=\'_token\']').val();
        var type = $('#type').val();
        if(type != ''){
            typeChange(type)
        }
        $('#type').on('change', function(){
            var type = $(this).val();
            typeChange(type)
        })
        function typeChange(type)
        {
            if(type == 1)
            {
                var departments = '<?php echo $departments; ?>';
                departments = JSON.parse(departments)
                var previousHtml = '<select name="previous" class="form-control"><option value="<?php echo e($history->previous); ?>"><b><?php echo e($history->previous); ?></b></option>';
                for(var i=0; i<=departments.length; i++){
                    previousHtml += '<option value="'+departments[i]+'">'+departments[i]+'</option>';
                }
                previousHtml += '</select>';
                var currentHtml = '<select name="current" class="form-control"><option value="<?php echo e($history->current); ?>"><b><?php echo e($history->current); ?></b></option>';
                for(var i=0; i<=departments.length; i++){
                    currentHtml += '<option value="'+departments[i]+'">'+departments[i]+'</option>';
                }
                currentHtml += '</select>';
                $('#previous').html(previousHtml);
                $('#current').html(currentHtml);
            } 
            if(type == 2)
            {
                var branches = '<?php echo $branches; ?>';
                branches = JSON.parse(branches)
                var previousHtml = '<select name="previous" class="form-control"><option value="<?php echo e($history->previous); ?>"><b><?php echo e($history->previous); ?></b></option>';
                for(var i=0; i<=branches.length; i++){
                    previousHtml += '<option value="'+branches[i]+'">'+branches[i]+'</option>';
                }
                previousHtml += '</select>';
                var currentHtml = '<select name="current" class="form-control"><option value="<?php echo e($history->current); ?>"><b><?php echo e($history->current); ?></b></option>';
                for(var i=0; i<=branches.length; i++){
                    currentHtml += '<option value="'+branches[i]+'">'+branches[i]+'</option>';
                }
                currentHtml += '</select>';
                $('#previous').html(previousHtml);
                $('#current').html(currentHtml);
            }
            if(type == 3)
            {
                var designations = '<?php echo $designations; ?>';
                designations = JSON.parse(designations)
                var previousHtml = '<select name="previous" class="form-control"><option value="<?php echo e($history->previous); ?>"><b><?php echo e($history->previous); ?></b></option>';
                for(var i=0; i<=designations.length; i++){
                    previousHtml += '<option value="'+designations[i]+'">'+designations[i]+'</option>';
                }
                previousHtml += '</select>';
                var currentHtml = '<select name="current" class="form-control"><option value="<?php echo e($history->current); ?>"><b><?php echo e($history->current); ?></b></option>';
                for(var i=0; i<=designations.length; i++){
                    currentHtml += '<option value="'+designations[i]+'">'+designations[i]+'</option>';
                }
                currentHtml += '</select>';
                $('#previous').html(previousHtml);
                $('#current').html(currentHtml);
            }  
            if(type == 4)
            {
                var previousHtml = '<select name="previous" class="form-control"><option value="">Select Status</option><option value="Temporary" <?php if($history->previous == "Temporary"): ?> selected <?php endif; ?>>Temporary</option><option value="Permanent">Permanent <?php if($history->previous == "Permanent"): ?> selected <?php endif; ?>></option></select>';
                
                var currentHtml = '<select name="current" class="form-control"><option value="">Select Status</option><option value="Temporary" <?php if($history->current == "Temporary"): ?> selected <?php endif; ?>>Temporary</option><option value="Permanent" <?php if($history->current == "Permanent"): ?> selected <?php endif; ?>>Permanent</option></select>';
                
                $('#previous').html(previousHtml);
                $('#current').html(currentHtml);
            }
            if(type==5)
            {
                var previousHtml = '<input type="text" name="previous" class="form-control" placeholder="Rs. 3000" value="<?php echo e($history->previous); ?>" />'
                var currentHtml = '<input type="text" name="current" class="form-control" placeholder="Rs. 3000" value="<?php echo e($history->current); ?>"/>'
                $('#previous').html(previousHtml);
                $('#current').html(currentHtml);
            }
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>