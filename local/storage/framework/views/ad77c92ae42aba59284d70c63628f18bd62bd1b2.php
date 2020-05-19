<?php $__env->startSection('heading'); ?>
On Boarding Staffs 
            <small>List of On Boarding Staffs </small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">On Boarding Staffs </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('/assets/plugins/ckeditor/ckeditor.js')); ?>"></script>
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">On Board Staff</h3>
               
                <div class="pull-right">
                <a href="<?php echo e(url('/supervisor/on-boarding/addnew')); ?>" class="btn btn-primary">Add OnBoardingStaff</a>
                </div>
               
              </div>
              <div class="box-body">
                 <table id="dataTable" class="table table-bordered table-hover">
                   <thead>
                    <tr>
                     <th>SN</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Supervisor</th>
                     <th>HR</th>
                     <th>Trail Period</th>
                     <th>Joining Date</th>
                     <th>Action</th>
                   </tr>
                  </thead>
                  <tbody>
                  <?php foreach($staffs as $k=>$staff): ?>
                  <tr>
                    <td><?php echo e($k+1); ?></td>
                    <td><?php echo e($staff->name); ?></td>
                    <td><?php echo e($staff->email); ?></td>
                    <td>
                     
                        <?php if($staff->supervisor_approval == null && auth()->guard('staffs')->user()->id == $staff->supervisor_id): ?>
                          <button type="button" class="btn btn-primary" onclick="approveSupervisor('<?php echo e($staff->id); ?>')">
                              Approval
                          </button>
                        <?php elseif($staff->supervisor_approval == null && auth()->guard('staffs')->user()->id != $staff->supervisor_id): ?>
                          <p class="badge bg-yellow">On Process</p>
                        <?php elseif($staff->supervisor_approval=='accepted'): ?>
                        <p class="label label-success"><?php echo e($staff->supervisor_approval); ?></p>
                        <?php else: ?>
                        <p class="label label-danger"><?php echo e($staff->supervisor_approval); ?></p>
                        <?php endif; ?>
                     
                        
                      
                      </td>
                      <td>
                       
                          <?php if($staff->supervisor_approval=='accepted' && $staff->hr_approval==null): ?>
                            <button type="button" class="btn btn-primary" onclick="approveHr('<?php echo e($staff->id); ?>')">
                                Approval
                            </button>
                        <?php elseif($staff->supervisor_approval==null): ?>
                          <p class="badge bg-yellow">On Process</p>
                        <?php elseif($staff->hr_approval=='rejected'): ?>
                        <p class="label label-danger"><?php echo e($staff->hr_approval); ?></p>
                        <?php else: ?>
                        <p class="label label-success"><?php echo e($staff->hr_approval); ?></p>
                        <?php endif; ?>
                      </td>
                      <td><?php echo e($staff->trail_period==1 ? 'YES' : 'NO'); ?></td>
                      <td>
                          <?php echo e(\Carbon\Carbon::parse($staff->joining_date)->format('M d, Y')); ?>

                      </td>
                      <td>
                          <a type="button" data-toggle="modal" data-target="#view-modal-default-<?php echo e($staff->id); ?>" class="btn btn-success left"><i class="fa fa-eye"></i>
                             
                          </a>
                          <button type="button" onClick="confirm_delete('/<?php echo e($staff->id); ?>')" class="btn btn-danger left"><i class="fa fa-remove"></i>
                          </button>

                          <a href="<?php echo e(url('/supervisor/on-boarding/edit/'.$staff->id)); ?>" class="btn btn-primary left"><i class="fa fa-edit"></i></a>

                          <a href="<?php echo e(route('onBoardStaff.sendmail', $staff->id)); ?>" class="btn btn-info left"><i class="fa fa-paper-plane"></i></a>
             
              
                        </td>
                  </tr>
                 
                  <div class="modal fade bd-example-modal-lg" id="view-modal-default-<?php echo e($staff->id); ?>">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-body">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                          <div style="border-bottom: 1px solid #f4f4f4;">
                            <p style="font-size:20px; color:#3c8dbc"><?php echo e($staff->name); ?></p>
                            <p style="font-size:16; color:grey"><?php echo e($staff->email); ?></p>
                            <p style="font-size:16;"> 
                                <?php if($staff->trail_period): ?>
                                TRAIL
                                <?php else: ?>
                                <?php endif; ?>
                            </p>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <p>Trail from: <?php echo e(\Carbon\Carbon::parse($staff->trail_start_date)->format('M d, Y')); ?></p>
                              <p>Joining date: <?php echo e(\Carbon\Carbon::parse($staff->joining_date)->format('M d, Y')); ?></p>
                            </div>
                            <div class="col-md-6">
                              <p><a href="<?php echo e(asset('/docs/files/'.$staff->cv)); ?>">CV</a></p>
                              <p><a href="<?php echo e(asset('/docs/offerLetter/'.$staff->offer_letter)); ?>">offer letter</a></p>
                            </div>
                          </div>
                          <div style="border-bottom: 1px solid #f4f4f4;">
                              <span style="font-size:20px; color:#3c8dbc"><?php echo e($staff->Supervisor->name); ?></span> &nbsp;&nbsp;
                              <span 
                                class="<?php if($staff->supervisor_approval=='accepted'): ?>
                                label label-primary
                                <?php else: ?>
                                label label-danger
                                <?php endif; ?>">
                                <?php echo e($staff->supervisor_approval); ?>

                              </span> &nbsp;&nbsp;
                              <span>
                                <?php if($staff->supervisor_approval_date): ?>
                                <?php echo e(\Carbon\Carbon::parse($staff->supervisor_approval_date)->format('M d, Y')); ?>

                                <?php endif; ?>
                              </span>
                              <div class="well">
                                  <p><?php echo $staff->supervisor_comment; ?></p>
                              </div>
                          </div>
                          <div style="border-bottom: 1px solid #f4f4f4;">
                              <span style="font-size:20px; color:#3c8dbc">HR</span>
                              <span 
                                class="<?php if($staff->hr_approval=='accepted'): ?>
                                label label-primary
                                <?php else: ?>
                                label label-danger
                                <?php endif; ?>">
                                <?php echo e($staff->hr_approval); ?>

                              </span>
                              <span>
                                <?php if($staff->hr_approval_date): ?>
                                <?php echo e(\Carbon\Carbon::parse($staff->hr_approval_date)->format('M d, Y')); ?>

                                <?php endif; ?>
                              </span>
                              <div class="well">
                                  <p><?php echo $staff->hr_comment; ?></p>
                              </div>
                          </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                  </tbody>
              </table>
               <div class="text-center">
                  <?php echo e($staffs->links()); ?>

                </div>  
            </div>
        </div>
    </div>
  </div>


 <?php /* modals */ ?>
                  <div class="modal fade bd-example-modal-lg" id="approval-modal">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Approval Modal</h4>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo e(url('/supervisor/on-boarding/approve')); ?>" method="post">
                          <?php echo csrf_field(); ?>

                            <div class="form-group">
                              <label for="">Comment</label>
                              <div class="form-input">
                              <textarea id="comment" name="comment" class="form-control" class="editor"></textarea>
                              
                              
                              <script type="text/javascript">
                                CKEDITOR.replace("comment");
                                CKEDITOR.add
                              </script> 
                              <?php /* script call end */ ?>
                              </div>
                            </div>
                            <input type="hidden" id="role" name="role" value="">
                            <input type="hidden" name="date" value="<?php echo e(Date('Y-m-d')); ?>">
                            <input type="hidden" id="id" name="id" value="">
                            <input type="Submit" name="action" value="accept" class="btn btn-success">
                            <input type="Submit" name="action" value="reject" class="btn btn-danger">
                          </form>
                          </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

<script type="text/javascript">
  function approveSupervisor(id) {
    $('#role').val('supervisor');
    $('#id').val(id);
    $('#approval-modal').modal('show');
  }

  function approveHr(id) {
    $('#role').val('hr');
    $('#id').val(id);
    $('#approval-modal').modal('show');
  }
</script>

 <script type="text/javascript">
 function confirm_delete(ids){
    if(confirm('Do You Want To Delete This Fiscal Year?')){
      var url= "<?php echo e(url('/supervisor/on-boarding/delete/')); ?>"+ids;
      location = url;
      
      }
    }
 </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>