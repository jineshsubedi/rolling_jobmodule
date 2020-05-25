<?php $__env->startSection('heading'); ?>
View Job 
            <small>Detail of View Job</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo e(url('/branchadmin/jobs')); ?>">Jobs</a></li>
            <li class="active">View Job</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">View Job</div>
                <div class="panel-heading">
      <div class="top-links btn-group">
        

        <!--<a href="<?php echo e(url('/admin/jobs/makepdf/'.$datas['job']->id)); ?>" class="btn btn-default btn-xs"><i class="fa fa-file-pdf-o"></i>PDF</a>
        <a href="<?php echo e(url('/admin/jobs/printprofile/'.$datas['job']->id)); ?>" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-print"></i>Print</a> -->
        
        
        </div>
    </div>
                <div class="panel-body">
                    
                    
                    <?php $views = \App\FormData::getSource($datas['job']->id); ?>
                    <?php if(count($datas['source']) > 0): ?>

                     <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Application Source</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                          <div class="box-footer no-padding">
                            <ul class=" nav-stacked">
                               <?php foreach($datas['source'] as $view): ?>
                              <li class="col-md-4" style="float:left; list-style:none; padding:10px;"><a><?php echo e($view['title']); ?> <span class="pull-right badge bg-blue"><?php echo e($view['total']); ?></span></a></li>
                               <?php endforeach; ?>
                             
                            </ul>
                          </div>                        
                        </div>
                        <!-- box-body -->
                      </div>
                    <?php endif; ?>
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Profile</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                          <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <td><b> Job Title</b></td>
                                    <td><?php echo e($datas['job']->title); ?></td>
                                    <td><b> Job Url</b></td>
                                    <td><?php echo e($datas['job']->seo_url); ?></td>
                                </tr>
                                <tr>
                                    <td><b> Vacancy Code</b></td>
                                    <td><?php echo e($datas['job']->vacancy_code); ?></td>
                                    <td><b> External Link</b></td>
                                    <td><?php echo e($datas['job']->external_link); ?></td>
                                </tr>
                                 <tr>
                                    <td><b> Branch</b></td>
                                    <td><?php echo e($datas['job']->Branch->name); ?></td>
                                    <td><b> Job Level</b></td>
                                    <td><?php echo e(\App\JobLevel::getTitle($datas['job']->job_level)); ?></td>
                                </tr>
                                <tr>
                                    <td><b> Job Availability</b></td>
                                    <td><?php echo e($datas['job']->job_availability); ?></td>
                                    <td><b> Minimum Experience</b></td>
                                    <td><?php echo e($datas['job']->min_experience); ?> Years</td>
                                </tr>
                                <tr>
                                    <td><b> Number of Position</b></td>
                                    <td><?php echo e($datas['job']->position); ?></td>
                                    <td><b> Dead Line</b></td>
                                    <td><?php echo e($datas['job']->deadline); ?></td>
                                </tr>
                                <tr>
                                    <td><b> Salary Negotiable</b></td>
                                    <td><?php echo e($datas['job']->negotiable == 1 ? 'Yes' : 'No'); ?></td>
                                    <td><b> Salary </b></td>
                                    <td><?php echo e(\App\Currency::getSymbol($datas['job']->salary_unit)); ?> <?php echo e($datas['job']->minimum_salary); ?></td>
                                </tr>

                                <tr>
                                    <td><b> Prefered Gender</b></td>
                                    <td><?php echo e($datas['job']->gender); ?></td>
                                    <td><b> Minimum Age </b></td>
                                    <td><?php echo e($datas['job']->min_age); ?> years</td>
                                </tr>
                                <tr>
                                    <td><b> Maximum Age </b></td>
                                    <td><?php echo e($datas['job']->max_age); ?> years</td>
                                    <td><b> Status</b></td>
                                    <td>
                                    <?php if($datas['job']->status == 1): ?>
                                      Active
                                    <?php elseif($datas['job']->status == 2): ?>
                                      Disabled
                                    <?php elseif($datas['job']->status == 3): ?>
                                      Pending
                                    <?php else: ?> 
                                      <?php echo e($datas['job']->status); ?>

                                    <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b> Job Locations</b></td>
                                    <td>
                                      <?php if(count($datas['jobs_location']) > 0): ?> 
                                      <?php foreach($datas['jobs_location'] as $locations): ?> 
                                      <?php echo e($locations->name.', '); ?> 
                                      <?php endforeach; ?> 
                                      <?php endif; ?></td>
                                      <td></td>
                                      <td></td>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <?php if(count($datas['job_educations']) > 0): ?>

                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Educations</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                           <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <td>Level</td>
                                <td>Faculty</td>
                                <td>Percent</td>
                                <td>CGPA</td>
                                <td>Others</td>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($datas['job_educations'] as $education): ?>
                                <tr>
                                  <td><?php echo e(\App\EducationLevel::getTitle($education->education_level_id)); ?></td>
                                  <td><?php echo e(\App\Faculty::getTitle($education->faculty_id)); ?></td>
                                  <td><?php echo e($education->percent); ?></td>
                                  <td><?php echo e($education->cgpa); ?></td>
                                  <td><?php echo e($education->others); ?></td>
                                </tr>
                              <?php endforeach; ?>

                            </tbody>
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>

                     <?php endif; ?>

                      <?php if(count($datas['job_experiences']) > 0): ?>

                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Experience</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                           <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <td>Position</td>
                                <td>Duration</td>
                               
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($datas['job_experiences'] as $experience): ?>
                                <tr>
                                  <td><?php echo e(\App\Experience::getTitle($experience->experience_id)); ?></td>
                                 
                                  <td><?php echo e($experience->experience.' '. $experience->format); ?></td>
                                  
                                </tr>
                              <?php endforeach; ?>

                            </tbody>
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>

                     <?php endif; ?>
                      
                       <?php if($datas['jobs_requirements']->description != ''): ?>
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Job Description</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                          <?php echo $datas['jobs_requirements']->description; ?>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <?php endif; ?>

                       <?php if($datas['jobs_requirements']->specification != ''): ?>
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Job Specification</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                          <?php echo e($datas['jobs_requirements']->specification); ?>

                        </div>
                        <!-- /.box-body -->
                      </div>
                      <?php endif; ?>

                      <?php if($datas['jobs_requirements']->education_description != ''): ?>
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Education Description</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                          <?php echo e($datas['jobs_requirements']->education_description); ?>

                        </div>
                        <!-- /.box-body -->
                      </div>
                      <?php endif; ?>

                      <?php if($datas['jobs_requirements']->specific_requirements != ''): ?>
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Specific Requirements</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                          <?php echo e($datas['jobs_requirements']->specific_requirements); ?>

                        </div>
                        <!-- /.box-body -->
                      </div>
                      <?php endif; ?>

                      <?php if($datas['jobs_requirements']->specific_instruction != ''): ?>
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Specific Intruction</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                          <?php echo $datas['jobs_requirements']->specific_instruction; ?>

                        </div>
                        <!-- /.box-body -->
                      </div>
                      <?php endif; ?>
                      <?php if(count($datas['jobs_form']) > 0): ?>
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Extra Form</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                          <?php foreach($datas['jobs_form'] as $value): ?>
                          <div class="form-group">
                          <?php if($value['rq'] == 1){
                                $rq= 'required' ;
                              } else {
                                $rq='';
                              }
                               ?>
                                    <input type="hidden" name="optitle[]"  value="<?php echo $value['level'];?>" />
                                    <label class="col-md-3 control-label <?php echo e($rq); ?>"><?php echo ucfirst($value['level']);?>:</label>
                                    <div class="col-md-9"><?php echo $value['form'];?></div>
                                    <div style="clear: both;"></div>
                          </div>
                          <?php endforeach; ?>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <?php endif; ?>
                      
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>