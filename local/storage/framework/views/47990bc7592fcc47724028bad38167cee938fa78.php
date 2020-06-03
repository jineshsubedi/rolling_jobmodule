<?php $__env->startSection('heading'); ?>
Job Level
            <small>List of Job Level</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Job Level</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
          <a href="<?php echo e(route('branchadmin.gmail.index')); ?>" class="btn btn-primary"><i class="fa fa-list"></i>Inbox</a>
          <a href="<?php echo e(route('branchadmin.gmail.create')); ?>" class="btn btn-primary right"><i class="fa fa-fw fa-plus"></i>Compose</a>
      </div>
     
      <div class="box">
            <div class="box-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                          <th>From</th>
                          <th>Subject</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; 
                        foreach ($data as $row) { ?>
                          <tr>

                              <?php ($from = $row->getTo()); ?>

                                  <td><?php echo $i++ ;?></td>
                                  <td><?php echo $from[0]['name'];?> (<?php echo e($from[0]['email']); ?>)</td>
                                  <td><?php echo e($row->getSubject()); ?></td>









                      </tr>
                      <?php  }
                      ?>
                    </table>

          </div><!-- /.box-body -->
      </div>
    </div>
  <div>
  <div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
      </div>
    </div>
  </div>
  
  <script type="text/javascript">
    function confirm_delete(ids){
    if(confirm('Do You Want To Delete This joblevel?')){
      var url = "<?php echo e(url('/branchadmin/gmail/"+ids+"/delete')); ?>";
      location = url;
      }
    }
 </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>