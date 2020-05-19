<?php $__env->startSection('heading'); ?>
Holidays
            <small>List of Holidays</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Holidays</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-md-12">
        <a href="<?php echo e(url('/branchadmin/holiday/addnew')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-plus-circle"></i> Add New Holiday</a>
      </div>
      </div>
     
      <div class="box">
            <div class="box-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th> Title</th>
                        <th> Date</th>
                          
                       
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      
                      <?php $i=1; 
                        foreach ($datas as $row) { ?>
                          <tr>
                        <td><?php echo $i++ ;?></td>
                        <td><?php echo $row->title;?></td>
                        <td><?php echo $row->holiday;?></td>
                      
                        <td><a href="<?php echo e(url('/branchadmin/holiday/edit/'.$row->id)); ?>" class="btn btn-primary left"><i class="fa fa-edit"></i></a>
                          <a href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($row->id); ?>')" class="btn btn-danger left"><i class="fa fa-fw fa-remove"></i></a></td>
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
          <?php echo $datas->render();?>
      </div>
    </div>
  </div>
  <script type="text/javascript">

 
     function confirm_delete(ids){
    if(confirm('Do You Want To Delete This Holiday?')){
      var url= "<?php echo e(url('/branchadmin/holiday/delete/')); ?>"+ids;
      location = url;
      
      }
    }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>