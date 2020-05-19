<html>
<head></head>
<style>
    body{
        border: 1px solid #88b5cc;
        padding:4px;
    }
    table {
        border-spacing: 0;
        border-collapse: collapse;
        background-color: transparent;
    }
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px;
    }
    .table-bordered {
        border-top: 1px solid #b6e8fe;
    }
    tr {
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
    }
    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th {
        border-top: 1px solid #b6e8fe !important;
    }
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
        border-top: 0px;
        text-align: left;
        padding: 3px;
    }
</style>
<body>
    <div style="background-color:#fff; width: 95%; margin: 0 auto;">
        <p style="font-size: 16px; text-align:center">
        <img src="<?php echo e(asset('/image/logo.png')); ?>" width="100px">
        Rollingplans Pvt. Ltd.
        </p>
        <br>
        <div style="width:100%; text-align:center; background-color: #88b5cc; padding: 1px;" style="background-color:#b4c6e7; font-family: Gill Sans MT;font-weight:600">
        <p>MONTHLY SALARY SLIP</p>
        </div>
        <div style="width:100%; text-align:center;">
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
            <td>Name of Employee:</td>
            <td><?php echo e(\App\Adjustment_staff::getName($data->staff_id)); ?></td>
            <td>Month of Payment- <?php echo e($year); ?></td>
            </tr>
            <tr>
            <td>Designation:</td>
            <td><?php echo e($data->designation); ?></td>
            <td rowspan="3">
                <b> <?php echo e($month); ?> </b>
            </td>
            </tr>
            <tr>
            <td>Gender</td>
            <td><?php echo e($data->gender); ?></td>
            </tr>
            <tr>
            <td>Maritial Status</td>
            <td><?php echo e($data->marital_status); ?></td>
            </tr>
        </table>
        <div style="width:100%; text-align:center;" style="background-color:#b4c6e7; font-family: Gill Sans MT;font-weight:600">
            <p><u>Details of Salary Paid</u></p>
        </div>
        <table class="table table-bordered">
            <tr style="background-color: #88b5cc;">
                <th colspan="4">Scale of Payment:</th>
            </tr>
            <tr>
                <th>Description</th>
                <th>Days</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
            <tr>
                <td rowspan="2">Working Days</td>
                <td rowspan="2"><?php echo e($data->working_day); ?></td>
                <td>Monthly Slab (Base Salary)</td>
                <td><?php echo e($data->monthly_slab); ?></td>
            </tr>
            <tr>
                <td>Daily Pay Rate</td>
                <td><?php echo e($data->daily_rate); ?></td>
            </tr>
            <tr style="background-color: #88b5cc;">
                <th colspan="4">Computation of Gross Salary to be Paid for This Month:</th>
            </tr>
            <tr>
                <td>Days worked by employee:</td>
                <td><?php echo e($data->work_day - $data->unpaid_leave); ?></td>
                <td>Monthly salary as per WD</td>
                <td><?php echo e($data->monthly_amount); ?></td>
            </tr>
            <tr>
                <td>Total unpaid leave/s:</td>
                <td><?php echo e($data->unpaid_leave); ?></td>
                <td>Project Allowances</td>
                <td><?php echo e($data->project_a); ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Incentives</td>
                <td><?php echo e($data->incentive); ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Fuel</td>
                <td><?php echo e($data->fuel_a); ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Communication</td>
                <td><?php echo e($data->mobile_a); ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Other Encashment and Adjustment</td>
                <td><?php echo e($data->others); ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><b>Total of Gross Salary</b></td>
                <td><u><?php echo e($data->gross_salary); ?></u></td> <!-- add all other allowance here -->
            </tr>
            <tr style="background-color: #88b5cc;">
                <th colspan="4">Break Up of Deductions for the Month</th>
            </tr>
            <tr>
                <td colspan="3">Advance:</td><td><?php echo e($data->advance); ?></td>
            </tr>
            <tr>
                <td colspan="3">Advance Canteen:</td><td><?php echo e($data->advance_canteen); ?></td>
            </tr>
            <tr>
                <td colspan="3">Amount of withholding tax:</td><td><?php echo e($data->tax); ?></td>
            </tr>
            <tr>
                <td colspan="3">Provident Fund:</td><td><?php echo e($data->pf); ?></td>
            </tr>
            <tr>
                <td colspan="3"><b>Total Deduction:</b></td><td><b><?php echo e($data->total_deduction); ?></b></td>
            </tr>
            <tr style="background-color:#88b5cc; font-family: Gill Sans MT;font-weight:600">
                <td colspan="3" class="text-right"><b>Net Paybale Salary:</b></td><td><b><u><?php echo e($data->net_salary); ?></u></b></td>
            </tr>
        </table>
        <div>
            
        </div>
        <div style="text-align: right;">
            
            <?php ($accountHandler = \App\BranchSetting::getAccountHandler()); ?>
            <img src="<?php echo e(asset('image/rpplstamp.png')); ?>" width="100px" style="position: absolute;right: 5%;opacity: 0.5;">
            <br>
            <img src="<?php echo e(asset('image/'.$accountHandler->account_handler_signature)); ?>" width="100px">
            <p><span style="border-bottom: 1px dashed grey;"><?php echo e(\App\Adjustment_staff::getName($accountHandler->account_handler)); ?></span></p>
            <p><?php echo e(\App\Adjustment_staff::getDesignation($accountHandler->account_handler)); ?></p>
        </div>
    </div>
</body>
<script>
    window.print();
</script>
</html>