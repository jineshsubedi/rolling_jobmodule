<style>

.right-side .mt-5 {
  margin-top: 10px !important;
}

.right-side .box1, .right-side .box2, .right-side .box3, .right-side .box4 {
  background: #fff;
  height: 183px;
  border-radius: 10px;
  -webkit-box-shadow: -2px 2px 8px #868484;
          box-shadow: -2px 2px 8px #868484;
  -webkit-transition: -webkit-transform 0.8s;
  transition: -webkit-transform 0.8s;
  transition: transform 0.8s;
  transition: transform 0.8s, -webkit-transform 0.8s;
}

.right-side .box1 .info-box, .right-side .box2 .info-box, .right-side .box3 .info-box, .right-side .box4 .info-box {
  display: none;
  color:black;
  -webkit-transform: rotateY(180deg);
          transform: rotateY(180deg);
}

.right-side .box1:hover, .right-side .box2:hover, .right-side .box3:hover, .right-side .box4:hover {
  -webkit-transform: rotateY(180deg);
          transform: rotateY(180deg);
}

.right-side .box1:hover .box-inner, .right-side .box2:hover .box-inner, .right-side .box3:hover .box-inner, .right-side .box4:hover .box-inner {
  display: none;
}

.right-side .box1:hover .info-box, .right-side .box2:hover .info-box, .right-side .box3:hover .info-box, .right-side .box4:hover .info-box {
  display: block;
  padding: 10px;
  font-size: 10px;
}

.right-side .box1 img, .right-side .box2 img, .right-side .box3 img, .right-side .box4 img {
  width: 50%;
  margin: auto;
  display: inherit;
  padding-top: 12px;
  -o-object-fit: contain;
     object-fit: contain;
}

.right-side .box1 .des, .right-side .box2 .des, .right-side .box3 .des, .right-side .box4 .des {
  text-align: center;
  font-weight: 600;
  font-size: 10px;
  margin: 4px 4px;
}

@media  screen and (max-width: 1200px) {
  .right-side {
    padding-top: 20px;
  }
  .box1 .info-box,.box2 .info-box,.box3 .info-box,.box4 .info-box{
      font-size: 9px !important;
  }
}

@media  screen and (min-width: 600px) and (max-width: 780px) {
  .box1, .box2, .box3, .box4 {
    margin-top: 10px;
    height: 280px !important;
  }
  .box1 .info-box,.box2 .info-box,.box3 .info-box,.box4 .info-box{
      font-size: 18px !important;
  }
  .box1 .des, .box2 .des, .box3 .des, .box4 .des {
    font-size: 18px !important;
  }
  .mt-5 {
    margin-top: 0 !important;
  }
}

@media  screen and (max-width: 420px) {
  .box3, .box4 {
    margin-top: 10px;
  }
  .box1 .info-box,.box2 .info-box,.box3 .info-box,.box4 .info-box{
      font-size: 10px !important;
  }
  .mt-5 {
    margin-top: 0;
  }
}
</style>
<?php $__env->startSection('content'); ?>
<section class="main_wrap tb50p">
    <div class="container">
        <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
        <?php endif; ?>
        <div class="row cm10-row">
            <div class="col-md-12 col-lg-4">
                <div class="common_div loginform">
                    <h1 class="h1 text-center">Member Login</h1>
                    <div class="border"></div>
                    <form class="tp20m" method="POST" action="<?php echo e(url('/staffs/login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="inputUsername" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input id="email" type="email"
                                    class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email"
                                    value="<?php echo e(old('email')); ?>" placeholder="email@domain.com" required autofocus>

                                <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input id="password" type="password" placeholder="password"
                                    class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                    name="password" required>

                                <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="autoSizingCheck2"
                                        name="remember" value="1">
                                    <label class="form-check-label rememberme" for="autoSizingCheck2">
                                        Remember me
                                    </label>
                                </div>
                                <div class="tp10m">
                                    <div class="row">
                                        <div class="col-md-4"><button class="btn loginbtn">Login</button></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="noticeboard">
                    <div class="noticesection" style="font-size:13px;">
                        <p>
                            <blockquote> Rolling Access is a centralized Board incorporating Human Resource Information
                                System,
                                payroll management, digitalization of forms & surveys and a common information platform
                                for
                                all RPPL team members. </blockquote>
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-7 offset-lg-1 right-side">
                <div class="row ">
                    <div class="col-6 col-md-6 col-lg-3 ">
                        <div class="box1">
                            <div class="box-inner">
                                <img src="<?php echo e(asset('image/login/icon1.png')); ?>" class="img-fluid">
                                <div class="des">
                                    Centralised database of Rolling team Members
                                </div>
                            </div>
                            <div class="info-box">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, amet. consectetur
                                adipisicing
                                elit. Maiores, amet.consectetur adipisicing elit. Maiores, amet.
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 ">
                        <div class="box2">
                            <div class="box-inner">
                                <img src="<?php echo e(asset('image/login/icon2.png')); ?>" class="img-fluid">
                                <div class="des">
                                    Customizable forms & Survey Management System
                                </div>
                            </div>
                            <div class="info-box">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, amet. consectetur
                                adipisicing
                                elit. Maiores, amet.consectetur adipisicing elit. Maiores, amet.
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 ">
                        <div class="box3">
                            <div class="box-inner">
                                <img src="<?php echo e(asset('image/login/icon3.png')); ?>" class="img-fluid">
                                <div class="des">
                                    Location & Attendance Management
                                </div>
                            </div>
                            <div class="info-box">
                                Location tracking feature in Rolling Access allows an  organization to track the exact location during the login of an employee. This would make an organization assured in seeing the real distance travelled by staff, knowing whether the team....</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 ">
                        <div class="box4">
                            <div class="box-inner">
                                <img src="<?php echo e(asset('image/login/icon4.png')); ?>" class="img-fluid">
                                <div class="des">
                                    Leave Management
                                </div>
                            </div>
                            <div class="info-box">
                                Any employee willing to take an off needs to go through the process of leave management
                                through
                                rolling access. This creates an ease in communication of all the required members for
                                the process.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-6 col-md-6 col-lg-3 ">
                        <div class="box1">
                            <div class="box-inner">
                                <img src="<?php echo e(asset('image/login/icon5.png')); ?>" class="img-fluid">
                                <div class="des">
                                    Task Management & Help Desk
                                </div>
                            </div>
                            <div class="info-box">
                                Rolling Access has effective           task management feature which        manages all aspects of a task,         including its status,                         priority, time, weightage                     online/offline chat, dependency,              notifications, penalty and          deadline.</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 ">
                        <div class="box2">
                            <div class="box-inner">
                                <img src="<?php echo e(asset('image/login/icon6.png')); ?>" class="img-fluid">
                                <div class="des">
                                    Performance Management
                                </div>
                            </div>
                            <div class="info-box">
                                One of the major feature of Rolling Access is performance management system wherein an     employee’s KRA, KPA and KPIs can be defined and tracked on a daily basis. This feature gives a clear picture to the management.......</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 ">
                        <div class="box3">
                            <div class="box-inner">
                                <img src="<?php echo e(asset('image/login/icon7.png')); ?>" class="img-fluid">
                                <div class="des">
                                    HR Matrix & Reporting System
                                </div>
                            </div>
                            <div class="info-box">
                                HR metrics are measurements used to determine the value and effectiveness of HR initiatives,    typically including such areas as turnover, training, return on human capital, costs of labor, and   expenses per employee. In this offering of 
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 ">
                        <div class="box4">
                            <div class="box-inner">
                                <img src="<?php echo e(asset('image/login/icon8.png')); ?>" class="img-fluid">
                                <div class="des">
                                    Payroll Management
                                </div>
                            </div>
                            <div class="info-box">
                                An employer, regardless of the number of workers they employ, must maintain all records             pertaining to payroll taxes (income tax, withholding, Social Security and federal unemployment tax). Maintaining them manually could be hectic..........</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-6 col-md-6 col-lg-3 ">
                        <div class="box1">
                            <div class="box-inner">
                                <img src="<?php echo e(asset('image/login/icon9.png')); ?>" class="img-fluid">
                                <div class="des">
                                    Adjustment and Overtime hours Management
                                </div>
                            </div>
                            <div class="info-box">
                                Any employee willing to do overtime can directly apply for extra hours through this
                                form. An
                                employee can request his/her shift adjustment through adjustment request form. </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 ">
                        <div class="box2">
                            <div class="box-inner">
                                <img src="<?php echo e(asset('image/login/icon10.png')); ?>" class="img-fluid">
                                <div class="des">
                                    Daily Planner & time tracker
                                </div>
                            </div>
                            <div class="info-box">
                                This feature is a program with sections for each day and the different times of the day that helps one to organize everything one has to do: One method of addressing time management issues is using a day planner.
                                                Time tracking.......

                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 ">
                        <div class="box3">
                            <div class="box-inner">
                                <img src="<?php echo e(asset('image/login/icon11.png')); ?>" class="img-fluid">
                                <div class="des">
                                    HRM Onboarding & Offboarding System
                                </div>
                            </div>
                            <div class="info-box">
                                HR metrics are measurements used to determine the value and effectiveness of HR
                                initiatives,
                                typically including such areas as turnover, training, return on human capital, costs of
                                labor.....
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 ">
                        <div class="box4">
                            <div class="box-inner">
                                <img src="<?php echo e(asset('image/login/icon12.png')); ?>" class="img-fluid">
                                <div class="des">
                                    Surveys & Polls
                                </div>
                            </div>
                            <div class="info-box">
                                This feature allows an employer to generate various surveys among the existing employees
                                (eg:
                                management related survey) or the existing clients which ultimately would benefit
                                organization.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.staffs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>