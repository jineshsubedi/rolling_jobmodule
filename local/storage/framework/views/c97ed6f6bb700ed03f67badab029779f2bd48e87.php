<?php $__env->startSection('heading'); ?>
Travel Request
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Travel Request</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        
      </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <div class="box-header with-border">
            <ul class="nav nav-tabs">
              <li class="" id="travel-report">
                <a  href="#report" data-toggle="tab">Travel Report</a>
              </li>
              <li id="travel-settlement">
                <a href="#settlement" data-toggle="tab">Waiting for Settlement <span class="badge bg-red"><?php echo e(\App\Travel::countExpenseApprovalWaiting()); ?></span></a>
              </li>
            </ul>
        </div>
        </div>
      <div class="box-body">
        <div class="tab-content">
          <div class="tab-pane" id="settlement">
            <table class="table table-borderd">
                <tr>
                    <th>Staff</th>
                    <th>Type</th>
                    <th>Departure Date</th>
                    <th>Arrival Date</th>
                    <th>Assignment Type</th>
                    <th>Assignment Purpose</th>
                    <th>Total Expense</th>
                    <th>Action</th>
                </tr>
                <?php if(isset($waiting_sapproval)): ?>
                <?php foreach($waiting_sapproval as $k=>$travel): ?>
                <tr>
                    <td><?php echo e(\App\Adjustment_staff::getName($travel->assigned_to)); ?></td>
                    <td><?php echo e(ucwords($travel->type)); ?></td>
                    <td>
                      <?php echo e(\Carbon\Carbon::parse($travel->from)->format('d M, Y')); ?>

                    </td>
                    <td>
                      <?php echo e(\Carbon\Carbon::parse($travel->to)->format('d M, Y')); ?>

                    </td>
                    <td>
                      <?php echo e(\App\TravelAssignmentType::getTitle($travel->assignment_type)); ?>

                    </td>
                    <td>
                      <?php echo e(\App\TravelAssignmentCategory::getTitle($travel->assignment_category)); ?>

                    </td>
                    <td>
                      <?php echo e(\App\TravelExpense::getTotalExpense($travel->id)); ?>

                    </td>
                    <td>
                        <a href="<?php echo e(route('branchadmin.travel.show', $travel->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="javascript:void(0)" class="btn btn-info" onclick="supervisorAapproveModel(<?php echo e($travel->id); ?>, 1)"><i class="fa fa-thumbs-up"></i></a>
                        <a href="javascript:void(0)" class="btn btn-warning" onclick="supervisorAapproveModel(<?php echo e($travel->id); ?>, 2)"><i class="fa fa-thumbs-down"></i></a>
                        <button type="button" class="btn btn-info" onclick="openSupervisorTravelChat(<?php echo e($travel->id); ?>)">
                                <i class="fa fa-reply"></i>
                                <span class="label bg-blue"><?php echo e(\App\TravelReply::countreply($travel->id)); ?></span>
                        </button>
                    </td>
                </tr>
                <?php /* reply for this row */ ?>
                <tr id="supervisorApprovalRequest<?php echo e($travel->id); ?>" style="display: none;">
                    <td colspan="12">
                      <div class="row mb10">
                        <div class="col-md-12">
                          <div class="suggestion_message bg-light-blue disabled">
                            <?php echo $travel->purpose;?>
                          </div>
                        </div>
                      </div>

                      <?php ($travelreply = \App\TravelReply::where('travel_id', $travel->id)->get()); ?>
                      <?php if(count($travelreply) > 0): ?>
                      <?php foreach($travelreply as $reply): ?>
                      <div class="row reply-row mb10">
                        <div class="col-md-2 col-sm-4 center">
                          <?php ($class=""); ?>
                          <?php ($text_class = 'bg-gray disabled'); ?>
                          <?php if(auth()->guard('staffs')->user()->id == $reply->reply_by): ?>
                          <?php ($class="blue"); ?>
                          <?php ($text_class = 'bg-light-blue'); ?>
                          <div class="suggestion_image">
                            <img src="<?php echo e(\App\Adjustment_staff::getImage($reply->reply_by)); ?>" class="img-circle">
                          </div>
                          <p>
                            <center class="<?php echo e($class); ?>"><strong><?php echo e(\App\Adjustment_staff::getName($reply->reply_by)); ?></strong>
                            </center>
                          </p>
                            <?php else: ?>
                          <div class="suggestion_image">
                            <img src="<?php echo e(\App\Adjustment_staff::getImage($reply->reply_by)); ?>" class="img-circle">
                          </div>
                          <p>
                            <center class="<?php echo e($class); ?>"><strong><?php echo e(\App\Adjustment_staff::getName($reply->reply_by)); ?></strong>
                            </center>
                          </p>
                          <?php endif; ?>
                          <p>
                            <center><?php echo e($reply->created_at); ?></center>
                          </p>
                        </div>
                        <div class="col-md-10 col-sm-8 ">
                          <div class="suggestion_message  <?php echo e($text_class); ?>"><?php echo $reply->detail;?></div>
                          <?php if($reply->reply_by == auth()->guard('staffs')->user()->id): ?>
                          <button type="button" onclick="deleteReply('<?php echo e($reply->id); ?>')"
                            class="delete_button btn btn-danger"><i class="fa fa-trash"></i></button>
                          <?php endif; ?>
                        </div>
                      </div>
                      <?php endforeach; ?>
                      <?php endif; ?>

                      <div class="row">
                        <div class="col-md-2 col-sm-4 center">
                          <div class="suggestion_image">
                            <img src="<?php echo e(\App\Adjustment_staff::getImage(auth()->guard('staffs')->user()->id)); ?>"
                              class="img-circle">
                          </div>
                          <p>
                            <center><strong><?php echo e(\App\Adjustment_staff::getName(auth()->guard('staffs')->user()->id)); ?></strong>
                            </center>
                          </p>
                        </div>
                        <div class="col-md-9 col-sm-6 ">
                          <textarea id="reply_detail_<?php echo e($travel->id); ?>" class="form-control" placeholder="Reply Detail"></textarea>
                        </div>
                        <div class="col-md-1 col-sm-2" col-sm-2>
                          <button type="button" class="btn btn-success" onclick="submitReply('<?php echo e($travel->id); ?>')">Reply</button>
                        </div>
                      </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>

                <?php if(isset($waiting_accountapproval)): ?>
                <?php foreach($waiting_accountapproval as $k=>$travel): ?>
                <tr>
                    <td><?php echo e(\App\Adjustment_staff::getName($travel->assigned_to)); ?></td>
                    <td><?php echo e(ucwords($travel->type)); ?></td>
                    <td>
                      <?php echo e(\Carbon\Carbon::parse($travel->from)->format('d M, Y')); ?>

                    </td>
                    <td>
                      <?php echo e(\Carbon\Carbon::parse($travel->to)->format('d M, Y')); ?>

                    </td>
                    <td>
                      <?php echo e(\App\TravelAssignmentType::getTitle($travel->assignment_type)); ?>

                    </td>
                    <td>
                      <?php echo e(\App\TravelAssignmentCategory::getTitle($travel->assignment_category)); ?>

                    </td>
                    <td>
                      <?php echo e(\App\TravelExpense::getTotalExpense($travel->id)); ?>

                    </td>
                    <td>
                        <a href="<?php echo e(route('branchadmin.travel.show', $travel->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="javascript:void(0)" class="btn btn-info" onclick="accountAapproveModel(<?php echo e($travel->id); ?>, 1)"><i class="fa fa-thumbs-up"></i></a>
                        <a href="javascript:void(0)" class="btn btn-warning" onclick="accountAapproveModel(<?php echo e($travel->id); ?>, 2)"><i class="fa fa-thumbs-down"></i></a>
                        <button type="button" class="btn btn-info" onclick="openAccountTravelChat(<?php echo e($travel->id); ?>)">
                                <i class="fa fa-reply"></i>
                                <span class="label bg-blue"><?php echo e(\App\TravelReply::countreply($travel->id)); ?></span>
                        </button>
                    </td>
                </tr>
                <?php /* reply for this row */ ?>
                <tr id="accountApprovalRequest<?php echo e($travel->id); ?>" style="display: none;">
                    <td colspan="12">
                      <div class="row mb10">
                        <div class="col-md-12">
                          <div class="suggestion_message bg-light-blue disabled">
                            <?php echo $travel->purpose;?>
                          </div>
                        </div>
                      </div>

                      <?php ($travelreply = \App\TravelReply::where('travel_id', $travel->id)->get()); ?>
                      <?php if(count($travelreply) > 0): ?>
                      <?php foreach($travelreply as $reply): ?>
                      <div class="row reply-row mb10">
                        <div class="col-md-2 col-sm-4 center">
                          <?php ($class=""); ?>
                          <?php ($text_class = 'bg-gray disabled'); ?>
                          <?php if(auth()->guard('staffs')->user()->id == $reply->reply_by): ?>
                          <?php ($class="blue"); ?>
                          <?php ($text_class = 'bg-light-blue'); ?>
                          <div class="suggestion_image">
                            <img src="<?php echo e(\App\Adjustment_staff::getImage($reply->reply_by)); ?>" class="img-circle">
                          </div>
                          <p>
                            <center class="<?php echo e($class); ?>"><strong><?php echo e(\App\Adjustment_staff::getName($reply->reply_by)); ?></strong>
                            </center>
                          </p>
                            <?php else: ?>
                          <div class="suggestion_image">
                            <img src="<?php echo e(\App\Adjustment_staff::getImage($reply->reply_by)); ?>" class="img-circle">
                          </div>
                          <p>
                            <center class="<?php echo e($class); ?>"><strong><?php echo e(\App\Adjustment_staff::getName($reply->reply_by)); ?></strong>
                            </center>
                          </p>
                          <?php endif; ?>
                          <p>
                            <center><?php echo e($reply->created_at); ?></center>
                          </p>
                        </div>
                        <div class="col-md-10 col-sm-8 ">
                          <div class="suggestion_message  <?php echo e($text_class); ?>"><?php echo $reply->detail;?></div>
                          <?php if($reply->reply_by == auth()->guard('staffs')->user()->id): ?>
                          <button type="button" onclick="deleteReply('<?php echo e($reply->id); ?>')"
                            class="delete_button btn btn-danger"><i class="fa fa-trash"></i></button>
                          <?php endif; ?>
                        </div>
                      </div>
                      <?php endforeach; ?>
                      <?php endif; ?>

                      <div class="row">
                        <div class="col-md-2 col-sm-4 center">
                          <div class="suggestion_image">
                            <img src="<?php echo e(\App\Adjustment_staff::getImage(auth()->guard('staffs')->user()->id)); ?>"
                              class="img-circle">
                          </div>
                          <p>
                            <center><strong><?php echo e(\App\Adjustment_staff::getName(auth()->guard('staffs')->user()->id)); ?></strong>
                            </center>
                          </p>
                        </div>
                        <div class="col-md-9 col-sm-6 ">
                          <textarea id="reply_detail_<?php echo e($travel->id); ?>" class="form-control" placeholder="Reply Detail"></textarea>
                        </div>
                        <div class="col-md-1 col-sm-2" col-sm-2>
                          <button type="button" class="btn btn-success" onclick="submitReply('<?php echo e($travel->id); ?>')">Reply</button>
                        </div>
                      </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>

                <?php if(isset($waiting_hrapproval)): ?>
                <?php foreach($waiting_hrapproval as $k=>$travel): ?>
                <tr>
                    <td><?php echo e(\App\Adjustment_staff::getName($travel->assigned_to)); ?></td>
                    <td><?php echo e(ucwords($travel->type)); ?></td>
                    <td>
                      <?php echo e(\Carbon\Carbon::parse($travel->from)->format('d M, Y')); ?>

                    </td>
                    <td>
                      <?php echo e(\Carbon\Carbon::parse($travel->to)->format('d M, Y')); ?>

                    </td>
                    <td>
                      <?php echo e(\App\TravelAssignmentType::getTitle($travel->assignment_type)); ?>

                    </td>
                    <td>
                      <?php echo e(\App\TravelAssignmentCategory::getTitle($travel->assignment_category)); ?>

                    </td>
                    <td>
                      <?php echo e(\App\TravelExpense::getTotalExpense($travel->id)); ?>

                    </td>
                    <td>
                        <a href="<?php echo e(route('branchadmin.travel.show', $travel->id)); ?>" class="btn btn-info" target="_blank"><i class="fa fa-eye"></i></a>
                        <a href="javascript:void(0)" class="btn btn-info" onclick="hrAapproveModel(<?php echo e($travel->id); ?>, 1)"><i class="fa fa-thumbs-up"></i></a>
                        <a href="javascript:void(0)" class="btn btn-warning" onclick="hrAapproveModel(<?php echo e($travel->id); ?>, 2)"><i class="fa fa-thumbs-down"></i></a>
                        <button type="button" class="btn btn-info" onclick="openHrTravelChat(<?php echo e($travel->id); ?>)">
                                <i class="fa fa-reply"></i>
                                <span class="label bg-blue"><?php echo e(\App\TravelReply::countreply($travel->id)); ?></span>
                        </button>
                    </td>
                </tr>
                <?php /* reply for this row */ ?>
                <tr id="hrApprovalRequest<?php echo e($travel->id); ?>" style="display: none;">
                    <td colspan="12">
                      <div class="row mb10">
                        <div class="col-md-12">
                          <div class="suggestion_message bg-light-blue disabled">
                            <?php echo $travel->purpose;?>
                          </div>
                        </div>
                      </div>

                      <?php ($travelreply = \App\TravelReply::where('travel_id', $travel->id)->get()); ?>
                      <?php if(count($travelreply) > 0): ?>
                      <?php foreach($travelreply as $reply): ?>
                      <div class="row reply-row mb10">
                        <div class="col-md-2 col-sm-4 center">
                          <?php ($class=""); ?>
                          <?php ($text_class = 'bg-gray disabled'); ?>
                          <?php if(auth()->guard('staffs')->user()->id == $reply->reply_by): ?>
                          <?php ($class="blue"); ?>
                          <?php ($text_class = 'bg-light-blue'); ?>
                          <div class="suggestion_image">
                            <img src="<?php echo e(\App\Adjustment_staff::getImage($reply->reply_by)); ?>" class="img-circle">
                          </div>
                          <p>
                            <center class="<?php echo e($class); ?>"><strong><?php echo e(\App\Adjustment_staff::getName($reply->reply_by)); ?></strong>
                            </center>
                          </p>
                            <?php else: ?>
                          <div class="suggestion_image">
                            <img src="<?php echo e(\App\Adjustment_staff::getImage($reply->reply_by)); ?>" class="img-circle">
                          </div>
                          <p>
                            <center class="<?php echo e($class); ?>"><strong><?php echo e(\App\Adjustment_staff::getName($reply->reply_by)); ?></strong>
                            </center>
                          </p>
                          <?php endif; ?>
                          <p>
                            <center><?php echo e($reply->created_at); ?></center>
                          </p>
                        </div>
                        <div class="col-md-10 col-sm-8 ">
                          <div class="suggestion_message  <?php echo e($text_class); ?>"><?php echo $reply->detail;?></div>
                          <?php if($reply->reply_by == auth()->guard('staffs')->user()->id): ?>
                          <button type="button" onclick="deleteReply('<?php echo e($reply->id); ?>')"
                            class="delete_button btn btn-danger"><i class="fa fa-trash"></i></button>
                          <?php endif; ?>
                        </div>
                      </div>
                      <?php endforeach; ?>
                      <?php endif; ?>

                      <div class="row">
                        <div class="col-md-2 col-sm-4 center">
                          <div class="suggestion_image">
                            <img src="<?php echo e(\App\Adjustment_staff::getImage(auth()->guard('staffs')->user()->id)); ?>"
                              class="img-circle">
                          </div>
                          <p>
                            <center><strong><?php echo e(\App\Adjustment_staff::getName(auth()->guard('staffs')->user()->id)); ?></strong>
                            </center>
                          </p>
                        </div>
                        <div class="col-md-9 col-sm-6 ">
                          <textarea id="reply_detail_<?php echo e($travel->id); ?>" class="form-control" placeholder="Reply Detail"></textarea>
                        </div>
                        <div class="col-md-1 col-sm-2" col-sm-2>
                          <button type="button" class="btn btn-success" onclick="submitReply('<?php echo e($travel->id); ?>')">Reply</button>
                        </div>
                      </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>

                <?php if(isset($waiting_chapproval)): ?>
                <?php foreach($waiting_chapproval as $k=>$travel): ?>
                <tr>
                    <td><?php echo e(\App\Adjustment_staff::getName($travel->assigned_to)); ?></td>
                    <td><?php echo e(ucwords($travel->type)); ?></td>
                    <td>
                      <?php echo e(\Carbon\Carbon::parse($travel->from)->format('d M, Y')); ?>

                    </td>
                    <td>
                      <?php echo e(\Carbon\Carbon::parse($travel->to)->format('d M, Y')); ?>

                    </td>
                    <td>
                      <?php echo e(\App\TravelAssignmentType::getTitle($travel->assignment_type)); ?>

                    </td>
                    <td>
                      <?php echo e(\App\TravelAssignmentCategory::getTitle($travel->assignment_category)); ?>

                    </td>
                    <td>
                      <?php echo e(\App\TravelExpense::getTotalExpense($travel->id)); ?>

                    </td>
                    <td>
                        <a href="<?php echo e(route('branchadmin.travel.show', $travel->id)); ?>" class="btn btn-info" target="_blank"><i class="fa fa-eye"></i></a>
                        <a href="javascript:void(0)" class="btn btn-info" onclick="chairmanAapproveModel(<?php echo e($travel->id); ?>, 1)"><i class="fa fa-thumbs-up"></i></a>
                        <a href="javascript:void(0)" class="btn btn-warning" onclick="chairmanAapproveModel(<?php echo e($travel->id); ?>, 2)"><i class="fa fa-thumbs-down"></i></a>
                        <button type="button" class="btn btn-info" onclick="openChairmanTravelChat(<?php echo e($travel->id); ?>)">
                                <i class="fa fa-reply"></i>
                                <span class="label bg-blue"><?php echo e(\App\TravelReply::countreply($travel->id)); ?></span>
                        </button>
                    </td>
                </tr>
                <?php /* reply for this row */ ?>
                <tr id="chairmanApprovalRequest<?php echo e($travel->id); ?>" style="display: none;">
                    <td colspan="12">
                      <div class="row mb10">
                        <div class="col-md-12">
                          <div class="suggestion_message bg-light-blue disabled">
                            <?php echo $travel->purpose;?>
                          </div>
                        </div>
                      </div>

                      <?php ($travelreply = \App\TravelReply::where('travel_id', $travel->id)->get()); ?>
                      <?php if(count($travelreply) > 0): ?>
                      <?php foreach($travelreply as $reply): ?>
                      <div class="row reply-row mb10">
                        <div class="col-md-2 col-sm-4 center">
                          <?php ($class=""); ?>
                          <?php ($text_class = 'bg-gray disabled'); ?>
                          <?php if(auth()->guard('staffs')->user()->id == $reply->reply_by): ?>
                          <?php ($class="blue"); ?>
                          <?php ($text_class = 'bg-light-blue'); ?>
                          <div class="suggestion_image">
                            <img src="<?php echo e(\App\Adjustment_staff::getImage($reply->reply_by)); ?>" class="img-circle">
                          </div>
                          <p>
                            <center class="<?php echo e($class); ?>"><strong><?php echo e(\App\Adjustment_staff::getName($reply->reply_by)); ?></strong>
                            </center>
                          </p>
                            <?php else: ?>
                          <div class="suggestion_image">
                            <img src="<?php echo e(\App\Adjustment_staff::getImage($reply->reply_by)); ?>" class="img-circle">
                          </div>
                          <p>
                            <center class="<?php echo e($class); ?>"><strong><?php echo e(\App\Adjustment_staff::getName($reply->reply_by)); ?></strong>
                            </center>
                          </p>
                          <?php endif; ?>
                          <p>
                            <center><?php echo e($reply->created_at); ?></center>
                          </p>
                        </div>
                        <div class="col-md-10 col-sm-8 ">
                          <div class="suggestion_message  <?php echo e($text_class); ?>"><?php echo $reply->detail;?></div>
                          <?php if($reply->reply_by == auth()->guard('staffs')->user()->id): ?>
                          <button type="button" onclick="deleteReply('<?php echo e($reply->id); ?>')"
                            class="delete_button btn btn-danger"><i class="fa fa-trash"></i></button>
                          <?php endif; ?>
                        </div>
                      </div>
                      <?php endforeach; ?>
                      <?php endif; ?>

                      <div class="row">
                        <div class="col-md-2 col-sm-4 center">
                          <div class="suggestion_image">
                            <img src="<?php echo e(\App\Adjustment_staff::getImage(auth()->guard('staffs')->user()->id)); ?>"
                              class="img-circle">
                          </div>
                          <p>
                            <center><strong><?php echo e(\App\Adjustment_staff::getName(auth()->guard('staffs')->user()->id)); ?></strong>
                            </center>
                          </p>
                        </div>
                        <div class="col-md-9 col-sm-6 ">
                          <textarea id="reply_detail_<?php echo e($travel->id); ?>" class="form-control" placeholder="Reply Detail"></textarea>
                        </div>
                        <div class="col-md-1 col-sm-2" col-sm-2>
                          <button type="button" class="btn btn-success" onclick="submitReply('<?php echo e($travel->id); ?>')">Reply</button>
                        </div>
                      </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </table>
            <div class="text-center">
                <?php /* <?php echo e($waiting_sapproval->links()); ?> */ ?>
            </div>
          </div>
          <div class="tab-pane" id="report">
            <table class="table table-borderd table-striped">
              <tr>
                <th rowspan="2">ID</th>
                <th rowspan="2">Type</th>
                <th rowspan="2">Assigned From</th>
                <th rowspan="2">Assigned To</th>
                <th rowspan="2">Assignment</th>
                <th colspan="2">Supervisor</th>
                <th colspan="2">Account</th>
                <th colspan="2">HR</th>
                <th colspan="2">Chairman</th>
                <th rowspan="2">Action</th>
              </tr>
              <tr>
                <td>Request</td>
                <td>settlement</td>
                <td>Request</td>
                <td>settlement</td>
                <td>Request</td>
                <td>settlement</td>
                <td>Request</td>
                <td>settlement</td>
              </tr>
              <?php foreach($travels as $travel): ?>
              <tr>
                <td><?php echo e($travel->unique_id); ?></td>
                <td><?php echo e(ucwords($travel->type)); ?></td>
                <td><?php echo e(\App\Adjustment_staff::getName($travel->assigned_from)); ?></td>
                <td><?php echo e(\App\Adjustment_staff::getName($travel->assigned_to)); ?></td>
                <td><?php echo e(\App\TravelAssignmentType::getTitle($travel->assignment_type)); ?> - <?php echo e(\App\TravelAssignmentCategory::getTitle($travel->assignment_category)); ?></td>
                <td>
                  <?php if($travel->supervisor_approval == 1): ?>
                      <span class="label bg-green">Accept</span>
                  <?php elseif($travel->supervisor_approval == 2): ?>
                      <span class="label bg-red">Cancel</span>
                  <?php else: ?>
                      <span class="label bg-purple">Pending</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if($travel->supervisor_expense_approval == 1): ?>
                      <span class="label bg-green">Accept</span>
                  <?php elseif($travel->supervisor_expense_approval == 2): ?>
                      <span class="label bg-red">Cancel</span>
                  <?php else: ?>
                      <span class="label bg-purple">Pending</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if($travel->account_approval == 1): ?>
                      <span class="label bg-green">Accept</span>
                  <?php elseif($travel->account_approval == 2): ?>
                      <span class="label bg-red">Cancel</span>
                  <?php else: ?>
                      <span class="label bg-purple">Pending</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if($travel->account_expense_approval == 1): ?>
                      <span class="label bg-green">Accept</span>
                  <?php elseif($travel->account_expense_approval == 2): ?>
                      <span class="label bg-red">Cancel</span>
                  <?php else: ?>
                      <span class="label bg-purple">Pending</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if($travel->hr_approval == 1): ?>
                      <span class="label bg-green">Accept</span>
                  <?php elseif($travel->hr_approval == 2): ?>
                      <span class="label bg-red">Cancel</span>
                  <?php else: ?>
                      <span class="label bg-purple">Pending</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if($travel->hr_expense_approval == 1): ?>
                      <span class="label bg-green">Accept</span>
                  <?php elseif($travel->hr_expense_approval == 2): ?>
                      <span class="label bg-red">Cancel</span>
                  <?php else: ?>
                      <span class="label bg-purple">Pending</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if($travel->chairman_approval == 1): ?>
                      <span class="label bg-green">Accept</span>
                  <?php elseif($travel->chairman_approval == 2): ?>
                      <span class="label bg-red">Cancel</span>
                  <?php else: ?>
                      <span class="label bg-purple">Pending</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if($travel->chairman_expense_approval == 1): ?>
                      <span class="label bg-green">Accept</span>
                  <?php elseif($travel->chairman_expense_approval == 2): ?>
                      <span class="label bg-red">Cancel</span>
                  <?php else: ?>
                      <span class="label bg-purple">Pending</span>
                  <?php endif; ?>
                </td>
                <td>
                  <form action="<?php echo e(route('branchadmin.travel.destroy', $travel->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                    <a href="<?php echo e(route('branchadmin.travel.show', $travel->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                    <?php if($travel->assigned_to == auth()->guard('staffs')->user()->id || $travel->assigned_from == auth()->guard('staffs')->user()->id): ?>
                        <a href="<?php echo e(route('branchadmin.travel.edit', $travel->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo e(route('branchadmin.travelExpense.create', $travel->id)); ?>" class="btn btn-info"><i class="fa fa-money"> Add</i></a>
                        <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                    <?php endif; ?>
                        <button type="button" class="btn btn-info" onclick="openTravelReportChat(<?php echo e($travel->id); ?>)">
                            <i class="fa fa-reply"></i>
                            <span class="label bg-blue"><?php echo e(\App\TravelReply::countreply($travel->id)); ?></span>
                        </button>
                  </form>
                </td>
              </tr>
              <tr id="staffTravelReport<?php echo e($travel->id); ?>" style="display: none;">
                  <td colspan="14">
                    <div class="row mb10">
                      <div class="col-md-12">
                        <div class="suggestion_message bg-light-blue disabled">
                          <?php echo $travel->purpose;?>
                        </div>
                      </div>
                    </div>
                    <?php ($travelreply = \App\TravelReply::where('travel_id', $travel->id)->get()); ?>
                    <?php if(count($travelreply) > 0): ?>
                    <?php foreach($travelreply as $reply): ?>
                    <div class="row reply-row mb10">
                      <div class="col-md-2 col-sm-4 center">
                        <?php ($class=""); ?>
                        <?php ($text_class = 'bg-gray disabled'); ?>
                        <?php if(auth()->guard('staffs')->user()->id == $reply->reply_by): ?>
                        <?php ($class="blue"); ?>
                        <?php ($text_class = 'bg-light-blue'); ?>
                        <div class="suggestion_image">
                          <img src="<?php echo e(\App\Adjustment_staff::getImage($reply->reply_by)); ?>" class="img-circle">
                        </div>
                        <p>
                          <center class="<?php echo e($class); ?>"><strong><?php echo e(\App\Adjustment_staff::getName($reply->reply_by)); ?></strong>
                          </center>
                        </p>
                          <?php else: ?>
                        <div class="suggestion_image">
                          <img src="<?php echo e(\App\Adjustment_staff::getImage($reply->reply_by)); ?>" class="img-circle">
                        </div>
                        <p>
                          <center class="<?php echo e($class); ?>"><strong><?php echo e(\App\Adjustment_staff::getName($reply->reply_by)); ?></strong>
                          </center>
                        </p>
                        <?php endif; ?>
                        <p>
                          <center><?php echo e($reply->created_at); ?></center>
                        </p>
                      </div>
                      <div class="col-md-10 col-sm-8 ">
                        <div class="suggestion_message  <?php echo e($text_class); ?>"><?php echo $reply->detail;?></div>
                        <?php if($reply->reply_by == auth()->guard('staffs')->user()->id): ?>
                        <button type="button" onclick="deleteReply('<?php echo e($reply->id); ?>')"
                          class="delete_button btn btn-danger"><i class="fa fa-trash"></i></button>
                        <?php endif; ?>
                      </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>

                    <div class="row">
                      <div class="col-md-2 col-sm-4 center">
                        <div class="suggestion_image">
                          <img src="<?php echo e(\App\Adjustment_staff::getImage(auth()->guard('staffs')->user()->id)); ?>"
                            class="img-circle">
                        </div>
                        <p>
                          <center><strong><?php echo e(\App\Adjustment_staff::getName(auth()->guard('staffs')->user()->id)); ?></strong>
                          </center>
                        </p>
                      </div>
                      <div class="col-md-9 col-sm-6 ">
                        <textarea id="reply_report_detail_<?php echo e($travel->id); ?>" class="form-control" placeholder="Reply Detail"></textarea>
                      </div>
                      <div class="col-md-1 col-sm-2" col-sm-2>
                        <button type="button" class="btn btn-success" onclick="submitReportReply('<?php echo e($travel->id); ?>')">Reply</button>
                      </div>
                    </div>
                  </td>
              </tr>
              <?php endforeach; ?>
            </table>
            <div class="text-center">
              <?php echo e($travels->links()); ?>

            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="approveStaffsModel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">staffs Remark</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo e(route('branchadmin.travel.supervisorExpenseApproval')); ?>" role="form" id="testform" method="POST">
                    <?php echo csrf_field(); ?>

                    <div id="obtype">
                        <div class="row" id="obtype_1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Remark</label>
                                    <div class="col-md-10">
                                        <input type="hidden" name="travel_id" id="travel_id">
                                        <input type="hidden" name="travel_status" id="travel_status">
                                        <textarea name="travel_remark" id="travel_remark" class="form-control"></textarea>
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
<div class="modal fade" id="approveAccountModel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">staffs Remark</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo e(route('branchadmin.travel.accountExpenseApproval')); ?>" role="form" id="testform" method="POST">
                    <?php echo csrf_field(); ?>

                    <div id="obtype">
                        <div class="row" id="obtype_1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Remark</label>
                                    <div class="col-md-10">
                                        <input type="hidden" name="travel_id" id="account_travel_id">
                                        <input type="hidden" name="travel_status" id="account_travel_status">
                                        <textarea name="travel_remark" id="travel_remark" class="form-control"></textarea>
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
<div class="modal fade" id="approveHrModel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">HR Remark</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo e(route('branchadmin.travel.hrExpenseApproval')); ?>" role="form" id="testform" method="POST">
                    <?php echo csrf_field(); ?>

                    <div id="obtype">
                        <div class="row" id="obtype_1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Remark</label>
                                    <div class="col-md-10">
                                        <input type="hidden" name="travel_id" id="hr_travel_id">
                                        <input type="hidden" name="travel_status" id="hr_travel_status">
                                        <textarea name="travel_remark" id="travel_remark" class="form-control"></textarea>
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
<div class="modal fade" id="approveChairmanModel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Chairman Remark</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo e(route('branchadmin.travel.chairmanExpenseApproval')); ?>" role="form" id="testform" method="POST">
                    <?php echo csrf_field(); ?>

                    <div id="obtype">
                        <div class="row" id="obtype_1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Remark</label>
                                    <div class="col-md-10">
                                        <input type="hidden" name="travel_id" id="chairman_travel_id">
                                        <input type="hidden" name="travel_status" id="chairman_travel_status">
                                        <textarea name="travel_remark" id="travel_remark" class="form-control"></textarea>
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
  function supervisorAapproveModel(id, status)
  {
    $('#travel_id').val(id);
    $('#travel_status').val(status);
    $('#approveStaffsModel').modal('show');
  }
  function accountAapproveModel(id, status)
  {
    $('#account_travel_id').val(id);
    $('#account_travel_status').val(status);
    $('#approveAccountModel').modal('show');
  }
  function hrAapproveModel(id, status)
  {
    $('#hr_travel_id').val(id);
    $('#hr_travel_status').val(status);
    $('#approveHrModel').modal('show');
  }
  function chairmanAapproveModel(id, status)
  {
    $('#chairman_travel_id').val(id);
    $('#chairman_travel_status').val(status);
    $('#approveChairmanModel').modal('show');
  }
</script>

<script>
    var token = $('input[name=\'_token\']').val();
    function openSupervisorTravelChat(id){
        $('#supervisorApprovalRequest'+id).toggle()
    }
    function openAccountTravelChat(id){
        $('#accountApprovalRequest'+id).toggle()
    }
    function openHrTravelChat(id){
        $('#hrApprovalRequest'+id).toggle()
    }
    function openChairmanTravelChat(id){
        $('#chairmanApprovalRequest'+id).toggle()
    }
    function openTravelReportChat(id)
    {
      $('#staffTravelReport'+id).toggle()
    }
    function submitReportReply(id){
        var travel_id = id;
        var detail = $('#reply_report_detail_'+id).val();
        if(detail != ''){
          $.ajax({
              type: "POST",
              url: "<?php echo e(url('branchadmin/travelreply/save')); ?>",
              data: "_token="+token+"&travel_id="+travel_id+"&detail="+detail,
              cache: false,
              success: function(data){
                console.log(data)
                location.reload();
                },
              error: function(error){
                console.log(error)
              }
          });
        }else{
          alert('Comment is required');
        }
    }
    function submitReply(id){
        var travel_id = id;
        var detail = $('#reply_detail_'+id).val();
        if(detail != ''){
          $.ajax({
              type: "POST",
              url: "<?php echo e(url('branchadmin/travelreply/save')); ?>",
              data: "_token="+token+"&travel_id="+travel_id+"&detail="+detail,
              cache: false,
              success: function(data){
                console.log(data)
                location.reload();
                },
              error: function(error){
                console.log(error)
              }
          });
        }else{
          alert('Comment is required');
        }
    }
    function deleteReply(id){
        $.ajax({
            type: "POST",
            url: "<?php echo e(url('branchadmin/travelreply/delete')); ?>",
            data: "_token="+token+"&id="+id,
            cache: false,
            success: function(data){
              location.reload();
              },
            error: function(error){
              alert('failed')
            }
        });
    }
</script>

<script>
  var tab = localStorage.getItem('travelreport-tab');
  if(tab == 'report')
  {
    $('#report').addClass("active");
    $('#travel-report').addClass("active");
  }else if(tab == 'settlement')
  {
    $('#settlement').addClass("active");
    $('#travel-settlement').addClass("active");
  }else
  {
    $('#report').addClass("active");
    $('#travel-report').addClass("active");
  }
  $('#travel-report').click(function(){
    localStorage.setItem('travelreport-tab', 'report')
  })
  $('#travel-settlement').click(function(){
    localStorage.setItem('travelreport-tab', 'settlement')
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>