<?php $__env->startSection('heading'); ?>
Travel Request
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Travel Request</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('supervisor.travel.create')); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-plus"></i>Add Travel Request</a>
      </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <ul class="nav nav-tabs">
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('supervisor.travel.index')); ?>">Travel Request</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('supervisor.travel.waitingApproval')); ?>">Waiting Approval
                <span class="label bg-red"><?php echo e(\App\Travel::countApprovalWaiting()); ?></span>
                </a>
              </li>
            </ul>
            <?php /* <h3 class="box-title">Travel Request</h3> */ ?>
        </div>
      <div class="box-body">
        <table class="table table-borderd">
            <tr>
                <th>SN</th>
                <th>Type</th>
                <th>Departure Date</th>
                <th>Arrival Date</th>
                <th>Purpose</th>
                <th>Place</th>
                <th>Client</th>
                <th>Amount Request</th>
                <th>Supervisor</th>
                <th>Account</th>
                <th>HR</th>
                <th>Chairman</th>
                <th>Action</th>
            </tr>
            <?php foreach($myRequests as $k=>$travel): ?>
            <tr>
                <td><?php echo e($k+1); ?></td>
                <td><?php echo e(ucwords($travel->type)); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($travel->departure_date)->format('d M, Y')); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($travel->arrival_date)->format('d M, Y')); ?></td>
                <td><?php echo e($travel->purpose); ?></td>
                <td style="width:10%;">
                  <?php if(json_decode($travel->place) == true): ?>
                  <?php ($place = json_decode($travel->place)); ?>
                  <?php
                    for($i=0; $i<count($place); $i++){
                      echo '<label class="badge bg-orange">'.$place[$i].'</label>';
                    } 
                  ?>
                  <?php else: ?>
                  <label class="bg-blue"> <?php echo e($travel->place); ?></label>
                  <?php endif; ?>
                </td>
                <td><?php echo e($travel->client); ?></td>
                <td>
                  <?php if($travel->fixed_amount == 1): ?>
                  <span class="label bg-blue">fixed TADA</span>
                  <?php elseif($travel->advance_amount > 0): ?>
                  <?php echo e($travel->advance_amount); ?>

                  <?php else: ?>
                  --
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
                    <form action="<?php echo e(route('supervisor.travel.destroy', $travel->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                        <a href="<?php echo e(route('supervisor.travel.show', $travel->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo e(route('supervisor.travel.edit', $travel->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger" onclick="confirm('do you want to delete request?')"><i class="fa fa-trash"></i></button>
                    
                        <button type="button" class="btn btn-primary" onclick="addExpenseModel(<?php echo e($travel->id); ?>)">Add Expense</button>
                    <?php if($travel->supervisor_approval != 1 || $travel->account_approval != 1 || $travel->hr_approval != 1 || $travel->chairman_approval != 1): ?>
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
            <?php echo e($myRequests->links()); ?>

        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="expenseModel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Expense to Travel Request</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo e(route('supervisor.travel.expense')); ?>" role="form" id="testform" method="POST">
                    <?php echo csrf_field(); ?>

                    <div id="obtype">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="col-md-2 control-label">Date</label>
                                <label class="col-md-3 control-label">Description</label>
                                <label class="col-md-1 control-label">Ticket</label>
                                <label class="col-md-1 control-label">Lodging</label>
                                <label class="col-md-1 control-label">Phone</label>
                                <label class="col-md-1 control-label">Local Conveyance</label>
                                <label class="col-md-1 control-label">Incidentials</label>
                                <label class="col-md-1 control-label">Others</label>
                                <label class="col-md-1 control-label"></label>
                            </div>
                            <input type="hidden" name="travel_id" id="travel_id">
                            <div class="col-md-12" id="expenseData">
                                <div class="form-group" id="expense_form1">
                                    <div class="col-md-2">
                                        <input type="text" class="form-control datepicker" name="e_date[]" required autocomplete="off">
                                    </div>
                                    <div class="col-md-3">
                                        <textarea name="e_description[]" class="form-control" required></textarea>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name="e_ticket[]" value="0.0">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name="e_lodging[]" value="0.0">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name="e_phone[]" value="0.0">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name="e_local_conveyance[]" value="0.0">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name="e_incidential[]" value="0.0">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name="e_others[]" value="0.0">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger" onclick="removeExpenseForm(1)"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                                <hr id="hrLine1">
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <label class="col-md-3">
                                        <select name="currency" id="currency" class="form-control" required>
                                            <option value="">Select Currency</option>
                                            <?php foreach($currency as $c): ?>
                                            <option value="<?php echo e($c->id); ?>"><?php echo e($c->title); ?></option>
                                            <?php endforeach; ?>
                                        </select>   
                                    </label>
                                    <button type="button" class="btn btn-success" onclick="addMoreExpenseField()">Add More</button>
                                    <input type="submit" class="btn btn-info" value="Submit">
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
    var count = 1;
    function addExpenseModel(id){
        $('#travel_id').val(id);
        $('#expenseModel').modal('show');
    }
    function addMoreExpenseField()
    {
        count++;
        var html = '<div class="form-group" id="expense_form'+count+'"><div class="col-md-2"><input type="text" class="form-control datepicker" name="e_date[]" required autocomplete="off"></div><div class="col-md-3"><textarea name="e_description[]" class="form-control" required></textarea required></div><div class="col-md-1"><input type="text" class="form-control" name="e_ticket[]" value="0.0"></div><div class="col-md-1"><input type="text" class="form-control" name="e_lodging[]" value="0.0"></div><div class="col-md-1"><input type="text" class="form-control" name="e_phone[]" value="0.0"></div><div class="col-md-1"><input type="text" class="form-control" name="e_local_conveyance[]" value="0.0"></div><div class="col-md-1"><input type="text" class="form-control" name="e_incidential[]" value="0.0"></div><div class="col-md-1"><input type="text" class="form-control" name="e_others[]" value="0.0"></div><div class="col-md-1"><button type="button" class="btn btn-danger" onclick="removeExpenseForm('+count+')"><i class="fa fa-trash"></i></button></div></div><hr id="hrLine'+count+'">';
        $('#expenseData').append(html);
    }
    function removeExpenseForm(id)
    {
        $('#expense_form'+id).remove();
        $('#hrLine'+id).remove();
    }
</script>

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
              url: "<?php echo e(url('supervisor/travelreply/save')); ?>",
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
            url: "<?php echo e(url('supervisor/travelreply/delete')); ?>",
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
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>