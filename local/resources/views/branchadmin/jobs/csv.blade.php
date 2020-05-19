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
                        @if(in_array('saluation', $datas['jf']))
                        <td>Salutation</td>
                        @endif
                         <td>First Name</td>
                         <td>Middle Name</td>
                         <td>Last Name</td>
                         <td>E-mail</td>
                          @if(in_array('citizenship', $datas['jf']))
                          <td>Citizenship No</td>
                          @endif
                         @if(in_array('gender', $datas['jf']))
                          <td>Gender</td>
                          @endif
                          @if(in_array('dob', $datas['jf'])) 
                          <td>Date of Birth</td>
                          @endif
                          <td>Age</td>
                          <td>Total Experience</td>
                          @if(in_array('marital_status', $datas['jf'])) 
                          <td>Marital Status</td>
                          @endif
                          @if(in_array('nationality', $datas['jf'])) 
                          <td>Nationality</td>
                          @endif
                          @if(in_array('permanent_address', $datas['jf']))
                          <td>Permanent Address</td>
                          @endif
                          @if(in_array('temporary_address', $datas['jf'])) 
                          <td>Temporary Address</td>
                          @endif
                          @if(in_array('home_phone', $datas['jf']))
                          <td>Home Phone</td>
                          @endif
                          @if(in_array('mobile_phone', $datas['jf'])) 
                          <td>Mobile Phone</td>
                          @endif
                          @if(in_array('fax', $datas['jf']))
                          <td>Fax</td>
                          @endif
                          @if(in_array('website', $datas['jf'])) 
                          <td>Website</td>
                          @endif
                          @if(in_array('license_of', $datas['jf'])) 
                          <td>License of</td>
                          @endif
                           @if(in_array('location', $datas['jf'])) 
                          <td>District</td>
                          <td>Muncipality</td>
                          <td>Ward</td>
                          @endif
                          @if(in_array('pp_photo', $datas['jf'])) 
                          <td>PP Photo</td>
                          @endif
                          @if(in_array('resume', $datas['jf'])) 
                          <td>Resume</td>
                          @endif
                          @if(in_array('cover_letter', $datas['jf'])) 
                          <td>Cover Letter</td>
                          @endif
                          @if($datas['job']->edu_marks != '')
                          <td>Education Marks ({{$datas['job']->edu_marks}})</td>
                          @endif
                          @if($datas['job']->exp_marks != '')
                          <td>Experience Marks ({{$datas['job']->exp_marks}})</td>
                          @endif
                          @if(count($datas['f_file_total']) > 0)
                            @foreach($datas['f_file_total'] as $ffile)
                                <td>{{$ffile['f_title']}}</td>
                            @endforeach
                          @endif
                          @if(count($datas['fdt']) > 0)
                            @foreach($datas['fdt'] as $fd)
                              <td>{{$fd['f_title']}}</td>
                              <td>Marks ({{$fd['marks']}})</td>

                              @if(count($fd['children']) > 0)

                              @foreach($fd['children'] as $fchild)
                                <td>{{$fchild['f_title']}}</td>
                                <td>Marks ({{$fchild['marks']}})</td>
                                  @if(count($fchild['children']) > 0)

                                  @foreach($fchild['children'] as $schild)
                                    <td>{{$schild['f_title']}}</td>
                                    <td>Marks ({{$schild['marks']}})</td>

                                    @if(count($schild['children']) > 0)

                                    @foreach($schild['children'] as $tchild)
                                      <td>{{$tchild['f_title']}}</td>
                                      <td>Marks ({{$tchild['marks']}})</td>

                                     
                                    @endforeach

                                    @endif
                                  @endforeach

                                  @endif

                              @endforeach

                              @endif
                              
                            @endforeach
                          @endif
                          @if($datas['total'] != '')
                          <td>Total Marks ({{$datas['total']}})</td>
                          @endif
                          @if(in_array('education', $datas['jf'])) 
                          @if($datas['edu'] > 0)
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
                          @endif
                          @endif
                          @if(in_array('training', $datas['jf']))
                                @if($datas['tra'] > 0)
                                  <?php for ($i=0; $i < $datas['tra']; $i++) { ?>
                                    <td>Title</td>
                                    <td>Details</td>
                                    <td>Institution</td>
                                    <td>Duration</td>
                                    <td>Year</td>
                                  <?php } ?>
                                @endif
                          @endif
                          @if(in_array('experience', $datas['jf']))
                                @if($datas['exp'] > 0)
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
                                @endif
                          @endif
                          @if(in_array('language', $datas['jf'])) 
                                @if($datas['lag'] > 0)
                                  <?php for ($i=0; $i < $datas['lag']; $i++) { ?>
                                    <td>Language</td>
                                    <td>Understand</td>
                                    <td>Speak</td>
                                    <td>Reading</td>
                                    <td>Writing</td>
                                  
                                    
                                  <?php } ?>
                                @endif
                          @endif
                          @if(in_array('reference', $datas['jf']))
                                @if($datas['ref'] > 0)
                                  <?php for ($i=0; $i < $datas['ref']; $i++) { ?>
                                    <td>Name</td>
                                    <td>Designation</td>
                                    <td>Address</td>
                                    <td>Office Phone</td>
                                    <td>Mobile</td>
                                    <td>Email</td>
                                    <td>Organization</td>
                                    
                                  <?php } ?>
                                @endif
                          @endif
                      </tr>
                    </thead>

                    <tbody>
                      @if(count($datas['employees']) > 0)
                          @foreach($datas['employees'] as $emp)
                            <tr>
                        <td>{{$emp['id']}}</td>
                        @if(in_array('saluation', $datas['jf']))
                        <td>{{$emp['saluation']}}</td>
                        @endif
                         <td>{{$emp['firstname']}}</td>
                         <td>{{$emp['middlename']}}</td>
                         <td>{{$emp['lastname']}}</td>
                         <td>{{$emp['email']}}</td>
                          @if(in_array('citizenship', $datas['jf'])) 
                          <td>{{$emp['citizenship']}}</td>
                          @endif
                         @if(in_array('gender', $datas['jf'])) 
                          <td>{{$emp['gender']}}</td>
                          @endif
                          @if(in_array('dob', $datas['jf'])) 
                          <td>{{$emp['dob']}}</td>
                          @endif
                          <td>{{$emp['age']}}</td>
                          <td>{{$emp['total_experience']}}</td>
                          @if(in_array('marital_status', $datas['jf'])) 
                          <td>{{$emp['marital_status']}}</td>
                          @endif
                          @if(in_array('nationality', $datas['jf'])) 
                          <td>{{$emp['nationality']}}</td>
                          @endif
                          @if(in_array('permanent_address', $datas['jf'])) 
                          <td>{{$emp['permanent_address']}}</td>
                          @endif
                          @if(in_array('temporary_address', $datas['jf'])) 
                          <td>{{$emp['temporary_address']}}</td>
                          @endif
                          @if(in_array('home_phone', $datas['jf'])) 
                          <td>{{$emp['home_phone']}}</td>
                          @endif
                          @if(in_array('mobile_phone', $datas['jf'])) 
                          <td>{{$emp['mobile']}}</td>
                          @endif
                          @if(in_array('fax', $datas['jf'])) 
                          <td>{{$emp['fax']}}</td>
                          @endif
                          @if(in_array('website', $datas['jf'])) 
                          <td>{{$emp['website']}}</td>
                          @endif
                          @if(in_array('license_of', $datas['jf'])) 
                          <td>{{$emp['license_of']}}</td>
                          @endif
                          @if(in_array('location', $datas['jf'])) 
                          <td>{{$emp['district']}}</td>
                          <td>{{$emp['municipality']}}</td>
                          <td>{{$emp['ward']}}</td>
                          @endif
                          @if(in_array('pp_photo', $datas['jf'])) 
                          <td>{{asset('/image/'.$emp['image'])}}</td>
                          @endif
                          @if(in_array('resume', $datas['jf'])) 
                          <td>{{asset('/image/'.$emp['resume'])}}</td>
                          @endif
                          @if(in_array('cover_letter', $datas['jf'])) 
                          <td>{{asset('/image/'.$emp['coverletter'])}}</td>
                          @endif
                           @if($datas['job']->edu_marks != '')
                          <td>{{$emp['edu_marks']}}</td>
                          @endif
                          @if($datas['job']->exp_marks != '')
                          <td>{{$emp['exp_marks']}}</td>
                          @endif
                           @if(count($emp['exfile']) > 0)
                            @foreach($emp['exfile'] as $exfile)
                                <td>{{asset('/image/'.$exfile->f_description)}}</td>
                            @endforeach
                            @endif
                             <?php $exf = count($emp['exfile']); $exdif = count($datas['f_file_total']) - $exf; 
                               
                             ?>
                           
                             @if($exdif > 0)
                              <?php for ($i=0; $i < $exdif; $i++) { ?>
                                    <td></td>
                                  
                                  <?php } ?>

                            
                            

                          @endif
                          
                           @if(count($datas['fdt']) > 0)
                            @foreach($datas['fdt'] as $fd)
                              <td>{{\App\FormData::getValue($datas['job']->id,$emp['id'],$fd['f_title'])}}</td>
                              <td>Marks ({{\App\FormData::getMark($datas['job']->id,$emp['id'],$fd['f_title'])}})</td>

                              @if(count($fd['children']) > 0)

                              @foreach($fd['children'] as $fchild)
                                <td>{{\App\FormData::getValue($datas['job']->id,$emp['id'],$fchild['f_title'])}}</td>
                              <td>Marks ({{\App\FormData::getMark($datas['job']->id,$emp['id'],$fchild['f_title'])}})</td>
                                  @if(count($fchild['children']) > 0)

                                  @foreach($fchild['children'] as $schild)
                                    <td>{{\App\FormData::getValue($datas['job']->id,$emp['id'],$schild['f_title'])}}</td>
                              <td>Marks ({{\App\FormData::getMark($datas['job']->id,$emp['id'],$schild['f_title'])}})</td>

                                    @if(count($schild['children']) > 0)

                                    @foreach($schild['children'] as $tchild)
                                     <td>{{\App\FormData::getValue($datas['job']->id,$emp['id'],$tchild['f_title'])}}</td>
                              <td>Marks ({{\App\FormData::getMark($datas['job']->id,$emp['id'],$tchild['f_title'])}})</td>

                                     
                                    @endforeach

                                    @endif
                                  @endforeach

                                  @endif

                              @endforeach

                              @endif
                              
                            @endforeach
                          @endif
                           @if($datas['total'] != '')
                          <td>{{$emp['total_marks']}}</td>
                          @endif

                          @if(in_array('education', $datas['jf'])) 
                          @if(count($emp['education']) > 0)
                            @foreach($emp['education'] as $edu)
                              <td>{{$edu->country}}</td>
                              <td>{{\App\Faculty::getLevelTitle($edu->level_id)}}</td>
                              <td>{{\App\Faculty::getTitle($edu->faculty_id)}}</td>
                             <td>{{$edu->status}}</td>
                              <td>{{$edu->institution}}</td>
                              <td>{{$edu->board}}</td>
                              <td>{{$edu->percentage}}</td>
                              <td>{{$edu->marksystem}}</td>
                              <td>{{$edu->year}}</td>
                            @endforeach
                             @endif

                            
                             <?php $edc = count($emp['education']); $edif = $datas['edu'] - $edc; ?>
                             @if($edif > 0)
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

                            
                            

                          @endif
                          @endif
                          @if(in_array('training', $datas['jf'])) 
                                @if(count($emp['training']) > 0)
                                  @foreach($emp['training'] as $training)
                                    <td>{{$training->title}}</td>
                                    
                                    <td>{{$training->details}}</td>
                                    <td>{{$training->institution}}</td>
                                    <td>{{$training->duration}}</td>
                                    
                                    <td>{{$training->year}}</td>
                                  @endforeach
                                   @endif
                                   
                             <?php $trc = count($emp['training']); $tdif = $datas['tra'] - $trc; ?>
                             @if($tdif > 0)
                              <?php for ($i=0; $i < $tdif; $i++) { ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  <?php } ?>

                            

                            
                                @endif
                          @endif
                          @if(in_array('experience', $datas['jf'])) 
                                @if(count($emp['experience']) > 0)
                                  @foreach($emp['experience'] as $experience)
                                    <td>{{$experience->organization}}</td>
                                    
                                    <td>{{$experience->typeofemployment}}</td>
                                    <td>{{\App\OrganizationType::getOrgTypeTitle($experience->org_type_id)}}</td>
                                    <td>{{$experience->designation}}</td>
                                    
                                    <td>{{$experience->level}}</td>
                                    <td>{{$experience->from}}</td>
                                    <td>{{$experience->to}}</td>
                                    <td>{{$experience->currently_working == 1 ? 'Currently Working' : 'Not Working'}}</td>
                                    <td>{{$experience->country}}</td>
                                     <td>{{$experience->duties}}</td>
                                    <td>{{$experience->experience}}</td>
                                  @endforeach
                                  @endif
                                   
                             <?php $expc = count($emp['experience']); $exdif = $datas['exp'] - $expc; ?>
                             @if($exdif > 0)
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

                             

                            

                                @endif
                          @endif
                          @if(in_array('language', $datas['jf'])) 
                                @if(count($emp['language']) > 0)
                                  @foreach($emp['language'] as $language)
                                    <td>{{$language->language}}</td>
                                    
                                    <td>{{$language->understand}}</td>
                                    
                                    <td>{{$language->speak}}</td>
                                    
                                    <td>{{$language->reading}}</td>
                                    <td>{{$language->writing}}</td>
                                   
                                   
                                    
                                  @endforeach
                                   @endif
                                  
                             <?php $lac = count($emp['language']); $ladif = $datas['lag'] - $lac; ?>
                             @if($ladif > 0)
                              <?php for ($i=0; $i < $ladif; $i++) { ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                   
                                  <?php } ?>

                            

                            
                                @endif
                          @endif
                          @if(in_array('reference', $datas['jf'])) 
                                @if(count($emp['reference']) > 0)
                                  @foreach($emp['reference'] as $reference)
                                    <td>{{$reference->name}}</td>
                                    
                                    <td>{{$reference->designation}}</td>
                                    
                                    <td>{{$reference->address}}</td>
                                    
                                    <td>{{$reference->office_phone}}</td>
                                    <td>{{$reference->mobile}}</td>
                                   
                                    <td>{{$reference->email}}</td>
                                    <td>{{$reference->company}}</td>
                                    
                                  @endforeach
                                    @endif
                                   
                             <?php $refc = count($emp['reference']); $refdif = $datas['ref'] - $refc; ?>
                             @if($refdif > 0)
                              <?php for ($i=0; $i < $refdif; $i++) { ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  <?php } ?>

                           

                            
                                @endif
                          @endif
                      </tr>
                          @endforeach

                      @endif
                     
                      
                     </tbody>
                      

                    </table>

          </body>
</html>
