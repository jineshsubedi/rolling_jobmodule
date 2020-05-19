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
            <a href="<?php echo e(route('branchadmin.payroll.print', $data->id)); ?>" class="btn btn-primary pull-right" target="_blank"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>
      <div class="box">
        <div class="box-body">
            <div class="row" id="salary_sheet">
                <br><br> 
                <div class="col-md-10 col-md-offset-1">
                    <p style="font-size: 16px; text-align:center">
                    <img src="<?php echo e(asset('/image/logo.png')); ?>" width="100px">
                    Rollingplans Pvt. Ltd.
                    </p>
                    <br>
                    <div class="col-md-12 text-center" style="background-color:#b4c6e7; font-family: Gill Sans MT;font-weight:600">
                    <p>MONTHLY SALARY SLIP</p>
                    </div>
                    <br>
                    <div class="col-md-12 text-center">
                    <p>Address: Bijulibazar- 10, Kathmandu, Nepal </p>
                    <p>Corporate Phone Number: 00977-1-4784183/ 4785215</p>
                    </div>
                    <?php
                        if($setting->salary_calculate == 1)
                        {
                            $year = $data->np_year;
                            $month = \App\SalarySheet::get_nepali_month($data->np_month);
                        } else{
                            $year = $data->en_year;
                            $month = \App\SalarySheet::get_english_month($data->en_month);
                        }
                    ?>
                    <table class="table table-bordered">
                        <tr>
                        <td style="padding: 3px;">Name of Employee:</td>
                        <td style="padding: 3px;"><?php echo e(\App\Adjustment_staff::getName($data->staff_id)); ?></td>
                        <td style="padding: 3px;">Month of Payment- <?php echo e($year); ?></td>
                        </tr>
                        <tr>
                        <td style="padding: 3px;">Designation:</td>
                        <td style="padding: 3px;"><?php echo e($data->designation); ?></td>
                        <td rowspan="3" style="padding: 3px;">
                           <b> <?php echo e($month); ?> </b>
                        </td>
                        </tr>
                        <tr>
                        <td style="padding: 3px;">Gender</td>
                        <td style="padding: 3px;"><?php echo e($data->gender); ?></td>
                        </tr>
                        <tr>
                        <td style="padding: 3px;">Maritial Status</td>
                        <td style="padding: 3px;"><?php echo e($data->marital_status); ?></td>
                        </tr>
                    </table>
                    <div class="col-md-12 text-center" style="background-color:#b4c6e7; font-family: Gill Sans MT;font-weight:600">
                    <p><u>Details of Salary Paid</u></p>
                    </div>
                    <table class="table table-bordered">
                        <tr style="background-color: #ececec;">
                            <th colspan="4">Scale of Payment:</th>
                        </tr>
                        <tr>
                            <th style="padding: 3px;">Description</th>
                            <th style="padding: 3px;">Days</th>
                            <th style="padding: 3px;">Description</th>
                            <th style="padding: 3px;">Amount</th>
                        </tr>
                        <tr>
                            <td rowspan="2" style="padding: 3px;">Working Days</td>
                            <td rowspan="2" style="padding: 3px;"><?php echo e($data->working_day); ?></td>
                            <td style="padding: 3px;">Monthly Slab (Base Salary)</td>
                            <td style="padding: 3px;"><?php echo e($data->monthly_slab); ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 3px;">Daily Pay Rate</td>
                            <td style="padding: 3px;"><?php echo e($data->daily_rate); ?></td>
                        </tr>
                        <tr style="background-color: #ececec;">
                            <th colspan="4" style="padding: 3px;">Computation of Gross Salary to be Paid for This Month:</th>
                        </tr>
                        <tr>
                            <td style="padding: 3px;">Days worked by employee:</td>
                            <td style="padding: 3px;"><?php echo e($data->working_day - $data->unpaid_leave); ?></td>
                            <td style="padding: 3px;">Monthly salary as per WD</td>
                            <td style="padding: 3px;"><?php echo e($data->monthly_amount); ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 3px;">Total unpaid leave/s:</td>
                            <td style="padding: 3px;"><?php echo e($data->unpaid_leave); ?></td>
                            <td style="padding: 3px;">Project Allowances</td>
                            <td style="padding: 3px;"><?php echo e($data->project_a); ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 3px;"></td>
                            <td style="padding: 3px;"></td>
                            <td style="padding: 3px;">Incentives</td>
                            <td style="padding: 3px;"><?php echo e($data->incentive); ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 3px;"></td>
                            <td style="padding: 3px;"></td>
                            <td style="padding: 3px;">Fuel</td>
                            <td style="padding: 3px;"><?php echo e($data->fuel_a); ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 3px;"></td>
                            <td style="padding: 3px;"></td>
                            <td style="padding: 3px;">Communication</td>
                            <td style="padding: 3px;"><?php echo e($data->mobile_a); ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 3px;"></td>
                            <td style="padding: 3px;"></td>
                            <td style="padding: 3px;">Other Encashment and Adjustment</td>
                            <td style="padding: 3px;"><?php echo e($data->others); ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 3px;"></td>
                            <td style="padding: 3px;"></td>
                            <td style="padding: 3px;"><b>Total of Gross Salary</b></td>
                            <td style="padding: 3px;"><u><?php echo e($data->gross_salary); ?></u></td> <!-- add all other allowance here -->
                        </tr>
                        <tr style="background-color: #ececec;">
                            <th colspan="4" style="padding: 3px;">Break Up of Deductions for the Month</th>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding: 3px;">Advance:</td><td><?php echo e($data->advance); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding: 3px;">Advance Canteen:</td><td><?php echo e($data->advance_canteen); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding: 3px;">Amount of withholding tax:</td><td><?php echo e($data->tax); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding: 3px;">Provident Fund:</td><td><?php echo e($data->pf); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding: 3px;"><b>Total Deduction:</b></td><td><b><?php echo e($data->total_deduction); ?></b></td>
                        </tr>
                        <tr style="background-color:#b4c6e7; font-family: Gill Sans MT;font-weight:600">
                            <td colspan="3" class="text-right" style="padding: 3px;"><b>Net Paybale Salary:</b></td><td><b><u><?php echo e($data->net_salary); ?></u></b></td>
                        </tr>
                    </table>
                    <div class="position:relative">
                        <img src="<?php echo e(asset('image/rpplstamp.png')); ?>" width="100px" style="position: absolute;bottom: 45px;right: 5%;opacity: 0.5;">
                    </div>
                    <div class="text-right">
                        <?php ($accountHandler = \App\BranchSetting::getAccountHandler()); ?>
                        <img src="<?php echo e(asset('image/'.$accountHandler->account_handler_signature)); ?>" width="100px">
                        <p><span style="border-bottom: 1px dashed grey;"><?php echo e(\App\Adjustment_staff::getName($accountHandler->account_handler)); ?></span></p>
                        <p><?php echo e(\App\Adjustment_staff::getDesignation($accountHandler->account_handler)); ?></p>
                    </div>
                    <br>
                </div>
            </div> 
        </div>
      </div>
    </div>
  <div>
  <script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>