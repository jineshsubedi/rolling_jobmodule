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
        <a href="<?php echo e(route('branchadmin.travel.create')); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-plus"></i>Add Travel Request</a>
      </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <ul class="nav nav-tabs">
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('branchadmin.travel.allrequest')); ?>">All Request</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('branchadmin.travel.myTravel')); ?>">My Travel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('branchadmin.travel.index')); ?>">Request Travel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('branchadmin.travel.waitingApproval')); ?>">Waiting Approval
                <span class="label bg-red"><?php echo e(\App\Travel::countApprovalWaiting()); ?></span>
                </a>
              </li>
            </ul>
            <?php /* <h3 class="box-title">Travel Request</h3> */ ?>
        </div>
      <div class="box-body">
        <table class="table table-borderd">
            <tr>
                <th>ID</th>
                <th>Assigned From</th>
                <th>Assigned To</th>
                <th>Type</th>
                <th>Departure Date</th>
                <th>Arrival Date</th>
                <th>Assignment Type</th>
                <th>Assignment Category</th>
                <th>Supervisor</th>
                <th>HR</th>
                <th>Chairman</th>
                <th>Action</th>
            </tr>
            <?php foreach($travels as $k=>$travel): ?>
            <tr>
                <td><?php echo e($travel->unique_id); ?></td>
                <td><?php echo e(\App\Adjustment_staff::getName($travel->assigned_from)); ?></td>
                <td><?php echo e(\App\Adjustment_staff::getName($travel->assigned_to)); ?></td>
                <td><?php echo e(ucwords($travel->type)); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($travel->from)->format('d M, Y')); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($travel->to)->format('d M, Y')); ?></td>
                <td>
                  <?php if($travel->assignment_type == 1): ?>
                  One-day Assignment 
                  <?php elseif($travel->assignment_type == 2): ?>
                  Multiple-day Assignment
                  <?php else: ?>
                <?php endif; ?>
                </td>
                <td>
                  <?php if($travel->assignment_category == 1): ?>
                   Assignment with the Client 
                  <?php elseif($travel->assignment_category == 2): ?>
                   Assignment with the employee
                  <?php elseif($travel->assignment_category == 3): ?>
                   Field Assignment
                  <?php elseif($travel->assignment_category == 4): ?>
                   Business Development 
                  <?php elseif($travel->assignment_category == 5): ?>
                   Client Meeting
                  <?php elseif($travel->assignment_category == 6): ?>
                   Conference 
                  <?php elseif($travel->assignment_category == 7): ?>
                   Training  
                  <?php else: ?>
                  <?php endif; ?>
                </td>
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
                    <?php if($travel->account_approval == 1): ?>
                        <span class="label bg-green">Accept</span>
                    <?php elseif($travel->account_approval == 2): ?>
                        <span class="label bg-red">Cancel</span>
                    <?php elseif($travel->supervisor_approval == 1): ?>
                        <span class="label bg-purple">Pending</span>
                    <?php else: ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($travel->hr_approval == 1): ?>
                        <span class="label bg-green">Accept</span>
                    <?php elseif($travel->hr_approval == 2): ?>
                        <span class="label bg-red">Cancel</span>
                    <?php elseif($travel->account_approval == 1): ?>
                        <span class="label bg-purple">Pending</span>
                    <?php else: ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($travel->chairman_approval == 1): ?>
                        <span class="label bg-green">Accept</span>
                    <?php elseif($travel->chairman_approval == 2): ?>
                        <span class="label bg-red">Cancel</span>
                    <?php elseif($travel->hr_approval == 1): ?>
                        <span class="label bg-purple">Pending</span>
                    <?php else: ?>
                    <?php endif; ?>
                </td>
                <td>
                    <form action="<?php echo e(route('branchadmin.travel.destroy', $travel->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                        <a href="<?php echo e(route('branchadmin.travel.show', $travel->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo e(route('branchadmin.travel.edit', $travel->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger" onclick="confirm('do you want to delete request?')"><i class="fa fa-trash"></i></button>
                        <?php if($travel->supervisor_approval != 1 || $travel->hr_approval != 1 || $travel->chairman_approval != 1): ?>
                            <button type="button" class="btn btn-info" onclick="openTravelChat(<?php echo e($travel->id); ?>)">
                                <i class="fa fa-reply"></i>
                                <span class="label bg-blue"><?php echo e(\App\TravelReply::countreply($travel->id)); ?></span>
                            </button>
                        <?php endif; ?>
                    </form>
                </td>
            </tr>
            <?php /* reply for this row */ ?>
            <tr id="yourRequest<?php echo e($travel->id); ?>" style="display: none;">
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
        </table>
        <div class="text-center">
            <?php echo e($travels->links()); ?>

        </div>
      </div>
    </div>
  </div>

<script>
    var token = $('input[name=\'_token\']').val();
    function openTravelChat(id){
        $('#yourRequest'+id).toggle()
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