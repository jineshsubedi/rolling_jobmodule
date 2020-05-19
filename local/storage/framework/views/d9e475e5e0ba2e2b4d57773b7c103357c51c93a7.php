<?php $__env->startSection('heading'); ?>
Staff Servey
<small>List of Staff Servey</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Staff Servey</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
      <a href="<?php echo e(url('/branchadmin/staff-survey/addnew')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-plus-circle"></i> Add New Survey</a>
    </div>
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
            <tr>
              <td></td>
              <td>
                <select class="form-control" id="filter_branch" name="filter_branch">
                  <option value="">Select Branch</option>
                  <?php foreach($datas['branches'] as $branch): ?>
                  <?php if($branch->id == $datas['filter_branch']): ?>
                  <option selected="selected" value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </td>
              <td>
                <?php ($sname = \App\Adjustment_staff::getName($datas['filter_staff'])); ?>
                <input type="hidden" id="filter_staff" value="<?php echo e($datas['filter_staff']); ?>">
                <input type="text" id="staffs" class="form-control" value="<?php echo e($sname); ?>">
              </td>
              <td>
                <div class="col-md-6">
                   <select class="form-control" id="filter_year" name="filter_year">
                      <option value="">Select Year</option>
                      <?php foreach($datas['years'] as $years): ?>
                      <?php if($years->year == $datas['filter_year']): ?>
                      <option selected="selected" value="<?php echo e($years->year); ?>"><?php echo e($years->year); ?></option>
                      <?php else: ?>
                      <option value="<?php echo e($years->year); ?>"><?php echo e($years->year); ?></option>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                  <select class="form-control" id="filter_month" name="filter_month">
                      <option value="">Select Month</option>
                      <?php foreach($datas['months'] as $months): ?>
                      <?php if($months->month == $datas['filter_month']): ?>
                      <option selected="selected" value="<?php echo e($months->month); ?>"><?php echo e($months->month); ?></option>
                      <?php else: ?>
                      <option value="<?php echo e($months->month); ?>"><?php echo e($months->month); ?></option>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                </div>
              </td>
            
             
              <td><a href="<?php echo e(url('/branchadmin/staff-survey')); ?>" class="btn btn-success">All</a></td>
            </tr>
            
            <?php $i=1;
            foreach ($datas['surveys'] as $row) { ?>
            <tr>
              <td><?php echo $i++ ;?></td>
              <td><?php echo e(\App\Branch::gettitle($row->branch_id)); ?></td>
              <td><?php echo e(\App\Adjustment_staff::getName($row->adjustment_staff_id)); ?></td>
            
             
              <td><?php echo e($row->created_at); ?></td>
              <td>
               
                <a href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($row->id); ?>')" class="btn btn-danger left"><i class="fa fa-fw fa-remove"></i></a>
                <a href="<?php echo e(url('/branchadmin/staff-survey/view/'.$row->id)); ?>" class="btn btn-success left"><i class="fa fa-fw fa-eye"></i></a>
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
        var url= "<?php echo e(url('/branchadmin/staff-survey/delete/')); ?>"+ids;
        location = url;
        
        }
        }
       

        $('#filter_branch').on('change', function(){
          var filter_branch = $('#filter_branch').val();
          var filter_year = $('#filter_year').val();
          var filter_month = $('#filter_month').val();
          var filter_staff = $('#filter_staff').val();
          var url = '<?php echo e(url("/branchadmin/staff-survey?")); ?>';
          if (filter_branch != '') {
            url += '&filter_branch='+filter_branch;
          }
          if (filter_year != '') {
            url += '&filter_year='+filter_year;
          }
           if (filter_month != '') {
            url += '&filter_month='+filter_month;
          }
           if (filter_staff != '') {
            url += '&filter_staff='+filter_staff;
          }
          location = url;
        })

         $('#filter_year').on('change', function(){
          var filter_branch = $('#filter_branch').val();
          var filter_year = $('#filter_year').val();
          var filter_month = $('#filter_month').val();
          var filter_staff = $('#filter_staff').val();
          var url = '<?php echo e(url("/branchadmin/staff-survey?")); ?>';
          if (filter_branch != '') {
            url += '&filter_branch='+filter_branch;
          }
          if (filter_year != '') {
            url += '&filter_year='+filter_year;
          }
           if (filter_month != '') {
            url += '&filter_month='+filter_month;
          }
           if (filter_staff != '') {
            url += '&filter_staff='+filter_staff;
          }
          location = url;
        })

          $('#filter_month').on('change', function(){
          var filter_branch = $('#filter_branch').val();
          var filter_year = $('#filter_year').val();
          var filter_month = $('#filter_month').val();
          var filter_staff = $('#filter_staff').val();
          var url = '<?php echo e(url("/branchadmin/staff-survey?")); ?>';
          if (filter_branch != '') {
            url += '&filter_branch='+filter_branch;
          }
          if (filter_year != '') {
            url += '&filter_year='+filter_year;
          }
           if (filter_month != '') {
            url += '&filter_month='+filter_month;
          }
           if (filter_staff != '') {
            url += '&filter_staff='+filter_staff;
          }
          location = url;
        })

          $('#staffs').autocomplete({

    source: '<?php echo e(url("branchadmin/staffs/autocomplete/")); ?>',
          minlength:1,
          autoFocus:true,
          select:function(e,ui){
              var filter_branch = $('#filter_branch').val();
              var filter_year = $('#filter_year').val();
              var filter_month = $('#filter_month').val();
            var url = '<?php echo e(url("branchadmin/staff-survey/")); ?>?';
             url += 'filter_staff='+ui.item.id;
            if (filter_branch != '') {
              url += '&filter_branch='+filter_branch;
            }
            if (filter_year != '') {
              url += '&filter_year='+filter_year;
            }
             if (filter_month != '') {
              url += '&filter_month='+filter_month;
            }
            location = url;
            
             
          }

});
         

        </script>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>