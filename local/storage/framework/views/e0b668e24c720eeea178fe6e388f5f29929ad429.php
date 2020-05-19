<!-- <table>
    <thead>
        <tr>
            <th>Staff Name</th>
            <th>Designation</th>
            <th>Gender</th>
            <th>Maritial Status</th>
            <th>Bank</th>
            <th>Account Number</th>
            <th>Month of payment</th>
            <th>Month</th>
            <th>Working Days</th>
            <th>Monthly Slab</th>
            <th>Daily Per Rate</th>
            <th>Days Worked</th>
            <th>Unpaid Leave</th>
            <th>Monthly Salary as per WD</th>
            <th>Project Allowance</th>
            <th>Incentive</th>
            <th>Fuel</th>
            <th>Communication</th>
            <th>Encashment and Adjustment</th>
            <th>Gross Salary</th>
            <th>Advance</th>
            <th>Advance Canteen</th>
            <th>Tax</th>
            <th>PF</th>
            <th>Deduction</th>
            <th>Payable Salary</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($salarysheets as $s): ?>
        <tr>
        <td><?php echo e($s->name); ?></td>
        <td><?php echo e($s->designation); ?></td>
        <td><?php echo e($s->gender); ?></td>
        <td><?php echo e($s->maritial_status); ?></td>
        <td><?php echo e($s->bank); ?></td>
        <td><?php echo e($s->account_no); ?></td>
        <td><?php echo e(\App\BranchSetting::getSalaryCalculate() == 1 ? $s->np_year : $s->en_year); ?></td>
        <td><?php echo e(\App\BranchSetting::getSalaryCalculate() == 1 ? \App\SalarySheet::get_nepali_month($s->np_month) : \App\SalarySheet::get_english_month($s->en_month)); ?></td>
        <td><?php echo e($s->working_day); ?></td>
        <td><?php echo e($s->monthly_slab); ?></td>
        <td><?php echo e($s->daily_rate); ?></td>
        <td><?php echo e($s->work_day - $s->unpaid_leave); ?></td>
        <td><?php echo e($s->unpaid_leave); ?></td>
        <td><?php echo e($s->monthly_amount); ?></td>
        <td><?php echo e($s->project_a); ?></td>
        <td><?php echo e($s->incentive); ?></td>
        <td><?php echo e($s->fuel_a); ?></td>
        <td><?php echo e($s->mobile_a); ?></td>
        <td><?php echo e($s->others); ?></td>
        <td><?php echo e($s->gross_salary); ?></td>
        <td><?php echo e($s->advance); ?></td>
        <td><?php echo e($s->advance_canteen); ?></td>
        <td><?php echo e($s->tax); ?></td>
        <td><?php echo e($s->pf); ?></td>
        <td><?php echo e($s->total_deduction); ?></td>
        <td><?php echo e($s->net_salary); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table> -->

<table class="table table-bordered">
    <thead>
        <tr>
            <th rowspan="2">Name</th>
            <th rowspan="2">Gender</th>
            <th rowspan="2">Family/Individual</th>
            <th colspan="3">Working Days</th>
            <th rowspan="2">Base Salary</th>
            <th colspan="6">Total Gross Salary</th>
            <th rowspan="2">PF</th>
            <th rowspan="2">Gross Amount</th>
            <th colspan="4">Total Deduction</th>
            <th rowspan="2">PF and Petty Encashment</th>
            <th rowspan="2">Net Payable</th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>

            <th>Total Days</th>
            <th>Unpaid Leave</th>
            <th>Working Day</th>
            <th></th>
            <th>As Per working Day</th>
            <th>Project Allowance</th>
            <th>Incentive</th>
            <th>Fuel</th>
            <th>Mobile</th>
            <th>Total Income</th>
            <th></th>
            <th></th>
            <th>Monthly Tax</th>
            <th>Canteen Advance</th>
            <th>Salary Advance</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($salarysheets as $s): ?>
        <tr>
            <td><?php echo e($s->name); ?></td>
            <td><?php echo e($s->gender); ?></td>
            <td><?php echo e($s->marital_status); ?></td>
            
            <td><?php echo e($s->working_day); ?></td>
            <td><?php echo e($s->unpaid_leave); ?></td>
            <td><?php echo e($s->work_day); ?></td>

            <td><?php echo e($s->monthly_slab); ?></td>

            <td><?php echo e($s->work_day * $s->daily_rate); ?></td>

            <td><?php echo e($s->project_a); ?></td>
            <td><?php echo e($s->incentive); ?></td>
            <td><?php echo e($s->fuel_a); ?></td>
            <td><?php echo e($s->mobile_a); ?></td>
            <td><?php echo e($s->gross_salary); ?></td>

            <td><?php echo e($s->pf); ?></td>
            <td><?php echo e($s->gross_salary - $s->pf); ?></td>

            <td><?php echo e($s->tax); ?></td>
            <td><?php echo e($s->advance_canteen); ?></td>
            <td><?php echo e($s->advance); ?></td>
            <td><?php echo e($s->total_deduction); ?></td>

            <td><?php echo e($s->encashment); ?></td>
            <td><?php echo e($s->net_salary); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>