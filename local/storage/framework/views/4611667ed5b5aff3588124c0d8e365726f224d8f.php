<?php $__env->startSection('heading'); ?>
Staff
<small>List of Staff History</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Staff</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xs-12">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title" style="font-size: 16px; font-weight: 600"><?php echo e($staff->name); ?> Service History</h3>
                <a href="<?php echo e(route('branchadmin.emp_history.create',Request::segment(4))); ?>" class="btn refreshbtn right btm10m"><i
                            class="fa fa-fw fa-plus"></i>Add Staff History</a>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Service Type</th>
                            <th>Department</th>
                            <th>Previous</th>
                            <th>Current</th>
                            <th>Promoted Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($services as $k=>$history): ?>
                        <tr>
                            <td><?php echo e($k+1); ?></td>
                            <td>
                                <?php if($history->type==1): ?>
                                    <?php echo e('Department Transfer'); ?>

                                <?php elseif($history->type==2): ?>
                                    <?php echo e('Branch Transfer'); ?>

                                <?php elseif($history->type==3): ?>
                                    <?php echo e('Designation Change'); ?>

                                <?php elseif($history->type==4): ?>
                                    <?php echo e('Status Change'); ?>

                                <?php elseif($history->type==5): ?>
                                    <?php echo e('Salary Increment'); ?>

                                <?php elseif($history->type==6): ?>
                                    <?php echo e('Salary Revised'); ?>

                                <?php else: ?>
                                (Not Assigned)
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($history->department); ?></td>
                            <td><?php echo e($history->previous); ?></td>
                            <td><?php echo e($history->current); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($history->promoted_date)->format('d F, Y')); ?></td>
                            <td>
                                <form
                                    action="<?php echo e(route('branchadmin.emp_history.delete',[$staff->id,$history->id])); ?>"
                                    method="post">
                                    <?php echo csrf_field(); ?>

                                    <?php echo e(method_field('DELETE')); ?>

                                    <a href="<?php echo e(route('branchadmin.emp_history.edit',[$staff->id,$history->id])); ?>"
                                        class="btn btn-sm btn-info">EDIT</a>
                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div><!-- /.box-body -->
        </div>
    </div>
    <div>

        <div>
        </div>
        <script type="text/javascript">

        </script>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>