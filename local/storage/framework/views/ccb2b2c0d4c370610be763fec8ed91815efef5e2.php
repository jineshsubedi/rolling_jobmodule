<?php $__env->startSection('heading'); ?>
Travel Planner
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Travel Planner</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/select2/css/select2.css')); ?>">
<style>
    .select2-selection__rendered{line-height: 20px !important;}
</style>
<script src="<?php echo e(asset('assets/select2/js/select2.js')); ?>"></script>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Travel Planner Detail</h3>
        </div>
      <div class="box-body">
        <div class="col-md-12" style="border:1px solid #e6e6e6; border-radius: 5px; padding: 20px;">
            <div class="form-group">
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
                                <td>ID</td>
                                <td><?php echo e($travel->unique_id); ?></td>
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
                                    <?php if($travel->assignment_type == 1): ?>
                                    One-day Assignment 
                                    <?php elseif($travel->assignment_type == 2): ?>
                                    Multiple-day Assignment
                                    <?php else: ?>
                                    <?php endif; ?>
                                    <?php if($travel->assignment_category == 1): ?>
                                    -   Assignment with the Client 
                                    <?php elseif($travel->assignment_category == 2): ?>
                                    -   Assignment with the employee
                                    <?php elseif($travel->assignment_category == 3): ?>
                                    -   Field Assignment
                                    <?php elseif($travel->assignment_category == 4): ?>
                                    -   Business Development 
                                    <?php elseif($travel->assignment_category == 5): ?>
                                    -   Client Meeting
                                    <?php elseif($travel->assignment_category == 6): ?>
                                    -   Conference 
                                    <?php elseif($travel->assignment_category == 7): ?>
                                    -   Training  
                                    <?php else: ?>
                                    <?php endif; ?>
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
                                            <?php if($travel->position == 1): ?>
                                            Assistant Level
                                            <?php elseif($travel->position == 2): ?>
                                            Junior Level
                                            <?php elseif($travel->position == 3): ?>
                                            Officer Level
                                            <?php elseif($travel->position == 4): ?>
                                            Senior Officer Level
                                            <?php elseif($travel->position == 5): ?>
                                            Manager Level
                                            <?php else: ?>
                                            <?php endif; ?>
                                            <span class="badge bg-orange">
                                            <?php echo e($travel->grade); ?>

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
                <div id="itinerySection">
                    <h4 class="box-title">Planning Information</h4>
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
            </div>
        </div>
        <div class="clearfix"></div>
            <div class="col-md-10 form-group text-right">
                <a href="<?php echo e(route('staffs.travel.planner.index')); ?>" class="btn btn-warning">Cancel</a>
            </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>