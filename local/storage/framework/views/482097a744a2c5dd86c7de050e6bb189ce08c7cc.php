<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <td>ID</td>
                        <?php if(in_array('saluation', $datas['jf'])): ?>
                        <td>Salutation</td>
                        <?php endif; ?>
                         <td>First Name</td>
                         <td>Middle Name</td>
                         <td>Last Name</td>
                         <td>E-mail</td>
                          <?php if(in_array('citizenship', $datas['jf'])): ?>
                          <td>Citizenship No</td>
                          <?php endif; ?>
                         <?php if(in_array('gender', $datas['jf'])): ?>
                          <td>Gender</td>
                          <?php endif; ?>
                          <?php if(in_array('dob', $datas['jf'])): ?> 
                          <td>Date of Birth</td>
                          <?php endif; ?>
                          <td>Age</td>
                          <td>Total Experience</td>
                          <?php if(in_array('marital_status', $datas['jf'])): ?> 
                          <td>Marital Status</td>
                          <?php endif; ?>
                          <?php if(in_array('nationality', $datas['jf'])): ?> 
                          <td>Nationality</td>
                          <?php endif; ?>
                          <?php if(in_array('permanent_address', $datas['jf'])): ?>
                          <td>Permanent Address</td>
                          <?php endif; ?>
                          <?php if(in_array('temporary_address', $datas['jf'])): ?> 
                          <td>Temporary Address</td>
                          <?php endif; ?>
                          <?php if(in_array('home_phone', $datas['jf'])): ?>
                          <td>Home Phone</td>
                          <?php endif; ?>
                          <?php if(in_array('mobile_phone', $datas['jf'])): ?> 
                          <td>Mobile Phone</td>
                          <?php endif; ?>
                          <?php if(in_array('fax', $datas['jf'])): ?>
                          <td>Fax</td>
                          <?php endif; ?>
                          <?php if(in_array('website', $datas['jf'])): ?> 
                          <td>Website</td>
                          <?php endif; ?>
                          <?php if(in_array('license_of', $datas['jf'])): ?> 
                          <td>License of</td>
                          <?php endif; ?>
                           <?php if(in_array('location', $datas['jf'])): ?> 
                          <td>District</td>
                          <td>Muncipality</td>
                          <td>Ward</td>
                          <?php endif; ?>
                          <?php if(in_array('pp_photo', $datas['jf'])): ?> 
                          <td>PP Photo</td>
                          <?php endif; ?>
                          <?php if(in_array('resume', $datas['jf'])): ?> 
                          <td>Resume</td>
                          <?php endif; ?>
                          <?php if(in_array('cover_letter', $datas['jf'])): ?> 
                          <td>Cover Letter</td>
                          <?php endif; ?>
                          <?php if($datas['job']->edu_marks != ''): ?>
                          <td>Education Marks (<?php echo e($datas['job']->edu_marks); ?>)</td>
                          <?php endif; ?>
                          <?php if($datas['job']->exp_marks != ''): ?>
                          <td>Experience Marks (<?php echo e($datas['job']->exp_marks); ?>)</td>
                          <?php endif; ?>
                          <?php if(count($datas['f_file_total']) > 0): ?>
                            <?php foreach($datas['f_file_total'] as $ffile): ?>
                                <td><?php echo e($ffile['f_title']); ?></td>
                            <?php endforeach; ?>
                          <?php endif; ?>
                          <?php if(count($datas['fdt']) > 0): ?>
                            <?php foreach($datas['fdt'] as $fd): ?>
                              <td><?php echo e($fd['f_title']); ?></td>
                              <td>Marks (<?php echo e($fd['marks']); ?>)</td>

                              <?php if(count($fd['children']) > 0): ?>

                              <?php foreach($fd['children'] as $fchild): ?>
                                <td><?php echo e($fchild['f_title']); ?></td>
                                <td>Marks (<?php echo e($fchild['marks']); ?>)</td>
                                  <?php if(count($fchild['children']) > 0): ?>

                                  <?php foreach($fchild['children'] as $schild): ?>
                                    <td><?php echo e($schild['f_title']); ?></td>
                                    <td>Marks (<?php echo e($schild['marks']); ?>)</td>

                                    <?php if(count($schild['children']) > 0): ?>

                                    <?php foreach($schild['children'] as $tchild): ?>
                                      <td><?php echo e($tchild['f_title']); ?></td>
                                      <td>Marks (<?php echo e($tchild['marks']); ?>)</td>

                                     
                                    <?php endforeach; ?>

                                    <?php endif; ?>
                                  <?php endforeach; ?>

                                  <?php endif; ?>

                              <?php endforeach; ?>

                              <?php endif; ?>
                              
                            <?php endforeach; ?>
                          <?php endif; ?>
                          <?php if($datas['total'] != ''): ?>
                          <td>Total Marks (<?php echo e($datas['total']); ?>)</td>
                          <?php endif; ?>
                          <?php if(in_array('education', $datas['jf'])): ?> 
                          <?php if($datas['edu'] > 0): ?>
                          <?php for ($i=0; $i < $datas['edu']; $i++) { ?>
                           
                              <td>Country</td>
                              <td>Level</td>
                              <td>Faculty</td>
                             <td>Status</td>
                              <td>Institution</td>
                              <td>Board</td>
                              <td>Percentage</td>
                              <td>System</td>
                              <td>Year</td>
                            <?php } ?>
                          <?php endif; ?>
                          <?php endif; ?>
                          <?php if(in_array('training', $datas['jf'])): ?>
                                <?php if($datas['tra'] > 0): ?>
                                  <?php for ($i=0; $i < $datas['tra']; $i++) { ?>
                                    <td>Title</td>
                                    <td>Details</td>
                                    <td>Institution</td>
                                    <td>Duration</td>
                                    <td>Year</td>
                                  <?php } ?>
                                <?php endif; ?>
                          <?php endif; ?>
                          <?php if(in_array('experience', $datas['jf'])): ?>
                                <?php if($datas['exp'] > 0): ?>
                                  <?php for ($i=0; $i < $datas['exp']; $i++) { ?>
                                    <td>Organization</td>
                                    <td>Type of Employment</td>
                                    <td>Org. Type</td>
                                    <td>Designation</td>
                                    <td>Level</td>
                                    <td>From</td>
                                    <td>To</td>
                                    <td>Currently Working</td>
                                    <td>Country</td>
                                    <td>Duties & Responsibilities</td>
                                    <td>Experience</td>
                                  <?php } ?>
                                <?php endif; ?>
                          <?php endif; ?>
                          <?php if(in_array('language', $datas['jf'])): ?> 
                                <?php if($datas['lag'] > 0): ?>
                                  <?php for ($i=0; $i < $datas['lag']; $i++) { ?>
                                    <td>Language</td>
                                    <td>Understand</td>
                                    <td>Speak</td>
                                    <td>Reading</td>
                                    <td>Writing</td>
                                  
                                    
                                  <?php } ?>
                                <?php endif; ?>
                          <?php endif; ?>
                          <?php if(in_array('reference', $datas['jf'])): ?>
                                <?php if($datas['ref'] > 0): ?>
                                  <?php for ($i=0; $i < $datas['ref']; $i++) { ?>
                                    <td>Name</td>
                                    <td>Designation</td>
                                    <td>Address</td>
                                    <td>Office Phone</td>
                                    <td>Mobile</td>
                                    <td>Email</td>
                                    <td>Organization</td>
                                    
                                  <?php } ?>
                                <?php endif; ?>
                          <?php endif; ?>
                      </tr>
                    </thead>

                    <tbody>
                      <?php if(count($datas['employees']) > 0): ?>
                          <?php foreach($datas['employees'] as $emp): ?>
                            <tr>
                        <td><?php echo e($emp['id']); ?></td>
                        <?php if(in_array('saluation', $datas['jf'])): ?>
                        <td><?php echo e($emp['saluation']); ?></td>
                        <?php endif; ?>
                         <td><?php echo e($emp['firstname']); ?></td>
                         <td><?php echo e($emp['middlename']); ?></td>
                         <td><?php echo e($emp['lastname']); ?></td>
                         <td><?php echo e($emp['email']); ?></td>
                          <?php if(in_array('citizenship', $datas['jf'])): ?> 
                          <td><?php echo e($emp['citizenship']); ?></td>
                          <?php endif; ?>
                         <?php if(in_array('gender', $datas['jf'])): ?> 
                          <td><?php echo e($emp['gender']); ?></td>
                          <?php endif; ?>
                          <?php if(in_array('dob', $datas['jf'])): ?> 
                          <td><?php echo e($emp['dob']); ?></td>
                          <?php endif; ?>
                          <td><?php echo e($emp['age']); ?></td>
                          <td><?php echo e($emp['total_experience']); ?></td>
                          <?php if(in_array('marital_status', $datas['jf'])): ?> 
                          <td><?php echo e($emp['marital_status']); ?></td>
                          <?php endif; ?>
                          <?php if(in_array('nationality', $datas['jf'])): ?> 
                          <td><?php echo e($emp['nationality']); ?></td>
                          <?php endif; ?>
                          <?php if(in_array('permanent_address', $datas['jf'])): ?> 
                          <td><?php echo e($emp['permanent_address']); ?></td>
                          <?php endif; ?>
                          <?php if(in_array('temporary_address', $datas['jf'])): ?> 
                          <td><?php echo e($emp['temporary_address']); ?></td>
                          <?php endif; ?>
                          <?php if(in_array('home_phone', $datas['jf'])): ?> 
                          <td><?php echo e($emp['home_phone']); ?></td>
                          <?php endif; ?>
                          <?php if(in_array('mobile_phone', $datas['jf'])): ?> 
                          <td><?php echo e($emp['mobile']); ?></td>
                          <?php endif; ?>
                          <?php if(in_array('fax', $datas['jf'])): ?> 
                          <td><?php echo e($emp['fax']); ?></td>
                          <?php endif; ?>
                          <?php if(in_array('website', $datas['jf'])): ?> 
                          <td><?php echo e($emp['website']); ?></td>
                          <?php endif; ?>
                          <?php if(in_array('license_of', $datas['jf'])): ?> 
                          <td><?php echo e($emp['license_of']); ?></td>
                          <?php endif; ?>
                          <?php if(in_array('location', $datas['jf'])): ?> 
                          <td><?php echo e($emp['district']); ?></td>
                          <td><?php echo e($emp['municipality']); ?></td>
                          <td><?php echo e($emp['ward']); ?></td>
                          <?php endif; ?>
                          <?php if(in_array('pp_photo', $datas['jf'])): ?> 
                          <td><?php echo e(asset('/image/'.$emp['image'])); ?></td>
                          <?php endif; ?>
                          <?php if(in_array('resume', $datas['jf'])): ?> 
                          <td><?php echo e(asset('/image/'.$emp['resume'])); ?></td>
                          <?php endif; ?>
                          <?php if(in_array('cover_letter', $datas['jf'])): ?> 
                          <td><?php echo e(asset('/image/'.$emp['coverletter'])); ?></td>
                          <?php endif; ?>
                           <?php if($datas['job']->edu_marks != ''): ?>
                          <td><?php echo e($emp['edu_marks']); ?></td>
                          <?php endif; ?>
                          <?php if($datas['job']->exp_marks != ''): ?>
                          <td><?php echo e($emp['exp_marks']); ?></td>
                          <?php endif; ?>
                           <?php if(count($emp['exfile']) > 0): ?>
                            <?php foreach($emp['exfile'] as $exfile): ?>
                                <td><?php echo e(asset('/image/'.$exfile->f_description)); ?></td>
                            <?php endforeach; ?>
                            <?php endif; ?>
                             <?php $exf = count($emp['exfile']); $exdif = count($datas['f_file_total']) - $exf; 
                               
                             ?>
                           
                             <?php if($exdif > 0): ?>
                              <?php for ($i=0; $i < $exdif; $i++) { ?>
                                    <td></td>
                                  
                                  <?php } ?>

                            
                            

                          <?php endif; ?>
                          
                           <?php if(count($datas['fdt']) > 0): ?>
                            <?php foreach($datas['fdt'] as $fd): ?>
                              <td><?php echo e(\App\FormData::getValue($datas['job']->id,$emp['id'],$fd['f_title'])); ?></td>
                              <td>Marks (<?php echo e(\App\FormData::getMark($datas['job']->id,$emp['id'],$fd['f_title'])); ?>)</td>

                              <?php if(count($fd['children']) > 0): ?>

                              <?php foreach($fd['children'] as $fchild): ?>
                                <td><?php echo e(\App\FormData::getValue($datas['job']->id,$emp['id'],$fchild['f_title'])); ?></td>
                              <td>Marks (<?php echo e(\App\FormData::getMark($datas['job']->id,$emp['id'],$fchild['f_title'])); ?>)</td>
                                  <?php if(count($fchild['children']) > 0): ?>

                                  <?php foreach($fchild['children'] as $schild): ?>
                                    <td><?php echo e(\App\FormData::getValue($datas['job']->id,$emp['id'],$schild['f_title'])); ?></td>
                              <td>Marks (<?php echo e(\App\FormData::getMark($datas['job']->id,$emp['id'],$schild['f_title'])); ?>)</td>

                                    <?php if(count($schild['children']) > 0): ?>

                                    <?php foreach($schild['children'] as $tchild): ?>
                                     <td><?php echo e(\App\FormData::getValue($datas['job']->id,$emp['id'],$tchild['f_title'])); ?></td>
                              <td>Marks (<?php echo e(\App\FormData::getMark($datas['job']->id,$emp['id'],$tchild['f_title'])); ?>)</td>

                                     
                                    <?php endforeach; ?>

                                    <?php endif; ?>
                                  <?php endforeach; ?>

                                  <?php endif; ?>

                              <?php endforeach; ?>

                              <?php endif; ?>
                              
                            <?php endforeach; ?>
                          <?php endif; ?>
                           <?php if($datas['total'] != ''): ?>
                          <td><?php echo e($emp['total_marks']); ?></td>
                          <?php endif; ?>

                          <?php if(in_array('education', $datas['jf'])): ?> 
                          <?php if(count($emp['education']) > 0): ?>
                            <?php foreach($emp['education'] as $edu): ?>
                              <td><?php echo e($edu->country); ?></td>
                              <td><?php echo e(\App\Faculty::getLevelTitle($edu->level_id)); ?></td>
                              <td><?php echo e(\App\Faculty::getTitle($edu->faculty_id)); ?></td>
                             <td><?php echo e($edu->status); ?></td>
                              <td><?php echo e($edu->institution); ?></td>
                              <td><?php echo e($edu->board); ?></td>
                              <td><?php echo e($edu->percentage); ?></td>
                              <td><?php echo e($edu->marksystem); ?></td>
                              <td><?php echo e($edu->year); ?></td>
                            <?php endforeach; ?>
                             <?php endif; ?>

                            
                             <?php $edc = count($emp['education']); $edif = $datas['edu'] - $edc; ?>
                             <?php if($edif > 0): ?>
                              <?php for ($i=0; $i < $edif; $i++) { ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                   <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  <?php } ?>

                            
                            

                          <?php endif; ?>
                          <?php endif; ?>
                          <?php if(in_array('training', $datas['jf'])): ?> 
                                <?php if(count($emp['training']) > 0): ?>
                                  <?php foreach($emp['training'] as $training): ?>
                                    <td><?php echo e($training->title); ?></td>
                                    
                                    <td><?php echo e($training->details); ?></td>
                                    <td><?php echo e($training->institution); ?></td>
                                    <td><?php echo e($training->duration); ?></td>
                                    
                                    <td><?php echo e($training->year); ?></td>
                                  <?php endforeach; ?>
                                   <?php endif; ?>
                                   
                             <?php $trc = count($emp['training']); $tdif = $datas['tra'] - $trc; ?>
                             <?php if($tdif > 0): ?>
                              <?php for ($i=0; $i < $tdif; $i++) { ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  <?php } ?>

                            

                            
                                <?php endif; ?>
                          <?php endif; ?>
                          <?php if(in_array('experience', $datas['jf'])): ?> 
                                <?php if(count($emp['experience']) > 0): ?>
                                  <?php foreach($emp['experience'] as $experience): ?>
                                    <td><?php echo e($experience->organization); ?></td>
                                    
                                    <td><?php echo e($experience->typeofemployment); ?></td>
                                    <td><?php echo e(\App\OrganizationType::getOrgTypeTitle($experience->org_type_id)); ?></td>
                                    <td><?php echo e($experience->designation); ?></td>
                                    
                                    <td><?php echo e($experience->level); ?></td>
                                    <td><?php echo e($experience->from); ?></td>
                                    <td><?php echo e($experience->to); ?></td>
                                    <td><?php echo e($experience->currently_working == 1 ? 'Currently Working' : 'Not Working'); ?></td>
                                    <td><?php echo e($experience->country); ?></td>
                                     <td><?php echo e($experience->duties); ?></td>
                                    <td><?php echo e($experience->experience); ?></td>
                                  <?php endforeach; ?>
                                  <?php endif; ?>
                                   
                             <?php $expc = count($emp['experience']); $exdif = $datas['exp'] - $expc; ?>
                             <?php if($exdif > 0): ?>
                              <?php for ($i=0; $i < $exdif; $i++) { ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  <?php } ?>

                             

                            

                                <?php endif; ?>
                          <?php endif; ?>
                          <?php if(in_array('language', $datas['jf'])): ?> 
                                <?php if(count($emp['language']) > 0): ?>
                                  <?php foreach($emp['language'] as $language): ?>
                                    <td><?php echo e($language->language); ?></td>
                                    
                                    <td><?php echo e($language->understand); ?></td>
                                    
                                    <td><?php echo e($language->speak); ?></td>
                                    
                                    <td><?php echo e($language->reading); ?></td>
                                    <td><?php echo e($language->writing); ?></td>
                                   
                                   
                                    
                                  <?php endforeach; ?>
                                   <?php endif; ?>
                                  
                             <?php $lac = count($emp['language']); $ladif = $datas['lag'] - $lac; ?>
                             <?php if($ladif > 0): ?>
                              <?php for ($i=0; $i < $ladif; $i++) { ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                   
                                  <?php } ?>

                            

                            
                                <?php endif; ?>
                          <?php endif; ?>
                          <?php if(in_array('reference', $datas['jf'])): ?> 
                                <?php if(count($emp['reference']) > 0): ?>
                                  <?php foreach($emp['reference'] as $reference): ?>
                                    <td><?php echo e($reference->name); ?></td>
                                    
                                    <td><?php echo e($reference->designation); ?></td>
                                    
                                    <td><?php echo e($reference->address); ?></td>
                                    
                                    <td><?php echo e($reference->office_phone); ?></td>
                                    <td><?php echo e($reference->mobile); ?></td>
                                   
                                    <td><?php echo e($reference->email); ?></td>
                                    <td><?php echo e($reference->company); ?></td>
                                    
                                  <?php endforeach; ?>
                                    <?php endif; ?>
                                   
                             <?php $refc = count($emp['reference']); $refdif = $datas['ref'] - $refc; ?>
                             <?php if($refdif > 0): ?>
                              <?php for ($i=0; $i < $refdif; $i++) { ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  <?php } ?>

                           

                            
                                <?php endif; ?>
                          <?php endif; ?>
                      </tr>
                          <?php endforeach; ?>

                      <?php endif; ?>
                     
                      
                     </tbody>
                      

                    </table>

          </body>
</html>
