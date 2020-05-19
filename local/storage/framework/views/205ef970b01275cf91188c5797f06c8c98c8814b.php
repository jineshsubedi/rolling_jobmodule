<?php $__env->startSection('heading'); ?>
Leave Request
            <small>List of Leave Request</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Leave Request</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
  table th{
    vertical-align: middle !important;
  }
</style>
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-md-12">
        <a href="<?php echo e(url('/branchadmin/leaverequest/addnew')); ?>" class="btn refreshbtn right btm10m">Add New Leave Request <i class="fa fa-fw fa-plus-circle"></i></a>
      </div>
      </div>
     
      <div class="box">
            <div class="box-body">
            <ul class="nav nav-tabs">
            <?php $ts = count($data['waiting_sapproval']); $th = count($data['waiting_approval']); $total = $ts + $th; ?>
            <li class="active"><a href="#tab-total" data-toggle="tab">All Requests</a></li>
                <li ><a href="#tab-your" data-toggle="tab">Your Requests</a></li>
                <li><a href="#tab-supervisor" data-toggle="tab">Approval Waiting</a></li>
                
               
              </ul>
               <div class="tab-content">
               <div class="tab-pane active" id="tab-total">
                <?php if($data['setting']->handover_required == 1 || $data['setting']->approval_required == 1 || $data['setting']->chairman_required == 1 || $data['setting']->supervisor_required == 1): ?>
                <?php ($approval = 1); ?>
                <?php else: ?>
                <?php ($approval = 0); ?>
                <?php endif; ?>
              
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th >S.N.</th>
                        <th > Requested By</th>
                        <th > Leave Type</th>
                        <th > Request Date</th>
                        <th > Leave From</th>
                        <th > Leave To</th>
                        <th > Duration</th>

                       <?php if($approval == 1): ?>
                         
                         <?php if($data['setting']->handover_required): ?>
                        <td>Handover</td>
                        <?php endif; ?>
                         <?php if($data['setting']->supervisor_required): ?>
                        <td>Supervisor</td>
                        <?php endif; ?>
                         <?php if($data['setting']->approval_required): ?>
                        <td>HR</td>
                        <?php endif; ?>
                         <?php if($data['setting']->chairman_required): ?>
                        <td>Chairman</td>
                        <?php endif; ?>
                       
                        <th >Action</th>
                         <?php endif; ?>
                      </tr>
                     
                    </thead>

                    <tbody>
                    <tr>
                     <td></td>
                     <?php ($sname = \App\Adjustment_staff::getName($data['filter_staff'])); ?>
                        <td><input type="text" class="form-control" id="staff" value="<?php echo e($sname); ?>" /><input type="hidden" id="filter_staff" value="<?php echo e($data['filter_staff']); ?>"></td>
                        <td></td>
                        <td></td>
                        <td><input type="text" id="filter_from" class="form-control date" value="<?php echo e($data['filter_from']); ?>"></td>
                        <td><input type="text" id="filter_to" class="form-control date" value="<?php echo e($data['filter_to']); ?>"></td>
                        <td></td>
                        <?php if($approval == 1): ?>
                         <?php if($data['setting']->handover_required): ?>
                        <td></td>
                        <?php endif; ?>
                         <?php if($data['setting']->supervisor_required): ?>
                        <td></td>
                        <?php endif; ?>
                         <?php if($data['setting']->approval_required): ?>
                        <td></td>
                        <?php endif; ?>
                         <?php if($data['setting']->chairman_required): ?>
                        <td></td>
                        <?php endif; ?>
                        
                        <td><a href="javascript:void(0);" onClick="filterData()" class="btn company_docbtn right"><i class="fa fa-search"></i> Filter</a></td>
                        <?php endif; ?>
                    </tr>
                      <?php if(count($data['all_request']) > 0): ?>
                      <?php $i=1; 
                        foreach ($data['all_request'] as $allrequest) { 
                          if($data['setting']->handover_required){
                          $handover = '';
                          if (count($allrequest->handoverTo) > 0) {
                            $br = '</br>';
                          } else{
                            $br = '';
                          }
                          foreach ($allrequest->handoverTo as $key => $value) {
                           
                              $name = \App\Adjustment_staff::getName($value->handover_to);
                              if ($value->accept_status == 0) {
                                $handover .= '<span class="label bg-blue">'.$name.'</span>'.$br;
                              } elseif ($value->accept_status == 1) {
                                $handover .= '<span class="label bg-green">'.$name.'</span>'.$br;
                              } else{
                                 $handover .= '<span class="label bg-red pointer" onclick="viewStatus('.$value->id.')">'.$name.'</span><input type="hidden" id="status_'.$value->id.'" value="'.$value->description.'"><button data-toggle="tooltip" data-original-title="Add other staff" type="button" onclick="addHandover('.$allrequest->id.')" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-plus"></i></button>'.$br;
                              }
                            }
                          }
                          ?>
                          <tr>
                        <td><?php echo $i++ ;?><input type="hidden" id="detail_<?php echo e($allrequest->id); ?>" value="<?php echo e($allrequest->description); ?>"></td>
                        <td><a href="javascript:void(0);" onClick="viewDetail('<?php echo e($allrequest->id); ?>')"><?php echo \App\Adjustment_staff::getName($allrequest->requested_by);?> </a></td>
                        <td><?php echo \App\LeaveType::getTitle($allrequest->leave_type);?> <b>(<?php echo e($allrequest->types == 1 ? 'Unpaid' : 'Paid'); ?>)</b></td>
                        <td><?php echo $allrequest->created_at;?></td>
                        <td><?php echo $allrequest->start_date;?></td>
                        <td><?php echo $allrequest->end_date;?></td>
                        <td><?php echo \App\LeaveRequest::getDuration($allrequest->leave_type,$allrequest->full_day,$allrequest->duration,$allrequest->start_date,$allrequest->end_date);?></td>
                        <?php if($data['setting']->handover_required): ?>
                        <td><?php echo $handover;?></td>
                        <?php endif; ?>
                        <?php if($data['setting']->supervisor_required): ?>
                        <td><?php echo \App\LeaveRequest::getStatus($allrequest->id,'Supervisor');?></td>
                        <?php endif; ?>
                        <?php if($data['setting']->approval_required): ?>
                        <td><?php echo \App\LeaveRequest::getStatus($allrequest->id,'HR');?></td>
                        <?php endif; ?>
                        <?php if($data['setting']->chairman_required): ?>
                        <td><?php echo \App\LeaveRequest::getStatus($allrequest->id,'Chairman');?></td>
                        <?php endif; ?>
                        
                        <td>
                            <?php if($allrequest->start_date >= date('Y-m-d')): ?>
                                <?php echo \App\LeaveRequest::getApproveButton($allrequest->id,$allrequest->requested_by,$allrequest->supervisor_approval,$allrequest->hr_approval,$allrequest->chairman_approval);?>
                            <?php endif; ?>
                            <?php if($allrequest->supervisor_approval != 1 || $allrequest->hr_approval != 1 || $allrequest->chairman_approval != 1): ?>
                            <a href="javascript:void(0);" class="btn btn-info" onclick="openAllRequestChat(<?php echo e($allrequest->id); ?>)">
                              <i class="fa fa-reply"></i>
                              <span class="label bg-blue"><?php echo e(\App\LeaveReply::countreply($allrequest->id)); ?></span>
                            </a>
                            <?php endif; ?>
                        </td>
                          
                      </tr>
                      <?php /* reply for this row */ ?>
                      <tr id="allRequest<?php echo e($allrequest->id); ?>" style="display: none;">
                        <td colspan="10">
                          <div class="row mb10">
                            <div class="col-md-12">
                              <div class="suggestion_message bg-light-blue disabled">
                                <?php echo $allrequest->description;?>
                              </div>
                            </div>
                          </div>

                          <?php ($leavereply = \App\LeaveReply::where('leave_request_id', $allrequest->id)->get()); ?>
                          <?php if(count($leavereply) > 0): ?>
                          <?php foreach($leavereply as $reply): ?>
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
                              <textarea id="reply_detail_<?php echo e($allrequest->id); ?>" class="form-control" placeholder="Reply Detail"></textarea>
                            </div>
                            <div class="col-md-1 col-sm-2" col-sm-2>
                              <button type="button" class="btn btn-success" onclick="submitReply('<?php echo e($allrequest->id); ?>')">Reply</button>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php  } ?>
                      <?php else: ?>
                      <tr><td colspan="12"><div class="alert alert-info">Sorry No Request Found</div></td></tr>
                        <?php endif; ?>
                      </tbody>

                    </table>
                
               <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
          <?php echo $data['all_request']->render();?>
      </div>
    </div>
  </div>
               </div>
            <div class="tab-pane" id="tab-your">
              <?php if(count($data['your_request']) > 0): ?>
                   <?php if($data['setting']->handover_required == 1 || $data['setting']->approval_required == 1 || $data['setting']->chairman_required == 1 || $data['setting']->supervisor_required == 1): ?>
                <?php ($approval = 1); ?>
                <?php else: ?>
                <?php ($approval = 0); ?>
                <?php endif; ?>
              
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th >S.N.</th>
                        <th > Requested By</th>
                        <th > Leave Type</th>
                        <th > Leave From</th>
                        <th > Leave To</th>
                        <th > Duration</th>

                       <?php if($approval == 1): ?>
                         
                         <?php if($data['setting']->handover_required): ?>
                        <td>Handover</td>
                        <?php endif; ?>
                         <?php if($data['setting']->supervisor_required): ?>
                        <td>Supervisor</td>
                        <?php endif; ?>
                         <?php if($data['setting']->approval_required): ?>
                        <td>HR</td>
                        <?php endif; ?>
                         <?php if($data['setting']->chairman_required): ?>
                        <td>Chairman</td>
                        <?php endif; ?>
                       
                        <th >Action</th>
                         <?php endif; ?>
                      </tr>
                     
                    </thead>

                    <tbody>
                    <tr>
                     <td></td>
                     <?php ($sname = \App\Adjustment_staff::getName($data['filter_staff'])); ?>
                        <td><input type="text" class="form-control" id="staff" value="<?php echo e($sname); ?>" /><input type="hidden" id="filter_staff" value="<?php echo e($data['filter_staff']); ?>"></td>
                        <td></td>
                        <td><input type="text" id="filter_from" class="form-control date" value="<?php echo e($data['filter_from']); ?>"></td>
                        <td><input type="text" id="filter_to" class="form-control date" value="<?php echo e($data['filter_to']); ?>"></td>
                        <td></td>
                        <?php if($approval == 1): ?>
                         <?php if($data['setting']->handover_required): ?>
                        <td></td>
                        <?php endif; ?>
                         <?php if($data['setting']->supervisor_required): ?>
                        <td></td>
                        <?php endif; ?>
                         <?php if($data['setting']->approval_required): ?>
                        <td></td>
                        <?php endif; ?>
                         <?php if($data['setting']->chairman_required): ?>
                        <td></td>
                        <?php endif; ?>
                        
                        <td><a href="javascript:void(0);" onClick="filterData()" class="btn btn-primary right"><i class="fa fa-search"></i>Filter</a></td>
                        <?php endif; ?>
                    </tr>
                      <?php if(count($data['your_request']) > 0): ?>
                      <?php $i=1; 
                        foreach ($data['your_request'] as $yourrequest) { 
                          if($data['setting']->handover_required){
                          $handover = '';
                          if (count($yourrequest->handoverTo) > 0) {
                            $br = '</br>';
                          } else{
                            $br = '';
                          }
                          foreach ($yourrequest->handoverTo as $key => $value) {
                           
                              $name = \App\Adjustment_staff::getName($value->handover_to);
                              if ($value->accept_status == 0) {
                                $handover .= '<span class="label bg-blue">'.$name.'</span>'.$br;
                              } elseif ($value->accept_status == 1) {
                                $handover .= '<span class="label bg-green">'.$name.'</span>'.$br;
                              } else{
                                 $handover .= '<span class="label bg-red pointer" onclick="viewStatus('.$value->id.')">'.$name.'</span><input type="hidden" id="status_'.$value->id.'" value="'.$value->description.'"><button data-toggle="tooltip" data-original-title="Add other staff" type="button" onclick="addHandover('.$yourrequest->id.')" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-plus"></i></button>'.$br;
                              }
                            }
                          }
                          ?>
                          <tr>
                        <td><?php echo $i++ ;?><input type="hidden" id="detail_<?php echo e($yourrequest->id); ?>" value="<?php echo e($yourrequest->description); ?>"></td>
                        <td><a href="javascript:void(0);" onClick="viewDetail('<?php echo e($yourrequest->id); ?>')"><?php echo \App\Adjustment_staff::getName($yourrequest->requested_by);?> </a></td>
                        <td><?php echo \App\LeaveType::getTitle($yourrequest->leave_type);?> <b>(<?php echo e($yourrequest->types == 1 ? 'Unpaid' : 'Paid'); ?>)</b></td>
                        <td><?php echo $yourrequest->start_date;?></td>
                        <td><?php echo $yourrequest->end_date;?></td>
                        <td><?php echo \App\LeaveRequest::getDuration($yourrequest->leave_type,$yourrequest->full_day,$yourrequest->duration,$yourrequest->start_date,$yourrequest->end_date);?></td>
                        <?php if($data['setting']->handover_required): ?>
                        <td><?php echo $handover;?></td>
                        <?php endif; ?>
                        <?php if($data['setting']->supervisor_required): ?>
                        <td><?php echo \App\LeaveRequest::getStatus($yourrequest->id,'Supervisor');?></td>
                        <?php endif; ?>
                        <?php if($data['setting']->approval_required): ?>
                        <td><?php echo \App\LeaveRequest::getStatus($yourrequest->id,'HR');?></td>
                        <?php endif; ?>
                        <?php if($data['setting']->chairman_required): ?>
                        <td><?php echo \App\LeaveRequest::getStatus($yourrequest->id,'Chairman');?></td>
                        <?php endif; ?>
                       
                        <td>
                          <?php if($yourrequest->start_date >= date('Y-m-d') || $yourrequest->supervisor_approval == 2 || $yourrequest->hr_approval == 2 || $yourrequest->chairman_approval == 2): ?>
                          <a href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($yourrequest->id); ?>')" class="btn btn-danger left">Cancel</a>
                          <?php endif; ?>
                          <?php if($yourrequest->supervisor_approval != 1 || $yourrequest->hr_approval != 1 || $yourrequest->chairman_approval != 1): ?>
                            <button type="button" class="btn btn-info" onclick="openYourRequestChat(<?php echo e($yourrequest->id); ?>)">
                              <i class="fa fa-reply"></i>
                              <span class="label bg-blue"><?php echo e(\App\LeaveReply::countreply($yourrequest->id)); ?></span>
                            </button>
                          <?php endif; ?>
                        </td>
                         
                      </tr>
                      <?php /* reply for this row */ ?>
                      <tr id="yourRequest<?php echo e($yourrequest->id); ?>" style="display: none;">
                        <td colspan="10">
                          <div class="row mb10">
                            <div class="col-md-12">
                              <div class="suggestion_message bg-light-blue disabled">
                                <?php echo $yourrequest->description;?>
                              </div>
                            </div>
                          </div>

                          <?php ($leavereply = \App\LeaveReply::where('leave_request_id', $yourrequest->id)->get()); ?>
                          <?php if(count($leavereply) > 0): ?>
                          <?php foreach($leavereply as $reply): ?>
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
                              <textarea id="reply_detail_<?php echo e($yourrequest->id); ?>" class="form-control" placeholder="Reply Detail"></textarea>
                            </div>
                            <div class="col-md-1 col-sm-2" col-sm-2>
                              <button type="button" class="btn btn-success" onclick="submitReply('<?php echo e($yourrequest->id); ?>')">Reply</button>
                            </div>
                          </div>

                        </td>
                      </tr>
                      <?php  } ?>
                      <?php else: ?>
                      <tr><td colspan="11"><div class="alert alert-info">Sorry No Request Found</div></td></tr>
                        <?php endif; ?>
                      </tbody>

                    </table>
                <?php else: ?>
                <div class="alert alert-info">Sorry No Request Found</div>
                <?php endif; ?>
               <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
          <?php echo $data['your_request']->render();?>
      </div>
    </div>
  </div>
               </div>
         <div class="tab-pane" id="tab-supervisor">
                 <?php if(count($data['waiting_approval']) > 0 || count($data['waiting_sapproval']) > 0 || count($data['waiting_chapproval']) > 0): ?>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th> Requested By</th>
                        <th> Leave Type</th>
                        <th> Request Date</th>
                        <th> Leave From</th>
                        <th> Leave To</th>
                        <th> Duration</th>
                        <th> Handover To</th>
                         <th> Status</th> 
                       
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        <td>
                          <input type="checkbox" id="checkAll"> Check All
                          <button type="button" class="btn btn-info" id="supervisorApproveBtn"><i class="fa fa-thumbs-up"></i></button>
                          <button type="button" class="btn btn-warning" id="supervisorCancelBtn"><i class="fa fa-thumbs-down"></i></button>
                        </td>
                      </tr>
                      <?php $i=1; 
                        foreach ($data['waiting_approval'] as $wap) { 
                           $handover = '';
                          if (count($wap->handoverTo) > 0) {
                            $br = '</br>';
                          } else{
                            $br = '';
                          }
                          foreach ($wap->handoverTo as $key => $value) {
                           
                              $name = \App\Adjustment_staff::getName($value->handover_to);
                              if ($value->accept_status == 0) {
                                $handover .= '<span class="label bg-blue">'.$name.'</span>'.$br;
                              } elseif ($value->accept_status == 1) {
                                $handover .= '<span class="label bg-green">'.$name.'</span>'.$br;
                              } else{
                                 $handover .= '<span class="label bg-red pointer" onclick="viewStatus('.$value->id.')">'.$name.'</span><input type="hidden" id="status_'.$value->id.'" value="'.$value->description.'"><button data-toggle="tooltip" data-original-title="Add other staff" type="button" onclick="addHandover('.$wap->id.')" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-plus"></i></button>'.$br;
                              }
                            }
                          ?>
                          <tr>
                        <td><?php echo $i++ ;?><input type="checkbox" class="checkItem" name="request_ids[]" value="<?php echo e($wap->id); ?>"><input type="hidden" id="detail_<?php echo e($wap->id); ?>" value="<?php echo e($wap->description); ?>"></td>
                        <td><?php echo \App\Adjustment_staff::getName($wap->requested_by);?></td>
                        <td><?php echo \App\LeaveType::getTitle($wap->leave_type);?> <b>(<?php echo e($wap->types == 1 ? 'Unpaid' : 'Paid'); ?>)</b></td>
                        <td><?php echo $wap->created_at;?></td>
                        <td><?php echo $wap->start_date;?></td>
                        <td><?php echo $wap->end_date;?></td>
                        
                        
                        <td><?php echo \App\LeaveRequest::getDuration($wap->leave_type,$wap->full_day,$wap->duration,$wap->start_date,$wap->end_date);?></td>
                        <td><?php echo $handover;?></td>
                        <td><?php echo \App\LeaveRequest::getStatus($wap->supervisor_approval,$wap->hr_approval,$wap->id);?></td>
                        
                        <td>
                       
                          <a href="javascript:void(0);" onClick="viewDetail('<?php echo e($wap->id); ?>')" class="btn btn-info left"><i class="fa fa-eye"></i></a>
                          <?php if($wap->supervisor_approval != 1 || $wap->hr_approval != 1 || $wap->chairman_approval != 1): ?>
                            <a href="javascript:void(0);" class="btn btn-info" onclick="openHrRequestChat(<?php echo e($wap->id); ?>)">
                              <i class="fa fa-reply"></i>
                              <span class="label bg-blue"><?php echo e(\App\LeaveReply::countreply($wap->id)); ?></span>
                            </a>
                          <?php endif; ?>
                          <?php if($wap->hr_approval != '1'): ?>
                          <a href="javascript:void(0);" onClick="HRApprove('<?php echo e($wap->id); ?>')" class="btn btn-success left"><i class="fa fa-thumbs-up"></i></a>
                          <a href="javascript:void(0);" onClick="HRdecline('<?php echo e($wap->id); ?>')" class="btn btn-danger left"><i class="fa fa-thumbs-down"></i></a>
                          <?php elseif($wap->hr_approval == 1): ?>
                          <a href="javascript:void(0);" onClick="HRdecline('<?php echo e($wap->id); ?>')" class="btn btn-danger left"><i class="fa fa-thumbs-down"></i></a>
                          <?php endif; ?>
                          
                          
                          </td>
                      </tr>
                      <?php /* reply for this row */ ?>
                      <tr id="hrRequest<?php echo e($wap->id); ?>" style="display: none;">
                        <td colspan="10">
                          <div class="row mb10">
                            <div class="col-md-12">
                              <div class="suggestion_message bg-light-blue disabled">
                                <?php echo $wap->description;?>
                              </div>
                            </div>
                          </div>

                          <?php ($leavereply = \App\LeaveReply::where('leave_request_id', $wap->id)->get()); ?>
                          <?php if(count($leavereply) > 0): ?>
                          <?php foreach($leavereply as $reply): ?>
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
                              <textarea id="reply_detail_<?php echo e($wap->id); ?>" class="form-control" placeholder="Reply Detail"></textarea>
                            </div>
                            <div class="col-md-1 col-sm-2" col-sm-2>
                              <button type="button" class="btn btn-success" onclick="submitReply('<?php echo e($wap->id); ?>')">Reply</button>
                            </div>
                          </div>

                        </td>
                      </tr>
                      <?php  } ?>
                        
                      <?php foreach ($data['waiting_chapproval'] as $waiting_chapproval) { 
                           $handover = '';
                          if (count($waiting_chapproval->handoverTo) > 0) {
                            $br = '</br>';
                          } else{
                            $br = '';
                          }
                          foreach ($waiting_chapproval->handoverTo as $key => $value) {
                           
                              $name = \App\Adjustment_staff::getName($value->handover_to);
                              if ($value->accept_status == 0) {
                                $handover .= '<span class="label bg-blue">'.$name.'</span>'.$br;
                              } elseif ($value->accept_status == 1) {
                                $handover .= '<span class="label bg-green">'.$name.'</span>'.$br;
                              } else{
                                 $handover .= '<span class="label bg-red pointer" onclick="viewStatus('.$value->id.')">'.$name.'</span><input type="hidden" id="status_'.$value->id.'" value="'.$value->description.'"><button data-toggle="tooltip" data-original-title="Add other staff" type="button" onclick="addHandover('.$waiting_chapproval->id.')" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-plus"></i></button>'.$br;
                              }
                            }
                          ?>
                          <tr>
                        <td><?php echo $i++ ;?><input type="checkbox" class="checkItem" name="request_ids[]" value="<?php echo e($waiting_chapproval->id); ?>"><input type="hidden" id="detail_<?php echo e($waiting_chapproval->id); ?>" value="<?php echo e($waiting_chapproval->description); ?>"></td>
                        <td><?php echo \App\Adjustment_staff::getName($waiting_chapproval->requested_by);?></td>
                        <td><?php echo \App\LeaveType::getTitle($waiting_chapproval->leave_type);?></td>
                        <td><?php echo $waiting_chapproval->created_at;?></td>
                        <td><?php echo $waiting_chapproval->start_date;?></td>
                        <td><?php echo $waiting_chapproval->end_date;?></td>
                        
                        
                        <td><?php echo \App\LeaveRequest::getDuration($waiting_chapproval->leave_type,$waiting_chapproval->full_day,$waiting_chapproval->duration,$waiting_chapproval->start_date,$waiting_chapproval->end_date);?></td>
                        <td><?php echo $handover;?></td>
                        <td><?php echo \App\LeaveRequest::getStatus($waiting_chapproval->supervisor_approval,$waiting_chapproval->hr_approval,$waiting_chapproval->id);?></td>
                        
                        <td>
                       
                          <a href="javascript:void(0);" onClick="viewDetail('<?php echo e($waiting_chapproval->id); ?>')" class="btn btn-info left"><i class="fa fa-eye"></i></a>
                          <?php if($waiting_chapproval->supervisor_approval != 1 || $waiting_chapproval->hr_approval != 1 || $waiting_chapproval->chairman_approval != 1): ?>
                            <a href="javascript:void(0);" class="btn btn-info" onclick="openChairmanRequestChat(<?php echo e($waiting_chapproval->id); ?>)">
                              <i class="fa fa-reply"></i>
                              <span class="label bg-blue"><?php echo e(\App\LeaveReply::countreply($waiting_chapproval->id)); ?></span>
                            </a>
                          <?php endif; ?>
                          <?php if($waiting_chapproval->chairman_approval != '1'): ?>
                          <a href="javascript:void(0);" onClick="CHApprove('<?php echo e($waiting_chapproval->id); ?>')" class="btn btn-success left"><i class="fa fa-thumbs-up"></i></a>
                          <a href="javascript:void(0);" onClick="CHdecline('<?php echo e($waiting_chapproval->id); ?>')" class="btn btn-danger left"><i class="fa fa-thumbs-down"></i></a>
                          <?php else: ?>
                          <a href="javascript:void(0);" onClick="CHdecline('<?php echo e($waiting_chapproval->id); ?>')" class="btn btn-danger left"><i class="fa fa-thumbs-down"></i></a>
                          <?php endif; ?>
                          </td>
                      </tr>
                      <?php /* reply for this row */ ?>
                      <tr id="chairmanRequest<?php echo e($waiting_chapproval->id); ?>" style="display: none;">
                        <td colspan="10">
                          <div class="row mb10">
                            <div class="col-md-12">
                              <div class="suggestion_message bg-light-blue disabled">
                                <?php echo $waiting_chapproval->description;?>
                              </div>
                            </div>
                          </div>

                          <?php ($leavereply = \App\LeaveReply::where('leave_request_id', $waiting_chapproval->id)->get()); ?>
                          <?php if(count($leavereply) > 0): ?>
                          <?php foreach($leavereply as $reply): ?>
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
                              <textarea id="reply_detail_<?php echo e($waiting_chapproval->id); ?>" class="form-control" placeholder="Reply Detail"></textarea>
                            </div>
                            <div class="col-md-1 col-sm-2" col-sm-2>
                              <button type="button" class="btn btn-success" onclick="submitReply('<?php echo e($waiting_chapproval->id); ?>')">Reply</button>
                            </div>
                          </div>

                        </td>
                      </tr>
                      <?php  } ?>
                      
                      <?php foreach ($data['waiting_sapproval'] as $wsap) { 
                         $handover = '';
                          if (count($wsap->handoverTo) > 0) {
                            $br = '</br>';
                          } else{
                            $br = '';
                          }
                          foreach ($wsap->handoverTo as $key => $value) {
                           
                              $name = \App\Adjustment_staff::getName($value->handover_to);
                              if ($value->accept_status == 0) {
                                $handover .= '<span class="label bg-blue">'.$name.'</span>'.$br;
                              } elseif ($value->accept_status == 1) {
                                $handover .= '<span class="label bg-green">'.$name.'</span>'.$br;
                              } else{
                                 $handover .= '<span class="label bg-red pointer" onclick="viewStatus('.$value->id.')">'.$name.'</span><input type="hidden" id="status_'.$value->id.'" value="'.$value->description.'"><button data-toggle="tooltip" data-original-title="Add other staff" type="button" onclick="addHandover('.$wsap->id.')" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-plus"></i></button>'.$br;
                              }
                            }
                        ?>
                          <tr>
                        <td><?php echo $i++ ;?><input type="checkbox" class="checkItem" name="request_ids[]" value="<?php echo e($wsap->id); ?>"><input type="hidden" id="detail_<?php echo e($wsap->id); ?>" value="<?php echo e($wsap->description); ?>"></td>
                        <td><?php echo \App\Adjustment_staff::getName($wsap->requested_by);?></td>
                        <td><?php echo \App\LeaveType::getTitle($wsap->leave_type);?> <b>(<?php echo e($wsap->types == 1 ? 'Unpaid' : 'Paid'); ?>)</b></td>
                        <td><?php echo $wsap->created_at;?></td>
                        <td><?php echo $wsap->start_date;?></td>
                        <td><?php echo $wsap->end_date;?></td>
                       
                        <td><?php echo \App\LeaveRequest::getDuration($wsap->leave_type,$wsap->full_day,$wsap->duration,$wsap->start_date,$wsap->end_date);?></td>
                        <td><?php echo $handover;?></td>
                         <td><?php echo \App\LeaveRequest::getStatus($wsap->supervisor_approval,$wsap->hr_approval,$wsap->id);?></td>
                        <td>
                       
                          <a href="javascript:void(0);" onClick="viewDetail('<?php echo e($wsap->id); ?>')" class="btn btn-info left"><i class="fa fa-eye"></i></a>
                          <?php if($wsap->supervisor_approval != 1 || $wsap->hr_approval != 1 || $wsap->chairman_approval != 1): ?>
                          <a href="javascript:void(0);" class="btn btn-info" onclick="openSupervisorRequestChat(<?php echo e($wsap->id); ?>)">
                            <i class="fa fa-reply"></i>
                            <span class="label bg-blue"><?php echo e(\App\LeaveReply::countreply($wsap->id)); ?></span>
                          </a>
                          <?php endif; ?>
                          <?php if($wsap->supervisor_approval != '1'): ?>
                         
                          <a href="javascript:void(0);" onClick="SUApprove('<?php echo e($wsap->id); ?>')" class="btn btn-success left"><i class="fa fa-thumbs-up"></i></a>
                           <a href="javascript:void(0);" onClick="SUdecline('<?php echo e($wsap->id); ?>')" class="btn btn-danger left"><i class="fa fa-thumbs-down"></i></a>
                           <?php endif; ?>
                          
                          </td>
                      </tr>
                      <?php /* reply for this row */ ?>
                      <tr id="supervisorRequest<?php echo e($wsap->id); ?>" style="display: none;">
                        <td colspan="10">
                          <div class="row mb10">
                            <div class="col-md-12">
                              <div class="suggestion_message bg-light-blue disabled">
                                <?php echo $wsap->description;?>
                              </div>
                            </div>
                          </div>

                          <?php ($leavereply = \App\LeaveReply::where('leave_request_id', $wsap->id)->get()); ?>
                          <?php if(count($leavereply) > 0): ?>
                          <?php foreach($leavereply as $reply): ?>
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
                              <textarea id="reply_detail_<?php echo e($wsap->id); ?>" class="form-control" placeholder="Reply Detail"></textarea>
                            </div>
                            <div class="col-md-1 col-sm-2" col-sm-2>
                              <button type="button" class="btn btn-success" onclick="submitReply('<?php echo e($wsap->id); ?>')">Reply</button>
                            </div>
                          </div>

                        </td>
                      </tr>
                      <?php  } ?>
                      </tbody>

                    </table>
                <?php else: ?>
                <div class="alert alert-info">Sorry No Request Found for Approval</div>
                <?php endif; ?>
                 </div>
            </div>
          </div><!-- /.box-body -->
      </div>
    </div>
  <div>

  <div>
  </div>

  <div class="modal fade" id="modal-otherstaff">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="otherstaff-title">Other Staffs</h4>
              </div>
              <form id="job-form" method="POST" action="<?php echo e(url('/branchadmin/leaverequest/updatehandover')); ?>" class="form-horizontal" enctype="multipart/form-data">
                 <?php echo csrf_field(); ?>

               <input type="hidden" name="id" id="leave_id" value="">
              <div class="modal-body">
               <div class="form-group">
                                      
                <div class="col-md-12">
                  <select class="form-control" name="otherstaff" id="otherstaff">
                    
                  </select>
                                          
                 </div>
                                        
              </div>
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

  <div class="modal fade" id="modal-remarks">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="remarks-title">Decline Remarks</h4>
              </div>
             
              <div class="modal-body" id="remarks_body">
              
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

  <div class="modal fade" id="modal-decline">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="decline-title">Decline Remarks</h4>
              </div>
              <form id="decline_form" method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
                 <?php echo csrf_field(); ?>

               <input type="hidden" name="id" id="decline_id" value="">
              <div class="modal-body">
               <div class="form-group">
                                      
                <div class="col-md-12">
                  <textarea class="form-control" name="description" placeholder="Description" required="required"></textarea>
                                          
                 </div>
                                        
              </div>
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  
  <script type="text/javascript">

 
     function confirm_delete(ids){
    if(confirm('Do You Want To Cancel this leave request?')){
      var url= "<?php echo e(url('/branchadmin/leaverequest/delete/')); ?>"+ids;
      location = url;
      
      }
    }

     function viewSRemarks(id) {
      var remarks = $('#su_rem_'+id).val();
      $('#remarks_body').html(remarks);
      $('#remarks-title').html('Decline Remarks');
      $('#modal-remarks').modal('show');
    }

    function viewHRemarks(id) {
      var remarks = $('#hr_rem_'+id).val();
      $('#remarks_body').html(remarks);
      $('#remarks-title').html('Decline Remarks');
      $('#modal-remarks').modal('show');
    }

    function viewCRemarks(id) {
      var remarks = $('#ch_rem_'+id).val();
      $('#remarks_body').html(remarks);
      $('#remarks-title').html('Decline Remarks');
      $('#modal-remarks').modal('show');
    }

    function viewStatus(id) {
      var remarks = $('#status_'+id).val();
      $('#remarks_body').html(remarks);
      $('#remarks-title').html('Decline Remarks');
      $('#modal-remarks').modal('show');
    }

    function addHandover(id) {
       var token = $('input[name=\'_token\']').val();
        $.ajax({
             type: 'POST',
                url: '<?php echo e(url("/branchadmin/leaverequest/getStaffs")); ?>',
                data: '_token='+token+'&id='+id,
                cache: false,
                success: function(html){
                  $('#leave_id').val(id);
                  $('#otherstaff').html(html);
                  $('#modal-otherstaff').modal('show');
                   
                }
          });
      
    }

    function viewDetail(id) {
       var remarks = $('#detail_'+id).val();
      $('#remarks_body').html(remarks);
      $('#remarks-title').html('Description');
      $('#modal-remarks').modal('show');
    }



    function SUApprove(id){
    if(confirm('Are you sure you want to Approve this?')){
      var url= "<?php echo e(url('/branchadmin/leaverequest/supervisor_approve/')); ?>/"+id;
      location = url;
      
      }
    }

    function HRApprove(id){
    if(confirm('Are you sure you want to Approve this?')){
      var url= "<?php echo e(url('/branchadmin/leaverequest/hr_approve/')); ?>/"+id;
      location = url;
      
      }
    }
     function CHApprove(id){
    if(confirm('Are you sure you want to Approve this?')){
      var url= "<?php echo e(url('/branchadmin/leaverequest/ch_approve/')); ?>/"+id;
      location = url;
      
      }
    }

     function SUdecline(id){
    if(confirm('Are you sure you want to decline this?')){
      $('#decline_id').val(id);
      $('#decline_form').attr('action','<?php echo e(url("/branchadmin/leaverequest/supervisor_decline")); ?>')
      $('#modal-decline').modal('show');
      
      }
    }

    function HRdecline(id){
    if(confirm('Are you sure you want to decline this?')){
      $('#decline_id').val(id);
      $('#decline_form').attr('action','<?php echo e(url("/branchadmin/leaverequest/hr_decline")); ?>')
      $('#modal-decline').modal('show');
      
      }
    }

    function CHdecline(id){
    if(confirm('Are you sure you want to decline this?')){
      $('#decline_id').val(id);
      $('#decline_form').attr('action','<?php echo e(url("/branchadmin/leaverequest/ch_decline")); ?>')
      $('#modal-decline').modal('show');
      
      }
    }

    function Chairdecline(id){
    if(confirm('Are you sure you want to decline this?')){
      $('#decline_id').val(id);
      $('#decline_form').attr('action','<?php echo e(url("/branchadmin/leaverequest/ch_decline")); ?>')
      $('#modal-decline').modal('show');
      
      }
    }


    $('#staff').autocomplete({

    source: '<?php echo e(url("branchadmin/staffs/autocomplete/")); ?>',
          minlength:1,
          autoFocus:true,
          select:function(e,ui){
            var filter_from = $('#filter_from').val();
            var filter_to = $('#filter_to').val();
            var url = '<?php echo e(url("branchadmin/leaverequest/")); ?>?';
             url += 'filter_staff='+ui.item.id;
             if (filter_from != '') {
              url += '&filter_from='+filter_from;
             }
             if (filter_to != '') {
              url += '&filter_to='+filter_to;
             }
            location = url;
            
             
          }

});
  </script>

  <script type="text/javascript">
   $(function () {
    
    $('.date').datepicker({
        onSelect: function(date) {
            
          var filter_from = $('#filter_from').val();
          var filter_to = $('#filter_to').val();
          var filter_staff = $('#filter_staff').val();
          var url = '<?php echo e(url("branchadmin/leaverequest/")); ?>?';
          if (filter_staff != '') {
            url += 'filter_staff='+filter_staff;
          }
          if (filter_from != '') {
              url += '&filter_from='+filter_from;
             }
             if (filter_to != '') {
              url += '&filter_to='+filter_to;
             }
            location = url;


           
        }
    });
});
 </script>
 
 <script>
  $("#checkAll").click(function(){
    $('.checkItem:checkbox').not(this).prop('checked', this.checked);
  });
  $('#supervisorApproveBtn').click(function(){
    var r = confirm("Do you want to approve selected?");
    if (r == true) {
      var ids = [];
      $("input[class=checkItem]:checked").each(function () {
        ids.push(this.value);
      });
      $.ajax({
          type: "POST",
          url: "<?php echo e(url('branchadmin/leaverequest/approveAll')); ?>",
          data: "_token="+token+"&ids="+ids,
          cache: false,
          success: function(data){
            console.log(data)
            location.reload();
          },
          error: function(error){
            console.log(error)
          }
      });
    }
  })
  $('#supervisorCancelBtn').click(function(){
    var r = confirm("Do you want to cancel selected?");
    if (r == true) {
      var ids = [];
      $("input[class=checkItem]:checked").each(function () {
        ids.push(this.value);
      });
      $.ajax({
          type: "POST",
          url: "<?php echo e(url('branchadmin/leaverequest/cancelAll')); ?>",
          data: "_token="+token+"&ids="+ids,
          cache: false,
          success: function(data){
            console.log(data)
            location.reload();
          },
          error: function(error){
            console.log(error)
          }
      });
    } 
  })
 </script>
 
 <script>
  function openYourRequestChat(id){
    $('#yourRequest'+id).toggle()
  }
  function openSupervisorRequestChat(id){
    $('#supervisorRequest'+id).toggle()
  }
  function openChairmanRequestChat(id){
    $('#chairmanRequest'+id).toggle()
  }
  function openHrRequestChat(id){
    $('#hrRequest'+id).toggle()
  }
  function openAllRequestChat(id){
    $('#allRequest'+id).toggle()
  }
  function submitReply(id){
    var leave_request_id = id;
    var detail = $('#reply_detail_'+id).val();
    $.ajax({
        type: "POST",
        url: "<?php echo e(url('branchadmin/leaverequest/leavereply')); ?>",
        data: "_token="+token+"&leave_request_id="+leave_request_id+"&detail="+detail,
        cache: false,
        success: function(data){
          console.log(data)
          location.reload();
          },
        error: function(error){
          console.log(error)
        }
    });
  }
  function deleteReply(id){
    $.ajax({
        type: "POST",
        url: "<?php echo e(url('branchadmin/leaverequest/leavereply/delete')); ?>",
        data: "_token="+token+"&id="+id,
        cache: false,
        success: function(data){
          console.log(data)
          location.reload();
          },
        error: function(error){
          console.log(error)
        }
    });
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>