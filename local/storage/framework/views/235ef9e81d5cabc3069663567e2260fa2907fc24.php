<?php $__env->startSection('heading'); ?>
Staffs
            <small>List of Staffs</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Staffs</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-md-12">
        </div>
      </div>
     
        <div class="box">
            <div class="box-body">
            <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td><input type="text" class="form-control" name="filter_name" id="filter_name" value="<?php echo e($datas['filter_name']); ?>"></td>
                      <td><a class="btn refreshbtn" onClick="filterData()"><i class="fa fa-search"></i> Filter</a></td>
                      </tr>
                      <?php $i=1; 
                        foreach ($datas['staffs'] as $row) { ?>
                          <tr>
                        <td><?php echo $i++ ;?></td>
                       
                       <td><img src="<?php echo e(\App\Adjustment_staff::getImage($row->id)); ?>" class="img-circle" style="height: 50px;"></td>
                       <td><?php echo e($row->name); ?></td>
                        <td>
                          <a  href="<?php echo e(url('/supervisor/staff_salary/'.$row->id)); ?>" class="btn btn-success left">Salary</a>
                        </td>
                      </tr>
                      <?php  }
                      ?>
                    </table>
            </div><!-- /.box-body -->
        </div>
    </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="dataTables_paginate paging_simple_numbers right">
        <?php echo $datas['staffs']->render();?>
    </div>
  </div>
</div>
<script type="text/javascript">
  function filterData()
  {
    var url= "<?php echo e(url('/supervisor/staff_salary/?')); ?>";
    var filter_name=$('#filter_name').val();
    if(filter_name != '') {
      url += '?filter_name='+filter_name
    }
    location = url;
  }
</script>

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>