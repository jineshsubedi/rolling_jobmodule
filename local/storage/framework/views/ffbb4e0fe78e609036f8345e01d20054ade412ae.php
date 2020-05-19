<?php $__env->startSection('heading'); ?>
Branch
<span class="blueclr bold">List of Branch</span>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="active">Branch</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo e(route('branchadmin.branch.branchCreate')); ?>" class="btn refreshbtn right btm10m"><i
                    class="fa fa-fw fa-plus"></i>Add Branch</a>
            </div>
        </div>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Branch</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Staffs</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($branches as $k=>$branch): ?>
                    <tr>
                        <td><?php echo e($k+1); ?></td>
                        <td><?php echo e($branch->name); ?></td>
                        <td><?php echo e($branch->staffs); ?></td>
                        <td>
                        <form action="<?php echo e(route('branchadmin.branch.branchDelete', $branch->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <?php echo method_field('DELETE'); ?>

                            <a href="<?php echo e(route('branchadmin.branch.branchEdit', $branch->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            <?php if(!\App\Branch::isParent($branch->id)): ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this branch?');"><i class="fa fa-trash"></i></button>
                            <?php endif; ?>
                        </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <div class="text-center">
                    <?php echo e($branches->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>