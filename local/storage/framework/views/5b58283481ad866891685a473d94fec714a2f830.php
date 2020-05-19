<section class="sidebar">
          <!-- Sidebar user panel -->
          
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
  <li class="treeview">
    <a href="<?php echo e(url('/branchadmin')); ?>">
    <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
    </a>
  </li>
  <li class="treeview">
  <a href="#">
  <i class="fa fa-cog"></i>
  <span>Setting</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
  <li><a href="<?php echo e(url('/branchadmin/setting')); ?>"><i class="fa fa-wrench"></i> <span>Configuration</span></a></li>
  <li><a href="<?php echo e(url('/branchadmin/profile')); ?>"><i class="fa fa-wrench"></i> <span>profile</span></a></li>
  <li>
    <a href="<?php echo e(url('/branchadmin/salary_sheet')); ?>">
      <i class="fa fa-money"></i> <span>Salary Sheet</span>
    </a>
  </li>
  <?php if(\App\Branch::isParent(auth()->guard('staffs')->user()->branch)): ?>
      <li>
        <a href="<?php echo e(url('/branchadmin/branch')); ?>">
          <i class="fa fa-file-text-o"></i> <span>Branch</span>
        </a>
      </li>
  <?php endif; ?>
  <li><a href="<?php echo e(url('/branchadmin/tax')); ?>"><i class="fa fa-money"></i> <span>Tax</span></a></li>
  <li><a href="<?php echo e(url('/branchadmin/onboard_setting')); ?>"><i class="fa fa-gear"></i> <span>OnBoard Setting</span></a></li>
  <li>
    <a href="<?php echo e(url('/branchadmin/changepassword')); ?>">
    <i class="fa fa-key"></i> <span>Change Password</span>
    </a>
  </li>
  <li>
    <a href="<?php echo e(url('/branchadmin/department')); ?>"><i class="fa fa-building-o"></i> Departments</a>
  </li>
  <li>
    <a href="<?php echo e(url('/branchadmin/shifttime')); ?>"><i class="fa fa-exchange"></i>Shift Timing</a>
  </li>
  <li>
    <a href="<?php echo e(url('/branchadmin/adjustment_reason')); ?>"><i class="fa fa-sliders"></i>Adjustment Reason</a>
  </li>
  <li>
    <a href="<?php echo e(url('/branchadmin/otreason')); ?>"><i class="fa fa-clock-o"></i>Overtime Reason</a>
  </li>
  <li>
    <a href="<?php echo e(url('/branchadmin/achievement')); ?>"><i class="fa fa-trophy"></i> Achievement</a>
  </li>
  <li>
    <a href="<?php echo e(url('/branchadmin/documents')); ?>"><i class="fa fa-newspaper-o"></i> Documents</a>
  </li>
  <li>
    <a href="<?php echo e(url('/branchadmin/meeting-minute')); ?>"><i class="fa fa-book"></i> Meeting Minutes</a>
  </li>
  <li>
      <a href="<?php echo e(url('/branchadmin/suggestion_for')); ?>">
      <i class="fa fa-commenting-o"></i> <span> Suggestion Category</span>
      </a>
    </li>
<?php if(auth()->guard('staffs')->user()->branch == 2): ?>
  <li>
    <a href="<?php echo e(url('/branchadmin/division')); ?>"><i class="fa fa-random"></i> Divisions</a>
  </li>
  <li>
    <a href="<?php echo e(url('/branchadmin/appraisal-category')); ?>"><i class="fa fa-bolt"></i> Appraisal Category</a>
  </li>
<?php endif; ?>
  <li>
    <a href="<?php echo e(url('/branchadmin/award-category')); ?>"><i class="fa fa-star"></i>Award</a>
  </li>
  <li class="treeview">
    <a href="#">
    <i class="fa fa-sign-out"></i>
    <span>Leaves</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
      <ul class="treeview-menu">
          <li><a href="<?php echo e(url('/branchadmin/leavetype')); ?>"><i class="fa fa-sitemap"></i> <span>Leave Types</span> </a>  </li>
        <?php if(auth()->guard('staffs')->user()->branch == 2): ?>
        
        <li><a href="<?php echo e(url('/branchadmin/fy')); ?>"><i class="fa fa-calendar"></i>Fiscal Year</a></li>
        <?php endif; ?>
        <li>
          <a href="<?php echo e(url('/branchadmin/leavesetting')); ?>">
          <i class="fa fa-wrench"></i> <span>Leave Setting</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/leavetemp')); ?>">
          <i class="fa fa-share-square-o"></i> <span>Manual Leave</span>
          </a>
        </li>
      </ul>
  </li>
  <li class="treeview">
    <a href="#">
    <i class="glyphicon glyphicon-plane"></i>
    <span>Travel</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
      <ul class="treeview-menu">
        <li>
          <a href="<?php echo e(url('/branchadmin/assignment_type')); ?>"><i class="glyphicon glyphicon-th-large"></i> <span>Assignment Type</span></a>  
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/assignment_category')); ?>"><i class="glyphicon glyphicon-th-list"></i> <span>Assignment Category</span></a>  
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/traveler_position')); ?>"><i class="fglyphicon glyphicon-user"></i> <span>Position</span></a>  
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/traveler_grade')); ?>"><i class="glyphicon glyphicon-tag"></i> <span>Grade</span></a>  
        </li>
      </ul>
  </li>

<?php if(auth()->guard('staffs')->user()->branch == 2): ?>
<li class="treeview">
  <a href="#">
  <i class="fa fa-calendar-check-o"></i>
  <span>Booking</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo e(url('/branchadmin/bookingplace')); ?>">
      <i class="fa fa-map-marker"></i> <span> Places</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/bookinghall')); ?>">
      <i class="fa fa-institution"></i> <span> Hall</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/bookingpurpose')); ?>">
      <i class="fa fa-map-signs"></i> <span> Purpose of Booking</span>
      </a>
    </li>
  </ul>
  </li>
<?php endif; ?>
<li class="treeview">
  <a href="#">
    <i class="fa fa-calendar-o"></i>
    <span>Voting</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li class="treeview">
      <a href="#">
        <i class="fa fa-calendar-o"></i>
        <span>Event/Fair</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="<?php echo e(url('/branchadmin/eventcategory')); ?>">
            <i class="fa fa-flag"></i> <span>Category</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/participants')); ?>">
            <i class="fa fa-th-large"></i> <span>Participant</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/evaluators')); ?>">
            <i class="fa fa-gavel"></i> <span>Evaluators</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/eventresult')); ?>">
            <i class="fa fa-flag"></i> <span>Result</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-calendar-o"></i>
        <span>Title Voting</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="<?php echo e(url('/branchadmin/title-voting/category')); ?>">
            <i class="fa fa-flag"></i> <span>Category</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/title-voting/index')); ?>">
            <i class="fa fa-hand-rock-o"></i> <span>Vote</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/title-voting/result')); ?>">
            <i class="fa fa-flag"></i> <span>Result</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</li>
</ul>
</li>
<li class="treeview">
  <a href="#">
    <i class="fa fa-users"></i>
    <span>Recruitment</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo e(route('branchadmin.recruitment_process.index')); ?>">
        <i class="fa fa-tasks"></i> <span>Recruitment Process </span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(route('branchadmin.job_location.index')); ?>">
        <i class="fa fa-thumb-tack"></i> <span>Job Location</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(route('branchadmin.job_level.index')); ?>">
        <i class="fa fa-sitemap"></i> <span>Job Type</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/jobs')); ?>">
        <i class="fa fa-clipboard"></i> <span>Job Post</span>
      </a>
    </li>
  </ul>
</li>


<!--task-->
<li class="treeview"> 
  <a href="#">
  <i class="fa fa-list-alt"></i>
  <span>Tasks</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo e(url('/branchadmin/tasks')); ?>">
      <i class="fa fa-list-ol"></i> <span>Tasks</span>
      <span class="pull-right-container">
      <small class="label pull-right bg-yellow"><?php echo e(\App\StaffTask::countUnaccept()); ?></small>
      <small class="label pull-right bg-red"><?php echo e(\App\TaskChat::countUnreadMessage()); ?></small>
      </span>
      </a>
    </li>

    <li>
      <a href="<?php echo e(url('/branchadmin/help_desk')); ?>">
      <i class="fa fa-headphones"></i> <span>Help Desk</span>
      <span class="pull-right-container">
      <small class="label pull-right bg-yellow"><?php echo e(\App\HelpDesk::countUnaccept()); ?></small>
      <small class="label pull-right bg-red"><?php echo e(\App\HelpChat::countUnreadMessage()); ?></small>
      </span>
      </a>
    </li>
  </ul>
</li>
<!--request-->
<li class="treeview">
  <a href="#">
  <i class="fa fa-share-square-o"></i>
  <span>Requests</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo e(url('/branchadmin/leaverequest')); ?>">
      <i class="fa fa-calendar-times-o"></i> <span>Leave Requests</span>
      <span class="pull-right-container">
      <small class="label pull-right bg-red"><?php echo e(\App\LeaveRequest::countApprovalWaiting()); ?></small>
      </span>
      </a>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-plane"></i>
        <span>Travel</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="<?php echo e(url('/branchadmin/travel')); ?>">
            <i class="glyphicon glyphicon-send"></i> <span>Request</span>
            <span class="pull-right-container">
            <small class="label pull-right bg-red"><?php echo e(\App\Travel::countApprovalWaiting()); ?></small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/travel_planner')); ?>">
            <i class="glyphicon glyphicon-calendar"></i> <span>Planner</span>
            <span class="pull-right-container">
            <small class="label pull-right bg-red"><?php echo e(\App\TravelPlanner::countWaitingApproval()); ?></small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/travel_report')); ?>">
            <i class="fa fa-money"></i> <span>Report</span>
            <span class="pull-right-container">
            <small class="label pull-right bg-red">
              <?php echo e(\App\Travel::countExpenseApprovalWaiting()); ?>

            </small>
            </span>
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/handover')); ?>">
      <i class="fa fa-retweet"></i> <span>Handover Requests</span>
      <span class="pull-right-container">
      <small class="label pull-right bg-red"><?php echo e(\App\LeaveWorkHandover::getAllRequest()); ?></small>
      </span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/adjustment')); ?>">
      <i class="fa fa-user-plus"></i> <span>Adjustment Request</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/compensatory')); ?>">
      <i class="fa fa-repeat"></i> <span>Compensatory Off</span>
      <span class="pull-right-container">
      <small class="label pull-right bg-red"><?php echo e(\App\CompensatoryOff::getRequest()); ?></small>
      </span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/otrequest')); ?>">
      <i class="fa fa-history"></i> <span>Overtime Request</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/meetings')); ?>">
      <i class="fa fa-users"></i> <span>Meetings</span>
      <span class="pull-right-container">
      <small class="label pull-right bg-red"><?php echo e(\App\BookingStaffs::allApprovalWaiting(auth()->guard('staffs')->user()->id)); ?></small>
      </span>
      </a>
    </li>
  </ul>
</li>
<!--booking-->
<li class="treeview">
  <a href="#">
  <i class="fa fa-calendar-check-o"></i>
  <span>Booking</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo e(url('/branchadmin/booking')); ?>">
      <i class="fa fa-bank"></i> <span>Hall Booking </span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/timebooking')); ?>">
      <i class="fa fa-calendar"></i> <span>Time Booking </span>
      </a>
    </li>
  </ul>
</li>

<?php if(\App\BranchSetting::isHrHandler() || (auth()->guard('staffs')->user()->branch==2 && auth()->guard('staffs')->user()->department==4)): ?>
<li class="treeview">
  <a href="#">
  <i class="fa fa-black-tie"></i>
  <span>HR Handler</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo e(url('/branchadmin/otstaff')); ?>">
      <i class="fa fa-user"></i> <span>Staff</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/department')); ?>"><i class="fa fa-building-o"></i> Departments</a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/achievements')); ?>"><i class="fa fa-trophy"></i> Achievements</a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/notice')); ?>"><i class="fa fa-sticky-note-o"></i> Notice</a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/event')); ?>"><i class="fa fa-calendar"></i> Event</a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/service_history')); ?>"><i class="fa fa-calendar"></i>Service History</a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/survey')); ?>">
        <i class="fa fa-sticky-note"></i><span>Survey</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('branchadmin/attendance-handler')); ?>"> 
        <i class="fa fa-binoculars"></i> <span>Attendance Handler</span>
      </a>
    </li> 
    <li>
      <a href="<?php echo e(url('/branchadmin/on-boarding')); ?>">
      <i class="fa fa-users"></i> <span>On Boarding Staffs</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/interview')); ?>">
      <i class="fa fa-microphone"></i> <span>Exit Interview</span>
      </a>
    </li>
    <!--horoscope setting-->
    <li>
      <a href="<?php echo e(url('/branchadmin/horoscope')); ?>">
        <i class="fa fa-moon-o"></i> <span>Horoscope </span>
      </a>
    </li>
  </ul>
</li>
<?php endif; ?>
<?php if(\App\BranchSetting::isStaffHandler() && !\App\BranchSetting::isHrHandler()): ?>
      <li>
      <a href="<?php echo e(url('/staffs/adjustment_staff')); ?>">
      <i class="fa fa-user"></i> <span>Staff Handler</span>
      </a>
    </li>
<?php endif; ?>
<?php if(\App\BranchSetting::isSurveyHandler() && !\App\BranchSetting::isHrHandler()): ?>
    <li>
      <a href="<?php echo e(url('/branchadmin/survey')); ?>">
        <i class="fa fa-sticky-note"></i><span>Configuration</span>
      </a>
    </li>
<?php endif; ?>
<?php if(\App\BranchSetting::isTrainingHandler() && !\App\BranchSetting::isHrHandler()): ?>
  
<?php endif; ?>
<?php if(\App\BranchSetting::getAttendanceHandler(auth()->guard('staffs')->user()->id, auth()->guard('staffs')->user()->branch) && !\App\BranchSetting::isHrHandler()): ?>
    <li>
      <a href="<?php echo e(url('branchadmin/attendance-handler')); ?>"> 
        <i class="fa fa-binoculars"></i> <span>Attendance Handler</span>
      </a>
    </li>
<?php endif; ?>

<?php if(\App\Department::isDeptHead() || \App\Adjustment_staff::isSMT()): ?>
    <li><a href="<?php echo e(url('/branchadmin/department/obstaff')); ?>"><i class="fa fa-building-o"></i> <span>Department Asset</span></a></li>
<?php endif; ?>

<!--hrm -->
<li class="treeview">
  <a href="#">
  <i class="fa fa-black-tie"></i>
  <span>HRM</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo e(url('/branchadmin/otstaff')); ?>"><i class="fa fa-user-plus"></i>Staff</a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/asset')); ?>"><i class="fa fa-circle-thin"></i>Asset
          <span class="label pull-right bg-green"><?php echo e(\App\ObStaff::countMyUnAcceptAsset()); ?></span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/suggestions')); ?>">
      <i class="fa fa-commenting-o"></i> <span> Suggestions</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/attendance')); ?>">
      <i class="fa fa-check-square-o"></i> <span>Attendance</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/subordinate_comment')); ?>">
      <i class="fa fa-edit"></i> <span>Subordinate Note</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/branchadmin/achievements')); ?>">
      <i class="fa fa-trophy"></i> <span>Achievements</span>
      </a>
    </li>
    <li class="treeview"> 
      <a href="#">
        <i class="fa fa-file-text"></i><span>Survey</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="<?php echo e(url('/branchadmin/staff-survey')); ?>">
          <i class="fa fa-sticky-note"></i><span>Stay Interview</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/mysurvey')); ?>">
            <i class="fa fa-sticky-note"></i><span>My Survey's</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-newspaper-o"></i>
        <span>Hr Letter</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="<?php echo e(url('/branchadmin/letter')); ?>">
            <i class="fa fa-list-alt"></i> <span>Letter Type</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/hr_letter')); ?>">
            <i class="fa fa-wrench"></i> <span>Letter Setup</span>
          </a>
        </li>
      </ul>
    </li>
    
    <?php if(\App\Adjustment_staff::hasSubOrdinate()): ?>
    <li>
      <a href="<?php echo e(url('/branchadmin/probation_evaluation')); ?>">
        <i class="fa fa-file-o"></i> <span>Probation</span>
        <!-- <span class="pull-right-container">
          <small class="label pull-right bg-red"><?php echo e(\App\ProbationEvaluation::countStaffProbation()); ?></small>
        </span> -->
      </a>
    </li>
    <?php endif; ?>
    <!--<li>-->
    <!--  <a href="<?php echo e(url('/branchadmin/holiday')); ?>">-->
    <!--  <i class="fa fa-compass"></i> <span>Holidays</span>-->
    <!--  </a>-->
    <!--</li>-->
    <?php if(\App\BranchSetting::payrollViewer()): ?>
        <li>
          <a href="<?php echo e(url('/branchadmin/payroll')); ?>">
            <i class="fa fa-money" aria-hidden="true"></i> <span>payroll</span>
          </a>
        </li>
    <?php endif; ?>
    <?php if(\App\BranchSetting::isAccountHandler()): ?>
        <li>
          <a href="<?php echo e(url('/branchadmin/staff_salary')); ?>">
            <i class="fa fa-money" aria-hidden="true"></i> <span>Add Staff Salary</span>
          </a>
        </li>
    <?php endif; ?>  
    <li class="treeview">
      <?php 
        $terminationCount = \App\TerminationStaff::getAdminTerminationCount(); 
        $resignationCount = \App\ResignationStaff::getAdminResignationCount();
        $approvalCount = \App\DepartmentApproval::getSupervisorApprovalCount(auth()->guard('staffs')->user()->department);
      ?>
      <a href="#">
        <i class="fa fa-sign-out"></i>
        <span>Offboarding</span>
        <span class="pull-right-container">
          <?php if($terminationCount || $resignationCount || $approvalCount): ?>
          <small class="label pull-right bg-red">new</small>
          <?php endif; ?>
        </span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="<?php echo e(url('/branchadmin/offboarding/approval')); ?>">
            <i class="fa fa-thumbs-o-up"></i> <span>Approval</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">
                <?php echo e($approvalCount); ?>

              </small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/offboarding/resignation')); ?>">
            <i class="fa fa-flag-o"></i> <span>Resignation</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">
                <?php echo e($resignationCount); ?>

              </small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/offboarding/termination')); ?>">
            <i class="fa fa-exclamation-triangle"></i> <span>Termination</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">
                <?php echo e($terminationCount); ?>

              </small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/interview')); ?>">
          <i class="fa fa-microphone"></i> <span>Exit Interview</span>
          </a>
        </li>
      </ul>
</li>
    <li>
    <?php /* <?php if(auth()->guard('staffs')->user()->branch == 1): ?> */ ?>
    <!--quiz-->
    <li class="treeview">
      <a href="#">
        <i class="fa fa-question"></i>
        <span>Quiz</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="<?php echo e(url('/branchadmin/test_category')); ?>">
            <i class="fa fa-crosshairs"></i> <span>Quiz Category</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/test_exam')); ?>">
            <i class="fa fa-book"></i> <span>Quiz </span>
          </a>
        </li>
      </ul>
    </li> 
    <?php /* <?php endif; ?> */ ?>
    <!--organizational chart-->
    <li class="treeview">
      <a href="#">
        <i class="fa fa-sitemap"></i>
        <span>Organization Chart</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="<?php echo e(url('/branchadmin/organizationChart')); ?>">
            <i class="fa fa-crosshairs"></i> <span>Chart</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/organizationChart/getMember')); ?>">
            <i class="fa fa-users"></i> <span>Members</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</li>

<?php ($rev = \App\LeaveSetting::getUploader()); ?>
<?php if($rev == auth()->guard('staffs')->user()->id): ?>
<li>
  <a href="<?php echo e(url('/branchadmin/upload_revenue')); ?>">
  <i class="fa fa-reorder"></i> <span>Upload Revenue</span>
  </a>
</li>
<?php endif; ?>
<!--clent detail-->
<li>
  <a href="<?php echo e(url('/branchadmin/clientdetail')); ?>"><i class="fa fa-briefcase"></i> Client Detail</a>
</li>
<!--calendar-->
<li><a href="<?php echo e(url('/branchadmin/calendar')); ?>"> <i class="fa fa-calendar"></i> <span>Calendar</span> </a></li>
<!--canteen-->
<li class="treeview">
  <a href="#">
  <i class="fa fa-coffee"></i>
  <span>Canteen</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li><a href="<?php echo e(url('/branchadmin/canteen-menu')); ?>"><i class="fa fa-cutlery"></i> Menu</a></li>
    <li><a href="<?php echo e(url('/branchadmin/canteen-menu/orders')); ?>"><i class="fa fa-list-alt"></i> Orders</a></li>
  </ul>
</li>
<!--newsfeed-->
<li>
    <a href="<?php echo e(url('/branchadmin/newsfeed')); ?>"> <i class="fa fa-rss"></i> <span>Newsfeed</span> 
    </a>
</li>
<!--miscellaneous-->
<li class="treeview">
  <a href="#">
    <i class="fa fa-gg"></i>
    <span>Miscellaneous</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <!--diary-->
    <li>
      <a href="<?php echo e(url('/branchadmin/diary')); ?>">
        <i class="fa fa-book"></i> <span>Diary</span>
      </a>
    </li>
    <!--push notification-->
    <li>
      <a href="<?php echo e(url('/branchadmin/pushnotification')); ?>">
      <i class="fa fa-envelope"></i> <span>Push Notification</span>
      </a>
    </li>
    <!--horoscope -->
    <li class="treeview">
          <a href="#">
            <i class="fa fa-moon-o"></i>
            <span>Horoscope</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu" style="margin-left: -20px;">
          <!-- <span class="btn btn-sm" style="padding:0 10px; background:white; float:right; color:black;border-radius:50px;" >नेपाली</span> -->
            <?php if(\App\Horoscope::todayHoroscope()): ?>
            <div class="newsfeed">
              <button type="button" id="toggleHoroscopeBtn" onclick="toggleHoroscopeBtn()" class="btn btn-sm" style="z-index:99999;padding:0 10px; background: #06b2e6; float:right; color:#fff;border-radius:50px;position: absolute; right: 18px; top: 120px;">नेपाली</button>
              <input type="hidden" name="horoscopeType" id="horoscopeType" value="english">
              <div id="horoscope" style="height:300px; overflow-y: scroll; overflow-x:hidden">
              </div>
            </div>
            <?php else: ?> 
            <li>
              <iframe src="https://www.ashesh.com.np/rashifal/widget.php?header_title=Nepali Rashifal&header_color=f0b03f&api=290042j267" frameborder="0" scrolling="yes" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%; height:365px; border-radius:5px;" allowtransparency="true"></iframe>
            </li>
            <?php endif; ?>
          </ul>
        </li>
    </li>
  </ul>
</li>


<!--<li>-->
<!--  <a href="" onclick="event.preventDefault();-->
<!--   document.getElementById('logout-form').submit();">-->
<!--  <i class="fa fa-power-off"></i> <span>Logout</span>-->
<!--  </a>-->
<!--</li>-->

<!--newsfeed -->
  
  <div class="newsfeed">
    <h3>News Feed</h3>
    <div id="list_notification" style="height:300px; overflow-y: scroll; overflow-x: hidden"></div>
  </div>
  <script src="https://momentjs.com/downloads/moment.min.js"></script>
  <script>
    var page = 1;
      getNewsFeedNotification(page);
      $('#list_notification').on('scroll', function(){
        if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
          page++;
          getNewsFeedNotification(page);
        }
      });
      function getNewsFeedNotification(page){
        var token = $('input[name=\'_token\']').val();
        $.ajax({
          url: "<?php echo e(route('branchadmin.newsfeed.notification')); ?>?page="+page,
          data:{
              _token: token,
              page: page,
          },
          type: 'get',
          dataType: 'JSON',
          success:function(data){
            console.log(data.msg)
            var notifications = data.msg.data
            var notificationHtml = '';
            $.each(notifications, function(index, value){
              var image = 'noimage.png';
              if(value.user.image){
                image = value.user.image
              }
              var created_at = ''
              var created_at = moment(value.created_at).fromNow()
              notificationHtml+= '<div class="feedblock"><a href="<?php echo e(url("branchadmin/newsfeed")); ?>'+'/'+value.newsfeed_id+'"><div class="row cm10-row"><div class="col-md-3"><div class="thumb"><img class="img-circle" src="<?php echo e(asset("image")); ?>'+'/'+image+'"></div></div><div class="col-md-9"><div class=""><p>'+value.message+'<span class="pull-right" style="color: grey; font-size: 10px;">'+created_at+'</span></p></div></div></div></a></div>'
            });
            if(data.msg.last_page == page){
                notificationHtml += '<div class="feedblock"><p class="text-center">No More Data</p></div>';
            }
            if(page==1){
                $('#list_notification').html(notificationHtml); 
            }else{
                $('#list_notification').append(notificationHtml);
            }
          },
          error:function(error){
            console.log(error)
          },
          complete:function(data){
          }
        })
      }
  </script>
  
  <!-- horoscope  -->
<script>
  var token = $('input[name=\'_token\']').val();
  var horoscopeType = $('#horoscopeType').val();
  callHoroscope(horoscopeType);
  function callHoroscope(horoscopeType)
  {
    if(horoscopeType == 'english'){
      horoscopeType = 'nepali';
      $('#toggleHoroscopeBtn').text('English');
      $('#horoscopeType').val(horoscopeType);
    }else{
      horoscopeType = 'english';
      $('#toggleHoroscopeBtn').text('नेपाली');
      $('#horoscopeType').val(horoscopeType);
    }
    $.ajax({
        url: "<?php echo e(route('branchadmin.horoscope.getHoroscope')); ?>",
        data:{
            _token: token,
            type: horoscopeType,
        },
        type: 'get',
        dataType: 'JSON',
        success:function(data){
          console.log(data.msg)
          
          var horoscope = data.msg
          var html = '';
          $.each(horoscope, function(index, value){
            html += '<div class="feedblock" style="white-space: initial;padding:3px 10px;"><div class="row"><div class="col-md-2"><div class="thumb" ><img class="img-circle" style="height:36px; width:25px;" src="'+value.image+'"></div></div><div class="col-md-8"><h6 style="font-weight: 600; color: #000; overflow:hidden;text-overflow:ellipsis">'+value.title+'</h6></div></div><div class="row"><div class="col-md-12"><p style="color: grey; font-size: 10px; overflow:hidden;text-overflow:ellipsis">'+value.data+'</p></div></div></div>'
          });
          $('#horoscope').html(html)
        },
        error:function(error){
          console.log(error)
        },
        complete:function(data){
        }
    })
  }
  function toggleHoroscopeBtn()
  {
    var horoscopeType = $('#horoscopeType').val();
    callHoroscope(horoscopeType);
  }
</script>
</section>