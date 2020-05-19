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
    <!-- Font Awesome 
     <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/font-awesome.css')); ?>"> 
     -->

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
          <span class="logo-lg"><?php echo e(\App\Employers::getName(Auth::guard('employer')->user()->employers_id)); ?></span>
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
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
               <!-- User Account: style can fa fa-gears found in dropdown.less -->
              <li class="dropdown user user-menu">
                
               <a class="dropdown-item" href="<?php echo e(url('/employer/logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="<?php echo e(url('/employer/logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>

                                    </form>
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
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo e(asset(\App\EmployerUser::getImage(Auth::guard('employer')->user()->id))); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo e(Auth::guard('employer')->user()->name); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            
            <li class="treeview">
              <a href="<?php echo e(url('/employer')); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            
            </li>
            <?php if(Auth::guard('employer')->user()->user_type === 1): ?>
            <li>
              <a href="<?php echo e(url('/employer/company_profile')); ?>">
                <i class="fa fa-list-alt"></i> <span>Company Profile</span>
              </a>
            </li>
            <li>
              <a href="<?php echo e(url('/employer/members')); ?>">
                <i class="fa fa-users"></i> <span>Access Members</span>
              </a>
            </li>
            <?php endif; ?>
             <li>
              <a href="<?php echo e(url('/employer/profile')); ?>">
                <i class="fa fa-file-text"></i> <span>Your Profile</span>
              </a>
            </li>
             <li>
              <a href="<?php echo e(url('/employer/changepassword')); ?>">
                <i class="fa fa-key"></i> <span>Change Password</span>
              </a>
            </li>
            


             <li>
              <a href="<?php echo e(url('/employer/jobs')); ?>">
                <i class="fa fa-briefcase"></i> <span>Your Jobs</span>
              </a>
            </li>

            
           
             
            
          

           
            
              <li>
              <a href="" onclick="event.preventDefault();
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
         <strong>Copyright &copy; 2018 <a target="_blank" href="http://www.rollingplans.com.np">Rolling Plans Pvt. Ltd.</a>.</strong> All rights reserved.
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

    <script type="text/javascript">
      $('#btn_change').on('click', function() {
       
        $('#upload_form').remove();
        var url = "<?php echo e(url('/employer/uploadimage')); ?>";
        $('body').prepend('<form enctype="multipart/form-data" action="'+url+'" id="upload_form" method="POST" style="display: none;"><input type="file" id="file" name="file" value="" /><input type="text" name="_token" value="<?php echo e(csrf_token()); ?>" /></form>');

        $('#upload_form #file').trigger('click');
        if (typeof timer != 'undefined') {
              clearInterval(timer);
          }

          timer = setInterval(function() {
            if ($('#upload_form #file').val() != '') {
              clearInterval(timer);
                $('#upload_form').submit();
                }
          }, 500);

      });
    </script>


  </body>
</html>
