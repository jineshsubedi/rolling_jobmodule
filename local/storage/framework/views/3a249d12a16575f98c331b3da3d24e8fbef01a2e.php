<?php $__env->startSection('heading'); ?>
Dashboard
<small class="blueclr">Detail of <span class="bold"> <?php echo e($data['user']->name); ?></span></small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="active">Dashboard</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    #box-body{
        max-height:200px;
        overflow-y:scroll;
    }
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyDo0ipfmvHOQP8aW3M4b8AFnTVzF5RMyvM&v=3&libraries=panoramio"></script>
<input type="hidden" id="geo_location" name="geo_location" value="">
<?php echo csrf_field(); ?>

  <div class="row cm10-row">
    <div class="col-md-5">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Attendance</h3>
        </div>
        <!-- /.box-header -->
        <div class="row cm10-row">
          <div class="col-md-3">
            <?php if($data['in_time'] != ''): ?>
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Office In at</h3>
                <span class="label <?php echo e($data['in_class']); ?>"><?php echo e($data["in_time"].' '.$data['in_distance']); ?></span>
                <button onclick="viewMap('<?php echo e($data["in_location"]); ?>','Duty Started in <?php echo e($data["in_time"]); ?>')"><i class="fa fa-map-marker"></i></button>
              </div>
            </div>
            <?php else: ?>
            <div class="all5p"><button type="button" class="btn common_btn" onclick="submitIntime()">Clock In</button></div>
            <?php endif; ?>
          </div>
           <?php if($data['in_time'] != ''): ?>
          <div class="col-md-3">
            <?php if($data['lunch_start'] != ''): ?>
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Lunch Out at</h3>
                <span class=""><?php echo e($data["lunch_start"]); ?></span>
                <button title="Lunch Out" onclick="viewMap('<?php echo e($data["lunch_start_location"]); ?>','Duty Started in <?php echo e($data["lunch_start"]); ?>')" ><i class="fa fa-map-marker"></i></button>
              </div>
              <!-- /.box-header -->
            </div>
            <?php else: ?>
            <?php if($data['out_time'] == ''): ?>
            <button type="button" class="btn common_btn" onclick="submitLunchOut()">Lunch Out</button>
            <?php endif; ?>
            <?php endif; ?>
          </div>
          <?php endif; ?>
          <?php if($data['lunch_start'] != '' && $data['out_time'] == ''): ?>
          <div class="col-md-3">
            <?php if($data['lunch_end'] != ''): ?>
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Lunch In at</h3>
                <span class=""><?php echo e($data["lunch_end"]); ?></span>
                <button title="Lunch Out" onclick="viewMap('<?php echo e($data["lunch_end_location"]); ?>','Duty ended in <?php echo e($data["lunch_end"]); ?>')" ><i class="fa fa-map-marker"></i></button>
              </div>
            </div>
            <?php else: ?>
            <?php if($data['out_time'] == ''): ?>
            <button type="button" class="btn common_btn" onclick="submitLunchIn()">Lunch In</button>
            <?php endif; ?>
            <?php endif; ?>
          </div>
          <?php endif; ?>
          <?php if($data['in_time'] != ''): ?>
          <div class="col-md-3">
            <?php if($data['out_time'] != ''): ?>
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Office Out at</h3>
                <span class="label <?php echo e($data['out_class']); ?>"><?php echo e($data["out_time"].' '.$data['out_distance']); ?></span>
                <button title="Duty Out" onclick="viewMap('<?php echo e($data["out_location"]); ?>','Duty ended in <?php echo e($data["out_time"]); ?>')" ><i class="fa fa-map-marker"></i></button>
              </div>
              <!-- /.box-header -->
            </div>
            <?php else: ?>
            <button type="button" class="btn common_btn" onclick="submitOuttime()">Clock Out</button>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="col-md-7">
      <div class="row cm10-row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-exchange"></i> In and Out</h3>
            </div>
            <ul class="attendancelist">
              <li>Average In : <span class="greenclr bold"><?php echo e($data['avg_in']); ?></span></li>
              <li>Average Out : <span class="greenclr bold"><?php echo e($data['avg_out']); ?></span></li>
              <li>Average Lunch : <span class="greenclr bold"><?php echo e($data['avg_lunch']); ?></span></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-exclamation-triangle"></i> Late Employees</h3>
            </div>
            <ul class="attendancelist">
              <li>Early In : <a href="#" data-toggle="modal" data-target="#modal-early-in" class="redclr bold"><?php echo e(count($data['early_in'])); ?></a></li>
              <li>Late In : <a href="#" data-toggle="modal" data-target="#modal-late-in" class="redclr bold"><?php echo e(count($data['late_in'])); ?></a></li>
              <!--<li>Above 30 min Late In :<a href="#" data-toggle="modal" data-target="#modal-above-thirty" class="redclr bold"><?php echo e(count($data['above_thirty'])); ?></a></li>-->
              <li>Absent : <a href="#" data-toggle="modal" data-target="#modal-absent"
                class="redclr bold"><?php echo e(count($data['absent_staff'])); ?></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-hourglass-2"></i> OT Hours</h3>
            </div>
            <ul class="attendancelist">
              <li>Yesterday : <span class="orangeclr bold"><?php echo e($data['yot']); ?></span></li>
              <li>Last Week : <span class="orangeclr bold"><?php echo e($data['lwot']); ?></span></li>
              <li>Last Month : <span class="orangeclr bold"><?php echo e($data['lmot']); ?></span></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-connectdevelop"></i> Organization</h3>
            </div>
            <ul class="attendancelist">
              <li>Branch : <span class="blueclr bold"><?php echo e($data['branches']); ?></span></li>
              <li>Department : <span class="blueclr bold"><?php echo e($data['departments']); ?></span></li>
              <li>Total Staffs : <span class="blueclr bold"><?php echo e($data['total_staff']); ?></span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
   
  </div>
<div class="row" style="margin-bottom: 10px">
  <div class="col-xs-12">
     <div class="box">
      <div class="box-body" style="padding: 0px;">
        <div class="time-wraper">
          <?php if(count($data['daily_routine']) > 0): ?>
          <?php ($i = 1); ?>
          <?php foreach($data['daily_routine'] as $routing): ?>
            
          <a data-id="<?php echo e($routing['id']); ?>" data-type="<?php echo e($routing['data_type']); ?>" data-othertype="<?php echo e($routing['type']); ?>" data-toggle="tooltip" id="time-<?php echo e($routing['type'].$routing['id']); ?>" href="#" class="time-box timebg<?php echo e($i); ?>" title="<?php echo e($routing['start_hour']); ?> to <?php echo e($routing['finish_time']); ?> <?php echo e($routing['title']); ?>" style="left: <?php echo e($routing['margin']); ?>%; width:<?php echo e($routing['width']); ?>%; "><button type="button" onclick="deleteTimeData('<?php echo e($routing["id"]); ?>','<?php echo e($routing["type"]); ?>')" class="close close-button">×</button><?php echo e($routing['title']); ?>

            
          </a>
          <?php ($i++); ?>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
    <div class="col-xs-1 hours" >
      <div class="col-xs-12 time-table">

      </div>
      <div class="col-xs-12 pd0">
        <div class="col-xs-3 pd0 time-bar" data-time="07:00">
        <span>07 AM</span>
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="07:15">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="07:30">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="07:45">
        
      </div>
      </div>
    </div>

    <div class="col-xs-1 hours">
      <div class="col-xs-12 time-table">
      </div>
      <div class="col-xs-12 pd0">
        <div class="col-xs-3 pd0 time-bar" data-time="08:00">
        <span>08 AM</span>
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="08:15">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="08:30">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="08:45">
        
      </div>
      </div>
    </div>

    <div class="col-xs-1 hours">
      <div class="col-xs-12 time-table">
      </div>
      <div class="col-xs-12 pd0">
        <div class="col-xs-3 pd0 time-bar" data-time="09:00">
        <span>09 AM</span>
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="09:15">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="09:30">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="09:45">
        
      </div>
      </div>
    </div>

    <div class="col-xs-1 hours">
      <div class="col-xs-12 time-table">
      </div>
      <div class="col-xs-12 pd0">
        <div class="col-xs-3 pd0 time-bar" data-time="10:00">
        <span>10 AM</span>
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="10:15">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="10:30">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="10:45">
        
      </div>
      </div>
    </div>

    <div class="col-xs-1 hours">
      <div class="col-xs-12 time-table">
      </div>
      <div class="col-xs-12 pd0">
        <div class="col-xs-3 pd0 time-bar" data-time="11:00">
        <span>11 AM</span>
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="11:15">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="11:30">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="11:45">
        
      </div>
      </div>
    </div>

    <div class="col-xs-1 hours">
      <div class="col-xs-12 time-table">
      </div>
      <div class="col-xs-12 pd0">
        <div class="col-xs-3 pd0 time-bar" data-time="12:00">
        <span>12 AM</span>
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="12:15">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="12:30">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="12:45">
        
      </div>
      </div>
    </div>

    <div class="col-xs-1 hours">
      <div class="col-xs-12 time-table">
      </div>
      <div class="col-xs-12 pd0">
        <div class="col-xs-3 pd0 time-bar" data-time="13:00">
        <span>1 PM</span>
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="13:15">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="13:30">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="13:45">
        
      </div>
      </div>
    </div>

    <div class="col-xs-1 hours">
      <div class="col-xs-12 time-table">
      </div>
      <div class="col-xs-12 pd0">
        <div class="col-xs-3 pd0 time-bar" data-time="14:00">
        <span>2 PM</span>
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="14:15">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="14:30">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="14:45">
        
      </div>
      </div>
    </div>

    <div class="col-xs-1 hours">
      <div class="col-xs-12 time-table">
      </div>
      <div class="col-xs-12 pd0">
        <div class="col-xs-3 pd0 time-bar" data-time="15:00">
        <span>3 PM</span>
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="15:15">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="15:30">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="15:45">
        
      </div>
      </div>
    </div>

    <div class="col-xs-1 hours">
      <div class="col-xs-12 time-table">
      </div>
      <div class="col-xs-12 pd0">
        <div class="col-xs-3 pd0 time-bar" data-time="16:00">
        <span>4 PM</span>
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="16:15">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="16:30">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="16:45">
        
      </div>
      </div>
    </div>

    <div class="col-xs-1 hours">
      <div class="col-xs-12 time-table">
      </div>
      <div class="col-xs-12 pd0">
        <div class="col-xs-3 pd0 time-bar" data-time="17:00">
        <span>5 PM</span>
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="17:15">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="17:30">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="17:45">
        
      </div>
      </div>
    </div>

    <div class="col-xs-1 hours">
      <div class="col-xs-12 time-table">
      </div>
     <div class="col-xs-12 pd0">
        <div class="col-xs-3 pd0 time-bar" data-time="18:00">
        <span>6 PM</span>
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="18:15">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="18:30">
        
      </div>
      <div class="col-xs-3 pd0 time-bar" data-time="18:45">
        
      </div>
      </div>
    </div>


  </div>
  </div>
</div>
</div>
<!-- Stick Note Status started here -->

<div id="box-body">
   <div class="row cm10-row">
  <?php foreach($data['sticky_note'] as $sticky): ?>
    <div id="mydiv_<?php echo e($sticky->id); ?>" class="col-md-3 stickers">
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-8">
                <div class="col-md-2">
                  <a type="javascript:void(0)" class="btn btn-xs addsticker" style="" onclick="addSticker()"><i
                      class="fa fa-plus"></i></a>
                </div>
                <div class="col-md-10" id="stickerTitleContainer<?php echo e($sticky->id); ?>">
                  <p id="stickerTitle<?php echo e($sticky->id); ?>" onclick="stickerTitle(<?php echo e($sticky->id); ?>, '<?php echo e($sticky->title); ?>')">
                    <?php echo e($sticky->title); ?></p>
                  <span id="titleformgroup<?php echo e($sticky->id); ?>">
                    <?php if(!$sticky->title): ?>
                    <input type="text" class="form-control" id="titleForm<?php echo e($sticky->id); ?>" value="<?php echo e($sticky->title); ?>"
                      onblur="stickyUpdateTitle(<?php echo e($sticky->id); ?>)">
                    <?php endif; ?>
                  </span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box-tools text-right">
                  <span id="reminderNotify<?php echo e($sticky->id); ?>">

                  </span>
                  <a href="javascript:void(0)" class="btn btn-xs text-center"
                    onclick="removeSticker('<?php echo e($sticky->id); ?>')"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <script>
                $(document).ready(function(){
                  <?php /*  $('#reminderNotify<?php echo e($sticky->id); ?>').html('vg')  */ ?>
                  var token = $("input[name=\"_token\"]").val();
                  $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('supervisor.checkReminderForSticky')); ?>",
                    data: {
                      _token : token,
                      id : '<?php echo e($sticky->id); ?>',
                    },
                    cache: false,
                    success: function(data){
                      var sticker = data.msg
                      if(sticker){
                        if(sticker.status == 1){
                          $('#reminderNotify<?php echo e($sticky->id); ?>').html('<a href="javascript:void(0)" class="btn btn-xs text-center" onclick="stickerReminder(<?php echo e($sticky->id); ?>)" data-toggle="tooltip" data-placement="bottom" title="reminder off"><i class="fa fa-bell-slash"></i></a>')
                        }else{
                          var timeSet = 'Reminder Date '+sticker.date+' Reminder Time'+sticker.time
                          $('#reminderNotify<?php echo e($sticky->id); ?>').html('<a href="javascript:void(0)" class="btn btn-xs text-center" onclick="stickerReminder(<?php echo e($sticky->id); ?>)" data-toggle="tooltip" data-placement="bottom" title="'+timeSet+'"><i class="fa fa-bell"></i></a>')
                        }
                      }else{
                        $('#reminderNotify<?php echo e($sticky->id); ?>').html('<a href="javascript:void(0)" class="btn btn-xs text-center" onclick="stickerReminder(<?php echo e($sticky->id); ?>)" data-toggle="tooltip" data-placement="bottom" title="add a reminder"><i class="fa fa-clock-o"></i></a>')
                      }
                    },
                    error: function(error)
                    {
                      console.log(error)
                    }
                  })
                })
              </script>
            </div>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <textarea class="js-elasticArea" id="sticker_<?php echo e($sticky->id); ?>"
            onblur="updateSticker('<?php echo e($sticky->id); ?>')"><?php echo e($sticky->detail); ?></textarea>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  <?php endforeach; ?>
  </div>
</div><!-- /.box-body -->



<!-- Event updates started here -->
<div class="tp10m comnbg">
  <div class="title_bg">Event Updates <i class="fa fa-calendar redclr"></i></div>
  <div class="row cm10-row">
    <div class="col-lg-6 col-xs-6">
      <div class="row cm10-row">
        
        <div class="col-lg-4">
          <div class="tp5p">
            <h3 class="common_title"><i class="fa fa-calendar-times-o"></i>Leave</h3>
              <div class="box-body">
                <ul class="products-list product-list-in-box">
                  <?php if(count($data['today_leave']) > 0): ?>
                   <?php foreach($data['today_leave'] as $todayleave): ?>
                  <li class="item">
                    <div class="product-img">
                      <img src="<?php echo e($todayleave['image']); ?>" alt="<?php echo e($todayleave['staff_name']); ?>" class="img-circle">
                    </div>
                    <div class="product-info tp7p">
                      <div class="product-title"><?php echo e($todayleave['staff_name']); ?> </div>
                     <span class="orangeclr"><?php echo e($todayleave['leave_type']); ?></span>
                     <div class="greenclr"><?php echo e($todayleave['duration']); ?></div>
                    </div>
                  </li>
                  <?php endforeach; ?>
                   <?php endif; ?>
                </ul>
              </div>
          </div>
        </div>
       
        
        <div class="col-lg-4">
        <div class="tp5p">
          <h3 class="common_title"><i class="fa fa-bookmark redclr"></i>Work Anniversary</h3>
          <div class="box-body">
            <ul class="products-list product-list-in-box">
               <?php if(count($data['this_week_aniver']) > 0): ?>
              <?php foreach($data['this_week_aniver'] as $aniv): ?>
                <li class="item">
                  <div class="product-img">
                      <img src="<?php echo e($aniv['image']); ?>" alt="Staff Image" class="img-circle">
                    </div>
                    <div class="product-info tp7p">
                      <div class="product-title"><?php echo e($aniv['name']); ?></div>
                     Date: <span class="greenclr"><?php echo e($aniv['bday']); ?></span>
                    </div>
                </li>
                <?php endforeach; ?>
                 <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
     
      
      <div class="col-lg-4">
        <div class="tp5p">
          <h3 class="common_title"><i class="fa fa-birthday-cake redclr"></i>Birthday</h3>
          <div class="box-body">
            <ul class="products-list product-list-in-box">
              <?php if(count($data['this_week_birthday'])): ?>
              <?php foreach($data['this_week_birthday'] as $bstaff): ?>
              <li class="item">
                <div class="product-img">
                  <img src="<?php echo e($bstaff['image']); ?>" alt="Staff Image" class="img-circle">
                </div>
                <div class="product-info tp7p">
                  <div class="product-title"><?php echo e($bstaff['name']); ?></div>
                 Date: <span class="greenclr"><?php echo e($bstaff['bday']); ?></span>
                </div>
              </li>
              <?php endforeach; ?>
               <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
     
      </div>
    </div>
    <div class="col-lg-4">
      <div class="row cm10-row">
        
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="tp5p">
              <h3 class="common_title"><i class="fa fa-sign-out orangeclr"></i>Offboarding</h3>
              <div class="box-body">
                <ul class="products-list product-list-in-box">
                  <?php if(count($data['resignation']) > 0): ?>
                   <?php foreach($data['resignation'] as $resignation): ?>
                    <li class="item">
                      <div class="product-img">
                        <?php if($resignation['image']): ?>
                        <img src="<?php echo e(asset('image/'.$resignation['image'])); ?>" alt="Staff Image" class="img-circle" style="object-fit:contain;">
                        <?php else: ?>
                        <img src="<?php echo e(asset('image/noimage.png')); ?>" alt="Staff Image" class="img-circle" style="object-fit:contain;">
                        <?php endif; ?>
                      </div>
                      <div class="product-info tp7p">
                        <div class="product-title"><?php echo e($resignation['staff_name']); ?></div>
                       Date: <span class="greenclr"><?php echo e($resignation['offBoarding_date']); ?></span>
                      </div>
                    </li>
                   <?php endforeach; ?>
                  <?php endif; ?>
                  <?php if(count($data['terminate']) > 0): ?>
                   <?php foreach($data['terminate'] as $terminate): ?>
                    <li class="item">
                      <div class="product-img">
                        <?php if($terminate['image']): ?>
                        <img src="<?php echo e(asset('image/'.$terminate['image'])); ?>" alt="Staff Image" class="img-circle" style="object-fit:contain;">
                        <?php else: ?>
                        <img src="<?php echo e(asset('image/noimage.png')); ?>" alt="Staff Image" class="img-circle" style="object-fit:contain;">
                        <?php endif; ?>
                      </div>
                      <div class="product-info tp7p">
                        <div class="product-title"><?php echo e($terminate['staff_name']); ?></div>
                       Date: <span class="greenclr"><?php echo e($terminate['offBoarding_date']); ?></span>
                      </div>
                    </li>
                   <?php endforeach; ?>
                  <?php endif; ?>
                </ul>
              </div>
          </div>
        </div>
       
        
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
         <div class="tp5p">
            <h3 class="common_title"><i class="fa fa-sign-in greenclr"></i>Onboarding Staffs</h3>
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                 <?php if(count($data['onboarding']) > 0): ?>
                 <?php foreach($data['onboarding'] as $onboarding): ?>
                  <li class="item">
                    <div class="product-img">
                      <img src="" alt="Staff Image" class="img-circle">
                    </div>
                    <div class="product-info tp7p">
                      <div class="product-title"><?php echo e($onboarding->name); ?></div>
                     Date: <span class="orangeclr"><?php echo e($onboarding->joining_date); ?></span>
                    </div>
                  </li>
                  <?php endforeach; ?>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
        
      </div>  
    </div>
    <div class="col-lg-2">
        <div class="tp5p">
            <h3 class="common_title"><i class="fa fa-calendar"></i> UpComming Events</h3>
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php if(count($data['events']) > 0): ?>
                 <?php foreach($data['events'] as $event): ?>
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo e(asset('image/'.$event['attachment'])); ?>" alt="Staff Image" class="img-circle">
                  </div>
                  <div class="product-info tp7p">
                    <div class="product-title"><?php echo e($event['title']); ?></div>
                   Date: <span class="greenclr"><?php echo e(\Carbon\Carbon::parse($event['from'])->format('d M')); ?> - <?php echo e(\Carbon\Carbon::parse($event['to'])->format('d M')); ?></span>
                  </div>
                </li>
                <?php endforeach; ?>
                 <?php endif; ?>
              </ul>
            </div>
        </div>
    </div>
  </div>
</div>

 <!-- Master status started here -->
<div class="lightbluebg">
  <?php /* staff skill */ ?>
  <?php if(isset($data['skills'])): ?>
  <div class="tp10m all5p">
    <div class="title_bg">Top Skilled Staff <i class="glyphicon glyphicon-king blueclr"></i></div>
    <div class="row cm10-row">
      <div class="col-md-12">
        <div class="row cm10-row">
          <?php foreach($data['skills'] as $skill): ?>
          <div class="col-lg-2">
            <div class="tp5p">
              <h3 class="common_title"><?php echo e(ucwords($skill['title'])); ?></h3>
              <div class="box-body" style="padding: 0px;">
                <ul class="products-list product-list-in-box">
                  <li class="item">
                    <div class="product-img">
                      <img src="<?php echo e(\App\Adjustment_staff::getImage($skill['staff_id'])); ?>" alt="Staff Image" class="img-circle">
                    </div>
                    <div class="product-info tp7p">
                      <div class="product-title"><?php echo e(\App\Adjustment_staff::getName($skill['staff_id'])); ?></div>
                     Score: <span class="orangeclr"><?php echo e($skill['score']); ?></span>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
   <!-- Master status started here -->
  <div class="tp10m all5p">
    <div class="title_bg">Performance Updates <i class="fa fa-line-chart blueclr"></i></div>
    <div class="row cm10-row">
      <div class="col-lg-7 col-xs-6">
        <div class="row cm10-row">
          <?php if(isset($data['masters']['best_performer'])): ?>
        <div class="col-lg-4">
          <div class="tp5p">
            <h3 class="common_title bp_title">Best Performer</h3>
            <div class="best_performer">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo e(asset($data['masters']['best_performer']['image'])); ?>" alt="Staff Image" class="img-circle">
                  </div>
                  <div class="product-info tp7p">
                    <div class="product-title"><?php echo e($data['masters']['best_performer']['name']); ?></div>
                   Point: <span class="orangeclr"><?php echo e($data['masters']['best_performer']['point']); ?></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php if(isset($data['masters']['achievement'])): ?>
        <div class="col-lg-4">
          <div class="tp5p">
            <h3 class="common_title">Achievement Master</h3>
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo e(asset($data['masters']['achievement']['image'])); ?>" alt="Staff Image" class="img-circle">
                  </div>
                  <div class="product-info tp7p">
                    <div class="product-title"><?php echo e($data['masters']['achievement']['name']); ?></div>
                   Point: <span class="orangeclr"><?php echo e($data['masters']['achievement']['point']); ?></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php if(isset($data['masters']['kpi_master'])): ?>
        <div class="col-lg-4">
          <div class="tp5p">
            <h3 class="common_title">KPI Master</h3>
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo e(asset($data['masters']['kpi_master']['image'])); ?>" alt="Staff Image" class="img-circle">
                  </div>
                  <div class="product-info tp7p">
                    <div class="product-title"><?php echo e($data['masters']['kpi_master']['name']); ?></div>
                   Point: <span class="orangeclr"><?php echo e($data['masters']['kpi_master']['point']); ?></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="row cm10-row">
          <?php if(isset($data['masters']['wow'])): ?>
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="tp5p">
                <h3 class="common_title">Wow Rating Master</h3>
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="<?php echo e(asset($data['masters']['wow']['image'])); ?>" alt="Staff Image" class="img-circle">
                      </div>
                      <div class="product-info tp7p">
                        <div class="product-title"><?php echo e($data['masters']['wow']['name']); ?></div>
                       Point: <span class="orangeclr"><?php echo e($data['masters']['wow']['point']); ?></span>
                      </div>
                    </li>
                  </ul>
                </div>
            </div>
          </div>
          <?php endif; ?>
          <?php if(isset($data['masters']['help'])): ?>
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
           <div class="tp5p">
                <h3 class="common_title">HelpDesk Master</h3>
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        <img src="<?php echo e(asset($data['masters']['help']['image'])); ?>" alt="Staff Image" class="img-circle">
                      </div>
                      <div class="product-info tp7p">
                        <div class="product-title"><?php echo e($data['masters']['help']['name']); ?></div>
                       Number: <span class="orangeclr"><?php echo e($data['masters']['help']['point']); ?></span>
                      </div>
                    </li>
                  </ul>
                </div>
            </div>
          </div>
          <?php endif; ?>
        </div>  
      </div>
    </div>
  </div>   
</div>   

   <div class="tp10m comnbg all5p">
      <div class="title_bg">
        Request Status <i class="fa fa-edit blueclr"></i>
      </div>
   <div class="row cm10-row tp10p">
      
     <div class="col-lg-3">
          <div class="box collapsed-box collapsed">
            <div class="box-header with-border">
              <h3 class="box-title">Waiting HR Leave Approval</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body">
                <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                <ul class="todo-list ui-sortable">
                   <?php if(count($data['waiting_approval']) > 0): ?>
                  <?php foreach($data['waiting_approval'] as $hrapproval): ?>
                  <li>
                    <a href="javascript:void(0)" onclick="viewLeave('<?php echo e($hrapproval["id"]); ?>')" class="text"><?php echo e(\App\Adjustment_staff::getName($hrapproval->requested_by)); ?> (<?php echo e(\App\LeaveType::getTitle($hrapproval->leave_type)); ?>)</a>
                    <!-- Emphasis label -->
                    <small class="label label-danger"><i class="fa fa-calendar"></i> <?php echo e($hrapproval->start_date.' - '.$hrapproval->end_date); ?></small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools ">
                      <a  href="javascript:void(0);" onClick="HRApprove('/<?php echo e($hrapproval->id); ?>')" style="color: GREEN;margin: 0px 2px;">Approve</a>
                      <a  href="javascript:void(0);" onClick="HRdecline('<?php echo e($hrapproval->id); ?>')" style="color: RED;margin: 0px 2px;">Dismiss</a>
                    </div>
                  </li>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </ul>
            </div>
          </div>
        </div>
     
     <div class="col-md-3">     
          <div class="box collapsed-box collapsed">
            <div class="box-header with-border">
              <h3 class="box-title">Waiting Supervisor Leave Approval</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <ul class="todo-list ui-sortable">
                <?php if(count($data['waiting_sapproval']) > 0): ?>
                <?php foreach($data['waiting_sapproval'] as $sapproval): ?>
                <li>
                  <a href="javascript:void(0)" onclick="viewLeave('<?php echo e($sapproval["id"]); ?>')" class="text"><?php echo e(\App\Adjustment_staff::getName($sapproval->requested_by)); ?> (<?php echo e(\App\LeaveType::getTitle($sapproval->leave_type)); ?>)</a>
                  <!-- Emphasis label -->
                  <small class="label"><i class="fa fa-calendar"></i> <?php echo e($sapproval->start_date.' - '.$sapproval->end_date); ?></small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools ">
                    <a href="javascript:void(0);" onClick="SUApprove('/<?php echo e($sapproval->id); ?>')" style="color: GREEN;margin: 0px 2px;">Approve</a>
                    <a href="javascript:void(0);" onClick="SUdecline('<?php echo e($sapproval->id); ?>')" style="color: RED;margin: 0px 2px;">Dismiss</a>
                  </div>
                </li>
                <?php endforeach; ?>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>

       <div class="col-md-3">
          <div class="box collapsed-box collapsed">
            <div class="box-header with-border">
              <h3 class="box-title">Recent Adjustment Request <?php echo e(count($data['latest_adjustment_request'])); ?> of <?php echo e($data['re_ad_request']); ?></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
              </div>
            </div>
            <div class="box-body">
              <ul class="todo-list ui-sortable">
                <?php if(count($data['latest_adjustment_request']) > 0): ?>
                <?php foreach($data['latest_adjustment_request'] as $adreq): ?>
                <li>
                  <span class="text"><?php echo e(\App\Adjustment_staff::getName($adreq->adjustment_staff_id)); ?> (<?php echo e(\App\Adjustmentreason::getTitle($adreq->adjustment_reason)); ?>)</span>
                  <!-- Emphasis label -->
                  <small class="label label-danger"><i class="fa fa-clock-o"></i> <?php echo e($adreq->time_to_be_adjusted); ?></small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools ">
                    <a  href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($adreq->id); ?>')" style="color: RED;margin: 0px 2px;"><i class="fa fa-trash-o"></i></a>
                    <a href="javascript:void(0);" onClick="confirm_approve('/<?php echo e($adreq->id); ?>')" style="color: GREEN; margin: 0px 2px;">Approve</a>
                    <a  href="javascript:void(0);" onClick="confirm_dismiss('/<?php echo e($adreq->id); ?>')" style="color: RED;margin: 0px 2px;">Dismiss</a>
                  </div>
                </li>
                <?php endforeach; ?> 
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      
    

        <div class="col-md-3">     
          <div class="box collapsed-box collapsed">
            <div class="box-header with-border">
              <h3 class="box-title">Recent Over Time Request <?php echo e(count($data['latest_ot_request'])); ?> of <?php echo e($data['re_ot_request']); ?></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <ul class="todo-list ui-sortable">
                <?php if(count($data['latest_ot_request']) > 0): ?>
                <?php foreach($data['latest_ot_request'] as $otreq): ?>
              <li>
                <span class="text"><?php echo e(\App\Adjustment_staff::getName($otreq->adjustment_staff_id)); ?> (<?php echo e(\App\OtReason::getTitle($otreq->ot_reason)); ?>)</span>
                <!-- Emphasis label -->
                <small class="label"><i class="fa fa-clock-o"></i> <?php echo e($otreq->ot_hour); ?> Minutes</small>
                <!-- General tools such as edit or delete-->
                <div class="tools ">
                  <a  href="javascript:void(0);" onClick="confirmDelete('/<?php echo e($otreq->id); ?>')" style="color: RED;margin: 0px 2px;"><i class="fa fa-fw fa-remove"></i></a>
                  <a  href="javascript:void(0);" onClick="confirmApprove('/<?php echo e($otreq->id); ?>')" style="color: GREEN;margin: 0px 2px;">Approve</a>
                  <a  href="javascript:void(0);" onClick="confirmDismiss('/<?php echo e($otreq->id); ?>')" style="color: RED;margin: 0px 2px;">Dismiss</a>
                </div>
              </li>
              <?php endforeach; ?>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
   </div>
 </div>

 <div class="row cm10-row tp10m">
    <div class="col-md-8">
      <div class="comnbg">
        <div class="title_bg all5p">Staff Status <i class="fa fa-bar-chart-o orangeclr"></i></div>
        <div class="row cm10-row">
          <div class="col-lg-3 col-xs-6">
            <div class="common_block">
              <div class="box-header with-border bold">Working Status</div>
                <div class="listpadding">
                  <span>
                    <icon class="fa  fa-check-square-o greenclr"></icon>
                    <a href="#"> Working: <span class="bold"><?php echo e($data['currently_working']); ?></span></a>
                  </span>
                </div>
                <div class="listpadding">
                  <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#">Resigned: <span class="bold"><?php echo e($data['resigned']); ?></span></a></span>
                </div>
                <div class="listpadding">
                  <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#">Absconding: <span class="bold"><?php echo e($data['absconding']); ?></span></a></span>
                </div>
                <div class="listpadding">
                  <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#">Terminated: <span class="bold"><?php echo e($data['terminated']); ?></span></a></span>
                </div>
            </div>
          </div>  
          <div class="col-lg-3 col-xs-6">
            <div class="common_block">
              <div class="box-header with-border bold">Duty Status</div>
              <div class="listpadding">
                <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#" data-toggle="modal" data-target="#modal-on_duty">Onduty: <span class="bold"><?php echo e(count($data['duty_staff'])); ?></span></a></span>
              </div>
              <div class="listpadding">
                <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#" data-toggle="modal" data-target="#modal-online">Online: <span class="bold"><?php echo e(count($data['active_staff'])); ?></span></a></span>
              </div>
              <div class="listpadding">
                <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#" data-toggle="modal" data-target="#modal-absent">Absent: <span class="bold"><?php echo e(count($data['absent_staff'])); ?></span></a></span>
              </div>
              <div class="listpadding">
                <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#" data-toggle="modal" data-target="#modal-leave">Leave: <span class="bold"><?php echo e(count($data['today_leave'])); ?></span></a></span>
              </div>
            </div>
          </div>  
          <div class="col-lg-3 col-xs-6">
            <div class="common_block">
              <div class="box-header with-border bold">Contract Status</div>
              <div class="listpadding">
                <span><icon class="fa  fa-check-square-o greenclr"></icon><a href="#"> Full time: <span class="bold"><?php echo e($data['staff_workmode']['full_time']); ?></span></a></span>
              </div>
              <div class="listpadding">
                <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#">Part time: <span class="bold"><?php echo e($data['staff_workmode']['part_time']); ?></span></a></span>
              </div>
              <div class="listpadding">
                <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#">Probation: <span class="bold"><?php echo e($data['staff_workmode']['probation']); ?></span></a></span>
              </div>
              <div class="listpadding">
                <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#">Internship: <span class="bold"><?php echo e($data['staff_workmode']['intern']); ?></span></a></span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <div class="common_block">
              <div class="box-header with-border bold">Branches</div>
              <?php foreach($data['bstaffs'] as $bs): ?>
              <div class="listpadding">
                <span><icon class="fa  fa-check-square-o greenclr"></icon><a href="#"> <?php echo e($bs->name); ?>: <span class="bold"><?php echo e($bs->staffs); ?></span></a></span>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="comnbg">
        <div class="title_bg all5p">Task Status <i class="fa fa-bar-chart-o orangeclr"></i></div>
        <div class="row cm10-row">
          <div class="col-md-6">
            <div class="common_block">
                <div class="box-header with-border bold">Task</div>
                <div class="listpadding">
                  <span>
                    <icon class="fa  fa-check-square-o greenclr"></icon> 
                    <a href="<?php echo e(url('/supervisor/tasks')); ?>"> Not Accepted: <span class="bold"><?php echo e($data['notaccepted_task']); ?></span></a>
                  </span>
                </div>
                <div class="listpadding">
                  <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="<?php echo e(url('/supervisor/tasks?status=0')); ?>">In Process: <span class="bold"><?php echo e($data['inprocess_task']); ?></span></a></span>
                </div>
                <div class="listpadding">
                  <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="<?php echo e(url('/supervisor/tasks?status=2')); ?>">Deadline Crossed: <span class="bold"><?php echo e($data['crossed_task']); ?></span></a></span>
                </div>
                <div class="listpadding">
                  <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="<?php echo e(url('/supervisor/tasks?status=1')); ?>">Completed: <span class="bold"><?php echo e($data['completed_task']); ?></span></a></span>
                </div>
              </div>
          </div>
          <div class="col-md-6">
            <div class="common_block">
              <div class="box-header with-border bold">Help Desk</div>
              <div class="listpadding">
                  <span>
                    <icon class="fa  fa-check-square-o greenclr"></icon> 
                    <a href="<?php echo e(url('/supervisor/tasks')); ?>"> Not Accepted: <span class="bold"><?php echo e($data['notaccepted_help']); ?></span></a>
                  </span>
                </div>
                <div class="listpadding">
                  <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="<?php echo e(url('/supervisor/tasks?status=0')); ?>">In Process: <span class="bold"><?php echo e($data['inprocess_help']); ?></span></a></span>
                </div>
                <div class="listpadding">
                  <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="<?php echo e(url('/supervisor/tasks?status=2')); ?>">Deadline Crossed: <span class="bold"><?php echo e($data['crossed_help']); ?></span></a></span>
                </div>
                <div class="listpadding">
                  <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="<?php echo e(url('/supervisor/tasks?status=1')); ?>">Completed: <span class="bold"><?php echo e($data['completed_help']); ?></span></a></span>
                </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

<div class="comnbg tp10m">
  <div class="title_bg all5p">HR Updates <i class="fa fa-black-tie blueclr"></i></div>
  <div class="row cm10-row tp10m">
    <div class="col-lg-2 col-xs-6">
      <div class="chart" id="male-female" style="height: 150px;" ></div>
    </div>
    <div class="col-lg-2 col-xs-6">
      <div class="chart" id="married" style="height: 150px;" ></div>
    </div>
    <?php if(count($data['age']) > 0): ?>
      <div class="col-lg-2 col-xs-12">
       
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Age Diagram</h3>
          </div>
          <div class="box-body chart-responsive" style="padding:0px;">
            <canvas id="pieChart" style="height:150px"></canvas>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <?php endif; ?> 
      <div class="col-lg-2 col-xs-12">
         <div class="chart" id="district" style="height: 150px;" ></div>
      </div>
      <div class="col-lg-2 col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Employment Status</h3>
            </div>
            <div class="box-body chart-responsive" style="padding:0px;">
              <div class="chart" id="employmentStatus" style="height: 150px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <div class="col-lg-2 col-xs-12">
      </div>
  </div> 
</div>
  

 <?php if(count($data['divisions']) > 0 && auth()->guard('staffs')->user()->branch == 2): ?>
    <div class="form-group row cm10-row">
        <div class="col-md-1">
            <label class="tp10p">Filter Date</label>
        </div>
        <div class="col-md-2">
          <select class="form-control" id="filter_date">
            <option value="">Select Date</option>
            <?php if(count($data['dates']) > 0): ?>
            <?php foreach($data['dates'] as $filter_date): ?>
            <?php if($data['filter_date'] == $filter_date->add_date): ?>
            <option selected="selected" value="<?php echo e($filter_date->add_date); ?>"><?php echo e($filter_date->add_date); ?></option>
            <?php else: ?>
            <option value="<?php echo e($filter_date->add_date); ?>"><?php echo e($filter_date->add_date); ?></option>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endif; ?>
          </select>
        </div>
    </div>
  <div class="row cm10-row">
    <?php foreach($data['divisions'] as $division): ?>
    <div class="col-md-4">
      <!-- LINE CHART -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Revenue of <?php echo e($division['title']); ?> (<?php echo e($division['date_added']); ?>)</h3>
        </div>
        <div class="box-body chart-responsive">
          <div id="chart_div_<?php echo e($division['id']); ?>" style="height:auto;"></div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['City', 'Applications',],
        
        ['Revenue', <?php echo e($division["revenue"]); ?>],
        ['Direct Expenses', <?php echo e($division["direct_expenses"]); ?>],
        ['Indirect Expenses', <?php echo e($division["indirect_expenses"]); ?>],
        ['Direct Net Profit', <?php echo e($division["net_profit"]); ?>],
        
      ]);
       var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,  {
        calc: function (dt, row) {
          return dt.getValue(row, 0) + ' - ' + dt.getColumnLabel(1) + ': ' + dt.getFormattedValue(row, 1);
        },
        role: 'annotationText',
        type: 'string'
      }]);

      var options = {
         legend: {
              position: 'none'
            },
        resize: true,
        chartArea: {width: '100%'},
        hAxis: {
          
          minValue: 0
        },
        vAxis: {
          title: ''
        }
      };
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_<?php echo e($division["id"]); ?>'));
      chart.draw(data, options);
    }
    </script>
    <?php endforeach; ?>
    </div>
    <?php endif; ?>

   

<div class="modal fade" id="modal-on_duty">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="leave-title">On Duty Staffs</h4>
              </div>
             
              <div class="modal-body">
              <ul class="products-list product-list-in-box">
                <?php foreach($data['duty_staff'] as $dstaff): ?>

                <li class="item col-md-4">
                  <div class="product-img">
                    <img src="<?php echo e($dstaff['image']); ?>" alt="Staff Image" class="img-circle">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?php echo e($dstaff['name']); ?></a>
                      
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
               
              </div>
             <div class="modal-footer">
               
                
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
  <div class="modal fade" id="modal-online">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="leave-title">Online Staffs</h4>
              </div>
             
              <div class="modal-body">
             <ul class="products-list product-list-in-box">
                <?php foreach($data['active_staff'] as $astaff): ?>

                <li class="item col-md-4">
                  <div class="product-img">
                    <img src="<?php echo e($astaff['image']); ?>" alt="Staff Image" class="img-circle">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?php echo e($astaff['name']); ?></a>
                      
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
               
              </div>
              <div class="modal-footer">
               
                
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>  

   <div class="modal fade" id="modal-absent">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="leave-title">Absent Staffs</h4>
              </div>
             
              <div class="modal-body">
             <ul class="products-list product-list-in-box">
                 <?php foreach($data['absent_staff'] as $astaff): ?>

                <li class="item col-md-4">
                  <div class="product-img">
                    <img src="<?php echo e($astaff['image']); ?>" alt="Staff Image" class="img-circle">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?php echo e($astaff['name']); ?></a>
                      
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
               
              </div>
              <div class="modal-footer">
                
                
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 

         <div class="modal fade" id="modal-leave">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="leave-title">On Leave Staffs</h4>
              </div>
             
              <div class="modal-body">
             <ul class="products-list product-list-in-box">
                <?php foreach($data['today_leave'] as $todayleave): ?>
                <li class="item" style="width: 100% !important;">
                  <div class="product-img">
                    <img src="<?php echo e($todayleave['image']); ?>" alt="<?php echo e($todayleave['staff_name']); ?>">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" onclick="viewLeave('<?php echo e($todayleave["id"]); ?>')" class="product-title"><?php echo e($todayleave['staff_name']); ?>

                      <span class="label label-warning pull-right"><?php echo e($todayleave['full_day']); ?></span></a>
                    <span class="product-description">
                          <?php echo e($todayleave['leave_type']); ?>

                        </span>
                  </div>
                </li>
                <!-- /.item -->
               <?php endforeach; ?>
              </ul>
               
              </div>
              <div class="modal-footer">
                
                
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>   

  <div class="modal fade" id="modal-early-in">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="leave-title">Early In Staffs</h4>
              </div>
             
              <div class="modal-body">
             <ul class="products-list product-list-in-box">
                 <?php foreach($data['early_in'] as $early_in): ?>

                <li class="item col-md-4">
                  <div class="product-img">
                    <img src="<?php echo e($early_in['image']); ?>" alt="Staff Image" class="img-circle">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?php echo e($early_in['name']); ?></a>
                      Time: <span class="greenclr"><?php echo e($early_in['in_time']); ?></span>
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
               
              </div>
              <div class="modal-footer">
                
                
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
        <div class="modal fade" id="modal-late-in">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Late In Staffs</h4>
              </div>
             
              <div class="modal-body">
             <ul class="products-list product-list-in-box">
                 <?php foreach($data['late_in'] as $late_in): ?>

                <li class="item col-md-4">
                  <div class="product-img">
                    <img src="<?php echo e($late_in['image']); ?>" alt="Staff Image" class="img-circle">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?php echo e($late_in['name']); ?></a>
                      Time: <span class="greenclr"><?php echo e($late_in['in_time']); ?></span>
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
               
              </div>
              <div class="modal-footer">
                
                
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
        <div class="modal fade" id="modal-above-thirty">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="leave-title">Above 30 Min Late In Staffs</h4>
              </div>
             
              <div class="modal-body">
             <ul class="products-list product-list-in-box">
                 <?php foreach($data['above_thirty'] as $above_thirty): ?>

                <li class="item col-md-4">
                  <div class="product-img">
                    <img src="<?php echo e($above_thirty['image']); ?>" alt="Staff Image" class="img-circle">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?php echo e($above_thirty['name']); ?></a>
                      Time: <span class="greenclr"><?php echo e($above_thirty['in_time']); ?></span>
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
               
              </div>
              <div class="modal-footer">
                
                
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
  <div class="modal fade" id="modal-leave">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="leave-title">Leave Detail</h4>
              </div>
             
              <div class="modal-body" id="leave-body">
              
               
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
        
 <div class="modal fade" id="modal-attendance">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="attendance-title"></h4>
          </div>
         
            <div class="modal-body" id="attendance-body">
              <div class="row">
            <div class="col-md-12" id="meeting_detail">

            </div>
          </div>
          <div class="row">
            <div class="col-md-12 modal_body_map">
              <div class="location-map" id="location-map">
                <div style="width: 100%; height: 400px;" id="map_canvas"></div>
              </div>
            </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
             
            </div>
         
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-meeting">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="meeting-title">Meeting Detail</h4>
          </div>
          <form id="decline_form" method="POST" action="<?php echo e(url('/supervisor/attendance/meeting')); ?>" class="form-horizontal" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="id" id="meeting_id" value="">
            <input type="hidden" name="location" id="meeting_location" value="">
            <div class="modal-body">
               <div class="form-group">
                
                <div class="col-md-12">
                  <input type="text" class="form-control" name="company" placeholder="Company Name" required="required">
                  
                </div>
                
              </div>
              <div class="form-group">
                
                <div class="col-md-12">
                  <input type="text" class="form-control" name="meeting_with" placeholder="Meeting With" required="required">
                  
                </div>
                
              </div>

              <div class="form-group">
                
                <div class="col-md-12">
                  <textarea class="form-control" name="description" placeholder="Description" required="required"></textarea>
                  
                </div>
                
              </div>
              <div class="form-group">
                
                <div class="col-md-12">
                  <input type="file" class="form-control" name="image" >
                  
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
    if(confirm('Do You Want To Delete This data?')){
      var url= "<?php echo e(url('/supervisor/adjustment/delete/')); ?>"+ids;
      location = url;
      
      }
    }
  
       
      function confirm_approve(ids){
    if(confirm('Do You Want To Approve This Request?')){
      var url= "<?php echo e(url('/supervisor/adjustment/approve/')); ?>"+ids;
      location = url;
      
      }
    }


      function confirm_dismiss(ids){
    if(confirm('Do You Want To Dismiss This Request?')){
      var url= "<?php echo e(url('/supervisor/adjustment/dismiss/')); ?>"+ids;
      location = url;
      
      }
    }
  </script>

  <script type="text/javascript">

 
      function confirmDelete(ids){
    if(confirm('Do You Want To Delete This data?')){
      var url= "<?php echo e(url('/supervisor/otrequest/delete/')); ?>"+ids;
      location = url;
      
      }
    }
  function confirmApprove(ids){
    if(confirm('Do You Want To Approve This Request?')){
      var url= "<?php echo e(url('/supervisor/otrequest/approve/')); ?>"+ids;
      location = url;
      
      }
    }


      function confirmDismiss(ids){
    if(confirm('Do You Want To Dismiss This Request?')){
      var url= "<?php echo e(url('/supervisor/otrequest/dismiss/')); ?>"+ids;
      location = url;
      
      }
    }
       
  </script>
  
  
  
<link rel="stylesheet" href="<?php echo e(asset('/assets/moris/morris.css')); ?>">

<script src="<?php echo e(asset('/assets/moris/raphael-min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/moris/morris.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/chart.js/Chart.js')); ?>"></script>
<script type="text/javascript">
  $(function(){
    var fullTime = '<?php echo e($data["full_time_employee"]); ?>';
    var partTime = '<?php echo e($data["part_time_employee"]); ?>';
    Morris.Donut({
      element: 'employmentStatus',
      data: [
        {label: "Full Time", value: fullTime},
        {label: "Part Time", value: partTime},
      ]
    }); 

  var bar = new Morris.Bar({
      element: 'male-female',
      resize: true,
      data: [
        {y: 'Male/Female', a: '<?php echo e($data["total_male"]); ?>', b: '<?php echo e($data["total_female"]); ?>'},
        
        
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Male', 'Female'],
      hideHover: 'auto'
    });

    var bar = new Morris.Bar({
      element: 'married',
      resize: true,
      data: [
        {y: 'Married/Unmarried', a: '<?php echo e($data["total_married"]); ?>', b: '<?php echo e($data["total_unmarried"]); ?>'},
        
        
      ],
      barColors: ['#00c0ef', '#f39c12'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Married', 'Unmarried'],
      hideHover: 'auto'
    });
    
    <?php if(count($data['district']) > 0): ?>
    
     var bar = new Morris.Bar({
      element: 'district',
      resize: true,
      data: [
         <?php foreach($data["district"] as $district): ?>
        {y: '<?php echo e($district["title"]); ?>', a: '<?php echo e($district["total"]); ?>'},
        <?php endforeach; ?>
        
      ],
      barColors: ['#00c0ef'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Total Staff'],
      hideHover: 'auto'
    });
    <?php endif; ?>
     
     <?php if(count($data['age']) > 0): ?>
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
    <?php foreach($data['age'] as $age): ?>
      {
        value    : '<?php echo e($age["total"]); ?>',
        color    : '<?php echo e($age["color"]); ?>',
        highlight: '<?php echo e($age["color"]); ?>',
        label    : '<?php echo e($age["title"]); ?>'
      },
      
      <?php endforeach; ?>
    ]
    <?php endif; ?>
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

  });
  
  
</script>

 <script type="text/javascript">
   function viewLeave(id) {
     var token = $('input[name=\'_token\']').val();
        $.ajax({
             type: 'POST',
                url: '<?php echo e(url("/supervisor/leaverequest/getDetail")); ?>',
                data: '_token='+token+'&id='+id,
                cache: false,
                success: function(html){
                  
                  $('#leave-body').html(html);
                  $('#modal-leave').modal('show');
                   
                }
          });
   }


   function SUApprove(id){
    if(confirm('Are you sure you want to Approve this?')){
      var url= "<?php echo e(url('/supervisor/leaverequest/supervisor_approve/')); ?>"+id;
      location = url;
      
      }
    }

    function HRApprove(id){
    if(confirm('Are you sure you want to Approve this?')){
      var url= "<?php echo e(url('/supervisor/leaverequest/hr_approve/')); ?>"+id;
      location = url;
      
      }
    }

     function SUdecline(id){
    if(confirm('Are you sure you want to decline this?')){
      $('#decline_id').val(id);
      $('#decline_form').attr('action','<?php echo e(url("/supervisor/leaverequest/supervisor_decline")); ?>')
      $('#modal-decline').modal('show');
      
      }
    }

    function HRdecline(id){
    if(confirm('Are you sure you want to decline this?')){
      $('#decline_id').val(id);
      $('#decline_form').attr('action','<?php echo e(url("/supervisor/leaverequest/hr_decline")); ?>')
      $('#modal-decline').modal('show');
      
      }
    }
    
     $('#filter_date').on('change', function(){
        var filter_date = $(this).val();
        var url = '<?php echo e(url("/supervisor/")); ?>';
        if(filter_date != '')
        {
            url += '?filter_date='+filter_date;
        }
        location = url;
    })
 </script>
 <script type="text/javascript">
    $(document).ready(function(){
    var x = document.getElementById("demo");
    
    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
    } else {
    x.innerHTML = '<div class="alert alert-danger">Geolocation is not supported by this browser.</div>';
    }
    
    
    });
    function showPosition(position) {
    $('#geo_location').val(position.coords.latitude+','+position.coords.longitude)
    
    }
    </script>
    <script type="text/javascript">
    function submitIntime() {
    var token = $('input[name=\'_token\']').val();
    var location = $('#geo_location').val();
    $.ajax({
    type: 'POST',
    url: '<?php echo e(url("/supervisor/attendance/intime")); ?>',
    data: '_token='+token+'&location='+location,
    cache: false,
    success: function(html){
    if (html == 'Success') {
    alert('Thank you');
    
    window.location.reload(); // then reload the page.(3)
    
    } else{
    alert(html);
    window.location.reload();
    
    }
    }
    });
    }


    function submitLunchOut() {
        if(confirm('Are you sure you want to go for lunch?')){
    var token = $('input[name=\'_token\']').val();
    var location = $('#geo_location').val();
    $.ajax({
    type: 'POST',
    url: '<?php echo e(url("/supervisor/attendance/lunch-start")); ?>',
    data: '_token='+token+'&location='+location,
    cache: false,
    success: function(html){
    if (html == 'Success') {
    alert('Thank you');
    
    window.location.reload(); // then reload the page.(3)
    
    } else{
    alert(html);
    window.location.reload();
    
    }
    }
    });
        }
    }

    function submitLunchIn() {
        if(confirm('Are you sure you in from lunch?')){
    var token = $('input[name=\'_token\']').val();
    var location = $('#geo_location').val();
    $.ajax({
    type: 'POST',
    url: '<?php echo e(url("/supervisor/attendance/lunch-end")); ?>',
    data: '_token='+token+'&location='+location,
    cache: false,
    success: function(html){
    if (html == 'Success') {
    alert('Thank you');
    
    window.location.reload(); // then reload the page.(3)
    
    } else{
    alert(html);
    window.location.reload();
    
    }
    }
    });
        }
    }
    function submitOuttime() {
        if(confirm('Are you sure you are out from duty?')){
      var token = $('input[name=\'_token\']').val();
      var location = $('#geo_location').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo e(url("/supervisor/attendance/outtime")); ?>',
        data: '_token='+token+'&location='+location,
        cache: false,
        success: function(html){
        if (html == 'Success') {
          alert('Thank you');
          
          window.location.reload(); // then reload the page.(3)
          
          } else{
          alert(html);
          window.location.reload();
          
          }
        }
      });
        }
    }

     function submitOutMeeting() {
        var token = $('input[name=\'_token\']').val();
        var location = $('#geo_location').val();
          $.ajax({
            type: 'POST',
            url: '<?php echo e(url("/supervisor/attendance/meeting-out")); ?>',
            data: '_token='+token+'&location='+location,
            cache: false,
            success: function(html){
              if (html == 'Success') {
              alert('Thank you');
              
              window.location.reload(); // then reload the page.(3)
              
              } else{
              alert(html);
              window.location.reload();
              
              }
            }
        });
    }


    function submitInMeeting(id) {
      var token = $('input[name=\'_token\']').val();
      var location = $('#geo_location').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo e(url("/supervisor/attendance/meeting-back")); ?>',
        data: '_token='+token+'&location='+location+'&id='+id,
        cache: false,
        success: function(html){
        if (html == 'Success') {
          alert('Thank you');
          
          window.location.reload(); // then reload the page.(3)
          
          } else{
          alert(html);
          window.location.reload();
          
          }
        }
      });
    }

    function submitMeeting(id) {
      var location = $('#geo_location').val();
      $('#meeting_location').val(location);
      $('#meeting_id').val(id);
      $('#modal-meeting').modal('show');
    }

    function viewMeetingDetail(location,meeting_date,company,meeting_with,description,meeting_document) {
        //alert(meeting_document);
        var htmldata = '<table class="table table-responsive">';
            htmldata += '<tr><td><strong>Meeting Date</strong></td><td>'+meeting_date+'</td></tr>';
            htmldata += '<tr><td><strong>Company</strong></td><td>'+company+'</td></tr>';
            htmldata += '<tr><td><strong>Meeting With</strong></td><td>'+meeting_with+'</td></tr>';
            htmldata += '<tr><td><strong>Description</strong></td><td>'+description+'</td></tr>';
            if(meeting_document != '') {
             // var href = '<?php echo e(url("image/")); ?>'+'/'.meeting_document;;
                  
              htmldata += '<tr><td><strong>Document</strong></td><td><a href="'+meeting_document+'" class="btn btn-primary" download target="_blank">Download</a></td></tr>';
            }
 
            htmldata += '</table>';

            $('#meeting_detail').html(htmldata);
            var data = location.split(',');
              //initialize(new google.maps.LatLng(data[0], data[1]));
                initializeGMap(data[0], data[1]);
             $('#attendance-title').html('Meeting Detail');
             
             $('#modal-attendance').modal('show');
    }

    
    </script>

    <script type="text/javascript">
      
        var map = null;
        var myMarker;
        var myLatlng;

        function initializeGMap(lat, lng) {
          myLatlng = new google.maps.LatLng(lat, lng);

          var myOptions = {
            zoom: 16,
            zoomControl: true,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

          myMarker = new google.maps.Marker({
            position: myLatlng
          });
          myMarker.setMap(map);
        }
      function viewMap(location,title) {
          var data = location.split(',');
        //initialize(new google.maps.LatLng(data[0], data[1]));
        
          initializeGMap(data[0], data[1]);
             $('#attendance-title').html(title);
             
             $('#modal-attendance').modal('show');
        }
    </script>
    <script type="text/javascript">
    function addSticker() {
      var token = $('input[name=\'_token\']').val(); 
            var detail = 'Sticky Note';
            $.ajax({
              type: 'POST',
              url: '<?php echo e(url("/supervisor/stikynote/save")); ?>',
              data: '_token='+token+'&detail='+detail,
              cache: false,
              success: function(id){
                  location.reload();
                // var html = '<div id="mydiv_'+id+'"  class="col-md-3 stickers"><div class="box box-success box-solid"><div class="box-header with-border"><h3></h3><button type="button" class="btn btn-box-tool addsticker" style="" onclick="addSticker()"><i class="fa fa-plus"></i></button><div class="box-tools pull-right"><button type="button" class="btn crossicon text-center" onclick="stickerReminder('+id+')"><i class="fa fa-clock-o"></i></button><button type="button" class="btn btn-box-tool" onclick="removeSticker('+id+')"><i class="fa fa-times"></i></button></div></div>';
                    
                // html += '<div class="box-body"><textarea class="js-elasticArea" id="sticker_'+id+'" onblur="updateSticker('+id+')" style="min-height: 50px; max-height: 300px;">Sticky Note</textarea></div></div></div>';
                // $('#box-body').prepend(html);
              }
            });
    }
    function removeSticker(id) {
      if(confirm('Do You Want To Delete This Sticker Note?')){
         var token = $('input[name=\'_token\']').val();
         var total = $('.stickers').length;
         if(total > 1) {
         $.ajax({
              type: 'POST',
              url: '<?php echo e(url("/supervisor/stikynote/delete")); ?>',
              data: '_token='+token+'&id='+id,
              cache: false,
              success: function(id){
                $('#mydiv_'+id).remove();
              }
            });
       }
      }
    }

    function updateSticker(id) {
       var token = $('input[name=\'_token\']').val();
       
        var detail = $('#sticker_'+id).val();
         $.ajax({
              type: 'POST',
              url: '<?php echo e(url("/supervisor/stikynote/update")); ?>',
              data: '_token='+token+'&id='+id+'&detail='+detail,
              cache: false,
              success: function(id){
                
            
              }
            });
    }

    function addMainSticker() {
      addSticker();
      $('#add_newsticker').remove();
    }
  </script>
  <?php if(count($data['sticky_note']) < 1): ?>
  <script type="text/javascript">
    $(document).ready(function(){
      addSticker();
    })
  </script>
  <?php endif; ?>

 <div class="modal fade " id="modal-addevent">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Work Detail</h4>
              </div>
               <form id="time-edit-form" method="POST" action="<?php echo e(url('/supervisor/daily-routine/save')); ?>" class="form-horizontal" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="id" id="task_id" value="">
              <div class="modal-body">
                <div id="timedate" >
                  <div class="form-group">
                            <label class="col-md-4 control-label">Work Date</label>

                            <div class="col-md-8">
                            
                           <input type="text" required name="booking_date" id="from_date" class="form-control datepicker" autocomplete="off" value="">
                              
                           
                               
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label">Start Time</label>
                            <div class="col-md-8">
                            
                           <input type="text" required name="start_time" id="from_time" class="form-control time start" autocomplete="off" placeholder="Select Start Time" value="">
                              
                            
                               
                            </div>
                          </div>
                             <div class="form-group">
                            <label class="col-md-4 control-label">End Time</label>
                             <div class="col-md-8">
                            
                           <input type="text" required name="end_time" id="to_time" class="form-control time end" placeholder="Select End Time" autocomplete="off" value="">
                              
                            
                               
                            </div>
                          </div>

                          <div class="form-group">
                          <label class="col-md-4 control-label">KRA</label>
                           <div class="col-md-8">
                            
                          <select class="form-control" name="kra" id="daily-kra" required="required">
                            <?php foreach($data['kra'] as $kra): ?>
                            <option value="<?php echo e($kra->id); ?>"><?php echo e($kra->title); ?></option>
                            <?php endforeach; ?>
                            <option value="0">Others</option>
                          </select>
                              
                            
                               
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 control-label">Work Title</label>
                           <div class="col-md-8">
                            
                          <input type="text" class="form-control" name="description" id="description" required="required">
                              
                            
                               
                            </div>
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

<script type="text/javascript" src="<?php echo e(asset('/js/datepair.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/js/jquery.datepair.js')); ?>"></script>

<script type="text/javascript">

  $('.time-bar').on('click', function()
  {
    var from_time = $(this).attr('data-time');
    var from_date = '<?php echo e(date("Y-m-d")); ?>'
     $('#from_date').val(from_date);
     $('#from_time').val(from_time);
     $('#time-edit-form').attr('action','<?php echo e(url("/supervisor/daily-routine/save")); ?>');
     $('#to_time').val('');
     $('#description').val('');
  
   $('#modal-addevent').modal('show');
  })
 
</script>
<script type="text/javascript">
  $(function () {
    
   
    $('#timedate .time').timepicker({
      'showDuration': true,
      'timeFormat': 'H:i:s',
      'minTime': '07:00:00',
    });

    $('#timedate').datepair();
  });
</script>
<script type="text/javascript">
  function deleteTimeData(id,type) {
    if(confirm('Do You Want To Delete This Work Plan?')){
     
      var token = $('input[name=\'_token\']').val();
     $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/supervisor/daily-routine/task-delete/")); ?>',
            data: '_token='+token+'&type='+ encodeURIComponent(type) +'&id='+id,
            cache: false,
            success: function(html){
              if (html == 'Success') {
                $('#time-'+type+id).remove();
              } else{
                alert(html);
               }
              }
      });
    
      
      }
    
  }

  $('.time-box').on('click', function(){
    var type = $(this).attr('data-othertype');
    if (type == 'Daily') {
      var id = $(this).attr('data-id');
       var token = $('input[name=\'_token\']').val();
     $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/supervisor/daily-routine/edit/")); ?>',
            data: '_token='+token+'&id='+id,
            cache: false,
            success: function(html){
             if (html != '') {
              var datas = html.split('|');
              
                $('#task_id').val(datas[0]);
                $('#from_date').val(datas[1]);
               $('#from_time').val(datas[2]);
              $('#time-edit-form').attr('action','<?php echo e(url("/supervisor/daily-routine/update")); ?>');
              $('#to_time').val(datas[3]);
              $('#description').val(datas[4]);
              $('#daily-kra').val(datas[5]).select();
             $('#modal-addevent').modal('show');
             }
              }
      });
    }
  })
</script>

<div class="modal fade bd-example-modal-lg" id="in_time_reason_model">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Late Clock In Response</h4>
      </div>
      <div class="modal-body" id="attendance-body">
        <form action="<?php echo e(url('/supervisor/attendance/intimereason')); ?>" method="post">
          <?php echo csrf_field(); ?>

          <?php echo e(method_field('PUT')); ?>

          <input type="hidden" name="staff_id" value="<?php echo e(auth()->guard('staffs')->user()->id); ?>">
          <div class="form-group">
            <label>Please specify your reason:</label>
            <div class="form-input">
              <textarea name="in_time_reason" id="inTimeReason" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal fade bd-example-modal-lg" id="out_time_reason_model">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Early Clock Out Response</h4>
      </div>
      <div class="modal-body" id="attendance-body">
        <form action="<?php echo e(url('/supervisor/attendance/outtimereason')); ?>" method="post">
          <?php echo csrf_field(); ?>

          <?php echo e(method_field('PUT')); ?>

          <input type="hidden" name="staff_id" value="<?php echo e(auth()->guard('staffs')->user()->id); ?>">
          <div class="form-group">
            <label>Please specify your reason:</label>
            <div class="form-input">
              <textarea name="out_time_reason" id="outTimeReason" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
   $(document).ready(function(){
     var numInTime = '<?php echo \App\Shifttime::checkIntime(auth()->guard('staffs')->user()->id, $data['in_time']); ?>';
    if(numInTime==1){
      $('#in_time_reason_model').modal('show');
    }
    var numOutTime = '<?php echo \App\Shifttime::checkOuttime(auth()->guard('staffs')->user()->id, $data['out_time']); ?>';
   
    if(numOutTime==1){
    $('#out_time_reason_model').modal('show');
    }
   })
   
  </script>
  
  
 <?php /* supervisor section */ ?>
  <div id="modal_staff_collection">
  </div>
  <script>
    $(document).ready(function(){
    var token = $('input[name=\'_token\']').val();
    $.ajax({
        type: 'GET',
        url: '<?php echo e(route("getSupervisorStaffs")); ?>',
        data: '_token='+token,
        cache: false,
        success: function(data){
          var users = data.msg
          var htmldata = '';
          $.each(users, function(index, value){
            $('#staff_name').text(value.name);
            
            $('#staff_id').val(value.id);
            htmldata = '<div class="modal fade bd-example-modal-lg" id="modal-staff-task'+value.id+'" style="height:100%; overflow-y: scroll;"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">'+value.name+'</h4></div><div class="modal-body"><input type="hidden" name="staff_id" id="staff_id" value="'+value.id+'"></div><div id="supervisor_task_list_'+value.id+'"></div><div class="modal-footer"><input type="checkbox" id="checkAll" value="0"> Check All &nbsp;<button type="button" class="btn btn-info" onclick="approveTask('+value.id+')">Approve</button></div></div></div></div>';
            $('#modal_staff_collection').append(htmldata);
            var staff_id = value.id;
            $.ajax({
              type: 'GET',
              url: '<?php echo e(route("getStaffDailyTask")); ?>',
              data: '_token='+token+'&staff_id='+staff_id,
              cache: false,
              success: function(tasks){
                $('#supervisor_task_list_'+value.id).html(tasks.msg)
              },
              error: function(error)
              {
                console.log(error)
              }
            })
            
          });
          $.each(users, function(index, value){
            $('#modal-staff-task'+value.id).modal('show');
          });
        },
        error: function(error){
          console.log(error);
        }
    });
  })
  </script>
  <script>
    var token = $("input[name=\"_token\"]").val();
    function openChat(id){
      $('#supervisor_chatMessages'+id).toggle();
      $('#supervisor_taskResponse'+id).toggle();
      var userImage = 'noimage.png';
      if("<?php echo auth()->guard('staffs')->user()->image; ?>" != ''){
      userImage = "<?php echo auth()->guard('staffs')->user()->image; ?>";
      }
      var chatForm = '<div class="row"><div class="col-md-2 text-center"><img src="<?php echo e(asset("/image")); ?>'+"/"+userImage+'" alt="Staff Image" class="img-circle" style="object-fit: contain; width:50px; height:50px;"><p><?php echo e(auth()->guard("staffs")->user()->name); ?></p></div><div class="col-md-8"><textarea name="message" id="chatmessage'+id+'" class="form-control"></textarea></div><div class="col-md-2"><button class="btn btn-sm btn-primary" onclick="chatmessageBtn('+id+')">Reply</button></div></div>'
      $("#supervisor_taskResponse"+id).html(chatForm);
      getMessageAjax(id)
    } 
    <?php /* function approveDailyTask(id, duration){
      $('#supervisor_chatMessages'+id).show();
      $('#supervisor_taskResponse'+id).show();
      var approveForm = '<div class="row"><div class="col-md-3"><label>Estimated Duration</label><input type="number" id="eduration'+id+'" class="form-control" value="'+duration+'"></div><div class="col-md-7"><label>Remarks</label><textarea name="" id="remarks'+id+'" class="form-control"></textarea></div><div class="col-md-2"><label>Action</label><br/><button class="btn btn-sm btn-primary" onclick="approveBtn('+id+', '+duration+')">Approve</button></div></div>'
      $("#supervisor_approveTask"+id).remove();
      $("#supervisor_taskResponse"+id).html(approveForm);
      getMessageAjax(id)
    } */ ?>
    function getMessageAjax(id){
      $.ajax({
        type: "GET",
        url: "<?php echo e(route('getMessageOnDailyTask')); ?>",
        data: "_token="+token+"&task_id="+id,
        cache: false,
        success: function(data){
          var tasks = data.msg;
          var chat = '';
          var deleteBtn = '';
          var authUser = '<?php echo auth()->guard("staffs")->user()->id; ?>';
          $.each(tasks, function(index, value){
            var image = 'noimage.png';
            if(value.user.image != ''){
              image = value.user.image;
            }
            var image = '<?php echo e(asset("/image")); ?>'+'/'+image;
            imageTag = '<img src="'+image+'" alt="Staff Image" class="img-circle" style="object-fit: contain; width:50px; height:50px;">';
            if(authUser == value.chat_from){
              deleteBtn = '<i class="fa fa-trash" style="font-size: 20px; color: red;" onclick="deletemessageBtn('+value.id+')"></i>';
              chat += '<div class="row form-group" id="mytaskchat'+value.id+'"><div class="col-md-2 text-center">'+imageTag+'<p>'+value.user.name+'</p></div><div class="col-md-8 alert-info" style="padding:10px; border-radius: 5px">'+value.message+'</div><div class="col-md-2">'+deleteBtn+'</div></div>';
            }else{
              chat += '<div class="row form-group" id="mytaskchat'+value.id+'"><div class="col-md-2"></div><div class="col-md-8 alert-info" style="padding:10px; border-radius: 5px">'+value.message+'</div><div class="col-md-2 text-center">'+imageTag+'<p>'+value.user.name+'</p></div></div>';
            }
          });
          $('#supervisor_chatMessages'+id).html(chat)
        },
        error: function(error){
          console.log(error)
          alert("failed!")
        }
      })
    }
    function deletemessageBtn(id)
    {
      $.ajax({
        type: "POST",
        url: "<?php echo e(route('deleteMessageOnDailyTask')); ?>",
        data: "_token="+token+"&task_id="+id,
        cache: false,
        success: function(data){
          console.log(data)
          $("#mytaskchat"+id).remove();
        },
        error: function(error)
        {
         $.each(error.responseJSON, function(index, value){
              alert(value)
          })
        }
      })
    }
    function approveTask(staff_id)
    {
      var ids = [];
      $("input[type=checkbox]:checked").each(function () {
        ids.push(this.value);
      });
      $.ajax({
        type: "POST",
        url: "<?php echo e(route('approveSelectedDailyTask')); ?>",
        data: "_token="+token+"&task_ids="+ids,
        cache: false,
        success: function(data){
          console.log(data.msg)
          for(i=0;i<ids.length;i++)
          {
            $('#supervisor_task_'+ids[i]).remove();
          }
          $.ajax({
            type: "GET",
            url: "<?php echo e(route('checkStaffsTask')); ?>",
            data: "_token="+token+"&staff_id="+staff_id,
            cache: false,
            success: function(data){
              console.log(data.msg)
              var tasks = data.msg
              if(tasks.length == 0){
                $("#modal-staff-task"+staff_id).modal("hide");
              }
            },
          });
        },
        error: function(error)
        {
          console.log(error)
        }
      })
    }
  </script>

  <?php /* subordinate section */ ?>
  <div class="modal fade bd-example-modal-lg" id="staff-modal-staff-task" style="height:100%; overflow-y: scroll;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Daily Task Query from supervisor</h4>
        </div>
        <div class="modal-body">
          <div id="query"></div>
        </div>
        <div class="modal-footer"></div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      var token = $('input[name=\'_token\']').val();
      $.ajax({
          type: 'GET',
          url: '<?php echo e(route("supervisor.staffgetStaffsTask")); ?>',
          data: '_token='+token,
          cache: false,
          success: function(data){
            var users = data.msg
            console.log(users)
            if(users){
              $("#query").html(users)
              $('#staff-modal-staff-task').modal('show')
            }
          },
          error: function(error){
            console.log(error);
          }
      });
    })
  </script>
  <script>
    var token = $("input[name=\"_token\"]").val();
    function staffOpenChat(id){
      $('#staff-chatMessages'+id).toggle();
      $('#staff-taskResponse'+id).toggle();
      var userImage = 'noimage.png';
      if("<?php echo auth()->guard('staffs')->user()->image; ?>" != ''){
      userImage = "<?php echo auth()->guard('staffs')->user()->image; ?>";
      }
      var chatForm = '<div class="row"><div class="col-md-2 text-center"><img src="<?php echo e(asset("/image")); ?>'+"/"+userImage+'" alt="Staff Image" class="img-circle" style="object-fit: contain; width:50px; height:50px;"><p><?php echo e(auth()->guard("staffs")->user()->name); ?></p></div><div class="col-md-8"><textarea name="message" id="chatmessage'+id+'" class="form-control"></textarea></div><div class="col-md-2"><button class="btn btn-sm btn-primary" onclick="staffchatmessageBtn('+id+')">Reply</button></div></div>'
      $("#staff-taskResponse"+id).html(chatForm);
      staffgetMessageAjax(id)
    } 
    function staffgetMessageAjax(id){
      $.ajax({
        type: "GET",
        url: "<?php echo e(route('supervisor.staffgetMessageOnDailyTask')); ?>",
        data: "_token="+token+"&task_id="+id,
        cache: false,
        success: function(data){
          var tasks = data.msg;
          var chat = '';
          var deleteBtn = '';
          var authUser = '<?php echo auth()->guard("staffs")->user()->id; ?>';
          $.each(tasks, function(index, value){
            var image = 'blank-image.png';
            if(value.user.image != ''){
              image = value.user.image;
            }
            var image = '<?php echo e(asset("/image")); ?>'+'/'+image;
            imageTag = '<img src="'+image+'" alt="Staff Image" class="img-circle" width="45px" height="45px">';
            if(authUser == value.chat_from){
              deleteBtn = '<i class="fa fa-trash" style="font-size: 20px; color: red;" onclick="staffdeletemessageBtn('+value.id+')"></i>';
              chat += '<div class="row form-group" id="mytaskchat'+value.id+'"><div class="col-md-2 text-center">'+imageTag+'<p>'+value.user.name+'</p></div><div class="col-md-8 alert-info" style="padding:10px; border-radius: 5px">'+value.message+'</div><div class="col-md-2">'+deleteBtn+'</div></div>';
            }else{
              chat += '<div class="row form-group" id="mytaskchat'+value.id+'"><div class="col-md-2"></div><div class="col-md-8 alert-info" style="padding:10px; border-radius: 5px">'+value.message+'</div><div class="col-md-2 text-center">'+imageTag+'<p>'+value.user.name+'</p></div></div>';
            }
          });
          $('#staff-chatMessages'+id).html(chat)
        },
        error: function(error){
          console.log(error)
          alert("failed!")
        }
      })
    }
    function staffdeletemessageBtn(id)
    {
      $.ajax({
        type: "POST",
        url: "<?php echo e(route('supervisor.staffdeleteMessageOnDailyTask')); ?>",
        data: "_token="+token+"&task_id="+id,
        cache: false,
        success: function(data){
          console.log(data)
          $("#mytaskchat"+id).remove();
        },
        error: function(error)
        {
          $.each(error.responseJSON, function(index, value){
              alert(value)
          })
        }
      })
    }
  </script>
  
  <?php /*  sticky note reminder   */ ?>
  <div class="modal fade" id="reminder-modal">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Save Reminder</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" id="testform" method="POST">
            <div class="row">
              <div class="col-md-12">
                <input type="hidden" name="note_id" id="note_id">
                <div class="form-group">
                  <label class="col-md-4 control-label">Description</label>
                  <div class="col-md-8">
                    <textarea name="detail" id="note_detail" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Set Date</label>
                  <div class="col-md-8">
                    <input name="date" id="reminder_date" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Set Time</label>
                  <div class="col-md-8">
                    <input name="date" id="reminder_time" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <button type="button" class="btn btn-primary" onclick="saveReminder()">SAVE</button>
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
    var token = $("input[name=\"_token\"]").val();
      $('#reminder_date').datepicker();
      $(function () {
        $('#reminder_time').timepicker({
          'showDuration': true,
          'timeFormat': 'H:i:s',
          'minTime': '07:00:00',
        });
      });
      function stickerReminder(id)
      {
        $('#reminder-modal').modal('show');
        var detail = $('#sticker_'+id).val();
        $('#note_id').val(id);
        $('#note_detail').val(detail);
      }
      function saveReminder()
      {
        $.ajax({
          type: "POST",
          url: "<?php echo e(route('supervisor.saveReminder')); ?>",
          data: {
            _token : token,
            note_id : $('#note_id').val(),
            reminder_detail : $('#note_detail').val(),
            reminder_date : $('#reminder_date').val(),
            reminder_time : $('#reminder_time').val()
          },
          cache: false,
          success: function(data){
            console.log(data.msg)
            var sticky = data.msg
            if(sticky){
              $('#reminder-modal').modal('hide');
              $('#reminderNotify'+sticky.note_id).html('<a href="javascript:void(0)" class="btn btn-xs text-center" onclick="stickerReminder('+sticky.note_id+')"><i class="fa fa-bell"></i></a>')
              alert('Reminder saved');
            }
          },
          error: function(error)
          {
            console.log(error)
          }
        })
      }
      function stickyUpdateTitle(id)
      {
        var token = $("input[name=\"_token\"]").val();
        //save to database or update title in database
        $.ajax({
          type: "POST",
          url: "<?php echo e(route('supervisor.saveStickyTitle')); ?>",
          data: {
            _token : token,
            id : id,
            title : $('#titleForm'+id).val()
          },
          cache: false,
          success: function(data){
            var sticker = data.msg
            if(sticker){
              var title = sticker.title
              $('#stickerTitle'+sticker.id).text(title)
              $('#titleformgroup'+id).html('')
            }
          },
          error: function(error)
          {
            console.log(error)
          }
        })
      }
      function stickerTitle(id, title)
      {
        $('#stickerTitle'+id).click(function(){
        $('#stickerTitle'+id).html('')
        $('#titleformgroup'+id).html('<input type="text" class="form-control" id="titleForm'+id+'" value="'+title+'" onblur="stickyUpdateTitle('+id+')" autofocus>')
        })
      }
  
  </script>
  <!-- away location  -->
  <div class="modal fade bd-example-modal-lg" id="in_away_location_model">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Away Clock In Response</h4>
        </div>
        <div class="modal-body" id="attendance-body">
          <form action="<?php echo e(url('/supervisor/attendance/clockin/away')); ?>" method="post">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="staff_id" value="<?php echo e(auth()->guard('staffs')->user()->id); ?>">
            <input type="hidden" name="attendance_id" id="in_away_attendance">
            <div class="form-group">
              <label>Please specify your reason:</label>
              <div class="form-input">
                <textarea name="in_away_location" class="form-control" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" value="Submit" class="btn btn-primary">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <div class="modal fade bd-example-modal-lg" id="out_away_location_model">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Away Clock Out Response</h4>
        </div>
        <div class="modal-body" id="attendance-body">
          <form action="<?php echo e(url('/supervisor/attendance/clockout/away')); ?>" method="post">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="staff_id" value="<?php echo e(auth()->guard('staffs')->user()->id); ?>">
            <input type="hidden" name="attendance_id" id="out_away_attendance">
            <div class="form-group">
              <label>Please specify your reason:</label>
              <div class="form-input">
                <textarea name="out_away_location"  class="form-control" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" value="Submit" class="btn btn-primary">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <script>
    $(document).ready(function(){
        var away_in_location = "<?php echo e($data['in_away_location']); ?>";
        var away_out_location = "<?php echo e($data['out_away_location']); ?>";

        var attendance = "<?php echo e($data['attendance_id']); ?>"
        if(away_in_location == true){
          // alert('away in')
          $('#in_away_attendance').val(attendance);
          $('#in_away_location_model').modal('show');
        }
        if(away_out_location == true){
          // alert('away out')
          $('#out_away_attendance').val(attendance);
          $('#out_away_location_model').modal('show');
        }
    })
  </script>

  
  
  
  <div class="modal fade bd-example-modal-lg" id="daily_task_to_staff_model" style="overflow-y:scroll;">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Assign Daily Task</h4>
        </div>
        <div class="modal-body" id="attendance-body">
          <form action="" method="post">
            <?php echo csrf_field(); ?>

            <div class="form-group">
              <label class="required">Select Staff:</label>
              <div class="form-input">
                <select class="form-control" name="task_to" id="task_to" required>
                        <option value="">Select Staff</option>
                      <?php foreach($data['subordinates'] as $staff): ?>
                      <?php if(old('task_to') == $staff->id): ?>
                      <option selected="selected" value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                      <?php else: ?>
                      <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                      <?php endif; ?>
                      <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Kra:</label>
              <div class="form-input">
                <select class="form-control" name="kra" id="kra"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Title</label>
              <div class="form-input">
                <input type="text" name="title" id="task_title" value="<?php echo e(old('title')); ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="required">Description</label>
              <div class="form-input">
                <textarea class="form-control" id="task_description" name="description" autocomplete="off"><?php echo e(old('description')); ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="required">Deadline</label>
              <div class="form-input">
                <input type="text" name="finish_date" id="task_finish_date" value="<?php echo e(old('finish_date')); ?>" class="form-control date datepicker">
              </div>
            </div>
            <div class="form-group">
              <label class="">Number of Task</label>
              <div class="form-input">
                <input type="text" name="task_number" id="task_number" value="<?php echo e(old('task_number')); ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="required">Weightage</label>
              <div class="form-input">
                <input type="text" name="weightage" id="task_weightage" value="1" placeholder="1" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="required">Project</label>
              <div class="form-input">
                <input type="text" name="project" id="task_project" value="<?php echo e(old('project')); ?>" class="form-control project">
              </div>
            </div>
            <div class="form-group">
              <label class="required">Personal</label>
              <div class="form-input">
                <select class="form-control" name="personal" id="task_personal">
                  <?php if(old('personal') == 0): ?>
                    <option selected="selected" value="0">No</option>
                    <option value="1">Yes</option>
                    <?php else: ?>
                    <option value="0">No</option>
                    <option selected="selected" value="1">Yes</option>
                  <?php endif; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="form-input">
                <button type="button" class="btn btn-info" id="task_form">SUBMIT</button>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script>
  $(document).ready(function(){
    $('.datepicker').datepicker();
    var check= '<?php echo count($data["subordinates"]); ?>'
    console.log(check)
    if(check > 0){
      $('#daily_task_to_staff_model').modal('show');
    }
    var token = $('input[name=\'_token\']').val();
    $('#task_to').on('change', function () {
      var id = $(this).val();
      if (id != '') {
        $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/supervisor/tasks/getKra")); ?>',
            data: '_token='+token+'&id='+id,
            cache: false,
            success: function(html){
             $('#kra').html(html);
            }
        });
      }
    })

    $('#task_form').click(function(){
      $.ajax({
        type: 'POST',
          url: '<?php echo e(url("supervisor/dashboard/tasks/savetask")); ?>',
          data: {
            _token : token,
            task_to : $('#task_to').val(),
            kra : $('#kra').val(),
            title : $('#task_title').val(),
            description : $('#task_description').val(),
            finish_date : $('#task_finish_date').val(),
            personal : $('#task_personal').val(),
            project : $('#task_project').val(),
            task_number : $('#task_number').val(),
            weightage : $('#task_weightage').val(),
          },
          cache: false,
          success: function(data){
            console.log(data)
            successText = '<p>Task Successfully Assigned</p>'
            Swal.fire({
              title: 'Success!',
              html: successText,
              type: 'success',
            })
            $('#task_title').val('')
            $('#task_description').val('')
            $('#task_finish_date').val('')
            $('#task_personal').val('')
            $('#task_project').val('')
            $('#task_number').val('')
          },
          error: function(error){
            console.log(error.responseJSON)
            var errorText = '';
            $.each(error.responseJSON, function(index, value){
                errorText += '<br>'+'<span style="color:red;">'+value+'</span>'
            })
            Swal.fire({
              title: 'Error!',
              html: errorText,
              type: 'error',
            })
          }
      })
    })
  })
  </script>
  
<div class="modal fade" id="modal-probation-evaluation" style="overflow-y:scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="rating-title">Probation Evaluation</h4>
      </div>
      <div class="model-body">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
          <form action="<?php echo e(url('/supervisor/probation_evaluation/'.$staff->id.'/reply')); ?>" method="post">
          <?php echo csrf_field(); ?>

          <input type="hidden" name="isMidMonth" value="<?php echo e($isMidMonth); ?>">
          <input type="hidden" name="isFinalMonth" value="<?php echo e($isFinalMonth); ?>">
          <h3 class="text-center">PROBATIONARY EMPLOYEE PERFORMANCE EVALUATION FORM</h3>
          <p class="text-right">Ref. No: - PPEF/F&F/RPPL/01</p>
          <p><b>Name: <?php echo e(ucwords($staff->name)); ?></b></p>
          <p><b>Department: <?php echo e(ucwords(\App\Department::getTitle($staff->department))); ?></b></p>
          <div class="row">
            <div class="col-md-6"><b>Designation: <?php echo e(ucwords(\App\Designation::getTitle($staff->designation))); ?></b></div>
            <div class="col-md-6 text-right"><b>Line Manager/Supervisor: <?php echo e(ucwords(\App\Adjustment_staff::getName($staff->supervisor))); ?></b></div>
          </div>
          <p><b>Probation end date: <?php echo e(\Carbon\Carbon::parse($staff->probation_end_date)->format('M d, Y')); ?></b></p>
          <p class="text-center"><i>Review interval: once after the probationary period</i></p>
          <p><b>Instructions to Evaluator:</b></p>
          <p class="text-justify">Indicate the evaluation of the employee's job performance by writing a number between 1 and 3 on the blank line to the right of each attribute, in the appropriate column Use the following scale: </p>
          <div style="display: flex;">
          <div style="flex:1"><b>1 = Unacceptable</b></div>
          <div style="flex:1"><b>2 = Needs Improvement</b></div>
          <div style="flex:1"><b>3 = Satisfactory</b></div>
          </div>
            <table class="table table-bordered">
              <tr>
                <th>Attribute</th>
                <th>Mid-Evaluation</th>
                <th>Final Evaluation</th>
              </tr>
              <tr>
                <th>DATE</th>
                <th>
                <?php if(isset($probation) && $probation->mid_completed_at): ?>
                <?php echo e(\Carbon\Carbon::parse($probation->mid_completed_at)->format('d M, Y')); ?>

                <?php endif; ?>
                <?php if(isset($probation) && $probation->completed_at): ?>
                <?php echo e(\Carbon\Carbon::parse($probation->completed_at)->format('d M, Y')); ?>

                <?php endif; ?>
                </th>
                <th>
                <?php if(isset($probation) && $probation->completed_at): ?>
                <?php echo e(\Carbon\Carbon::parse($probation->completed_at)->format('d M, Y')); ?>

                <?php endif; ?>
                </th>
              </tr>
              <tr>
                <td>
                <input type="hidden" name="attribute[0][label]" value="<p><b>QUANTITY OF WORK </b></p><br><p>The extent to which the employee accomplishes assigned work of a specified quality within a specified time period</p>">
                <p><b>QUANTITY OF WORK </b></p>
                <p>The extent to which the employee accomplishes assigned work of a specified quality within a specified time period</p>
                </td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[0][mid]"  required value="<?php echo e(isset($attribute[0]->mid) ? $attribute[0]->mid : ''); ?>" disabled></td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[0][final]" <?php if(!$isFinalMonth): ?>  disabled <?php else: ?> required <?php endif; ?> value="<?php echo e(isset($attribute[0]->final) ? $attribute[0]->final: ''); ?>" disabled></td>
              </tr>
              <tr>
                <td>
                <input type="hidden" name="attribute[1][label]" value="p><b>QUANTITY OF WORK </b></p><br><p>The extent to which the employee's work is well executed, thorough, effective, accurate</p>">
                <p><b>QUANTITY OF WORK </b></p>
                <p>The extent to which the employee's work is well executed, thorough, effective, accurate</p>
                </td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[1][mid]"  required value="<?php echo e(isset($attribute[1]->mid) ? $attribute[1]->mid : ''); ?>" disabled></td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[1][final]" <?php if(!$isFinalMonth): ?>  disabled <?php else: ?> required <?php endif; ?> value="<?php echo e(isset($attribute[1]->final) ? $attribute[1]->final: ''); ?>" disabled></td>
              </tr>
              <tr>
                <td>
                <input type="hidden" name="attribute[2][label]" value="<p><b>KNOWLEDGE OF JOB </b></p><br><p>The extent to which the employee knows and demonstrates how and why to do all phases of assigned work, given the employee's length of time in his/her current position</p>">
                <p><b>KNOWLEDGE OF JOB </b></p>
                <p>The extent to which the employee knows and demonstrates how and why to do all phases of assigned work, given the employee's length of time in his/her current position</p>
                </td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[2][mid]"  required value="<?php echo e(isset($attribute[2]->mid) ? $attribute[2]->mid : ''); ?>" disabled></td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[2][final]" <?php if(!$isFinalMonth): ?>  disabled <?php else: ?> required <?php endif; ?> value="<?php echo e(isset($attribute[2]->final) ? $attribute[2]->final: ''); ?>" disabled></td>
              </tr>
              <tr>
                <td>
                <input type="hidden" name="attribute[3][label]" value="<p><b>RELATIONS WITH SUPERVISOR</b></p><br><p>The manner in which the employee responds to supervisory directions and comments. The extent to which the employee seeks counsel from supervisor on ways to improves performance and follows same</p>">
                <p><b>RELATIONS WITH SUPERVISOR</b></p>
                <p>The manner in which the employee responds to supervisory directions and comments. The extent to which the employee seeks counsel from supervisor on ways to improves performance and follows same</p>
                </td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[3][mid]"  required value="<?php echo e(isset($attribute[3]->mid)? $attribute[3]->mid : ''); ?>" disabled></td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[3][final]" <?php if(!$isFinalMonth): ?>  disabled <?php else: ?> required <?php endif; ?> value="<?php echo e(isset($attribute[3]->final) ? $attribute[3]->final: ''); ?>" disabled></td>
              </tr>
              <tr>
                <td>
                <input type="hidden" name="attribute[4][label]" value="<p><b>COOPERATION WITH OTHERS </b></p><br><p>The extent to which the employee gets along with other individuals. Consider the employee's tact, courtesy, and effectiveness in dealing with co-workers, subordinates supervisors, and customers</p>">
                <p><b>COOPERATION WITH OTHERS </b></p>
                <p>The extent to which the employee gets along with other individuals. Consider the employee's tact, courtesy, and effectiveness in dealing with co-workers, subordinates supervisors, and customers</p>
                </td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[4][mid]"  required value="<?php echo e(isset($attribute[4]->mid) ? $attribute[4]->mid : ''); ?>" disabled></td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[4][final]" <?php if(!$isFinalMonth): ?>  disabled <?php else: ?> required <?php endif; ?> value="<?php echo e(isset($attribute[4]->final) ? $attribute[4]->final: ''); ?>" disabled></td>
              </tr>
              <tr>
                <td>
                <input type="hidden" name="attribute[5][label]" value="<p><b>ATTENDANCE AND RELIABILITY </b></p><br><p>The extent to which employee arrives on time and demonstrates consistent attendance; the extent to which the employee contacts supervisor on a timely basis when employee will be late or absent</p>">
                <p><b>ATTENDANCE AND RELIABILITY </b></p>
                <p>The extent to which employee arrives on time and demonstrates consistent attendance; the extent to which the employee contacts supervisor on a timely basis when employee will be late or absent</p>
                </td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[5][mid]"  required value="<?php echo e(isset($attribute[5]->mid) ? $attribute[5]->mid : ''); ?>" disabled></td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[5][final]" <?php if(!$isFinalMonth): ?>  disabled <?php else: ?> required <?php endif; ?> value="<?php echo e(isset($attribute[5]->final) ? $attribute[5]->final: ''); ?>" disabled></td>
              </tr>
              <tr>
                <td>
                <input type="hidden" name="attribute[6][label]" value="<p><b>INITIATIVE AND CREATIVITY </b></p><br><p>The extent to which the employee is self- directed, resourceful and creative in meeting job objectives; consider how well the employee follows through on assignments and modifies or develops new ideas, methods, or procedures to effectively meet changing circumstances</p>">
                <p><b>INITIATIVE AND CREATIVITY </b></p>
                <p>The extent to which the employee is self- directed, resourceful and creative in meeting job objectives; consider how well the employee follows through on assignments and modifies or develops new ideas, methods, or procedures to effectively meet changing circumstances</p>
                </td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[6][mid]"  required value="<?php echo e(isset($attribute[6]->mid) ? $attribute[6]->mid : ''); ?>" disabled></td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[6][final]" <?php if(!$isFinalMonth): ?>  disabled <?php else: ?> required <?php endif; ?> value="<?php echo e(isset($attribute[6]->final) ? $attribute[6]->final: ''); ?>" disabled></td>
              </tr>
              <tr>
                <td>
                <input type="hidden" name="attribute[7][label]" value="<p><b>CAPACITY TO DEVELOP </b></p><br><p>The extent to which the employee demonstrates the ability and willingness to accept new/more complex duties/responsibilities</p>">
                <p><b>CAPACITY TO DEVELOP </b></p>
                <p>The extent to which the employee demonstrates the ability and willingness to accept new/more complex duties/responsibilities</p>
                </td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[7][mid]" required value="<?php echo e(isset($attribute[7]->mid) ? $attribute[7]->mid : ''); ?>" disabled></td>
                <td><input type="number" max="3" min="1" class="form-control" name="attribute[7][final]" <?php if(!$isFinalMonth): ?>  disabled <?php else: ?> required <?php endif; ?> value="<?php echo e(isset($attribute[7]->final) ? $attribute[7]->final: ''); ?>" disabled></td>
              </tr>
            </table>
              <?php if($isMidMonth): ?>
              <div id="supervisor_mid">
                <p><b>Evaluator Mid Comments: </b></p>
                <textarea name="supervisor_mid_comment" class="form-control" rows="5" disabled><?php echo e(isset($probation) ? $probation->supervisor_mid_comment: ''); ?></textarea>
              </div>
              <div id="staff_mid">
                <p><b>Staff Mid Comments: </b></p>
                <textarea name="staff_mid_comment" class="form-control" rows="5" required><?php echo e(isset($probation) ? $probation->staff_mid_comment: ''); ?></textarea>
              </div>
              <?php endif; ?>
              <?php if($isFinalMonth): ?>
              <div id="supervisor_final">
                <p><b>Evaluator Final Comments: </b></p>
                <textarea name="supervisor_final_comment" class="form-control" rows="5" disabled><?php echo e(isset($probation) ? $probation->supervisor_final_comment : ''); ?></textarea>
              </div>
              <div id="staff_mid">
                <p><b>Staff Final Comments: </b></p>
                <textarea name="staff_final_comment" class="form-control" rows="5" required><?php echo e(isset($probation) ? $probation->staff_final_comment : ''); ?></textarea>
              </div>
              <?php endif; ?>
              <br>
              <?php if($isFinalMonth): ?>
              <div id="conclusion">
                <p><b>TO BE COMPLETED ONLY AT LAST EVALUATION BEFORE END OF PROBATIONARY PERIOD: </b></p>
                <input type="checkbox" id="checklist1" name="conclusion[]" value="1" disabled <?php if(in_array(1, $conclusion)): ?> checked <?php endif; ?> disbaled>
                <label for="checklist1"> I recommend this probationary employee become permanent and continuous without salary increment </label><br>
                <input type="checkbox" id="checklist2" name="conclusion[]" value="2" disabled <?php if(in_array(2, $conclusion)): ?> checked <?php endif; ?> disbaled>
                <label for="checklist2"> I recommend this probationary employee become permanent and continuous with salary increment </label><br>
                <input type="checkbox" id="checklist3" name="conclusion[]" value="3" disabled <?php if(in_array(3, $conclusion)): ?> checked <?php endif; ?> disbaled>
                <label for="checklist3"> I recommend this probationary employee be dismissed after the end of the probationary period and will submit the appropriate forms. </label><br>
                <input type="checkbox" id="checklist3" name="conclusion[]" value="4" disabled <?php if(in_array(4, $conclusion)): ?> checked <?php endif; ?> disbaled>
                <label for="checklist3"> Employee resigned before completion of probationary period. (It is important that HR receive this form even if employee has resigned.)</label><br>
              </div>
              <?php endif; ?>
              <div class="form-group">
                <button type="submit" id="staffprobation" class="btn btn-info">SUBMIT</button>
              </div>
              </form>
          </div>
        </div>
      </div>
      <div class="model-footer"></div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
  var status = '<?php echo e($status); ?>';
  console.log(status)
  if(status != 'NONE'){
      $('#modal-probation-evaluation').modal('show');
  }
})
</script>

<?php /* welcoming new staff */ ?>
<?php ($yesterday = \Carbon\Carbon::yesterday()->format('Y-m-d')); ?>
<?php ($new_staffs = \App\Adjustment_staff::where('status', 1)->where('on_board', 0)->select('id','name', 'image', 'designation', 'department', 'supervisor', 'email', 'phone', 'joindate', 'probation_end_date', 'education_level', 'faculty', 'education_year', 'employmentType', 'shiftTime','work_institute', 'work_designation', 'work_period')->get()); ?>
<?php if(count($new_staffs) > 0): ?>
<?php foreach($new_staffs as $nstaff): ?>
<?php ($newsfeed = $newsfeed = \App\NewsFeed::checkToStaff($nstaff->id)); ?>
<?php if(isset($newsfeed->id)): ?>
<div class="modal fade" id="welcome_onBoard_staff_model_<?php echo e($nstaff->id); ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Greetings to new staff</h4>
        </div>
        <div class="modal-body" id="welcome-staff-body">
          <form action="<?php echo e(url('/supervisor/newstaff/welcome/comment')); ?>" method="post">
            <?php echo csrf_field(); ?>

            <div class="text-center">
              <?php if($nstaff->image): ?>
              <img src="<?php echo e(asset('image/'.$nstaff->image)); ?>" class="img-circle" style="width:100px; height:100px; object-fit:contain;">
              <?php else: ?>
              <img src="<?php echo e(asset('image/blank-image.png')); ?>" class="img-circle" style="width:100px; height:100px; object-fit:contain;">
              <?php endif; ?>
              <h4><strong><?php echo e($nstaff->name); ?></strong></h4>
              <p>
                <strong><?php echo e($nstaff->email); ?></strong>
              </p>
              <p>
                <strong><?php echo e($nstaff->phone); ?></strong>
              </p>
              <p>
                <span><b>Type: <?php echo e($nstaff->employmentType == 1 ? 'Full Time' : 'Part Time'); ?></b></span> &nbsp;
                <span><b>Shift: <?php echo e(\App\Shifttime::gettitle($nstaff->shiftTime)); ?></b></span> &nbsp;
              </p>
              <p>
                <strong>Join Date:<?php echo e(\Carbon\Carbon::parse($nstaff->joindate)->format('d M, Y')); ?></strong>
              </p>
              <p>
                <strong>Probation End Date:<?php echo e(\Carbon\Carbon::parse($nstaff->probation_end_date)->format('d M, Y')); ?></strong>
              </p>
              <table class="table table-bordered">
                  <tr>
                    <td><b>Department:</b> <?php echo e(\App\Department::getTitle($nstaff->department)); ?></td>
                    <td><b>Designation:</b> <?php echo e(\App\Designation::getTitle($nstaff->designation)); ?></td>
                    <td><b>Supervisor:</b> <?php echo e(\App\Adjustment_staff::getName($nstaff->supervisor)); ?></td>
                  </tr>
                  <?php if($nstaff->education_level): ?>
                  <tr>
                    <td><b>Education:</b><?php echo e(\App\EducationLevel::getTitle($nstaff->education_level)); ?></td>
                    <td><b>Faculty:</b><?php echo e(\App\Faculty::getTitle($nstaff->faculty)); ?></td>
                    <td><b>Complete Status:</b><?php echo e($nstaff->education_year != NULL ? $nstaff->education_year : 'running'); ?></td>
                  </tr>
                  <?php endif; ?>
                  <?php if($nstaff->work_institute): ?>
                  <tr>
                    <td><b>Worked In:</b><?php echo e($nstaff->work_institute); ?></td>
                    <td><b>Position:</b><?php echo e($nstaff->work_designation); ?></td>
                    <td><b>Period:</b><?php echo e($nstaff->work_period); ?></td>
                  </tr>
                  <?php endif; ?>
              </table>
            </div>
            <input type="hidden" name="newsfeed" id="newstaff_newsfeed<?php echo e($nstaff->id); ?>" value="<?php echo e($newsfeed->id); ?>">
            <div class="form-group">
              <label>Take a Minute to Say Hello:</label>
              <div class="form-input">
                <textarea name="description" id="newstaff_description<?php echo e($nstaff->id); ?>" class="form-control" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <input type="button" value="Submit" class="btn btn-primary" onclick="submitGreeting(<?php echo e($nstaff->id); ?>)">
              <a href="javascript:void(0)" class="btn btn-warning right" onclick="cancelGreeting(<?php echo e($newsfeed->id); ?>)">Cancel</a>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
  $(document).ready(function(){
    var value = localStorage.getItem('cancelgreeting');
    if(value==null)
    {
      $('#welcome_onBoard_staff_model_<?php echo e($nstaff->id); ?>').modal('show');
    }
  });
  function cancelGreeting(id)
  {
    $('#welcome_onBoard_staff_model_<?php echo e($nstaff->id); ?>').modal('hide');
    localStorage.setItem('cancelgreeting', 'cancel');
    var url = "<?php echo e(url('supervisor/newsfeed')); ?>"+'/'+id;
    window.open(url, '_blank');
  }
</script>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
<script>
  function submitGreeting(id)
  {
    var description = $('#newstaff_description'+id).val();
    if(description != '')
    {
    var newsfeed = $('#newstaff_newsfeed'+id).val();
    var token = $('input[name=\'_token\']').val();
    $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/supervisor/newstaff/welcome/comment")); ?>',
            data: {
              _token: token,
              description: description,
              newsfeed: newsfeed
            },
            cache: false,
            success: function(data){
             console.log(data)
             $('#welcome_onBoard_staff_model_'+id).modal('hide');
             alert('Thank You');
            },
            error: function(error){
              alert(error)
            }
        });
    }else{
      alert('Input some words, please!');
    }
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>