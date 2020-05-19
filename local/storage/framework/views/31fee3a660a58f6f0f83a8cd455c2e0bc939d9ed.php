<?php $__env->startSection('heading'); ?>
Salary
            <small>Salary List of <?php echo e($data['name']); ?></small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Salary</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-md-12">
        <a href="<?php echo e(url('/branchadmin/otstaff/addsalary/'.$data["staff_id"])); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-plus-circle"></i> Add Salary</a>
      </div>
      </div>
     
      <div class="box">
            <div class="box-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th>Base Salary</th>
                        <th>Basic Salary</th>
                        <th>Total Salary</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                    
                      <?php $i=1; 
                        foreach ($data['salary'] as $row) {  ?>
                         
                          <tr>
                        <td><?php echo $i++ ;?></td>
                      
                        <td><?php echo e($row->base_salary); ?></td>
                        <td><?php echo e($row->basic_salary); ?></td>
                       <td><?php echo e($row->total_salary); ?></td>
                        <td>
                          <a href="<?php echo e(url('/branchadmin/otstaff/editsalary/'.$row->id)); ?>" class="btn btn-success left"><i class="fa fa-eye"></i>Edit</a>
                          <button type="button" class="btn btn-danger" onclick="confirm_delete('<?php echo e($row->id); ?>')"><i class="fa fa-trash"></i></button>
                        </td>
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
          <?php echo $data['salary']->render();?>
      </div>
    </div>
  </div>
  <script type="text/javascript">

 
     function confirm_delete(ids){
    if(confirm('Do You Want To Delete This Payroll?')){
      var url= "<?php echo e(url('/branchadmin/otstaff/salary/delete/')); ?>/"+ids;
      location = url;
      
      }
    }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>