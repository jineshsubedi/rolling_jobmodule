<?php $__env->startSection('heading'); ?>
Travel Detail
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Travel Detail</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Travel Detail</h3>
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
										Pre-paid	70%
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
			<br>
			<div class="row">
				<div class="col-md-3">
					<div style="background-color:#7b7979; color: white; padding: 10px;">
						<h4>Supervisor</h4>
						<p><b>Status:</b> 
						<?php if($travel->supervisor_approval == 1): ?>
						<span class="label bg-green">Approved</span>
						<?php elseif($travel->supervisor_approval == 2): ?>
						<span class="label bg-red">Rejected</span>
						<?php else: ?>
						<span class="label bg-blue">Pending</span>
						<?php endif; ?>
						</p>
						<p><b>Remark:</b> <?php echo e($travel->supervisor_remark); ?></p>
					</div>
				</div>
				<div class="col-md-3">
					<div style="background-color:#7b7979; color: white; padding: 10px;">
						<h4>Account</h4>
						<p><b>Status:</b> 
						<?php if($travel->account_approval == 1): ?>
						<span class="label bg-green">Approved</span>
						<?php elseif($travel->account_approval == 2): ?>
						<span class="label bg-red">Rejected</span>
						<?php elseif($travel->supervisor_approval == 1): ?>
						<span class="label bg-blue">Pending</span>
						<?php else: ?>
						<?php endif; ?>
						</p>
						<p><b>Remark:</b> <?php echo e($travel->account_remark); ?></p>
					</div>
				</div>
				<div class="col-md-3">
					<div style="background-color:#7b7979; color: white; padding: 10px;">
						<h4>HR</h4>
						<p><b>Status:</b> 
						<?php if($travel->hr_approval == 1): ?>
						<span class="label bg-green">Approved</span>
						<?php elseif($travel->hr_approval == 2): ?>
						<span class="label bg-red">Rejected</span>
						<?php elseif($travel->account_approval == 1): ?>
						<span class="label bg-blue">Pending</span>
						<?php else: ?>
						<?php endif; ?>
						</p>
						<p><b>Remark:</b> <?php echo e($travel->hr_remark); ?></p>
					</div>
				</div>
				<div class="col-md-3">
					<div style="background-color:#7b7979; color: white; padding: 10px;">
						<h4>Chairman</h4>
						<p><b>Status:</b> 
						<?php if($travel->chairman_approval == 1): ?>
						<span class="label bg-green">Approved</span>
						<?php elseif($travel->chairman_approval == 2): ?>
						<span class="label bg-red">Rejected</span>
						<?php elseif($travel->hr_approval == 1): ?>
						<span class="label bg-blue">Pending</span>
						<?php else: ?>
						<?php endif; ?>
						</p>
						<p><b>Remark:</b> <?php echo e($travel->chairman_remark); ?></p>
					</div>
				</div>
			</div>
			<br><br>
			<?php if($travel->assigned_to == auth()->guard('staffs')->user()->id || $travel->assigned_from == auth()->guard('staffs')->user()->id): ?>
			<div class="right">
				<a href="<?php echo e(route('staffs.travel.planner.create')); ?>" class="btn btn-info">Make Planning</a>
				<?php if(isset($planner->id)): ?>
				<a href="<?php echo e(route('staffs.travel.planner.edit', $planner->id)); ?>" class="btn btn-danger">Edit Planning</a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<div id="itinerySection">
                    <h4 class="box-title">Itinery Information</h4>
                    <table class="table table-bordered table-striped text-center" id="itinery_booking">
                        <tr>
                            <th rowspan="2">Date</th>
                            <th colspan="2">Travel</th>
                            <th colspan="2">Time</th>
                            <th rowspan="2">Description</th>
                        </tr>
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>From</th>
                            <th>To</th>
                        </tr>
                        <?php foreach($itinery as $planner): ?>
                        <tr>
                        <td><?php echo e($planner->date); ?></td>
                        <td><?php echo e($planner->travel_from); ?></td>
                        <td><?php echo e($planner->travel_to); ?></td>
                        <td><?php echo e($planner->time_from); ?></td>
                        <td><?php echo e($planner->time_to); ?></td>
                        <td><?php echo e($planner->description); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
            </div>
            <div id="roadSection">
                <h4 class="box-title">Road Ticket Information</h4>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Parameter</th>
                        <th>Vehicle Number</th>
                        <th>Driver Name</th>
                        <th>Driver Number</th>
                        <th>Vendor Name</th>
                        <th>Bus</th>
                    </tr>
                    <?php foreach($road as $planner): ?>
                    <tr>
                        <?php if($planner->vehicle_number && !$planner->bus_number): ?>
                            <td>Self-Owned Vehicle</td>
                            <td>
                                <?php echo e($planner->vehicle_number); ?>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        <?php endif; ?>
                        <?php if($planner->vehicle_number &&$planner->driver_name &&!$planner->vendor_name && !$planner->bus_number): ?>
                            <td>Company-Owned Vehicle</td>
                            <td>
                                <?php echo e($planner->vehicle_number); ?>

                            </td>
                            <td><?php echo e($planner->driver_name); ?></td>
                            <td><?php echo e($planner->driver_number); ?></td>
                            <td></td>
                            <td></td>
                        <?php endif; ?>
                        <?php if($planner->vehicle_number &&$planner->driver_name &&$planner->vendor_name && !$planner->bus_number): ?>
                            <td>Rental Vehicle</td>
                            <td>
                                <?php echo e($planner->vehicle_number); ?>

                            </td>
                            <td><?php echo e($planner->driver_name); ?></td>
                            <td><?php echo e($planner->driver_number); ?></td>
                            <td><?php echo e($planner->vendor_name); ?></td>
                            <td></td>
                        <?php endif; ?> 
                        <?php if($planner->bus_number): ?>
                            <td>Public Bus</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo e($planner->bus_number); ?></td>
                        <?php endif; ?>   
                        
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div id="airSection">
                <h4 class="box-title">Air Ticket Information</h4>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Airline Name</th>
                        <th>Flight Number</th>
                        <th>Departure On</th>
                        <th>Arrival City</th>
                    </tr>
                    <?php foreach($air as $planner): ?>
                    <tr>
                        <td><?php echo e($planner->airline_name); ?></td>
                        <td><?php echo e($planner->flight_number); ?></td>
                        <td><?php echo e($planner->departure_on); ?></td>
                        <td><?php echo e($planner->arrival_on); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div id="hotelSection">
                <h4 class="box-title">Hotel Booking Information</h4>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Hotel Name</th>
                        <th>Hotel Number</th>
                        <th>Place</th>
                        <th>District</th>
                        <th>Arrival Date</th>
                        <th>Departure Date</th>
                    </tr>
                    <?php foreach($hotel as $planner): ?>
                    <tr>
                        <td><?php echo e($planner->name); ?></td>
                        <td><?php echo e($planner->number); ?></td>
                        <td><?php echo e($planner->place_name); ?></td>
                        <td><?php echo e($planner->district); ?></td>
                        <td><?php echo e($planner->arrival_at); ?></td>
                        <td><?php echo e($planner->departure_at); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div id="visaSection">
                <?php if(count($visa)>0): ?>
                <h4 class="box-title">Visa Processing Information</h4>
                <?php endif; ?>
                <div class="row">
                    <?php foreach($visa as $planner): ?>
                    <div class="col-md-4">
                        Submitted Passport for the VISA processing 
                    </div>
                    <div class="col-md-4">
                        <?php echo e(\App\Department::getTitle($planner->department_id)); ?> 
                    </div>
                    <div class="col-md-4">
                        <?php echo e(\App\Adjustment_staff::getName($planner->staff_id)); ?> 
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
			<br>
			<div class="row">
				<?php if($travel->assigned_to == auth()->guard('staffs')->user()->id || $travel->assigned_from == auth()->guard('staffs')->user()->id): ?>
				<div class="text-right">
					<a href="<?php echo e(route('staffs.travelExpense.create', $travel->id)); ?>" target="_blank" class="btn btn-info">Add Expense</a>
				</div>
				<?php endif; ?>
				<div>
					<div class="box-header">
			            <h3 class="box-title">Expected Travel Expense Detail</h3>
			        </div>
					<table class="table table-bordered" style="background-color: #e4e4e4">
						<tr>
							<th>Destination</th>
							<th>Description</th>
							<th>Transportation</th>
							<th>Accomodation</th>
							<th>Breakfast</th>
							<th>Lunch</th>
							<th>Dinner</th>
							<th>Communication</th>
							<th>Local Conveyance</th>
							<th>Other</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
						<?php foreach($expenses as $e): ?>
						<tr id="expense_data<?php echo e($e->id); ?>">
							<td>
								<?php ($destination = \App\TravelDestination::getDestination($e->destination_id)); ?>
								<?php echo e($destination->from); ?> - <?php echo e($destination->to); ?>

							</td>
							<td><?php echo e($e->description); ?></td>
							<td><?php echo e($e->ticket); ?></td>
							<td><?php echo e($e->lodging); ?></td>
							<td><?php echo e($e->breakfast); ?></td>
							<td><?php echo e($e->lunch); ?></td>
							<td><?php echo e($e->dinner); ?></td>
							<td><?php echo e($e->phone); ?></td>
							<td><?php echo e($e->local_conveyance); ?></td>
							<td><?php echo e($e->others); ?></td>
							<td><?php echo e($e->total); ?></td>
							<?php if($travel->assigned_to == auth()->guard('staffs')->user()->id || $travel->assigned_from == auth()->guard('staffs')->user()->id): ?>
							<td>
								<form action="<?php echo e(route('staffs.travel.deleteExpense', $e->id)); ?>" method="post">
			                    <?php echo csrf_field(); ?>

			                    <?php echo method_field('DELETE'); ?>

								<button type="button" class="btn btn-primary" onclick="editExpenseModel(<?php echo e($e->id, 1); ?>)"><i class="fa fa-edit"></i></button>
								<button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
								</form>
							</td>
							<?php endif; ?>
						</tr>
						<div class="modal fade" id="editExpenseModel<?php echo e($e->id); ?>">
						    <div class="modal-dialog modal-lg">
						        <div class="modal-content">
						            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						                        aria-hidden="true">&times;</span></button>
						                <h4 class="modal-title">Edit Expense to Travel Request</h4>
						            </div>
						            <div class="modal-body">
							            <form action="<?php echo e(route("staffs.travel.updateExpense")); ?>" role="form" method="post" class="form-horizontal">
						            	<div class="row">
							            	<?php echo csrf_field(); ?>

							            	<input type="hidden" name="id" value="<?php echo e($e->id); ?>">
							            	<input type="hidden" name="type" value="<?php echo e($e->type); ?>">
							            	<input type="hidden" name="travel_id" value="<?php echo e($e->travel_id); ?>">
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Select Destination</label>
							                    <div class="col-md-10">
							                        <select name="destination_id" id="destination_id" class="form-control">
							                            <option value="">Select Destination</option>
							                            <?php foreach($destinations as $destination): ?>
							                            <?php if($e->destination_id == $destination->id): ?>
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
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2">Description</label>
							                    <label class="col-md-10">Total Amount with VAT & Taxes</label>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Transportation</label>
							                    <div class="col-md-10">
							                        <input type="text" name="ticket" class="form-control" placeholder="0.0" value="<?php echo e($e->ticket ? $e->ticket : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Accomodation</label>
							                    <div class="col-md-10">
							                        <input type="text" name="lodging" class="form-control" placeholder="0.0" value="<?php echo e($e->lodging ? $e->lodging : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Breakfast</label>
							                    <div class="col-md-10">
							                        <input type="text" name="breakfast" class="form-control" placeholder="0.0" value="<?php echo e($e->breakfast ? $e->breakfast : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Lunch</label>
							                    <div class="col-md-10">
							                        <input type="text" name="lunch" class="form-control" placeholder="0.0" value="<?php echo e($e->lunch ? $e->lunch : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Dinner</label>
							                    <div class="col-md-10">
							                        <input type="text" name="dinner" class="form-control" placeholder="0.0" value="<?php echo e($e->dinner ? $e->dinner : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Communication</label>
							                    <div class="col-md-10">
							                        <input type="text" name="phone" class="form-control" placeholder="0.0" value="<?php echo e($e->phone ? $e->phone : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Local Conveyance</label>
							                    <div class="col-md-10">
							                        <input type="text" name="local_conveyance" class="form-control" placeholder="0.0" value="<?php echo e($e->local_conveyance ? $e->local_conveyance : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Other</label>
							                    <div class="col-md-10">
							                        <input type="text" name="others" class="form-control" placeholder="0.0" value="<?php echo e($e->other ? $e->other : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2">Description</label>
							                    <div class="col-md-10">
							                        <textarea name="description" id="description" rows="5" class="form-control"><?php echo e($e->description); ?></textarea>
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2"></label>
							                    <div class="col-md-10">
							                        <input type="submit" class="btn btn-primary" value="Update">
							                    </div>
							                </div>
							            </div>
							            </form>
						            </div>
						            <div class="modal-footer"></div>
						        </div>
						    </div>
						</div>
						<?php endforeach; ?>
						<tr>
							<td colspan="10" class="text-right"><b>Sum Total:</b></td>
							<td colspan="2" id="sumTotal"><?php echo e(\App\TravelExpense::getExpectedTotalExpense($travel->id)); ?></td>
						</tr>
					</table>
					<div class="box-header">
			            <h3 class="box-title">Travel Expense Detail</h3>
			        </div>
					<table class="table table-bordered" style="background-color: #e4e4e4">
						<tr>
							<th>Destination</th>
							<th>Description</th>
							<th>Transportation</th>
							<th>Accomodation</th>
							<th>Breakfast</th>
							<th>Lunch</th>
							<th>Dinner</th>
							<th>Communication</th>
							<th>Local Conveyance</th>
							<th>Other</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
						<?php foreach($real_expenses as $e): ?>
						<tr id="expense_data<?php echo e($e->id); ?>">
							<td>
								<?php ($destination = \App\TravelDestination::getDestination($e->destination_id)); ?>
								<?php echo e($destination->from); ?> - <?php echo e($destination->to); ?>

							</td>
							<td><?php echo e($e->description); ?></td>
							<td><?php echo e($e->ticket); ?></td>
							<td><?php echo e($e->lodging); ?></td>
							<td><?php echo e($e->breakfast); ?></td>
							<td><?php echo e($e->lunch); ?></td>
							<td><?php echo e($e->dinner); ?></td>
							<td><?php echo e($e->phone); ?></td>
							<td><?php echo e($e->local_conveyance); ?></td>
							<td><?php echo e($e->others); ?></td>
							<td><?php echo e($e->total); ?></td>
							<?php if($travel->assigned_to == auth()->guard('staffs')->user()->id || $travel->assigned_from == auth()->guard('staffs')->user()->id): ?>
							<td>
								<form action="<?php echo e(route('staffs.travel.deleteExpense', $e->id)); ?>" method="post">
			                    <?php echo csrf_field(); ?>

			                    <?php echo method_field('DELETE'); ?>

								<button type="button" class="btn btn-primary" onclick="editExpenseModel(<?php echo e($e->id, 1); ?>)"><i class="fa fa-edit"></i></button>
								<button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
								</form>
							</td>
							<?php endif; ?>
						</tr>
						<div class="modal fade" id="editExpenseModel<?php echo e($e->id); ?>">
						    <div class="modal-dialog modal-lg">
						        <div class="modal-content">
						            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						                        aria-hidden="true">&times;</span></button>
						                <h4 class="modal-title">Edit Expense to Travel Request</h4>
						            </div>
						            <div class="modal-body">
							            <form action="<?php echo e(route("staffs.travel.updateExpense")); ?>" role="form" method="post" class="form-horizontal">
						            	<div class="row">
							            	<?php echo csrf_field(); ?>

							            	<input type="hidden" name="id" value="<?php echo e($e->id); ?>">
							            	<input type="hidden" name="type" value="<?php echo e($e->type); ?>">
							            	<input type="hidden" name="travel_id" value="<?php echo e($e->travel_id); ?>">
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Select Destination</label>
							                    <div class="col-md-10">
							                        <select name="destination_id" id="destination_id" class="form-control">
							                            <option value="">Select Destination</option>
							                            <?php foreach($destinations as $destination): ?>
							                            <?php if($e->destination_id == $destination->id): ?>
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
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2">Description</label>
							                    <label class="col-md-10">Total Amount with VAT & Taxes</label>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Transportation</label>
							                    <div class="col-md-10">
							                        <input type="text" name="ticket" class="form-control" placeholder="0.0" value="<?php echo e($e->ticket ? $e->ticket : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Accomodation</label>
							                    <div class="col-md-10">
							                        <input type="text" name="lodging" class="form-control" placeholder="0.0" value="<?php echo e($e->lodging ? $e->lodging : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Breakfast</label>
							                    <div class="col-md-10">
							                        <input type="text" name="breakfast" class="form-control" placeholder="0.0" value="<?php echo e($e->breakfast ? $e->breakfast : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Lunch</label>
							                    <div class="col-md-10">
							                        <input type="text" name="lunch" class="form-control" placeholder="0.0" value="<?php echo e($e->lunch ? $e->lunch : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Dinner</label>
							                    <div class="col-md-10">
							                        <input type="text" name="dinner" class="form-control" placeholder="0.0" value="<?php echo e($e->dinner ? $e->dinner : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Communication</label>
							                    <div class="col-md-10">
							                        <input type="text" name="phone" class="form-control" placeholder="0.0" value="<?php echo e($e->phone ? $e->phone : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Local Conveyance</label>
							                    <div class="col-md-10">
							                        <input type="text" name="local_conveyance" class="form-control" placeholder="0.0" value="<?php echo e($e->local_conveyance ? $e->local_conveyance : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2 control-label required">Other</label>
							                    <div class="col-md-10">
							                        <input type="text" name="others" class="form-control" placeholder="0.0" value="<?php echo e($e->other ? $e->other : '0.0'); ?>">
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2">Description</label>
							                    <div class="col-md-10">
							                        <textarea name="description" id="description" rows="5" class="form-control"><?php echo e($e->description); ?></textarea>
							                    </div>
							                </div>
							                <br>
							                <div class="form-group">
							                    <label class="col-md-2"></label>
							                    <div class="col-md-10">
							                        <input type="submit" class="btn btn-primary" value="Update">
							                    </div>
							                </div>
							            </div>
							            </form>
						            </div>
						            <div class="modal-footer"></div>
						        </div>
						    </div>
						</div>
						<?php endforeach; ?>
						<tr>
							<td colspan="10" class="text-right"><b>Sum Total:</b></td>
							<td colspan="2" id="sumTotal"><?php echo e(\App\TravelExpense::getTotalExpense($travel->id)); ?></td>
						</tr>
					</table>

				</div>
				<?php if(count($expenses) > 0): ?>
				<div class="col-md-3">
					<div style="background-color:#7b7979; color: white; padding: 10px;">
						<h4>Supervisor</h4>
						<p><b>Status:</b> 
						<?php if($travel->supervisor_expense_approval == 1): ?>
						<span class="label bg-green">Approved</span>
						<?php elseif($travel->supervisor_expense_approval == 2): ?>
						<span class="label bg-red">Rejected</span>
						<?php else: ?>
						<span class="label bg-blue">Pending</span>
						<?php endif; ?>
						</p>
						<p><b>Remark:</b> <?php echo e($travel->supervisor_expense_remark); ?></p>
					</div>
				</div>
				<div class="col-md-3">
					<div style="background-color:#7b7979; color: white; padding: 10px;">
						<h4>Account</h4>
						<p><b>Status:</b> 
						<?php if($travel->account_expense_approval == 1): ?>
						<span class="label bg-green">Approved</span>
						<?php elseif($travel->account_expense_approval == 2): ?>
						<span class="label bg-red">Rejected</span>
						<?php elseif($travel->supervisor_expense_approval == 1): ?>
						<span class="label bg-blue">Pending</span>
						<?php else: ?>
						<?php endif; ?>
						</p>
						<p><b>Remark:</b> <?php echo e($travel->account_expense_remark); ?></p>
					</div>
				</div>
				<div class="col-md-3">
					<div style="background-color:#7b7979; color: white; padding: 10px;">
						<h4>HR</h4>
						<p><b>Status:</b> 
						<?php if($travel->hr_expense_approval == 1): ?>
						<span class="label bg-green">Approved</span>
						<?php elseif($travel->hr_expense_approval == 2): ?>
						<span class="label bg-red">Rejected</span>
						<?php elseif($travel->account_expense_approval == 1): ?>
						<span class="label bg-blue">Pending</span>
						<?php else: ?>
						<?php endif; ?>
						</p>
						<p><b>Remark:</b> <?php echo e($travel->hr_expense_remark); ?></p>
					</div>
				</div>
				<div class="col-md-3">
					<div style="background-color:#7b7979; color: white; padding: 10px;">
						<h4>Chairman</h4>
						<p><b>Status:</b> 
						<?php if($travel->chairman_expense_approval == 1): ?>
						<span class="label bg-green">Approved</span>
						<?php elseif($travel->chairman_expense_approval == 2): ?>
						<span class="label bg-red">Rejected</span>
						<?php elseif($travel->hr_expense_approval == 1): ?>
						<span class="label bg-blue">Pending</span>
						<?php else: ?>
						<?php endif; ?>
						</p>
						<p><b>Remark:</b> <?php echo e($travel->chairman_expense_remark); ?></p>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
    </div>
  </div>
<script>
	function editExpenseModel(id){
	    $('#editExpenseModel'+id).modal('show');
	}
	var token = $('input[name=\'_token\']').val();
	function updateExpense(id)
	{
		$.ajax({
	        type: 'POST',
	        url: '<?php echo e(route("staffs.travel.updateExpense")); ?>',
	        data: {
	        	_token : token,
	        	id : id,
	        	travel_id : $('#u_travel_id'+id).val(),
	        	date : $('#u_date'+id).val(),
	        	description : $('#u_description'+id).val(),
	        	ticket : $('#u_ticket'+id).val(),
	        	lodging : $('#u_lodging'+id).val(),
	        	phone : $('#u_phone'+id).val(),
	        	local_conveyance : $('#u_local_conveyance'+id).val(),
	        	incidential : $('#u_incidential'+id).val(),
	        	others : $('#u_others'+id).val(),
	        },
	        cache: false,
            success: function(data){
            	location.reload()
            },
            error: function(error){
            	alert('failed')
            }
    	});
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>