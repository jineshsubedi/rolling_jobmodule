<?php $__env->startSection('heading'); ?>
Staff Detail
            
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="<?php echo e(url('/supervisor/staffs')); ?>"><i class="fa fa-users"></i> Staffs</a></li>  
            <li class="active">Staff</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
  .performance-table tr td, .performance-table tr th{
    padding: 0px 8px !important;
  }
  .staff-detail {
    float: none !important;
  }
  .staff-detail i{
    color:#00c0ef;
  }
  .staff-detail ul{
    padding:0px;
    margin:0px;
  }
  .staff-detail ul li{
    list-style-type: none;
    border-bottom:1px solid #f7f7f7;
    padding:4px 0px;
  }
  .staff-name{
    color: #70bf55;
    font-size: 22px;
    padding-bottom:10px !important;
    margin:0px;
    line-height: 5px;
  }
  .rt30p{
    padding-right:.30px;
  }
  .pointbox{
  border: 1px solid #0890c7;
  padding:2px 15px;
  border-radius:3px;
  font-size:16px;
  color:#0890c7;
  margin-right:15px;
  }
  .penaltybox{
  border: 1px solid #d53009;
  padding:2px 15px;
  border-radius:3px;
  font-size:16px;
  color:#d53009;
  }
  .permanentbtn{
  background-color: #70bf55;
  color:#fff;
  border-radius:15px;
  padding:1px 10px;
  }
  .probationbtn{
  background-color: #70bf55;
  color:#fff;
  border-radius:15px;
  padding:1px 10px;
  }
  .temporarybtn{
  background-color: #70bf55;
  color:#fff;
  border-radius:15px;
  padding:1px 10px;
  }
  .profilehd{
  background-color:#e6f7fd;
  color:#0096c4;
  padding:7px 15px;
  font-size:15px;
  border-radius:3px 3px 0px 0px;
  margin:15px 0px 0px 0px;
  font-weight:600;
  }
  .profile_infolist{
    border:1px solid #f4f4f4;
  }
  .profile_infolist ul{
  list-style-type: none;
  background-color:#fff;
  padding:5px 0px;
  margin:0px;
  }
  .profile_infolist ul li{
    padding:5px 15px;
    border-bottom:1px solid #f4f4f4;
  }
  .profile_infolist ul li:last-child{
    border-bottom:0px;
  }
  .normal{
    font-weight: 400;
    font-size:13px;
    color:#000;
  }
  .profilebtn{
    border-radius: 3px;
    border:1px solid #ebebeb;
    color:#0890c7;
    font-weight: 500;
    font-size:12px;
    background-image: linear-gradient(to bottom,#f9f9f9 0,#ffffff 100%);
    -webkit-transition: background-color 0.6s ease-out;
      -moz-transition: background-color 0.6s ease-out;
      -o-transition: background-color 0.6s ease-out;
      transition: background-color 0.6s ease-out;
      margin-right:5px;
      padding:6px 20px;
  }
  .profilebtn:hover{
    background-image: linear-gradient(to bottom,#089dda 0,#0890c7 100%);
    border:1px solid #0394cf;
    color:#fff;
  }
  .tb15m{
    margin:15px 0px;
  }
  .performance-table tr td{
    line-height: 35px !important;
    background-color:#f6f6f6;
    border-bottom:1px solid #fff;
  }
</style>

<div class="row">
    <div class="col-xs-12">
      <div class="box">
            <div class="box-body">
            <div class="row cm10-row mb20">
              <div class="col-md-2">
                <img class="staff-image" src="<?php echo e(asset($datas['staff_image'])); ?>" style="border: 1px solid #7cc563;">
                <p class="text-center" style="background-color:#7cc563; color: #fff;">
                  <?php echo e($datas['employee_id']); ?>

                </p>
              </div>
              <div class="col-md-4">
                <div class="staff-detail">
                  <ul>
                    <li class="staff-name"><?php echo e($datas['staff_name']); ?></li>
                    <li><i class="fa fa-building"></i> <?php echo e(\App\Department::getTitle($datas['staff_department'])); ?></li>
                    <li><i class="fa fa-briefcase"></i> <a href="<?php echo e(isset($datas['tor']) ? asset('image/'.$datas['tor']) : '#'); ?>" target="_blank"><?php echo e($datas['staff_designation']); ?></a> 
                      <?php /* <span class="right permanentbtn">Permanent</span> */ ?>
                      <?php if($datas['probation_status']): ?>
                      <span class="right bg-purple">Probation Period</label>
                      <?php else: ?> 
                      <?php endif; ?>
                      <?php if($datas['nature_of_employment'] == 1): ?>
                      <span class="right permanentbtn">Permanent</span>
                      <?php else: ?>
                      <span class="right bg-orange">Temporary</span>
                      <?php endif; ?>
                    </li>
                    <li><i class="fa fa-envelope"></i> <?php echo e($datas['staff_email']); ?> <span class="right"><i class="fa fa-mobile"></i> <?php echo e($datas['staff_phone']); ?></span></li>
                    <li><i class="fa fa-calendar"></i> <?php echo e(\Carbon\Carbon::parse($datas['staff_dob'])->format('d M, Y')); ?> &nbsp; <?php echo e(ucwords($datas['staff_gender'])); ?></li>
                    <?php if($datas['client_ratings_avg']): ?>
                    <li><i class="fa fa-star"></i> Client Rating : <?php echo e($datas['client_ratings_avg']); ?></li>
                    <?php endif; ?>
                    <li><i class="fa fa-star"></i> Best Employee : <span class="greenclr bold"><?php echo e(\App\Award::countVoting($datas['staff_id'], 'Best')); ?></span> <span class="right"><i class="fa fa-trophy redclr"></i> Achievement : <span class="redclr bold">5</span></span></li>
                    <li><i class="fa fa-user-clock"></i> <?php echo e($datas['shift']->title); ?> (<?php echo e($datas['shift']->from); ?> - <?php echo e($datas['shift']->to); ?>)</li>
                    <li><span class="pointbox bold"><?php echo e($datas['ratio']['ratio']); ?></span> 
                    
                    <span class="penaltybox bold"><?php echo e($datas['ratio']['crossed_ratio']); ?></span></li>
                  </ul>
                  
                  
                </div>
              </div>
              <div class="col-md-6">
                <table class="table performance-table table-hover">
                    <thead>
                      <tr>
                        <th></th>
                        <?php if($datas['ratio']['task_rating_parameter'] > 0): ?>
                        <th><center>Task Management</center></th>
                        <?php endif; ?>
                        <?php if($datas['ratio']['kpi_rating_parameter'] > 0): ?>
                        <th><center>KPIs</center></th>
                        <?php endif; ?>
                        <?php if($datas['ratio']['descipline_rating_parameter'] > 0): ?>
                        <th><center>Disciplinary Action</center></th>
                        <?php endif; ?>
                         <?php if($datas['ratio']['punctuality_rating_parameter'] > 0): ?>
                        <th><center>Punctuality/Attendance</center></th>
                        <?php endif; ?>
                        <?php if($datas['ratio']['subordinate_rating_parameter'] > 0): ?>
                        <th><center>Subordinate/Supervisor Rating</center></th>
                        <?php endif; ?>
                        <?php if(count($datas['ratio']['others']) > 0): ?>
                        <?php foreach($datas['ratio']['others'] as $others): ?>
                        <th><center><?php echo e($others['title']); ?></center></th>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Weightage</td>
                        <?php if($datas['ratio']['task_rating_parameter'] > 0): ?>
                        <td><center><?php echo e($datas['ratio']['task_rating_parameter']); ?>%</center></td>
                        <?php endif; ?>
                        <?php if($datas['ratio']['kpi_rating_parameter'] > 0): ?>
                        <td><center><?php echo e($datas['ratio']['kpi_rating_parameter']); ?>%</center></td>
                        <?php endif; ?>
                        <?php if($datas['ratio']['descipline_rating_parameter'] > 0): ?>
                        <td><center><?php echo e($datas['ratio']['descipline_rating_parameter']); ?>%</center></td>
                        <?php endif; ?>
                         <?php if($datas['ratio']['punctuality_rating_parameter'] > 0): ?>
                        <td><center><?php echo e($datas['ratio']['punctuality_rating_parameter']); ?>%</center></td>
                        <?php endif; ?>
                        <?php if($datas['ratio']['subordinate_rating_parameter'] > 0): ?>
                        <td><center><?php echo e($datas['ratio']['subordinate_rating_parameter']); ?>%</center></td>
                        <?php endif; ?>
                        <?php if(count($datas['ratio']['others']) > 0): ?>
                        <?php foreach($datas['ratio']['others'] as $others): ?>
                        <td><center><?php echo e($others['parameter']); ?>%</center></td>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        
                      </tr>
                      <tr>
                        <td>Weightage Point</td>
                        <?php if($datas['ratio']['task_rating_parameter'] > 0): ?>
                        <td><center><span class="label label-info" title="Point you earned"><?php echo e($datas['ratio']['total_task_rating']); ?></span></center></td>
                        <?php endif; ?>
                        <?php if($datas['ratio']['kpi_rating_parameter'] > 0): ?>
                        <td><center><span class="label label-info" title="Point you earned"><?php echo e($datas['ratio']['total_kpi_rating']); ?></span></center></td>
                        <?php endif; ?>
                        <?php if($datas['ratio']['descipline_rating_parameter'] > 0): ?>
                        <td><center><span class="label label-info" title="Point you earned"><?php echo e($datas['ratio']['total_descipline_rating']); ?></span></center></td>
                        <?php endif; ?>
                         <?php if($datas['ratio']['punctuality_rating_parameter'] > 0): ?>
                        <td><center><span class="label label-info" title="Point you earned"><?php echo e($datas['ratio']['total_punctuality_rating']); ?></span></center></td>
                        <?php endif; ?>
                        <?php if($datas['ratio']['subordinate_rating_parameter'] > 0): ?>
                        <td><center><span class="label label-info" title="Point you earned"><?php echo e($datas['ratio']['total_subordinate_rating']); ?></span></center></td>
                        <?php endif; ?>
                        <?php if(count($datas['ratio']['others']) > 0): ?>
                        <?php foreach($datas['ratio']['others'] as $others): ?>
                        <td><center><span class="label label-info" title="Point you earned"><?php echo e($others['rating']); ?></span></center></td>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        
                      </tr>
                      <tr>
                        <td>Average Point</td>
                        <?php if($datas['ratio']['task_rating_parameter'] > 0): ?>
                        <td><center><span class="label bg-blue" title="Point you earned"><?php echo e($datas['ratio']['task_rating']); ?></span></center></td>
                        <?php endif; ?>
                        <?php if($datas['ratio']['kpi_rating_parameter'] > 0): ?>
                        <td><center><span class="label bg-blue" title="Point you earned"><?php echo e($datas['ratio']['kpi_rating']); ?></span></center></td>
                        <?php endif; ?>
                        <?php if($datas['ratio']['descipline_rating_parameter'] > 0): ?>
                        <td><center><span class="label bg-blue" title="Point you earned"><?php echo e($datas['ratio']['descipline_rating']); ?></span></center></td>
                        <?php endif; ?>
                         <?php if($datas['ratio']['punctuality_rating_parameter'] > 0): ?>
                        <td><center><span class="label bg-blue" title="Point you earned"><?php echo e($datas['ratio']['punctuality_rating']); ?></span></center></td>
                        <?php endif; ?>
                        <?php if($datas['ratio']['subordinate_rating_parameter'] > 0): ?>
                        <td><center><span class="label bg-blue" title="Point you earned"><?php echo e($datas['ratio']['subordinate_rating']); ?></span></center></td>
                        <?php endif; ?>
                        <?php if(count($datas['ratio']['others']) > 0): ?>
                        <?php foreach($datas['ratio']['others'] as $others): ?>
                        <td><center><span class="label bg-blue" title="Point you earned"><?php echo e($others['oth_rating']); ?></span></center></td>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        
                      </tr>
                    </tbody>
                </table>
              </div>

            </div>
            <div class="col-lg-12 col-xs-12" style="border-top: 1px solid #e6e6e6;">
              <?php if(\App\BranchSetting::isHrHandler() || (auth()->guard('staffs')->user()->branch==2 && auth()->guard('staffs')->user()->department==4)): ?>
              <p>
                  <button type="button" class="btn profilebtn bg-yellow" onclick="openHistoryModel(2)" style="padding: 5px; margin: 5px;">Branch Transfer</button>
                  <button type="button" class="btn profilebtn bg-red" onclick="openHistoryModel(1)" style="padding: 5px; margin: 5px;">Department Transfer</button>
                  <button type="button" class="btn profilebtn bg-blue" onclick="openHistoryModel(3)" style="padding: 5px; margin: 5px;">Promotion</button>
                  <button type="button" class="btn profilebtn bg-brown" onclick="openHistoryModel(4)" style="padding: 5px; margin: 5px;">Status Change</button>
                  <button type="button" class="btn profilebtn bg-purple" onclick="terminateStaffForm()">Terminate</button>
                </p>
                <?php endif; ?>
            </div>
                       
            
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="<?php echo e($datas['tab'] == 'profile' ? 'active' : ''); ?>"><a href="#profile" data-toggle="tab" aria-expanded="false">Profile</a></li>
              <li class="<?php echo e($datas['tab'] == 'kpi' ? 'active' : ''); ?>"><a href="#kpi" data-toggle="tab" aria-expanded="false">KPI</a></li>
              <li class="<?php echo e($datas['tab'] == 'skill' ? 'active' : ''); ?>"><a href="#skills" data-toggle="tab" aria-expanded="false">Skills</a></li>
              <li class="<?php echo e($datas['tab'] == 'kra' ? 'active' : ''); ?>"><a href="#kra" data-toggle="tab" aria-expanded="false">KRA/KPA</a></li>
              <?php if(\App\Adjustment_staff::isSupervisor($datas['staff_id']) || \App\BranchSetting::isHrHandler() || auth()->guard('staffs')->user()->branch == 2 && auth()->guard('staffs')->user()->department == 4): ?>
              <li class="<?php echo e($datas['tab'] == 'task' ? 'active' : ''); ?>"><a href="#tasks" data-toggle="tab" aria-expanded="false">Tasks</a></li>
              <li class="<?php echo e($datas['tab'] == 'help' ? 'active' : ''); ?>"><a href="#requests" data-toggle="tab" aria-expanded="false">Help Desk</a></li>
              <li class="<?php echo e($datas['tab'] == 'leave' ? 'active' : ''); ?>"><a href="#leave" data-toggle="tab" aria-expanded="false">Approved Leave</a></li>
              <li class="<?php echo e($datas['tab'] == 'performance' ? 'active' : ''); ?>"><a href="#performance" data-toggle="tab" aria-expanded="false">Performance Note</a></li>

              <li class="<?php echo e($datas['tab'] == 'survey' ? 'active' : ''); ?>"><a href="#survey" data-toggle="tab" aria-expanded="false">Survey</a></li>
              <li class="<?php echo e($datas['tab'] == 'appraisal_note' ? 'active' : ''); ?>"><a href="#appraisal_note" data-toggle="tab" aria-expanded="false">Appraisal Notes</a></li>
              <li class="<?php echo e($datas['tab'] == 'calendar' ? 'active' : ''); ?>"><a href="#calendar" data-toggle="tab" aria-expanded="false">Calendar</a></li>
              <li class="<?php echo e($datas['tab'] == 'productivity' ? 'active' : ''); ?>"><a href="#productivity" data-toggle="tab" aria-expanded="false">Productivity</a></li>
              <li class="<?php echo e($datas['tab'] == 'contract' ? 'active' : ''); ?>"><a href="#contract" data-toggle="tab" aria-expanded="false">Contract</a></li>
              <li class="<?php echo e($datas['tab'] == 'service' ? 'active' : ''); ?>"><a href="#service" data-toggle="tab" aria-expanded="false">Service History</a></li>
              <?php endif; ?>
              <?php if(\App\BranchSetting::payrollViewer()): ?>
              <li class="<?php echo e($datas['tab'] == 'salary' ? 'active' : ''); ?>"><a href="#salary" data-toggle="tab" aria-expanded="false">Salary</a></li>
              <?php endif; ?>
             
            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo e($datas['tab'] == 'salary' ? 'active' : ''); ?>" id="salary">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-12">
                    <a href="<?php echo e(url('/supervisor/staff_salary/addsalary/'.$datas['staff_id'])); ?>" class="btn btn-info pull-right" target="_blank"><i class="fa fa-plus"> Add Salary</i></a>
                    <h3 class="profilehd">Salary Information</h3>
                    <div class="profile_infolist">
                      <table class="table table-bordered table-striped">
                        <tr>
                          <th>SN</th>
                          <th>Base Salary</th>
                          <th>Basic Salary</th>
                          <th>PF</th>
                          <th>OT</th>
                          <th>Total Allowance</th>
                          <th>Advance</th>
                          <th>Advance Canteen</th>
                          <th>Salary Date</th>
                        </tr>
                        <?php foreach($datas['salary'] as $k=>$salary): ?>
                        <tr>
                          <td><?php echo e($k+1); ?></td>
                          <td><?php echo e($salary->base_salary); ?></td>
                          <td><?php echo e($salary->basic_salary); ?></td>
                          <td><?php echo e($salary->pf == 1? 'Yes' : 'No'); ?></td>
                          <td><?php echo e($salary->ot == 1? 'Yes' : 'No'); ?></td>
                          <td><?php echo e($salary->total_salary); ?></td>
                          <td><?php echo e($salary->advance); ?></td>
                          <td><?php echo e($salary->advance_salary); ?></td>
                          <td><?php echo e(\Carbon\Carbon::parse($salary->salary_date)->format('d M, Y')); ?></td>
                        </tr>
                        <?php endforeach; ?>
                      </table>

                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane <?php echo e($datas['tab'] == 'profile' ? 'active' : ''); ?>" id="profile">
                <?php ($staff_profile = \App\Adjustment_staff::find($datas['staff_id'])); ?>
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-12">
                    <h3 class="profilehd">Personal Information</h3>
                    <div class="profile_infolist">
                      <ul>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Citizenship Number : <span class="bold"><?php echo e($staff_profile->citizenship_number); ?></span></li>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Pan Number :<span class="bold"> <?php echo e($staff_profile->pan); ?></span></li>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Emergency Contact Number :<span class="bold"> <?php echo e($staff_profile->emergency_contact_number); ?></span></li>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Permanent Address :<span class="bold"> <?php echo e($staff_profile->permanent_address); ?></span></li>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Temporary Address :<span class="bold"> <?php echo e($staff_profile->temporary_address); ?></span></li>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Maritial Status :<span class="bold"><?php echo e($staff_profile->marital_status == 1 ? 'Married' : 'Un Married'); ?></span></li>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Qualification : <span class="bold"><?php echo e(\App\EducationLevel::getTitle($staff_profile->education_level)); ?></span></li>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Faculty : <span class="bold"><?php echo e(\App\Faculty::getTitle($staff_profile->faculty)); ?></span></li>
                        
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-12">
                    <h3 class="profilehd">Official Information</h3>
                    <div class="profile_infolist">
                      <ul>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Type : <span class="bold">
                          <?php if($staff_profile->staffType == 1): ?>
                          Supervisor
                          <?php elseif($staff_profile->staffType == 2): ?>
                          Staff
                          <?php elseif($staff_profile->staffType == 3): ?>
                          Branchadmin
                          <?php else: ?>
                          <?php endif; ?>
                        </span></li>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Supervisor :<span class="bold"><?php echo e(\App\Adjustment_staff::getName($staff_profile->supervisor)); ?></span></li>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Shift Time :<span class="bold"><?php echo e(\App\Shifttime::gettitle($staff_profile->shiftTime)); ?></span></li>
                        <?php if($staff_profile->joindate > 0): ?>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Join Date :<span class="bold"><?php echo e(\Carbon\Carbon::parse($staff_profile->joindate)->format('d M, Y')); ?> 
                          <?php ($date1 = new \DateTime($staff_profile->joindate)); ?>
                          <?php ($date2 = new \DateTime()); ?>
                          <?php ($diffe = $date1->diff($date2)); ?>
                          <?php echo e($diffe->y . " years, " . $diffe->m." months, ".$diffe->d." days "); ?>

                        </span></li>
                        <?php endif; ?>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Status :<span class="bold">
                          <?php if($staff_profile->status == 1): ?>
                          Currently Working
                          <?php elseif($staff_profile->status == 2): ?>
                          Resigned
                          <?php elseif($staff_profile->status == 3): ?>
                          Absconding
                          <?php elseif($staff_profile->status == 4): ?>
                          Terminated
                          <?php else: ?>
                          <?php endif; ?>
                        </span></li>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Bank Account : <span class="bold"><?php echo e($staff_profile->bank_name); ?> <?php echo e($staff_profile->account_number); ?></span></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-12">
                    <h3 class="profilehd">Permanent Location <span class="right normal"><i class="fa fa-map-marker redclr"></i> Get Location</span></h3>
                    <div class="profile_infolist">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-12">
                    <h3 class="profilehd">Documents</h3>
                    <div class="profile_infolist">
                      <ul>
                        <?php if($staff_profile->resume): ?>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Resume : <span class="bold">
                          <a href="<?php echo e(asset('image/'.$staff_profile->resume)); ?>" class="right greenclr"><i class="fa fa-download"></i></a>
                        </span></li>
                        <?php endif; ?>
                        <?php if($staff_profile->id_proof): ?>
                        <li><i class="fa  fa-check-square-o greenclr"></i> ID Proof : <span class="bold">
                          <a href="<?php echo e(asset('image/'.$staff_profile->id_proof)); ?>" class="right greenclr"><i class="fa fa-download"></i></a>
                        </span></li>
                        <?php endif; ?>
                        <?php if($staff_profile->contract): ?>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Contract : <span class="bold">
                          <a href="<?php echo e(asset('image/'.$staff_profile->contract)); ?>" class="right greenclr"><i class="fa fa-download"></i></a>
                        </span></li>
                        <?php endif; ?>
                        <?php if($staff_profile->offer_letter): ?>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Offer Letter : <span class="bold">
                          <a href="<?php echo e(asset('image/'.$staff_profile->offer_letter)); ?>" class="right greenclr"><i class="fa fa-download"></i></a>
                        </span></li>
                        <?php endif; ?>
                        <?php if($staff_profile->appointment_letter): ?>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Appointment Letter : <span class="bold">
                          <a href="<?php echo e(asset('image/'.$staff_profile->appointment_letter)); ?>" class="right greenclr"><i class="fa fa-download"></i></a>
                        </span></li>
                        <?php endif; ?>
                        <?php if(json_decode($staff_profile->dynamic_formData)): ?>
                        <?php ($dforms = json_decode($staff_profile->dynamic_formData)); ?>
                        <?php for($i=0;$i<count($dforms);$i++): ?>
                        <li><i class="fa  fa-check-square-o greenclr"></i> Label : <span class="bold">
                          <a href="<?php echo e(asset('image/')); ?>" class="right greenclr"><i class="fa fa-download"></i></a>
                        </span></li>
                        <?php endfor; ?>
                        <?php endif; ?>
                      </ul>
                    </div>
                  </div>
                </div>

                <?php /* <div class="row tb15m">
                  <div class="col-lg-12 col-md-12 col-12">
                    <a href="#" class="btn profilebtn"><i class="fa fa-medal"></i> Promote</a>
                    <a href="#" class="btn profilebtn"><i class="fa fa-plane-departure"></i> Transfer</a>
                    <a href="#" class="btn profilebtn"><i class="fa fa-coin"></i> Loan</a>
                    <a href="#" class="btn profilebtn"><i class="fa fa-money"></i> Advance</a>
                    <a href="#" class="btn profilebtn"><i class="fa fa-history"></i> History</a>
                    <a href="#" class="btn profilebtn"><i class="fa fa-file-contract"></i> Company Detail</a>
                    <a href="#" class="btn profilebtn"><i class="fa fa-file-alt"></i> Document</a>
                  </div>
                </div> */ ?>
              </div>
              <div class="tab-pane <?php echo e($datas['tab'] == 'service' ? 'active' : ''); ?>" id="service">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-lg-12 col-xs-12">
                      <?php if(\App\BranchSetting::isHrHandler() || (auth()->guard('staffs')->user()->branch==2 && auth()->guard('staffs')->user()->department==4)): ?>
                        <p>
                          <button type="button" class="btn profilebtn bg-yellow" onclick="openHistoryModel(2)" style="padding: 5px; margin: 5px;">Branch Transfer</button>
                          <button type="button" class="btn profilebtn bg-red" onclick="openHistoryModel(1)" style="padding: 5px; margin: 5px;">Department Transfer</button>
                          <button type="button" class="btn profilebtn bg-blue" onclick="openHistoryModel(3)" style="padding: 5px; margin: 5px;">Promotion</button>
                          <button type="button" class="btn profilebtn bg-brown" onclick="openHistoryModel(4)" style="padding: 5px; margin: 5px;">Status Change</button>
                          <button type="button" class="btn profilebtn bg-purple" onclick="terminateStaffForm()">Terminate</button>
                        </p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-body no-padding">
                        <table class="table table-bordered table-striped">
                          <tr>
                            <th>Service Type</th>
                            <th>Date</th>
                            <th>Detail</th>
                          </tr>
                          <?php foreach($datas['service'] as $service): ?>
                          <tr>
                            <td>
                              <?php if($service->type == 1): ?>
                              Department Transfer
                              <?php elseif($service->type == 2): ?>
                              Branch Transfer
                              <?php elseif($service->type == 3): ?>
                              Promotion
                              <?php elseif($service->type == 4): ?>
                              Status Change
                              <?php elseif($service->type == 6): ?>
                              Salary Reviesed
                              <?php elseif($service->type == 5): ?>
                              Salary Increment
                              <?php elseif($service->type == 7): ?>
                              <?php else: ?>
                              <?php endif; ?>
                            </td>
                            <td>
                              <?php echo e(\Carbon\Carbon::parse($service->promoted_date)->format('d M, Y')); ?>

                            </td>
                            <td>
                              <?php echo e($service->previous); ?>

                              <i class="fa fa-hand-o-right"></i>
                              <?php echo e($service->current); ?>

                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane <?php echo e($datas['tab'] == 'contract' ? 'active' : ''); ?>" id="contract">
                <div class="row">
                  <div class="col-md-12">
                    <burron type="button" class="btn btn-info right" onclick="addContractForm(<?php echo e($datas['staff_id']); ?>)">Add Contract</a>
                  </div>
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-body no-padding">
                          <table class="table table-bordered">
                            <tr>
                              <th>SN</th>
                              <th>From</th>
                              <th>To</th>
                              <th>Document</th>
                              <th>Duration</th>
                              <th>Action</th>
                            </tr>
                            <?php foreach($datas['contract'] as $k=>$contract): ?>
                              <tr>
                                <th><?php echo e($k+1); ?></th>
                                <th><?php echo e(\Carbon\Carbon::parse($contract->from)->format('d M, Y')); ?></th>
                                <th><?php echo e(\Carbon\Carbon::parse($contract->to)->format('d M, Y')); ?></th>
                                <th>
                                  <a href="<?php echo e(asset('image'.'/'.$contract->document)); ?>">
                                    <img src="<?php echo e(asset('image/pdf_icon.png')); ?>" width="50px">
                                  </a>
                                </th>
                                <th>
                                <?php if($contract->to >= Date('Y-m-d')): ?>
                                <?php echo e(\Carbon\Carbon::parse($contract->to)->diffForHumans()); ?>

                                <?php else: ?> 
                                  Contract Expired
                                <?php endif; ?>
                                </th>
                                <th>
                                <form action="<?php echo e(url('supervisor/otstaff/contract'.'/'.$datas['staff_id'].'/delete'.'/'.$contract->id)); ?>" method="post">
                                  <?php echo csrf_field(); ?>

                                  <?php echo method_field('DELETE'); ?>

                                  <button type="button" class="btn btn-info" onclick="updateContract(<?php echo e($contract); ?>)"><i class="fa fa-edit"></i></button>
                                  <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                </form>
                                </th>
                              </tr> 
                            <?php endforeach; ?>
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane <?php echo e($datas['tab'] == 'productivity' ? 'active' : ''); ?>" id="productivity">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-body no-padding">
                        <div id="productivity">
                          <div class="row">
                            <div class="col-md-2">
                              <input type="text" class="form-control" id="filter_productivity_year" value="<?php echo e($datas['filter_productivity_year']); ?>">
                            </div>
                            <div class="col-md-2">
                              <select name="month" id="filter_productivity_month" class="form-control">
                                <option value="">select month</option>
                                <option value="1" <?php if($datas['filter_productivity_month']==1): ?> selected <?php endif; ?>>Janaury</option>
                                <option value="2" <?php if($datas['filter_productivity_month']==2): ?> selected <?php endif; ?>>Febraury</option>
                                <option value="3" <?php if($datas['filter_productivity_month']==3): ?> selected <?php endif; ?>>March</option>
                                <option value="4" <?php if($datas['filter_productivity_month']==4): ?> selected <?php endif; ?>>April</option>
                                <option value="5" <?php if($datas['filter_productivity_month']==5): ?> selected <?php endif; ?>>May</option>
                                <option value="6" <?php if($datas['filter_productivity_month']==6): ?> selected <?php endif; ?>>June</option>
                                <option value="7" <?php if($datas['filter_productivity_month']==7): ?> selected <?php endif; ?>>July</option>
                                <option value="8" <?php if($datas['filter_productivity_month']==8): ?> selected <?php endif; ?>>August</option>
                                <option value="9" <?php if($datas['filter_productivity_month']==9): ?> selected <?php endif; ?>>September</option>
                                <option value="10" <?php if($datas['filter_productivity_month']==10): ?> selected <?php endif; ?>>October</option>
                                <option value="11" <?php if($datas['filter_productivity_month']==11): ?> selected <?php endif; ?>>November</option>
                                <option value="12" <?php if($datas['filter_productivity_month']==12): ?> selected <?php endif; ?>>December</option>
                              </select>
                            </div>
                            <div class="col-md-2">
                              <button type="button" id="exportProductivityBtn" class="btn btn-success"><i class="fa fa-download"></i> Export</button>
                            </div>
                            <div class="col-md-6"></div>
                          </div>
                          <br>
                          <div class="col-md-7">
                          <div class="row">
                              <div class="col-md-2">Date</div>
                              <div class="col-md-6">
                              <table class="table" style="margin-top: -10px;">
                              <tr>
                                <td style="width:40%">Title</td>
                                <td style="width:30%">Duration</td>
                                <td style="width:30%">Estimated Duration</td>
                              </tr>
                              </table>
                              </div>
                              <div class="col-md-2">Total Time</div>
                              <div class="col-md-2">Idle Time</div>
                            </div>
                            <?php foreach($productivity as $p): ?>
                              <!-- <?php echo e($p['date']); ?> -->
                            <div class="row well">
                              <div class="col-md-2"><?php echo e($p['date']); ?></div>
                              <div class="col-md-6">
                              <table class="table table-bordered" style="margin-top: -10px;">
                              <?php foreach($p['tasks'] as $task): ?>
                              <tr>
                                <td style="width:40%"><?php echo e($task->description); ?></td>
                                <td style="width:30%"><?php echo e($task->duration); ?></td>
                                <td style="width:30%"><?php echo e($task->estimated_duration); ?></td>
                              </tr>
                              <?php endforeach; ?>
                              </table>
                              </div>
                              <div class="col-md-2"><?php echo e($p['total']); ?></div>
                              <div class="col-md-2"><?php echo e($p['idle']); ?></div>
                            </div>
                            <?php endforeach; ?>
                          </div>
                          <div class="col-md-5">
                            <canvas id="productivityChart" height="200" style="border: 1px solid grey;"></canvas>
                            <br>
                            <canvas id="productivityBarChart" width="100%" style="border: 1px solid grey; height: 20px"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



             <div class="tab-pane <?php echo e($datas['tab'] == 'appraisal_note' ? 'active' : ''); ?>" id="appraisal_note">
                 <div class="row task-header">
                  <strong>Appraisal Notes</strong>
               
              </div>


              <table class="table table-bordered table-hover">
                <?php if(count($datas['appraisal_note']) > 0): ?>
                <?php foreach($datas['appraisal_note'] as $ap_note): ?>

                <thead>
                  <tr>
                    <td colspan="4">Notes of <?php echo e($ap_note['year']); ?> <?php echo e($ap_note['month']); ?></td>
                  </tr>
                  <tr>
                   
                    <th>Added By</th>
                    
                    <th>Remarks</th>
                    <th>Rating</th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php if(count($ap_note['notes']) > 0): ?>
                <?php foreach($ap_note['notes'] as $anote): ?>
                  <?php ($totn = count($anote['notes'])); ?>
                  <?php ($rspan = 'rowspan="'.$totn.'"'); ?>
                 
                  <tr>
                    <td colspan="4" style="font-weight: 700;"><?php echo e($anote['title']); ?></td>
                                      
                  </tr>
                  <?php if($totn > 0): ?>
                  <?php foreach($anote['notes'] as $snt): ?>
                   <tr>
                   
                    <td><?php echo e($snt['added_by']); ?></td>
                    <td><?php echo e($snt['note']); ?></td>
                    <td><?php echo e($snt['rating'] > 0 ? $snt['rating'] : ''); ?></td>

                   
                   
                  </tr>
                  <?php endforeach; ?>
                  <?php endif; ?>
                  <?php endforeach; ?>
                 <?php endif; ?>
                </tbody>
                <?php endforeach; ?>
                <?php endif; ?>
              </table>





              </div>

              <div class="tab-pane <?php echo e($datas['tab'] == 'survey' ? 'active' : ''); ?>" id="survey">
          <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 1%;">S.N.</th>
              <th>Date</th>
              <th>Action</th>
            
            </tr>
          </thead>
          <tbody>
           
            
            <?php ($i = 1); ?>
            <?php foreach($datas['survey'] as $survey): ?>
            <tr>
              <td><?php echo e($i++); ?></td>
            
            
              <td><?php echo e($survey->created_at); ?></td>
              <td>
               
               
                <a href="<?php echo e(url('/supervisor/staff-survey/view/'.$survey->id)); ?>" class="btn btn-success left"><i class="fa fa-fw fa-eye"></i></a>
              </td>
              
              
              
           
            </tr>
          
            <?php endforeach; ?>
          </tbody>
        </table>
          </div>
             
              
               <div class="tab-pane <?php echo e($datas['tab'] == 'kpi' ? 'active' : ''); ?>" id="kpi">
                <div class="row task-header">
                  <strong>KPI (Key Performance Indicators)</strong>
                <a class="btn btn-primary addbtn right" data-toggle="modal" data-target="#modal-add-kpi"><i class="fa fa-plus"></i>Add KPI</a>
              </div>


              <table id="kpi" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                   <th>First Quarter</th>
                   <th>Second Quarter</th>
                   <th>Third Quarter</th>
                   <th>Fourth Quarter</th>
                    
                  </tr>
                </thead>
                <tbody>
                 
                  <?php ($kpii = 1); ?>
                  <?php foreach($datas['staff_kpi'] as $skpi): ?>
                  
                  <tr id="kpi_row_<?php echo e($skpi['id']); ?>">
                    <td><?php echo e($kpii); ?></td>
                    <td><?php echo e($skpi['title']); ?></td>
                    <td><?php echo e($skpi['first_quearter']); ?></td>
                    <td><?php echo e($skpi['second_quearter']); ?></td>
                    <td><?php echo e($skpi['third_quearter']); ?></td>
                    <td><?php echo e($skpi['fourth_quearter']); ?></td>
                    
                  </tr>
                  <?php ($kpii++); ?>
                  <?php endforeach; ?>
                </tbody>

              </table>



              </div>
              
               <div class="tab-pane <?php echo e($datas['tab'] == 'skill' ? 'active' : ''); ?>" id="skills">
                 <div class="row task-header">
                  <strong>Key Skills</strong>
                <button class="btn btn-primary addbtn right" data-toggle="modal" data-target="#modal-add-skill"><i class="fa fa-plus"></i>Add Skills</button>
              </div>


              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Score</th>
                    <th>Weightage</th>
                    <th>Potential</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php ($ski = 1); ?>
                  <?php foreach($datas['staff_sills'] as $skills): ?>
                  <tr id="skill_row_<?php echo e($skills->id); ?>">
                    <td><?php echo e($ski); ?></td>
                    <td><?php echo e($skills->title); ?></td>
                    <td><?php echo e($skills->score); ?></td>
                    <td><?php echo e($skills->weightage); ?></td>
                    <td><?php echo e($skills->potential); ?></td>
                    <td><button class="btn btn-danger" onclick="deleteSkill('<?php echo e($skills->id); ?>');"><i class="fa fa-trash"></i></button></td>
                  </tr>
                  <?php ($ski++); ?>
                  <?php endforeach; ?>
                </tbody>

              </table>





              </div>
              
              <div class="tab-pane <?php echo e($datas['tab'] == 'kra' ? 'active' : ''); ?>" id="kra">
              <div class="row task-header">
                  <strong>KRA (Key Responsibility Areas)</strong>
                <a class="btn btn-primary addbtn right" data-toggle="modal" data-target="#modal-add-kra"><i class="fa fa-plus"></i>Add KRA</a>
              </div>
<?php foreach($datas['staff_kra'] as $kra): ?>
              <div class="box box-info collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo e($kra['title']); ?></h3><span class="label label-success" style="margin-left: 20px;"><?php echo e($kra['weightage']); ?></span>
                 <input type="hidden" id="kra-title-<?php echo e($kra['id']); ?>" value="<?php echo e($kra['title']); ?>">
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Edit KRA" onclick="editKra('<?php echo e($kra["id"]); ?>');"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" onclick="deletekra('<?php echo e($kra["id"]); ?>');"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
              <div class="table-responsive">
                <table class="table no-margin" style="width: 95%; float: right;">
                  
                  <tbody>
                    <?php foreach($kra['kpas'] as $kpa): ?>
                  <tr id="kpa-row-<?php echo e($kpa->id); ?>">
                    <td><?php echo e($kpa->title); ?><input type="hidden" id="kpa-title-<?php echo e($kpa->id); ?>" value="<?php echo e($kpa->title); ?>"></td>
                  
                    <td width="100">
                         <button type="button" class="btn-primary" data-toggle="tooltip" title="Edit KPA" onclick="editKPa('<?php echo e($kpa->id); ?>');"><i class="fa fa-edit"></i></button>
                     <button class=" btn-danger" onclick="deleteKpa('<?php echo e($kpa->id); ?>');"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                  <?php endforeach; ?>
               
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left" onclick="addKpa('<?php echo e($kra["id"]); ?>');">Add KPA</a>
              
            </div>
            <!-- /.box-footer -->
          </div>

<?php endforeach; ?>


          


                
              </div>
              <!-- /.tab-pane -->
        <div class="tab-pane <?php echo e($datas['tab'] == 'task' ? 'active' : ''); ?>" id="tasks">
                <div class="row task-header">
                  <strong>Tasks</strong>
                <a href="<?php echo e(url('/supervisor/otstaff/addtask/'.$datas['staff_id'])); ?>" class="btn btn-primary addbtn right"><i class="fa fa-plus"></i>Add Task</a>
              </div>
                <?php if(count($datas['tasks']) > 0): ?>
                  
                 
          <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style="width: 1%;">S.N.</th>
                        <th>Title</th>
                        <th>Task From</th>
                        <th>Task To</th>
                        <th>Project</th>
                        <th>Status</th>
                        <th>Deadline</th>
                      <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      
                      <?php ($i = 1); ?>
                     <?php foreach($datas['tasks'] as $task): ?>
                     <?php ($acheck = \App\StaffTask::checkAssign($task->id)); ?>
                     <tr>
                        <td><?php echo e($i); ?></td>
                        <td><a href="#" data-toggle="modal" data-target="#modal-task-<?php echo e($task->id); ?>"><?php echo e($task->title); ?> (<?php echo e(\App\StaffKra::getTitle($task->kra)); ?>)</a>
                        
                        <?php if($task->task_to != $task->task_from && $task->accept_status != 1): ?>
                        <span class="label label-warning">Not Accepted</span>
                        <?php endif; ?>
                        
                        <?php echo $acheck > 0 ? '<span class="assign label bg-blue" onclick="viewAssign('.$task->id.')">Assigned</span>' : '';?>
                      </td>
                        <td><?php echo e(\App\Adjustment_staff::getName($task->task_from)); ?></td>
                        <td><?php echo e(\App\Adjustment_staff::getName($task->task_to)); ?></td>
                        <td><?php echo e($task->project); ?></td>
                        <td><?php echo \App\TaskJobs::getStatusSpan($task->complete_status,$task->finish_time); ?></td>
                        <td><?php echo e($task->finish_time); ?></td>
                      <td>

                        <?php $message = \App\TaskChat::getUnreadMessage($task->id); 
                            $total_message = \App\TaskChat::getAllUnreadMessage($task->id);
                        ?>

                        <?php if($task->complete == 1 && $task->complete_status != 1 && $task->task_from == auth()->guard('staffs')->user()->id): ?>
                    <button  onclick="approve('modal-approve','<?php echo e($task->id); ?>','<?php echo e($task->self_mark); ?>','<?php echo addslashes($task->title);?>','<?php echo e($task->finish_time); ?>')" class="badge bg-purple" data-toggle="modal" data-target="#modal-approve" data-original-title="Approve Complete">Approve</button>
                    <?php endif; ?>
                    <?php if($task->accept_status != 0 && $task->complete != 1 && $task->task_to == auth()->guard('staffs')->user()->id): ?>
                        <button  onclick="complete('modal-complete','<?php echo e($task->id); ?>','<?php echo e($task->title); ?>')" class="badge bg-purple" data-toggle="modal" data-target="#modal-complete" data-original-title="Complete">Complete</button>
                        <?php endif; ?>

                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Show Jobs" onclick="showJobs('<?php echo e($task->id); ?>')"><i class="fa fa-plus"></i>
                    </button>
                    
                    <button type="button" class="btn btn-box-tool chat-button" data-toggle="tooltip" title="View Chat" onclick="viewChatModal('modal-message','<?php echo e($task->id); ?>')" data-original-title="Contacts"><i class="fa fa-comments"></i>Chat
                     <?php if($message > 0): ?>
                      <span class="badge label-danger chatbadge"><?php echo e($message); ?></span>
                      <?php endif; ?>
                      <?php if($total_message > 0): ?>
                      <span class="badge bg-green chatbadge" style="right: 25px !important;"><?php echo e($total_message); ?></span>
                      <?php endif; ?>
                    </button>
                    
                       <?php if($task->task_from == auth()->guard('staffs')->user()->id): ?>
                        
                      <a href="<?php echo e(url('/supervisor/task/edit/'.$task->id)); ?>" type="button" class="btn btn-box-tool" data-original-title="Contacts">
                      <i class="fa fa-edit"></i></a>
                       <a href="#" onclick="confirmDelete('<?php echo e($task->id); ?>')" type="button" class="btn btn-box-tool" data-original-title="Contacts">
                      <i class="fa fa-trash"></i></a>
                      <?php endif; ?>

                       <?php if($task->complete_status != 1): ?>
                      <?php if($task->task_from == auth()->guard('staffs')->user()->id || $task->task_to == auth()->guard('staffs')->user()->id): ?>
                      <button data-toggle="modal" data-target="#modal-default" title="" onclick="viewModal('modal-default','<?php echo e($task->id); ?>','<?php echo e($task->task_to); ?>','<?php echo e($task->num_task); ?>')" class="badge bg-yellow" data-original-title="Add Job">Add Job</button>
                      <?php endif; ?>
                      <?php endif; ?>
                      <?php if($task->accept_status != 1 && $task->task_to == auth()->guard('staffs')->user()->id && $task->task_to != $task->task_from): ?>
                      <button data-toggle="tooltip" title="Accept" onclick="acceptJob('<?php echo e($task->id); ?>')" class="badge bg-green" data-original-title="Accept">Accept</button>
                      <?php endif; ?>

                      <?php if($task->complete_status != 1 && $task->task_to == auth()->guard('staffs')->user()->id): ?>
                      <button data-toggle="tooltip" title="Assign Task" onclick="assignTask('<?php echo e($task->id); ?>')" class="badge bg-blue" data-original-title="Assign Task">Assign</button>
                      <?php endif; ?>

                      </td>
                      </tr>
                     

                      <div class="modal fade" id="modal-task-<?php echo e($task->id); ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><?php echo e($task->title); ?></h4>
                              </div>
                             
                              <div class="modal-body">
                                   <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    KRA
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e(\App\StaffKra::getTitle($task->kra)); ?>

                                  </div>

                                             
                              </div>
                                <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    Start Date
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->start_time); ?>

                                  </div>

                                             
                              </div>

                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    Deadline
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->finish_time); ?>

                                  </div>
                                  
                                             
                              </div>
                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    Description
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->description); ?>

                                  </div>
                                  
                                             
                              </div>

                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    Status
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo \App\TaskJobs::getSpan($task->accept_status,$task->complete_status,$task->finish_time); ?>
                                  </div>
                                  
                                             
                              </div>

                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    Priority
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e(\App\TaskJobs::getPriority($task->priority)); ?>

                                  </div>
                                  
                                             
                              </div>

                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    Remarks
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->remarks); ?>

                                  </div>
                                  
                                             
                              </div>

                              <?php if($task->complete_status == 1): ?>
                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    Completed In
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->completed_date); ?>

                                  </div>
                                  
                                             
                              </div>
                              <?php endif; ?>

                               <?php if($task->self_mark > 0): ?>
                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                   Self Rating
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->self_mark); ?>

                                  </div>
                                  
                                             
                              </div>
                              <?php endif; ?>
                               <?php if($task->supervisor_mark > 0): ?>
                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                   Task Giver Rating
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->supervisor_mark); ?>

                                  </div>
                                  
                                             
                              </div>
                              <?php endif; ?>

                             
                              <?php if($task->supervisor_remarks != ''): ?>
                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                   Task Giver Remarks
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->supervisor_remarks); ?>

                                  </div>
                                  
                                             
                              </div>
                              <?php endif; ?>
                              
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                      </div>
                      <?php ($i++); ?>
                     <?php endforeach; ?>

                     </tbody>
                      

                    </table>
                  

               
                  
                <?php else: ?>
                  <div class="alert alert-warning">
                    
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    Sorry no any tasks found yet !
                  </div>
                <?php endif; ?>
                <div class="row">
                <div class="col-xs-12">
                  <div class="dataTables_paginate paging_simple_numbers right">
                      <?php echo $datas['tasks']->render();?>
                  </div>
                </div>
              </div>
              </div>
              
              
              
               <div class="tab-pane <?php echo e($datas['tab'] == 'help' ? 'active' : ''); ?>" id="requests">

                 <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Request From</th>
                        <th>Request Date</th>
                        <th>Finish Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php ($i = 1); ?>
                      <?php foreach($datas['help_desk'] as $hdesk): ?>
                      <tr>
                        <td><?php echo e($i); ?></td>
                        <td>
                            
                        
                      <a href="#" onclick="viewHelp('<?php echo e($hdesk->id); ?>')"><?php echo e($hdesk->title); ?></a>
                      <?php echo \App\TaskJobs::getSpan($hdesk->accept_status,$hdesk->complete_status,$hdesk->finish_time); ?>
                          </td>
                        <td><?php echo e(\App\Adjustment_staff::getName($hdesk->task_from)); ?></td>
                        <td><?php echo e($hdesk->start_time); ?></td>
                        <td><?php echo e($hdesk->finish_time); ?></td>
                        <td>
                          <?php if($hdesk->task_to == auth()->guard('staffs')->user()->id && $hdesk->accept_status != 1): ?>
                          <button onclick="acceptHelp('<?php echo e($hdesk->id); ?>')" class="badge bg-green" data-toggle="tooltip" data-original-title="Accept">Accept</button>
                          <?php endif; ?>
                           <?php if($hdesk->accept_status != 0 && $hdesk->complete != 1 && $hdesk->task_to == auth()->guard('staffs')->user()->id): ?>
                        <button  onclick="helpComplete('modal-helpcomplete','<?php echo e($hdesk->id); ?>','<?php echo e($hdesk->title); ?>')" class="badge bg-purple" data-toggle="modal" data-target="#modal-helpcomplete" data-original-title="Complete">Complete</button>
                        <?php endif; ?>
                           
                    <button type="button" class="btn btn-box-tool chat-button" data-toggle="modal" data-target="#modal-helpmessage" onclick="helpChatModal('modal-helpmessage','<?php echo e($hdesk->id); ?>')" data-original-title="Contacts"><i class="fa fa-comments"></i>Chat
                     
                    </button>
                   
                        </td>
                      </tr>
                      <?php ($i++); ?>
                      <?php endforeach; ?>

                    </tbody>
                  </table>
                <div class="row">
                <div class="col-xs-12">
                  <div class="dataTables_paginate paging_simple_numbers right">
                      <?php echo $datas['help_desk']->render();?>
                  </div>
                </div>
              </div>
              </div>
              <!-- /.tab-pane -->
              
              <div class="tab-pane <?php echo e($datas['tab'] == 'leave' ? 'active' : ''); ?>" id="leave">

                 <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Total Allow Day(s)</th>
                        <th>Leave Days(s)</th>
                        <th>Remaining Leave</th>
                        <th>Total Accrual</th>
                        <th>Remaining Accrual</th>
                        
                      </tr>
                    </thead>

                    <tbody>
                      <?php ($i = 1); ?>
                      <?php foreach($datas['leave_type'] as $leave): ?>
                      <tr>
                        <th><?php echo e($i); ?></th>
                        <th><?php echo e($leave['title']); ?></th>
                        <th><?php echo e($leave['allow_days']); ?></th>
                        <th><?php echo e($leave['total_days']); ?></th>
                        <th><?php echo e($leave['remaining']); ?></th>
                        <th><?php echo e($leave['total_accrual']); ?></th>
                        <th><?php echo e($leave['remaining_accrual']); ?></th>
                      </tr>
                      <?php ($i++); ?>
                      <?php endforeach; ?>

                    </tbody>
                  </table>
                 <div class="row task-header">
                    <strong>Approved Leave</strong>
                    <span class="right bg-red" style="font-size: 16px; font-weight:400;">
                      Total Unpaid Leave: <?php echo e(\App\LeaveRequest::UnpaidCountOfStaff($datas['staff_id'])); ?>

                    </span>  
                  </div>

                  <?php if(count($datas['approved_leave']) > 0): ?>
                   <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th> Leave Type</th>
                        <th> Leave From</th>
                        <th> Leave To</th>
                        <th> Duration</th>
                        <th> Handover To</th>
                        
                      </tr>
                    </thead>

                    <tbody>
                      <?php ($i = 1); ?>
                      <?php foreach($datas['approved_leave'] as $approved_leave): ?>
                      <?php $handover = '';
                          if (count($approved_leave->handoverTo) > 0) {
                            $br = '</br>';
                          } else{
                            $br = '';
                          }
                          foreach ($approved_leave->handoverTo as $key => $value) {
                           
                              $name = \App\Adjustment_staff::getName($value->handover_to);
                              if ($value->accept_status == 0) {
                                $handover .= '<span class="label bg-blue">'.$name.'</span>'.$br;
                              } elseif ($value->accept_status == 1) {
                                $handover .= '<span class="label bg-green">'.$name.'</span>'.$br;
                              } else{
                                 $handover .= '<span class="label bg-red pointer" onclick="viewStatus('.$value->id.')">'.$name.'</span><input type="hidden" id="status_'.$value->id.'" value="'.$value->description.'">'.$br;
                              }
                            }

                            ?>
                      <tr>
                        <td><?php echo e($i); ?></td>
                         <td><?php echo \App\LeaveType::getTitle($approved_leave->leave_type);?> <b>(<?php echo e($approved_leave->types == 1 ? 'Unpaid' : 'Paid'); ?>)</td>
                        <td><?php echo $approved_leave->start_date;?></td>
                        <td><?php echo $approved_leave->end_date;?></td>
                        <td><?php echo \App\LeaveRequest::getDuration($approved_leave->leave_type,$approved_leave->full_day,$approved_leave->duration,$approved_leave->start_date,$approved_leave->end_date);?></td>
                        <td><?php echo $handover;?></td>
                        
                      </tr>
                      <?php ($i++); ?>
                      <?php endforeach; ?>

                    </tbody>
                  </table>
                                    <?php endif; ?>
              </div>

<div class="tab-pane <?php echo e($datas['tab'] == 'calendar' ? 'active' : ''); ?>" id="calendar">
  <style type="text/css">
  .fc-day-header{
  color: #000000;
  }
  
  </style>
  <link rel="stylesheet" href="<?php echo e(asset('/assets/plugins/fullcalendar/dist/fullcalendar.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('/assets/plugins/fullcalendar/dist/fullcalendar.print.min.css')); ?>" media="print">
  <div class="row">
    
    
    
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body no-padding">
          <!-- THE CALENDAR -->
          <div id="calendar"></div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /. box -->
    </div>
    <!-- /.col -->
    </div><!-- /.box-body -->
    
    
  </div>
              
                <div class="tab-pane <?php echo e($datas['tab'] == 'performance' ? 'active' : ''); ?>" id="performance">
            
            <div class="row task-header"><button class="btn btn-primary right" onclick="addPerformance()">Add Comment</strong>  </div>
            <?php if(count($datas['performance']) > 0): ?>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>S.N.</th>
                  <th>Review By</th>
                  <th>Comment</th>
                  <th>Rating</th>
                  <th>Review Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php ($i = 1); ?>
                <?php foreach($datas['performance'] as $performance): ?>
                
                <tr>
                  <td><?php echo e($i); ?></td>
                  <td><?php echo \App\Adjustment_staff::getName($performance->comment_by);?></td>
                  <td><?php echo $performance->comment;?></td>
                  <td><?php echo $performance->comment_rating;?></td>
                  <td><?php echo $performance->created_at;?></td>
                  <td>
                    <?php if($performance->comment_by == auth()->guard('staffs')->user()->id): ?>
                    <button class="btn btn-primary" onclick="editPerformance('<?php echo e($performance->id); ?>','<?php echo e(addslashes($performance->comment)); ?>','<?php echo e($performance->comment_rating); ?>')" ><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger" onclick="deletePerformance('<?php echo e($performance->id); ?>')" ><i class="fa fa-remove"></i></button>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php ($i++); ?>
                <?php endforeach; ?>
              </tbody>
            </table>
            
            
            <?php endif; ?>
            
          </div>
              
             
            </div>
            <!-- /.tab-content -->
          </div>
                  

          </div><!-- /.box-body -->
      </div>
    </div>
  <div>

  <div>
  </div>
  
  <div class="modal fade " id="modal-performance">
      <div class="modal-dialog" style="width: 900px;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Jobs</h4>
          </div>
          <form id="performance-form" method="POST" action="<?php echo e(url('/supervisor/performance/save')); ?>" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="staff_id" id="performance_staff_id" value="<?php echo e($datas['staff_id']); ?>">
            <input type="hidden" name="performance_id" id="performance_id" value="">
            <?php echo csrf_field(); ?>

            
            <div class="modal-body">
              <div class="form-group">
                <label class="col-md-12">Comment</label>
                <div class="col-md-12"><textarea class="form-control" name="comment" id="performance_comment" required="required"></textarea></div>
              </div>
              
              <div class="form-group">
                <label class="col-md-12">Comment Rating</label>
                <div class="col-md-12"><input type="text" class="form-control" id="performance_rating" name="comment_rating" required="reqired"></div>
              </div>
            </div>
            <div class="modal-footer">
              
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  <div class="modal fade " id="modal-jobs">
          <div class="modal-dialog" style="width:900px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Jobs</h4>
              </div>
              <div class="modal-body">
                <div id="job-box" class="box-body" style="">
                  <!-- Conversations are loaded here -->
                
                 
                </div>
                
                
              
              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        
        
        
        <div class="modal fade " id="modal-jobs-edit">
          <div class="modal-dialog" style="width: 900px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Jobs</h4>
              </div>
              <form id="job-edit-form" method="POST" action="<?php echo e(url('/supervisor/tasks/updateJob')); ?>" class="form-horizontal" enctype="multipart/form-data">
                  <input type="hidden" id="job-edit-id" name="job_id" value="">
                
              <div class="modal-body">
                <div class="box-body" style="">
                  
                <textarea  id="edit-job-title" class="form-control" name="title"></textarea>
                 
                </div>
                
                
              
              </div>
             <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
</form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<script type="text/javascript">

  function showJobs(id) {

    var token = $('input[name=\'_token\']').val();
    $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/supervisor/task/jobs")); ?>',
            data: '_token='+token+'&id='+id,
            cache: false,
            success: function(html){
              $('#job-box').html(html);
              $('#modal-jobs').modal('show');
               
            }
      });
   
  }
  
  
  function deleteJob(id) {
      if(confirm('Do You Want Delete This Job?')){
      var url= "<?php echo e(url('/supervisor/tasks/deletejob/')); ?>/"+id;
      location = url;
      
      }
    }
    
     function editJob(id) {
      if(confirm('Are you sure you want to edit this job?')){
          var token = $('input[name=\'_token\']').val();
        $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/supervisor/task/getJob")); ?>',
            data: 'id='+id+'&_token='+token,
            cache: false,
            success: function(html){
              var datas = html.split('|');
              if (datas[0] == 'Success') {
                  $('#job-edit-id').val(id);
                $('#edit-job-title').val(datas[1]);
                $('#modal-jobs').modal('hide');
                 $('#modal-jobs-edit').modal('show');
              } else{
                alert(datas[1])
              }
                
               
            }
      });
      
     
      
      }
    }
</script>
  <div class="modal fade" id="modal-helpcomplete">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="complete-title">Complete Help Desk</h4>
              </div>
              <form id="job-form" method="POST" action="<?php echo e(url('/supervisor/help_desk/complete')); ?>" class="form-horizontal" enctype="multipart/form-data">
              <div class="modal-body">
                
                  <?php echo csrf_field(); ?>

               <input type="hidden" name="help_id" id="help_id" value="">
               
               <div class="form-group">
                <label class="control-label col-md-4 ">Your Rating (Out of 10)</label>         
                <div class="col-md-6">
                  <input class="form-control" name="self_mark" required="required" placeholder="10" value="" type="text">
                                          
                 </div>
                                        
              </div>


              <div class="form-group">
                       
                <div class="col-md-12">
                  <textarea class="form-control" name="remarks" required="required" placeholder="Remarks"></textarea>
                                          
                 </div>
                                        
              </div>

                              
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

  <div class="modal fade" id="modal-approve">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="approve-title">Approve Task</h4>
              </div>
              <form id="job-form" method="POST" action="<?php echo e(url('/supervisor/task/approve')); ?>" class="form-horizontal" enctype="multipart/form-data">
              <div class="modal-body">
                
                  <?php echo csrf_field(); ?>

               <input type="hidden" name="task_id" id="task_id" value="">
               <div class="form-group" ><div id="app-status" class="col-md-12"></div></div>
               <div class="form-group">
                  <label class="control-label col-md-4 ">Self Rating (Out of 10)</label>                    
                <div class="col-md-6">
                  <input class="form-control" readonly="readonly" placeholder="Job title" id="self_mark" value="" type="text">
                                          
                 </div>
                                        
              </div>
               <div class="form-group">
                <label class="control-label col-md-4 ">Your Rating (Out of 10)</label>         
                <div class="col-md-6">
                  <input class="form-control" name="supervisor_mark" required="required" placeholder="10" value="" type="text">
                                          
                 </div>
                                        
              </div>


              <div class="form-group">
                       
                <div class="col-md-12">
                  <textarea class="form-control" name="supervisor_remarks" required="required" placeholder="Remarks"></textarea>
                                          
                 </div>
                                        
              </div>

                              
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Jobs</h4>
              </div>
              <form id="job-form" method="POST" action="<?php echo e(url('/supervisor/task/saveJob')); ?>" class="form-horizontal" enctype="multipart/form-data">
              <div id="modal_default_body" class="modal-body">
                <input type="hidden" name="staff_id" id="staff_id" value="">
                  <?php echo csrf_field(); ?>

               <input type="hidden" name="task_id" id="task_id" value="">
               <div class="form-group">
                                      
                <div class="col-md-12">
                  <input class="form-control" name="job_title" required="required" placeholder="Job title" value="" type="text">
                                          
                 </div>
                                        
              </div>
               <div class="form-group">
                                      
                <div class="col-md-12">
                  <input class="form-control date" name="finish_time" required="required" placeholder="Deadline" value="" type="text">
                                          
                 </div>
                                        
              </div>

               <div class="form-group">
                                      
                <div class="col-md-12">
                  <textarea class="form-control" name="description" placeholder="Description"></textarea>
                                          
                 </div>
                                        
              </div>
               <div class="form-group">
                                      
                <div class="col-md-12">
                  <select class="form-control" id="priority" name="priority">
                          <?php foreach($datas['priorities'] as $prt): ?>
                           
                            <option value="<?php echo e($prt['value']); ?>"><?php echo e($prt['title']); ?></option>
                           
                          <?php endforeach; ?>
                        </select>
                                          
                 </div>
                                        
              </div>
                 
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

 <div class="modal fade direct-chat direct-chat-warning" id="modal-message">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Messages</h4>
              </div>
              <div class="modal-body">
                <div class="box-body" style="">
                  <!-- Conversations are loaded here -->
                  <div id="message-box" class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                  
                   
                    <!-- /.direct-chat-msg -->


                  </div>
                  <!--/.direct-chat-messages-->

                  <!-- Contacts are loaded here -->
                  
                  <!-- /.direct-chat-pane -->
                </div>
                
                
                <div class="box-footer" style="">
                  
                    <div class="input-group">
                      <input type="hidden" id="message-task-id" value="">

                      <textarea class="form-control" id="text-message" placeholder="Type Message ....."></textarea>
                      <span class="input-group-btn">
                            <button type="button" id="button-upload"  class="btn btn-success btn-flat"><i class="fa fa-paperclip"></i></button>
                          </span>
                      <span class="input-group-btn">
                            <button type="button" onClick="sendMessage()" class="btn btn-warning btn-flat">Send</button>
                          </span>
                    </div>
                  
                </div>
              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


<div class="modal fade" id="modal-add-skill">
          <div class="modal-dialog skill_add">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="approve-title">Add Skills</h4>
              </div>
              <form id="skill_form" method="POST" action="<?php echo e(url('/supervisor/skill/add')); ?>" class="form-horizontal" enctype="multipart/form-data">
              <div class="modal-body">
                
                  <?php echo csrf_field(); ?>

               <input type="hidden" name="staff_id" id="staff_id" value="<?php echo e($datas['staff_id']); ?>">
               <div class="row mb20">
                 <label class="control-label col-md-5 text-center">Title</label>
                 <label class="control-label col-md-2 text-center">Score</label>
                 <label class="control-label col-md-2 text-center">Weightage</label>
                 <label class="control-label col-md-2 text-center">Potential</label>
                 <label class="control-label col-md-1 text-center"></label>
               </div>
               <div id="ad_skills">
                <div class="row mb20" id="row-0">
                  <div class="col-md-5"><input class="form-control" name="skill[0][title]" type="text" placeholder="Skill title" required="required"></div>
                  <div class="col-md-2"><input class="form-control" name="skill[0][score]" type="text" placeholder="100" required="required"></div>
                 
                  <div class="col-md-2"><input class="form-control" name="skill[0][weightage]" type="text" placeholder="100" required="required"></div>
                
                 <div class="col-md-2"><input class="form-control" name="skill[0][potential]" type="text" placeholder="100" required="required"></div>
                 
                 <div class="col-md-1"><button class="btn btn-danger" onclick="$('#row-0').remove();" data-toggle="tooltip" title="remove"><i class="fa fa-minus-circle"></i></button> </div>
             

                </div>         
               </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" onclick="addSkill()">Add New Skill</button>
                <button type="submit" class="btn btn-primary">Save Skills</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  <div class="modal fade" id="modal-add-kra">
          <div class="modal-dialog kra_add">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="approve-title">Add KRA</h4>
              </div>
              <form id="kra_form" method="POST" action="<?php echo e(url('/supervisor/kra/add')); ?>" class="form-horizontal" enctype="multipart/form-data">
              <div class="modal-body">
                
                  <?php echo csrf_field(); ?>

               <input type="hidden" name="staff_id" id="staff_id" value="<?php echo e($datas['staff_id']); ?>">
               <div class="row mb20">
                 <label class="control-label col-md-8 text-center">Title</label>
                 
                 <label class="control-label col-md-2 text-center">Weightage</label>
                
                 <label class="control-label col-md-2 text-center"></label>
               </div>
               <div id="ad_kras">
                <div class="row mb20" id="kra_row-0">
                  <div class="col-md-8"><input class="form-control" name="kra[0][title]" type="text" placeholder="kra title" required="required"></div>
                  
                 
                  <div class="col-md-2"><input class="form-control" name="kra[0][weightage]" type="text" placeholder="100" required="required"></div>
                
                
                 
                 <div class="col-md-2"><button class="btn btn-danger" onclick="$('#kra_row_0').remove();" data-toggle="tooltip" title="remove"><i class="fa fa-minus-circle"></i></button> </div>
             

                </div>         
               </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" onclick="addkra()">Add New KRA</button>
                <button type="submit" class="btn btn-primary">Save KRA</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-add-kpi">
          <div class="modal-dialog kpi_add">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="approve-title">Add KPI</h4>
              </div>
              <form id="kpi_form" method="POST" action="<?php echo e(url('/supervisor/kpi/add')); ?>" class="form-horizontal" enctype="multipart/form-data">
              <div class="modal-body">
                
                  <?php echo csrf_field(); ?>

               <input type="hidden" name="staff_id" id="staff_id" value="<?php echo e($datas['staff_id']); ?>">
               <div class="row mb20">
                 <label class="control-label col-md-9 text-center">Title</label>                
                 <label class="control-label col-md-2 text-center"></label>
               </div>
               <div id="ad_kpis">
                <div class="row mb20" id="kpi_row-0">
                  <div class="col-md-10"><input class="form-control" name="kpi[0][title]" type="text" placeholder="kpi title" required="required"></div>
                  
                 <div class="col-md-2"><button class="btn btn-danger" onclick="$('#kpi_row_0').remove();" data-toggle="tooltip" title="remove"><i class="fa fa-minus-circle"></i></button> </div>
             

                </div>         
               </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" onclick="addkpi()">Add New KPI</button>
                <button type="submit" class="btn btn-primary">Save KPI</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<script type="text/javascript">
  function viewModal(div,task_id,staff_id,type)
  {
    $('#'+div+' #staff_id').val(staff_id);
    $('#'+div+' #task_id').val(task_id);
    $('#modal_default_body #default_file').remove();
    if (type > 0) {
      $('#modal_default_body #priority').fadeOut();
      html = '<div id="default_file" class="form-group"><div class="col-md-12"><input class="form-control" name="file" placeholder="Upload Document" value="" type="file"></div></div>';
      $('#modal_default_body').append(html);
    } else{
      $('#modal_default_body #priority').fadeIn();
    }
    
     $('.date').datepicker({
      autoclose: true
    })
  }

   function viewChatModal(div,task_id)
    {
     
     var token = $('input[name=\'_token\']').val();
    $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/supervisor/task/getmessage")); ?>',
            data: '_token='+token+'&id='+task_id,
            cache: false,
            success: function(html){
              var datas = html.split('|');
              if (datas[0] == 'Success') {
                $('#message-box').html(datas[1]);
                $('#text-message').val('');
                var div = document.getElementById('message-box');
                div.scrollTop = div.scrollHeight - div.clientHeight;
              } else{
                alert(datas[1])
              }
                
               
            }
      });
    $('#'+div+' #message-task-id').val(task_id);
    var div = document.getElementById('message-box');
    $('#modal-message').modal('show');
   div.scrollTop = div.scrollHeight - div.clientHeight;
    
    
  }

  function approve(div,id,self_mark,task_title,h_date) {
    $('#'+div+' #task_id').val(id);
    $('#'+div+' #self_mark').val(self_mark);
    $('#'+div+' #approve-title').html('Approve Task ('+task_title+')')
    var date2 = new Date(h_date);
    var date1 = new Date();
    var timeDiff = Math.abs(date2.getTime() - date1.getTime());
    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
    
    if(date1 > date2){
        var message = '<span class="label label-danger">'+diffDays+' Days crossed the Deadline</span>';
    }else{
        var message = '<span class="label label-success">Finished Task in '+diffDays+' Days Earlier</span>';
    }
    $('#app-status').html(message);

  }

  function sendMessage() {
    var message = $('#text-message').val();
     var token = $('input[name=\'_token\']').val();
     var id = $('#message-task-id').val();
    if (message != '') {
      $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/supervisor/task/message")); ?>',
            data: 'message='+message+'&_token='+token+'&id='+id,
            cache: false,
            success: function(html){
              var datas = html.split('|');
              if (datas[0] == 'Success') {
                $('#message-box').append(datas[1]);
                $('#text-message').val('');
                var div = document.getElementById('message-box');
                div.scrollTop = div.scrollHeight - div.clientHeight;
              } else{
                alert(datas[1])
              }
                
               
            }
      });
    }else{
      $('#text-message').focus();
    }
  }
</script>


<script type="text/javascript">
  
     function confirmDelete(ids){
    if(confirm('Do You Want To Delete This Task?')){
      var url= "<?php echo e(url('/supervisor/task/delete/')); ?>/"+ids;
      location = url;
      
      }
    }
var skill_add_row = 1;
function addSkill() {
  var html = '<div class="row mb20" id="row-'+skill_add_row+'"><div class="col-md-5"><input class="form-control" name="skill['+skill_add_row+'][title]" type="text" placeholder="Skill title" required="required"></div>';
      html += '<div class="col-md-2"><input class="form-control" name="skill['+skill_add_row+'][score]" type="text" placeholder="100" required="required"></div>';
                 
      html += '<div class="col-md-2"><input class="form-control" name="skill['+skill_add_row+'][weightage]" type="text" placeholder="100" required="required"></div>';
                
      html += '<div class="col-md-2"><input class="form-control" name="skill['+skill_add_row+'][potential]" type="text" placeholder="100" required="required"></div>';
                 
      html += '<div class="col-md-1"><button class="btn btn-danger" onclick="$(\'#row-'+skill_add_row+'\').remove();" data-toggle="tooltip" title="remove"><i class="fa fa-minus-circle"></i></button> </div></div>';

      $('#ad_skills').append(html);
      skill_add_row++;
}

function deleteSkill(id) {
  if(confirm('Do You Want To Delete This Skill?')){
  var token = $('input[name=\'_token\']').val();

  if (id != '') {
     $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/supervisor/skill/delete")); ?>',
            data: 'id='+id+'&_token='+token,
            cache: false,
            success: function(html){
              var datas = html.split('|');
              if (datas[0] == 'Success') {
                alert(datas[1]);
                $('#skill_row_'+id).remove();
              } else{
                alert(datas[1]);
              }
                
               
            }
      });
  } 
}
}


var kra_row = 1;
function addkra() {
  var html = '<div class="row mb20" id="kra_row_'+kra_row+'"><div class="col-md-8"><input class="form-control" name="kra['+kra_row+'][title]" type="text" placeholder="kra title" required="required"></div>';
     
                 
      html += '<div class="col-md-2"><input class="form-control" name="kra['+kra_row+'][weightage]" type="text" placeholder="100" required="required"></div>';
                
     
                 
      html += '<div class="col-md-2"><button class="btn btn-danger" onclick="$(\'#kra_row_'+kra_row+'\').remove();" data-toggle="tooltip" title="remove"><i class="fa fa-minus-circle"></i></button> </div></div>';

      $('#ad_kras').append(html);
      kra_row++;
}


function deletekra(id) {
  if(confirm('Do You Want To Delete This KRA?')){
  var token = $('input[name=\'_token\']').val();

  if (id != '') {
     $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/supervisor/kra/delete")); ?>',
            data: 'id='+id+'&_token='+token,
            cache: false,
            success: function(html){
              var datas = html.split('|');
              if (datas[0] == 'Success') {
                alert(datas[1]);
                $('#kra_row_'+id).remove();
              } else{
                alert(datas[1]);
              }
                
               
            }
      });
  } 
}
}


var kpi_row = 1;
function addkpi() {
  var html = '<div class="row mb20" id="kpi_row_'+kpi_row+'"><div class="col-md-10"><input class="form-control" name="kpi['+kpi_row+'][title]" type="text" placeholder="kpi title" required="required"></div>';          
     
                 
      html += '<div class="col-md-2"><button class="btn btn-danger" onclick="$(\'#kpi_row_'+kpi_row+'\').remove();" data-toggle="tooltip" title="remove"><i class="fa fa-minus-circle"></i></button> </div></div>';

      $('#ad_kpis').append(html);
      kpi_row++;
}


function delKpi(id) {
  if(confirm('Do You Want To Delete This kpi?')){
  var token = $('input[name=\'_token\']').val();

  if (id != '') {
     $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/supervisor/kpi/delete")); ?>',
            data: 'id='+id+'&_token='+token,
            cache: false,
            success: function(html){
              var datas = html.split('|');
              if (datas[0] == 'Success') {
                alert(datas[1]);
                $('#kpi_row_'+id).remove();
              } else{
                alert(datas[1]);
              }
                
               
            }
      });
  } 
}
}
</script>
<script type="text/javascript">
  $('#button-upload').on('click', function() {
  $('#form-upload').remove();
  var task_id = $('#message-task-id').val();
  $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" id="file" name="file" multiple value="" /><input type="text" name="_token" value="<?php echo e(csrf_token()); ?>" /><input type="text" name="task_id" value="'+task_id+'" /></form>');

  $('#form-upload #file').trigger('click');

  if (typeof timer != 'undefined') {
      clearInterval(timer);
  }

  timer = setInterval(function() {
    if ($('#form-upload #file').val() != '') {
      clearInterval(timer);

      $.ajax({
        url: '<?php echo e(url("/supervisor/task/uploadchat/")); ?>',
        type: 'post',
        
        data: new FormData($('#form-upload')[0]),
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('#button-upload i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
          $('#button-upload').prop('disabled', true);
        },
        complete: function() {
          $('#button-upload i').replaceWith('<i class="fa fa-paperclip"></i>');
          $('#button-upload').prop('disabled', false);
        },
        success: function(html) {
          var datas = html.split('|');
              if (datas[0] == 'Success') {
                $('#message-box').append(datas[1]);
                $('#text-message').val('');
                var div = document.getElementById('message-box');
                div.scrollTop = div.scrollHeight - div.clientHeight;
              } else{
                alert(datas[1])
              }
                
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    } 
  }, 500);
});
</script>


<script type="text/javascript">
  function acceptHelp(id) {
      if(confirm('Do You Want Accept This Task?')){
      var url= "<?php echo e(url('/supervisor/help_desk/accept/')); ?>/"+id;
      location = url;
      
      }
    }
</script>

<script type="text/javascript">
  function helpChatModal(div,help_id)
    {
     
     var token = $('input[name=\'_token\']').val();
    $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/supervisor/help_desk/getmessage")); ?>',
            data: '_token='+token+'&id='+help_id,
            cache: false,
            success: function(html){
              var datas = html.split('|');
              if (datas[0] == 'Success') {
                $('#helpmessage-box').html(datas[1]);
                $('#text-helpmessage').val('');
                var boxdiv = document.getElementById('helpmessage-box');
                boxdiv.scrollTop = boxdiv.scrollHeight - boxdiv.clientHeight;
              } else{
                alert(datas[1])
              }
                
               
            }
      });
    $('#'+div+' #message-help-id').val(help_id);
    var boxdiv = document.getElementById('helpmessage-box');
   boxdiv.scrollTop = boxdiv.scrollHeight - boxdiv.clientHeight;
    
    
  }
</script>



  
<script type="text/javascript">
  function sendHelpMessage() {
    var message = $('#text-helpmessage').val();
     var token = $('input[name=\'_token\']').val();
     var id = $('#message-help-id').val();
    if (message != '') {
      $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/supervisor/help_desk/message")); ?>',
            data: 'message='+message+'&_token='+token+'&id='+id,
            cache: false,
            success: function(html){
              var datas = html.split('|');
              if (datas[0] == 'Success') {
                $('#helpmessage-box').append(datas[1]);
                $('#text-helpmessage').val('');
                var div = document.getElementById('helpmessage-box');
                div.scrollTop = div.scrollHeight - div.clientHeight;
              } else{
                alert(datas[1])
              }
                
               
            }
      });
    }else{
      $('#text-helpmessage').focus();
    }
  }
</script>

<div class="modal fade direct-chat direct-chat-warning" id="modal-helpmessage">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Messages</h4>
              </div>
              <div class="modal-body">
                <div class="box-body" style="">
                  <!-- Conversations are loaded here -->
                  <div id="helpmessage-box" class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                  
                   
                    <!-- /.direct-chat-msg -->


                  </div>
                  <!--/.direct-chat-messages-->

                  <!-- Contacts are loaded here -->
                  
                  <!-- /.direct-chat-pane -->
                </div>
                
                
                <div class="box-footer" style="">
                  
                    <div class="input-group">
                      <input type="hidden" id="message-help-id" value="">

                      <input type="text" id="text-helpmessage" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                            <button type="button" id="helpbutton-upload"  class="btn btn-success btn-flat"><i class="fa fa-paperclip"></i></button>
                          </span>
                      <span class="input-group-btn">
                            <button type="button" onClick="sendHelpMessage()" class="btn btn-warning btn-flat">Send</button>
                          </span>
                    </div>
                  
                </div>
              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<script type="text/javascript">
  $('#helpbutton-upload').on('click', function() {
  $('#form-upload').remove();
  var task_id = $('#message-help-id').val();
  $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" id="file" name="file" multiple value="" /><input type="text" name="_token" value="<?php echo e(csrf_token()); ?>" /><input type="text" name="task_id" value="'+task_id+'" /></form>');

  $('#form-upload #file').trigger('click');

  if (typeof timer != 'undefined') {
      clearInterval(timer);
  }

  timer = setInterval(function() {
    if ($('#form-upload #file').val() != '') {
      clearInterval(timer);

      $.ajax({
        url: '<?php echo e(url("/supervisor/help_desk/uploadchat/")); ?>',
        type: 'post',
        
        data: new FormData($('#form-upload')[0]),
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('#helpbutton-upload i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
          $('#helpbutton-upload').prop('disabled', true);
        },
        complete: function() {
          $('#helpbutton-upload i').replaceWith('<i class="fa fa-paperclip"></i>');
          $('#helpbutton-upload').prop('disabled', false);
        },
        success: function(html) {
          var datas = html.split('|');
              if (datas[0] == 'Success') {
                $('#helpmessage-box').append(datas[1]);
                $('#text-helpmessage').val('');
                var div = document.getElementById('helpmessage-box');
                div.scrollTop = div.scrollHeight - div.clientHeight;
              } else{
                alert(datas[1])
              }
                
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    } 
  }, 500);
});
</script>

<script type="text/javascript">
  function helpComplete(div,id,task_title) {
    
    $('#'+div+' #help_id').val(id);
    
    $('#'+div+' #complete-title').html('Complete Help Desk ('+task_title+')')


  }
</script>


<div class="modal fade" id="modal-add-kpa">
          <div class="modal-dialog kpa_add">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="approve-title">Add KPA</h4>
              </div>
              <form id="kpa_form" method="POST" action="<?php echo e(url('/supervisor/kpa/save')); ?>" class="form-horizontal" enctype="multipart/form-data">
              <div class="modal-body">
                
                  <?php echo csrf_field(); ?>

               <input type="hidden" name="staff_id" id="staff_id" value="<?php echo e($datas['staff_id']); ?>">
               <input type="hidden" name="kra_id" id="kra_id" value="">
               <div class="row mb20">
                 <label class="control-label col-md-10">Title</label>
                 
                 
                
                 <label class="control-label col-md-2 text-center"></label>
               </div>
               <div id="ad_kpas">
                <div class="row mb20" id="kpa_row_0">
                  <div class="col-md-10"><input class="form-control" name="kpa[0][title]" type="text" placeholder="kpa title" required="required"></div>
                  
                 
                 
                
                
                 
                 <div class="col-md-2"><button class="btn btn-danger" onclick="$('#kpa_row_0').remove();" data-toggle="tooltip" title="remove"><i class="fa fa-minus-circle"></i></button> </div>
             

                </div>         
               </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" onclick="addMoreKpa()">Add New KPA</button>
                <button type="submit" class="btn btn-primary">Save kpa</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<script type="text/javascript">
  function addKpa(id) {
    $('#kra_id').val(id);
    $('#modal-add-kpa').modal('show');
  }

  var row_id = 1;
  function addMoreKpa() {

    var html = '<div class="row mb20" id="kpa_row_'+row_id+'"><div class="col-md-10"><input class="form-control" name="kpa['+row_id+'][title]" type="text" placeholder="kpa title" required="required"></div>';
        html += '<div class="col-md-2"><button class="btn btn-danger" onclick="$(\'#kpa_row_'+row_id+'\').remove();" data-toggle="tooltip" title="remove"><i class="fa fa-minus-circle"></i></button> </div></div>';

    $('#ad_kpas').append(html);
    row_id++;
  }

  function deleteKpa(id) {
    if(confirm('Do You Want To Delete This KPA?')){
  var token = $('input[name=\'_token\']').val();

  if (id != '') {
     $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/supervisor/kpa/delete")); ?>',
            data: 'id='+id+'&_token='+token,
            cache: false,
            success: function(html){
              var datas = html.split('|');
              if (datas[0] == 'Success') {
                alert(datas[1]);
                $('#kpa-row-'+id).remove();
              } else{
                alert(datas[1]);
              }
                
               
            }
      });
  } 
}
  }
</script>


<div class="modal fade" id="modal-edit-kpa">
          <div class="modal-dialog kpa_add">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="edit-kpa-title">Edit KPA</h4>
              </div>
              <form id="kpa_edit_form" method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
              <div class="modal-body">
                
                  <?php echo csrf_field(); ?>

              
               <input type="hidden" name="kpa_id" id="edit_kpa_id" value="">
               <div class="form-group">
                 <label class="control-label col-md-3">Title</label>
                      <div class="col-md-9"><input class="form-control" id="kpa-edit-title" name="title" type="text" placeholder="kpa title" value="" required="required"></div>            
               </div>
              
              </div>
              <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">Save kpa</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<script type="text/javascript">
  function editKra(id) {
    $('#edit_kpa_id').val(id);
    var title = $('#kra-title-'+id).val();
    
    $('#kpa-edit-title').val(title);
    $('#edit-kpa-title').html('Edit KRA');
    $('#kpa_edit_form').attr('action', '<?php echo e(url("/supervisor/kra/update")); ?>');
    $('#modal-edit-kpa').modal('show');
  }

   function editKPa(id) {
    $('#edit_kpa_id').val(id);
    var title = $('#kpa-title-'+id).val();
    $('#kpa-edit-title').val(title);
    $('#edit-kpa-title').html('Edit KPA');
    $('#kpa_edit_form').attr('action', '<?php echo e(url("/supervisor/kpa/update")); ?>');
    $('#modal-edit-kpa').modal('show');
  }
</script>
 <script type="text/javascript">
    function addPerformance()
    {
    var url = '<?php echo e(url("/supervisor/performance/save")); ?>';
    $('#performance-form').attr('action', url);
    $('#modal-performance').modal('show');
    }
    function editPerformance(id,comment,rating)
    {
    var url = '<?php echo e(url("/supervisor/performance/update")); ?>';
    $('#performance-form').attr('action', url);
    $('#performance_id').val(id);
    $('#performance_comment').val(comment);
    $('#performance_rating').val(rating);
    $('#modal-performance').modal('show');
    }
    function deletePerformance(id) {
    if(confirm('Do You Want Delete This Comment?')){
    var staff_id = '<?php echo e($datas["staff_id"]); ?>';
    var url= "<?php echo e(url('/supervisor/performance/delete/')); ?>/"+id;
    location = url;
    
    }
    }
    </script>

    <script src="<?php echo e(asset('/assets/plugins/moment/moment.js')); ?>"></script>
  <script src="<?php echo e(asset('/assets/plugins/fullcalendar/dist/fullcalendar.min.js')); ?>"></script>
  
 <script type="text/javascript">
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
        
      
        <?php if(count($datas['daily_routine']) > 0): ?>
        <?php foreach($datas['daily_routine'] as $daily_routine): ?>
        {
          title          : '<?php echo e(htmlentities($daily_routine["title"], ENT_QUOTES | ENT_IGNORE, "UTF-8")); ?>',
          start          : new Date('<?php echo e($daily_routine["year"]); ?>', '<?php echo e($daily_routine["month"]); ?>', '<?php echo e($daily_routine["day"]); ?>','<?php echo e($daily_routine["start_hour"]); ?>','<?php echo e($daily_routine["start_minute"]); ?>'),
          end            : new Date('<?php echo e($daily_routine["year"]); ?>', '<?php echo e($daily_routine["month"]); ?>', '<?php echo e($daily_routine["day"]); ?>','<?php echo e($daily_routine["finish_hour"]); ?>','<?php echo e($daily_routine["finish_minute"]); ?>'),
          allDay         : false,
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954' //red
        },
        <?php endforeach; ?>
        <?php endif; ?>
       
        <?php foreach($datas['holiday'] as $holiday): ?>
        {
          title          : '<?php echo e(addslashes(htmlspecialchars($holiday->title))); ?>',
          start          : '<?php echo e($holiday->holiday); ?>',
          end            : '<?php echo e($holiday->holiday); ?>',
          allDay         : true,
          backgroundColor: '#00a65a', //Info (aqua)
          borderColor    : '#00a65a' //Info (aqua)
        },
        <?php endforeach; ?>
       
      ],
      
    })

     
   
  })
</script>


<!-- productivity  -->
<script>
  $('select#filter_productivity_month').change(function(){
    var filter_productivity_month = $(this).children("option:selected").val();
    var filter_productivity_year = $('#filter_productivity_year').val();
    var staff_id = '<?php echo e($datas["staff_id"]); ?>'
    var url = '<?php echo e(url("/supervisor/report?staff=")); ?>'+staff_id+'&tab=productivity&filter_productivity_month='+filter_productivity_month+'&filter_productivity_year='+filter_productivity_year;
    location = url;
  });
  $('#filter_productivity_year').blur(function(){
    var filter_productivity_year = $('#filter_productivity_year').val();
    var filter_productivity_month = $('#filter_productivity_month').val();
    var staff_id = '<?php echo e($datas["staff_id"]); ?>'
    var url = '<?php echo e(url("/supervisor/report/?staff=")); ?>'+staff_id+'&tab=productivity&filter_productivity_month='+filter_productivity_month+'&filter_productivity_year='+filter_productivity_year;
    location = url;
  })
  $('#exportProductivityBtn').click(function(){
    var filter_productivity_year = $('#filter_productivity_year').val();
    var filter_productivity_month = $('#filter_productivity_month').val();
    var staff_id = '<?php echo e($datas["staff_id"]); ?>'
    var url = '<?php echo e(url("/supervisor/report/export")); ?>'+'/'+staff_id+'?tab=productivity&filter_productivity_month='+filter_productivity_month+'&filter_productivity_year='+filter_productivity_year;
    location = url;
  })

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
  var data = ['<?php echo e($productivityChart["duration"]); ?>', '<?php echo e($productivityChart["total"]); ?>', '<?php echo e($productivityChart["idle"]); ?>'];
  new Chart(document.getElementById("productivityChart"), {
    type: 'doughnut',
    data: {
      labels: ['Staff Duration', 'supervisor Duration', 'Idle Duration'],
      datasets: [
        {
          label: "Productivity Chart",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
          data: data
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Daily task duration analysis in hour'
      }
    }
  });
</script>

<!-- contract  -->
<div class="modal fade" id="modal-contract">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="Contract-title">Contract Detail</h4>
      </div>
        <div class="modal-body" id="contract-body">
          <form action="<?php echo e(url('/supervisor/otstaff/contract/'.$datas['staff_id'])); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-md-2">From</label>
                <div class="col-md-10">
                  <input type="text" id="contractDatepicker1" class="form-control" name="from" placeholder="contrct from" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2">To</label>
                <div class="col-md-10">
                  <input type="text" id="contractDatepicker2" class="form-control" name="to" placeholder="contrct from" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2">Document</label>
                <div class="col-md-10">
                  <input type="file" class="form-control" name="document" placeholder="contrct document" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2"></label>
                <div class="col-md-10">
                  <input type="submit" class="btn btn-primary" value="SUBMIT" id="contractSubmit">
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-contract-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="Contract-title">Contract Detail</h4>
      </div>
        <div class="modal-body" id="contract-body">
          <form action="<?php echo e(url('/supervisor/otstaff/contract/'.$datas['staff_id'].'/update')); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>

          <?php echo method_field('PUT'); ?>

          <input type="hidden" id="contract_id" class="form-control" name="contract_id"  required>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-md-2">From</label>
                <div class="col-md-10">
                  <input type="text" id="contractDatepicker3" class="form-control" name="from" placeholder="contrct from" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2">To</label>
                <div class="col-md-10">
                  <input type="text" id="contractDatepicker4" class="form-control" name="to" placeholder="contrct from" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2">Document</label>
                <div class="col-md-10">
                  <input type="file" id="documentUpdate" class="form-control" name="document" placeholder="contrct document">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2"></label>
                <div class="col-md-10">
                  <input type="submit" class="btn btn-primary" value="SUBMIT" id="contractSubmit">
                </div>
              </div>
            </div>
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
$('#contractDatepicker1').datepicker({
  autoclose: true,
  format: 'yyyy-m-d',
})
$('#contractDatepicker2').datepicker({
  autoclose: true,
  format: 'yyyy-m-d',
})
$('#contractDatepicker3').datepicker({
  autoclose: true,
  format: 'yyyy-m-d',
})
$('#contractDatepicker4').datepicker({
  autoclose: true,
  format: 'yyyy-m-d',
})
function addContractForm(staff_id)
{
  $('#modal-contract').modal('show');
}
function updateContract(contract)
{
  $('#contractDatepicker3').val(contract.from)
  $('#contractDatepicker4').val(contract.to)
  $('#contract_id').val(contract.id)
  $('#modal-contract-update').modal('show');
  console.log(contract)
}
</script>

<!-- bar diagram  -->
<script>
    
    var kra = <?php echo json_encode($datas['kra']); ?>;
    var hour = <?php echo json_encode($datas['kra_data']); ?>;

    var barChartData = {
        labels: kra,
        datasets: [{
          
          maxBarThickness: 21,
            label: 'Hours Worked',
            backgroundColor: "rgba(220,220,220,0.5)",
            data: hour
        }]
    };
    window.onload = function() {
        var ctx = document.getElementById("productivityBarChart").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'horizontalBar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 1,
                        borderColor: 'rgb(0, 153, 76)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Jobs Versus Hours of everyday tasks'
                }
            }
        });
    };
</script>


<?php /* button in report and their function */ ?>
<div class="modal fade" id="modal-terminate-staff">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="Contract-title">Terminate Staff</h4>
      </div>
        <div class="modal-body" id="contract-body">
          <div class="row form-horizontal">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-md-2">Staff</label>
                <div class="col-md-10">
                  <input type="hidden" id="termination_staff_id" class="form-control" name="from" autocomplete="off" value="<?php echo e($datas['staff_id']); ?>">
                  <input type="text" id="termination_staff_name" class="form-control" name="from" autocomplete="off" value="<?php echo e($datas['staff_name']); ?>" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2">Termination Detail</label>
                <div class="col-md-10">
                  <textarea name="termination_detail" id="termination_detail" class="form-control"></textarea>
                <div class="text-danger" id="detail_error"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2">End Date</label>
                <div class="col-md-10">
                  <input type="text" id="termination_end_date" class="form-control termination_datepicker" name="termination_end_date" autocomplete="off" required>
                <div class="text-danger" id="end_date_error"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2"></label>
                <div class="col-md-10">
                  <input type="button" class="btn btn-primary" value="SUBMIT" id="terminationSubmit">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
<script>
  $('.termination_datepicker').datepicker();
  function terminateStaffForm()
  {
    $('#modal-terminate-staff').modal('show');
  }
  $('#terminationSubmit').click(function(){
    var token = $('input[name=\'_token\']').val();
    $('#detail_error').text('')
    $('#end_date_error').text('')
    $.ajax({
      type: 'POST',
      url: '<?php echo e(url("/supervisor/ajaxStaffTermination")); ?>',
      data: {
        _token : token,
        staff_id : $('#termination_staff_id').val(),
        detail : $('#termination_detail').val(),
        end_date : $('#termination_end_date').val(),
      },
      cache: false,
      success: function(data){
        $('#termination_detail').val('')
        $('#termination_end_date').val('')
        $('#modal-terminate-staff').modal('hide');
        console.log(data)
      },
      error: function(error){
        console.log(error.responseJSON)
        var errorTxt = '';
        $.each(error.responseJSON, function (index, value){
          if(index == 'detail'){
            errorTxt = value;
            $('#detail_error').text(errorTxt)
          }
          if(index == 'end_date'){
            errorTxt = value;
            $('#end_date_error').text(errorTxt)
          }
        })
      }
    });
  })
</script>
<div class="modal fade" id="modal-history-staff">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="service-title">Terminate Staff</h4>
      </div>
        <div class="modal-body" id="contract-body">
          <form action="<?php echo e(url('/supervisor/saveServiceHistory')); ?>" method="post">
            <?php echo csrf_field(); ?>

          <div class="row form-horizontal">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-md-2">Staff</label>
                <div class="col-md-10">
                  <input type="hidden" name="service_staff_id" class="form-control" name="from" autocomplete="off" value="<?php echo e($datas['staff_id']); ?>">
                  <input type="hidden" id="service_type" name="service_type" class="form-control">
                  <input type="text" name="service_staff_name" class="form-control" name="from" autocomplete="off" value="<?php echo e($datas['staff_name']); ?>" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2">Previous</label>
                <div class="col-md-10" id="previous">
                  <input type="text" name="service_previous" class="form-control" autocomplete="off">
                <div class="text-danger" id="detail_error"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2">Current</label>
                <div class="col-md-10" id="current">
                  <input type="text" name="service_current" class="form-control" autocomplete="off">
                <div class="text-danger" id="end_date_error"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2">Date</label>
                <div class="col-md-10" id="current">
                  <input type="text" name="service_promoted_date" class="form-control datepicker" autocomplete="off" value="<?php echo e(Date('Y-m-d')); ?>">
                <div class="text-danger" id="end_date_error"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2"></label>
                <div class="col-md-10">
                  <input type="submit" class="btn btn-primary" value="SUBMIT">
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
<?php ($adjust_staff = \App\Adjustment_staff::find($datas['staff_id'])); ?>
<script>
  function openHistoryModel(id)
  {
    if(id == 1){
      $('#service-title').text('Change Staff Department');
      var departments = '<?php echo $departments; ?>';
          departments = JSON.parse(departments)
          var previousHtml = '<select name="service_previous" class="form-control"><option value="<?php echo e(\App\Department::getTitle($adjust_staff->department)); ?>"><b><?php echo e(\App\Department::getTitle($adjust_staff->department)); ?></b></option>';
          for(var i=0; i<=departments.length; i++){
              previousHtml += '<option value="'+departments[i]+'">'+departments[i]+'</option>';
          }
          previousHtml += '</select>';
          var currentHtml = '<select name="service_current" class="form-control"><option value="<?php echo e(\App\Department::getTitle($adjust_staff->department)); ?>"><b><?php echo e(\App\Department::getTitle($adjust_staff->department)); ?></b></option>';
          for(var i=0; i<=departments.length; i++){
              currentHtml += '<option value="'+departments[i]+'">'+departments[i]+'</option>';
          }
          currentHtml += '</select>';
          $('#previous').html(previousHtml);
          $('#current').html(currentHtml);
    }else if(id == 2){
      $('#service-title').text('Change Staff Branch');
      var branches = '<?php echo $branches; ?>';
          branches = JSON.parse(branches)
          var previousHtml = '<select name="service_previous" class="form-control"><option value="<?php echo e(\App\Branch::gettitle($adjust_staff->branch)); ?>"><b><?php echo e(\App\Branch::gettitle($adjust_staff->branch)); ?></b></option>';
          for(var i=0; i<=branches.length; i++){
              previousHtml += '<option value="'+branches[i]+'">'+branches[i]+'</option>';
          }
          previousHtml += '</select>';
          var currentHtml = '<select name="service_current" class="form-control"><option value="<?php echo e(\App\Branch::gettitle($adjust_staff->branch)); ?>"><b><?php echo e(\App\Branch::gettitle($adjust_staff->branch)); ?></b></option>';
          for(var i=0; i<=branches.length; i++){
              currentHtml += '<option value="'+branches[i]+'">'+branches[i]+'</option>';
          }
          currentHtml += '</select>';
          $('#previous').html(previousHtml);
          $('#current').html(currentHtml);
    }else if(id == 3){
      $('#service-title').text('Staff Promotion');
      var designations = '<?php echo $designations; ?>';
                designations = JSON.parse(designations)
                var previousHtml = '<select id="previous_select" name="service_previous" class="form-control"><option value="<?php echo e(\App\Designation::getTitle($adjust_staff->designation)); ?>"><b><?php echo e(\App\Designation::getTitle($adjust_staff->designation)); ?></b></option>';
                for(var i=0; i<=designations.length; i++){
                    previousHtml += '<option value="'+designations[i]+'" >'+designations[i]+'</option>';
                }
                previousHtml += '</select>';
                var currentHtml = '<select id="current_select" name="service_current" class="form-control"><option value="<?php echo e(\App\Designation::getTitle($adjust_staff->designation)); ?>"><b><?php echo e(\App\Designation::getTitle($adjust_staff->designation)); ?></b></option>';
                for(var i=0; i<=designations.length; i++){
                    currentHtml += '<option value="'+designations[i]+'">'+designations[i]+'</option>';
                }
                currentHtml += '</select>';
                $('#previous').html(previousHtml);
                $('#current').html(currentHtml);
    }
    else if(id == 4){
      $('#service-title').text('Staff Status Change');
      var previousHtml = '<select name="service_previous" class="form-control"><option value="">Select Status</option><option value="Temporary" <?php if($adjust_staff->nature_of_employment == 0): ?> selected <?php endif; ?>>Temporary</option><option value="Permanent" <?php if($adjust_staff->nature_of_employment == 1): ?> selected <?php endif; ?>>Permanent</option></select>';
                
      var currentHtml = '<select name="service_current" class="form-control"><option value="">Select Status</option><option value="Temporary" <?php if($adjust_staff->nature_of_employment == 0): ?> selected <?php endif; ?>>Temporary</option><option value="Permanent"  <?php if($adjust_staff->nature_of_employment == 1): ?> selected <?php endif; ?>>Permanent</option></select>';
      
      $('#previous').html(previousHtml);
      $('#current').html(currentHtml);
    }
    else if(id == 5){
      // window.open('<?php echo e(url("branchadmin/")); ?>', '_blank')
    }else if(id == 6){
      // $('#service-title').text('Salary Revised');
    }else{

    }
    $('#service_type').val(id)
    $('#modal-history-staff').modal('show');
  }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>