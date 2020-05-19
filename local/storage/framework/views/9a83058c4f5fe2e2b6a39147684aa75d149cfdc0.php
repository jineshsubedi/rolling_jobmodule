<?php $__env->startSection('heading'); ?>
Travel Booking Request
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Travel Booking Request</li>
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
            <h3 class="box-title">Make Travel Booking Request</h3>
        </div>
      <div class="box-body">
        <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('staffs.travel.planner.store')); ?>">
        <div class="col-md-10" style="border:1px solid #e6e6e6; border-radius: 5px; padding: 20px;">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label class="col-md-2 control-label required">Travel Id</label>
                <div class="col-md-10">
                    <select name="travel_id" id="travel_id" class="form-control select2">
                        <option value="">Select Travel</option>
                        <?php foreach($travels as $travel): ?>
                        <?php if(old('travel_id') == $travel->id): ?>
                        <option value="<?php echo e($travel->id); ?>" selected>
                            <?php echo e($travel->unique_id); ?> (<?php echo e(\Carbon\Carbon::parse($travel->from)->format('d M, Y')); ?> - <?php echo e(\Carbon\Carbon::parse($travel->to)->format('d M, Y')); ?>)
                        </option>
                        <?php else: ?>
                        <option value="<?php echo e($travel->id); ?>">
                            <?php echo e($travel->unique_id); ?> (<?php echo e(\Carbon\Carbon::parse($travel->from)->format('d M, Y')); ?> - <?php echo e(\Carbon\Carbon::parse($travel->to)->format('d M, Y')); ?>)
                        </option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?php if($errors->has('travel_id')): ?>
                        <span class="text-danger">
                            <strong><?php echo e($errors->first('travel_id')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <br><br>
            <input type="hidden" name="travel_type" id="travel_type">
            <div id="ininerySection">
                <button type="button" class="btn btn-info right"><i class="fa fa-plus" onclick="addMoreItineryForm()"> Add More</i></button>
                <h4 class="box-title">Planning Information</h4>
                <table class="table table-bordered table-striped text-center" id="itinery_booking">
                    <tr>
                        <th rowspan="2">Date</th>
                        <th colspan="2">Travel</th>
                        <th colspan="2">Time</th>
                        <th rowspan="2">Description</th>
                        <th rowspan="2">Action</th>
                    </tr>
                    <tr>
                        <th>From</th>
                        <th>To</th>
                        <th>From</th>
                        <th>To</th>
                    </tr>
                    <?php if(is_array(old('date')) && is_array(old('travel_from')) && is_array(old('travel_to')) && is_array(old('time_from'))): ?>
                    <?php for($i=0;$i<count(old('date'));$i++): ?>
                    <tr id="itinery_old_form<?php echo e($i); ?>">
                        <td>
                            <input type="text" class="form-control datepicker" name="date[]" placeholder="Date" value="<?php echo e(old('date.'.$i)); ?>">
                            <?php if($errors->has('date.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('date.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="travel_from[]" placeholder="From" value="<?php echo e(old('travel_from.'.$i)); ?>">
                            <?php if($errors->has('travel_from.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('travel_from.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="travel_to[]" placeholder="To" value="<?php echo e(old('travel_to.'.$i)); ?>">
                            <?php if($errors->has('travel_to.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('travel_to.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="time_from[]" placeholder="09:00:00" value="<?php echo e(old('time_from.'.$i)); ?>">
                            <?php if($errors->has('time_from.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('time_from.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="time_to[]" placeholder="17:00:00" value="<?php echo e(old('time_to.'.$i)); ?>">
                            <?php if($errors->has('time_to.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('time_to.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <textarea name="description[]" id="description" class="form-control"><?php echo e(old('description.'.$i)); ?></textarea>
                            <?php if($errors->has('description.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('description.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning" onclick="removeOldItineryForm(<?php echo e($i); ?>)"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php endfor; ?>
                    <?php else: ?>
                    <tr id="itinery_form1">
                        <td>
                            <input type="text" class="form-control datepicker" name="date[]" placeholder="Date">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="travel_from[]" placeholder="From">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="travel_to[]" placeholder="To">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="time_from[]" placeholder="09:00:00">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="time_to[]" placeholder="17:00:00">
                        </td>
                        <td>
                            <textarea name="description[]" id="description" class="form-control"></textarea>
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning" onclick="removeItineryForm(1)"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
            <div id="road_of_transport">
                <h4 class="box-title">Road Vehicle Information</h4>
                <div class="form-group" id="road_sub1">
                    <label class="col-md-2 control-label required">Self-Owned Vehicle</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="vehicle_number" value="<?php echo e(old('vehicle_number')); ?>" placeholder="vehicle number">
                        <?php if($errors->has('vehicle_number')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('vehicle_number')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <div class="form-group" id="road_sub2">
                    <label class="col-md-2 control-label required">Company-Owned Vehicle</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="vehicle_number" value="<?php echo e(old('vehicle_number')); ?>" placeholder="vehicle number">
                        <?php if($errors->has('vehicle_number')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('vehicle_number')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="driver_name" value="<?php echo e(old('driver_name')); ?>" placeholder="Driver Name">
                        <?php if($errors->has('driver_name')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('driver_name')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="driver_number" value="<?php echo e(old('driver_number')); ?>" placeholder="Driver Number">
                        <?php if($errors->has('driver_number')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('driver_number')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group" id="road_sub3">
                    <label class="col-md-2 control-label required">Rental Vehicle</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="vehicle_number" value="<?php echo e(old('vehicle_number')); ?>" placeholder="vehicle number">
                        <?php if($errors->has('vehicle_number')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('vehicle_number')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="vendor_name" value="<?php echo e(old('vendor_name')); ?>" placeholder="Vendor Name">
                        <?php if($errors->has('vendor_name')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('vendor_name')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="driver_name" value="<?php echo e(old('driver_name')); ?>" placeholder="Driver Name">
                        <?php if($errors->has('driver_number')): ?>
                            <span class="text-danger">
                                <strong>        <?php echo e($errors->first('driver_number')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="driver_number" value="<?php echo e(old('driver_number')); ?>" placeholder="Driver Number">
                        <?php if($errors->has('driver_number')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('driver_number')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group" id="road_sub0">
                    <label class="col-md-2 control-label required">Public Vehicle</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="bus_number" value="<?php echo e(old('bus_number')); ?>" placeholder="bus number">
                        <?php if($errors->has('bus_number')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('bus_number')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
            <div id="airSection">
                <button type="button" class="btn btn-info right"><i class="fa fa-plus" onclick="addMoreAirForm()"> Add More</i></button>
                <h4 class="box-title">Air Flight Information</h4>
                <div id="air_of_transport">
                <?php if(is_array(old('airline_name')) && is_array(old('flight_number')) && is_array(old('departure_on')) && is_array(old('arrival_on'))): ?>
                    <?php for($i=0;$i<count(old('airline_name'));$i++): ?>
                    <div class="form-group" id="air_old_form<?php echo e($i); ?>">
                        <div class="col-md-3">
                            <input type="text" name="airline_name[]" class="form-control" value="<?php echo e(old('flight_name.'.$i)); ?>" placeholder="airline name">
                            <?php if($errors->has('airline_name.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('airline_name.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="flight_number[]" class="form-control" value="<?php echo e(old('flight_number.'.$i)); ?>" placeholder="flight number">
                            <?php if($errors->has('flight_number.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('flight_number.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="departure_on[]" class="form-control datepicker" value="<?php echo e(old('departure_on.'.$i)); ?>" placeholder="departure date">
                            <?php if($errors->has('departure_on.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('departure_on.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="arrival_on[]" class="form-control" value="<?php echo e(old('arrival_on.'.$i)); ?>" placeholder="arrival city">
                            <?php if($errors->has('arrival_on.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('arrival_on.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-warning" onclick="removeOldAirForm(<?php echo e($i); ?>)"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                    <?php endfor; ?>
                <?php else: ?>
                <div class="form-group" id="air_form1">
                    <div class="col-md-3">
                        <input type="text" name="airline_name[]" class="form-control" placeholder="airline name">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="flight_number[]" class="form-control" placeholder="flight number">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="departure_on[]" class="form-control datepicker" placeholder="departure_on">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="arrival_on[]" class="form-control" placeholder="arrival city">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-warning" onclick="removeAirForm(1)"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
                <?php endif; ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <div id="hotelSection">
                <button type="button" class="btn btn-info right" onclick="addMoreHotelForm()"><i class="fa fa-plus"> Add More</i></button>
                <h4 class="box-title">Hotel Booking Detail</h4>
                <div id="hotel_booking">
                <?php if(is_array(old('hotel_name')) && is_array(old('flight_number')) && is_array(old('departure_on')) && is_array(old('arrival_on'))): ?>
                    <?php for($i=0;$i<count(old('hotel_name'));$i++): ?>
                    <div class="form-group" id="hotel_old_form<?php echo e($i); ?>">
                        <div class="col-md-2" style="padding: 5px; margin-top: 5px;">
                            <input type="text" name="hotel_name[]" class="form-control" placeholder="hotel name" value="<?php echo e(old('hotel_name.'.$i)); ?>">
                            <?php if($errors->has('hotel_name.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('hotel_name.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-2" style="padding: 5px; margin-top: 5px;">
                            <input type="text" name="hotel_number[]" class="form-control" placeholder="hotel number" value="<?php echo e(old('hotel_number.'.$i)); ?>">
                            <?php if($errors->has('hotel_number.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('hotel_number.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-1" style="padding: 5px; margin-top: 5px;">
                            <input type="text" name="place[]" class="form-control" placeholder="Place" value="<?php echo e(old('place.'.$i)); ?>">
                            <?php if($errors->has('place.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('place.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-2" style="padding: 5px; margin-top: 5px;">
                            <input type="text" name="district[]" class="form-control" placeholder="District" value="<?php echo e(old('district.'.$i)); ?>">
                            <?php if($errors->has('district.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('district.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-2" style="padding: 5px; margin-top: 5px;">
                            <input type="text" name="arrival_at[]" class="form-control datepicker" placeholder="Arrival Date" value="<?php echo e(old('arrival_at.'.$i)); ?>">
                            <?php if($errors->has('arrival_at.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('arrival_at.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-2" style="padding: 5px; margin-top: 5px;">
                            <input type="text" name="departure_at[]" class="form-control datepicker" placeholder="Departure Date" value="<?php echo e(old('departure_at.'.$i)); ?>">
                            <?php if($errors->has('departure_at.'.$i)): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('departure_at.'.$i)); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-warning" onclick="removeOldHotelForm(<?php echo e($i); ?>)"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                    <?php endfor; ?>
                <?php else: ?>
                <div class="form-group" id="hotel_form1">
                    <div class="col-md-2" style="padding: 5px; margin-top: 5px;">
                        <input type="text" name="hotel_name[]" class="form-control" placeholder="hotel name">
                    </div>
                    <div class="col-md-2" style="padding: 5px; margin-top: 5px;">
                        <input type="text" name="hotel_number[]" class="form-control" placeholder="hotel number">
                    </div>
                    <div class="col-md-1" style="padding: 5px; margin-top: 5px;">
                        <input type="text" name="place[]" class="form-control" placeholder="Place">
                    </div>
                    <div class="col-md-2" style="padding: 5px; margin-top: 5px;">
                        <input type="text" name="district[]" class="form-control" placeholder="District">
                    </div>
                    <div class="col-md-2" style="padding: 5px; margin-top: 5px;">
                        <input type="text" name="arrival_at[]" class="form-control datepicker" placeholder="Arrival Date">
                    </div>
                    <div class="col-md-2" style="padding: 5px; margin-top: 5px;">
                        <input type="text" name="departure_at[]" class="form-control datepicker" placeholder="Departure Date">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-warning" onclick="removeHotelForm(1)"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
                <?php endif; ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <div id="visaSection">
                <h4 class="box-title">Visa Processing</h4>
                <div class="form-group">
                    <div class="col-md-4" style="padding: 5px; margin-top: 5px;">
                        <label>Submitted Passport for the VISA processing </label>
                    </div>
                    <div class="col-md-4" style="padding: 5px; margin-top: 5px;">
                        <select name="department_id" id="department_id" class="form-control select2">
                            <option value="">Select Department</option>
                            <?php foreach($departments as $depatment): ?>
                            <option value="<?php echo e($depatment->id); ?>" <?php if(old('department_id')==$depatment->id): ?> selected <?php endif; ?>><?php echo e($depatment->title); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('department_id')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('department_id')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4" style="padding: 5px; margin-top: 5px;">
                        <select name="staff_id" id="staff_id" class="form-control select2">
                            <option value="">Select Staff</option>
                            <?php foreach($staffs as $staff): ?>
                            <option value="<?php echo e($staff->id); ?>" <?php if(old('staff_id')==$staff->id): ?> selected <?php endif; ?>><?php echo e($staff->name); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('staff_id')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('staff_id')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="clearfix"></div>
            <div class="col-md-10 form-group text-right">
                <input type="submit" class="btn btn-info" value="Submit">
                <a href="<?php echo e(route('staffs.travel.planner.index')); ?>" class="btn btn-warning">Cancel</a>
            </div>
        </form>
      </div>
    </div>
  </div>
<script>
    $('.datepicker').datepicker();
    $('.select2').select2();
    var token = $('input[name=\'_token\']').val();
    $('#travel_id').change(function(){
        var id = $(this).val();
        getSelectedTravelDetail(id)
    })
    var travelId = $('#travel_id').val();
    if(travelId != '')
    {
        getSelectedTravelDetail(travelId)
    }
    function getSelectedTravelDetail(id)
    {
        $.ajax({
            type: "GET",
            url: "<?php echo e(route('staffs.travel.planner.getSelectedTravelDetail')); ?>",
            data: {
                _token : token,
                id : id,
            },
            cache: false,
            success: function(data){
              console.log(data);
              $('#travel_type').val(data.data.type)
              if(data.data.type == 'international'){
                $('#visaSection').show();
              }else{
                $('#visaSection').hide();
              }
            },
            error: function(error){
              alert('failed')
            }
        });
    }

</script>
<script>
    var airCount = 0;
    function addMoreAirForm()
    {
        airCount++;
        var html='<div class="form-group" id="air_form'+airCount+'"><div class="col-md-3"><input type="text" name="airline_name[]" class="form-control" placeholder="airline name"></div><div class="col-md-3"><input type="text" name="flight_number[]" class="form-control" placeholder="flight number"></div><div class="col-md-2"><input type="text" name="departure_on[]" class="form-control datepicker" placeholder="departure_on"></div><div class="col-md-3"><input type="text" name="arrival_on[]" class="form-control" placeholder="arrival city"></div><div class="col-md-1"><button type="button" class="btn btn-warning" onclick="removeAirForm('+airCount+')"><i class="fa fa-trash"></i></button></div></div>';
        $('#air_of_transport').append(html);
    }
    function removeAirForm(id)
    {
        $('#air_form'+id).remove();
    }
    function removeOldAirForm(id)
    {
        $('#air_old_form'+id).remove();
    }
</script>
<script>
    var hotelCount = 0;
    function addMoreHotelForm()
    {
        hotelCount++;
        var html='<div class="form-group" id="hotel_form'+hotelCount+'"><div class="col-md-2" style="padding: 5px; margin-top: 5px;"><input type="text" name="hotel_name[]" class="form-control" placeholder="hotel name"></div><div class="col-md-2" style="padding: 5px; margin-top: 5px;"><input type="text" name="hotel_number[]" class="form-control" placeholder="hotel number"></div><div class="col-md-1" style="padding: 5px; margin-top: 5px;"><input type="text" name="place[]" class="form-control" placeholder="Place"></div><div class="col-md-2" style="padding: 5px; margin-top: 5px;"><input type="text" name="district[]" class="form-control" placeholder="District"></div><div class="col-md-2" style="padding: 5px; margin-top: 5px;"><input type="text" name="arrival_at[]" class="form-control datepicker" placeholder="Arrival Date"></div><div class="col-md-2" style="padding: 5px; margin-top: 5px;"><input type="text" name="departure_at[]" class="form-control datepicker" placeholder="Departure Date"></div><div class="col-md-1"><button type="button" class="btn btn-warning" onclick="removeHotelForm('+hotelCount+')"><i class="fa fa-trash"></i></button></div></div>';
        $('#hotel_booking').append(html);
    }
    function removeHotelForm(id)
    {
        $('#hotel_form'+id).remove();
    }
    function removeOldHoyelForm(id)
    {
        $('#hotel_old_form'+id).remove();
    }
</script>
<script>
    var itineryCount = 0;
    function addMoreItineryForm()
    {
        itineryCount++;
        var html='<tr id="itinery_form'+itineryCount+'"><td><input type="text" class="form-control datepicker" name="date[]" placeholder="Date"></td><td><input type="text" class="form-control" name="travel_from[]" placeholder="From"></td><td><input type="text" class="form-control" name="travel_to[]" placeholder="To"></td><td><input type="text" class="form-control" name="time_from[]" placeholder="09:00:00"></td><td><input type="text" class="form-control" name="time_to[]" placeholder="17:00:00"></td><td><textarea name="description[]" id="description" class="form-control"></textarea></td><td><button type="button" class="btn btn-warning" onclick="removeItineryForm('+itineryCount+')"><i class="fa fa-trash"></i></button></td></tr>';
        $('#itinery_booking').append(html);
    }
    function removeItineryForm(id)
    {
        $('#itinery_form'+id).remove();
    }
    function removeOldItineryForm(id)
    {
        $('#itinery_old_form'+id).remove();
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>