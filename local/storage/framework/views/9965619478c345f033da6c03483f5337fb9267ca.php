<?php $__env->startSection('heading'); ?>
Asset Setting
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Asset Setting</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('branchadmin.onboard_setting.create')); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-plus"></i>Add Asset Setting</a>
      </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Asset Setting</h3>
        </div>
      <div class="box-body">
        <table class="table table-borderd">
            <tr>
                <th>SN</th>
                <th>Particular</th>
                <th>Department</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
            <?php foreach($settings as $k=>$setting): ?>
            <tr>
                <td><?php echo e($k+1); ?></td>
                <td><?php echo e($setting->particular); ?></td>
                <td><?php echo e(\App\Department::getTitle($setting->department_id)); ?></td>
                <td><?php echo e(\App\ObType::getTitle($setting->type)); ?></td>
                <td>
                    <form action="<?php echo e(route('branchadmin.onboard_setting.destroy', $setting->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                        <a href="<?php echo e(route('branchadmin.onboard_setting.edit', $setting->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="text-center">
            <?php echo e($settings->links()); ?>

        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>