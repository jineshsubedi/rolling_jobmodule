<?php $__env->startSection('heading'); ?>
Test Exam Detail

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Tasks</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('branchadmin.testexam.create')); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-plus"></i>Add New Exam</a>
      </div>
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Test Exam</h3> 
        </div>
      <div class="box-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 1%;">S.N.</th>
              <th>Category</th>
              <th>Title</th>
              <th>Number of Question</th>
              <th>Publish</th>
              <th>Action</th>
            </tr>
          </thead>
            <?php foreach($exams as $k=>$exam): ?>
            <tr>
                <td><?php echo e($k+1); ?></td>
                <td><?php echo e(\App\TestCategory::getTitle($exam->category_id)); ?></td>
                <td><?php echo e($exam->title); ?></td>
                <td><?php echo e($exam->number_of_question); ?></td>
                <td>
                  <?php if($exam->status == 0): ?>
                  YES
                  <?php else: ?>
                  NO
                  <?php endif; ?>
                </td>
                <td>
                    <form action="<?php echo e(route('branchadmin.testexam.delete', $exam->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                        <a href="<?php echo e(route('branchadmin.testquestion.index', $exam->id)); ?>" class="btn btn-info"> Test Question (<?php echo e($exam->TestQuestions->count()); ?>)</a>
                        <a href="<?php echo e(route('branchadmin.testexam.edit', $exam->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                        <a href="<?php echo e(route('branchadmin.testexam.result', $exam->id)); ?>" class="btn btn-info"> Total Test (<?php echo e(\App\TestExam::countTests($exam->id)); ?>)</a>

                        <?php if($exam->status == 0): ?>
                        <a href="<?php echo e(route('branchadmin.testexam.toggleStatus', [$exam->id, $exam->status])); ?>" class="btn btn-warning">UnPublish</a>
                        <?php else: ?>
                        <a href="<?php echo e(route('branchadmin.testexam.toggleStatus', [$exam->id, $exam->status])); ?>" class="btn btn-success">Publish</a>
                        <?php endif; ?>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
          <tbody>

          </tbody>
        </table>
      </div><!-- /.box-body -->
    </div>
  </div>
<div class="row">
    <div class="col-xs-12">
	    <div class="dataTables_paginate paging_simple_numbers right">
	        <!-- pagination  -->
	        <?php echo e($exams->links()); ?>

	    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>