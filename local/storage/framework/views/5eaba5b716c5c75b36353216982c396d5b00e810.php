<?php $__env->startSection('heading'); ?>
Staff Servey
<small>List of Staff Servey</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Staff Servey</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <a href="<?php echo e(url('/staffs/staff-survey/addnew')); ?>" class="btn btn-primary right"><i class="fa fa-fw fa-plus"></i>Add New Survey</a>
    </div>
    
    <div class="box">
      <div class="box-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>S.N.</th>
              <th> Branch</th>
              <th>Staff</th>
             
             
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
            
            <?php $i=1;
            foreach ($datas['surveys'] as $row) { ?>
            <tr>
              <td><?php echo $i++ ;?></td>
              <td><?php echo e(\App\Branch::gettitle($row->branch_id)); ?></td>
              <td><?php echo e(\App\Adjustment_staff::getName($row->adjustment_staff_id)); ?></td>
            
             
              <td><?php echo e($row->created_at); ?></td>
              <td>
               
                <a href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($row->id); ?>')" class="btn btn-danger left"><i class="fa fa-fw fa-remove"></i></a>
                <a href="<?php echo e(url('/staffs/staff-survey/view/'.$row->id)); ?>" class="btn btn-success left"><i class="fa fa-fw fa-eye"></i></a>
              </td>
              </tr>
             
             
            <?php  }    ?>
            
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
              <?php echo $datas['surveys']->render();?>
            </div>
          </div>
        </div>
        
        <script type="text/javascript">
        
        function confirm_delete(ids){
        if(confirm('Do You Want To Delete This Suggestion?')){
        var url= "<?php echo e(url('/staffs/staff-survey/delete/')); ?>"+ids;
        location = url;
        
        }
        }
       

       

         $('#filter_year').on('change', function(){
          
          var filter_year = $('#filter_year').val();
          var filter_month = $('#filter_month').val();
          
          var url = '<?php echo e(url("/staffs/staff-survey?")); ?>';
         
          if (filter_year != '') {
            url += '&filter_year='+filter_year;
          }
           if (filter_month != '') {
            url += '&filter_month='+filter_month;
          }
           
          location = url;
        })

          $('#filter_month').on('change', function(){
          
          var filter_year = $('#filter_year').val();
          var filter_month = $('#filter_month').val();
          
          var url = '<?php echo e(url("/staffs/staff-survey?")); ?>';
          
          if (filter_year != '') {
            url += '&filter_year='+filter_year;
          }
           if (filter_month != '') {
            url += '&filter_month='+filter_month;
          }
           
          location = url;
        })

        
         

        </script>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>