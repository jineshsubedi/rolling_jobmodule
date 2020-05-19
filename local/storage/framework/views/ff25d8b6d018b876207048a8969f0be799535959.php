<?php $__env->startSection('heading'); ?>
Payroll
            <small>List of Payroll</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Payroll</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-md-12">
        <?php if(\App\BranchSetting::payrollViewer() || auth()->guard('staffs')->user()->department == 4): ?>
        <a href="<?php echo e(url('/branchadmin/payroll/addnew')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-plus-circle"></i> Generate Payroll</a>

        <button type="button" class="btn btn-info right btn10m" id="manualStaffPayrollBtn">Manual Payroll</button>
        <?php endif; ?>
        <!-- <a href="<?php echo e(route('exportPayrollSheet')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-download"></i> Export Sheet</a> -->
        </div>
      </div>
      <?php foreach($errors->all() as $error): ?>
      <p class="alert-warning">
       <?php echo e($error); ?><br/>
      </p> 
      <?php endforeach; ?>
     
      <div class="box">
            <div class="box-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <?php if(auth()->guard('staffs')->user()->branch == 2): ?>
                        <th>Branch</th>
                        <?php endif; ?>
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
                      <form action="<?php echo e(route('exportPayrollSheet')); ?>" methoe="get">
                      <?php echo csrf_field(); ?>

                        <td></td>
                        <?php if(auth()->guard('staffs')->user()->branch == 2): ?>
                        <td><select class="form-control" id="filter_branch">
                            <option value="">Select Branch</option>
                            <?php foreach($data['branches'] as $branch): ?>
                            <?php if($data['filter_branch'] == $branch->id): ?>
                            <option selected="selected" value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select></td>
                        <?php endif; ?>
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
                        <a href="<?php echo e(url('/branchadmin/payroll')); ?>" class="btn btn-success">All </a>
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
                        <?php if(auth()->guard('staffs')->user()->branch == 2): ?>
                        <td><?php echo e(\App\Branch::gettitle($row->branch_id)); ?></td>
                        <?php endif; ?>
                        <td><?php echo \App\Adjustment_staff::getName($row->staff_id);?></td>
                        <td><?php echo e($year); ?></td>
                        <td><?php echo e($month); ?></td>
                        <td><?php echo e($row->monthly_amount); ?></td>
                        <td><?php echo e($row->pf); ?></td>
                        <td><?php echo e($row->gross_salary); ?></td>
                        <?php ($salary = \App\StaffSalary::getStaffSalary($row->staff_id)); ?>
                        <td><?php echo e(isset($saalry) ? $salary->cit : ''); ?></td>
                        <td><?php echo e(isset($salary) ? $salary->insurance : ''); ?></td>
                        <td><?php echo e($row->taxable_amount); ?></td>
                        <td><?php echo e(\App\Tax::getTaxSlab($row->tax_slab)); ?> %</td>
                        <td><?php echo e($row->net_paybale_tax); ?></td>
                        <td><?php echo e($row->net_salary); ?></td>
                        <td>
                          <a href="<?php echo e(route('branchadmin.payroll.view', $row->id)); ?>" class="btn btn-success left"><i class="fa fa-eye"></i>View</a>
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
        var url= "<?php echo e(url('/branchadmin/suggestion_for/delete/')); ?>"+ids;
        location = url;
      
      }
    }
  </script>

<script>
    $('select#filter_staff').change(function(){
        var filter_staff = $(this).children("option:selected").val();
        var filter_year = $('#filter_year').val();
        var filter_branch = $('#filter_branch').val();
        var filter_month = $('#filter_month').val();
        var url= "<?php echo e(url('/branchadmin/payroll?')); ?>";
        if (filter_year != '') {
            url += '&filter_year='+filter_year;
        }
        if (filter_month != '') {
            url += '&filter_month='+filter_month;
        }
        if (filter_staff != '') {
            url += '&filter_staff='+filter_staff;
        }
         if (filter_branch != '') {
            url += '&filter_branch='+filter_branch;
        }
        
        location = url;
    })
    $('select#filter_year').change(function(){
        var filter_year = $(this).children("option:selected").val();
        var filter_month = $('#filter_month').val();
        var filter_staff = $('#filter_staff').val();
        var filter_branch = $('#filter_branch').val();
        var url= "<?php echo e(url('/branchadmin/payroll?')); ?>";
        if (filter_year != '') {
            url += '&filter_year='+filter_year;
        }
        if (filter_month != '') {
            url += '&filter_month='+filter_month;
        }
        if (filter_staff != '') {
            url += '&filter_staff='+filter_staff;
        }
        if (filter_branch != '') {
            url += '&filter_branch='+filter_branch;
        }
        
        location = url;
    })
    $('select#filter_month').change(function(){
        var filter_month = $(this).children("option:selected").val();
        var filter_staff = $('#filter_staff').val();
        var filter_branch = $('#filter_branch').val();
        var filter_year = $('#filter_year').val();
        var url= "<?php echo e(url('/branchadmin/payroll?')); ?>";
        if (filter_year != '') {
            url += '&filter_year='+filter_year;
        }
        if (filter_month != '') {
            url += '&filter_month='+filter_month;
        }
        if (filter_staff != '') {
            url += '&filter_staff='+filter_staff;
        }
        if (filter_branch != '') {
            url += '&filter_branch='+filter_branch;
        }
        location = url;
    })
    
    $('#filter_branch').on('change',function(){
        var filter_month = $('#filter_month').val();
        var filter_staff = $('#filter_staff').val();
        var filter_branch = $(this).val();
        var filter_year = $('#filter_year').val();
        var url= "<?php echo e(url('/branchadmin/payroll?')); ?>";
        if (filter_year != '') {
            url += '&filter_year='+filter_year;
        }
        if (filter_month != '') {
            url += '&filter_month='+filter_month;
        }
        if (filter_staff != '') {
            url += '&filter_staff='+filter_staff;
        }
        if (filter_branch != '') {
            url += '&filter_branch='+filter_branch;
        }
        location = url;
    })
    
</script>


  <div class="modal fade bd-example-modal-lg" id="model-salary-staff">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Manual Staff Payroll</h4>
        </div>
        <div class="modal-body" id="attendance-body">
          <form action="<?php echo e(url('/branchadmin/payroll/saveStaffSalarySheet')); ?>" method="post">
            <?php echo csrf_field(); ?>

            <div class="form-group">
              <label class="required">Select Staff:</label>
              <div class="form-input">
                  <select name="staff" id="manual_staff" class="form-control">
                    <option value="">Select Staff</option>
                    <?php foreach($staffs as $staff): ?>
                    <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                    <?php endforeach; ?>
                  </select>
              </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="required">Select Year</label>
                    <div class="form-input">
                        <select class="form-control" name="year" id="year">
                            <option value="">Select Year</option>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="required">Select Month</label>
                    <div class="form-input">
                        <select class="form-control" name="month" id="month">
                            <option value="">Select Month</option>
                        </select>
                    </div>
                  </div>
                </div>
            </div>
            <input type="hidden" name="type" id="date_type">
            <div class="form-group">
              <label class="required">Daily Rate:</label>
              <div class="form-input">
                  <input type="text" name="daily_rate" class="form-control" placeholder="Daily Rate" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Working Day:</label>
              <div class="form-input">
                  <input type="text" name="working_day" class="form-control" placeholder="working day" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Unpaid Leave:</label>
              <div class="form-input">
                  <input type="text" name="unpaid_leave" class="form-control" placeholder="unpaid leave" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Overtime Hour:</label>
              <div class="form-input">
                <input type="text" name="othour" class="form-control" placeholder="overtime Hour" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Overtime Amount:</label>
              <div class="form-input">
                  <input type="text" name="overtime_amount" class="form-control" placeholder="overtime amount" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">PF Amount:</label>
              <div class="form-input">
                  <input type="text" name="pf_amount" class="form-control" placeholder="PF amount" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Base Salary:</label>
              <div class="form-input">
                  <input type="text" name="base_salary" class="form-control" placeholder="Base Salary" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Project Allowance:</label>
              <div class="form-input">
                  <input type="text" name="project_a" class="form-control" placeholder="Project Allowance" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Mobile Allowance:</label>
              <div class="form-input">
                  <input type="text" name="mobile_a" class="form-control" placeholder="Mobile Allowance" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Fuel Allowance:</label>
              <div class="form-input">
                  <input type="text" name="fuel_a" class="form-control" placeholder="Fuel Allowance" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Incentive:</label>
              <div class="form-input">
                  <input type="text" name="incentive" class="form-control" placeholder="Incentive" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Others:</label>
              <div class="form-input">
                  <input type="text" name="others" class="form-control" placeholder="Others" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Advance:</label>
              <div class="form-input">
                  <input type="text" name="advance" class="form-control" placeholder="advance" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Advance Canteen:</label>
              <div class="form-input">
                  <input type="text" name="advance_canteen" class="form-control" placeholder="Advance Canteen" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Gross Salary:</label>
              <div class="form-input">
                  <input type="text" name="gross_salary" class="form-control" placeholder="Gross Salary" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Annual Gross Salary:</label>
              <div class="form-input">
                  <input type="text" name="annual_gross_salary" class="form-control" placeholder="Annual Gross Salary" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Encashment:</label>
              <div class="form-input">
                  <input type="text" name="encashment" class="form-control" placeholder="Encashment" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Tax Percentage:</label>
              <div class="form-input">
                  <input type="text" name="tax_percentage" class="form-control" placeholder="Tax Percentage">
              </div>
            </div>
            <div class="form-group">
              <label class="required">Taxable amount:</label>
              <div class="form-input">
                  <input type="text" name="taxable_amount" class="form-control" placeholder="Taxable Amount" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Net Payable Tax:</label>
              <div class="form-input">
                  <input type="text" name="net_payable_tax" class="form-control" placeholder="Net Payable Tax" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Monthly Tax:</label>
              <div class="form-input">
                  <input type="text" name="tax" class="form-control" placeholder="Tax" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Payable Amount:</label>
              <div class="form-input">
                  <input type="text" name="net_payable" class="form-control" placeholder="Net Payable" value='0'>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Total Deduction:</label>
              <div class="form-input">
                  <input type="text" name="deduction" class="form-control" placeholder="Deduction" value='0'>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" value="Submit" class="btn btn-primary">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<script>
$(document).ready(function(){
  $('#manualStaffPayrollBtn').click(function(){
    $('#model-salary-staff').modal('show');
  })
  var type = 0;
  var branch_id = '<?php echo e($data["filter_branch"]); ?>'
  $.ajax({
    type: 'POST',
    url: '<?php echo e(url("/branchadmin/payroll/getYear")); ?>',
    data: '_token='+token+'&branch='+branch_id,
    cache: false,
    success: function(data){
      console.log(data)
      var datas = data.split('|');
      type = datas[0];
      $('#date_type').val(type)
      $('#year').html(datas[1]);
    }
  });
  $('#year').on('change', function(){
      var year = $(this).val();
      if (year != '') {
          var token = $('input[name=\'_token\']').val();
          var branch_id = $('#branch').val();
          $.ajax({
            type: 'POST',
            url: '<?php echo e(url("/branchadmin/payroll/getMonth")); ?>',
            data: '_token='+token+'&year='+year+'&type='+type+'&branch='+branch_id,
            cache: false,
            success: function(data){
              console.log(data)
              $('#month').html(data);
            }
          });
      }
  })
})
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>