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
	
	.lightgreen_gradient {
	    background-image: linear-gradient(90deg, #008dcf, #70bf55);
	    padding: 3px 16px;
	    border-radius: 30px;
	    color: #fff !important;
	    font-size: 11px;
	    border: 2px solid #70bf55;
	}
	.get-question{
	    position: relative;
	    display: inline-block;
	    min-height: 300px;
	    text-align: center;
	    vertical-align: middle;
	    width: 100%;
	    background: #ececec;
  	}
  	.mt45{
	    margin-top: 130px; 
	  }
</style>
<style type="text/css">
  #progressBar {
      width: 100%;
      margin: 10px auto;
      height: 22px;
      background-color: #0A5F44;
    }

    #progressBar div {
      height: 100%;
      text-align: right;
      padding: 0 10px;
      line-height: 22px; /* same as #progressBar height if we want text middle aligned */
      width: 0;
      background-color: #CBEA00;
      box-sizing: border-box;
    }

    .mask{
        display:none;
      position: absolute;
      top: 0px;
      left: 0px;
      right: 0px;
      bottom: 0px;
      z-index: 9;
      background: rgba(0,0,0,0.2);
      
    }
    .loading{
        
      margin: 50px auto;
      width: 50%;
      font-size: 18px;
      background: blue;
      color: #FFF;
      padding: 10px;
      text-align: center;
      z-index:99;
    }
    .loading .fa-spinner{
      font-size: 45px;
    }

    .right{
      float: right !important;
    }
    .test_answer{
      position: relative;
      
    }
    .bgblue{
      background: #23a2fa !important;
      color: #ffffff !important;
    }
    .bgred{
      background: #fa2323 !important;
      color: #ffffff !important;
    }
    .coment-message{
        display:none;
    }
    #buttons, #comments{
      display: none;
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
	.mask {
	    display: none;
	    position: absolute;
	    top: 0px;
	    left: 0px;
	    right: 0px;
	    bottom: 0px;
	    z-index: 9;
	    background: rgba(0,0,0,0.2);
	}
</style>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
        	<div class="box-header with-border">
	        	<h3 class="box-title form_heading">
	        		<?php if($exam->image): ?>
	        			<?php ($image = $exam->image); ?>
	        		<?php else: ?>
	        			<?php ($image = 'noimage.png'); ?>
	        		<?php endif; ?>
	        		<img src="<?php echo e(asset('image/'.$image)); ?>" class="img-circle" style="object-fit: contain; width: 40px; height: 40px;">
	        		<?php echo e(ucwords($exam->title)); ?>

	        		<!-- <?php (session()->put('number_of_question', $exam->number_of_question)); ?>
	        		<?php (session()->put('test_id', $exam->id)); ?> -->
	        	</h3>
	        </div>
	        <div class="box-body">
	        	<div class="row cm10-row tp30p">
	        		<div class="col-md-12">
	        			<div id="test-box">
					    	<div class="get-question">
					    		<a class="btn lightgreen_gradient mt45 text-center" onclick="getQuestion()" data-whatever="@mdo">Start Test</a>
					    	</div>
					    </div>
	        		</div>
	        	</div>
			</div>
        </div>
    </div>
</div>
<script type="text/javascript">
  	var token = $('input[name=\'_token\']').val();
	function getQuestion() {
	  $.ajax({
	        type: "POST",
	        url: "<?php echo e(url('staffs/skill-test/test/get-question')); ?>",
	        data: '_token='+token,
	        success: function(data){
	          var datas = data.split('|||||');
	          $('#test-box').html(datas[0]);
	          $('#right_answers').html(datas[1])
	        },
	        error: function(error){
	        	console.log(error)
	        }
	    });
	}
	$('#right_wrong').on('change', function()
	{
	  var id = $(this).val();
	  if(id == 2){
	    $('#right_answer').fadeIn();
	  } else{
	    $('#right_answer').fadeOut();
	  }
	})

	$('#right_answers').on('change', function()
	{
	  var id = $(this).val();
	  if(id == '1none'){
	    $('#correct_answers').fadeIn();
	  } else{
	    $('#correct_answers').fadeOut();
	  }
	})
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>