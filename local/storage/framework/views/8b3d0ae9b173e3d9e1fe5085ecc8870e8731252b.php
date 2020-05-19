<?php $__env->startSection('heading'); ?>
Skill Test
<small>Skill Test</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">NewsFeed</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
  .test_question {
    padding: 10px;
  }

  .bluebg {
      background-color: #0096c4 !important;
      color: #fff !important;
  }
  .test_answer ul li{
        cursor: pointer;
        padding: 10px;
      margin-top: 5px;
      color: #6f6d6d;
      background-image: linear-gradient(#f2f2f2, #f5f5f5);
      list-style: none;
      }
      .test_answer ul {
        margin-left: -40px;
      }
      .bggreen{
        background: Green !important;
        color: #ffffff !important;
      }
      .bluebg {
        background-color: #0096c4 !important;
        color: #fff !important;
    }
</style>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title form_heading">
             Total Marks: <?php echo e($datas['question_answer']->marks); ?>

            </h3>
          </div>
          <div class="box-body">
            <div class="row cm10-row tp30p">
              <div class="col-md-12">
                <div id="test-box">
                  <?php ($questions = json_decode($datas['question_answer']->questions)); ?>
                  <?php foreach($questions as $question): ?>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="test_question bluebg">
                        Q. <?php echo e($question->title); ?>

                        <?php if($question->image != ''): ?>
                        <img src="<?php echo e(asset('/image/'.$question->image)); ?>" style="width: 100%;">
                        <?php endif; ?>
                      </div>
                      <div class="test_answer">
                        <ul>
                          <?php foreach($question->answers as $key => $answer): ?>
                          <?php if($answer->correct == 2): ?>
                          <li class="bgblue"><?php echo e($answer->title); ?></li>
                          <?php endif; ?>
                          <?php if($answer->title == $question->answer_title): ?>
                          <li class="bggreen"><?php echo e($question->answer_title); ?></li>
                          <?php endif; ?>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>