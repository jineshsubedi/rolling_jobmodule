<?php $__env->startSection('heading'); ?>
Task Detail
            
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         
            <li class="active">Tasks</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('lightbox/lightbox.css')); ?>">
<style type="text/css">
  .job-row td{
    width: 100% !important;
  }
  .job-row{
    width: 100% !important;
  }
  .job-row td p{
    width: 100% !important;
  }
</style>
 <div class="row">
    <div class="col-xs-12">
     <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(url('/branchadmin/tasks/addnew')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-fw fa-plus"></i>Add New Task</a>
      </div>
      </div>
      
     
      <div class="box">
            <div class="box-body">
            <div class="panel-heading">
            <div class="top-links btn-group">
             <a href="<?php echo e(url('/branchadmin/tasks')); ?>" class="btn <?php echo e($datas['task_type'] == '' ? 'btn-primary' : 'btn-default'); ?>">All</a>
              <a href="<?php echo e(url('/branchadmin/tasks?task_from='.auth()->guard('staffs')->user()->id.'&task_type=2&task_to='.auth()->guard('staffs')->user()->id)); ?>" class="btn <?php echo e($datas['task_type'] == 2 ? 'btn-primary' : 'btn-default'); ?>">To do</a>

              <a href="<?php echo e(url('/branchadmin/tasks?task_type=1&task_to='.auth()->guard('staffs')->user()->id)); ?>" class="btn <?php echo e($datas['task_type'] == 1 ? 'btn-primary' : 'btn-default'); ?>">My Task</a>
              <a href="<?php echo e(url('/branchadmin/tasks?task_type=3&task_from='.auth()->guard('staffs')->user()->id)); ?>" class="btn <?php echo e($datas['task_type'] == 3 ? 'btn-primary' : 'btn-default'); ?>">Task Given</a>
             
              
              
              </div>
              
              <?php ($message = \App\TaskChat::countUnreadMessage()); ?>
              <?php ($accept = \App\StaffTask::countUnaccept()); ?>
              <?php ($approval = \App\StaffTask::countApproval()); ?>
               <div class="top-links btn-group">
              
              <a href="<?php echo e(url('/branchadmin/tasks?task_type=4')); ?>" class="btn <?php echo e($datas['task_type'] == 4 ? 'btn-primary' : 'btn-default'); ?>">Messages
               <?php if($message > 0): ?>
                      <span class="badge label-danger chatbadge"><?php echo e($message); ?></span>
                      <?php endif; ?>
              </a>

              <a href="<?php echo e(url('/branchadmin/tasks?task_type=5')); ?>" class="btn <?php echo e($datas['task_type'] == 5 ? 'btn-primary' : 'btn-default'); ?>">Accept
               <?php if($accept > 0): ?>
                      <span class="badge label-danger chatbadge"><?php echo e($accept); ?></span>
                      <?php endif; ?>
              </a>
              <a href="<?php echo e(url('/branchadmin/tasks?task_type=6')); ?>" class="btn <?php echo e($datas['task_type'] == 6 ? 'btn-primary' : 'btn-default'); ?>">Approval
               <?php if($approval > 0): ?>
                      <span class="badge label-danger chatbadge"><?php echo e($approval); ?></span>
                      <?php endif; ?>
              </a>
             
              
              
              </div>
    </div>
                      <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style="width: 1%;">S.N.</th>
                        <th>Title</th>
                        <th>Task From</th>
                        <th>Task To</th>
                        <th>Members</th>
                        <th>Weightage</th>
                        <th>Project</th>
                        <th>Status</th>
                        <th>Deadline</th>
                      <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td></td>
                      <td><input type="text" class="form-control" name="filter_title" id="filter_title" value="<?php echo e($datas['filter_title']); ?>"></td>
                        <td>
                          <select class="form-control" id="task_from">
                            <option value="">Select Staff</option>
                          <?php foreach($datas['staffs'] as $staff): ?>
                            <?php if($datas['task_from'] == $staff->id): ?>
                            <option value="<?php echo e($staff->id); ?>" selected="selected"><?php echo e($staff->name); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                        </td>
                        <td>
                           <select class="form-control" id="task_to">
                            <option value="">Select Staff</option>
                          <?php foreach($datas['staffs'] as $staff): ?>
                            <?php if($datas['task_to'] == $staff->id): ?>
                            <option value="<?php echo e($staff->id); ?>" selected="selected"><?php echo e($staff->name); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                        </td>
                        <td></td>
                        <td></td>
                        <td><input type="text" name="project" id="project" value="<?php echo e($datas['project']); ?>" class="form-control project"></td>

                         <td><select class="form-control" id="status">
                          <?php foreach($datas['complete_stat'] as $cstat): ?>
                            <?php if($cstat['value'] == $datas['status']): ?>
                            <option value="<?php echo e($cstat['value']); ?>" selected="selected"><?php echo e($cstat['title']); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($cstat['value']); ?>"><?php echo e($cstat['title']); ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select></td>

                         <td></td>
                       
                      <td><a class="btn btn-primary" onClick="filterData()"><i class="fa fa-search"></i>Filter</a></td>
                      </tr>
                      <?php ($i = 1); ?>
                     <?php foreach($datas['tasks'] as $task): ?>
                     <?php ($acheck = \App\StaffTask::checkAssign($task->id)); ?>
                     <tr>
                        <td><?php echo e($i); ?></td>
                        <td><a href="#" data-toggle="modal" data-target="#modal-task-<?php echo e($task->id); ?>"><?php echo e(\App\library\Settings::getLimitedWords($task->title,0,10)); ?> (<?php echo e(\App\StaffKra::getTitle($task->kra)); ?>)</a>
                        
                        <?php if($task->task_to != $task->task_from && $task->accept_status != 1): ?>
                        <span class="label label-warning">Not Accepted</span>
                        <?php endif; ?>
                        
                        <?php echo $acheck > 0 ? '<span class="assign label bg-blue" onclick="viewAssign('.$task->id.')">Assigned</span>' : '';?>
                      </td>
                        <td><?php echo e(\App\Adjustment_staff::getName($task->task_from)); ?></td>
                        <td><?php echo e(\App\Adjustment_staff::getName($task->task_to)); ?>

                         <?php if(\App\Adjustment_staff::checkOnline($task->task_to)): ?>
                            <span class="label label-success" style="width:5px;height:5px; display:inline-block;border-radius:50% !important;padding:0px;"></span>
                        <?php endif; ?>
                        </td>
                        <?php ($members = \App\TaskChatGroup::getMembers($task->id)); ?>
                        <td style="width:10%">
                        <?php foreach($members as $member): ?>
                        <p><?php echo e(isset($member->staff->name) ? $member->staff->name : ''); ?></p>
                        <?php endforeach; ?>
                        </td>
                        <td><?php echo e($task->weightage); ?></td>
                        <td><?php echo e($task->project); ?></td>
                        <td><?php echo \App\TaskJobs::getStatusSpan($task->complete_status,$task->finish_time); ?></td>
                        <td><?php echo e($task->finish_time); ?></td>
                      <td>

                        <?php 
                            $message = \App\TaskChat::getUnreadMessage($task->id); 
                            $total_message = \App\TaskChat::getAllUnreadMessage($task->id);
                            $total_job = \App\TaskJobs::TotalJob($task->id);
                            $rem_job = \App\TaskJobs::TotalPendingJob($task->id);
                        ?>

                        <?php if($task->complete == 1 && $task->complete_status != 1 && $task->task_from == auth()->guard('staffs')->user()->id && $task->task_from != $task->task_to): ?>
                    <button  onclick="approve('modal-approve','<?php echo e($task->id); ?>','<?php echo e($task->self_mark); ?>','<?php echo e(addslashes(htmlspecialchars($task->title))); ?>','<?php echo e($task->finish_time); ?>','<?php echo e($task->start_time); ?>','<?php echo e($task->completed_date); ?>')" class="badge bg-purple" data-toggle="modal" data-target="#modal-approve" data-original-title="Approve Complete">Approve</button>
                    <?php endif; ?>
                    <?php if($task->accept_status != 0 && $task->complete != 1 && $task->task_to == auth()->guard('staffs')->user()->id): ?>
                        <button  onclick="complete('modal-complete','<?php echo e($task->id); ?>','<?php echo e(addslashes(htmlspecialchars($task->title))); ?>','<?php echo e($task->task_from); ?>','<?php echo e($task->task_to); ?>','<?php echo e($task->finish_time); ?>','<?php echo e($task->start_time); ?>')" class="badge bg-purple" data-toggle="modal" data-target="#modal-complete" data-original-title="Complete">Complete</button>
                        <?php endif; ?>

                    <button type="button" class="btn btn-box-tool chat-button" data-toggle="tooltip" title="Show Jobs" onclick="showJobs('<?php echo e($task->id); ?>')"><i class="fa fa-plus"></i>
                     <?php if($rem_job > 0): ?>
                      <span class="badge label-danger  chatbadge" style="right: 25px !important;"><?php echo e($rem_job); ?></span>
                      <?php endif; ?>
                       <?php if($total_job > 0): ?>
                      <span class="badge bg-green chatbadge"><?php echo e($total_job); ?></span>
                      <?php endif; ?>
                    </button>
                    
                    <button type="button" class="btn btn-box-tool chat-button" data-toggle="tooltip" title="View Chat" onclick="viewChatModal('modal-message','<?php echo e($task->parent_id ? $task->parent_id :$task->id); ?>')" data-original-title="Contacts"><i class="fa fa-comments"></i>Chat
                     <?php if($message > 0): ?>
                      <span class="badge label-danger chatbadge"><?php echo e($message); ?></span>
                      <?php endif; ?>
                      <?php if($total_message > 0): ?>
                      <span class="badge bg-green chatbadge" style="right: 25px !important;"><?php echo e($total_message); ?></span>
                      <?php endif; ?>
                    </button>
                    
                       <?php if($task->task_from == auth()->guard('staffs')->user()->id): ?>
                        
                      <a href="<?php echo e(url('/branchadmin/tasks/edit/'.$task->id)); ?>" type="button" class="btn btn-box-tool" data-original-title="Contacts">
                      <i class="fa fa-edit"></i></a>
                       <a href="#" onclick="confirmDelete('<?php echo e($task->id); ?>')" type="button" class="btn btn-box-tool" data-original-title="Contacts">
                      <i class="fa fa-trash"></i></a>
                      <?php endif; ?>

                       <?php if($task->complete_status != 1): ?>
                      <?php if($task->task_from == auth()->guard('staffs')->user()->id || $task->task_to == auth()->guard('staffs')->user()->id): ?>
                      <button data-toggle="modal" data-target="#modal-default" title="" onclick="viewModal('modal-default','<?php echo e($task->id); ?>','<?php echo e($task->task_to); ?>','<?php echo e($task->num_task); ?>')" class="badge bg-yellow" data-original-title="Add Job">Add Job
                     
                      
                      </button>
                      <?php endif; ?>
                      <?php endif; ?>
                      <?php if($task->accept_status != 1 && $task->task_to == auth()->guard('staffs')->user()->id && $task->task_to != $task->task_from): ?>
                      <button data-toggle="tooltip" title="Accept" onclick="acceptJob('<?php echo e($task->id); ?>')" class="badge bg-green" data-original-title="Accept">Accept</button>
                      <?php endif; ?>

                      <?php if($task->complete_status != 1 && $task->task_to == auth()->guard('staffs')->user()->id): ?>
                      <button data-toggle="tooltip" title="Assign Task" onclick="assignTask('<?php echo e($task->id); ?>')" class="badge bg-blue" data-original-title="Assign Task">Assign</button>
                       <?php if(in_array($task->id,$datas['task_ids'])): ?>
                      <button data-toggle="tooltip" title="Stop Task" onclick="stopTask('<?php echo e($task->id); ?>')" class="badge bg-blue" data-original-title="Stop Task">Stop</button>
                      <?php else: ?>
                       <button data-toggle="tooltip" title="Start Task" onclick="startTask('<?php echo e($task->id); ?>','<?php echo e($task->kra); ?>','<?php echo e(addslashes(htmlspecialchars($task->title))); ?>')" class="badge bg-blue" data-original-title="Start Task">Start</button>
                       <?php endif; ?>
                      <?php endif; ?>

                      </td>
                      </tr>
                     

                      <div class="modal fade" id="modal-task-<?php echo e($task->id); ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><?php echo e($task->title); ?></h4>
                              </div>
                             
                              <div class="modal-body">
                                  <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    KRA
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e(\App\StaffKra::getTitle($task->kra)); ?>

                                  </div>

                                             
                              </div>
                                <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    Start Date
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->start_time); ?>

                                  </div>

                                             
                              </div>

                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    Deadline
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->finish_time); ?>

                                  </div>
                                  
                                             
                              </div>
                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    Weightage
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->weightage); ?>

                                  </div>
                                  
                                             
                              </div>
                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    Description
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->description); ?>

                                  </div>
                                  
                                             
                              </div>

                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    Status
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo \App\TaskJobs::getSpan($task->accept_status,$task->complete_status,$task->finish_time); ?>
                                  </div>
                                  
                                             
                              </div>

                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    Priority
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e(\App\TaskJobs::getPriority($task->priority)); ?>

                                  </div>
                                  
                                             
                              </div>

                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    Remarks
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->remarks); ?>

                                  </div>
                                  
                                             
                              </div>

                              <?php if($task->complete_status == 1): ?>
                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                    Completed In
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->completed_date); ?>

                                  </div>
                                  
                                             
                              </div>
                              <?php endif; ?>

                               <?php if($task->self_mark > 0): ?>
                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                   Self Rating
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->self_mark); ?>

                                  </div>
                                  
                                             
                              </div>
                              <?php endif; ?>
                               <?php if($task->supervisor_mark > 0): ?>
                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                   Task Giver Rating
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->supervisor_mark); ?>

                                  </div>
                                  
                                             
                              </div>
                              <?php endif; ?>

                             
                              <?php if($task->supervisor_remarks != ''): ?>
                              <div class="row mb20">
                                  <label class="col-md-4 control-label">
                                   Task Giver Remarks
                                  </label>
                                  <div class="col-md-8">
                                    <?php echo e($task->supervisor_remarks); ?>

                                  </div>
                                  
                                             
                              </div>
                              <?php endif; ?>
                              
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                      </div>
                      <?php ($i++); ?>
                     <?php endforeach; ?>

                     </tbody>
                      

                    </table> 


          </div><!-- /.box-body -->
      </div>
    </div>
  <div>

 <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
          <?php echo $datas['tasks']->render();?>
      </div>
    </div>
  </div>
  
<div class="modal fade" id="modal-complete">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="complete-title">Complete Task</h4>
              </div>
              <form id="job-form" method="POST" action="<?php echo e(url('/branchadmin/task/complete')); ?>" class="form-horizontal" enctype="multipart/form-data">
              <div class="modal-body">
                
                  <?php echo csrf_field(); ?>

               <input type="hidden" name="task_id" id="task_id" value="">
               <div class="form-group" ><div id="help-status" class="col-md-12"></div></div>
               <div class="form-group">
                <label class="control-label col-md-4 ">Your Rating (Out of 10)</label>         
                <div class="col-md-6">
                  <input class="form-control" name="self_mark" required="required" placeholder="10" value="" type="text">
                                          
                 </div>
                                        
              </div>


              <div class="form-group">
                       
                <div class="col-md-12">
                  <textarea class="form-control" name="remarks" required="required" placeholder="Remarks"></textarea>
                                          
                 </div>
                                        
              </div>

                              
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


   <div class="modal fade" id="modal-assign">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="assign-title">assign Task</h4>
              </div>
              <form id="job-form" method="POST" action="<?php echo e(url('/branchadmin/tasks/assign')); ?>" class="form-horizontal" enctype="multipart/form-data">
              <div class="modal-body">
                
                  <?php echo csrf_field(); ?>

               <input type="hidden" name="task_id" id="assign_task_id" value="">
               <div class="col-md-12">
               <?php foreach($datas['staffs'] as $staff): ?>
                  <div class="form-group">
                    <label>
                      <input type="checkbox" name="assign[]" value="<?php echo e($staff->id); ?>" class="minimal">
                      <?php echo e($staff->name); ?>

                    </label>
                   
                  </div>
                  <?php endforeach; ?>
                </div>
                   <div style="clear: both;"> </div>          
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Assign</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  <div class="modal fade" id="modal-assignjob">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="assign-title">assign Task</h4>
              </div>
              <form id="job-form" method="POST" action="<?php echo e(url('/branchadmin/job/assign')); ?>" class="form-horizontal" enctype="multipart/form-data">
              <div class="modal-body">
                
                  <?php echo csrf_field(); ?>

               <input type="hidden" name="job_id" id="assign_job_id" value="">
               <div class="col-md-12">
               <?php foreach($datas['staffs'] as $staff): ?>
                  <div class="form-group">
                    <label>
                      <input type="checkbox" name="assign[]" value="<?php echo e($staff->id); ?>" class="minimal">
                      <?php echo e($staff->name); ?>

                    </label>
                   
                  </div>
                  <?php endforeach; ?>
                </div>
                   <div style="clear: both;"> </div>          
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Assign</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  <div class="modal fade" id="modal-assigned">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="assigned-title">Assigned Staffs</h4>
              </div>
             
              <div class="modal-body">
                
                 
               <div class="col-md-12" id="assigned_staffs">
               
                </div>
                   <div style="clear: both;"> </div>          
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


  <div class="modal fade" id="modal-approve">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="approve-title">Approve Task</h4>
              </div>
              <form id="job-form" method="POST" action="<?php echo e(url('/branchadmin/task/approve')); ?>" class="form-horizontal" enctype="multipart/form-data">
              <div class="modal-body">
                
                  <?php echo csrf_field(); ?>

               <input type="hidden" name="task_id" id="task_id" value="">
               <div class="form-group" ><div id="approve-status" class="col-md-12"></div></div>
               <div class="form-group">
                  <label class="control-label col-md-4 ">Self Rating (Out of 10)</label>                    
                <div class="col-md-6">
                  <input class="form-control" readonly="readonly" placeholder="Job title" id="self_mark" value="" type="text">
                                          
                 </div>
                                        
              </div>
               <div class="form-group">
                <label class="control-label col-md-4 ">Your Rating (Out of 10)</label>         
                <div class="col-md-6">
                  <input class="form-control" name="supervisor_mark" placeholder="10" value="" type="text">
                                          
                 </div>
                                        
              </div>

                 <div class="form-group">
                <label class="control-label col-md-4 ">Skip Rating</label>         
                <div class="col-md-6">
                  <input  name="skip_rating" value="1" type="checkbox">
                                          
                 </div>
                                        
              </div>
              <div class="form-group">
                       
                <div class="col-md-12">
                  <textarea class="form-control" name="supervisor_remarks" id="supervisor_remarks" required="required" placeholder="Remarks"></textarea>
                                          
                 </div>
                                        
              </div>

                              
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="reopenTask()">Reopen</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  <div class="modal fade" id="modal-default">
          <div class="modal-dialog" style="width: 900px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Jobs</h4>
              </div>
              <form id="job-form" method="POST" action="<?php echo e(url('/branchadmin/tasks/saveJob')); ?>" class="form-horizontal" enctype="multipart/form-data">
              <div id="modal_default_body" class="modal-body">
                <input type="hidden" name="staff_id" id="staff_id" value="">
                <input type="hidden" id="type" value="">
                  <?php echo csrf_field(); ?>

               <input type="hidden" name="task_id" id="task_id" value="">
               <div class="row" id="jobrowid0" style="margin-bottom:5px;">
                  <div class="col-md-2">
                    <input class="form-control" name="jobs[0][job_title]" required="required" placeholder="Job title" value="" type="text">
                  </div>

                  <div class="col-md-2">
                    <input class="form-control date" name="jobs[0][finish_time]" required="required" placeholder="Deadline" value="" type="text">
                  </div>
                  <div class="col-md-5">
                    <textarea class="form-control" name="jobs[0][description]" placeholder="Description"></textarea>
                  </div>
                  <div class="col-md-2" id="pr-field">
                     <select class="form-control" id="priority" name="jobs[0][priority]">
                          <?php foreach($datas['priorities'] as $prt): ?>
                            <?php if($prt['value'] == $datas['priority']): ?>
                            <option value="<?php echo e($prt['value']); ?>" selected="selected"><?php echo e($prt['title']); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($prt['value']); ?>"><?php echo e($prt['title']); ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                  </div>
                  <div class="col-md-1">
                    <button type="button" class="btn btn-danger" onclick="$('#jobrowid0).remove();"><i class="fa fa-trash"></i></button>
                  </div>

               </div>
               
                 
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" onclick="addMoreJob()" >Add More Job</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

 <!--<div class="modal fade direct-chat direct-chat-warning" id="modal-message">-->
 <!--         <div class="modal-dialog">-->
 <!--           <div class="modal-content">-->
 <!--             <div class="modal-header">-->
 <!--               <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
 <!--                 <span aria-hidden="true">&times;</span></button>-->
 <!--               <h4 class="modal-title">Messages</h4>-->
 <!--             </div>-->
 <!--             <div class="modal-body">-->
 <!--               <div class="box-body" style="">-->
                  <!-- Conversations are loaded here -->
 <!--                 <div id="message-box" class="direct-chat-messages">-->
                    <!-- Message. Default to the left -->
                  
                   
                    <!-- /.direct-chat-msg -->


 <!--                 </div>-->
                  <!--/.direct-chat-messages-->

                  <!-- Contacts are loaded here -->
                  
                  <!-- /.direct-chat-pane -->
 <!--               </div>-->
                
                
 <!--               <div class="box-footer" style="">-->
                  
 <!--                   <div class="input-group">-->
 <!--                     <input type="hidden" id="message-task-id" value="">-->
 <!--                     <textarea class="form-control" id="text-message" placeholder="Type Message ....."></textarea>-->
                      
 <!--                     <span class="input-group-btn">-->
 <!--                           <button type="button" id="button-upload"  class="btn btn-success btn-flat"><i class="fa fa-paperclip"></i></button>-->
 <!--                         </span>-->
 <!--                     <span class="input-group-btn">-->
 <!--                           <button type="button" onClick="sendMessage()" class="btn btn-warning btn-flat">Send</button>-->
 <!--                         </span>-->
 <!--                   </div>-->
                  
 <!--               </div>-->
 <!--             </div>-->
             
 <!--           </div>-->
            <!-- /.modal-content -->
 <!--         </div>-->
          <!-- /.modal-dialog -->
 <!--       </div>-->

<div class="modal fade " id="modal-jobs">
          <div class="modal-dialog" style="width:900px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Jobs</h4>
              </div>
              <div class="modal-body">
                <div id="job-box" class="box-body" style="">
                  <!-- Conversations are loaded here -->
                
                 
                </div>
                
                
              
              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        
<div class="modal fade direct-chat direct-chat-warning bd-example-modal-lg" id="modal-message">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Messages</h4>
          </div>
          <div class="modal-body">
            <div class="box-body" style="">
              <div class="row" style="padding: 5px;">
                <div class="col-md-8 box-body">
                  <!-- Conversations are loaded here -->
                  <div id="message-box" class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    <!-- /.direct-chat-msg -->
                  </div>
                  <!--/.direct-chat-messages-->
                  <!-- Contacts are loaded here -->
                  <!-- /.direct-chat-pane -->
                </div>
                <div class="col-md-4 box-body" style="border: 1px solid #bdbdbd; padding: 5px;">
                  <p> <u>Member</u> </p>
                  <div id="member-box" class="direct-chat-messages"></div>
                </div>
              </div>
            </div>
            <div class="box-footer" style="">

              <div class="input-group">
                <input type="hidden" id="message-task-id" value="">
                <textarea class="form-control" id="text-message" placeholder="Type Message ....."></textarea>

                <span class="input-group-btn">
                  <button type="button" id="button-upload" class="btn"><i class="fa fa-paperclip"></i></button>
                </span>
                <span class="input-group-btn">
                  <button type="button" onClick="sendMessage()" class="btn sendbtn btn-flat">Send</button>
                </span>
                <span class="input-group-btn" id="authorizeAssignBtn">
                  <button type="button" id="addmembers" onClick="addMember()" class="btn btn-info btn-flat">Add
                    Members</button>
                </span>
              </div>

            </div>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
<div class="modal fade" id="modal-assignUser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="assign-title">assign User to Chat</h4>
      </div>
      <form id="job-form" method="POST" action="<?php echo e(url('/branchadmin/task/addusertochat')); ?>" class="form-horizontal"
        enctype="multipart/form-data">
        <div class="modal-body" style="max-height: 500px; overflow-y: scroll;">
          <?php echo csrf_field(); ?>

          <input type="hidden" id="add_user_task_id" name="taskId">
          <div class="col-md-12">
            <div id="listUserForChat"></div>
          </div>
          <div style="clear: both;"> </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Assign</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<script src="<?php echo e(asset('lightbox/lightbox.js')); ?>"></script>
<script type="text/javascript">

  function showJobs(id) {

    var token = $('input[name=\'_token\']').val();
    $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/branchadmin/task/jobs")); ?>',
            data: '_token='+token+'&id='+id,
            cache: false,
            success: function(html){
              $('#job-box').html(html);
              $('#modal-jobs').modal('show');
               
            }
      });
   
  }


  function viewAssign(id) {

    var token = $('input[name=\'_token\']').val();
    $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/branchadmin/tasks/assignedstaff")); ?>',
            data: '_token='+token+'&id='+id,
            cache: false,
            success: function(html){
              $('#assigned_staffs').html(html);
              $('#modal-assigned').modal('show');
               
            }
      });
   
  }

  function assignTask(id) {
    $('#assign_task_id').val(id);
    $('#modal-assign').modal('show');
   
  }

  function assignJob(id) {
    $('#assign_job_id').val(id);
    $('#modal-jobs').modal('hide');
    $('#modal-assignjob').modal('show');
   
  }
  function viewModal(div,task_id,staff_id,type)
  {
    $('#'+div+' #staff_id').val(staff_id);
    $('#'+div+' #task_id').val(task_id);
    $('#'+div+' #type').val(type);

    $('#modal_default_body #default_file').remove();
    if (type > 0) {
      $('#modal_default_body #priority').fadeOut();
      html = '<div id="default_file" class="form-group"><div class="col-md-12"><input class="form-control" name="jobs[0][file]" placeholder="Upload Document" value="" type="file"></div></div>';
      $('#pr-field').append(html);
    } else{
      $('#modal_default_body #priority').fadeIn();
    }
    
     $('.date').datepicker({
      autoclose: true,
      onClose: function(){
        var value = $(this).val();
      $('.date').val(value);
     }
    })
  }

  function viewChatModal(div,task_id)  //changed
  {
    var token = $('input[name=\'_token\']').val();
    $.ajax({
        type: 'POST',
          url: '<?php echo e(url("/branchadmin/task/getmessage")); ?>',
          data: '_token='+token+'&id='+task_id,
          cache: false,
          success: function(html){
            var datas = html.split('|');
            if (datas[0] == 'Success') {
              console.log(datas[1]);
              $('#message-box').html(datas[1]);
              $('#text-message').val('');
              var div = document.getElementById('message-box');
              div.scrollTop = div.scrollHeight - div.clientHeight;
            } else{
              alert(datas[1])
            }
          }
    });
    $.ajax({
      type: 'POST',
        url: '<?php echo e(url("/branchadmin/task/getmembers")); ?>',
        data: '_token='+token+'&id='+task_id,
        cache: false,
        success: function(data){
          $('#member-box').html(data);
        }
    });
    $('#addmembers').attr('task_id', task_id);
    $('#authorizeAssignBtn').hide();
    $.ajax({
      type: 'POST',
        url: '<?php echo e(url("/branchadmin/task/authorizeAssign")); ?>',
        data: '_token='+token+'&id='+task_id,
        cache: false,
        success: function(data){
          if(data==1){
            $('#authorizeAssignBtn').show();
          }
        }
    });
    $('#'+div+' #message-task-id').val(task_id);
    var div = document.getElementById('message-box');
    $('#modal-message').modal('show');
    div.scrollTop = div.scrollHeight - div.clientHeight;
  }
  function addMember() //changed
  {
    var id = $('#addmembers').attr('task_id')
    $('#add_user_task_id').val(id);
    var token = $('input[name=\'_token\']').val();
    $.ajax({
        type: 'get',
          url: '<?php echo e(url("/branchadmin/task/getUsersListForChat")); ?>',
          data: '_token='+token+'&id='+id,
          cache: false,
          success: function(data){
            $('#listUserForChat').html(data);
            console.log(data)
          }
    });
    $('#modal-assignUser').modal('show');

  }
  function removeChatMember(taskId, userId) //changed
  {
    var token = $('input[name=\'_token\']').val();
    $.ajax({
        type: 'get',
          url: '<?php echo e(url("/branchadmin/task/removeMember")); ?>',
          data: '_token='+token+'&task_id='+taskId+'&user_id='+userId,
          cache: false,
          success: function(data){
            $.ajax({
                type: 'POST',
                  url: '<?php echo e(url("/branchadmin/task/getmembers")); ?>',
                  data: '_token='+token+'&id='+taskId,
                  cache: false,
                  success: function(data){
                    $('#member-box').html('');
                    $('#member-box').html(data);
                  }
            });
            $('#addmembers').attr('task_id', taskId);
          }
    });
    
  }

  function approve(div,id,self_mark,task_title,h_date,s_date,completed) {
    $('#'+div+' #task_id').val(id);
    $('#'+div+' #self_mark').val(self_mark);
    $('#'+div+' #approve-title').html('Approve Task ('+task_title+')')
    var date2 = new Date(h_date);
    var date1 = new Date(completed);
    var date3 = new Date(s_date)
    var timeDiff = Math.abs(date2.getTime() - date1.getTime());
    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
    
    var stimeDiff = Math.abs(date3.getTime() - date2.getTime());
    var sdiffDays = Math.ceil(stimeDiff / (1000 * 3600 * 24));
    
    message = '<span class="label label-primary">Task Given for '+sdiffDays+' Days </span>';
    if(date1 > date2){
        message += '<span class="label label-danger">'+diffDays+' Days crossed the Deadline</span>';
    }else{
     message += '<span class="label label-success">Finished Task in '+diffDays+' Days Earlier</span>';
    }
    $('#approve-status').html(message);

  }

   function complete(div,id,task_title,task_from,task_to,h_date,s_date) {
       if(task_from != task_to){
    $('#'+div+' #task_id').val(id);
    $('#'+div+' #self_mark').val(self_mark);
    $('#'+div+' #complete-title').html('Complete Task ('+task_title+')')
    var date2 = new Date(h_date);
    var date1 = new Date();
   var date3 = new Date(s_date)
    var timeDiff = Math.abs(date2.getTime() - date1.getTime());
    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
    
    var stimeDiff = Math.abs(date3.getTime() - date2.getTime());
    var sdiffDays = Math.ceil(stimeDiff / (1000 * 3600 * 24));
    
    message = '<span class="label label-primary">Task Given for '+sdiffDays+' Days </span>';
    if(date1 > date2){
        message += '<span class="label label-danger">'+diffDays+' Days crossed the Deadline</span>';
    }else{
     message += '<span class="label label-success">Finished Task in '+diffDays+' Days Earlier</span>';
    }
    $('#help-status').html(message);
       } else{
            var url= "<?php echo e(url('/branchadmin/tasks/selfcomplete/')); ?>"+"/"+id;
            location = url;
       }

  }

function sendMessage() //changed
  {  
    var message = $('#text-message').val();
    var token = $('input[name=\'_token\']').val();
    var id = $('#message-task-id').val();
    if (message != '') {
      $.ajax({
          type: 'POST',
              url: '<?php echo e(url("/branchadmin/task/message")); ?>',
              data: 'message='+message+'&_token='+token+'&id='+id,
              cache: false,
              success: function(html){
                if (html == 'Success') {
                  $.ajax({
                      type: 'POST',
                        url: '<?php echo e(url("/branchadmin/task/getmessage")); ?>',
                        data: '_token='+token+'&id='+id,
                        cache: false,
                        success: function(html){
                          var datas = html.split('|');
                          if (datas[0] == 'Success') {
                            console.log(datas[1]);
                            $('#message-box').html(datas[1]);
                          } else{
                            
                          }
                        }
                  });
                  $('#text-message').val('');
                  var div = document.getElementById('message-box');
                  div.scrollTop = div.scrollHeight - div.clientHeight;
                }
              }
      });
    }else{
      $('#text-message').focus();
    }
  }
 </script>


<script type="text/javascript">
  
     function confirmDelete(ids){
    if(confirm('Do You Want To Delete This Task?')){
      var url= "<?php echo e(url('/branchadmin/task/delete/')); ?>/"+ids;
      location = url;
      
      }
    }
</script>


<script type="text/javascript">

 
      
  function filterData(){
        var url= "<?php echo e(url('/branchadmin/tasks/?')); ?>";
        
        var filter_title = $('#filter_title').val();
        var task_from = $('#task_from').val();
        var task_to = $('#task_to').val();
        var project = $('#project').val();
        var status = $('#status').val();
        var priority = $('#priority').val();
        
        if(filter_title != '') {

          url += '&filter_title='+ encodeURIComponent(filter_title);
        }
         if(task_from != '') {

          url += '&task_from='+task_from
        }

        if(task_to != '') {

          url += '&task_to='+task_to
        }

        if(project != '') {

          url += '&project='+ encodeURIComponent(project)
        }

        if(status != '') {

          url += '&status='+status
        }

        if(priority != 0) {

          url += '&priority='+priority
        }
        
        location = url;

      }

       
  </script>


<script type="text/javascript">
  $('#button-upload').on('click', function()  //changed
      {
        $('#form-upload').remove();
        var task_id = $('#message-task-id').val();
        var token = $('input[name=\'_token\']').val();
        $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" id="file" name="file" multiple value="" /><input type="text" name="_token" value="<?php echo e(csrf_token()); ?>" /><input type="text" name="task_id" value="'+task_id+'" /></form>');

        $('#form-upload #file').trigger('click');

        if (typeof timer != 'undefined') {
          clearInterval(timer);
        }

        timer = setInterval(function() {
          if ($('#form-upload #file').val() != '') {
            clearInterval(timer);

            $.ajax({
              url: '<?php echo e(url("/branchadmin/task/uploadchat/")); ?>',
              type: 'post',
              
              data: new FormData($('#form-upload')[0]),
              cache: false,
              contentType: false,
              processData: false,
              beforeSend: function() {
                $('#button-upload i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
                $('#button-upload').prop('disabled', true);
              },
              complete: function() {
                $('#button-upload i').replaceWith('<i class="fa fa-paperclip"></i>');
                $('#button-upload').prop('disabled', false);
              },
              success: function(data) {
                if (data == 'Success') {
                  $.ajax({
                      type: 'POST',
                        url: '<?php echo e(url("/branchadmin/task/getmessage")); ?>',
                        data: '_token='+token+'&id='+task_id,
                        cache: false,
                        success: function(html){
                          var datas = html.split('|');
                          if (datas[0] == 'Success') {
                            $('#message-box').html(datas[1]);
                          } 
                        }
                  });
                  $('#text-message').val('');
                  var div = document.getElementById('message-box');
                  div.scrollTop = div.scrollHeight - div.clientHeight;
                } else{
                  alert(datas[1])
                }
              },
              error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
              }
            });
          } 
        }, 500);
      });
</script>

<div class="modal fade " id="modal-jobs-edit">
          <div class="modal-dialog" style="width: 900px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Jobs</h4>
              </div>
              <form id="job-edit-form" method="POST" action="<?php echo e(url('/branchadmin/tasks/updateJob')); ?>" class="form-horizontal" enctype="multipart/form-data">
                  <input type="hidden" id="job-edit-id" name="job_id" value="">
                
              <div class="modal-body">
                <div class="box-body" style="">
                  
                <textarea  id="edit-job-title" class="form-control" name="title"></textarea>
                 
                </div>
                
                
              
              </div>
             <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
</form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<script type="text/javascript">
    $('.project').autocomplete({

    source: '<?php echo e(url("branchadmin/getProject/")); ?>',
          minlength:1,
          autoFocus:true,
          select:function(e,ui){
            $(this).val(ui.item.value);
             
          }

    });

    function acceptJob(id) {
      if(confirm('Do You Want Accept This Task?')){
      var url= "<?php echo e(url('/branchadmin/tasks/accept/')); ?>/"+id;
      location = url;
      
      }
    }
    
     function deleteJob(id) {
      if(confirm('Do You Want Delete This Job?')){
      var url= "<?php echo e(url('/branchadmin/tasks/deletejob/')); ?>/"+id;
      location = url;
      
      }
    }
    
     function editJob(id) {
      if(confirm('Are you sure you want to edit this job?')){
          var token = $('input[name=\'_token\']').val();
        $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/branchadmin/task/getJob")); ?>',
            data: 'id='+id+'&_token='+token,
            cache: false,
            success: function(html){
              var datas = html.split('|');
              if (datas[0] == 'Success') {
                  $('#job-edit-id').val(id);
                $('#edit-job-title').val(datas[1]);
                $('#modal-jobs').modal('hide');
                 $('#modal-jobs-edit').modal('show');
              } else{
                alert(datas[1])
              }
                
               
            }
      });
      
     
      
      }
    }
  </script>
  
   <script type="text/javascript">
    var jobrowid = 1;
    function addMoreJob() {
      var type = $('#type').val();
      if (type > 0) {
      
     var priority = '<div id="default_file" class="col-md-2" class="form-group" ><input class="form-control" name="jobs['+jobrowid+'][file]" placeholder="Upload Document" value="" type="file"></div>';
      
    } else{
      var priority = '<div class="col-md-2" id="pr-field"> <select class="form-control" id="priority" name="jobs['+jobrowid+'][priority]"> <?php foreach($datas["priorities"] as $prt): ?> <option value="<?php echo e($prt["value"]); ?>"><?php echo e($prt["title"]); ?></option> <?php endforeach; ?></select></div>';
    }
      html = '<div class="row" id="jobrowid'+jobrowid+'" style="margin-bottom:5px;"><div class="col-md-2"><input class="form-control" name="jobs['+jobrowid+'][job_title]" required="required" placeholder="Job title" value="" type="text"></div>';

      html += '<div class="col-md-2"><input class="form-control date" name="jobs['+jobrowid+'][finish_time]" required="required" placeholder="Deadline" value="" type="text"></div>';
      html += '<div class="col-md-5"><textarea class="form-control" name="jobs['+jobrowid+'][description]" placeholder="Description"></textarea></div>';
      html += priority;           
      html += '<div class="col-md-1"><button type="button" class="btn btn-danger" onclick="$(\'#jobrowid'+jobrowid+'\').remove();"><i class="fa fa-trash"></i></button></div> </div>';

      $('#modal_default_body').append(html);
      jobrowid++;

      $('.date').datepicker({
      autoclose: true
    })
    }
  </script>
  
  <script type="text/javascript">
     function reopenTask() {
      if(confirm('Are you sure you want re-open this task?')){
          var id = $('#modal-approve #task_id').val();
          var remarks = $('#module-approve #supervisor_remarks').val();
          var token = $('input[name=\'_token\']').val();
          if(id != ''){
              $.ajax({
                 type: 'POST',
                    url: '<?php echo e(url("/branchadmin/tasks/reopen")); ?>',
                    data: 'id='+id+'&_token='+token+'&remarks='+remarks,
                    cache: false,
                    success: function(html){
                      var datas = html.split('|');
                      if (datas[0] == 'Success') {
                          
                        $('#modal-approve').modal('hide');
                        alert(datas[1])
                         
                      } else{
                        alert(datas[1])
                      }
                        
                       
                    }
              });
          } 
          else{
              alert('Sorry Task was not selected');
          }
     
      
      }
    }
    
    
    function deleteChat(id) {
      if(confirm('Do You Want Delete This Chat?')){
      var token = $('input[name=\'_token\']').val();
        
        if (id != '') {
          $.ajax({
             type: 'POST',
                url: '<?php echo e(url("/branchadmin/task/deleteChat")); ?>',
                data: '_token='+token+'&id='+id,
                cache: false,
                success: function(html){
                  var datas = html.split('|');
                  if (datas[0] == 'Success') {
                    $('#chat_'+id).remove();
                    
                  } else{
                    alert(datas[1])
                  }
                    
                   
                }
          });
        }
      
      }
    }

    function startTask(task_id,kra,title) {
      var token = $('input[name=\'_token\']').val();
        
        if (task_id != '') {
          $.ajax({
             type: 'POST',
                url: '<?php echo e(url("/branchadmin/daily-routine/tasksave")); ?>',
                data: '_token='+token+'&task_id='+task_id+'&kra='+kra+'&title='+title,
                cache: false,
                success: function(html){
                 location.reload(); 
                 
                }
          });
        }
    }

    function stopTask(task_id) {
      var token = $('input[name=\'_token\']').val();
        
        if (task_id != '') {
          $.ajax({
             type: 'POST',
                url: '<?php echo e(url("/branchadmin/daily-routine/taskstop")); ?>',
                data: '_token='+token+'&task_id='+task_id,
                cache: false,
                success: function(html){
                 location.reload(); 
                 
                }
          });
        }
    }
  </script>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>