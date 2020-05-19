<?php $__env->startSection('heading'); ?>
Probation Evaluation
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Probation Evaluation</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body">
        <div class="">
          <h3 class="text-center">PROBATIONARY EMPLOYEE PERFORMANCE EVALUATION FORM</h3>
          <p class="text-right">Ref. No: - PPEF/F&F/RPPL/01</p>
          <p><b>Name: <?php echo e(ucwords($staff->name)); ?></b></p>
          <p><b>Department: <?php echo e(ucwords(\App\Department::getTitle($staff->department))); ?></b></p>
          <div class="row">
            <div class="col-md-6"><b>Designation: <?php echo e(ucwords(\App\Designation::getTitle($staff->designation))); ?></b></div>
            <div class="col-md-6 text-right"><b>Line Manager/Supervisor: <?php echo e(ucwords(\App\Adjustment_staff::getName($staff->supervisor))); ?></b></div>
          </div>
          <p><b>Probation end date: <?php echo e(\Carbon\Carbon::parse($staff->probation_end_date)->format('M d, Y')); ?></b></p>
          <p class="text-center"><i>Review interval: once after the probationary period</i></p>
          <p><b>Instructions to Evaluator:</b></p>
          <p class="text-justify">Indicate the evaluation of the employee's job performance by writing a number between 1 and 3 on the blank line to the right of each attribute, in the appropriate column Use the following scale: </p>
          <div style="display: flex;">
          <div style="flex:1"><b>1 = Unacceptable</b></div>
          <div style="flex:1"><b>2 = Needs Improvement</b></div>
          <div style="flex:1"><b>3 = Satisfactory</b></div>
          </div>
          <form action="<?php echo e(url('/staffs/probation_evaluation/'.$staff->id.'/evaluate')); ?>" method="post">
          <?php echo csrf_field(); ?>

          <input type="hidden" name="isMidMonth" value="<?php echo e($isMidMonth); ?>">
          <input type="hidden" name="isFinalMonth" value="<?php echo e($isFinalMonth); ?>">
            <div id="attribute">
            <table class="table table-bordered">
              <tr>
                <th>Attribute</th>
                <th>Mid-Evaluation</th>
                <th>Final Evaluation</th>
              </tr>
              <tr>
                <th>DATE</th>
                <th><?php echo e(\Carbon\Carbon::parse($avgDate)->format('d M, Y')); ?></th>
                <th><?php echo e(\Carbon\Carbon::today()->format('d M, Y')); ?></th>
              </tr>
              <tr>
                <td>
                <p><b>QUANTITY OF WORK </b></p>
                <p>The extent to which the employee accomplishes assigned work of a specified quality within a specified time period</p>
                </td>
                <td><?php echo e(isset($attribute[0]->mid) ? $attribute[0]->mid : ''); ?></td>
                <td><?php echo e(isset($attribute[0]->final) ? $attribute[0]->final: ''); ?></td>
              </tr>
              <tr>
                <td>
                <p><b>QUANTITY OF WORK </b></p>
                <p>The extent to which the employee's work is well executed, thorough, effective, accurate</p>
                </td>
                <td><?php echo e(isset($attribute[1]->mid) ? $attribute[1]->mid : ''); ?></td>
                <td><?php echo e(isset($attribute[1]->final) ? $attribute[1]->final: ''); ?></td>
              </tr>
              <tr>
                <td>
                <p><b>KNOWLEDGE OF JOB </b></p>
                <p>The extent to which the employee knows and demonstrates how and why to do all phases of assigned work, given the employee's length of time in his/her current position</p>
                </td>
                <td><?php echo e(isset($attribute[2]->mid) ? $attribute[2]->mid : ''); ?></td>
                <td><?php echo e(isset($attribute[2]->final) ? $attribute[2]->final: ''); ?></td>
              </tr>
              <tr>
                <td>
                <p><b>RELATIONS WITH SUPERVISOR</b></p>
                <p>The manner in which the employee responds to supervisory directions and comments. The extent to which the employee seeks counsel from supervisor on ways to improves performance and follows same</p>
                </td>
                <td><?php echo e(isset($attribute[3]->mid)? $attribute[3]->mid : ''); ?></td>
                <td><?php echo e(isset($attribute[3]->final) ? $attribute[3]->final: ''); ?></td>
              </tr>
              <tr>
                <td>
                <p><b>COOPERATION WITH OTHERS </b></p>
                <p>The extent to which the employee gets along with other individuals. Consider the employee's tact, courtesy, and effectiveness in dealing with co-workers, subordinates supervisors, and customers</p>
                </td>
                <td><?php echo e(isset($attribute[4]->mid) ? $attribute[4]->mid : ''); ?></td>
                <td><?php echo e(isset($attribute[4]->final) ? $attribute[4]->final: ''); ?></td>
              </tr>
              <tr>
                <td>
                <p><b>ATTENDANCE AND RELIABILITY </b></p>
                <p>The extent to which employee arrives on time and demonstrates consistent attendance; the extent to which the employee contacts supervisor on a timely basis when employee will be late or absent</p>
                </td>
                <td><?php echo e(isset($attribute[5]->mid) ? $attribute[5]->mid : ''); ?></td>
                <td><?php echo e(isset($attribute[5]->final) ? $attribute[5]->final: ''); ?></td>
              </tr>
              <tr>
                <td>
                <p><b>INITIATIVE AND CREATIVITY </b></p>
                <p>The extent to which the employee is self- directed, resourceful and creative in meeting job objectives; consider how well the employee follows through on assignments and modifies or develops new ideas, methods, or procedures to effectively meet changing circumstances</p>
                </td>
                <td><?php echo e(isset($attribute[6]->mid) ? $attribute[6]->mid : ''); ?></td>
                <td><?php echo e(isset($attribute[6]->final) ? $attribute[6]->final: ''); ?></td>
              </tr>
              <tr>
                <td>
                <p><b>CAPACITY TO DEVELOP </b></p>
                <p>The extent to which the employee demonstrates the ability and willingness to accept new/more complex duties/responsibilities</p>
                </td>
                <td><?php echo e(isset($attribute[7]->mid) ? $attribute[7]->mid : ''); ?></td>
                <td><?php echo e(isset($attribute[7]->final) ? $attribute[7]->final: ''); ?></td>
              </tr>
            </table>
            </div>
            <?php if(isset($probation->supervisor_mid_comment)): ?>
            <div id="supervisor_mid_comment">
              <p><b>Evaluator Mid Comments: </b></p>
              <p><u><?php echo e(isset($probation) ? $probation->supervisor_mid_comment: ''); ?></u></p>
            </div>
            <?php endif; ?>
            <?php if(isset($probation->staff_mid_comment)): ?>
            <div id="staff_mid_comment">
              <p><b>Staff Mid Comments: </b></p>
              <p><u><?php echo e(isset($probation) ? $probation->staff_mid_comment: ''); ?></u></p>
            </div>
            <?php endif; ?>
            <div>
                <?php if(isset($probation->mid_completed_at)): ?>
                <p class="text-right"><u>Date: 
                <?php echo e(\Carbon\Carbon::parse($probation->mid_completed_at)->format('d M, Y')); ?>

                </u></p>                
                <?php endif; ?>
            </div>
            <?php if(isset($probation->supervisor_final_comment)): ?>
            <div id="supervisor_final_comment">
              <p><b>Evaluator Final Comments: </b></p>
              <p><u><?php echo e(isset($probation) ? $probation->supervisor_final_comment : ''); ?></u></p>
            </div>
            <?php endif; ?>
            <?php if(isset($probation->staff_final_comment)): ?>
            <div id="staff_final_comment">
              <p><b>Staff Final Comments: </b></p>
              <p><u><?php echo e(isset($probation) ? $probation->staff_final_comment : ''); ?></u></p>
            </div>
            <?php endif; ?>
            <div>
                <?php if(isset($probation->completed_at)): ?>
                <p class="text-right"><u>Date: 
                <?php echo e(\Carbon\Carbon::parse($probation->completed_at)->format('d M, Y')); ?>

                </u></p>                
                <?php endif; ?>
            </div>
            <br>
            <?php if($isFinalMonth): ?>
            <div id="conclusion">
              <p><b>TO BE COMPLETED ONLY AT LAST EVALUATION BEFORE END OF PROBATIONARY PERIOD: </b></p>
              <input type="checkbox" id="checklist1" name="conclusion[]" value="1" <?php if(in_array(1, $conclusion)): ?> checked <?php endif; ?> disabled>
              <label for="checklist1"> I recommend this probationary employee become permanent and continuous without salary increment </label><br>
              <input type="checkbox" id="checklist2" name="conclusion[]" value="2" <?php if(in_array(2, $conclusion)): ?> checked <?php endif; ?> disabled>
              <label for="checklist2"> I recommend this probationary employee become permanent and continuous with salary increment </label><br>
              <input type="checkbox" id="checklist3" name="conclusion[]" value="3" <?php if(in_array(3, $conclusion)): ?> checked <?php endif; ?> disabled>
              <label for="checklist3"> I recommend this probationary employee be dismissed after the end of the probationary period and will submit the appropriate forms. </label><br>
              <input type="checkbox" id="checklist3" name="conclusion[]" value="4" <?php if(in_array(4, $conclusion)): ?> checked <?php endif; ?> disabled>
              <label for="checklist3"> Employee resigned before completion of probationary period. (It is important that HR receive this form even if employee has resigned.)</label><br>
            </div>
            <?php endif; ?>
            <div>
            <?php /* <button type="submit" class="btn btn-info">SUBMIT</button> */ ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>