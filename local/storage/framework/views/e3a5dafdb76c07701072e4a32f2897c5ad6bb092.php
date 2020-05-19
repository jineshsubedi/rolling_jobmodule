<?php $__env->startSection('heading'); ?>
Travel Request
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Travel Request</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('staffs.travel.create')); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-plus"></i>Add Travel Request</a>
      </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('staffs.travel.myTravel')); ?>">My Travel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo e(route('staffs.travel.index')); ?>">Request Travel</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('staffs.travel.waitingApproval')); ?>">Waiting Approval
                <span class="label bg-red"><?php echo e(\App\Travel::countApprovalWaiting()); ?></span>
                </a>
              </li>
            </ul>
            <?php /* <h3 class="box-title">Travel Request</h3> */ ?>
        </div>
      <div class="box-body">
        <table class="table table-borderd">
            <tr>
                <th>Staff</th>
                <th>Type</th>
                <th>Departure Date</th>
                <th>Arrival Date</th>
                <th>Assignment Type</th>
                <th>Assignment Purpose</th>
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
                  <?php echo e(\App\TravelAssignmentType::getTitle($travel->assignment_category)); ?>

                </td>
                <td>
                    <a href="<?php echo e(route('staffs.travel.show', $travel->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
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
                  <?php echo e(\App\TravelAssignmentType::getTitle($travel->assignment_category)); ?>

                </td>
                <td>
                    <a href="<?php echo e(route('staffs.travel.show', $travel->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
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
                  <?php echo e(\App\TravelAssignmentType::getTitle($travel->assignment_category)); ?>

                </td>
                <td>
                    <a href="<?php echo e(route('staffs.travel.show', $travel->id)); ?>" class="btn btn-info" target="_blank"><i class="fa fa-eye"></i></a>
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
                  <?php echo e(\App\TravelAssignmentType::getTitle($travel->assignment_category)); ?>

                </td>
                <td>
                    <a href="<?php echo e(route('staffs.travel.show', $travel->id)); ?>" class="btn btn-info" target="_blank"><i class="fa fa-eye"></i></a>
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
                <form class="form-horizontal" action="<?php echo e(route('staffs.travel.supervisorApproval')); ?>" role="form" id="testform" method="POST">
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
                <form class="form-horizontal" action="<?php echo e(route('staffs.travel.accountApproval')); ?>" role="form" id="testform" method="POST">
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
                <form class="form-horizontal" action="<?php echo e(route('staffs.travel.hrApproval')); ?>" role="form" id="testform" method="POST">
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
                <form class="form-horizontal" action="<?php echo e(route('staffs.travel.chairmanApproval')); ?>" role="form" id="testform" method="POST">
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
    function submitReply(id){
        var travel_id = id;
        var detail = $('#reply_detail_'+id).val();
        if(detail != ''){
          $.ajax({
              type: "POST",
              url: "<?php echo e(url('staffs/travelreply/save')); ?>",
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
            url: "<?php echo e(url('staffs/travelreply/delete')); ?>",
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>