<?php $__env->startSection('heading'); ?>
Staffs salary
            <small>List of Staffs salary</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Staffs salary</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <div class="row">
        <a href="<?php echo e(url('/supervisor/staff_salary/addsalary/'.$staff)); ?>" class="btn refreshbtn right btm10m rt15m"><i class="fa fa-fw fa-plus"></i>Add Salary</a>
      </div>
        <div class="box">
            <div class="box-body">
              <div class="box-header with-border">
                  <h3 class="box-title">Staff Salary</h3>
              </div>
              <table class="table table-bordered">
                  <tr>
                    <th>S.N.</th>
                    <th>Base Salary</th>
                    <th>Basic Salary</th>
                    <th>Action</th>
                  </tr>
                  <?php foreach($salaries as $k=>$salary): ?>
                  <tr>
                    <th><?php echo e($k+1); ?></th>
                    <th><?php echo e($salary->base_salary); ?></th>
                    <th><?php echo e($salary->basic_salary); ?></th>
                    <th>
                      <a href="<?php echo e(url('supervisor/staff_salary/editsalary/'.$salary->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo e(url('supervisor/staff_salary/deletesalary/'.$salary->id)); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </th>
                  </tr>
                  <?php endforeach; ?>
              </table>
            </div><!-- /.box-body -->
        </div>
    </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="dataTables_paginate paging_simple_numbers right">
        <?php echo e($salaries->links()); ?>

    </div>
  </div>
</div>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>