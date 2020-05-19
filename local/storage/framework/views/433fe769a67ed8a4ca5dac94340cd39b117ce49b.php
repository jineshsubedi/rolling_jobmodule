<?php $__env->startSection('heading'); ?>
Training and Development
<small>Training and Development</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Training and Development</li>
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
          <div class="box-body">
            <div class="box-header with-border">
              <ul class="nav nav-tabs">
                <li>
                  <a  href="<?php echo e(route('staffs.mytraining.index')); ?>">Overview</a>
                </li>
                <li class="active">
                  <a href="<?php echo e(route('staffs.mytraining.schedule')); ?>">Calendar/Schedule</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.mytraining.notice')); ?>">Training Notice</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.mytraining.material')); ?>">Training Material</a>
                </li>
              </ul>
            </div>
            <?php /* filter  */ ?>
            <?php /* <div class="row">
              <div class="col-md-3 form-group">
                <select name="filter_year" id="filter_year" class="form-control select2">
                  <option value="">Select Year</option>
                  <?php ($date = Date('Y')); ?>
                  <?php for($i=0;$i<10;$i++): ?>
                  <?php ($value = $date - $i); ?>
                  <option value="<?php echo e($value); ?>" <?php if($data['filter_year'] == $value): ?> selected <?php endif; ?>><?php echo e($value); ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              <div class="col-md-3 form-group">
                <select name="filter_month" id="filter_month" class="form-control select2">
                  <?php foreach($data['month'] as $k=>$month): ?>
                  <option value="<?php echo e($month['id']); ?>" <?php if($data['filter_month'] == $month['id']): ?> selected <?php endif; ?>><?php echo e($month['title']); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-3 form-group">
                <select name="filter_program" id="filter_program" class="form-control select2">
                  <option value="">All</option>
                  <?php foreach($programs as $program): ?>
                  <option value="<?php echo e($program->id); ?>" <?php if($data['filter_program'] == $program->id): ?> selected <?php endif; ?>><?php echo e($program->title); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div> */ ?>

            <div class="tab-content">
              <div id="calendar">
                <style type="text/css">
                  .fc-day-header{color: #000000;}
                </style>
                <link rel="stylesheet" href="<?php echo e(asset('/assets/plugins/fullcalendar/dist/fullcalendar.min.css')); ?>">
                <link rel="stylesheet" href="<?php echo e(asset('/assets/plugins/fullcalendar/dist/fullcalendar.print.min.css')); ?>" media="print">
                <div class="row">
                  <div class="col-md-6">
                    <div class="box box-primary">
                      <div class="box-body no-padding">
                        <div id="training_calendar"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="itinerySectionOfTraining" style="border: 1px solid grey; border-radius: 5px;padding: 10px; margin-top: 70px;">
                      <h4>Below is the planned schedule of the Training program.</h4>
                      <br>
                      <p><label class="control-label">Program/Course Name: </label> <span id="training_title"></span></p>
                      <p><label class="control-label">Venue: </label> <span id="training_venue"></span></p>
                      <p id="training_date"><label class="control-label">Date</label></p>
                      <table class="table table-bordered table-striped" id="training_itinery_table">
                        <tr>
                          <th>Date</th>
                          <th>Topic</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Duration</th>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
<div>
<script>
  $('.datepicker').datepicker();
  $('.select2').select2();
</script>
<?php /* filter */ ?>
<script>
  $('#filter_year').change(function(){
    var year = $(this).val();
    var month = $('#filter_month').val();
    var program = $('#filter_program').val();
    var url = '<?php echo e(url("/staffs/mytraining/schedule?")); ?>';
    if(year != '')
    {
      url += '&filter_year='+year
    }
    if(month != '')
    {
      url += '&filter_month='+month
    }
    if(program != '')
    {
      url += '&filter_program='+program
    }
    location = url;
  })
</script>
<script>
  $('#filter_month').change(function(){
    var month = $(this).val();
    var year = $('#filter_year').val();
    var program = $('#filter_program').val();
    var url = '<?php echo e(url("/staffs/mytraining/schedule?")); ?>';
    if(year != '')
    {
      url += '&filter_year='+year
    }
    if(month != '')
    {
      url += '&filter_month='+month
    }
    if(program != '')
    {
      url += '&filter_program='+program
    }
    location = url;
  })
</script>
<script>
  $('#filter_program').change(function(){
    var program = $(this).val();
    var year = $('#filter_year').val();
    var month = $('#filter_month').val();
    var url = '<?php echo e(url("/staffs/mytraining/schedule?")); ?>';
    if(year != '')
    {
      url += '&filter_year='+year
    }
    if(month != '')
    {
      url += '&filter_month='+month
    }
    if(program != '')
    {
      url += '&filter_program='+program
    }
    location = url;
  })
</script>

<?php /* calendar */ ?>
<script src="<?php echo e(asset('/assets/plugins/moment/moment.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/plugins/fullcalendar/dist/fullcalendar.min.js')); ?>"></script>
<script type="text/javascript">
  $(document).ready(function(){

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
    $('#training_calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      eventClick: function(info){
        console.log(info)
        loadEventView(info.id)
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
        <?php if(count($data['training_calendar']) > 0): ?>
        <?php foreach($data['training_calendar'] as $training): ?>
        {
          id             : '<?php echo e($training->id); ?>',
          title          : '<?php echo e(addslashes(htmlspecialchars(\App\TrainingProgram::getTitle($training->program_id)))); ?>',
          start          : '<?php echo e(\Carbon\Carbon::parse($training->from)); ?>',
          end            : '<?php echo e(\Carbon\Carbon::Parse($training->to)->addDays(1)); ?>',
          allDay         : true,
          fullDay         : false,
          backgroundColor: '#00a65a', //Info (aqua)
          borderColor    : '#00a65a' //Info (aqua)
        },
        <?php endforeach; ?>
        <?php endif; ?>
      ],
    })
    var token = $('input[name=\'_token\']').val();
    function loadEventView(id)
    {
      $.ajax({
          type: 'GET',
          url: '<?php echo e(route("staffs.td.schedule.getTrainingWithItinery")); ?>',
          data: '_token='+token+'&id='+id,
          cache: false,
            success: function(data){
              console.log(data)
              var itineryHtml = '<tr><th>Date</th><th>Topic</th><th>Start Time</th><th>End Time</th><th>Duration</th></tr>';
              
              var training = data.training;
              var training_itinery = data.training_itinery;
              $('#training_title').text(training.program_title)
              $('#training_venue').text(training.venue)
              var dateHtml = '<p><label>Start Date:</label> '+moment(training.from).format('MMM Do YYYY')+'</p><p> <label>End Date:</label> '+moment(training.to).format('MMM Do YYYY')+'</p>';
              $.each(data.training_itinery, function(index, value){
                itineryHtml += '<tr><td>'+moment(value.date).format('MMM Do YYYY')+'</td><td>'+value.topic+'</td><td>'+value.start_time+'</td><td>'+value.end_time+'</td><td>'+value.duration+'</td></tr>';
              })
              $('#training_itinery_table').html(itineryHtml)
              $('#training_date').html(dateHtml);
            },
            error: function(error){
              alert('failed')
            }
      });
    }
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>