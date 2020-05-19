<?php $__env->startSection('heading'); ?>
New Booking
<small>Detail of New Booking</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo e(url('/branchadmin/booking')); ?>">Booking</a></li>
<li class="active">New Booking</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(count($errors)): ?>
<div class="row">
    <div class="col-xs-12">
        <div class="alert alert-danger">
            <?php foreach($errors->all() as $error): ?>
            <?php echo e('* : '.$error); ?></br>
            <?php endforeach; ?>
        </div>
    </div>

</div>
<?php endif; ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">New Booking</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="booking_form" method="POST"
                        action="<?php echo e(url('/branchadmin/booking/save')); ?>">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="error_data" id="error_data" value="">
                        <div class="form-group<?php echo e($errors->has('booking_purpose_id') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label">Purpose of Booking</label>
                            <div class="col-md-9">
                                <select class="form-control" id="booking_purpose_id" name="booking_purpose_id">

                                    <?php foreach($datas['purpose'] as $purpose): ?>
                                    <?php if($purpose->id == old('booking_purpose_id')): ?>
                                    <option selected="selected" value="<?php echo e($purpose->id); ?>"><?php echo e($purpose->title); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($purpose->id); ?>"><?php echo e($purpose->title); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    <option value="0">Others</option>
                                </select>

                                <?php if($errors->has('booking_purpose_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('booking_purpose_id')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-1">
                                <a href="javascript:void(0)" class="btn btn-primary" onclick="addPurposeBtn()"><i
                                        class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>

                        <?php if(old('other_purpose') != ''): ?>
                        <?php ($style = 'display:block;'); ?>
                        <?php else: ?>
                        <?php ($style = 'display:none;'); ?>

                        <?php endif; ?>


                        <div class="form-group" id="other_purpose" style="<?php echo e($style); ?>">
                            <label class="col-md-2 control-label">Other Purpose</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" name="other_purpose"
                                    value="<?php echo e(old('other_purpose')); ?>">
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('place_id') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label">Place</label>

                            <div class="col-md-9">
                                <select class="form-control" id="place_id" name="place_id">
                                    <option>Select Place</option>
                                    <?php foreach($datas['places'] as $place): ?>
                                    <?php if($place->id == old('place_id')): ?>
                                    <option selected="selected" value="<?php echo e($place->id); ?>"><?php echo e($place->title); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($place->id); ?>"><?php echo e($place->title); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>

                                </select>

                                <?php if($errors->has('place_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('place_id')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-1">
                                <a href="javascript:void(0)" class="btn btn-primary" onclick="addPlaceBtn()"><i
                                        class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('hall_id') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label">Hall</label>

                            <div class="col-md-9" id="hall">
                                <input type="hidden" name="hall_id" id="hall_id" value="">
                                <input type="text" name="others" id="others" class="form-control">

                                <?php if($errors->has('hall_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('hall_id')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-1">
                                <a href="javascript:void(0)" class="btn btn-primary" onclick="addHallBtn()"><i
                                        class="fa fa-plus"></i> Add</a>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-9 message_detail" id="hall_detail">
                            </div>
                        </div>

                        <div id="timedate" class="form-group<?php echo e($errors->has('booking_date') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label">Booking From Date</label>

                            <div class="col-md-5">

                                <input type="text" required name="booking_date" id="from_date"
                                    class="form-control datepicker" autocomplete="off" value="<?php echo e(old('booking_date')); ?>">

                                <?php if($errors->has('booking_date')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('booking_date')); ?></strong>
                                </span>
                                <?php endif; ?>

                            </div>
                            <div class="col-md-2">

                                <input type="text" required name="booking_time" id="from_time"
                                    class="form-control time start" autocomplete="off" placeholder="Select Start Time"
                                    value="<?php echo e(old('booking_time')); ?>">

                                <?php if($errors->has('booking_time')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('booking_time')); ?></strong>
                                </span>
                                <?php endif; ?>

                            </div>
                            <div class="col-md-2">

                                <input type="text" required name="booking_to_time" id="to_time"
                                    class="form-control time end" placeholder="Select End Time" autocomplete="off"
                                    value="<?php echo e(old('booking_to_time')); ?>">

                                <?php if($errors->has('booking_to_time')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('booking_to_time')); ?></strong>
                                </span>
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-5 message_detail" id="hall_date_detail">
                            </div>
                            <div class="col-md-5 message_detail" id="hall_date_detail_time">
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label">Description</label>

                            <div class="col-md-9">

                                <textarea class="form-control" name="description"><?php echo e(old('description')); ?></textarea>

                                <?php if($errors->has('description')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                </span>
                                <?php endif; ?>

                            </div>
                        </div>
                        <?php $booking_staffs_row = 0; ?>
                        <div id="sifts">
                            <?php if(is_array(old('booking_staffs'))): ?>
                            <?php if(count(old('booking_staffs')) > 0): ?>
                            <?php foreach(old('booking_staffs') as $key => $time): ?>
                            <div class="row" id="booking_staffs_<?php echo e($booking_staffs_row); ?>">
                                <div class="col-md-6">


                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Staff</label>

                                        <div class="col-md-8">
                                            <select class="form-control" id="staffs_<?php echo e($booking_staffs_row); ?>"
                                                name="booking_staffs[<?php echo e($booking_staffs_row); ?>]"
                                                onchange="checkStaff('<?php echo e($booking_staffs_row); ?>')">
                                                <option value="0"> Select Staff</option>
                                                <?php foreach($datas['staffs'] as $staff): ?>
                                                <?php if($time == $staff->id): ?>
                                                <option selected="selected" value="<?php echo e($staff->id); ?>"> <?php echo e($staff->name); ?>

                                                </option>
                                                <?php else: ?>
                                                <option value="<?php echo e($staff->id); ?>"> <?php echo e($staff->name); ?></option>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-danger margin-top-6 delete_desc"
                                        onclick="$('#booking_staffs_<?php echo e($booking_staffs_row); ?>').remove();"
                                        data-toggle="tooltip" title="" type="button" data-original-title="remove"><i
                                            class="fa fa-times"></i></button>
                                </div>
                                <div class="col-md-5 message_detail" id="staff_detail_<?php echo e($booking_staffs_row); ?>">
                                </div>
                            </div>
                            <?php $booking_staffs_row++ ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <div class="row" id="booking_staffs_<?php echo e($booking_staffs_row); ?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Staff</label>
                                        <div class="col-md-8">
                                            <select class="form-control checkstaff" id="staffs_<?php echo e($booking_staffs_row); ?>"
                                                name="booking_staffs[<?php echo e($booking_staffs_row); ?>]"
                                                onchange="checkStaff('<?php echo e($booking_staffs_row); ?>')">
                                                <option value="0"> Select Staff</option>
                                                <?php foreach($datas['staffs'] as $staff): ?>
                                                <option value="<?php echo e($staff->id); ?>"> <?php echo e($staff->name); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">

                                    <button class="btn btn-danger margin-top-10 delete_desc"
                                        onclick="$('#booking_staffs_<?php echo e($booking_staffs_row); ?>').remove();"
                                        data-toggle="tooltip" title="" type="button" data-original-title="remove"><i
                                            class="fa fa-times"></i></button>


                                </div>
                                <div class="col-md-5 message_detail" id="staff_detail_<?php echo e($booking_staffs_row); ?>">
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right margin-top-10">
                                <button id="addSift" type="button" class="btn btn-sm grey-mint pullri">Add More
                                    Staffs</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Submit <i class="fa fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo e(asset('/js/datepair.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/js/jquery.datepair.js')); ?>"></script>
<script type="text/javascript">
    var sift_row = '<?php echo e($booking_staffs_row + 1); ?>';
    $('#addSift').on('click', function(){
        
        html = '<div class="row" id="booking_staffs_'+sift_row+'">';
        html += '<div class="col-md-6"> <div class="form-group"><label class="col-md-4 control-label">Staff</label> <div class="col-md-8"> <select class="form-control checkstaff" id="staffs_'+sift_row+'" name="booking_staffs['+sift_row+']" onchange="checkStaff('+sift_row+')"> <option value="0"> Select Staff</option> <?php foreach($datas["staffs"] as $staff): ?> <option value="<?php echo e($staff->id); ?>"> <?php echo e($staff->name); ?></option> <?php endforeach; ?> </select></div></div></div>';
        
        html += '<div class="col-md-1"><button class="btn btn-danger margin-top-10 delete_desc" onclick="$(\'#booking_staffs_'+sift_row+'\').remove();" data-toggle="tooltip" title="" type="button" data-original-title="remove"><i class="fa fa-times"></i></button></div><div class="col-md-5 message_detail" id="staff_detail_'+sift_row+'"></div></div>';
        $('#sifts').append(html);
        sift_row++;

        checkStaff();
       
    });

$(function () {
    
   $('#timedate .time').timepicker({
      'showDuration': true,
      'timeFormat': 'H:i:s',
    });

    $('#timedate').datepair();
    

    
    $('.datepicker').datepicker({
        onSelect: function(date) {
            var hall_id = $('#hall_id').val();
            var token = $('input[name=\'_token\']').val();
            if(hall_id != ''){
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(url("/branchadmin/booking/get_hall_detail")); ?>',
                    data: '_token='+token+'&hall_id='+hall_id+'&date='+date,
                    cache: false,
                    success: function(html){
                     $('#hall_date_detail').html(html);
                       
                    }
                });
            }
        }
    });

});

$('#from_time').on('changeTime', function() {
    var from_time  = $(this).val();

    var hall_id = $('#hall_id').val();
    var token = $('input[name=\'_token\']').val();
    var from_date = $('#from_date').val();
    if (hall_id != '' && from_date != '' ) {
         $.ajax({
                    type: 'POST',
                    url: '<?php echo e(url("/branchadmin/booking/get_hall_detail_time")); ?>',
                    data: '_token='+token+'&hall_id='+hall_id+'&date='+from_date+'&from_time='+from_time,
                    cache: false,
                    success: function(html){
                     $('#hall_date_detail_time').html(html);
                       
                    }
                });
    }
});

$('#to_time').on('changeTime', function() {
    var to_time  = $(this).val();

    var hall_id = $('#hall_id').val();
    var token = $('input[name=\'_token\']').val();
    var from_date = $('#from_date').val();
    var from_time = $('#from_time').val();
    if (hall_id != '' && from_date != '' ) {
         $.ajax({
                    type: 'POST',
                    url: '<?php echo e(url("/branchadmin/booking/get_hall_detail_time")); ?>',
                    data: '_token='+token+'&hall_id='+hall_id+'&date='+from_date+'&to_time='+to_time+'&from_time='+from_time,
                    cache: false,
                    success: function(html){
                     $('#hall_date_detail_time').html(html);
                       
                    }
                });
    }
});

$('#place_id').on('change', function()
{
    var token = $('input[name=\'_token\']').val();
    var id = $(this).val();
    if (id != '') {
         $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/branchadmin/booking/getHalls")); ?>',
            data: '_token='+token+'&id='+id,
            cache: false,
            success: function(html){
                $('#popup_place_id').val(id);
                $('#hall').html(html);
            }
      });
    }

   
})

function checkStaff(id)
{
    
    var token = $('input[name=\'_token\']').val();
     var from_date = $('#from_date').val();
     var from_time = $('#from_time').val();
     var to_time = $('#to_time').val();
     var staff_id = $('#staffs_'+id).val();
     if (from_date != '' && from_time != '' && to_time != '' && staff_id != 0) {
    $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/branchadmin/booking/check")); ?>',
            data: '_token='+token+'&from_date='+from_date+'&from_time='+from_time+'&staff_id='+staff_id+'&to_time='+to_time,
            cache: false,
            success: function(html){
            $('#staff_detail_'+id).html(html);
               
            }
      });
    } else{
        $('#staff_detail_'+id).html('');
    }
};

function hallChange() {
    var hall_id = $('#hall_id').val();
     var token = $('input[name=\'_token\']').val();
     var date = $('#from_date').val();
    if (hall_id != '') {
        $('.message_detail').html('');
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("branchadmin/booking/gethalldetail")); ?>',
            data: '_token='+token+'&hall_id='+hall_id,
            cache: false,
            success: function(html) {
                $('#hall_detail').html(html);
            }
        });

        if(date != '')
        {
            $.ajax({
                    type: 'POST',
                    url: '<?php echo e(url("/branchadmin/booking/get_hall_detail")); ?>',
                    data: '_token='+token+'&hall_id='+hall_id+'&date='+date,
                    cache: false,
                    success: function(html){
                     $('#hall_date_detail').html(html);
                       
                    }
                });
        }
    }
}

$('#booking_purpose_id').on('change',function(){
    var id = $(this).val();
    if (id == 0) {
        $('#other_purpose').fadeIn();
    }else{
        $('#other_purpose').val('');
        $('#other_purpose').fadeOut();
    }
})


</script>
<?php /* new changes */ ?>
<div class="modal fade bd-example-modal-lg" id="booking-modal-add-purpose">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Booking Purpose</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="testform" method="POST"
                    action="<?php echo e(url('/branchadmin/bookingpurpose/save')); ?>">
                    <?php echo csrf_field(); ?>

                    <div id="sifts_purpose_form">
                        <div class="row" id="bookingpurpose1">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-6 control-label">Purpose Title</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="purposetitle[]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <?php /* <button class="btn btn-danger margin-top-10 delete_desc" onclick="removePurposeForm()"
                                    type="button"><i class="fa fa-times"></i></button> */ ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right margin-top-10">
                            <button type="button" class="btn btn-sm grey-mint pullri" onclick="addPurposeForm()">Add
                                More
                                Purpose</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-3">
                            <button type="button" id="savePurposeBtn" class="btn btn-primary">
                                Submit <i class="fa fa-paper-plane"></i>
                            </button>
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
    function addPurposeBtn()
    {
        $('#booking-modal-add-purpose').modal('show');
    }
    function addPurposeForm()
    {
       count++;
       var html = '<div class="row" id="bookingpurpose'+count+'"><div class="col-md-6"><div class="form-group"><label class="col-md-6 control-label">Purpose Title</label><div class="col-md-6"><input type="text" class="form-control" name="purposetitle[]"></div></div></div><div class="col-md-2"><button type="button" class="btn btn-danger margin-top-10 delete_desc" onclick="removePurposeForm('+count+')"><i class="fa fa-times"></i></button></div></div>';
       $('#sifts_purpose_form').append(html)

    }
    function removePurposeForm(num)
    {
        $('#bookingpurpose'+num).remove();
    }
    $('#savePurposeBtn').click(function(){
        var values = $("input[name='purposetitle[]']").map(function(){return $(this).val();}).get();
        var token = $("input[name=\"_token\"]").val();
        $.ajax({
            url: '<?php echo e(route("branchadmin.addPurpose")); ?>',
            type: 'POST',
            data: '_token='+token+'&title='+values,
            cache: false,
            success: function(data){
                console.log(data.msg)
                if(data.msg){
                    location.reload();
                }
            },
            error: function(error){
                console.log(error)
            }
        });
    })
</script>
<div class="modal fade bd-example-modal-lg" id="booking-modal-add-place">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Booking Place</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="testform" method="POST"
                    action="<?php echo e(url('/branchadmin/bookingplace/save')); ?>">
                    <?php echo csrf_field(); ?>

                    <div id="sifts_place_form">
                        <div class="row" id="bookingplace1">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-6 control-label">Place Title</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="place[]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <?php /* <button class="btn btn-danger margin-top-10 delete_desc" onclick="removePlaceForm()"
                                                        type="button"><i class="fa fa-times"></i></button> */ ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right margin-top-10">
                            <button type="button" class="btn btn-sm grey-mint pullri" onclick="addPlaceForm()">Add
                                More Place</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-3">
                            <button type="button" id="savePlaceBtn" class="btn btn-primary">
                                Submit <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<script>
    var placeCount = 1;
    function addPlaceBtn()
    {
        $('#booking-modal-add-place').modal('show');
    }
    function addPlaceForm()
    {
       placeCount++;
       var html = '<div class="row" id="bookingplace'+placeCount+'"><div class="col-md-6"><div class="form-group"><label class="col-md-6 control-label">Place Title</label><div class="col-md-6"><input type="text" class="form-control" name="place[]"></div></div></div><div class="col-md-2"><button type="button" class="btn btn-danger margin-top-10 delete_desc" onclick="removePlaceForm('+placeCount+')"><i class="fa fa-times"></i></button></div></div>';
       $('#sifts_place_form').append(html)

    }
    function removePlaceForm(placeCount)
    {
        $('#bookingplace'+placeCount).remove();
    }
    $('#savePlaceBtn').click(function(){
        var values = $("input[name='place[]']").map(function(){return $(this).val();}).get();
        var token = $("input[name=\"_token\"]").val();
        $.ajax({
            url: '<?php echo e(route("branchadmin.addPlace")); ?>',
            type: 'POST',
            data: '_token='+token+'&place='+values,
            cache: false,
            success: function(data){
                console.log(data.msg)
                if(data.msg){
                    location.reload();
                }
            },
            error: function(error){
                console.log(error)
            }
        });
    })
</script>
<div class="modal fade bd-example-modal-lg" id="booking-modal-add-hall">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Booking Hall</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="testform" method="POST"
                    action="<?php echo e(url('/branchadmin/bookingplace/save')); ?>">
                    <?php echo csrf_field(); ?>

                    <div id="sifts_hall_form">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Select Place</label>
                                    <div class="col-md-6">
                                        <select name="place" id="popup_place_id" class="form-control">
                                            <option>Select Place</option>
                                            <?php foreach($datas['places'] as $place): ?>
                                            <?php if($place->id == old('place_id')): ?>
                                            <option selected="selected" value="<?php echo e($place->id); ?>"><?php echo e($place->title); ?>

                                            </option>
                                            <?php else: ?>
                                            <option value="<?php echo e($place->id); ?>"><?php echo e($place->title); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="bookinghall1">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-6 control-label">Hall Title</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="hall[]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <?php /* <button class="btn btn-danger margin-top-10 delete_desc" onclick="removeHallForm()"
                                                        type="button"><i class="fa fa-times"></i></button> */ ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right margin-top-10">
                            <button type="button" class="btn btn-sm grey-mint pullri" onclick="addHallForm()">Add
                                More Hall</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-3">
                            <button type="button" id="saveHallBtn" class="btn btn-primary">
                                Submit <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<script>
    var hallCount = 1;
    function addHallBtn()
    {
        $('#booking-modal-add-hall').modal('show');
    }
    function addHallForm()
    {
       hallCount++;
       var html = '<div class="row" id="bookinghall'+hallCount+'"><div class="col-md-6"><div class="form-group"><label class="col-md-6 control-label">Hall Title</label><div class="col-md-6"><input type="text" class="form-control" name="hall[]"></div></div></div><div class="col-md-2"><button type="button" class="btn btn-danger margin-top-10 delete_desc" onclick="removeHallForm('+hallCount+')"><i class="fa fa-times"></i></button></div></div>';
       $('#sifts_hall_form').append(html)

    }
    function removeHallForm(hallCount)
    {
        $('#bookinghall'+hallCount).remove();
    }
    $('#saveHallBtn').click(function(){
        var values = $("input[name='hall[]']").map(function(){return $(this).val();}).get();
        var token = $("input[name=\"_token\"]").val();
        var place_id = $("#popup_place_id").val();
        $.ajax({
            url: '<?php echo e(route("branchadmin.addHall")); ?>',
            type: 'POST',
            data: '_token='+token+'&hall='+values+'&place_id='+place_id,
            cache: false,
            success: function(data){
                console.log(data.msg)
                if(data.msg){
                    location.reload();
                }
            },
            error: function(error){
                console.log(error)
            }
        });
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>