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
                <li>
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
                <li class="active">
                  <a href="<?php echo e(route('staffs.td.notice')); ?>">Training Notice</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.td.material')); ?>">Training Material</a>
                </li>
              </ul>
            </div>
            <div class="tab-content">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th>Program</th>
                    <th>Publish Date</th>
                    <th>Submit Date</th>
                    <th>Description</th>
                    <th>Document</th>
                    <th>Training Status</th>
                    <th>Participation request</th>
                  </tr>
                  <tr>
                    <td>
                      <select id="filter_program" class="form-control">
                        <option value="">Select Program</option>
                        <?php foreach($programs as $program): ?>
                        <option value="<?php echo e($program->id); ?>" <?php if($program->id == $data['filter_program']): ?> selected <?php endif; ?>><?php echo e($program->title); ?></option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                    <td>
                      <input type="text" id="filter_start_date" class="form-control datepicker" value="<?php echo e($data['filter_start_date']); ?>" autocomplete="off" placeholder="<?php echo e(Date('Y-m-d')); ?>">
                    </td>
                    <td>
                      <input type="text" id="filter_end_date" class="form-control datepicker" value="<?php echo e($data['filter_end_date']); ?>" autocomplete="off" placeholder="<?php echo e(Date('Y-m-d')); ?>">
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <?php foreach($notices as $notice): ?>
                  <tr>
                    <td><?php echo e(\App\TrainingProgram::getTitle($notice->program_id)); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($notice->date)->format('d M, Y')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($notice->submit_date)->format('d M, Y')); ?></td>
                    <td><?php echo e(str_limit($notice->description, 50, 'read more..')); ?></td>
                    <td>
                      <?php if($notice->document): ?>
                      <a href="<?php echo e(asset('image/'.$notice->document)); ?>" target="_blank">
                            <img src="<?php echo e(asset('image/ms-word.png')); ?>" width="50px;">
                        </a>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php echo e(\App\TrainingStatus::getTitle($notice->status)); ?>

                    </td>
                    <td>
                      <button class="btn btn-info" type="button" onclick="openParticipationRequest(<?php echo e($notice->id); ?>)">
                        Participant Request 
                        <span class="badge bg-green">
                          <?php ($participants = \App\TrainingParticipant::getTrainingParticipantRequest($notice->training_id)); ?>
                          <?php echo e(count($participants)); ?>

                        </span>
                      </button>
                    </td>
                  </tr>
                  <div class="modal fade bd-example-modal-lg" id="participation_request_model<?php echo e($notice->id); ?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Participant Request for <?php echo e(\App\TrainingProgram::getTitle($notice->program_id)); ?></h4>
                        </div>
                        <div class="modal-body">

                          <div class="form-group">
                              <ul class="list-group">
                                <?php foreach($participants as $p): ?>
                                <li class="list-group-item">
                                  <?php echo e(\App\Adjustment_staff::getName($p->staff_id)); ?>

                                  <span class="label bg-green"><?php echo e(\App\TravelerPosition::getTitle($p->level)); ?></span>
                                  <button type="button" class="badge bg-blue" onclick="participantRequestActionBtn(<?php echo e($p->id); ?>,1)"><i class="fa fa-thumbs-up"></i></button>
                                  <button type="button" class="badge bg-red" onclick="participantRequestActionBtn(<?php echo e($p->id); ?>,2)"><i class="fa fa-thumbs-down"></i></button>
                                  <br>
                                  <?php echo e($p->description); ?>

                                </li>
                                <?php endforeach; ?>
                              </ul>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </table>
                <div class="text-center">
                  <?php echo e($notices->links()); ?>

                </div>
            </div>
          </div>
        </div>
    </div>
<div>
<script>
  function openParticipationRequest(id)
  {
    $('#participation_request_model'+id).modal('show');
  }
  function participantRequestActionBtn(id, status)
  {
    var token = $('input[name=\'_token\']').val();
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('staffs.td.notice.updateRequestStatus')); ?>",
        data: {
          _token : token,
          id : id,
          status : status,
        },
        cache: false,
        success: function(data){
          location.reload();
        },
        error: function(error){
          alert('failed')
        }
    });
  }
  $('#filter_program').change(function(){
    var program = $(this).val();
    var start_date = $('#filter_start_date').val();
    var end_date = $('#filter_end_date').val();
    var url = '<?php echo e(url("/staffs/td/notice?")); ?>';
    if(program != ''){
      url += '&filter_program='+program;
    }
    if(start_date != ''){
      url += '&filter_start_date='+start_date;
    }
    if(end_date != ''){
      url += '&filter_end_date='+end_date;
    }
    location = url;
  })
  $('#filter_start_date').datepicker({
    onSelect: function(date){
      var start_date = date;
      var end_date = $('#filter_end_date').val();
      var program = $('#filter_program').val();
      var url = '<?php echo e(url("/staffs/td/notice?")); ?>';
      if(program != ''){
        url += '&filter_program='+program;
      }
      if(start_date != ''){
        url += '&filter_start_date='+start_date;
      }
      if(end_date != ''){
        url += '&filter_end_date='+end_date;
      }
      location = url;
    }
  })
  $('#filter_end_date').datepicker({
    onSelect: function(date){
      var end_date = date;
      var start_date = $('#filter_start_date').val();
      var program = $('#filter_program').val();
      var url = '<?php echo e(url("/staffs/td/notice?")); ?>';
      if(program != ''){
        url += '&filter_program='+program;
      }
      if(start_date != ''){
        url += '&filter_start_date='+start_date;
      }
      if(end_date != ''){
        url += '&filter_end_date='+end_date;
      }
      location = url;
    }
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>