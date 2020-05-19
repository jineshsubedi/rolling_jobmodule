<?php $__env->startSection('heading'); ?>
View Applicants 
            <small>Detail of View Applicants</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo e(url('/branchadmin/jobs/application/'.$datas['employee']->jobs_id)); ?>">Applicantss</a></li>
            <li class="active">View Applicants</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">View Applicants</div>
                <div class="panel-heading">
      <div class="top-links btn-group">
         <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(url('/branchadmin/jobs/update_verification')); ?>" style="display: none;">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="job_id" value="<?php echo e($datas['employee']->jobs_id); ?>">
                <input type="hidden" name="employee_id[]" value="<?php echo e($datas['employee']->id); ?>">
          </form>

        
        <a class="btn btn-primary" style="float: right !important;" href="#" onclick="event.preventDefault(); document.getElementById('testform').submit();">Select for Written Exam</a>
        
        </div>
    </div>
                <div class="panel-body">
                    <?php if($datas['image'] != ''): ?>
                    <div class="logo"><img src="<?php echo e($datas['image']); ?>"></div>
                    <?php endif; ?>
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Personal Information</h3>

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
                                    <td><b> Application Id</b></td>
                                    <td><?php echo e($datas['employee']->id); ?></td>
                                </tr>
                                <tr>
                                    <td><b> Application For</b></td>
                                    <td><?php echo e(\App\Jobs::getTitle($datas['employee']->jobs_id)); ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%"><b> Full Name</b></td>
                                    <td><?php echo e(\App\Employees::getFullname($datas['employee']->firstname,$datas['employee']->middlename,$datas['employee']->lastname)); ?></td>
                                </tr>
                                <tr>
                                    <td><b> Email</b></td>
                                    <td><?php echo e($datas['employee']->email); ?></td>
                                </tr>
                                 <?php if($datas['employee']->citizenship != ''): ?>
                                <tr>
                                    <td><b> Citizenship</b></td>
                                    <td><?php echo e($datas['employee']->citizenship); ?></td>
                                </tr>
                                <?php endif; ?>
                                <?php if($datas['employee']->gender != ''): ?>
                                <tr>
                                    <td><b> Gender</b></td>
                                    <td><?php echo e($datas['employee']->gender); ?></td>
                                </tr>
                                <?php endif; ?>
                                <?php if($datas['employee']->dob < 2007-01-01): ?>
                                <tr>
                                    <td><b> Date of Birth</b></td>
                                    <td><?php echo e($datas['employee']->dob); ?></td>
                                </tr>
                                <?php endif; ?>
                                 <?php if($datas['employee']->age > 15): ?>
                                <tr>
                                    <td><b> Age</b></td>
                                    <td><?php echo e($datas['employee']->age); ?></td>
                                </tr>
                                <?php endif; ?>
                                <?php if($datas['employee']->total_experience > 0): ?>
                                <tr>
                                    <td><b> Total Experience</b></td>
                                    <td><?php echo e($datas['employee']->total_experience); ?></td>
                                </tr>
                                <?php endif; ?>
                                <?php if($datas['employee']->marital_statu != ''): ?>
                                <tr>
                                    <td><b> Marital Status</b></td>
                                    <td><?php echo e($datas['employee']->marital_status); ?></td>
                                </tr>
                                <?php endif; ?>
                                <?php if($datas['employee']->vehicle != ''): ?>
                                <tr>
                                  <tr>
                                    <td><b> Vehicle</b></td>
                                    <td><?php echo e($datas['employee']->vehicle); ?></td>
                                </tr>
                                <?php endif; ?>
                                <?php if($datas['employee']->license_of != ''): ?>
                                <tr>
                                    <td><b> License Of</b></td>
                                    <td><?php echo e($datas['employee']->license_of); ?></td>
                                </tr>
                                <?php endif; ?>
                                <?php if($datas['employee']->permanent_address != ''): ?>
                                <tr>
                                    <td><b> Permanent Address</b></td>
                                    <td><?php echo e($datas['employee']->permanent_address); ?></td>
                                </tr>
                                <?php endif; ?>
                                  <?php if($datas['employee']->temporary_address != ''): ?>
                                  <tr>
                                    <td><b>Temporary Address</b></td>
                                    <td><?php echo e($datas['employee']->temporary_address); ?></td>
                                </tr>
                                  <?php endif; ?>
                               <?php if($datas['employee']->home_phone != ''): ?>
                                  <tr>
                                    <td><b>Home Phone</b></td>
                                    <td><?php echo e($datas['employee']->home_phone); ?></td>
                                </tr>
                                  <?php endif; ?>
                                  <?php if($datas['employee']->mobile != ''): ?>
                                  <tr>
                                    <td><b>Mobile Phone</b></td>
                                    <td><?php echo e($datas['employee']->mobile); ?></td>
                                </tr>
                                  <?php endif; ?>
                                  <?php if($datas['employee']->fax != ''): ?>
                                  <tr>
                                    <td><b>Fax</b></td>
                                    <td><?php echo e($datas['employee']->fax); ?></td>
                                </tr>
                                  <?php endif; ?>
                                  <?php if($datas['employee']->website != ''): ?>
                                  <tr>
                                    <td><b>Website</b></td>
                                    <td><?php echo e($datas['employee']->website); ?></td>
                                </tr>
                                  <?php endif; ?>
                                   <?php if($datas['employee']->image != ''): ?>
                                  <tr>
                                    <td><b>Image</b></td>
                                    <td><a href="<?php echo e(asset('image/'.$datas['employee']->image)); ?>" target="_blank" download></a><img src="<?php echo e(asset('image/'.$datas['employee']->image)); ?>" height="150" download></a></td>
                                    
                                  </tr>
                                  <?php endif; ?>
                                  <?php if($datas['employee']->resume != ''): ?>
                                  <tr>
                                    <td><b>Resume</b></td>
                                    <td><a href="<?php echo e(asset('image/'.$datas['employee']->resume)); ?>" class="btn btn-primary" target="_blank" download>Download</a></td>
                                    
                                  </tr>
                                  <?php endif; ?>
                                  <?php if($datas['employee']->coverletter != ''): ?>
                                  <tr>
                                    <td><b>Cover Letter</b></td>
                                    <td><a href="<?php echo e(asset('image/'.$datas['employee']->coverletter)); ?>" class="btn btn-primary" target="_blank" download>Download</a></td>
                                    
                                  </tr>
                                  <?php endif; ?>
                                     <?php if($datas['employee']->edu_marks != ''): ?>
                                <tr>
                                    <td><b> Education Marks</b></td>
                                    <td><?php echo e($datas['employee']->edu_marks); ?></td>
                                </tr>
                                <?php endif; ?>
                                 <?php if($datas['employee']->exp_marks != ''): ?>
                                <tr>
                                    <td><b> Experience Marks</b></td>
                                    <td><?php echo e($datas['employee']->exp_marks); ?></td>
                                </tr>
                                <?php endif; ?>

                                  <?php if(count($datas['form_data']) > 0): ?>
                                  <?php foreach($datas['form_data'] as $formdata): ?>
                                    <tr >
                                    <td><b><?php echo e($formdata->f_title); ?></b></td>
                                    <?php if($formdata->type == 1): ?>
                                    <td><a href="<?php echo e(asset('image/'.$formdata->f_description)); ?>" target="_blank" class="btn btn-primary" download>Download</a></td>
                                    <?php else: ?>
                                    <td class="medit" id="opv_<?php echo e($formdata->id); ?>"> <?php echo $formdata->f_description ?> <a href="javascript:void(0)" class="btn btn-primary right" onclick="editMarks('<?php echo e($formdata->id); ?>', '<?php echo e($formdata->marks); ?>', '<?php echo e($formdata->f_description); ?>')"><i class="fa fa-edit"></i></a><span class="right">Marks: <?php echo e($formdata->marks); ?> </span> </td> 
                                    <?php endif; ?>
                                     <?php if($formdata->extra_lable !=''): ?>
                                   <tr>
                                    <td><b><?php echo e($formdata->extra_lable); ?></b></td>
                                    <td><?php echo e($formdata->extra_answer); ?></td>
                                    
                                  </tr>
                                  <?php endif; ?>
                                    
                                  </tr>
                                  <?php endforeach; ?>
                                  <?php endif; ?>
                                   <?php if($datas['employee']->total_marks != ''): ?>
                                <tr>
                                    <td><b> Total Marks</b></td>
                                    <td id="tmarks"><?php echo e($datas['employee']->total_marks); ?></td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                     <?php if(isset($datas['education']) && count($datas['education']) > 0): ?>
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Education Qualification</h3>

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
                                <th>Country</th>
                                <th>Education Level</th>
                                <th>Faculty</th>
                                 <th>Status</th>
                                <th>Institution</th>
                                <th>Board</th>
                                <th>Percent/Grade</th>
                                <th>Year</th>
                                
                            </thead>
                            <tbody>
                           
                              <?php foreach($datas['education'] as $education): ?>
                                <tr>
                                    <td><?php echo e($education->country); ?></td>
                                    <td><?php echo e(\App\Faculty::getLevelTitle($education->level_id)); ?></td>
                                    <td><?php echo e(\App\Faculty::getTitle($education->faculty_id)); ?></td>
                                    <td><?php echo e($education->status); ?></td>
                                    <td><?php echo e($education->institution); ?></td>
                                    <td><?php echo e($education->board); ?></td>
                                    <td><?php echo e($education->percentage.' '.$education->marksystem); ?></td>
                                    <td><?php echo e($education->year); ?></td>
                                </tr>
                              <?php endforeach; ?>
                         
                          </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                       <?php endif; ?>
                        <?php if(isset($datas['training']) && count($datas['training']) > 0): ?>
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Training</h3>

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
                                <th>Title</th>
                                <th>Details</th>
                                <th>Institution</th>
                                <th>Duration</th>
                               
                                <th>Year</th>
                                
                            </thead>
                            <tbody>
                          
                              <?php foreach($datas['training'] as $training): ?>
                                <tr>
                                    <td><?php echo e($training->title); ?></td>
                                    
                                    <td><?php echo e($training->details); ?></td>
                                    <td><?php echo e($training->institution); ?></td>
                                    <td><?php echo e($training->duration); ?></td>
                                    
                                    <td><?php echo e($training->year); ?></td>
                                </tr>
                              <?php endforeach; ?>
                          
                          </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <?php endif; ?>
                      
                       <?php if(isset($datas['experience']) && count($datas['experience']) > 0): ?>
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Experiences</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <table class="table table-bordered table-hover">
                              <thead>
                                <th>Organization</th>
                                <th>Type of Employment</th>
                                <th>Organization Type</th>
                                <th>Designation</th>
                                <th>Job Level</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Working Status</th>
                                <th>Country</th>
                                <th>Experience</th>
                            </thead>
                            <tbody>
                          
                              <?php foreach($datas['experience'] as $experience): ?>
                                <tr>
                                    <td><?php echo e($experience->organization); ?></td>
                                    
                                    <td><?php echo e($experience->typeofemployment); ?></td>
                                    <td><?php echo e(\App\OrganizationType::getOrgTypeTitle($experience->org_type_id)); ?></td>
                                    <td><?php echo e($experience->designation); ?></td>
                                    
                                    <td><?php echo e($experience->level); ?></td>
                                    <td><?php echo e($experience->from); ?></td>
                                    <td><?php echo e($experience->to); ?></td>
                                    <td><?php echo e($experience->currently_working == 1 ? 'Currently Working' : 'Not Working'); ?></td>
                                    <td><?php echo e($experience->country); ?></td>
                                    <td><?php echo e($experience->experience); ?></td>
                                </tr>
                                <tr><td colspan="10"><?php echo e($experience->duties); ?></td></tr>
                              <?php endforeach; ?>
                         
                          </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                       <?php endif; ?>
                       <?php if(isset($datas['language']) && count($datas['language']) > 0): ?>
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Languages</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <table class="table table-bordered table-hover">
                               <thead>
                                <th>Languages</th>
                                <th>Understad</th>
                                <th>Speak</th>
                                <th>Read</th>
                                <th>Write</th>
                               
                               
                            </thead>
                            <tbody>
                           
                              <?php foreach($datas['language'] as $language): ?>
                                <tr>
                                    <td><?php echo e($language->language); ?></td>
                                    
                                    <td><?php echo e($language->understand); ?></td>
                                    
                                    <td><?php echo e($language->speak); ?></td>
                                    
                                    <td><?php echo e($language->reading); ?></td>
                                    <td><?php echo e($language->writing); ?></td>
                                   
                                   
                                    
                                </tr>
                              <?php endforeach; ?>
                         
                          </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                       <?php endif; ?>
                       <?php if(isset($datas['reference']) && count($datas['reference']) > 0): ?>
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">References</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <table class="table table-bordered table-hover">
                               <thead>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Address</th>
                                <th>Office Phone</th>
                                <th>Mobile</th>
                                <th>E-mail</th>
                                <th>Company</th>
                                
                            </thead>
                            <tbody>
                           
                              <?php foreach($datas['reference'] as $reference): ?>
                                <tr>
                                    <td><?php echo e($reference->name); ?></td>
                                    
                                    <td><?php echo e($reference->designation); ?></td>
                                    
                                    <td><?php echo e($reference->address); ?></td>
                                    
                                    <td><?php echo e($reference->office_phone); ?></td>
                                    <td><?php echo e($reference->mobile); ?></td>
                                   
                                    <td><?php echo e($reference->email); ?></td>
                                    <td><?php echo e($reference->company); ?></td>
                                    
                                </tr>
                              <?php endforeach; ?>
                          
                          </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                      <?php endif; ?>
                     
                </div>
            </div>
        </div>
    </div>
</div>
</div>
 <?php echo csrf_field(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>