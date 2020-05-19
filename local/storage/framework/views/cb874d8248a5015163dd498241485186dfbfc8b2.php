<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="panel panel-default">
       
        <div class="panel-body">
          <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(url('/staffs/staff-survey/save')); ?>">
            <?php echo csrf_field(); ?>

            <div class="row">
              <div class="col-md-12">
                <div class="box box-success border p-10">
                  <?php ($i = 0); ?>
                  <?php foreach($datas['others'] as $other): ?>
                 
                     
                     
                      <?php if($other['dropdown'] == 'happy'): ?>
                       <div class="form-group">
                    <label class="col-md-6 control-label required">
                      <input type="hidden" name="others[<?php echo e($i); ?>][title]" value="<?php echo e($other['title']); ?>">
                      <input type="hidden" name="others[<?php echo e($i); ?>][dropdown]" value="<?php echo e($other['dropdown']); ?>">
                    <?php echo e($other['title']); ?></label>
                    <div class="col-md-6">

                       <select class="form-control" data-row="<?php echo e($i); ?>" name="others[<?php echo e($i); ?>][answer]" id="happy">
                       <?php foreach($datas['happy'] as $happy): ?>
                       <?php if($other['answer'] == $happy['value']): ?>
                       <option selected="selected" value="<?php echo e($happy['value']); ?>"><?php echo e($happy['title']); ?></option>
                       <?php else: ?>
                       <option value="<?php echo e($happy['value']); ?>"><?php echo e($happy['title']); ?></option>
                       <?php endif; ?>
                       <?php endforeach; ?>
                     </select>
                       </div>
                  </div>
                  <div id="hdis" style="display: none;"></div>
                  <?php elseif($other['dropdown'] == 'hr'): ?>
                  <div id="hdiss">
                     <div class="form-group">
                    <label class="col-md-6 control-label required">
                      <input type="hidden" name="others[<?php echo e($i); ?>][title]" value="<?php echo e($other['title']); ?>">
                      <input type="hidden" name="others[<?php echo e($i); ?>][dropdown]" value="<?php echo e($other['dropdown']); ?>">
                    <?php echo e($other['title']); ?></label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="others[<?php echo e($i); ?>][answer]" ><?php echo e($other['answer']); ?></textarea>
                         </div>
                  </div>
                  </div>
                
                 
                      <?php elseif($other['dropdown'] == 'yn'): ?>
                       <div class="form-group">
                    <label class="col-md-6 control-label required">
                      <input type="hidden" name="others[<?php echo e($i); ?>][title]" value="<?php echo e($other['title']); ?>">
                      <input type="hidden" name="others[<?php echo e($i); ?>][dropdown]" value="<?php echo e($other['dropdown']); ?>">
                    <?php echo e($other['title']); ?></label>
                    <div class="col-md-6">
                      <select class="form-control" name="others[<?php echo e($i); ?>][answer]">
                       <?php foreach($datas['yesno'] as $yesno): ?>
                       <?php if($other['answer'] == $yesno['value']): ?>
                       <option selected="selected" value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                       <?php else: ?>
                       <option value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                       <?php endif; ?>
                       <?php endforeach; ?>
                     </select>
                      </div>
                  </div>

                      <?php elseif($other['dropdown'] == 'ynr'): ?>
                       <div class="form-group">
                    <label class="col-md-6 control-label required">
                      <input type="hidden" name="others[<?php echo e($i); ?>][title]" value="<?php echo e($other['title']); ?>">
                      <input type="hidden" name="others[<?php echo e($i); ?>][dropdown]" value="<?php echo e($other['dropdown']); ?>">
                    <?php echo e($other['title']); ?></label>
                    <div class="col-md-6">

                      <select class="form-control" name="others[<?php echo e($i); ?>][answer]" id="good_work">
                       <?php foreach($datas['yesno'] as $yesno): ?>
                       <?php if($other['answer'] == $yesno['value']): ?>
                       <option selected="selected" value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                       <?php else: ?>
                       <option value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                       <?php endif; ?>
                       <?php endforeach; ?>
                     </select>
                      </div>
                  </div>


                      <?php else: ?>
                       <div class="form-group">
                        <?php if($other['title'] == 'How?' || $other['title'] == 'explain how you want it to be recognized'): ?>
                    <label class="col-md-6 control-label required" id="good_work_reason"><?php echo e($other['title']); ?></label>
                       <input type="hidden" id="gw_title" name="others[<?php echo e($i); ?>][title]" value="<?php echo e($other['title']); ?>">
                      <?php else: ?>
                      <label class="col-md-6 control-label required"><?php echo e($other['title']); ?></label>
                         <input type="hidden" name="others[<?php echo e($i); ?>][title]" value="<?php echo e($other['title']); ?>">
                        <?php endif; ?>
                     
                      <input type="hidden" name="others[<?php echo e($i); ?>][dropdown]" value="<?php echo e($other['dropdown']); ?>">
                    
                    <div class="col-md-6">
                        <textarea class="form-control" name="others[<?php echo e($i); ?>][answer]" ><?php echo e($other['answer']); ?></textarea>
                         </div>
                  </div>
                      <?php endif; ?>
                      <?php ($i++); ?>
                   
                  <?php endforeach; ?>
                  
                

                 
                </div>
                
                <div class="box box-primary border p-10">
                  <div class="box-header with-border"><h3 class="box-title">Any Suggestion?</h3></div>
                  <div class="form-group<?php echo e($errors->has('sugestion_for') ? ' has-error' : ''); ?>">
                    <label class="col-md-6 control-label">Suggestion For</label>
                    <div class="col-md-6">
                      
                      <select class="form-control" name="suggestion_for">
                        <?php foreach($datas['categories'] as $category): ?>
                        <?php if($category->id == old('suggestion_for')): ?>
                        <option selected="selected" value="<?php echo e($category->id); ?>"> <?php echo e($category->title); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($category->id); ?>"> <?php echo e($category->title); ?></option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                      
                      <?php if($errors->has('suggestion_for')): ?>
                      <span class="help-block">
                        <strong><?php echo e($errors->first('suggestion_for')); ?></strong>
                      </span>
                      <?php endif; ?>
                      
                    </div>
                  </div>
                  <div class="form-group<?php echo e($errors->has('hide_name') ? ' has-error' : ''); ?>">
                    <label class="col-md-6 control-label">Hide Name</label>
                    <div class="col-md-6">
                      
                      <input type="radio" name="hide_name" id="hide_name" value="1"><label>Yes</label>
                      
                      
                      <?php if($errors->has('hide_name')): ?>
                      <span class="help-block">
                        <strong><?php echo e($errors->first('hide_name')); ?></strong>
                      </span>
                      <?php endif; ?>
                      
                    </div>
                  </div>
                  <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <label class="col-md-6 control-label">Description</label>
                    <div class="col-md-6">
                      
                      <textarea id="description" name="description" class="form-control"><?php echo e(old('description')); ?></textarea>
                      
                      <?php if($errors->has('description')): ?>
                      <span class="help-block">
                        <strong><?php echo e($errors->first('description')); ?></strong>
                      </span>
                      <?php endif; ?>
                      
                    </div>
                  </div>
                </div>
                
                
              </div>
              
              
            </div>
            
            
            <div class="form-group">
              <div class="col-md-10 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                <i class="fa fa-fw fa-save"></i>Save
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#happy').on('change', function() {
    var v = $(this).val();
    var row = '<?php echo e($i + 1); ?>';
    
    if (v == 10) {
      $('#hdis').fadeOut();
      $('#hdc').remove();
      $('#hdiss').remove();
    } else{
       hdata = '<div id="hdc"> <div class="form-group"><label class="col-md-6 control-label required">';
       hdata += '<input type="hidden" name="others['+row+'][title]" value="What would have to happen to make you very happy?"><input type="hidden" name="others['+row+'][dropdown]" value="hr">';
       hdata += 'What would have to happen to make you very happy?</label><div class="col-md-6"><textarea class="form-control" name="others['+row+'][answer]"></textarea></div></div></div>';
      $('#hdis').fadeIn().html(hdata);
    }
  })
  $('#good_work').on('change', function()
  {
    var v = $(this).val();
    if (v == 'Yes') {
      $('#good_work_reason').html('How?');
      $('#gw_title').val('How?');

    } else{
       $('#good_work_reason').html('explain how you want it to be recognized');
       $('#gw_title').val('explain how you want it to be recognized');
      
    }
  })
</script>
