<?php $__env->startSection('heading'); ?>
Travel Expense
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Travel Expense</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <?php if($travel->account_approval==1): ?>
                Travel Expense
                <?php else: ?>
                Expected Travel Expense
                <?php endif; ?>
            </h3>
        </div>
        <div class="box-body">
            <div class="row" style="background-color:#047192; color: white;">
                <div class="col-md-4">
                    <table class="table">
                        <tr style="border-bottom:1px solid white;">
                            <th colspan="2"><h4>Personal Detail</h4></th>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><?php echo e($staff->name); ?></td>
                        </tr>
                        <tr>
                            <td>Department</td>
                            <td><?php echo e(\App\Department::getTitle($staff->department)); ?></td>
                        </tr>
                        <tr>
                            <td>Designation</td>
                            <td><?php echo e(\App\Designation::getTitle($staff->designation)); ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <table class="table">
                        <tr style="border-bottom:1px solid white;">
                            <th colspan="2"><h4>Travel Detail</h4></th>
                        </tr>
                        <tr>
                            <td>Purpose</td>
                            <td><?php echo e($travel->purpose); ?></td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td><?php echo e(ucwords($travel->type)); ?></td>
                        </tr>
                        <tr>
                            <td>Place</td>
                            <td>
                              <?php ($places = \App\TravelDestination::getPlaces($travel->id)); ?>
                              <?php foreach($places as $place): ?>
                              <span class="badge bg-orange"><?php echo e($place->to); ?></span>
                              <?php endforeach; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Departure Date</td>
                            <td>
                              <?php echo e(\Carbon\Carbon::parse($travel->from)->format('d M, Y')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>Arrival Date</td>
                            <td>
                              <?php echo e(\Carbon\Carbon::parse($travel->to)->format('d M, Y')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>Mode of Transport</td>
                            <td>
                                <?php if($travel->mode_of_transport == 'road'): ?>
                                <?php echo e(ucwords($travel->mode_of_transport)); ?>

                                    <?php if($travel->road_sub == 1): ?>
                                    (Self-Owned Vehicle)
                                    <?php elseif($travel->road_sub == 2): ?>
                                    (Company-Owned Vehicle) 
                                    <?php elseif($travel->road_sub == 3): ?>
                                    (Rental Vehicle) 
                                    <?php elseif($travel->road_sub == 4): ?>
                                    <?php else: ?>
                                    <?php endif; ?>
                                <?php elseif($travel->mode_of_transport == 'air'): ?>
                                <?php echo e(ucwords($travel->mode_of_transport)); ?>

                                <?php else: ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <table class="table">
                        <tr style="border-bottom:1px solid white;">
                            <th colspan="2"><h4>Organizational Detail</h4></th>
                        </tr>
                        <tr>
                            <td>Assignment</td>
                            <td>
                                <?php echo e(\App\TravelAssignmentType::getTitle($travel->assignment_type)); ?>

                                - <?php echo e(\App\TravelAssignmentCategory::getTitle($travel->assignment_category)); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>Payment Mode</td>
                            <td>
                                <?php if($travel->advance_required == 1): ?>
                                    <?php if($travel->payment_mode == 1): ?>
                                        Reimbursement >> 
                                        <?php if($travel->reimbursement == 1): ?>
                                        Pre-paid    70%
                                        <?php elseif($travel->reimbursement == 2): ?>
                                        Post-Paid    30%
                                        <?php else: ?>
                                        <?php endif; ?>
                                    <?php elseif($travel->payment_mode == 2): ?>
                                        Per Diem Reimbursement <br>
                                        <?php echo e(\App\TravelerPosition::getTitle($travel->position)); ?>

                                        
                                        <span class="badge bg-orange">
                                        <?php echo e(\App\TravelerGrade::getTitle($travel->grade)); ?>

                                        </span>
                                        <span class="badge bg-grey">
                                            <?php echo e($travel->per_diem_amount); ?>

                                        </span>
                                    <?php else: ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('staffs.travel.expense')); ?>">
            <div class="col-md-10" style="border:1px solid #e6e6e6; border-radius: 5px; padding: 20px;">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label class="col-md-2 control-label required">Select Destination</label>
                    <div class="col-md-10">
                        <select name="destination_id" id="destination_id" class="form-control">
                            <option value="">Select Destination</option>
                            <?php foreach($destinations as $destination): ?>
                            <?php if(old('destination_id') == $destination->id): ?>
                            <option value="<?php echo e($destination->id); ?>" selected>
                                <?php echo e($destination->from); ?> - <?php echo e($destination->to); ?>

                            </option>
                            <?php else: ?>
                            <option value="<?php echo e($destination->id); ?>">
                                <?php echo e($destination->from); ?> - <?php echo e($destination->to); ?>

                            </option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('destination_id')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('destination_id')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <input type="hidden" name="travel_id" value="<?php echo e($travel->id); ?>">
                <?php if($travel->account_approval==1): ?>
                <input type="hidden" name="type" value="2">
                <?php else: ?>
                <input type="hidden" name="type" value="1">
                <?php endif; ?>
                <div class="form-group">
                    <label class="col-md-2">Description</label>
                    <label class="col-md-10">Total Amount with VAT & Taxes</label>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label required">Transportation</label>
                    <div class="col-md-10">
                        <input type="text" name="ticket" class="form-control" placeholder="0.0" value="<?php echo e(old('ticket') ? old('ticket') : '0.0'); ?>">
                        <?php if($errors->has('ticket')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('ticket')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label required">Accomodation</label>
                    <div class="col-md-10">
                        <input type="text" name="lodging" class="form-control" placeholder="0.0" value="<?php echo e(old('lodging') ? old('lodging') : '0.0'); ?>">
                        <?php if($errors->has('lodging')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('lodging')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label required">Breakfast</label>
                    <div class="col-md-10">
                        <input type="text" name="breakfast" class="form-control" placeholder="0.0" value="<?php echo e(old('breakfast') ? old('breakfast') : '0.0'); ?>">
                        <?php if($errors->has('breakfast')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('breakfast')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label required">Lunch</label>
                    <div class="col-md-10">
                        <input type="text" name="lunch" class="form-control" placeholder="0.0" value="<?php echo e(old('lunch') ? old('lunch') : '0.0'); ?>">
                        <?php if($errors->has('lunch')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('lunch')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label required">Dinner</label>
                    <div class="col-md-10">
                        <input type="text" name="dinner" class="form-control" placeholder="0.0" value="<?php echo e(old('dinner') ? old('dinner') : '0.0'); ?>">
                        <?php if($errors->has('dinner')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('dinner')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label required">Communication</label>
                    <div class="col-md-10">
                        <input type="text" name="phone" class="form-control" placeholder="0.0" value="<?php echo e(old('phone') ? old('phone') : '0.0'); ?>">
                        <?php if($errors->has('phone')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('phone')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label required">Local Conveyance</label>
                    <div class="col-md-10">
                        <input type="text" name="local_conveyance" class="form-control" placeholder="0.0" value="<?php echo e(old('local_conveyance') ? old('local_conveyance') : '0.0'); ?>">
                        <?php if($errors->has('local_conveyance')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('local_conveyance')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label required">Other</label>
                    <div class="col-md-10">
                        <input type="text" name="others" class="form-control" placeholder="0.0" value="<?php echo e(old('others') ? old('others') : '0.0'); ?>">
                        <?php if($errors->has('others')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('others')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2">Description</label>
                    <div class="col-md-10">
                        <textarea name="description" id="description" rows="5" class="form-control"><?php echo e(old('description')); ?></textarea>
                        <?php if($errors->has('description')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('description')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-10 form-group text-right">
                <input type="submit" class="btn btn-info" name="complete" value="Submit">
                <input type="submit" class="btn btn-success" name="complete" value="Final Submit">
            </div>
        </form>
        </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>