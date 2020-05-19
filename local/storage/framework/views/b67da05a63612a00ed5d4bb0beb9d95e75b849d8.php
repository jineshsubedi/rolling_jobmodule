<?php $__env->startSection('heading'); ?>
Exit Interview
<small>List of Exit Interview</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Exit Interview</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
      <a href="<?php echo e(url('/staffs/interview/addnew')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-plus-circle"></i> New Exit Interview</a>
    </div>
    </div>
    <div class="box">
      <div class="box-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>S.N.</th>
              <th> Name</th>
              <th>Received By</th>
              <th>Received Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
            <?php $i=1;
            foreach ($datas['interview'] as $row) { ?>
            <tr>
              <td><?php echo $i++ ;?></td>
              <td><?php echo $row->staffs_name;?></td>
              <td><?php echo e($row->received_by); ?></td>
              <td><?php echo e($row->interview_date); ?></td>
              <td><a href="<?php echo e(url('/staffs/interview/edit/'.$row->id)); ?>" class="btn btn-primary left"><i class="fa fa-edit"></i></a>
                <a href="<?php echo e(url('/staffs/interview/view/'.$row->id)); ?>" target="_blank" class="btn btn-success left"><i class="fa fa-eye"></i></a>
              <a href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($row->id); ?>')" class="btn btn-danger left"><i class="fa fa-fw fa-remove"></i></a></td>
            </tr>
            <?php  }
            ?>
            
          </table>
        </div>
        
        </div><!-- /.box-body -->
      </div>
    </div>
    <div>
      <div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="dataTables_paginate paging_simple_numbers right">
            <?php echo $datas['interview']->render();?>
          </div>
        </div>
      </div>
      <script type="text/javascript">
      function confirm_delete(ids){
      if(confirm('Do You Want To Delete This Exit Interview?')){
      var url= "<?php echo e(url('/staffs/interview/delete/')); ?>"+ids;
      location = url;
      }
      }
      </script>
      <?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>