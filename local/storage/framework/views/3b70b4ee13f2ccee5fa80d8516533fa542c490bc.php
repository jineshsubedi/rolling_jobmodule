<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rolling Access </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/bootstrap/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/font-awesome.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/select.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/ionicons.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/AdminLTE.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/jquery-ui.css')); ?>">
  <!--<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/timepicker/bootstrap-timepicker.min.css')); ?>"> -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/plugins/timepicker/jquery.timepicker.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/skins/_all-skins.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/responsives.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/beena.css')); ?>">
  <script src="<?php echo e(asset('assets/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/dist/js/jquery-ui.js')); ?>"></script>
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="hold-transition skin-blue sidebar-mini ">
  <!-- Site wrapper -->
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo e(url('/staffs')); ?>" class="logo">
        <img src="<?php echo e(asset('/image/accesslogo.png')); ?>">
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <span class="company_logo left hidden-xs">
          <img src="<?php echo e(asset('/image/logo.png')); ?>" style="float: left; height:40px; margin-top: 5px;">
        </span>
        <span class="company_name left hidden-xs">Rollingplans Pvt. Ltd.</span>
        <span class="tpsearch left hidden-xs">
          <input class="form-control" type="text" placeholder="Search Staff" aria-label="Search" id="autocompleteStaffSearch">
          <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
        </span>
        <div class="navbar-custom-menu">
          <ul class="navbar-nav ml-auto">


            <?php ($adjustment =
            \App\Adjustmentrequest::where('branch_id',auth()->guard('staffs')->user()->branch)->where('status',
            0)->count()); ?>
            <?php ($ot = \App\Otrequest::where('branch_id',auth()->guard('staffs')->user()->branch)->where('status',
            0)->count()); ?>
            <?php ($comp = \App\CompensatoryOff::getRequest()); ?>
            <?php ($hand = \App\LeaveWorkHandover::getAllRequest()); ?>
            <?php ($lev = \App\LeaveRequest::countApprovalWaiting()); ?>
            <?php ($unaccept = \App\StaffTask::countUnaccept()); ?>
            <?php ($unreadMessage = \App\TaskChat::countUnreadMessage()); ?>
            <?php ($travel = \App\Travel::countApprovalWaiting()); ?>
            <?php ($travel_expense = \App\Travel::countExpenseApprovalWaiting()); ?>
            <?php if(\App\BranchSetting::isHrHandler() || (auth()->guard('staffs')->user()->branch == 2 && auth()->guard('staffs')->user()->department == 4)): ?>
            <?php ($contract = \App\StaffContract::countContractNearToExpire()); ?>
            <?php else: ?>
            <?php ($contract = 0); ?>
            <?php endif; ?>
            <?php ($treq = $adjustment + $ot + $comp + $hand + $lev + $unaccept + $unreadMessage + $contract + $travel + $travel_expense); ?>
            <!-- Notifications Dropdown Menu -->
            <li class="dropdown notifications-menu tp15m">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning"><?php echo e($treq); ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have <?php echo e($treq); ?> notifications</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <a href="<?php echo e(url('staffs/travel/request/waitingApproval')); ?>">
                        <i class="fa fa-plane text-purple"></i> Travel Request<span
                          class="pull-right-container">
                          <small class="label pull-right bg-red"><?php echo e($travel); ?></small>
                        </span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo e(url('staffs/travel_expense')); ?>">
                        <i class="fa fa-money text-red"></i> Travel Expense<span
                          class="pull-right-container">
                          <small class="label pull-right bg-red"><?php echo e($travel_expense); ?></small>
                        </span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo e(url('/staffs/leaverequest')); ?>">
                        <i class="fa fa-calendar-times-o text-aqua"></i> Leave Request<span
                          class="pull-right-container">
                          <small class="label pull-right bg-red"><?php echo e($lev); ?></small>
                        </span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo e(url('/staffs/handover')); ?>">
                        <i class="fa fa-retweet text-aqua"></i> Handover Request<span class="pull-right-container">
                          <small class="label pull-right bg-red"><?php echo e($hand); ?></small>
                        </span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo e(url('/staffs/adjustment')); ?>">
                        <i class="fa fa-user-plus text-yellow"></i> Adjustment Request <span
                          class="pull-right-container">
                          <small class="label pull-right bg-red"><?php echo e($adjustment); ?></small>
                        </span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo e(url('/staffs/otrequest')); ?>">
                        <i class="fa fa-history text-red"></i> Overtime Request <span class="pull-right-container">
                          <small class="label pull-right bg-red"><?php echo e($ot); ?></small>
                        </span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo e(url('/staffs/compensatory')); ?>">
                        <i class="fa fa-repeat text-green"></i> Compansatory Request <span class="pull-right-container">
                          <small class="label pull-right bg-red"><?php echo e($comp); ?></small>
                        </span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-sticky-note text-red"></i> Noticeboard<span class="pull-right-container">
                          <small class="label pull-right bg-red">0</small>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo e(url('/staffs/tasks')); ?>">
                        <i class="fa fa-tasks text-yellow"></i> UnAccepted Task<span class="pull-right-container">
                          <small class="label pull-right bg-yellow"><?php echo e($unaccept); ?></small>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo e(url('/staffs/tasks')); ?>">
                        <i class="fa fa-commenting text-red"></i> Unread Message<span class="pull-right-container">
                          <small class="label pull-right bg-red"><?php echo e($unreadMessage); ?></small>
                      </a>
                    </li>
                    <?php if(\App\BranchSetting::isHrHandler() || (auth()->guard('staffs')->user()->branch == 2 && auth()->guard('staffs')->user()->department == 4)): ?>
                    <li>
                      <a href="#" onclick="getStaffContractNearToExpire()">
                        <i class="fa fa-commenting text-green"></i>Contract Alert<span class="pull-right-container">
                          <small class="label pull-right bg-red"><?php echo e($contract); ?></small>
                      </a>
                    </li>
                    <?php endif; ?>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="tp15m hidden-xs"><a href="#" class="refreshbtn">Refresh <i class="fa fa-undo"></i></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo e(Auth::guard('staffs')->user()->name); ?> <b
                  class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?php echo e(url('/staffs/logout')); ?>" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="<?php echo e(url('/staffs/logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="id" value="<?php echo e(Auth::guard('staffs')->user()->id); ?>">
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="modal fade companydocument" id="companydoc" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <?php ($dataclass = 'col-md-12'); ?>
            <?php ($documents = \App\InformationDocuments::select('id','title')->where('branch_id',
            auth()->guard('staffs')->user()->branch)->get()); ?>
            <?php if(count($documents) > 0): ?>
            <?php ($dataclass = 'col-md-8'); ?>
            <div class="box box-success">
              <div class="box-header with-border">
                <div class="title_bg">Company Documents</div>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool greenclr" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="box-body" style="height: 95px; overflow-y: auto;">
                <ul class="nav nav-stacked">
                  <?php foreach($documents as $doc): ?>
                  <li><a href="<?php echo e(url('/staffs/documents/view/'.$doc->id)); ?>" target="_blank"><?php echo e($doc->title); ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <!-- /.sidebar -->
    </aside>
    <!-- =============================================== -->
    <?php ($ratio = \App\Adjustment_staff::getAvergePoint(auth()->guard('staffs')->user()->id)); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <span class="pageheading hidden-xs"><?php echo $__env->yieldContent('heading'); ?></span>
          <span class="whitegradient float-left btm5m" title="Point you earned">Point: <span
              class="point"><?php echo e($ratio['ratio']); ?></span></span>
          <span class="whitegradient float-left btm5m" title="">Deadline Crossed Task: <span
              class="deadline"><?php echo e(number_format(\App\Adjustment_staff::countExpireTask(auth()->guard('staffs')->user()->id),2)); ?></span></span>
          <span class="whitegradient float-left btm5m" title="Point you earned">Penalty: <span
              class="penalty"><?php echo e($ratio['crossed_ratio']); ?></span></span>
          <span><a class="btn company_docbtn" href="#" data-toggle="modal" data-target="#companydoc">Company
              Document</a></span>
              <!-- new  -->
          <span><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-diary">Write Diary</a></span>
        </h1>
        <ol class="breadcrumb">
          <?php echo $__env->yieldContent('breadcrubm'); ?>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <?php if(Session::has('alert-danger') || Session::has('alert-success')): ?>
        <div class="row">
          <div class="col-xs-12">
            <?php if(Session::has('alert-danger')): ?>
            <div class="alert alert-danger"><?php echo e(Session::get('alert-danger')); ?></div>
            <?php endif; ?>
            <?php if(Session::has('alert-success')): ?>
            <div class="alert alert-success"><?php echo e(Session::get('alert-success')); ?></div>
            <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>
        <!-- Default box -->
        <?php echo $__env->yieldContent('content'); ?>
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <div class="modal fade" id="modal-sub-rating">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="approve-title">Rate your supervisor
              <?php echo e(\App\Adjustment_staff::getName(auth()->guard('staffs')->user()->supervisor)); ?></h4>
          </div>
          <form id="kpi-rating-form" method="POST" action="<?php echo e(url('/staffs/subrating')); ?>" class="form-horizontal"
            enctype="multipart/form-data">
            <div class="modal-body">
              <?php echo csrf_field(); ?>

              <input type="hidden" name="staff_id" value="<?php echo e(auth()->guard('staffs')->user()->supervisor); ?>">
              <div class="form-group">
                <label class="control-label col-md-5">Supervisory</label>
                <div class="col-md-2"><input class="form-control" name="supervisory" required="required"
                    placeholder="10" value="" type="text"></div>
                <div class="col-md-5">
                  <input class="form-control" name="supervisory_detail" placeholder="Description" value="" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-5">Leadership</label>
                <div class="col-md-2">
                  <input class="form-control" name="leadership" required="required" placeholder="10" value=""
                    type="text">
                </div>
                <div class="col-md-5">
                  <input class="form-control" name="leadership_detail" placeholder="Description" value="" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-5">Quality of Work</label>
                <div class="col-md-2"><input class="form-control" name="quality" required="required" placeholder="10"
                    value="" type="text"></div>
                <div class="col-md-5">
                  <input class="form-control" name="quality_detail" placeholder="Description" value="" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-5">Communication/Co-worker Ralation</label>
                <div class="col-md-2">
                  <input class="form-control" name="communication" required="required" placeholder="10" value=""
                    type="text">
                </div>
                <div class="col-md-5">
                  <input class="form-control" name="communication_detail" placeholder="Description" value=""
                    type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-5">Work Consistency</label>
                <div class="col-md-2">
                  <input class="form-control" name="consistency" required="required" placeholder="10" value=""
                    type="text">
                </div>
                <div class="col-md-5">
                  <input class="form-control" name="consistency_detail" placeholder="Description" value="" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-5">Independent Work</label>
                <div class="col-md-2"><input class="form-control" name="independent" required="required"
                    placeholder="10" value="" type="text"></div>
                <div class="col-md-5">
                  <input class="form-control" name="independent_detail" placeholder="Description" value="" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-5">Proactiveness</label>
                <div class="col-md-2">
                  <input class="form-control" name="proactiviness" required="required" placeholder="10" value=""
                    type="text">
                </div>
                <div class="col-md-5">
                  <input class="form-control" name="proactiviness_detail" placeholder="Description" value=""
                    type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-5">Creativity</label>
                <div class="col-md-2">
                  <input class="form-control" name="creativity" required="required" placeholder="10" value=""
                    type="text">
                </div>
                <div class="col-md-5">
                  <input class="form-control" name="creativity_detail" placeholder="Description" value="" type="text">
                </div>
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
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <span>Version</span> <span class="greenclr">2.3.0</span>
      </div>
      <span>Copyright &copy; 2014-<?php echo e(date('Y')); ?> <a target="_blank" class="greenclr"
          href="http://www.rollingplans.com.np">Rolling Plans Pvt. Ltd.</a>. All rights reserved.</span>
    </footer>
  </div><!-- ./wrapper -->
  <?php
        $check = '0';
        $allchk = '0';
        $checko = '1';
        $sup_check = '1';
        $check_kpi = \App\Adjustment_staff::checkPerformance('KPIs',auth()->guard('staffs')->user()->branch);
        if($check_kpi > 0){
           $parameter = \App\Adjustment_staff::getDuration('KPIs',auth()->guard('staffs')->user()->branch);
             if($parameter == 2)
              {
                  $day = date('d');
                  if($day > 13 && $day < 17)
                  {
                      $check = \App\Adjustment_staff::checkRt(date('Y-m'));
                  }
              } elseif($parameter == 3)
              {
                  $day = date('d');
                  if($day > 26 && $day < 32)
                  {
                      $check = \App\Adjustment_staff::checkRt(date('Y-m'));
                  }
              }
              elseif($parameter == 4)
              {
                      $months = ['3','6','9','12'];
                     $m = date('m');
                      if(in_array($m,$months)){
                          $check = \App\Adjustment_staff::checkRt(date('Y-m'));
                     }
              }
              elseif($parameter == 5)
              {
                  $months = ['6','12'];
                     $m = date('m');
                      if(in_array($m,$months)){
                          $check = \App\Adjustment_staff::checkRt(date('Y-m'));
                     }
              }elseif($parameter == 6){
                  $day = date('d');
                  $month = date('m');
                  if($month == 12 && $day > 26 && $day < 31)
                  {
                      $check = \App\Adjustment_staff::checkRt(date('Y-m'));
                  }
              }else{   
              }
      }?>
  <?php 
        if(auth()->guard('staffs')->user()->supervisor > 0){
        $check_sub = \App\Adjustment_staff::checkPerformance('Subordinate Rating',auth()->guard('staffs')->user()->branch);
       if($check_sub > 0){
           
           $parameters = \App\Adjustment_staff::getDuration('Subordinate Rating',auth()->guard('staffs')->user()->branch);
              if($parameters == 2)
              {
                  $day = date('d');
                  if($day > 13 && $day < 17)
                  {
                      $sup_check = \App\Adjustment_staff::checkSupRating(date('Y-m'));
                  }
              } elseif($parameters == 3)
              {
                  $day = date('d');
                  if($day > 26 && $day < 32)
                  {
                      $sup_check = \App\Adjustment_staff::checkSupRating(date('Y-m'));
                  }
              }
              elseif($parameters == 4)
              {
                      $months = ['3','6','9','12'];
                     $m = date('m');
                      if(in_array($m,$months)){
                          $sup_check = \App\Adjustment_staff::checkSupRating(date('Y-m'));
                     }
              }
              elseif($parameters == 5)
              {
                  $months = ['6','12'];
                     $m = date('m');
                      if(in_array($m,$months)){
                          $sup_check = \App\Adjustment_staff::checkSupRating(date('Y-m'));
                     }
              }elseif($parameters == 6){
                  $day = date('d');
                  $month = date('m');
                  if($month == 12 && $day > 26 && $day < 31)
                  {
                      $sup_check = \App\Adjustment_staff::checkSupRating(date('Y-m'));
                  }
              }else{
                  
              }
       }
       
       }
       
       $other_rating = \App\Adjustment_staff::getOtherPer(auth()->guard('staffs')->user()->branch);
       $other_id = 0;
       $other_title = '';
       if(isset($other_rating->id))
       {
           $other_id = $other_rating->id;
           $other_title = $other_rating->title;
       }

       $other_raters = \App\BranchSetting::getPerformanceRater(auth()->guard('staffs')->user()->branch);
       $other_rater = '0';
       if($other_raters == auth()->guard('staffs')->user()->id)
       {
        $other_rater = 1;
       }

       $operam = \App\Adjustment_staff::getDuration($other_title,auth()->guard('staffs')->user()->branch);
              if($operam == 2)
              {
                  $day = date('d');
                  if($day > 13 && $day < 17)
                  {
                      $checko = \App\Adjustment_staff::checkPerformanceRating($other_id);
                  }
              } elseif($operam == 3)
              {
                  $day = date('d');
                  if($day > 26 && $day < 10)
                  {
                      $checko = \App\Adjustment_staff::checkPerformanceRating($other_id);
                  }
              }
              elseif($operam == 4)
              {
                      $months = ['3','6','9','12'];
                     $m = date('m');
                      if(in_array($m,$months)){
                          $checko = \App\Adjustment_staff::checkPerformanceRating($other_id);
                     }
              }
              elseif($operam == 5)
              {
                  $months = ['6','12'];
                     $m = date('m');
                      if(in_array($m,$months)){
                          $checko = \App\Adjustment_staff::checkPerformanceRating($other_id);
                     }
              }elseif($operam == 6){
                  $day = date('d');
                  $month = date('m');
                  if($month == 12 && $day > 26 && $day < 31)
                  {
                      $checko = \App\Adjustment_staff::checkPerformanceRating($other_id);
                  }
              }else{
              }
      ?>
  <div class="modal fade" id="modal-kpi-rating">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="approve-title">Kpi Rating</h4>
        </div>
        <form id="kpi-rating-form" method="POST" action="<?php echo e(url('/staffs/kpirating')); ?>" class="form-horizontal"
          enctype="multipart/form-data">
          <div class="modal-body">
            <?php echo csrf_field(); ?>

            <div class="form-group">
              <label class="control-label col-md-5">Staff</label>
              <div class="col-md-5">
                <select class="form-control" name="staff" required="required" id="kpi-staff">
                  <option value="">Select Staff</option>
                  <?php if($allchk == '0'): ?>
                  <?php ($staffs = \App\Adjustment_staff::getSubordinate(date('Y-m'))); ?>
                  <?php else: ?>
                  <?php ($staffs = \App\Adjustment_staff::getAllSub()); ?>
                  <?php endif; ?>
                  <?php foreach($staffs as $staff): ?>
                  <option value="<?php echo e($staff['id']); ?>"><?php echo e($staff['name']); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-5">Quality of Work</label>
              <div class="col-lg-2">
                <input class="form-control" name="quality" required="required" placeholder="10" value="" type="text">
              </div>
              <div class="col-md-5">
                <input class="form-control" name="quality_detail" placeholder="Description" value="" type="text">

              </div>

            </div>
            <div class="form-group">
              <label class="control-label col-md-5">Communication/Co-worker Ralation</label>
              <div class="col-lg-2">
                <input class="form-control" name="communication" required="required" placeholder="10" value=""
                  type="text">
              </div>
              <div class="col-md-5">
                <input class="form-control" name="communication_detail" placeholder="Description" value="" type="text">

              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-5">Work Consistency</label>
              <div class="col-lg-2">
                <input class="form-control" name="consistency" required="required" placeholder="10" value=""
                  type="text">
              </div>
              <div class="col-md-5">
                <input class="form-control" name="consistency_detail" placeholder="Description" value="" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-5">Independent Work</label>
              <div class="col-lg-2">
                <input class="form-control" name="independent" required="required" placeholder="10" value=""
                  type="text">
              </div>
              <div class="col-md-5">
                <input class="form-control" name="independent_detail" placeholder="description" value="" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-5">Proactiveness</label>
              <div class="col-lg-2">
                <input class="form-control" name="proactiviness" required="required" placeholder="10" value=""
                  type="text">
              </div>
              <div class="col-md-5">
                <input class="form-control" name="proactiviness_detail" placeholder="Description" value="" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-5">Creativity</label>
              <div class="col-lg-2">
                <input class="form-control" name="creativity" required="required" placeholder="10" value="" type="text">
              </div>
              <div class="col-md-5">
                <input class="form-control" name="creativity_detail" placeholder="description" value="" type="text">
              </div>
            </div>
            <div id="kpis">
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
  <div class="modal fade" id="modal-other-rating">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="rating-title">Rating of <?php echo e($other_title); ?></h4>
        </div>
        <form id="kpi-rating-form" method="POST" action="<?php echo e(url('/staffs/otherrating')); ?>" class="form-horizontal"
          enctype="multipart/form-data">
          <div class="modal-body">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="performance_id" id="performance_id" value="<?php echo e($other_id); ?>">
            <?php ($ad_staffs = \App\Adjustment_staff::getPerformanceRatingStaffs($other_id)); ?>
            <?php if(count($ad_staffs) > 0): ?>
            <?php foreach($ad_staffs as $stf): ?>
            <div class="form-group">
              <label class="control-label col-md-6"><?php echo e($stf['name']); ?></label>
              <div class="col-md-6"><input class="form-control" name="performance[<?php echo e($stf['id']); ?>][rating]"
                  required="required" placeholder="10" value="" type="text"></div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
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
  <div class="modal fade" id="modal-survey">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="rating-title">Staff Stay Survey</h4>
        </div>
        <div class="modal-body" id="survey-body">
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <?php 
     
       $qscheck = \App\Adjustment_staff::checkServey();
       
       if ($qscheck == '0') {
         $sch = '1';
         
       } else{

        $sch = '0';
       }
      
      ?>
  <!-- jQuery 2.1.4 -->
  <div class="modal fade" id="modal-voting">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="rating-title">Voting for Best Employe</h4>
        </div>
        <form method="POST" action="<?php echo e(url('/staffs/vote/save')); ?>" class="form-horizontal" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>

          <input type="hidden" name="title" value="Best">
          <?php ($staffs = \App\Adjustment_staff::select('id','name')->where('status',1)->where('branch',
          auth()->guard('staffs')->user()->branch)->orderBy('name', 'asc')->get()); ?>
          <div class="modal-body">
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-md-5 control-label reqired">Best</label>
                <div class="col-md-7">
                  <select class="form-control" name="staff_id[]">
                    <?php foreach($staffs as $stf): ?>
                    <option value="<?php echo e($stf->id); ?>"><?php echo e($stf->name); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-md-5 control-label reqired">2nd Best</label>
                <div class="col-md-7">
                  <select class="form-control" name="staff_id[]">
                    <?php foreach($staffs as $stf): ?>
                    <option value="<?php echo e($stf->id); ?>"><?php echo e($stf->name); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Vote Now</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <?php 
  
    $vcheck = \App\Award::checkVote('Best');
    if ($vcheck == '0') {
       $vc = '1';
     } else{

      $vc = '0';
     }
    
     ?>
  <!-- Bootstrap 3.3.5 -->
  <script src="<?php echo e(asset('assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
  <!-- SlimScroll -->
  <script src=".<?php echo e(asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo e(asset('assets/plugins/fastclick/fastclick.min.js')); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo e(asset('assets/dist/js/app.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/dist/js/bootstrap-checkbox.min.js')); ?>" defer></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="<?php echo e(asset('assets/plugins/timepicker/bootstrap-timepicker.min.js')); ?>"></script> -->
  <script type="text/javascript" src="<?php echo e(asset('assets/plugins/timepicker/jquery.timepicker.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/dist/js/demo.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/dist/js/select.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/dist/js/checkall.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/dist/js/jquery_form.js')); ?>"></script>
  <script src="https://momentjs.com/downloads/moment.min.js"></script>
  <script type="text/javascript">
    function loadlink(){
        $('.main-sidebar').load('<?php echo e(url("/staffs/left_bar")); ?>',function () {
             $(this).unwrap();
        });
    }
    $(document).ready(function(){
        var ocheck = '<?php echo e($other_id); ?>';
        var other_rater = '<?php echo e($other_rater); ?>';
        
      loadlink();
      //alert(rcheck);
      var rcheck = '<?php echo e($check); ?>';
      var sup_check = '<?php echo e($sup_check); ?>';
      var checko = '<?php echo e($checko); ?>';
      var survey = '<?php echo e($sch); ?>';
      var voting = '<?php echo e($vc); ?>';
      if(sup_check == '0')
        {
            $('#modal-sub-rating').modal('show');
        } 
       else if(rcheck == 1)
        {
            $('#modal-kpi-rating').modal('show');
        } else if(ocheck > 0 & other_rater > 0 & checko == 0)
        {
            $('#modal-other-rating').modal('show');
        }
        else if (survey == '1') {
          var token = $('input[name=\'_token\']').val();
           $.ajax({
                type: 'POST',
                url: '<?php echo e(url("/staffs/staff-survey/get-popup")); ?>',

                data: '_token='+token,
                cache: false,
                success: function(html){
                  $('#survey-body').html(html);
                  $('#modal-survey').modal('show');
                }
              });
        }else if (voting == 1) {
          $('#modal-voting').modal('show');
        }
    })

    loadlink(); // This will run on page load
    setInterval(function(){
        loadlink() // this will run after every 5 seconds
    }, 1000000000);
    
    $('#kpi-staff').on('change', function(){
        var id = $(this).val();
        var token = $('input[name=\'_token\']').val();
      $.ajax({
          type: 'POST',
          url: '<?php echo e(url("/staffs/clientdetail/get-kpi")); ?>',

          data: '_token='+token+'&id='+id,
          cache: false,
          success: function(html){
            $('#kpis').html(html);
           
          }
        });
    })
  </script>
  <!-- Script for dropdown hover menu -->
  <script type="text/javascript">
    $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
  }, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
  });

  $('.refreshbtn').on('click', function(){
      location.reload(); 
  })
  </script>

<script src="<?php echo e(asset('/assets/ckeditor/ckeditor.js')); ?>"></script>
  <?php /* reminder notification */ ?>
  <div id="remindermdelcollection"></div>
  <script>
    var token = $("input[name=\"_token\"]").val();
      setInterval(function(){ getReminder() }, 30000);
      function getReminder(){
        $.ajax({
          type: "GET",
          url: "<?php echo e(route('staffs.getReminder')); ?>",
          data: {
            _token : token,
          },
          cache: false,
          success: function(data){
            var model = '';
            var html = '';
            var reminders = data.msg
            if(reminders){
              $.each(reminders, function(index, value){
                model += '<div class="modal fade" id="reminder-modal-view'+value.note_id+'"><div class="modal-dialog "><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">'+value.user.name+' Reminder</h4></div><div class="modal-body"><div class="row"><div class="col-md-10"><p style="font-size: 16px;">'+value.description+'</p><div><button type="button" class="btn btn-primary" onclick="closeReminder('+value.note_id+')"><i class="fa fa-clock-o"></i> Done</button></div></div></div></div></div><div class="modal-footer"></div></div></div>';
  
                $('#remindermdelcollection').append(model);
                $('#reminder-modal-view'+value.note_id).modal('show');
              })
            }
          },
          error: function(error)
          {
          console.log(error)
          }
        })
    }
    function closeReminder(note_id)
    {
      $.ajax({
          type: "POST",
          url: "<?php echo e(route('staffs.updateReminder')); ?>",
          data: {
            _token : token,
            note_id : note_id
          },
          cache: false,
          success: function(data){
            $('#reminder-modal-view'+note_id).modal('hide');
          },
          error: function(error){
            console.log(error)
          }
      });
    
    }
  </script>


  <!-- write diary  -->
  <div class="modal fade" id="modal-diary">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="rating-title">Write Diary</h4>
        </div>
        <div class="model-body">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <form method="POST" action="<?php echo e(route('staffs.diary.save')); ?>" class="form-horizontal" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="col-md-12">
                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="text" style="margin-top:20px;border:none;background-color:white; border-bottom:2px solid #ddd;border-radius:0;box-shadow:none !important;color:#757474 !important;" name="diary_date" class="form-control diary_date" id="diary_date" value="<?php echo e(\Carbon\Carbon::today()->format('Y-m-d')); ?>" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="text" placeholder="Enter Title" name="diary_title" style="border:none !important;background-color:white; border-bottom:2px solid #ddd !important;box-shadow:none !important;border-radius:0; color:#757474 !important;" class="form-control" id="diary_title">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="col-md-12">
                      <textarea id="diary_description" name="diary_description" class="form-control" placeholder="enter"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="model-footer"><br><br></div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <script src="<?php echo e(asset('assets/ckeditor/ckeditor.js')); ?>"></script>

<script>
    $('#diary_date').datepicker();
     $(function () {
    CKEDITOR.replace('diary_description')
  })
</script>



<!-- performnace  -->
  <?php ($period = \App\BranchSetting::getPerformanceRatingTime(auth()->guard('staffs')->user()->branch)); ?>
  <?php ($check = \App\Performance::checkPerformanceReport($period)); ?>
  <div class="modal fade" id="modal-subordinate-performance-rating">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="rating-title">Performance Rating</h4>
        </div>
        <form id="subordinate-performance-rating-form" method="POST" action="<?php echo e(url('staffs/performance/save')); ?>" class="form-horizontal" enctype="multipart/form-data">
          <div class="modal-body">
            <?php echo csrf_field(); ?>

            <?php ($staffs = \App\Adjustment_staff::getPerfomanceSubordinate()); ?>
              <div class="form-group">
                <label class="col-md-12">Select Staff</label>
                <div class="col-md-12">
                <select name="staff_id" class="form-control" required>
                  <option value="">Select Staff</option>
                  <?php foreach($staffs as $staff): ?>
                  <option value="<?php echo e($staff['id']); ?>"><?php echo e($staff['name']); ?></option>
                  <?php endforeach; ?>
                </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Comment</label>
                <div class="col-md-12"><textarea class="form-control" name="comment"></textarea></div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Comment Rating (Out of 10)</label>
                <div class="col-md-12"><input type="text" class="form-control" name="comment_rating"></div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" id="cancelPerformanceAll">Cancel All</button>
            <button type="submit" name="action" class="btn btn-danger" value="cancel">Staff Cancel</button>
            <button type="submit" name="action" class="btn btn-primary" value="post">Save</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <script>
  $(document).ready(function(){
    var check = '<?php echo e($check); ?>';
    if(check){
      $('#modal-subordinate-performance-rating').modal('show');
    }
    $('#cancelPerformanceAll').click(function(){
      $('#modal-subordinate-performance-rating').modal('hide');
      var CSRF_TOKEN = $('input[name=\'_token\']').val();
      $.ajax({
        url: "<?php echo e(url('/staffs/performance/cancelAll')); ?>",
        type: 'POST',
        data:{
            _token: CSRF_TOKEN,
        },
        dataType: 'JSON',
        success:function(data){
          console.log(data)
        },
        error: function(error){
          console.log(error)
        }
      });
    })
  })
  </script>



<?php 
  $survey = \App\Survey::checkSurvey();
  if($survey){
    $checkSurvey = 1;
    $questions = \App\SurveyQuestion::getQuestionBySurveyId($survey->id);
  }else{
    $checkSurvey = 0;
    $questions = 0;
  }
?>
<div class="modal fade bd-example-modal-lg" id="survey-modal-default" style="overflow-y:scroll">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        Survey
      </div>
      <div class="modal-body">
        <div id="errors" class="text-danger">
          <?php if($errors->any()): ?>
          <div class="alert alert-danger">
            <ul style="list-style:none">
              <?php foreach($errors->all() as $error): ?>
              <li><?php echo e($error); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php endif; ?>
        </div>
        <?php if($questions): ?>
        <form action=" <?php echo e(route('staffs.survey.saveAction',$survey)); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>

          <?php foreach($questions as $question): ?>
          <?php if(!$question->parent_id): ?>
          <div class="form-group" id="action_form_<?php echo e($question->id); ?>">
            <label><?php echo e($question->label); ?> <?php if($question->required==1): ?> <span style="color:red;">*</span>
              <?php endif; ?></label>
            <input type="hidden" name="question_ids[]" value="<?php echo e($question->id); ?>">
            <div class="form-input">
              <?php if($question->type=='text'): ?>
              <input type="text" name="input[<?php echo e($question->id); ?>]" class="form-control" <?php if($question->required): ?>
              required <?php endif; ?>>
              <?php elseif($question->type=='select'): ?>
              <?php $option = explode(',', $question->list_menu); ?>
              <input type="hidden" id="select_extra_<?php echo e($question->id); ?>" value="<?php echo e($question->extra); ?>">
              <select selectattr="<?php echo e($question->id); ?>" extraattr="<?php echo e($question->extra); ?>" name="input[<?php echo e($question->id); ?>]"
                id="select_form_<?php echo e($question->id); ?>" class="form-control" <?php if($question->required): ?>
                required <?php endif; ?>>
                <option value="">Select Option</option>
                <?php for($i=0;$i<count($option);$i++): ?> <option value="<?php echo e($option[$i]); ?>">
                  <?php echo e($option[$i]); ?>

                  </option>
                  <?php endfor; ?>
              </select>
              <?php elseif($question->type=='date'): ?>
              <input type="text" name="input[<?php echo e($question->id); ?>]" class="datepicker form-control"
                <?php if($question->required): ?>
              required
              <?php endif; ?>>
              <?php elseif($question->type=='textarea'): ?>
              <textarea name="input[<?php echo e($question->id); ?>]" id="description_<?php echo e($question->id); ?>" class="form-control"
                <?php if($question->required): ?> required <?php endif; ?>></textarea>
              <?php elseif($question->type=='email'): ?>
              <input type="<?php echo e($question->type); ?>" name="input[<?php echo e($question->id); ?>]" class="form-control"
                <?php if($question->required): ?> required <?php endif; ?>>
              <?php elseif($question->type=='file'): ?>
              <input type="<?php echo e($question->type); ?>" name="input[<?php echo e($question->id); ?>]" class="form-control"
                <?php if($question->required): ?> required <?php endif; ?>>
              <?php elseif($question->type=='radio'): ?>
              <?php $option = explode(',', $question->list_menu); ?>
              <?php for($i=0;$i<count($option);$i++): ?> <input name="input[<?php echo e($question->id); ?>]" type="radio"
                value="<?php echo e($option[$i]); ?>" <?php if($question->required): ?> required <?php endif; ?>><?php echo e($option[$i]); ?>

                <?php endfor; ?>
                <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>
          <?php endforeach; ?>
          <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary">SUBMIT</button>
          </div>
        </form>

        <?php endif; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function($) {
    var survey = '<?php echo e($checkSurvey); ?>';
    if(survey == 1){
      $('#survey-modal-default').modal('show');
    }
    $('body').on('focus',".datepicker", function(){
        $(this).datepicker({
          autoclose: true,
          format: 'yyyy-m-d',
        });
    });
    var CSRF_TOKEN = $('input[name=\'_token\']').val();
    $(document).on('change', 'select', function () {
        var element = $(this);
        var question_id = element.attr("selectattr");
        var extraValue = element.attr("extraattr");
        var value = $(this).val()
        if(extraValue == value){
            $.ajax({
                url: "<?php echo e(url('/staffs/survey/getChildquestion')); ?>",
                type: 'POST',
                data:{
                    _token: CSRF_TOKEN,
                    question_id: question_id
                },
                dataType: 'JSON',
                success:function(data){
                    var value = data.msg;
                    $.each(data.msg, function(index, value){
                        var type = '';
                        function formType(value){
                            if(value.type=="text"){
                                return '<input type="text" name="input['+value.id+']" class="form-control"  <?php if('+value.required+'): ?> required <?php endif; ?>>';
                            }
                            if(value.type=="textarea"){
                                return '<textarea name="input['+value.id+']" class="form-control"  <?php if('+value.required+'): ?> required <?php endif; ?>></textarea>';
                            }
                            if(value.type=="date"){
                                return '<input type="text" name="input['+value.id+']" class="form-control datepicker" <?php if('+value.required+'): ?> required <?php endif; ?>>';
                            }
                            if(value.type=="email"){
                                return '<input type="email" name="input['+value.id+']" class="form-control" <?php if('+value.required+'): ?> required <?php endif; ?>>';
                            }
                            if(value.type=="file"){
                                return '<input type="file" name="input['+value.id+']" class="form-control" <?php if('+value.required+'): ?> required <?php endif; ?>>';
                            }
                            if(value.type=="select"){
                                console.log(value.list_menu);
                                var i;
                                var optiondata = value.list_menu;
                                var optionValue =optiondata.split(',')
                                var optionSelect = '<div></div>'
                                for(i=0;i<optionValue.length; i++){ 
                                    console.log(optionValue[i]) 
                                    optionSelect += '<option value="'+optionValue[i]+'">'+optionValue[i]+'</option>'
                                }
                                return '<input type="hidden" id="select_extra_'+value.id+'" value="'+value.extra+'"><select selectattr="'+value.id+'" extraattr="'+value.extra+'" name="input['+value.id+']" id="select_form_'+value.id+'" class="form-control" <?php if('+value.required+'): ?> required <?php endif; ?>><option value="">Select Option</option>'+optionSelect+'</select>';
                            } 
                            if(value.type=="radio"){
                                console.log(value.list_menu);
                                var i;
                                var radiodata = value.list_menu;
                                var radioValue =radiodata.split(',')
                                var radioSelect = '<div></div>'
                                for(i=0;i<radioValue.length; i++){ 
                                    console.log(radioValue[i]) 
                                    radioSelect += ' &nbsp; <input type="radio" value="'+radioValue[i]+'" name="input['+value.id+']">'+radioValue[i]
                                }
                                return '<input type="hidden" id="select_extra_'+value.id+'" value="'+value.extra+'">'+radioSelect+'';
                            }
                        }
                        
                        var childhtml = '<div class="form-group child'+question_id+'" id="action_form_'+value.id+'"><label> '+value.label+' <span <?php if('+value.required+'): ?> style="color:red;" <?php endif; ?> >*</span></label><input type="hidden" name="question_ids[]" value="'+value.id+'"><div class="form-input">'+formType(value)+'</div></div>';

                        $('#action_form_'+question_id).append(childhtml);
                    })
                },
                error: function(error) {
                    console.log(error.responseJSON)
                }
            })
        }else{
          $('.child'+question_id).remove();
        }
    });
  });
</script>


<!-- contract  -->
<div class="modal fade" id="modal-expire-contract">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="rating-title">Contract Near To Expire</h4>
      </div>
      <div class="model-body">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <table class="table table-bordered">
              <tr>
                <th>Name</th>
                <th>Expiry Date</th>
                <th>Document</th>
                <th>Action</th>
              </tr>
              <?php foreach(\App\StaffContract::getStaffContractNearToExpire() as $contract): ?>
              <tr>
                <td><?php echo e(\App\Adjustment_staff::getName($contract->staff_id)); ?></td>
                <td>
                  <?php if($contract->to >= Date('Y-m-d')): ?>
                  <?php echo e(\Carbon\Carbon::parse($contract->to)->diffForHumans()); ?>

                  <?php else: ?> 
                    Contract Expired
                  <?php endif; ?>
                </td>
                <td>
                  <a href="<?php echo e(asset('image'.'/'.$contract->document)); ?>">
                    <img src="<?php echo e(asset('image/pdf_icon.png')); ?>" width="50px">
                  </a>
                </td>
                <td>
                  <a href="<?php echo e(url('staffs/otstaff/reports'.'/'.$contract->staff_id).'?tab=contract'); ?>" class="btn btn-info">Report</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
      <div class="model-footer"><br><br></div>
    </div>
  </div>
</div>
<script>
  function getStaffContractNearToExpire()
  {
    $('#modal-expire-contract').modal('show');
  }
</script>

<!-- Notice  -->
<?php ($notices = \App\Notice::getNotice()); ?>
<?php if($notices): ?>
<?php foreach($notices as $notice): ?>
<div class="modal fade" id="modal-expire-notice<?php echo e($notice->id); ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="rating-title">General Notice</h4>
      </div>
      <div class="model-body">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div style="border:1px solid grey; border-radius: 5px; margin: 0 auto; width: 98%; padding: 10px;">
                <h3><?php echo e(isset($notice) ? $notice->title : ''); ?></h3>
                <p style="text-align: justify;"><?php echo e(isset($notice) ? $notice->description : ''); ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="model-footer"><br><br></div>
    </div>
  </div>
</div>

<script>
  $('#modal-expire-notice<?php echo e($notice->id); ?>').modal('show');
</script>
<?php endforeach; ?>
<?php endif; ?>

<script>
    $('#autocompleteStaffSearch').autocomplete({
        source: '<?php echo e(url("staffs/getStaffList/")); ?>',
        minlength:1,
        autoFocus:true,
        select:function(e,ui){
          $(this).val(ui.item.value);
        }
    }).data("ui-autocomplete")._renderItem = function( ul, item ) {
      return $( "<li class='ui-autocomplete-row'></li>" )
        .data( "item.autocomplete", item )
        .append( item.label )
        .appendTo( ul );
    };
</script>



<?php ($travels = \App\Travel::getMyTravel()); ?>
<div class="modal fade" id="modal-travel-alert">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="rating-title">Add Expense to Travel</h4>
      </div>
      <div class="model-body">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <ul class="list-group">
              <li class="list-group-item">
                <label>Travel ID</label>
                <span class="right">
                  <a href="">add Expense</a>
                </span>
              </li>
            <?php foreach($travels as $travel): ?>
            <?php if(count($travel->travel_expense) == 0): ?>
              <li class="list-group-item">
                <label><?php echo e($travel->unique_id); ?></label>
                <span class="right">
                  <a href="<?php echo e(route('staffs.travelExpense.create', $travel->id)); ?>" class="btn btn-info">add Expense</a>
                </span>
              </li>
            <?php endif; ?>
            <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="model-footer" style="padding: 10px;">
        <div class="text-right">
          <?php /* <button type="button" class="btn bg-warning">Cancel</button> */ ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  <?php foreach($travels as $travel): ?>
  var travel = '<?php echo e(count($travel->travel_expense)); ?>';
  if(travel == 0)
  {
    $('#modal-travel-alert').modal('show');
  }
  <?php endforeach; ?>
</script>

<?php /* training notice module */ ?>
<?php ($t_notice = \App\TrainingNotice::getNotice()); ?>
<?php foreach($t_notice as $notice): ?>
<div class="modal fade" id="modal-training-notice-<?php echo e($notice->id); ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="rating-title">Training Notice</h4>
      </div>
      <div class="model-body" style="padding: 10px;">
        <div class="row form-group">
          <label class="col-md-4">Date of Publication</label>
          <div class="col-md-8">
            <?php echo e(\Carbon\Carbon::parse($notice->date)->format('d M, Y')); ?>

          </div>
        </div>
        <div class="row form-group">
          <label class="col-md-4">Training On:</label>
          <div class="col-md-8">
            <?php echo e(\App\TrainingProgram::getTitle($notice->program_id)); ?>

          </div>
        </div>
        <div class="row form-group">
          <label class="col-md-4">Submission Date</label>
          <div class="col-md-8">
            <?php echo e(\Carbon\Carbon::parse($notice->submit_date)->format('d M, Y')); ?>

          </div>
        </div>
        <div class="row form-group">
          <label class="col-md-4">Description:</label>
          <div class="col-md-8">
            <?php echo e($notice->description); ?>

          </div>
        </div>
        <div class="row form-group">
          <label class="col-md-4"></label>
          <div class="col-md-8">
            <a href="<?php echo e(asset('image/'.$notice->document)); ?>" target="_blank">
                <img src="<?php echo e(asset('image/ms-word.png')); ?>" width="100px;">
            </a>
          </div>
        </div>
        <hr>
        <h4>Participation Request Form</h4>
        <input type="hidden" id="notice-training_id<?php echo e($notice->id); ?>" value="<?php echo e($notice->training_id); ?>">
        <div class="row">
          <div class="form-group">
              <label class="col-md-4 required">Select Your Level</label>
              <div class="col-md-8">
              <?php ($positions = \App\TravelerPosition::getAllPositions()); ?>
              <select name="" id="notice-level<?php echo e($notice->id); ?>" class="form-control" required>
                <option value="">Select Level</option>
                <?php foreach($positions as $position): ?>
                <option value="<?php echo e($position->id); ?>"><?php echo e($position->title); ?></option>
                <?php endforeach; ?>  
              </select>
              </div>
          </div>
          <br><br>
          <div class="form-group">
            <label class="col-md-4">Why are you intrested?</label>
            <div class="col-md-8">
              <textarea name="" id="notice-description<?php echo e($notice->id); ?>" class="form-control" rows="5"></textarea>
            </div>
          </div>
          <br><br>
          <div class="form-group">
            <label class="col-md-4"></label>
            <div class="col-md-8">
              <button type="button" class="btn btn-info" onclick="intrestedParticipant(<?php echo e($notice->id); ?>)">Intrested</button>
              <button type="button" class="btn btn-warning" onclick="notIntrested(<?php echo e($notice->id); ?>)">Not Intrested</button>
            </div>
          </div>
        </div>
      </div>
      <div class="model-footer" style="padding: 10px;">
        <?php /* <button class="btn btn-info" type="button">Submit</button> */ ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<script>
  <?php foreach($t_notice as $notice): ?>
    <?php ($checkStaffApply = \App\TrainingParticipant::checkStaffApply($notice->training_id)); ?>
    var id = '<?php echo e($notice->id); ?>'
    <?php if(!$checkStaffApply): ?>
    if(localStorage.getItem('notice_id')){
      var noticeId = JSON.parse(localStorage.getItem('notice_id'))
      var noticeCount = 0;
      for(var i=0; i<noticeId.length; i++){
        if(noticeId[i] == id){
          noticeCount++
        }
      }
      if(noticeCount == 0){
        $('#modal-training-notice-<?php echo e($notice->id); ?>').modal('show');
      }
    }else{
      $('#modal-training-notice-<?php echo e($notice->id); ?>').modal('show');
    }
    <?php endif; ?>
  <?php endforeach; ?>
  var CSRF_TOKEN = $('input[name=\'_token\']').val();
  function notIntrested(id)
  {
    var noticeId = [];
    if(localStorage.getItem('notice_id')){
      var noticeId = JSON.parse(localStorage.getItem('notice_id'));
    }
    console.log(noticeId);
    noticeId.push(id)
    localStorage.setItem('notice_id', JSON.stringify(noticeId))
    $('#modal-training-notice-'+id).modal('hide');
  }
  function intrestedParticipant(id)
  {
    var training_id = $('#notice-training_id'+id).val()
    var level = $('#notice-level'+id).val()
    var description = $('#notice-description'+id).val()
    $.ajax({
      url: "<?php echo e(route('staffs.intrestedParticipantAction')); ?>",
      type: 'POST',
      data:{
          _token: CSRF_TOKEN,
          training_id: training_id,
          level: level,
          description: description
      },
      dataType: 'JSON',
      success:function(data){
        // console.log(data)
        $('#modal-training-notice-'+id).modal('hide');
      },
      error: function(error){
        alert('failed')
      }
    })
  }
</script>
</body>
</html>