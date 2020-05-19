<?php $__env->startSection('heading'); ?>
Suggestions
<small>List of Suggestions</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Suggestions</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
      <a href="<?php echo e(url('/branchadmin/suggestions/addnew')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-plus-circle"></i> Add New Suggestion</a>
    </div>
    </div>
    
    <div class="box">
      <div class="box-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>S.N.</th>
              <th> Branch</th>
              <th>Suggestin For</th>
              <th> Suggestion From</th>
             
              <th>Suggestion Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td>
                <select class="form-control" id="filter_branch" name="filter_branch">
                  <option value="">Select Branch</option>
                  <?php foreach($datas['branches'] as $branch): ?>
                  <?php if($branch->id == $datas['filter_branch']): ?>
                  <option selected="selected" value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </td>
              <td>
                <select class="form-control" id="filter_category" name="filter_category">
                  <option value="">Select Suggestion For</option>
                  <?php foreach($datas['categories'] as $category): ?>
                  <?php if($category->id == $datas['filter_category']): ?>
                  <option selected="selected" value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </td>
              <td></td>
            
              <td></td>
              <td></td>
            </tr>
            
            <?php $i=1;
            foreach ($datas['suggestions'] as $row) { ?>
            <tr>
              <td><?php echo $i++ ;?></td>
              <td><?php echo e(\App\Branch::gettitle($row->branch_id)); ?></td>
              <td id="sug_for_<?php echo e($row->id); ?>"><?php echo e(\App\SuggestionFor::getTitle($row->suggestion_for_id)); ?></td>
              <td><?php echo e($row->hide_name == 1 ? '' : $row->staffs_name); ?></td>
             
              <td><?php echo e($row->created_at); ?></td>
              <td>
                <?php if($row->staffs_id == auth()->guard('staffs')->user()->id): ?>
                <a href="<?php echo e(url('/branchadmin/suggestions/edit/'.$row->id)); ?>" class="btn btn-primary left"><i class="fa fa-edit"></i></a>
                <?php endif; ?>
                <a href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($row->id); ?>')" class="btn btn-danger left"><i class="fa fa-fw fa-remove"></i></a>
                <a href="javascript:void(0);" onClick="viewReply('<?php echo e($row->id); ?>')" class="btn btn-primary left"><i class="fa fa-fw fa-eye"></i><?php echo e(count($row->SuggestionReply)); ?></a>
              </td>
              </tr>
              <tr id="reply_<?php echo e($row->id); ?>" class="reply_tr">
                <td colspan="6">
                  <div class="row mb10">
                     
                    <div class="col-md-12">
                      <div class="suggestion_message bg-light-blue disabled" >
                      <?php echo $row->description;?>
                    </div>
                    </div>
                  </div>
                  <?php if(count($row->SuggestionReply) > 0): ?>
                  <?php foreach($row->SuggestionReply as $reply): ?>
                  <div class="row reply-row mb10">
                    <div class="col-md-2 col-sm-4 center">
                      <?php ($class=""); ?>
                      <?php ($text_class = 'bg-gray disabled'); ?>
                      <?php if($row->staffs_id == $reply->reply_by): ?>
                       <?php ($class="blue"); ?>
                       <?php ($text_class = 'bg-light-blue'); ?>
                      <?php if($row->hide_name != 1 && $reply->reply_by > 0): ?>
                       <div class="suggestion_image" >
                      <img src="<?php echo e(\App\Adjustment_staff::getImage($reply->reply_by)); ?>" class="img-circle">
                    </div>
                      <p><center class="<?php echo e($class); ?>"><strong><?php echo e(\App\Adjustment_staff::getName($reply->reply_by)); ?></strong></center></p>
                      <?php endif; ?>
                      <?php else: ?>
                       <div class="suggestion_image" >
                          <img src="<?php echo e(\App\Adjustment_staff::getImage($reply->reply_by)); ?>" class="img-circle">
                        </div>
                      <p><center class="<?php echo e($class); ?>"><strong><?php echo e(\App\Adjustment_staff::getName($reply->reply_by)); ?></strong></center></p>
                      <?php endif; ?>
                      <p><center><?php echo e($reply->created_at); ?></center></p>
                    </div>
                    <div class="col-md-10 col-sm-8 ">
                      <div class="suggestion_message  <?php echo e($text_class); ?>"><?php echo $reply->detail;?></div>
                      <?php if($reply->reply_by == auth()->guard('staffs')->user()->id): ?>
                      <button type="button" onclick="deleteReply('<?php echo e($reply->id); ?>')" class="delete_button btn btn-danger"><i class="fa fa-trash"></i></button>
                      <?php endif; ?>
                    </div>
                  </div>
                  <?php endforeach; ?>
                  <?php endif; ?>
                  <div class="row">
                    <div class="col-md-2 col-sm-4 center">
                     
                      <div class="suggestion_image" >
                        <img src="<?php echo e(\App\Adjustment_staff::getImage(auth()->guard('staffs')->user()->id)); ?>" class="img-circle">
                      </div>
                      <p><center><strong><?php echo e(\App\Adjustment_staff::getName(auth()->guard('staffs')->user()->id)); ?></strong></center></p>
                     
                     
                    </div>
                    <div class="col-md-9 col-sm-6 ">

                      <textarea id="reply_detail_<?php echo e($row->id); ?>" class="form-control" placeholder="Reply Detail"></textarea>
                  </div>
                  <div class="col-md-1 col-sm-2" col-sm-2>
                    <button type="button" class="btn btn-success" onclick="submitReply('<?php echo e($row->id); ?>')">Reply</button>
                  </div>
                </td>
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
              <?php echo $datas['suggestions']->render();?>
            </div>
          </div>
        </div>
        
        <script type="text/javascript">
        
        function confirm_delete(ids){
        if(confirm('Do You Want To Delete This Suggestion?')){
        var url= "<?php echo e(url('/branchadmin/suggestions/delete/')); ?>"+ids;
        location = url;
        
        }
        }
        function viewDescription(id) {
       
        $('#modal-suggestion_'+id).modal('show');
        }

        $('#filter_branch').on('change', function(){
          var filter_branch = $('#filter_branch').val();
          var filter_category = $('#filter_category').val();
          var url = '<?php echo e(url("/branchadmin/suggestions?")); ?>';
          if (filter_branch != '') {
            url += '&filter_branch='+filter_branch;
          }
          if (filter_category != '') {
            url += '&filter_category='+filter_category;
          }
          location = url;
        })

         $('#filter_category').on('change', function(){
          var filter_branch = $('#filter_branch').val();
          var filter_category = $('#filter_category').val();
          var url = '<?php echo e(url("/branchadmin/suggestions?")); ?>';
          if (filter_branch != '') {
            url += '&filter_branch='+filter_branch;
          }
          if (filter_category != '') {
            url += '&filter_category='+filter_category;
          }
          location = url;
        })


         function submitReply(id) {
           var token = $('input[name=\'_token\']').val();
           var detail = $('#reply_detail_'+id).val();
           if (detail == '') {
            alert('You must fill the Reply field');
            $('#reply_detail_'+id).focus();
            return false;
           }
            $.ajax({
             type: 'POST',
                url: '<?php echo e(url("/branchadmin/suggestions/reply")); ?>',
                data: 'id='+id+'&_token='+token+'&description='+detail,
                cache: false,
                success: function(html){
                  var datas = html.split('|');
                  if (datas[0] == 'Success') {
                     location = window.location;
                  } else{
                    alert(datas[1])
                  }
                    
                   
                }
          });
         }

         function deleteReply(id) {
            if(confirm('Do You Want To Delete This Reply?')){
            var url= "<?php echo e(url('/branchadmin/suggestions/delete_reply/')); ?>/"+id;
            location = url;
            
            }
         }

         function viewReply(id) {
          
           $('#reply_'+id).fadeToggle();
         }
        </script>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>