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
                  <a  href="<?php echo e(route('staffs.mytraining.index')); ?>">Overview</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.mytraining.schedule')); ?>">Calendar/Schedule</a>
                </li>
                <li class="active">
                  <a href="<?php echo e(route('staffs.mytraining.notice')); ?>">Training Notice</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.mytraining.material')); ?>">Training Material</a>
                </li>
              </ul>
            </div>
            <div class="tab-content">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th>Program</th>
                    <th>Date</th>
                    <th>Submit Date</th>
                    <th>Description</th>
                    <th>Document</th>
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
                      <?php ($p_status = \App\TrainingParticipant::checkStaffApply($notice->training_id)); ?>
                      <?php if(isset($p_status->request_status)): ?>
                        <?php if($p_status->request_status == 0): ?>
                        <span class="badge bg-blue">Pending</span>
                        <?php elseif($p_status->request_status == 1): ?>
                        <span class="badge bg-green">Approved</span>
                        <?php elseif($p_status->request_status == 2): ?>
                        <span class="badge bg-red">DisApproved</span>
                        <?php else: ?>
                        <?php endif; ?>
                      <?php else: ?>
                        <?php if(\App\Training::getStatus($notice->training_id) == 1): ?>
                        <button type="button" class="btn btn-info" onclick="openParticipationRequest(<?php echo e($notice->id); ?>)">Intrested</button>
                        <?php else: ?>
                        <span class="badge bg-grey">Session over</span>
                        <?php endif; ?>
                      <?php endif; ?>
                    </td>
                  </tr>
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
                                <button type="button" class="btn btn-info" onclick="noticeIntrestedParticipant(<?php echo e($notice->id); ?>)">Submit</button>
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
                </table>
            </div>
          </div>
        </div>
    </div>
<div>
<script>
  var token = $('input[name=\'_token\']').val();
  function openParticipationRequest(id)
  {
    $('#modal-training-notice-'+id).modal('show');
  }
  function noticeIntrestedParticipant(id)
  {
    var training_id = $('#notice-training_id'+id).val()
    var level = $('#notice-level'+id).val()
    var description = $('#notice-description'+id).val()
    $.ajax({
      url: "<?php echo e(route('staffs.intrestedParticipantAction')); ?>",
      type: 'POST',
      data:{
          _token: token,
          training_id: training_id,
          level: level,
          description: description
      },
      dataType: 'JSON',
      success:function(data){
        // $('#modal-training-notice-'+id).modal('hide');
        location.reload();
      },
      error: function(error){
        alert('failed')
      }
    })
  }
  $('#filter_program').change(function(){
    var program = $(this).val();
    var start_date = $('#filter_start_date').val();
    var end_date = $('#filter_end_date').val();
    var url = '<?php echo e(url("/staffs/mytraining/notice?")); ?>';
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
      var url = '<?php echo e(url("/staffs/mytraining/notice?")); ?>';
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
      var url = '<?php echo e(url("/staffs/mytraining/notice?")); ?>';
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