<?php $__env->startSection('heading'); ?>
Training and Development
<small>Training and Development</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Training and Development</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div class="box-header with-border">
              <ul class="nav nav-tabs">
                <li class="active">
                  <a  href="<?php echo e(route('staffs.td.index')); ?>">Overview</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.td.schedule')); ?>">Calendar/Schedule</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.td.evaluation')); ?>">Feedback/Evaluation</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.td.cost')); ?>">Training Cost</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.td.notice')); ?>">Training Notice</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.td.material')); ?>">Training Material</a>
                </li>
              </ul>
            </div>
            <div class="tab-content">
              <div class="row">
                <div class="col-md-2">
                  <select name="filter_year" id="filter_year" class="form-control select2">
                    <option value="">Select Year</option>
                    <?php ($date = Date('Y')); ?>
                    <?php for($i=0;$i<10;$i++): ?>
                    <?php ($value = $date - $i); ?>
                    <option value="<?php echo e($value); ?>" <?php if($data['filter_year'] == $value): ?> selected <?php endif; ?>><?php echo e($value); ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
                <div class="col-md-2">
                  <select name="filter_month" id="filter_month" class="form-control select2">
                    <?php foreach($data['month'] as $k=>$month): ?>
                      <option value="<?php echo e($month['id']); ?>" <?php if($data['filter_month'] == $month['id']): ?> selected <?php endif; ?>><?php echo e($month['title']); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <select name="filter_program" id="filter_program" class="form-control select2">
                    <option value="">Select Program</option>
                    <?php foreach($programs as $program): ?>
                      <option value="<?php echo e($program->id); ?>" <?php if($data['filter_program'] == $program->id): ?> selected <?php endif; ?>><?php echo e($program->title); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <select name="filter_department" id="filter_department" class="form-control select2">
                    <option value="">Select Department</option>
                    <?php foreach($data['department'] as $department): ?>
                      <option value="<?php echo e($department->id); ?>" <?php if($data['filter_department'] == $department->id): ?> selected <?php endif; ?>><?php echo e($department->title); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-2"></div>
              </div>
              <div class="clearfix"><br></div>
              <table class="table table-bordered table-striped">
                <tr>
                  <th>Total Training Conducted</th>
                  <th>Total Invited Participant</th>
                  <th>Total Trained</th>
                  <?php /* <th>Total Active Employees of the Month</th> */ ?>
                  <th>Total Absent</th>
                  <th>Total Newly Trained Employee</th>
                  <th>Total Training Hour</th>
                </tr>
                <tr>
                  <td class="text-center">
                    <span style="font-size:30px;"><?php echo e($data['total_training']); ?></span>
                  </td>
                  <td class="text-center"><span style="font-size:30px;"><?php echo e($data['total_invited']); ?></span></td>
                  <td class="text-center"><span style="font-size:30px;"><?php echo e($data['total_trained']); ?></span></td>
                  <td class="text-center"><span style="font-size:30px;"><?php echo e($data['total_absent']); ?></span></td>
                  <td class="text-center"><span style="font-size:30px;"><?php echo e($data['total_newly_trained']); ?></span></td>
                  <td class="text-center"><span style="font-size:30px;"><?php echo e($data['total_training_hour']); ?></span></td>
                </tr>
              </table>
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Training Vs Participant Information</h4>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                      <i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <tr>
                      <th>Date</th>
                      <th>Program</th>
                      <th style="width:30%">Department</th>
                      <th>Total Invited</th>
                      <th>Total Trained</th>
                      <th>Total Absent</th>
                      <th>Man Hours</th>
                    </tr>
                    <?php foreach($data['overview_trainings'] as $training): ?>
                    <tr>
                      <td><?php echo e(\Carbon\Carbon::parse($training->from)->format('d M, Y')); ?></td>
                      <td><?php echo e(\App\TrainingProgram::getTitle($training->program_id)); ?></td>
                      <td>
                        <?php if($data['filter_department'] == 0): ?>
                        <?php ($departments = \App\TrainingParticipant::getParticipatedStaffDepartment($training->id)); ?>
                        <?php foreach($departments as $department): ?>
                        <span class="badge bg-blue"><?php echo e($department->title); ?></span>
                        <?php endforeach; ?>
                        <?php else: ?>
                          <span class="badge bg-blue"><?php echo e(\App\Department::getTitle($data['filter_department'])); ?></span>
                        <?php endif; ?>
                      </td>
                      <td><?php echo e($training->total_participant); ?></td>
                      <td><?php echo e(\App\TrainingParticipant::getTotalPresent($training->id, $data['filter_year'], $data['filter_month'], $data['filter_program'], $data['filter_department'])); ?></td>
                      <td><?php echo e(\App\TrainingParticipant::getTotalAbsent($training->id, $data['filter_year'], $data['filter_month'], $data['filter_program'], $data['filter_department'])); ?></td>
                      <td><?php echo e(\App\TrainingParticipant::getTotalPresent($training->id, $data['filter_year'], $data['filter_month'], $data['filter_program'], $data['filter_department']) * \App\TrainingItinery::getTotalDuration($training->id)); ?></td>
                    </tr>
                    <?php endforeach; ?>
                  </table>
                </div>
              </div>
              <?php /* charts */ ?>
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Charts</h4>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                      <i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <h4>Trained Staff By Department</h4>
                      <div class="chart" id="training-program-chart" style="height: 300px;"></div>
                    </div>
                    <div class="col-md-6">
                      <h4>Program vs Training</h4>
                      <div class="chart" id="training-program-chart2" style="height: 300px;"></div>
                    </div>
                  </div>
                </div>
              </div>
              <?php /* upcomming training  */ ?>
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Upcomming Training</h4>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                      <i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <table class="table table-borderd table-striped">
                      <tr>
                          <th>SN</th>
                          <th>Program</th>
                          <th>Trainer</th>
                          <th>From</th>
                          <th>To</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                      <?php foreach($up_training as $k=>$training): ?>
                      <tr>
                          <td><?php echo e($k+1); ?></td>
                          <td><?php echo e(\App\TrainingProgram::getTitle($training->program_id)); ?></td>
                          <td><?php echo e(\App\Trainer::getName($training->trainer_id)); ?></td>
                          <td><?php echo e(\Carbon\Carbon::parse($training->from)->format('d M, Y')); ?></td>
                          <td><?php echo e(\Carbon\Carbon::parse($training->to)->format('d M, Y')); ?></td>
                          <td>
                              <?php echo e(\App\TrainingStatus::getTitle($training->status)); ?>

                          </td>
                          <td>
                              <form action="<?php echo e(route('staffs.training.destroy', $training->id)); ?>" method="post">
                              <?php echo csrf_field(); ?>

                              <?php echo method_field('DELETE'); ?>

                                  <a href="<?php echo e(route('staffs.training.show', $training->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                  <a href="<?php echo e(route('staffs.training.edit', $training->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure?')"><i class="fa fa-trash"></i></button>
                              </form>
                          </td>
                      </tr>
                      <?php endforeach; ?>
                  </table>
                  <div class="text-center">
                    <?php echo e($up_training->links()); ?>

                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
    </div>
<div>
<script>
  $('.datepicker').datepicker();
</script>

<?php /* overview chart */ ?>
<link rel="stylesheet" href="<?php echo e(asset('/assets/moris/morris.css')); ?>">

<script src="<?php echo e(asset('/assets/moris/raphael-min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/moris/morris.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/chart.js/Chart.js')); ?>"></script>
<script>
  $(function(){
    var bar = new Morris.Bar({
      element: 'training-program-chart',
      resize: true,
      data: [
      <?php if($data['filter_department'] == 0): ?>
        <?php if(count($data['department']) > 0): ?>
        <?php foreach($data['department'] as $department): ?>
        <?php if(\App\TrainingParticipant::getPresentStaffCountByDept($department->id, $data['filter_year'], $data['filter_month'], $data['filter_program'])): ?>
        {
          department : '<?php echo e(addslashes(htmlspecialchars($department->title))); ?>',
          present : '<?php echo e(\App\TrainingParticipant::getPresentStaffCountByDept($department->id, $data['filter_year'], $data['filter_month'], $data['filter_program'])); ?>',
          absent : '<?php echo e(\App\TrainingParticipant::getAbsentStaffCountByDept($department->id, $data['filter_year'], $data['filter_month'], $data['filter_program'])); ?>',
        },
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
      <?php else: ?>
      {
        department : '<?php echo e(addslashes(htmlspecialchars(\App\Department::getTitle($data['filter_department'])))); ?>',
        present : '<?php echo e(\App\TrainingParticipant::getPresentStaffCountByDept($data['filter_department'], $data['filter_year'], $data['filter_month'], $data['filter_program'])); ?>',
        absent : '<?php echo e(\App\TrainingParticipant::getAbsentStaffCountByDept($data['filter_department'], $data['filter_year'], $data['filter_month'], $data['filter_program'])); ?>',
      }
      <?php endif; ?>
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'department',
      ykeys: ['present', 'absent'],
      labels: ['Present', 'Absent'],
      hideHover: 'auto',
      // xLabelAngle: '15',
    });
  })
</script>
<script>
  $(function(){
    var bar = new Morris.Bar({
      element: 'training-program-chart2',
      resize: true,
      data: [
        <?php if(count($programs) > 0): ?>
        <?php foreach($programs as $program): ?>
        <?php ($t_count = \App\Training::checkProgramTraining($program->id, $data['filter_year'], $data['filter_month'], $data['filter_program'], $data['filter_department'])); ?>
        <?php if($t_count): ?>
        {
          program : '<?php echo e(addslashes(htmlspecialchars($program->title))); ?>',
          training : '<?php echo e($t_count); ?>',
        },
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
      ],
      barColors: ['#008dcf'],
      xkey: 'program',
      ykeys: ['training'],
      labels: ['Training'],
      hideHover: 'auto',
      xLabelAngle: '45',
    });
  })
</script>

<script>
  $('#filter_year').change(function(){
    var year = $(this).val();
    var month = $('#filter_month').val();
    var program = $('#filter_program').val();
    var department = $('#filter_department').val();
    var url = '<?php echo e(url("/staffs/td/overview?")); ?>';
    if(year != '')
    {
      url += '&filter_year='+year
    }
    if(month != '')
    {
      url += '&filter_month='+month
    }
    if(program != '')
    {
      url += '&filter_program='+program
    }
    if(department != '')
    {
      url += '&filter_department='+department
    }
    location = url;
  })
</script>
<script>
  $('#filter_month').change(function(){
    var month = $(this).val();
    var year = $('#filter_year').val();
    var program = $('#filter_program').val();
    var department = $('#filter_department').val();
    var url = '<?php echo e(url("/staffs/td/overview?")); ?>';
    if(year != '')
    {
      url += '&filter_year='+year
    }
    if(month != '')
    {
      url += '&filter_month='+month
    }
    if(program != '')
    {
      url += '&filter_program='+program
    }
    if(department != '')
    {
      url += '&filter_department='+department
    }
    location = url;
  })
</script>
<script>
  $('#filter_program').change(function(){
    var program = $(this).val();
    var year = $('#filter_year').val();
    var month = $('#filter_month').val();
    var department = $('#filter_department').val();
    var url = '<?php echo e(url("/staffs/td/overview?")); ?>';
    if(year != '')
    {
      url += '&filter_year='+year
    }
    if(month != '')
    {
      url += '&filter_month='+month
    }
    if(program != '')
    {
      url += '&filter_program='+program
    }
    if(department != '')
    {
      url += '&filter_department='+department
    }
    location = url;
  })
</script>
<script>
  $('#filter_department').change(function(){
    var department = $(this).val();
    var year = $('#filter_year').val();
    var month = $('#filter_month').val();
    var program = $('#filter_program').val();
    var url = '<?php echo e(url("/staffs/td/overview?")); ?>';
    if(year != '')
    {
      url += '&filter_year='+year
    }
    if(month != '')
    {
      url += '&filter_month='+month
    }
    if(program != '')
    {
      url += '&filter_program='+program
    }
    if(department != '')
    {
      url += '&filter_department='+department
    }
    location = url;
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>