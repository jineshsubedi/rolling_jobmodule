<?php $__env->startSection('heading'); ?>
Achievement
<small>List of Achievement </small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="active">Achievement </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
      <a href="<?php echo e(url('/supervisor/achievement/summary')); ?>" class="btn btn-success right" style="padding: 4px 16px"><i class="fa fa-fw fa-eye"></i> Summary </a><a href="<?php echo e(url('/supervisor/add_achievement')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-plus-circle"></i> Add Achievement </a>
    </div>
    </div>
    
    <div class="box">
      <div class="box-body">
        <div id="FilterDiv" class="filter-results rounded-item panel panel-default listing-filters">
          
          
          <div class="panel-body ">
            
            <div class="default-options-search">
              <div class="form-group col-md-2">
                <label >Staff</label>
                <input type="text" class="form-control" id="staff" value="<?php echo e(\App\Adjustment_staff::getName($datas['filter_staff'])); ?>" /><input type="hidden" id="filter_staff" value="<?php echo e($datas['filter_staff']); ?>">
              </div>
              <div class="form-group col-md-2">
                <label >Category</label>
                <select class="form-control"  id="filter_category">
                  <option value="">Select Category</option>
                  <?php foreach($datas['category'] as $category): ?>
                  <?php if($category['id'] == $datas['filter_category']): ?>
                  <option selected="selected" value="<?php echo e($category['id']); ?>"><?php echo e($category['title']); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($category['id']); ?>"><?php echo e($category['title']); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label >Date From</label>
                <input type="text" class="form-control datepicker" id="filter_from" value="<?php echo e($datas['filter_from']); ?>">
              </div>
              <div class="form-group col-md-2">
                <label >Date To</label>
                <input type="text" class="form-control datepicker" id="filter_to" value="<?php echo e($datas['filter_to']); ?>">
              </div>
              
              <div class="form-group col-md-2">
                <a class="btn btn-success btn-addon" href="<?php echo e(url('/supervisor/achievements')); ?>" style="margin-top: 25px;"><i class="fa fa-check"></i> All</a>
                
              </div>
              
            </div>
            
            
            
          </div>
          <div class="clear"></div>
        </div>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>S.N.</th>
              <th> Staff</th>
              <th> Category</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            
            <?php $i=1;
            foreach ($datas['achievements'] as $row) { ?>
            <tr>
              <td><?php echo $i++ ;?></td>
              <td><?php echo \App\Adjustment_staff::getName($row->adjustment_staff_id);?></td>
              <td><?php echo \App\AchievementCategory::getTitle($row->achievement_category_id);?></td>
              <td><?php echo e($row->achievement_date); ?></td>
              
            </tr>
            <?php  }
            ?>
            
          </table>
          </div><!-- /.box-body -->
        </div>
      </div>
      <div>
        <div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="dataTables_paginate paging_simple_numbers right">
              <?php echo $datas['achievements']->render();?>
            </div>
          </div>
        </div>
  <script type="text/javascript">
     $(function () {
    
    $('.datepicker').datepicker({
        onSelect: function(date) {
            
          var filter_from = $('#filter_from').val();
          var filter_to = $('#filter_to').val();
          var filter_staff = $('#filter_staff').val();
          var filter_category = $('#filter_category').val();
          var url = '<?php echo e(url("supervisor/achievements")); ?>?';
          if (filter_staff != '') {
            url += '&filter_staff='+filter_staff;
          }
           if (filter_category != '') {
            url += '&filter_category='+filter_category;
          }
          if (filter_from != '') {
              url += '&filter_from='+filter_from;
             }
             if (filter_to != '') {
              url += '&filter_to='+filter_to;
             }
            location = url;


           
        }
    });
  });

     $('#filter_category').on('change',function(){
          var filter_from = $('#filter_from').val();
          var filter_to = $('#filter_to').val();
          var filter_staff = $('#filter_staff').val();
          var filter_category = $('#filter_category').val();
          var url = '<?php echo e(url("supervisor/achievements")); ?>?';
          if (filter_staff != '') {
            url += '&filter_staff='+filter_staff;
          }
           if (filter_category != '') {
            url += '&filter_category='+filter_category;
          }
          if (filter_from != '') {
              url += '&filter_from='+filter_from;
             }
             if (filter_to != '') {
              url += '&filter_to='+filter_to;
             }
            location = url;
     })

     $('#staff').autocomplete({

    source: '<?php echo e(url("supervisor/staffs/autocomplete/")); ?>',
          minlength:1,
          autoFocus:true,
          select:function(e,ui){


            var filter_from = $('#filter_from').val();
          var filter_to = $('#filter_to').val();
          var filter_staff = ui.item.id;
          var filter_category = $('#filter_category').val();
          var url = '<?php echo e(url("supervisor/achievements")); ?>?';
          if (filter_staff != '') {
            url += '&filter_staff='+filter_staff;
          }
           if (filter_category != '') {
            url += '&filter_category='+filter_category;
          }
          if (filter_from != '') {
              url += '&filter_from='+filter_from;
             }
             if (filter_to != '') {
              url += '&filter_to='+filter_to;
             }
            location = url;
            
             
          }

});

  </script>      
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>