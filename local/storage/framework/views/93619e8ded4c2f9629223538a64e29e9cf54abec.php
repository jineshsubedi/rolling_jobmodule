<?php $__env->startSection('heading'); ?>
Holidays 
            <small>List of Holidays </small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Holidays </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
  .fc-day-header{
    color: #000000;
  }
  .close-button{
    cursor: pointer;
  }
</style>
<link rel="stylesheet" href="<?php echo e(asset('/assets/plugins/fullcalendar/dist/fullcalendar.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('/assets/plugins/fullcalendar/dist/fullcalendar.print.min.css')); ?>" media="print">
 <div class="row">
    
             
               <div class="col-md-3">
          <div class="box box-solid btm10m">
            <div class="box-header with-border">
              <h4 class="box-title">Draggable Events</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
                <div class="external-event bg-green">Holiday</div>
                <div class="external-event bg-yellow">Meeting</div>
                <div class="external-event bg-red">Other Works</div>
                <div class="external-event bg-light-blue">Time Booking</div>
                <div class="external-event bg-aqua">Events</div>
                <div class="external-event bg-purple">Training</div>
               
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->

          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Filter by Staff</h4>
            </div>
            <div class="box-body">
             <input type="text" class="form-control" id="staff" value="<?php echo e($datas['staff']); ?>">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
          </div><!-- /.box-body -->
      </div>
    </div>

     <div class="modal fade " id="modal-addevent">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Work Detail</h4>
              </div>
               <form id="job-edit-form" method="POST" action="<?php echo e(url('/branchadmin/daily-routine/save')); ?>" class="form-horizontal" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

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
                        </div>
                         <div class="form-group">
                          <label class="col-md-4 control-label">KRA</label>
                           <div class="col-md-8">
                            
                          <select class="form-control" name="kra" required="required">
                            <?php foreach($datas['kra'] as $kra): ?>
                            <option value="<?php echo e($kra->id); ?>"><?php echo e($kra->title); ?></option>
                            <?php endforeach; ?>
                            <option value="0">Others</option>
                          </select>
                              
                            
                               
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-4 control-label">Work Title</label>
                           <div class="col-md-8">
                            
                          <textarea class="form-control" name="description" required="required"></textarea>
                              
                            
                               
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
  
<script src="<?php echo e(asset('/assets/plugins/moment/moment.js')); ?>"></script>
  <script src="<?php echo e(asset('/assets/plugins/fullcalendar/dist/fullcalendar.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('/js/datepair.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/js/jquery.datepair.js')); ?>"></script>
 <script type="text/javascript">
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
        
       <?php if(count($datas['time_booking']) > 0): ?>
        <?php foreach($datas['time_booking'] as $time_booking): ?>
        {
          title          : '<?php echo e(htmlentities($time_booking["title"], ENT_QUOTES | ENT_IGNORE, "UTF-8")); ?>',
          start          : new Date('<?php echo e($time_booking["start_year"]); ?>', '<?php echo e($time_booking["start_month"]); ?>', '<?php echo e($time_booking["start_day"]); ?>','<?php echo e($time_booking["start_hour"]); ?>','<?php echo e($time_booking["start_minute"]); ?>'),
          end            : new Date('<?php echo e($time_booking["finish_year"]); ?>', '<?php echo e($time_booking["finish_month"]); ?>', '<?php echo e($time_booking["finish_day"]); ?>','<?php echo e($time_booking["finish_hour"]); ?>','<?php echo e($time_booking["finish_minute"]); ?>'),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        }, 
        <?php endforeach; ?>
        <?php endif; ?>
        <?php if(count($datas['daily_routine']) > 0): ?>
        <?php foreach($datas['daily_routine'] as $daily_routine): ?>
        {
          title          : '<?php echo e($daily_routine["title"]); ?>',
          start          : new Date('<?php echo e($daily_routine["year"]); ?>', '<?php echo e($daily_routine["month"]); ?>', '<?php echo e($daily_routine["day"]); ?>','<?php echo e($daily_routine["start_hour"]); ?>','<?php echo e($daily_routine["start_minute"]); ?>'),
          end            : new Date('<?php echo e($daily_routine["year"]); ?>', '<?php echo e($daily_routine["month"]); ?>', '<?php echo e($daily_routine["day"]); ?>','<?php echo e($daily_routine["finish_hour"]); ?>','<?php echo e($daily_routine["finish_minute"]); ?>'),
          allDay         : false,
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954' //red
        },
        <?php endforeach; ?>
        <?php endif; ?>
        <?php if(count($datas['meeting']) > 0): ?>
        <?php foreach($datas['meeting'] as $meeting): ?>
         {
          title          : '<?php echo e(addslashes(htmlspecialchars($meeting["title"]))); ?>',
          start          : new Date('<?php echo e($meeting["year"]); ?>', '<?php echo e($meeting["month"] - 1); ?>', '<?php echo e($meeting["day"]); ?>','<?php echo e($meeting["start_hour"]); ?>','<?php echo e($meeting["start_minute"]); ?>'),
          end            : new Date('<?php echo e($meeting["year"]); ?>', '<?php echo e($meeting["month"] - 1); ?>', '<?php echo e($meeting["day"]); ?>','<?php echo e($meeting["finish_hour"]); ?>','<?php echo e($meeting["finish_minute"]); ?>'),
          allDay         : false,
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        <?php endforeach; ?>
        <?php endif; ?>
        <?php foreach($datas['holiday'] as $holiday): ?>
        {
          title          : '<?php echo e(addslashes(htmlspecialchars($holiday->title))); ?>',
          start          : '<?php echo e($holiday->holiday); ?>',
          end            : '<?php echo e($holiday->holiday); ?>',
          allDay         : true,
          backgroundColor: '#00a65a', //Info (aqua)
          borderColor    : '#00a65a' //Info (aqua)
        },
        <?php endforeach; ?>
        <?php foreach($datas['training'] as $training): ?>
        {
          title          : '<?php echo e(addslashes(htmlspecialchars($training->title))); ?>',
          start          : '<?php echo e($training->start_date); ?>',
          end            : '<?php echo e($training->end_date); ?>',
          allDay         : true,
          backgroundColor: '#748EC4', //Info (Carmine Pink)
          borderColor    : '#748EC4' //Info (Carmine Pink)
        },
        <?php endforeach; ?>
        <?php if(count($datas['birthday']) > 0): ?>
        <?php foreach($datas['birthday'] as $birthday): ?>
        {
          title          : '<?php echo e(addslashes(htmlspecialchars($birthday["title"]))); ?>',
          start          : '<?php echo e($birthday["date"]); ?>',
          end            : '<?php echo e($birthday["date"]); ?>',
          allDay         : true,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        <?php endforeach; ?>
        <?php endif; ?>
        /*{
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#00c0ef ', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        } */
      ],
      
    })

     
   
  })
</script>

<script type="text/javascript">
  function addEvent(e) {
   var edate = e.attr('data-date');
   var etime = e.attr('data-time');
   $('#from_date').val(edate);
   $('#from_time').val(etime);
   $('#modal-addevent').modal('show');
  }
</script>

<script type="text/javascript">
  function addDayData(argument) {
   
     $('#from_date').val(argument.attr('data-date'));
  
   $('#modal-addevent').modal('show');
  }
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
  function deleteData(e) {
    if(confirm('Do You Want To Delete This Work Plan?')){
      var title = e.attr('data-title');
      var start_date = e.attr('data-start');
      var token = $('input[name=\'_token\']').val();
     $.ajax({
         type: 'POST',
            url: '<?php echo e(url("/branchadmin/daily-routine/delete/")); ?>',
            data: '_token='+token+'&title='+ encodeURIComponent(title) +'&start_date='+start_date,
            cache: false,
            success: function(html){
              if (html == 'Success') {
                e.parent().remove();
              } else{
                alert(html);
               }
              }
      });
    
      
      }
    
  }
</script>

<script type="text/javascript">
  $('#staff').autocomplete({

    source: '<?php echo e(url("/branchadmin/calendar/staffAutocomplete")); ?>',
          minlength:1,
          autoFocus:true,
          select:function(e,ui){
            $('#filter_staff').val(ui.item.id);
            var url= "<?php echo e(url('/branchadmin/calendar/?')); ?>";
            
              url += '&filter_staff='+ui.item.id
             location = url;
          }

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>