<?php $__env->startSection('heading'); ?>
Test Question

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Test Question</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('branchadmin.testquestion.create', $id)); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-plus"></i>Add New Question</a>
      </div>
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Test Questions</h3> 
        </div>
      <div class="box-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 1%;">S.N.</th>
              <th>Question</th>
              <th>Exam Title</th>
              <th>Title</th>
              <th>Action</th>
            </tr>
          </thead>
            <?php foreach($questions as $k=>$question): ?>
            <tr>
                <td><?php echo e($k+1); ?></td>
                <td><?php echo e($question->question); ?></td>
                <td><?php echo e(\App\TestExam::getTitle($question->test_exam_id)); ?></td>
                <td>
                    <form action="<?php echo e(route('branchadmin.testquestion.delete', [$id, $question->id])); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                        <a href="<?php echo e(route('branchadmin.testquestion.edit', [$id, $question->id])); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
	        <?php echo e($questions->links()); ?>

	    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>