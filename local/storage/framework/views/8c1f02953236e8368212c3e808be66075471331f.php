<?php $__env->startSection('heading'); ?>
Travel Booking
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Travel Booking</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('staffs.travel.planner.create')); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-plus"></i>Add Travel Booking</a>
      </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <ul class="nav nav-tabs">
              <li class="" id="planner-booking">
                <a  href="#planner" data-toggle="tab">Ticket Planner</a>
              </li>
              <li id="approval-booking">
                <a href="#approval" data-toggle="tab">Waiting Approval <span class="badge bg-red"><?php echo e(\App\TravelPlanner::countWaitingApproval()); ?></span></a>
              </li>
            </ul>
        </div>
      <div class="box-body">
        <div class="tab-content ">
          <div class="tab-pane" id="planner">
            <table class="table table-bordered table-striped">
              <tr>
                <th>Ticket Id</th>
                <th>Type</th>
                <th>Supervisor</th>
                <th>HR</th>
                <th>Chairman</th>
                <th>Action</th>
              </tr>
              <?php foreach($planners as $planner): ?>
              <tr>
                <td><?php echo e(\App\Travel::getUniqueId($planner->travel_id)); ?></td>
                <td>
                  <?php echo e(\App\Travel::getType($planner->travel_id)); ?>

                </td>
                <td>
                    <?php if($planner->supervisor_approval == 1): ?>
                        <span class="label bg-green">Accept</span>
                    <?php elseif($planner->supervisor_approval == 2): ?>
                        <span class="label bg-red">Cancel</span>
                    <?php else: ?>
                        <span class="label bg-purple">Pending</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($planner->hr_approval == 1): ?>
                        <span class="label bg-green">Accept</span>
                    <?php elseif($planner->hr_approval == 2): ?>
                        <span class="label bg-red">Cancel</span>
                    <?php elseif($planner->account_approval == 1): ?>
                        <span class="label bg-purple">Pending</span>
                    <?php else: ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($planner->chairman_approval == 1): ?>
                        <span class="label bg-green">Accept</span>
                    <?php elseif($planner->chairman_approval == 2): ?>
                        <span class="label bg-red">Cancel</span>
                    <?php elseif($planner->hr_approval == 1): ?>
                        <span class="label bg-purple">Pending</span>
                    <?php else: ?>
                    <?php endif; ?>
                </td>
                <td>
                  <form action="<?php echo e(route('staffs.travel.planner.delete', $planner->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                    <a href="<?php echo e(route('staffs.travel.planner.show', $planner->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                    <a href="<?php echo e(route('staffs.travel.planner.edit', $planner->id)); ?>" class="btn bg-orange"><i class="fa fa-edit"></i></a>
                    <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                    <button type="button" class="btn bg-blue"><i class="fa fa-comments-o"></i></button>
                  </form>
                </td>
              </tr>
              <?php endforeach; ?>
            </table>
          </div>
          <div class="tab-pane" id="approval">
            <table class="table table-bordered table-striped">
              <tr>
                <th>Ticket Id</th>
                <th>Submitted By</th>
                <th>Type</th>
                <th>Supervisor</th>
                <th>HR</th>
                <th>Chairman</th>
                <th>Action</th>
              </tr>
            </table>
            <?php if($waiting_sapproval): ?>
            <?php foreach($waiting_sapproval as $planner): ?>
            <tr>
              <td><?php echo e(\App\Travel::getUniqueId($planner->travel_id)); ?></td>
              <td><?php echo e(\App\Adjustment_staff::getName($planner->staff_id)); ?></td>
              <td><?php echo e(\App\Travel::getType($planner->travel_id)); ?></td>
              <td>
                    <?php if($planner->supervisor_approval == 1): ?>
                        <span class="label bg-green">Accept</span>
                    <?php elseif($planner->supervisor_approval == 2): ?>
                        <span class="label bg-red">Cancel</span>
                    <?php else: ?>
                        <span class="label bg-purple">Pending</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($planner->hr_approval == 1): ?>
                        <span class="label bg-green">Accept</span>
                    <?php elseif($planner->hr_approval == 2): ?>
                        <span class="label bg-red">Cancel</span>
                    <?php elseif($planner->account_approval == 1): ?>
                        <span class="label bg-purple">Pending</span>
                    <?php else: ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($planner->chairman_approval == 1): ?>
                        <span class="label bg-green">Accept</span>
                    <?php elseif($planner->chairman_approval == 2): ?>
                        <span class="label bg-red">Cancel</span>
                    <?php elseif($planner->hr_approval == 1): ?>
                        <span class="label bg-purple">Pending</span>
                    <?php else: ?>
                    <?php endif; ?>
                </td>
                <td>
                  <form action="<?php echo e(route('staffs.travel.planner.supervisorApprove')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="planner_id" value="<?php echo e($planner->id); ?>">
                    <a href="<?php echo e(route('staffs.travel.planner.show', $planner->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                    <input type="submit" name="action" value="Approve" class="btn btn-info">
                    <input type="submit" name="action" value="Disapprove" class="btn btn-warning">
                  </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            <?php if($waiting_hrapproval): ?>
            <?php foreach($waiting_hrapproval as $planner): ?>
            <tr>
              <td><?php echo e(\App\Travel::getUniqueId($planner->travel_id)); ?></td>
              <td><?php echo e(\App\Adjustment_staff::getName($planner->staff_id)); ?></td>
              <td><?php echo e(\App\Travel::getType($planner->travel_id)); ?></td>
              <td>
                    <?php if($planner->supervisor_approval == 1): ?>
                        <span class="label bg-green">Accept</span>
                    <?php elseif($planner->supervisor_approval == 2): ?>
                        <span class="label bg-red">Cancel</span>
                    <?php else: ?>
                        <span class="label bg-purple">Pending</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($planner->hr_approval == 1): ?>
                        <span class="label bg-green">Accept</span>
                    <?php elseif($planner->hr_approval == 2): ?>
                        <span class="label bg-red">Cancel</span>
                    <?php elseif($planner->account_approval == 1): ?>
                        <span class="label bg-purple">Pending</span>
                    <?php else: ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($planner->chairman_approval == 1): ?>
                        <span class="label bg-green">Accept</span>
                    <?php elseif($planner->chairman_approval == 2): ?>
                        <span class="label bg-red">Cancel</span>
                    <?php elseif($planner->hr_approval == 1): ?>
                        <span class="label bg-purple">Pending</span>
                    <?php else: ?>
                    <?php endif; ?>
                </td>
                <td>
                  <form action="<?php echo e(route('supervisor.travel.planner.hrApprove')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="planner_id" value="<?php echo e($planner->id); ?>">
                    <a href="<?php echo e(route('staffs.travel.planner.show', $planner->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                    <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            <?php if($waiting_chapproval): ?>
            <?php foreach($waiting_chapproval as $planner): ?>
            <tr>
              <td><?php echo e(\App\Travel::getUniqueId($planner->travel_id)); ?></td>
              <td><?php echo e(\App\Adjustment_staff::getName($planner->staff_id)); ?></td>
              <td><?php echo e(\App\Travel::getType($planner->travel_id)); ?></td>
              <td>
                    <?php if($planner->supervisor_approval == 1): ?>
                        <span class="label bg-green">Accept</span>
                    <?php elseif($planner->supervisor_approval == 2): ?>
                        <span class="label bg-red">Cancel</span>
                    <?php else: ?>
                        <span class="label bg-purple">Pending</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($planner->hr_approval == 1): ?>
                        <span class="label bg-green">Accept</span>
                    <?php elseif($planner->hr_approval == 2): ?>
                        <span class="label bg-red">Cancel</span>
                    <?php elseif($planner->account_approval == 1): ?>
                        <span class="label bg-purple">Pending</span>
                    <?php else: ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($planner->chairman_approval == 1): ?>
                        <span class="label bg-green">Accept</span>
                    <?php elseif($planner->chairman_approval == 2): ?>
                        <span class="label bg-red">Cancel</span>
                    <?php elseif($planner->hr_approval == 1): ?>
                        <span class="label bg-purple">Pending</span>
                    <?php else: ?>
                    <?php endif; ?>
                </td>
                <td>
                  <form action="<?php echo e(route('supervisor.travel.planner.chairmanApprove')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="planner_id" value="<?php echo e($planner->id); ?>">
                    <a href="<?php echo e(route('staffs.travel.planner.show', $planner->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                    <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="accountTicketApproval">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                      aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Ticket Booking Status Update</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="" role="form" id="testform" method="POST">
                  <?php echo csrf_field(); ?>

                  <div id="obtype">
                      <div class="row" id="obtype_1">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label class="col-md-2 control-label">Remark</label>
                                  <div class="col-md-10">
                                      <input type="hidden" name="ticket_id" id="ticket_id">
                                      <input type="hidden" name="ticket_status" id="ticket_status">
                                      <textarea name="ticket_remark" id="ticket_remark" class="form-control"></textarea>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-md-2 control-label"></label>
                                  <div class="col-md-10">
                                      <input type="submit" class="btn btn-info" value="Submit">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
          <div class="modal-footer"></div>
      </div>
  </div>
</div>
<script>
  var tab = localStorage.getItem('booking-tab');
  if(tab == 'planner')
  {
    $('#planner').addClass("active");
    $('#planner-booking').addClass("active");
  }else if(tab == 'approval')
  {
    $('#approval').addClass("active");
    $('#approval-booking').addClass("active");
  }else
  {
    $('#planner').addClass("active");
    $('#planner-booking').addClass("active");
  }
  $('#planner-booking').click(function(){
    localStorage.setItem('booking-tab', 'planner')
  })
  $('#approval-booking').click(function(){
    localStorage.setItem('booking-tab', 'approval')
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>