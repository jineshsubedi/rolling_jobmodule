<?php $__env->startSection('heading'); ?>
Test Exam Detail

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Exam</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    .test_category:hover{
        background:#0191c1;
        color:#FFFFFF !important;
    }
    
    .test_category a:hover{
        
        color:#FFFFFF !important;
    }
    .test_category a{
        padding:6px;
        font-size:12px;
        font-weight:700;
        width:100%;display:inline-block;
    }
    .active{
        background:#0191c1 !important;
        color:#FFFFFF !important;
    }
    .active a{
        color:#FFFFFF !important;
        width:100%;display:inline-block;
    }
    .test_block {
      background-color: #fff;
      border: 1px solid #dcdcdc;
      line-height: 20px;
      padding: 5px 20px;
      border-radius: 3px;
      margin-bottom: 10px;
    }
    .talent_title {
        color: #333;
        font-weight: 500;
    }
    .left {
        float: left;
        margin-left: 0px;
    }
    .right {
        float: right;
        margin-right: 0px;
      }
</style>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body">
        <div class="panel-heading">
          <h3 class="form_heading">Test Category</h3>
            <div class="row cm10-row">
              <div class="col-md-3">
                <div class="box tp15m lft15m">
                  <div class="box-header with-border"></div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table class="table table-bordered testcat">
                      <tbody>
                        <tr> <th class="test_category <?php echo e($datas['category_id'] == '' ? 'active' : ''); ?>"><a href="<?php echo e(url('/staffs/test_exam')); ?>">All</a></th></tr>
                        <?php foreach($datas['category'] as $category): ?>
                        <tr> <th class="test_category <?php echo e($datas['category_id'] == $category->id ? 'active' : ''); ?>"><a href="<?php echo e(url('/staffs/test_exam/category/'.$category->seo_url)); ?>" style=""><?php echo e($category->title); ?></a></th></tr>
                        <?php endforeach; ?>
                      
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                  
                </div>
              </div>
              <div class="col-md-9">
                <div class="row cm10-row tp15m">
                  <?php if(count($datas['test']) > 0): ?>
                      <?php foreach($datas['test'] as $exam): ?>                         
                          <a href="<?php echo e($exam['href']); ?>" class="col-lg-4 col-md-6">
                            <div class="test_block">
                              <div class="row">
                                <div class="col-md-4 col-4">
                                  <div class="test_logo">
                                    <img src="<?php echo e(asset($exam['image'])); ?>" style="object-fit: contain; width: 50px; height: 50px;">
                                  </div>
                                </div>
                                <div class="col-md-8 col-8">
                                  <div class="talent_title"><?php echo e(ucwords($exam['title'])); ?></div>
                                  <p>
                                    <span class="left">
                                      High Score: <?php if($exam['your_highest'] != ''): ?><?php echo e($exam['your_highest']); ?>/ <?php endif; ?><?php echo e($exam['your_higest']); ?>

                                    </span>
                                    <span class="right">
                                      Your Rank: <?php if($exam['your_rank'] != ''): ?><?php echo e($exam['your_rank']); ?>/<?php echo e($exam['total_your_test']); ?><?php endif; ?>
                                    </span>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </a>
                      <?php endforeach; ?>
                  <?php endif; ?>           
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>