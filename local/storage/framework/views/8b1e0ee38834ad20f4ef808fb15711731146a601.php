<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rolling Access </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/beena.css')); ?>" media="all">
  <!-- <script src="<?php echo e(asset('assets/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script> -->
  <script src="<?php echo e(asset('assets/plugins/jQuery/jquery.min.js')); ?>"></script>
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
      <a href="<?php echo e(url('/branchadmin')); ?>" class="logo">
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

    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <section class="sidebar">
  <ul class="sidebar-menu">
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
        <li>
          <a href="<?php echo e(url('/branchadmin/calendar')); ?>">
            <i class="fa fa-clipboard"></i> <span>Calendar</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/branchadmin/drive')); ?>">
            <i class="fa fa-clipboard"></i> <span>Drive</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</section>
    </aside>
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        
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
        <span>Version</span> <span class="greenclr">2.3.0</span>
      </div>
      <span>Copyright &copy; 2014-<?php echo e(date('Y')); ?> <a target="_blank" class="greenclr"
          href="http://www.rollingplans.com.np">Rolling Plans Pvt. Ltd.</a>. All rights reserved.</span>
    </footer>
  </div><!-- ./wrapper -->
  
  <script src="<?php echo e(asset('assets/bootstrap/js/bootstrap.min.js')); ?>"></script>

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
        $('.main-sidebar').load('<?php echo e(url("/branchadmin/left_bar")); ?>');
    }
    $(document).ready(function(){
        
      loadlink();
      
    })

    loadlink(); // This will run on page load
    setInterval(function(){
        loadlink() // this will run after every 5 seconds
    }, 1000000000);
    
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
  <script>
    CKEDITOR.replace('document_descriptions')
    $('#addDocumentBtn').click(function(){
      $('#modal-add-document').modal('show');
    })
  </script>
</body>

</html>