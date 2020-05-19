<!DOCTYPE html>
<html>
<head>
	<title>Welcome Staff</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/bootstrap/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/font-awesome.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/AdminLTE.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/beena.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/jquery-ui.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/introjs/introjs.css')); ?>">
</head>
<body style="background-color: #3e88ad;">
	<div class="text-center" data-step='1' data-intro='Welcome!'>
		<div style="background-color: #607d8b; width: 30%; margin: 0 auto; padding: 10px; border-radius: 50px;">
			<p style="color: white; font-size: 20px; font-family: monospace;">WELCOME! <?php echo e($staff->name); ?></p>
		</div>
	</div>
	<div class="container" style="padding-top: 30px;" data-step='2' data-intro='Your Profile Information'>
		<div class="box">
			<div class="row" style="display:flex">
				<div class="col-md-2 text-center">
					<img src="<?php echo e(asset('image/'.$image)); ?>" class="img-circle" style="border: 1px solid grey; width: 150px; height: 150px; object-fit: contain;">					
				</div>
				<div class="col-md-5">
					<h3><?php echo e($staff->name); ?></h3>
					<p><span><i class="fa fa-envelope"> <?php echo e($staff->email); ?></i></span></p>
					<p><span><i class="fa fa-building-o"> <?php echo e(\App\Department::getTitle($staff->department)); ?></i></span>&nbsp;&nbsp; <span><i class="fa fa-briefcase"><?php echo e(\App\Designation::getTitle($staff->designation)); ?></i></span></p>
					<p><span><i class="fa fa-phone"> <?php echo e($staff->phone); ?></i></span></p>
				</div>
				<div class="col-md-5">
					<h3></h3>
					<p><span><i class="fa fa-flag-checkered"> Reporting To: <?php echo e(\App\Adjustment_staff::getName($staff->supervisor)); ?></i></span></p>
					<p><span><i class="fa fa-calendar"> Join Date: <?php echo e(\Carbon\Carbon::parse($staff->joindate)->format('d M, Y')); ?></i></span></p>
					<p><span><i class="fa fa-calendar"> Probation End Date: <?php echo e(\Carbon\Carbon::parse($staff->probation_end_date)->format('d M, Y')); ?></i></span></p>
					<p><span><i class="fa fa-user">
						<?php if($staff->staffType==2): ?>
							Role: Staff
						<?php elseif($staff->staffType==1): ?>
							Role: Supervisor
						<?php elseif($staff->staffType): ?>
							Role: Branchadmin
						<?php else: ?>
						<?php endif; ?>
					</i></span></p>
					<p><span><i class="fa fa-clock-o">
						<?php if($staff->employmentType==1): ?>
							Type: Full Time
						<?php else: ?>
							Type: Part Time
						<?php endif; ?>
					</i></span></p>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="container" id="demo">
		<div class="row">
	  		<div class="col-xs-12" >
	  			<ul class="step-steps">
		            <li><a href="#step1">Step 1</a></li>
		            <li><a href="#step2">Step 2</a></li>
		            <li><a href="#step3">Step 3</a></li>
		        </ul>
		        <div class="step-content">
			    <div class="box" id="intro step1" class="step-tab-panel" >
			      	<div class="box-body" id="stepModule">
			      		<div class="box-title text-center">
				        	<img src="<?php echo e(asset('image/logo.png')); ?>">
				            <h3 style="color: #0184AE;">Welcome to Rolling Plans Pvt. Ltd.</h3>
				            <hr>
				        </div>
				        <div style="text-align: justify;">
					        <p>Rolling Plans Private Limited (RPPL) is an ISO 9001:2015 certified largest business process management (BPM) firm in Nepal specialized mainly on business process outsourcing and HR consulting firm having intensity of its services in business process management (BPM) service and institutional development since 2004.Rolling Plans is highly preferred by many organizations for various services to provide in the field of Staffing service and BPM Services. We are providing various outsourcing service to national and international clients including banks and financial institutions, international development agencies, non-government organizations, government and semi-government projects, universities and educational institutions, private and public limited companies. We have a sound track record of successful execution of our services.</p>
				      		<p>Apart from regular HR services, RPPL provides various employer branding service and also involved in Human resource development program through the various training programs to fresher as well as professionals. Rolling Plans Private Limited is also operating a successful contact center to provide customer service to its client.
				      		</p>	
				        </div>
			        </div>
			        <?php /* <div class="box-footer">
			        </div> */ ?>
			    </div>
			    <br>
			    <div class="box" id="profile step2" class="step-tab-panel">
			    	<div class="box-body">
				        <div class="box-title text-center">
				        	<div class="box-title text-center">
				                <h4>Complete Your Profile</h4>
				            </div>
				            <hr>
				            <form method="post" class="form-horizontal" id="profileForm" enctype="multipart/form-data">
				            	<?php echo csrf_field(); ?>

					            <div class="row">
					                <div class="box-title text-center" data-step='4' data-intro='Change Profile picture and password'>
						                <h4>Profile Picture</h4>
						            
						                <div class="form-group">
						                    <div class="col-md-4"></div>
						                    <div class="col-md-4">                      
						                            <img src="<?php echo e(asset('image/'.$image)); ?>" class="img-circle" style="border: 1px solid blue; width: 100px; height:100px; object-fit:contain;" id="blah"/>
						                            <br>
						                            <input type="file" name="image" id="imageUpload" style="display:none;" onchange="readURL(this);">
						                            <a id="btn_change" class="btn btn-primary"><i class="fa fa-upload"></i> Change Picture</a>
						                    </div>
						                    <div class="col-md-4"></div>
						                </div>
						                <div class="form-group">
						                    <label class="col-md-3 required">Email</label>
						                    <div class="col-md-7">
						                        <input class="form-control" name="email" value="<?php echo e($staff->email); ?>" type="email">
						                    </div>
						                </div>
						                <div class="form-group">
						                    <label class="col-md-3 required">Change Password</label>
						                    <div class="col-md-7">
						                        <input class="form-control" name="password" type="password">
						                    </div>
						                </div>
					                </div>
					                <hr>
					                <div class="box-title text-center" data-step='5' data-intro='fill up all Basic Information'>
						                <h4>Basic Information</h4>
							            <div id="basic"></div>
										<div class="form-group">
						                    <label class="col-md-3 required">Name </label>
						                    <div class="col-md-7">
						                        <input class="form-control" name="name" value="<?php echo e($staff->name); ?>" type="text">
						                    </div>
						                </div>
						                <div class="form-group">
						                    <label class="col-md-3 required">Father Name</label>
						                    <div class="col-md-7">
						                        <input class="form-control" name="f_name" value="<?php echo e($staff->f_name); ?>" type="text">
						                    </div>
						                </div>
						                <div class="form-group">
						                    <label class="col-md-3 required">Date Of Birth</label>
						                    <div class="col-md-7">
						                        <input class="form-control datepicker" name="dob" value="<?php echo e($staff->dob); ?>" type="text">
						                    </div>
						                </div>
						                <div class="form-group">
						                    <label class="col-md-3 required">Phone</label>
						                    <div class="col-md-7">
						                        <input class="form-control" name="phone" value="<?php echo e($staff->phone); ?>" type="text">
						                    </div>
						                </div>
						                <div class="form-group">
						                    <label class="col-md-3 required">Gender</label>
						                    <div class="col-md-7">
						                        <select name="gender" id="gender" class="form-control" id="gender">
						                            <option value="">Select Gender</option>
						                            <option value="Male" <?php if($staff->gender=='Male'): ?> selected <?php endif; ?>>Male</option>
						                            <option value="Female" <?php if($staff->gender=='Female'): ?> selected <?php endif; ?>>Female</option>
						                        </select>
						                    </div>
						                </div>
						                <div class="form-group">
						                    <label class="col-md-3 required">Maritial Status</label>
						                    <div class="col-md-7">
						                        <select name="marital_status" id="marital" class="form-control" id="maritial_status">
						                            <option value="">Select Marital Status</option>
						                            <option value="1" <?php if($staff->marital_status == 1): ?> selected <?php endif; ?>>Married</option>
						                            <option value="2" <?php if($staff->marital_status == 2): ?> selected <?php endif; ?>>UnMarried</option>
						                        </select>
						                    </div>
						                </div>
					                </div>

					                <hr>
					                <div class="box-title text-center" data-step='6' data-intro='fill up all Education Information'>
						                <h4>Education Information</h4>
							            <div id="educationError"></div>
						                <div class="form-group">
						                    <label class="col-md-3 required">Education Qualification</label>
						                    <div class="col-md-7">
						                        <select name="education_level" id="education_level" class="form-control">
						                            <option value="">select education</option>
						                            <?php foreach($e_levels as $level): ?>
						                            <option value="<?php echo e($level->id); ?>" <?php if($staff->education_level == $level->id): ?> selected <?php endif; ?>><?php echo e($level->name); ?></option>
						                            <?php endforeach; ?>
						                        </select>
						                    </div>
						                </div>
						                <div class="form-group">
						                    <label class="col-md-3 required">Faculty</label>
						                    <div class="col-md-7">
						                        <select name="faculty" id="faculty" class="form-control">
						                            <option value="">Select Faculty</option>
						                        </select>
						                    </div>
						                </div> 
						                <div class="form-group">
						                    <label class="col-md-3 required">Institute</label>
						                    <div class="col-md-7">
						                        <input type="text" name="institute" class="form-control" value="<?php echo e($staff->institute); ?>">
						                    </div>
						                </div> 
						                <div class="form-group">
						                    <label class="col-md-3 required">University</label>
						                    <div class="col-md-7">
						                        <input type="text" name="university" class="form-control" value="<?php echo e($staff->university); ?>">
						                    </div>
						                </div>
						                <div class="form-group">
						                    <label class="col-md-3 required">Completed ?</label>
						                    <div class="col-md-7">
						                        <input type="text" name="education_year" class="form-control" value="<?php echo e($staff->education_year); ?>">
						                    </div>
						                </div>
					                </div>

					                <hr>
					                <div class="box-title text-center" data-step='7' data-intro='fill up all General Information'>
						                <h4>General Information</h4>
							            <div id="general"></div>
						                <div class="form-group">
						                    <label class="col-md-3 required">District</label>
						                    <div class="col-md-7">
						                        <input type="text" name="district" class="form-control" value="<?php echo e($staff->district); ?>">
						                    </div>
						                </div>
						                <div class="form-group">
						                    <label class="col-md-3 required">Permanent Address</label>
						                    <div class="col-md-7">
						                        <input type="text" name="permanent_address" class="form-control" value="<?php echo e($staff->permanent_address); ?>">
						                    </div>
						                </div>
						                <div class="form-group">
						                    <label class="col-md-3 required">Temporary Address</label>
						                    <div class="col-md-7">
						                        <input type="text" name="temporary_address" class="form-control" value="<?php echo e($staff->temporary_address); ?>">
						                    </div>
						                </div>
						                <div class="form-group">
						                    <label class="col-md-3 required">Immediate Contact Person</label>
						                    <div class="col-md-7">
						                        <input class="form-control" name="contact_person" value="<?php echo e($staff->contact_person); ?>" type="text">
						                    </div>
						                </div>
						                <div class="form-group">
						                    <label class="col-md-3 required">Immediate Contact Person Number</label>
						                    <div class="col-md-7">
						                        <input class="form-control" name="contact_person_number" value="<?php echo e($staff->contact_person_number); ?>" type="text">
						                    </div>
						                </div>
						                <div class="form-group">
						                    <label class="col-md-3 required">Blood Group</label>
						                    <div class="col-md-7">
						                        <input class="form-control" name="blood_group" value="<?php echo e($staff->blood_group); ?>" type="text">
						                    </div>
						                </div>
						                <div class="form-group">
						                    <label class="col-md-3">Citizenship Number</label>
						                    <div class="col-md-7">
						                        <input class="form-control" name="citizenship_number" value="<?php echo e($staff->citizenship_number); ?>" type="text">
						                    </div>
						                </div>
					                </div>
					                <hr>
					                <div class="box-title text-center" data-step='8' data-intro='Upload resume/cv and citizenship/passport/licence'>
						                <h4>Documents</h4>
										<div class="form-group">
						                    <label class="col-md-3 required">Resume</label>
						                    <div class="col-md-5">
						                        <input class="form-control" name="resume" type="file">
						                    </div>
						                    <div class="col-md-2">
						                    	<?php if($staff->resume): ?>
						                    		<a href="<?php echo e(asset('image/'.$staff->resume)); ?>" target="_blabk" class="btn btn-info">DOWNLOAD</a>
						                    	<?php endif; ?>
						                    </div>
						                </div>
						                <div id="resumeError"></div>
						                <div class="form-group">
						                    <label class="col-md-3 required">ID photo</label>
						                    <div class="col-md-5">
						                        <input class="form-control" name="id_proof" type="file">
						                    </div>
						                    <div class="col-md-2">
						                    	<?php if($staff->id_proof): ?>
						                    		<a href="<?php echo e(asset('image/'.$staff->id_proof)); ?>" target="_blabk" class="btn btn-info">DOWNLOAD</a>
						                    	<?php endif; ?>
						                    </div>
						                </div>
						                <div id="id_proof_error"></div>
						            	</div>

					                <div class="form-group" data-step='9' data-intro='made all changesin profile the hit update button'>
					                    <label class="col-md-3"></label>
					                    <div class="col-md-7">
					                        <button type="submit" class="btn btn-info" id="submitProfileBtn">
					                        	UPDATE
					                        </button>
					                        <i id="loading" style="display:none;">
					                        	<img src="<?php echo e(asset('image/spinner.gif')); ?>" width="50px">
					                        </i>
					                    </div>
					                </div>
					            </div>
				            </form>
				        </div>
			    	</div>
			    </div>
			    </div>
			    <div class="step-footer">
            <button data-direction="prev">Previous</button>
            <button data-direction="next">Next</button>
            <button data-direction="finish">Finish</button>
        </div>
			    <br>
	    		<div class="box" id="team" data-step='10' data-intro='Team members of your department'>
		            <div class="box-title text-center">
		            	<h4>Team Member</h4>
		                <p><?php echo e(\App\Department::getTitle($staff->department)); ?></p>
		            </div>
		            <hr>
		            <div class="box-body">
		                <div class="row">
		                	<?php foreach($teams as $member): ?>
		                	<div class="col-md-3" style="flex:1">
			                	<div class="card text-center" style="padding: 5px; border: 1px solid grey; margin-top: 20px;">
			                	  <?php if($member->image): ?>
								  <img class="card-img-top" src="<?php echo e(asset('image/'.$member->image)); ?>" alt="Card image cap" style="width: 150px; height: 150px; object-fit: contain;">
								  <?php else: ?>
								  <img class="card-img-top" src="<?php echo e(asset('image/blank-image.png')); ?>" alt="Card image cap" style="width: 150px; height: 150px; object-fit: contain;">
								  <?php endif; ?>
								  <div class="card-body">
								    <h5 class="card-title"><?php echo e($member->name); ?></h5>
								    <p class="card-text"><?php echo e(\App\Designation::getTitle($member->designation)); ?></p>
								    <p class="card-text">since: <?php echo e(\Carbon\Carbon::parse($member->joindate)->diffForHumans()); ?></p>
								  </div>
								</div>
							</div>
		                	<?php endforeach; ?>
		                </div>
		            </div>
		            <div class="box-title text-center">
		            	<h4>Other Member</h4>
		                <p><?php echo e(\App\Branch::gettitle($staff->branch)); ?></p>
		            </div>
		            <hr>
		            <div class="box-body">
		                <div class="row">
		                	<?php foreach($others as $member): ?>
		                	<div class="col-md-3" style="flex:1">
			                	<div class="card text-center" style="padding: 5px; border: 1px solid grey; margin-top: 20px;">
			                	  <?php if($member->image): ?>
								  <img class="card-img-top" src="<?php echo e(asset('image/'.$member->image)); ?>" alt="Card image cap" style="width: 150px; height: 150px; object-fit: contain;">
								  <?php else: ?>
								  <img class="card-img-top" src="<?php echo e(asset('image/blank-image.png')); ?>" alt="Card image cap" style="width: 150px; height: 150px; object-fit: contain;">
								  <?php endif; ?>
								  <div class="card-body">
								    <h5 class="card-title"><?php echo e($member->name); ?></h5>
								    <p class="card-text"><?php echo e(\App\Designation::getTitle($member->designation)); ?></p>
								    <p class="card-text">since: <?php echo e(\Carbon\Carbon::parse($member->joindate)->diffForHumans()); ?></p>
								  </div>
								</div>
							</div>
		                	<?php endforeach; ?>
		                </div>
		            </div>
		        </div>
		        <br>
		        <div class="box" id="companyStat" style="background-color: #e5e6e6">
		        	<div class="box-title text-center">
		            	<h4>Company Statistics</h4>
		            </div>
		            <hr>
		            <div class="box-body">
		            	<div class="col-md-4">
				          <div class="box box-primary">
				            <div class="box-header with-border">
				              <h3 class="box-title"><i class="fa fa-connectdevelop"></i> Organization</h3>
				            </div>
				            <ul class="attendancelist">
				              <li>Branch : <span class="blueclr bold"><?php echo e($data['branches']); ?></span></li>
				              <li>Department : <span class="blueclr bold"><?php echo e($data['departments']); ?></span></li>
				              <li>Total Staffs : <span class="blueclr bold"><?php echo e($data['total_staff']); ?></span></li>
				            </ul>
				          </div>
				        </div>
				        <div class="col-md-8">
					      <div class="comnbg">
					        <div class="title_bg all5p">Staff Status <i class="fa fa-bar-chart-o orangeclr"></i></div>
					        <div class="row cm10-row">
					          <div class="col-lg-3 col-xs-6">
					            <div class="common_block">
					              <div class="box-header with-border bold">Working Status</div>
					                <div class="listpadding">
					                  <span>
					                    <icon class="fa  fa-check-square-o greenclr"></icon>
					                    <a href="#"> Working: <span class="bold"><?php echo e($data['currently_working']); ?></span></a>
					                  </span>
					                </div>
					                <div class="listpadding">
					                  <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#">Resigned: <span class="bold"><?php echo e($data['resigned']); ?></span></a></span>
					                </div>
					                <div class="listpadding">
					                  <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#">Absconding: <span class="bold"><?php echo e($data['absconding']); ?></span></a></span>
					                </div>
					                <div class="listpadding">
					                  <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#">Terminated: <span class="bold"><?php echo e($data['terminated']); ?></span></a></span>
					                </div>
					            </div>
					          </div>  
					          <div class="col-lg-3 col-xs-6">
					            <div class="common_block">
					              <div class="box-header with-border bold">Duty Status</div>
					              <div class="listpadding">
					                <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#" data-toggle="modal" data-target="#modal-on_duty">Onduty: <span class="bold"><?php echo e(($data['duty_staff'])); ?></span></a></span>
					              </div>
					              <div class="listpadding">
					                <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#" data-toggle="modal" data-target="#modal-online">Online: <span class="bold"><?php echo e(($data['active_staff'])); ?></span></a></span>
					              </div>
					              <div class="listpadding">
					                <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#" data-toggle="modal" data-target="#modal-absent">Abscent: <span class="bold"><?php echo e(($data['absent_staff'])); ?></span></a></span>
					              </div>
					              <div class="listpadding">
					                <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#" data-toggle="modal" data-target="#modal-leave">Leave: <span class="bold"><?php echo e(($data['today_leave'])); ?></span></a></span>
					              </div>
					            </div>
					          </div>  
					          <div class="col-lg-3 col-xs-6">
					            <div class="common_block">
					              <div class="box-header with-border bold">Contract Status</div>
					              <div class="listpadding">
					                <span><icon class="fa  fa-check-square-o greenclr"></icon><a href="#"> Full time: <span class="bold"><?php echo e($data['staff_workmode']['full_time']); ?></span></a></span>
					              </div>
					              <div class="listpadding">
					                <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#">Part time: <span class="bold"><?php echo e($data['staff_workmode']['part_time']); ?></span></a></span>
					              </div>
					              <div class="listpadding">
					                <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#">Probation: <span class="bold"><?php echo e($data['staff_workmode']['probation']); ?></span></a></span>
					              </div>
					              <div class="listpadding">
					                <span><icon class="fa  fa-check-square-o greenclr"></icon> <a href="#">Internship: <span class="bold"><?php echo e($data['staff_workmode']['intern']); ?></span></a></span>
					              </div>
					            </div>
					          </div>
					          <div class="col-lg-3 col-xs-6">
					            <div class="common_block">
					              <div class="box-header with-border bold">Branches</div>
					              <?php foreach($data['bstaffs'] as $bs): ?>
					              <div class="listpadding">
					                <span><icon class="fa  fa-check-square-o greenclr"></icon><a href="#"> <?php echo e($bs->name); ?>: <span class="bold"><?php echo e($bs->staffs); ?></span></a></span>
					              </div>
					              <?php endforeach; ?>
					            </div>
					          </div>
					        </div>
					      </div>
					    </div>
					    <br>	
					    <div class="col-md-12">
					    	<div class="comnbg tp10m">
							  <div class="title_bg all5p">HR Updates <i class="fa fa-black-tie blueclr"></i></div>
							  <div class="row cm10-row tp10m">
							    <div class="col-lg-2 col-xs-6">
							      <div class="chart" id="male-female" style="height: 150px;" ></div>
							    </div>
							    <div class="col-lg-2 col-xs-6">
							      <div class="chart" id="married" style="height: 150px;" ></div>
							    </div>
							    <?php if(count($data['age']) > 0): ?>
							      <div class="col-lg-2 col-xs-12">
							        <div class="box box-info">
							          <div class="box-header with-border">
							            <h3 class="box-title">Age Diagram</h3>
							          </div>
							          <div class="box-body chart-responsive" style="padding:0px;">
							            <canvas id="pieChart" style="height:150px"></canvas>
							          </div>
							          <!-- /.box-body -->
							        </div>
							      </div>
							    <?php endif; ?> 
								<div class="col-lg-2 col-xs-12">
								 <div class="chart" id="district" style="height: 150px;" ></div>
								</div>
								<div class="col-lg-2 col-xs-12">
								  <div class="box box-info">
								    <div class="box-header with-border">
								      <h3 class="box-title">Employment Status</h3>
								    </div>
								    <div class="box-body chart-responsive" style="padding:0px;">
								      <div class="chart" id="employmentStatus" style="height: 150px;"></div>
								    </div>
								    <!-- /.box-body -->
								  </div>
								</div>
								<div class="col-lg-2 col-xs-12">
								</div>
							  </div> 
							</div>
					    </div>
		            </div>
		        </div>
		        <br>
		        <div class="box" id="privacy">
		        	<div class="box-title text-center">
		            	<h4>Company Document</h4>
		            </div>
		            <hr>
		        	<div class="box-body">
		        		<div class="col-md-8 col-md-offset-2" data-step='11' data-intro='You need to read all the document'>
		        			<h4 class="text-center">
		        				Please read all the documents listed below.
		        			</h4>
		        			<ul class="list-group">
			        			<?php foreach($documents as $document): ?>
			        			<li class="list-group-item">
			        				<a href="<?php echo e(asset('image/'.$document->document)); ?>"><?php echo e($document->title); ?></a></li>
			        			<?php endforeach; ?>
			        		</ul>	
		        		</div>
			        	<div class="clearfix"></div>
		        		<form action="#" method="post" data-step='12' data-intro='complete reading all document?'>
		        			<?php echo csrf_field(); ?>

		        			<div class="form-group text-center">
		        				<input type="checkbox" id="privacy" name="privacy" value="1" <?php if($staff->agrement==1): ?> checked <?php endif; ?>> I have read and agree to the <a href="#" class="blueclr" target="_blank">Privacy Policy</a>. Our <a href="#" class="blueclr" target="_blank">Terms & Condition</a> apply.
		        			</div>
		        		</form>
		        	</div>
		        </div>
		        <br>
		        <div class="text-center" id="finish" data-step='13' data-intro='Finish exploration?'>
		        	<button class="btn btn-warning" type="button" id="finishOnBoard">FINISH</button>
		        </div>
		        <br><br>
	      	</div>
	    </div>
  	</div>
</body>
<script src="<?php echo e(asset('assets/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/dist/js/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('assets/introjs/intro.js')); ?>"></script>
<script>
	$('.datepicker').datepicker();
	var token = $('input[name=\'_token\']').val();
	// script for education 
	$('#education_level').change(function(){
		var data = $(this).val();
		if (data != '') {
            facultySection(data)
        } else{
            $('#faculty').html('<option value="">Select Faculty</option>');
        }
	})
	var edu = $('#education_level').val();
	if(edu != ''){
		facultySection(edu);
	}
	function facultySection(data){
		var faculty = '<?php echo e($staff->faculty); ?>';
		$('#faculty').html('<option value="">Select Faculty</option>');
		$.ajax({
		        type: 'POST',
		        url: '<?php echo e(url("/staffs/getfaculty")); ?>',
		        data: 'id='+data+'&_token='+token,
		        cache: false,
	            success: function(data){
	            	$.each(data, function(index, value){
	            		
						if(value.id == faculty){
							$('#faculty')
		         			.append($("<option selected></option>")
		                    .attr("value",value.id)
		                    .text(value.name))
						}else{
							$('#faculty')
		         			.append($("<option></option>")
		                    .attr("value",value.id)
		                    .text(value.name)) 
						}
	            	})
	            },
	            error: function(error){
	            	console.log(error)
	            }
	    });
	}

	// change image query
	$('#btn_change').click(function(){
		$('#imageUpload').trigger('click');
	})
	function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
            $('#blah').css({
            	width: '100px',
            	height: '100px',
            	'object-fit': 'contain'
            })
        };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
        $('#profileForm').submit(function(event){
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "<?php echo e(route('staffs.welcome.updateProfile')); ?>",
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                success:function(data){
                	console.log(data)
                	var url = '<?php echo e(asset("image/tick.gif")); ?>'
                	var html = '<img src="'+url+'" width="50px" />'
                	$('#loading').html(html)
                },
                error: function(error)
                {
                    var general = '';
                    var basic = '';
                    var educationError = '';
                    var resumeError = '';
                    var id_proof_error = '';
                    $.each(error.responseJSON, function(index, value){
                    	if(index=='blood_group' || index=='district' || index=='permanent_address' || index=='temporary_address' || index=='contact_person' || index=='contact_person_number'){
                    		general += '<p class="text-danger">'+value+'</p>'
                    	}
                    	if(index=='name' || index=='f_name' || index=='dob' || index=='email' || index=='phone' || index=='gender' || index == 'martial_status'){
                    		basic += '<p class="text-danger">'+value+'</p>'
                    	}
                    	if(index=='education_level' || index=='faculty' || index=='institute' || index=='university'){
                    		educationError += '<p class="text-danger">'+value+'</p>'
                    	}
                    	if(index=='resume'){
                    		resumeError += '<p class="text-danger">'+value+'</p>'
                    	}
                    	if(index=='id_proof'){
                    		id_proof_error += '<p class="text-danger">'+value+'</p>'
                    	}
                    })
                    $('#general').html(general)
                    $('#basic').html(basic)
                    $('#educationError').html(educationError)
                    $('#loading').hide()
                },
                beforeSend: function(){
                	$('#loading').show()
                }
            });
        })
</script>
<script>
	$(document).ready(function(){
	    $('#finish').hide();
		var token = $('input[name=\'_token\']').val();
		var ck = '<?php echo e($staff->agrement); ?>';
		if(ck==1){
			$('#finish').show();
		}
        $('input[name="privacy"]').click(function(){
            if($(this).prop("checked") == true){
                privacyCheckOption(1);
                $('#finish').show();
            }
            else if($(this).prop("checked") == false){
                privacyCheckOption(2);
                $('#finish').hide();
            }
        });
        function privacyCheckOption(num)
        {
        	$.ajax({
		        type: 'POST',
		        url: '<?php echo e(route("staffs.welcome.updatePrivacy")); ?>',
		        data: 'num='+num+'&_token='+token,
		        cache: false,
	            success: function(data){
	            	console.log(data)
	            },
	            error: function(error){
	            	console.log(error)
	            }
	    	});
        }
    });
	var token = $('input[name=\'_token\']').val();
    $('#finishOnBoard').click(function(){
    	var num = 1;
    	$.ajax({
	        type: 'POST',
	        url: '<?php echo e(route("staffs.welcome.finishOnBoard")); ?>',
	        data: 'num='+num+'&_token='+token,
	        cache: false,
            success: function(data){
            	console.log(data)
            	var url = '<?php echo e(url('staffs')); ?>';
            	location = url;
            },
            error: function(error){
            	console.log(error)
            }
    	});
    })
</script>

<link rel="stylesheet" href="<?php echo e(asset('/assets/moris/morris.css')); ?>">
<script src="<?php echo e(asset('/assets/moris/raphael-min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/moris/morris.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/chart.js/Chart.js')); ?>"></script>
<script type="text/javascript">
  $(function(){
    var fullTime = '<?php echo e($data["full_time_employee"]); ?>';
    var partTime = '<?php echo e($data["part_time_employee"]); ?>';
    Morris.Donut({
      element: 'employmentStatus',
      data: [
        {label: "Full Time", value: fullTime},
        {label: "Part Time", value: partTime},
      ]
    });  

  var bar = new Morris.Bar({
      element: 'male-female',
      resize: true,
      data: [
        {y: 'Male/Female', a: '<?php echo e($data["total_male"]); ?>', b: '<?php echo e($data["total_female"]); ?>'},
        
        
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Male', 'Female'],
      hideHover: 'auto'
    });

    var bar = new Morris.Bar({
      element: 'married',
      resize: true,
      data: [
        {y: 'Married/Unmarried', a: '<?php echo e($data["total_married"]); ?>', b: '<?php echo e($data["total_unmarried"]); ?>'},
        
        
      ],
      barColors: ['#00c0ef', '#f39c12'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Married', 'Unmarried'],
      hideHover: 'auto'
    });
    
    <?php if(count($data['district']) > 0): ?>
    
      var bar = new Morris.Bar({
      element: 'district',
      resize: true,
      data: [
         <?php foreach($data["district"] as $district): ?>
        {y: '<?php echo e($district["title"]); ?>', a: '<?php echo e($district["total"]); ?>'},
        <?php endforeach; ?>
        
      ],
      barColors: ['#00c0ef'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Total Staff'],
      hideHover: 'auto'
    });
    <?php endif; ?>
     
    <?php if(count($data['age']) > 0): ?>
  	var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
    <?php foreach($data['age'] as $age): ?>
      {
        value    : '<?php echo e($age["total"]); ?>',
        color    : '<?php echo e($age["color"]); ?>',
        highlight: '<?php echo e($age["color"]); ?>',
        label    : '<?php echo e($age["title"]); ?>'
      },
      
     <?php endforeach; ?>
    ]
    <?php endif; ?>
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

  });
</script>
<link rel="stylesheet" href="<?php echo e(asset('/assets/steps/dist/jquery-steps.css')); ?>">
<script src="<?php echo e(asset('/assets/steps/dist/jquery-steps.js')); ?>"></script>
<script>
    $('#demo').steps({
        onFinish: function () { alert('Wizard Completed'); }
    });
</script>
</html>