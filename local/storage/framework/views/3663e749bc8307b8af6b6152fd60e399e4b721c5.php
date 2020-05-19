<div class="test_question greybg tp20m">
  <strong><?php echo e($datas['question_status']); ?></strong>
</div>
<input type="hidden" id="time-second" value="1">
<div id="progressBar">
  <div class="bar"></div>
</div>
<div class="test_question bluebg box-title">
<?php ($question_id = $datas['question']->id); ?>
  Q. <?php echo e($datas['question']->question); ?>

  <?php if(isset($datas['question_image'])): ?>
    <img src="<?php echo e($datas['question_image']); ?>" style="object-fit: contain; width: 100px; height: 100px;">
  <?php endif; ?>
</div>
<div class="test_answer">
  <div class="mask"><div class="loading">Loading...   Please Wait  </br> <i class="fa fa-spinner fa-spin"></i></div></div>
  <ul>
    <?php ($i = 1); ?>
    <?php foreach($datas['answer'] as $key => $answer): ?>
    <?php if($answer->correct == 1): ?>
    <?php ($answer_id = 'answer_'.$i); ?>
    <?php else: ?>
    <?php ($answer_id = 'answer_15'); ?>
    <?php endif; ?>
    <li id="<?php echo e($answer_id); ?>" onclick="answerClick('<?php echo e($i); ?>','<?php echo e($answer->correct); ?>','<?php echo e($question_id); ?>','<?php echo e(addslashes(htmlspecialchars($answer->title))); ?>',$(this))"><?php echo e($answer->title); ?></li>
    <?php ($i++); ?>
    <?php endforeach; ?>
  </ul>
</div>
<div id="buttons" class="tb20p">
  <?php if($datas['number_of_question'] == $datas['question_count']): ?>
  <a href="javascript:void(0)" class="btn lightgreen_gradient right" onclick="finishTest()">Next</a>
  <?php else: ?>
  <a href="javascript:void(0)" class="btn lightgreen_gradient right" onclick="getQuestion()">Next Question</a>
  <?php endif; ?>
</div>

<?php ($answer_url = url('/staffs/skill-test/submit-answer')); ?>
<!-- <?php ($finish_url = url('/staffs/skill-test/finish-test')); ?> -->
<script type="text/javascript">
   var duration = '';
   var prun = 1;
   var totaltime = '<?php echo e($datas["question"]->time_second); ?>';
    function progress(timeleft, timetotal, $element) {
        var progressBarWidth = timeleft * $element.width() / timetotal;
        $element.find('div').animate({ width: progressBarWidth }, 500).html(Math.floor(timeleft/60) + ":"+ timeleft%60);
        if(timeleft > 0) {
            setTimeout(function() {
              duration = timeleft - 1;
                if(prun == 1){
                progress(timeleft - 1, timetotal, $element);
                $('#time-second').val(timeleft - 1);
                }
            }, 1000);
        } else{
         
             $('.loading').html('<i class="fa fa-clock"></i> Time Up </br> Please Wait for next question.  </br> <i class="fa fa-spinner fa-spin"></i>')
            answerClick('','','<?php echo e($question_id); ?>','');
        }
    };

    progress(totaltime, totaltime, $('#progressBar'));
    
    function answerClick(answer,right,question_id,title,eee = ''){
        $('.mask').fadeIn();
         var token = $('input[name=\'_token\']').val();
         if(eee != ''){
         if(right == 2){
          eee.addClass('bggreen');
         } else{
          eee.addClass('bgred');
          $('#answer_15').addClass('bggreen');
          
         }
       }
          
        var duration = $('#time-second').val();
        prun = 11;
        $.ajax({
            type: "POST",
            url: "<?php echo e($answer_url); ?>",
            data: '_token='+token+'&question_id='+question_id+'&answer='+answer+'&wright='+right+'&title='+title+'&duration='+duration,
            success: function(data){
              if(data == 'Success'){
                $('#comments').fadeIn();
                $('.loading').fadeOut();
                $('#buttons').fadeIn();
              } else{
                console.log(data)
              }
            },
            error: function(error){
              console.log(error)
            }
        });
    }
    
    function finishTest()
    {
        var url = '<?php echo e(route("staffs.exam.finishtest")); ?>';
        location = url;
    }
    
  </script>