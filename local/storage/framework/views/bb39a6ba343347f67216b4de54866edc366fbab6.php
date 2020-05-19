<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Content Management System </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/bootstrap/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/select.css')); ?>">
    <!-- Ionicons -->
     <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/ionicons.css')); ?>">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/jquery-ui.css')); ?>">
    
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/skins/_all-skins.min.css')); ?>">
     <script src="<?php echo e(asset('assets/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>


<script src="<?php echo e(asset('assets/dist/js/jquery-ui.js')); ?>"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
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
        <a href="<?php echo e(url('/admin')); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>P</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>Panel</span>
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
           <img src="<?php echo e(asset('/image/rolling_erms.jpg')); ?>" style="float: left; height:50px">
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
               <!-- User Account: style can fa fa-gears found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 
                  <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
                </a>
                <ul class="dropdown-menu">
                 
                  <li class="user-footer">
                   
                    <div class="pull-right">
                      <a class="dropdown-item" href="<?php echo e(url('/logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="get" style="display: none;">
                                       <?php echo csrf_field(); ?>

                                    </form>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
             
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?php echo e(url('/admin')); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>System</span> <i class="fa fa-angle-left pull-right"></i>
                
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('/admin/setting')); ?>"><i class="fa fa-circle-o"></i> Setting</a></li>
                <li><a href="<?php echo e(url('/admin/usergroup')); ?>"><i class="fa fa-circle-o"></i> User Groups</a></li>
                <li><a href="<?php echo e(url('/admin/user')); ?>"><i class="fa fa-circle-o"></i> Users</a></li>
                <li><a href="<?php echo e(url('/admin/country')); ?>"><i class="fa fa-circle-o"></i> Countries</a></li>
                <li><a href="<?php echo e(url('/admin/educationlevel')); ?>"><i class="fa fa-circle-o"></i> Education Levels</a></li>
                <li><a href="<?php echo e(url('/admin/faculty')); ?>"><i class="fa fa-circle-o"></i> Faculties</a></li>
                <li><a href="<?php echo e(url('/admin/experience')); ?>"><i class="fa fa-circle-o"></i> Experiences</a></li>
                <li><a href="<?php echo e(url('/admin/ownership')); ?>"><i class="fa fa-circle-o"></i> Ownership</a></li>
                <li><a href="<?php echo e(url('/admin/size')); ?>"><i class="fa fa-circle-o"></i> Business Size</a></li>
                <li><a href="<?php echo e(url('/admin/salutation')); ?>"><i class="fa fa-circle-o"></i> Salutation</a></li>
                <li><a href="<?php echo e(url('/admin/joblocation')); ?>"><i class="fa fa-circle-o"></i> Job Locations</a></li>
                <li><a href="<?php echo e(url('/admin/joblevel')); ?>"><i class="fa fa-circle-o"></i> Job Level</a></li>
                <li><a href="<?php echo e(url('/admin/jobcategory')); ?>"><i class="fa fa-circle-o"></i> Job Category</a></li>
                <li><a href="<?php echo e(url('/admin/membertype')); ?>"><i class="fa fa-circle-o"></i> Member Types</a></li>
                <li><a href="<?php echo e(url('/admin/organizationtype')); ?>"><i class="fa fa-circle-o"></i> Organization Types</a></li>
                <li><a href="<?php echo e(url('/admin/currency')); ?>"><i class="fa fa-circle-o"></i> Salary Unit</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-globe"></i><span>Website</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('/admin/layout')); ?>"><i class="fa fa-circle-o"></i> Layouts</a></li>
                 <li><a href="<?php echo e(url('/admin/menu')); ?>"><i class="fa fa-th"></i> <span>Menu</span></a></li>
            <li><a href="<?php echo e(url('/admin/article')); ?>"><i class="fa fa-tags fa-fw" ></i><span>Article</span></a></li>
               <li> <a href="<?php echo e(url('/admin/staff')); ?>"><i class="fa fa-users" ></i><span>Staffs</span></a></li>
           
            <li class="treeview">
              <a href="#">
                <i class="fa fa-picture-o"></i>
                <span>Gallery</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('/admin/photoGallery')); ?>"><i class="fa fa-picture-o"></i> Photo Gallery</a></li>
                <li><a href="<?php echo e(url('/admin/videoGallery')); ?>"><i class="fa fa-video-camera"></i> Video Gallery</a></li>
               
              </ul>
            </li>
            <li> <a href="<?php echo e(url('/admin/testimonial')); ?>"><i class="fa fa-commenting" ></i><span>Testimonials</span></a></li> 
            <li> <a href="<?php echo e(url('/admin/modules')); ?>"><i class="fa fa-cog" ></i><span>Modules</span></a></li>
                
              </ul>
            </li>
            <li>
              <a href="<?php echo e(url('/admin/employers')); ?>">
                <i class="fa fa-users"></i> <span>Employers</span>
              </a>
            </li>
             <li>
              <a href="<?php echo e(url('/admin/employees')); ?>">
                <i class="fa fa-users"></i> <span>Employees</span>
              </a>
            </li>

             <li>
              <a href="<?php echo e(url('/admin/jobs')); ?>">
                <i class="fa fa-briefcase"></i> <span>Jobs</span>
              </a>
            </li>

             <li>
              <a href="<?php echo e(url('/admin/trash')); ?>">
                <i class="fa fa-trash"></i> <span>Trash</span>
              </a>
            </li>
           
              <li><a href="<?php echo e(url('/admin/rprocess')); ?>"><i class="fa fa-circle-o"></i> Recuritment Process</a></li>
            <li><a href="<?php echo e(url('/admin/syllabus')); ?>"><i class="fa fa-circle-o"></i> Exam Syllabus</a></li>
            <li><a href="<?php echo e(url('/admin/email')); ?>"><i class="fa fa-envelope"></i> Email</a></li>
            <li><a href="<?php echo e(url('/admin/marketer')); ?>"><i class="fa fa-male"></i> Marketers</a></li>
           <li>
              <a href="<?php echo e(url('/admin/mcat_test')); ?>">
                <i class="fa fa-circle-o"></i> <span>Mcat Applications</span>
                <span class="pull-right-container">
                 
                 
                  <small class="label pull-right bg-red"><?php echo e(\App\McatTest::TotalUnread()); ?></small>
                </span>
              </a>
            </li>
          
           <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>HRIS</span> <i class="fa fa-angle-left pull-right"></i>
                
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo e(url('/admin/department')); ?>"><i class="fa fa-briefcase"></i> Departments</a></li>
                 <li><a href="<?php echo e(url('/admin/branch')); ?>"><i class="fa fa-circle-o"></i>Branch</a></li>
                <li><a href="<?php echo e(url('/admin/shifttime')); ?>"><i class="fa fa-circle-o"></i>Shift Timing</a></li>
               <li><a href="<?php echo e(url('/admin/otstaff')); ?>"><i class="fa fa-circle-o"></i>Staff</a></li>
                <li><a href="<?php echo e(url('/admin/adjustment_reason')); ?>"><i class="fa fa-circle-o"></i>Adjustment Reason</a></li>
                <li><a href="<?php echo e(url('/admin/otreason')); ?>"><i class="fa fa-circle-o"></i>Overtime Reason</a></li>
                <li><a href="<?php echo e(url('/admin/adjustment')); ?>"><i class="fa fa-circle-o"></i> Adjustment Request</a></li>
                <li><a href="<?php echo e(url('/admin/otrequest')); ?>"><i class="fa fa-circle-o"></i> Overtime Request</a></li>
               
              </ul>
            </li>

           
            
              <li>
              <a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off"></i> <span>Logout</span>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $__env->yieldContent('heading'); ?>
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

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2018 <a target="_blank" href="http://www.rollingplans.com.np">Rolling Plans Pvt. Ltd.</a></strong> All rights reserved.
      </footer>

      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
   
    
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
    <script src="<?php echo e(asset('assets/dist/js/demo.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/dist/js/select.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/dist/js/checkall.js')); ?>"></script>
     <script src="<?php echo e(asset('assets/dist/js/jquery_form.js')); ?>"></script>

    
  </body>
</html>
