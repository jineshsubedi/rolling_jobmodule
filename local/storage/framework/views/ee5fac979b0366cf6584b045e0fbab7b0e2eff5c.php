<table>
    <thead>
        <tr>
            <th>Staff</th>
            <th>Date</th>
            <th>Duty Start</th>
            <th>Late Reason</th>
            <th>Clock In Away Reason</th>
            <th>Lunch Out</th>
            <th>Lunch In</th>
            <th>Duty Out</th>
            <th>Early Reason</th>
            <th>Clock Out Away Reason</th>
            <th>Remarks</th>
            <th>Total Duration</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($attendences as $a): ?>
        <tr>
            <td><?php echo e(isset($a->adjustment_staff->name) ? $a->adjustment_staff->name : ''); ?></td>
            <td><?php echo e($a->attendance_date); ?></td>
            <td><?php echo e($a->in_time); ?></td>
            <td><?php echo e($a->in_time_reason); ?></td>
            <td><?php echo e($a->in_away_location); ?></td>
            <td><?php echo e($a->lunch_start); ?></td>
            <td><?php echo e($a->lunch_end); ?></td>
            <td><?php echo e($a->out_time); ?></td>
            <td><?php echo e($a->out_time_reason); ?></td>
            <td><?php echo e($a->out_away_location); ?></td>
            <td><?php echo e($a->remarks); ?></td>
            <td><?php echo e(\App\Attendance::getDuration($a->attendance_date, $a->in_time, $a->out_time, $a->lunch_start, $a->lunch_end)); ?>

            </td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>