<section class="sidebar">
          <!-- Sidebar user panel -->
          
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
           
            <li class="treeview">
              <a href="<?php echo e(url('/staffs')); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            
            </li>
 <?php ($canteen = \App\BranchSetting::getCanteen(auth()->guard('staffs')->user()->branch)); ?>     
<?php if($canteen != auth()->guard('staffs')->user()->department): ?>
<li class="treeview">
  <a href="#">
    <i class="fa fa-cog"></i>
    <span>Setting</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo e(url('/staffs/profile')); ?>">
        <i class="fa fa-file-text-o"></i> <span>Profile</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/salary_sheet')); ?>">
        <i class="fa fa-money"></i> <span>Salary Sheet</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/changepassword')); ?>">
        <i class="fa fa-key"></i> <span>Change Password</span>
      </a>
    </li>
    <?php ($rev = \App\LeaveSetting::getUploader()); ?>
            <?php if($rev == auth()->guard('staffs')->user()->id): ?>
            <li>
              <a href="<?php echo e(url('/staffs/upload_revenue')); ?>">
                <i class="fa fa-line-chart"></i> <span>Upload Revenue</span>
              </a>
            </li>
           <?php endif; ?>
           
            <?php ($rev = \App\LeaveSetting::getManager()); ?>
            <?php if($rev == auth()->guard('staffs')->user()->id): ?>
            <li>
              <a href="<?php echo e(url('/staffs/leavetemp')); ?>">
                <i class="fa fa-calendar-times-o"></i> <span>Manage Leave</span>
              </a>
            </li>
           <?php endif; ?>
    
  </ul>
</li>
<!--tasks-->
<li class="treeview">
  <a href="#">
    <i class="fa fa-list-alt"></i>
    <span>Tasks</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo e(url('/staffs/tasks')); ?>">
        <i class="fa fa-list-ol"></i> <span>Tasks</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-yellow"><?php echo e(\App\StaffTask::countUnaccept()); ?></small>
          <small class="label pull-right bg-red"><?php echo e(\App\TaskChat::countUnreadMessage()); ?></small>
        </span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/help_desk')); ?>">
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
      <a href="<?php echo e(url('/staffs/leaverequest')); ?>">
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
          <a href="<?php echo e(url('/staffs/travel')); ?>">
            <i class="glyphicon glyphicon-send"></i> <span>Request</span>
            <span class="pull-right-container">
            <small class="label pull-right bg-red"><?php echo e(\App\Travel::countApprovalWaiting()); ?></small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/staffs/travel_planner')); ?>">
            <i class="glyphicon glyphicon-calendar"></i><span>Planner</span>
            <span class="pull-right-container">
            <small class="label pull-right bg-red"><?php echo e(\App\TravelPlanner::countWaitingApproval()); ?></small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/staffs/travel_report')); ?>">
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
      <a href="<?php echo e(url('/staffs/handover')); ?>">
      <i class="fa fa-retweet"></i> <span>Handover Requests</span>
      <span class="pull-right-container">
      <small class="label pull-right bg-red"><?php echo e(\App\LeaveWorkHandover::getAllRequest()); ?></small>
      </span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/adjustment')); ?>">
      <i class="fa fa-user-plus"></i> <span>Adjustment Request</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/compensatory')); ?>">
      <i class="fa fa-repeat"></i> <span>Compensatory Off</span>
      <span class="pull-right-container">
      <small class="label pull-right bg-red"><?php echo e(\App\CompensatoryOff::getRequest()); ?></small>
      </span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/otrequest')); ?>">
      <i class="fa fa-history"></i> <span>Overtime Request</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/meetings')); ?>">
      <i class="fa fa-users"></i> <span>Meetings</span>
      <span class="pull-right-container">
      <small class="label pull-right bg-red"><?php echo e(\App\BookingStaffs::allApprovalWaiting(auth()->guard('staffs')->user()->id)); ?></small>
      </span>
      </a>
    </li>
  </ul>
</li>
<!--booking          -->
<li class="treeview">
  <a href="#">
  <i class="fa fa-calendar-check-o"></i>
  <span>Booking</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo e(url('/staffs/booking')); ?>">
      <i class="fa fa-bank"></i> <span>Hall Booking </span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/meetings')); ?>">
      <i class="fa fa-calendar"></i> <span>Meetings </span>
      <span class="pull-right-container">
        <small class="label pull-right bg-red"><?php echo e(\App\BookingStaffs::allApprovalWaiting(auth()->guard('staffs')->user()->id)); ?></small>
      </span>
      </a>
    </li>
  </ul>
</li>           
<?php if(\App\BranchSetting::isHrHandler()): ?>
<li class="treeview">
  <a href="#">
  <i class="fa fa-black-tie"></i>
  <span>HR Handler</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo e(url('/staffs/adjustment_staff')); ?>">
      <i class="fa fa-user"></i> <span>Staff</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/department')); ?>"><i class="fa fa-building-o"></i> Departments</a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/achievements')); ?>"><i class="fa fa-trophy"></i> Achievements</a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/notice')); ?>"><i class="fa fa-sticky-note-o"></i> Notice</a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/event')); ?>"><i class="fa fa-calendar"></i> Event</a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/survey-setup')); ?>">
      <i class="fa fa-sticky-note"></i><span>Survey</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('staffs/attendance-handler')); ?>"> 
      <i class="fa fa-binoculars"></i> <span>Attendance</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/on-boarding')); ?>">
      <i class="fa fa-users"></i> <span>On Boarding Staffs</span>
      </a>
    </li>
    <li class="treeview">
      <a href="#">
      <i class="glyphicon glyphicon-plane"></i>
      <span>Travel</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
        <ul class="treeview-menu">
          <li>
            <a href="<?php echo e(url('/staffs/assignment_type')); ?>"><i class="glyphicon glyphicon-th-large"></i> <span>Assignment Type</span></a>  
          </li>
          <li>
            <a href="<?php echo e(url('/staffs/assignment_category')); ?>"><i class="glyphicon glyphicon-th-list"></i> <span>Assignment Category</span></a>  
          </li>
          <li>
            <a href="<?php echo e(url('/staffs/traveler_position')); ?>"><i class="glyphicon glyphicon-user"></i> <span>Position</span></a>  
          </li>
          <li>
            <a href="<?php echo e(url('/staffs/traveler_grade')); ?>"><i class="glyphicon glyphicon-tag"></i> <span>Grade</span></a>  
          </li>
        </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="glyphicon glyphicon-tag"></i>
        <span>Training</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="<?php echo e(url('/staffs/trainer')); ?>"><i class="glyphicon glyphicon-th-large"></i> <span>Trainer
          </span></a>
        </li>
        <li>
          <a href="<?php echo e(url('/staffs/training_status')); ?>"><i class="glyphicon glyphicon-th-large"></i> <span>
            Status 
          </span></a>
        </li>
        <li>
          <a href="<?php echo e(url('/staffs/training_program')); ?>"><i class="glyphicon glyphicon-th-large"></i> <span>Program/Course
          </span></a>
        </li>
        <li>
          <a href="<?php echo e(url('/staffs/training')); ?>"><i class="glyphicon glyphicon-th-large"></i> <span>Training
          </span></a>
        </li>
        <li>
          <a href="<?php echo e(url('/staffs/td/overview')); ?>"><i class="glyphicon glyphicon-th-large"></i> <span>T&D module
          </span></a>
        </li>
      </ul>
    </li>
    
    <li>
      <a href="<?php echo e(url('/staffs/interview')); ?>">
      <i class="fa fa-microphone"></i> <span>Exit Interview</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/horoscope')); ?>">
      <i class="fa fa-moon-o"></i><span>Horoscope</span>
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
      <a href="<?php echo e(url('/staffs/survey-setup')); ?>">
      <i class="fa fa-sticky-note"></i><span>Survey Handler</span>
      </a>
    </li>
<?php endif; ?>
<?php if(\App\BranchSetting::isTrainingHandler() && !\App\BranchSetting::isHrHandler()): ?>
    <li class="treeview">
      <a href="#">
        <i class="glyphicon glyphicon-tag"></i>
        <span>Training</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="<?php echo e(url('/staffs/trainer')); ?>"><i class="glyphicon glyphicon-th-large"></i> <span>Trainer
          </span></a>
        </li>
      </ul>
    </li>
<?php endif; ?>
<?php if(\App\BranchSetting::getAttendanceHandler(auth()->guard('staffs')->user()->id, auth()->guard('staffs')->user()->branch) && !\App\BranchSetting::isHrHandler()): ?>
    <li>
      <a href="<?php echo e(url('staffs/attendance-handler')); ?>"> 
      <i class="fa fa-binoculars"></i> <span>Attendance Handler</span>
      </a>
    </li>
<?php endif; ?>
<?php if(\App\Department::isDeptHead()): ?>
  <li><a href="<?php echo e(url('/staffs/department/obstaff')); ?>"><i class="fa fa-building-o"></i> <span>Department Asset</span></a></li>
<?php endif; ?>
<li class="treeview">
  <a href="#">
  <i class="fa fa-black-tie"></i>
  <span>HRM</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li><a href="<?php echo e(url('/staffs/staffs')); ?>"><i class="fa fa-user-plus"></i>Staff</a></li>
    <li>
      <a href="<?php echo e(url('/staffs/asset')); ?>"><i class="fa fa-circle-thin"></i>Asset
          <span class="label pull-right bg-green"><?php echo e(\App\ObStaff::countMyUnAcceptAsset()); ?></span>
      </a>
    </li>
    <li><a href="<?php echo e(url('/staffs/report')); ?>"><i class="fa fa-reorder"></i> <span>Report</span></a></li>
    <li>
      <a href="<?php echo e(url('/staffs/suggestions')); ?>">
      <i class="fa fa-commenting-o"></i> <span> Suggestions</span>
      </a>
    </li>
    <?php if(\App\BranchSetting::payrollViewer()): ?>
        <li>
          <a href="<?php echo e(url('/staffs/staff_salary')); ?>">
            <i class="fa fa-money" aria-hidden="true"></i> <span>Add Staff Salary</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/staffs/payroll')); ?>">
            <i class="fa fa-money" aria-hidden="true"></i> <span>payroll</span>
          </a>
        </li>
    <?php endif; ?>
    <li>
      <a href="<?php echo e(url('/staffs/attendance')); ?>">
      <i class="fa fa-check-square-o"></i> <span>Attendance</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/subordinate_comment')); ?>">
      <i class="fa fa-edit"></i> <span>Subordinate Note</span>
      </a>
    </li>
    <li class="treeview"> 
      <a href="#">
        <i class="fa fa-file-text"></i><span>Survey</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="<?php echo e(url('/staffs/staff-survey')); ?>">
          <i class="fa fa-sticky-note"></i><span>Stay Interview</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/staffs/survey')); ?>">
            <i class="fa fa-sticky-note"></i><span>Survey</span>
          </a>
        </li>
      </ul>
    </li>
    
    <?php /* <?php if(auth()->guard('staffs')->user()->branch == 1): ?> */ ?>
    <!-- exit interview  -->
    <li>
      <a href="<?php echo e(url('/staffs/test_exam')); ?>">
        <i class="fa fa-question"></i> <span>Quiz</span>
      </a>
    </li>
    <?php /* <?php endif; ?> */ ?>
    <li>
      <a href="<?php echo e(url('/staffs/mytraining')); ?>">
        <i class="fa fa-black-tie"></i> <span>My Training</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/staffs/title-voting')); ?>">
        <i class="fa fa-hand-rock-o"></i><span>Voting</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('staffs/organizationChart')); ?>">
        <i class="fa fa-sitemap"></i>
        <span>Organization Chart</span></i>
      </a>
    </li>
    <?php if(\App\Adjustment_staff::hasSubOrdinate()): ?>
    <li>
      <a href="<?php echo e(url('/staffs/probation_evaluation')); ?>">
        <i class="fa fa-file-o"></i> <span>Probation</span>
        <!-- <span class="pull-right-container">
          <small class="label pull-right bg-red"><?php echo e(\App\ProbationEvaluation::countStaffProbation()); ?></small>
        </span> -->
      </a>
    </li>
    <?php else: ?>
    <li>
      <a href="<?php echo e(url('/staffs/probation/'.auth()->guard('staffs')->user()->id.'/view')); ?>">
        <i class="fa fa-file-o"></i> <span>Probation</span>
        <!-- <span class="pull-right-container">
          <small class="label pull-right bg-red"><?php echo e(\App\ProbationEvaluation::countStaffProbation()); ?></small>
        </span> -->
      </a>
    </li>
    <?php endif; ?>
    <li class="treeview">
      <?php 
      $terminationStaffCount = \App\TerminationStaff::getStaffTermination(auth()->guard('staffs')->user()->id); 
      $resignationStaffCount = \App\ResignationStaff::getStaffResignation(auth()->guard('staffs')->user()->id);
      $hr = \App\LeaveSetting::where('branch_id', auth()->guard('staffs')->user()->branch)->first();
      $resignationHrCount = 0;
      $terminationHrCount = 0;
      if($hr->approve_person==auth()->guard('staffs')->user()->id){
        $resignationHrCount = \App\ResignationStaff::getHrResignation();
        $terminationHrCount = \App\TerminationStaff::getHrTermination();
      }
      ?>
      <a href="#">
        <i class="fa fa-sign-out"></i>
        <span>Offboarding</span>
        <span class="pull-right-container">
          <?php if($terminationStaffCount || $resignationStaffCount || $resignationHrCount || $terminationHrCount): ?>
          <small class="label pull-right bg-red">new</small>
          <?php endif; ?>
        </span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="<?php echo e(url('/staffs/offboarding/resignation')); ?>">
            <i class="fa fa-flag-o"></i> <span>Resignation</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">
                <?php if($resignationHrCount): ?>
                <?php echo e($resignationHrCount); ?>

                <?php else: ?>
                <?php echo e($resignationStaffCount); ?>

                <?php endif; ?>
              </small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/staffs/offboarding/termination')); ?>">
            <i class="fa fa-exclamation-triangle"></i> <span>Termination</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">
                <?php if($terminationHrCount): ?>
                <?php echo e($terminationHrCount); ?>

                <?php else: ?>
                <?php echo e($terminationStaffCount); ?>

                <?php endif; ?>
              </small>
            </span>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</li>
<?php endif; ?>
<?php if(\App\BranchSetting::getClient(auth()->guard('staffs')->user()->branch) == auth()->guard('staffs')->user()->department): ?>
<li>
  <a href="<?php echo e(url('/staffs/clientdetail')); ?>">
  <i class="fa fa-users"></i><span>Clients</span>
  </a>
</li>
<?php endif; ?>
 <li><a href="<?php echo e(url('/staffs/holidays')); ?>"> <i class="fa fa-calendar"></i> <span>Calendar</span> </a></li>        
 <li class="treeview">
  <a href="#">
  <i class="fa fa-coffee"></i>
  <span>Canteen</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li><a href="<?php echo e(url('/staffs/canteen-menu')); ?>"><i class="fa fa-cutlery"></i> Menu</a></li>
    <li><a href="<?php echo e(url('/staffs/canteen-menu/orders')); ?>"><i class="fa fa-list-alt"></i> Orders</a></li>
  </ul>
</li>

<li><a href="<?php echo e(url('/staffs/meeting-minute')); ?>"><i class="fa fa-book"></i> Meeting Minutes</a> </li>

<li><a href="<?php echo e(url('/staffs/newsfeed')); ?>"> <i class="fa fa-rss"></i> <span>Newsfeed</span> </a></li>
<!--miscellaneous-->
<li class="treeview">
    <a href="#">
    <i class="fa fa-gg"></i>
    <span>Miscellaneous</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <!--diary-->
        <li>
          <a href="<?php echo e(url('/staffs/diary')); ?>">
            <i class="fa fa-book"></i> <span>Diary</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e('https://rollingplans.com.np/webmail'); ?>" target="_blank">
            <i class="fa fa-envelope-o"></i> <span>WebMail</span>
          </a>
        </li>
        <!-- horoscope  -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-moon-o"></i>
            <span>Horoscope</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu" style="margin-left: -20px;">
          <!-- <span class="btn btn-sm" style="padding:0 10px; background:white; float:right; color:black;border-radius:50px;" >नेपाली</span> -->
            <?php if(\App\Horoscope::todayHoroscope()): ?>
            <div class="newsfeed">
              <button type="button" id="toggleHoroscopeBtn" onclick="toggleHoroscopeBtn()" class="btn btn-sm" style="z-index:99999;padding:0 10px; background: #06b2e6; float:right; color:#fff;border-radius:50px;position: absolute; right: 18px; top: 100px;">नेपाली</button>
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
    </ul>
</li>

<li><a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> <span>Logout</span></a> </li>


</ul>
          
    <!--newsfeed -->
    <div class="newsfeed tp10p">
    <h3>News Feed</h3>
    <div id="list_notification" style="height:320px; overflow-y: scroll; overflow-x: hidden"></div>
    </div>
  <script>
    var timeout = null;
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
        url: "<?php echo e(route('staffs.newsfeed.notification')); ?>?page="+page,
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
            notificationHtml+= '<div class="feedblock"><a href="<?php echo e(url("staffs/newsfeed")); ?>'+'/'+value.newsfeed_id+'"><div class="row cm10-row"><div class="col-md-3"><div class="thumb"><img class="img-circle" src="<?php echo e(asset("image")); ?>'+'/'+image+'"></div></div><div class="col-md-9"><div class="post"><p>'+value.message+'<span class="pull-right" style="color: grey; font-size: 10px;">'+created_at+'</span></p></div></div></div></a></div>'
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
          url: "<?php echo e(route('staffs.horoscope.getHoroscope')); ?>",
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