<?php $__env->startSection('heading'); ?>
Payroll
            <small>List of Payroll</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Payroll</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-md-12">
        <a href="<?php echo e(url('/staffs/payroll/addnew')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-plus-circle"></i> Generate Payroll</a>
        <!-- <a href="<?php echo e(route('exportPayrollSheet')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-download"></i> Export Sheet</a> -->
        </div>
      </div>
     
      <div class="box">
            <div class="box-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th>Staff</th>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Amount</th>
                        <th>Pf</th>
                        <th>Gross Salary</th>
                        <th>CIT</th>
                        <th>Insurance</th>
                        <th>Annual Gross Salary</th>
                        <th>Tax Slab</th>
                        <th>Net Payable Tax per annum</th>
                        <th>Net Payable Salary</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                      <form action="<?php echo e(route('staffs.exportPayrollSheet')); ?>" methoe="get">
                      <?php echo csrf_field(); ?>

                        <td></td>
                        <td>
                        <!-- <input type="text" id="staff" class="form-control" value="<?php echo e(\App\Adjustment_staff::getName($data['filter_staff'])); ?>">
                        <input type="hidden" id="filter_staff" class="form_control" value="<?php echo e($data['filter_staff']); ?>"> -->
                        <select name="filter_staff" id="filter_staff" class="form-control">
                          <option value="">Select Staff</option>
                          <?php foreach($staffs as $staff): ?>
                          <?php if($staff->id == $data['filter_staff']): ?>
                          <option value="<?php echo e($staff->id); ?>" selected><?php echo e($staff->name); ?></option>
                          <?php else: ?>
                          <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                          <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                        </td>
                        <td>
                          <select class="form-control" id="filter_year" name="filter_year">
                            <option value="">Select Year</option>
                            <?php foreach($data['years'] as $year): ?>
                            <?php if($data['filter_year'] == $year): ?>
                            <option selected="selected" value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </td>
                        <td>
                          <select class="form-control" id="filter_month" name="filter_month">
                            <option value="">Select Month</option>
                            <?php foreach($data['months'] as $year): ?>
                            <?php if($data['filter_month'] == $year['value']): ?>
                            <option selected="selected" value="<?php echo e($year['value']); ?>"><?php echo e($year['title']); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($year['value']); ?>"><?php echo e($year['title']); ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                          </select>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="width:15%">
                        <a href="<?php echo e(url('/staffs/payroll')); ?>" class="btn btn-success">All </a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-download"></i>Sheet</button>
                        </td>
                        </form>
                      </tr>
                      <?php $i=1; 
                        foreach ($data['sheet'] as $row) { 
                          if($data['setting']->salary_calculate == 1)
                          {
                            $year = $row->np_year;
                            $month = \App\SalarySheet::get_nepali_month($row->np_month);
                          } else{
                            $year = $row->en_year;
                            $month = \App\SalarySheet::get_english_month($row->en_month);
                          }
                          ?>
                          <tr>
                        <td><?php echo $i++ ;?></td>
                        <td><?php echo \App\Adjustment_staff::getName($row->staff_id);?></td>
                        <td><?php echo e($year); ?></td>
                        <td><?php echo e($month); ?></td>
                        <td><?php echo e($row->monthly_amount); ?></td>
                        <td><?php echo e($row->pf); ?></td>
                        <td><?php echo e($row->gross_salary); ?></td>
                        <?php ($salary = \App\StaffSalary::getStaffSalary($row->staff_id)); ?>
                        <td><?php echo e($salary->cit); ?></td>
                        <td><?php echo e($salary->insurance); ?></td>
                        <td><?php echo e($row->taxable_amount); ?></td>
                        <td><?php echo e(\App\Tax::getTaxSlab($row->tax_slab)); ?> %</td>
                        <td><?php echo e($row->net_paybale_tax); ?></td>
                        <td><?php echo e($row->net_salary); ?></td>
                        <td>
                          <a href="<?php echo e(route('staffs.payroll.view', $row->id)); ?>" class="btn btn-success left"><i class="fa fa-eye"></i>View</a>
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
          <?php echo $data['sheet']->render();?>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function confirm_delete(ids){
      if(confirm('Do You Want To Delete This Payroll?')){
        var url= "<?php echo e(url('/staffs/suggestion_for/delete/')); ?>"+ids;
        location = url;
      
      }
    }
  </script>

<script>
    $('select#filter_staff').change(function(){
        var filter_staff = $(this).children("option:selected").val();
        var filter_year = $('#filter_year').val();
        var filter_month = $('#filter_month').val();
        var url= "<?php echo e(url('/staffs/payroll?')); ?>";
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
    $('select#filter_year').change(function(){
        var filter_year = $(this).children("option:selected").val();
        var filter_month = $('#filter_month').val();
        var filter_staff = $('#filter_staff').val();
        var url= "<?php echo e(url('/staffs/payroll?')); ?>";
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
    $('select#filter_month').change(function(){
        var filter_month = $(this).children("option:selected").val();
        var filter_staff = $('#filter_staff').val();
        var filter_year = $('#filter_year').val();
        var url= "<?php echo e(url('/staffs/payroll?')); ?>";
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
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>