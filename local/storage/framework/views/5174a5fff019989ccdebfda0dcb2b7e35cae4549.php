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
      </ul>
    </li>
  </ul>
</section>