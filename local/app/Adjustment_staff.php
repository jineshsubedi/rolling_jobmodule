<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Imagetool;
use Cache;
use Carbon\Carbon;

class Adjustment_staff extends Model
{
    protected $table = 'adjustment_staff';  

    protected $fillable = array('branch', 'department', 'employee_id', 'staffType', 'nature_of_employment','name','gender', 'supervisor', 'email','password', 'district', 'age', 'employmentType', 'salaryType','shifttime','dob','joindate','remember_token','permanent_address','temporary_address','account_number','blood_group','marital_status','designation','grade','image', 'f_name', 'bank_name', 'resume', 'offer_letter', 'appointment_letter', 'contract', 'id_proof', 'education_level', 'faculty', 'institute', 'university', 'education_year', 'device_id', 'phone', 'salary', 'status', 'pan', 'pf', 'work_mode', 'business_department', 'personal_email', 'citizenship_number', 'emergency_contact_number', 'contact_person', 'contact_person_number', 'assets_taken', 'home_location', 'primary_location', 'secondary_location', 'dynamic_formData', 'probation_end_date', 'on_board', 'agrement', 'on_board_date', 'work_institute', 'work_designation', 'work_period');

     protected $primaryKey = 'id';
     
     public function isOnline()
        {
            return Cache::has('user-is-online-' . $this->id);
        }

    public function adjustmentRequest(){
        $this->hasMany('App\Adjustmentrequest');
    }

    public function otRequest(){
        $this->hasMany('App\Otrequest');
    }

    public function staffEducationrequest(){
        $this->hasMany('App\StaffEducation');
    }
     
     public static function checkOnline($id)
        {
            return Cache::has('user-is-online-' . $id);
        }

     public static function getImage($id)
     {
        
        $staff = DB::table('adjustment_staff')->select('image')->where('id',$id)->first();
        
        if (isset($staff->image)) {
            if (is_file(DIR_IMAGE.$staff->image)) {
                $image = asset(Imagetool::mycrop($staff->image,100,100));
            } else{
                $image = asset(Imagetool::mycrop('blank-image.png',100,100));
            }
            
        } else{
            $image = asset(Imagetool::mycrop('blank-image.png',100,100));
        }
        return $image;
     }
     
     public static function getStatus($status)
     {
        if ($status == 1) {
            $title = 'Currently Working';
        } elseif ($status == 2) {
            $title = 'Resigned';
        } elseif ($status == 3) {
            $title = 'Absconding';
        } elseif ($status == 4) {
            $title = 'Terminated';
        }else{
            $title = '';
        }
        return $title;
     }
     
     public static function getName($id){
        $staff = DB::table('adjustment_staff')->select('name')->where('id',$id)->first();
        if (isset($staff->name)) {
            return $staff->name;
        }else{
            return '';
        }
     }
     public static function getDesignation($id){
        $staff = DB::table('adjustment_staff')->select('designation')->where('id',$id)->first();
        if (isset($staff->designation)) {

            $data = DB::table('designation')->where('id', $staff->designation)->select('title')->first();
            return $data->title;
        }else{
            return '';
        }
     }
     
     public static function getType($id)
     {
        if ($id == 1) {
            $t = 'Supervisor';
        }elseif ($id == 2) {
            $t = 'Contact Center Associate';
        }elseif ($id == 3) {
            $t = 'Branch Admin';
        }else{
            $t = '';
        }
        return $t;
     }
     
     public static function setWeekend()
     {
        if (auth()->guard('staffs')->user()->weekend == 'SUNDAY') {
             Carbon::setWeekendDays([Carbon::SUNDAY]);
           }
        if (auth()->guard('staffs')->user()->weekend == 'MONDAY') {
             Carbon::setWeekendDays([Carbon::MONDAY]);
           }
        if (auth()->guard('staffs')->user()->weekend == 'TUESDAY') {
             Carbon::setWeekendDays([Carbon::TUESDAY]);
           }
        if (auth()->guard('staffs')->user()->weekend == 'WEDNESDAY') {
             Carbon::setWeekendDays([Carbon::WEDNESDAY]);
           }
        if (auth()->guard('staffs')->user()->weekend == 'THURSDAY') {
             Carbon::setWeekendDays([Carbon::THURSDAY]);
           }
        if (auth()->guard('staffs')->user()->weekend == 'FRIDAY') {
             Carbon::setWeekendDays([Carbon::FRIDAY]);
           }
     }
     
     public static function checkWeekend($id)
     {
         $staff = DB::table('adjustment_staff')->select('weekend')->where('id', $id)->first();
         $data = '0';
         if(isset($staff->weekend)){
             if($staff->weekend == date("l")){
                 $data = '1';
             }
         }
         return $data;
     }
     
     public static function checkLeave($id)
     {
         $staff = DB::table('leave_request')->where('requested_by', $id)->where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->where('supervisor_approval', 1)->where('hr_approval', 1)->where('chairman_approval', 1)->count();
         
         return $staff;
     }
     
     public static function staffStatus($id)
     {
         $status = '';
         $staff = DB::table('adjustment_staff')->select('weekend')->where('id', $id)->first();
         if(isset($staff->weekend)){
             if($staff->weekend == date("l")){
                 $status = '<span class="label label-info">Weekend</span>';
             } else{
                 $staff = DB::table('leave_request')->where('requested_by', $id)->where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->where('supervisor_approval', 1)->where('hr_approval', 1)->where('chairman_approval', 1)->count();
                 if($staff > 0)
                 {
                    $status = '<span class="label label-warning">In Leave</span>'; 
                 }
             }
            if($status == ''){
                $attendance = DB::table('attendance')->where('adjustment_staff_id', $id)->where('attendance_date', date('Y-m-d'))->first();
                if(isset($attendance->id)){
                    $meeting = DB::table('attendance_meeting')->where('adjustment_staff_id', $id)->where('meeting_date', date('Y-m-d'))->first();
                    if(isset($meeting->id))
                    {
                        if($meeting->out_time != '' && $meeting->in_time == ''){
                            $status = '<span class="label label-primary">In Meeting</span>'; 
                            $cc = '1';
                        }
                        $cc = '0';
                    }else{
                        $cc = '0';
                    }
                    if($attendance->out_time != ''){
                        $status = '<span class="label label-danger">Duty Off</span>';
                        $cc = '1';
                    }
                    if($cc != '1'){
                        if($attendance->lunch_start != '' && $attendance->lunch_end == '')
                        {
                            $status = '<span class="label bg-blue">In Lunch</span>'; 
                        } else{
                            $status = '<span class="label label-success">In Office</span>';
                        }
                    }
                }else{
                    $status = '<span class="label label-danger">Absent</span>'; 
                }
            }
         }
         
         return $status;
     }
     
     
     public static function getAvergePoint($id)
     {
        $branch_id = auth()->guard('staffs')->user()->branch;
         
         $total_help = DB::table('help_desk')->where('task_to', $id)->where('supervisor_mark', '>', '0')->where('task_from', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->sum('supervisor_mark');
         
         $number_help = DB::table('help_desk')->where('task_to', $id)->where('supervisor_mark', '>', '0')->where('task_from', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->count();
         
         $total_task = DB::table('staff_task')->where('task_to', $id)->where('supervisor_mark', '>', '0')->where('task_from', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->sum('supervisor_mark');
         $number_task = DB::table('staff_task')->where('task_to', $id)->where('supervisor_mark', '>', '0')->where('task_from', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->count();
         $crossed_task = DB::table('staff_task')->where('task_to', $id)->where('task_from', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->where('finish_time', '<', date('Y-m-d'))->get();
         $crossed_help = DB::table('help_desk')->where('task_to', $id)->where('task_from', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->where('finish_time', '<', date('Y-m-d'))->get();
         $weightage_task = DB::table('staff_task')->where('task_to', $id)->where('supervisor_mark', '>', '0')->where('task_from', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->where('weightage', '>', '1')->get();
         if(count($weightage_task) > 0)
         {
             foreach($weightage_task as $weightage)
             {
                 $num = $weightage->weightage - 1;
                 $number_task += $num;
                 $total_task += $num * $weightage->supervisor_mark;
             }
         }
         
         
         //dd($crossed_help);
         $crossed_day = '0';
         $date_to = Carbon::now();
         
         $ctn = count($crossed_task);
         $early_day = '0';
         foreach($crossed_task as $ctask)
         {
             $early_task_date = '';
             if($ctask->complete_status == 1)
             {
                 if($ctask->finish_time > $ctask->completed_date)
                 {
                     $date_to = Carbon::parse($ctask->finish_time);
                     $early_task_date = Carbon::parse($ctask->completed_date);
                 }
                 else{
                     $date_to = Carbon::parse($ctask->completed_date);
                 }
             }
             $date_from = Carbon::parse($ctask->finish_time);
             $crossed_day += $date_to->diffInDays($date_from);
             if($early_task_date != ''){
                 $early_day += $early_task_date->diffInDays($date_from);
                
             }
            if($ctask->weightage > 1)
            {
                $ctn += $ctask->weightage - 1;
            }
         }
         
        foreach($crossed_help as $chelp)
         {
             $early_help_date = '';
             if($chelp->complete == 1)
             {
                 if($chelp->finish_time > $chelp->complete_date)
                 {
                     $date_to = Carbon::parse($chelp->finish_time);
                     $early_help_date = Carbon::parse($chelp->complete_date);
                 } else{
                     $date_to = Carbon::parse($chelp->complete_date);
                 }
             }
             $hdate_from = Carbon::parse($chelp->finish_time);
             $crossed_day += $date_to->diffInDays($hdate_from);
             if($early_help_date != ''){
                 $early_day += $early_help_date->diffInDays($hdate_from);
             }
         }
         
         $total_early_mark = $early_day * '0.2';
         
         //$total_crossed_mark = ($crossed_day * '0.2') - $total_early_mark;
         $total_crossed_mark = ($crossed_day * '0.2');
         //dd($early_day);
         
        
         
         $total_performance = DB::table('performance')->where('performance_of',$id)->where('comment_by', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->sum('comment_rating');
         $number_performance = DB::table('performance')->where('performance_of',$id)->where('comment_by', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->count();
         
         $total_subordinate = DB::table('subordinate')->where('comment_to',$id)->where('comment_by', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->sum('comment_rating');
         $number_subordinate = DB::table('subordinate')->where('comment_to',$id)->where('comment_by', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->count();
         
         $total = $total_help + $total_task + $total_performance + $total_subordinate;
         $number = $number_help + $number_task + $number_performance + $number_subordinate;
         $tnumber = $number + $ctn;
         $total = ($tnumber * '0.05') + $total ;
         //return $number;
         if($number == 0){
             $ration = '0.00';
             $crossed = '0.00';
         }
         elseif($total == 0)
         {
             $ration = '0.00';
             $crossed = '0.00';
         }
         else{
              $ration = $total / $number;
              $crossed = $total_crossed_mark / $tnumber;
         }
         
         
       $crossed_ratio = number_format($crossed, 2, '.', '');
        
         $ratio = number_format($ration, 2, '.', '');
         $task_ratio = '0.00';
         $help_ratio = '0.00';
         $performance_ratio = '0.00';
         $subordinate_ratio = '0.00';
         if($number_task > 0){
            $task_ratio = $total_task / $number_task;
         }
         if($number_help > 0){
            $help_ratio = $total_help / $number_help;
         }
         if($number_performance > 0){
            $performance_ratio = $total_performance / $number_performance;
         }
         if($number_subordinate > 0){
             $subordinate_ratio = $total_subordinate / $number_subordinate;
         }
         
         $wow_task = DB::table('staff_task')->where('task_to', $id)->where('supervisor_mark', '>=', '9')->where('task_from', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->count();
         $average_task = DB::table('staff_task')->where('task_to', $id)->where('supervisor_mark', '>=', '7')->where('supervisor_mark', '<', '9')->where('task_from', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->count();
         $low_task = DB::table('staff_task')->where('task_to', $id)->where('supervisor_mark', '<', '7')->where('supervisor_mark', '>', '0')->where('task_from', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->count();
         
         $wow_help = DB::table('help_desk')->where('task_to', $id)->where('supervisor_mark', '>', '9')->where('task_from', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->count();
         $average_help = DB::table('help_desk')->where('task_to', $id)->where('supervisor_mark', '>=', '7')->where('supervisor_mark', '<', '9')->where('task_from', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->count();
         $low_help = DB::table('help_desk')->where('task_to', $id)->where('supervisor_mark', '<', '7')->where('supervisor_mark', '>', '0')->where('task_from', '!=', $id)->where('created_at', 'LIKE', date('Y').'%')->count();
         
         $wow_performance = DB::table('performance')->where('performance_of',$id)->where('comment_by', '!=', $id)->where('comment_rating', '>', '9')->where('created_at', 'LIKE', date('Y').'%')->count();
         $average_performance = DB::table('performance')->where('performance_of',$id)->where('comment_by', '!=', $id)->where('comment_rating', '>=', '7')->where('comment_rating', '<', '9')->where('created_at', 'LIKE', date('Y').'%')->count();
         $low_performance = DB::table('performance')->where('performance_of',$id)->where('comment_by', '!=', $id)->where('comment_rating', '<', '7')->where('created_at', 'LIKE', date('Y').'%')->count();
         
         $wow_subordinate = DB::table('subordinate')->where('comment_to',$id)->where('comment_by', '!=', $id)->where('comment_rating', '>', '9')->where('created_at', 'LIKE', date('Y').'%')->count();
         $average_subordinate = DB::table('subordinate')->where('comment_to',$id)->where('comment_by', '!=', $id)->where('comment_rating', '>=', '7')->where('comment_rating', '<', '9')->where('created_at', 'LIKE', date('Y').'%')->count();
         $low_subordinate = DB::table('subordinate')->where('comment_to',$id)->where('comment_by', '!=', $id)->where('comment_rating', '<', '7')->where('created_at', 'LIKE', date('Y').'%')->count();
         
         $task_rating = 0;
         $kpi_rating = 0;
         $descipline_rating = 0;
         $punctuality_rating = 0;
         $subordinate_rating = 0;
         
         $total_task_rating = 0;
         $total_kpi_rating = 0;
         $total_descipline_rating = 0;
         $total_punctuality_rating = 0;
         $total_subordinate_rating = 0;
         
         $other_rating = 0;
         
         $task_rating_parameter = 0;
         $kpi_rating_parameter = 0;
         $descipline_rating_parameter = 0;
         $punctuality_rating_parameter = 0;
         $subordinate_rating_parameter = 0;
         
         $task_rating_check = DB::table('performance_setting')->where('branch_id',$branch_id)->where('title', 'Task')->first();
         $kpi_rating_check = DB::table('performance_setting')->where('branch_id',$branch_id)->where('title', 'KPIs')->first();
         $descipline_rating_check = DB::table('performance_setting')->where('branch_id',$branch_id)->where('title', 'Discipline')->first();
         $punctuality_rating_check = DB::table('performance_setting')->where('branch_id',$branch_id)->where('title', 'Punctuality')->first();
         $subordinate_rating_check = DB::table('performance_setting')->where('branch_id',$branch_id)->where('title', 'Subordinate Rating')->first();
         $titles = ['Task','KPIs','Discipline','Punctuality','Subordinate Rating'];
         $other_rating_check =  DB::table('performance_setting')->where('branch_id',$branch_id)->whereNotIn('title',$titles)->where('parameter','>','0')->get();
         //$other_rating_check = DB::table('performance_setting')->where('branch_id',$branch_id)->where('title', 'Punctuality')->get();
         
         if(isset($task_rating_check->id))
         {
             if($task_rating_check->parameter > 0)
             {
                 $task_rating = ($ratio * $task_rating_check->parameter) / 100; 
                 $total_task_rating = $ratio; 
                 $task_rating_parameter = $task_rating_check->parameter;
             }
         }
         if(isset($kpi_rating_check->id))
         {
            if($kpi_rating_check->parameter > 0)
             {
                 $kpis = [];
                 $staff_kpis = DB::table('staff_kpi')->where('staff_id', $id)->get();
                 foreach($staff_kpis as $kp)
                 {
                     $kpis[] = $kp->id;
                 }
                 $kpi_average = DB::table('kpi_rating')->whereIn('kpi_id', $kpis)->where('created_at', 'LIKE', date('Y').'%')->avg('rating');
                 $kpi_rating = ($kpi_average * $kpi_rating_check->parameter) / 100; 
                 $total_kpi_rating = $kpi_average; 
                 $kpi_rating_parameter = $kpi_rating_check->parameter;
                 
             }
         }
         
         if(isset($descipline_rating_check->id))
         {
            if($descipline_rating_check->parameter > 0)
             {
                 $dis = DB::table('decipline')->where('adjustment_staff_id', $id)->where('created_at', 'LIKE', date('Y').'%')->count();
                 $tot_dis = $dis * '2.5';
                 $tot_dis = 10 - $tot_dis;
                 $descipline_rating = ($tot_dis * $descipline_rating_check->parameter) / 100; 
                 $total_descipline_rating = $tot_dis; 
                 $descipline_rating_parameter = $descipline_rating_check->parameter;
             }
         }
         
         if(isset($punctuality_rating_check->id))
         {
            if($punctuality_rating_check->parameter > 0)
             {
                 $punctuality_rating_parameter = $punctuality_rating_check->parameter;
                 $to_pun = '0';
                 $sift_staff = Adjustment_staff::select('shiftTime')->where('id', $id)->first();
                 $sift_time = DB::table('shift_time')->where('id',$sift_staff->shiftTime)->first();
                 $intime = '09:30:00';
                 $outtime = '05:30:00';
                 if(isset($sift_time->id))
                 {
                     $intime = $sift_time->from;
                     $outtime = $sift_time->to;
                 }
                 
                 $intime = strtotime($intime);
                 $startTime = date("H:i:s", strtotime('+10 minutes', $intime));


                 
                 $dis = DB::table('attendance')->where('adjustment_staff_id', $id)->where('in_time', '>', $startTime)->where('created_at', 'LIKE', date('Y').'%')->get();
                 $tot_pen_att = count($dis);
                 $to_pun += $tot_pen_att * '0.1';
                 $al_ids = [];
                 foreach($dis as $di)
                 {
                     $al_ids[] = $di->id;
                 }
                 
                 $outtime = strtotime($outtime);
                 $outtime = date("H:i:s", strtotime('+10 minutes', $outtime));
                 
                  $dis_out = DB::table('attendance')->where('adjustment_staff_id', $id)->where('out_time', '>', $outtime)->whereNotIn('id',$al_ids)->where('created_at', 'LIKE', date('Y').'%')->count();
                 $to_pun += $dis_out * '0.1';
                 
                 $unpaid = DB::table('leave_request')->where('requested_by',$id)->where('types', 1)->where('supervisor_approval', 1)->where('hr_approval', 1)->where('chairman_approval', 1)->where('created_at', 'LIKE', date('Y').'%')->count();
                 $to_pun += $unpaid * '0.2';
                 
                 $to_pun = 10 - $to_pun; 
                 $punctuality_rating = ($to_pun * $punctuality_rating_check->parameter) / 100; 
                 $total_punctuality_rating = $to_pun;
                 
             }
         }
         
          if(isset($subordinate_rating_check->id))
             {
                if($subordinate_rating_check->parameter > 0)
                 {
                     $subordinate_rating_parameter = $subordinate_rating_check->parameter;
                     $sub_rating = DB::table('subordinate_rating')->where('adjustment_staff_id',$id)->where('supervisory', '>', '0')->where('created_at', 'LIKE', date('Y').'%')->avg('supervisory');
                     $sub_rating += DB::table('subordinate_rating')->where('adjustment_staff_id',$id)->where('leadership', '>', '0')->where('created_at', 'LIKE', date('Y').'%')->avg('leadership');
                     $sub_rating += DB::table('subordinate_rating')->where('adjustment_staff_id',$id)->where('created_at', 'LIKE', date('Y').'%')->avg('quality');
                     $sub_rating += DB::table('subordinate_rating')->where('adjustment_staff_id',$id)->where('created_at', 'LIKE', date('Y').'%')->avg('communication');
                     $sub_rating += DB::table('subordinate_rating')->where('adjustment_staff_id',$id)->where('created_at', 'LIKE', date('Y').'%')->avg('consistency');
                     $sub_rating += DB::table('subordinate_rating')->where('adjustment_staff_id',$id)->where('created_at', 'LIKE', date('Y').'%')->avg('independent');
                     $sub_rating += DB::table('subordinate_rating')->where('adjustment_staff_id',$id)->where('created_at', 'LIKE', date('Y').'%')->avg('proactiveness');
                     $sub_rating += DB::table('subordinate_rating')->where('adjustment_staff_id',$id)->where('created_at', 'LIKE', date('Y').'%')->avg('creativity');
                     
                     $check_sup = DB::table('adjustment_staff')->where('supervisor', $id)->count();
                     if($check_sup > 0)
                     {
                         $sub_rating = $sub_rating / 8;
                     } else{
                         $sub_rating = $sub_rating / 6;
                     }
                    
                    $subordinate_rating = ($sub_rating * $subordinate_rating_check->parameter) / 100; 
                    $total_subordinate_rating = $sub_rating; 
                 }
             }
             
             $others = [];
             
             if(count($other_rating_check) > 0)
             {
                 foreach($other_rating_check as $other)
                 {
                     $o_rating = DB::table('performance_rating')->where('performance_setting_id', $other->id)->where('adjustment_staff_id', $id)->where('created_at', 'LIKE', date('Y').'%')->avg('rating');
                     $oth_rating = ($o_rating * $other->parameter) / 100;
                     $other_rating += ($o_rating * $other->parameter) / 100;
                     $others[] = [
                         'title' => $other->title,
                         'rating' => number_format($o_rating, 2, '.', ''),
                         'oth_rating' => number_format($oth_rating, 2, '.', ''),
                         'parameter' => $other->parameter
                         ];
                 }
                 
                 $other_rating = $other_rating / count($other_rating_check);
                 
             }
         
         $ratio = $task_rating + $kpi_rating + $descipline_rating + $punctuality_rating + $subordinate_rating + $other_rating;
         $ratio = number_format($ratio, 2, '.', '');
         $data = [
             'ratio' => $ratio,
             'task_rating_parameter' => $task_rating_parameter,
             'kpi_rating_parameter' => $kpi_rating_parameter,
             'descipline_rating_parameter' => $descipline_rating_parameter,
             'punctuality_rating_parameter' => $punctuality_rating_parameter,
             'subordinate_rating_parameter' => $subordinate_rating_parameter,
             'others' => $others,
             'task_rating' => number_format($task_rating, 2, '.', ''),
             'kpi_rating' => number_format($kpi_rating, 2, '.', ''),
             'descipline_rating' => number_format($descipline_rating, 2, '.', ''),
             'punctuality_rating' => number_format($punctuality_rating, 2, '.', ''),
             'subordinate_rating' => number_format($subordinate_rating, 2, '.', ''),
             'total_task_rating' => number_format($total_task_rating, 2, '.', ''),
             'total_kpi_rating' => number_format($total_kpi_rating, 2, '.', ''),
             'total_descipline_rating' => number_format($total_descipline_rating, 2, '.', ''),
             'total_punctuality_rating' => number_format($total_punctuality_rating, 2, '.', ''),
             'total_subordinate_rating' => number_format($total_subordinate_rating, 2, '.', ''),
             
             'task_ratio' => number_format($task_ratio, 2, '.', ''),
             'help' => $number_help,
             'help_ratio' => number_format($help_ratio, 2, '.', ''),
             'performance' => $number_performance,
             'performance_ratio' => number_format($performance_ratio, 2, '.', ''),
             'wow_task' => $wow_task,
             'average_task' => $average_task,
             'low_task' => $low_task,
             'wow_help' => $wow_help,
             'average_help' => $average_help,
             'low_help' => $low_help,
             'wow_performance' => $wow_performance,
             'average_performance' => $average_performance,
             'low_performance' => $low_performance,
             'crossed_ratio' => $crossed_ratio,
             'subordinate' => $number_subordinate,
             'subordinate_ratio' => number_format($subordinate_ratio, 2, '.', ''),
             'wow_subordinate' => $wow_subordinate,
             'average_subordinate' => $average_subordinate,
             'low_subordinate' => $low_subordinate,
             ];
        return $data;
     }
     
     public static function countExpireTask($id)
     {
         return DB::table('staff_task')->where('task_to', $id)->where('finish_time', '<', date('Y-m-d'))->where('complete_status', '0')->count();
     }
     
      public static function getSubordinate($quarter)
     {
         $stf = [];
         $staffs = DB::table('adjustment_staff')->select('id','name')->where('supervisor', auth()->guard('staffs')->user()->id)->where('status', 1)->orderBy('name','asc')->get();
         foreach($staffs as $stif)
         {
             
             $check = DB::table('subordinate_rating')->where('adjustment_staff_id', $stif->id)->where('added_by',auth()->guard('staffs')->user()->id)->where('created_at', 'LIKE', $quarter.'%')->first();
             if(!isset($check->id))
             {
                 $stf[] = ['id' => $stif->id, 'name' => $stif->name];
             }
            
           
         }
         
         return $stf;
     }
     
     public static function getAllSub()
     {
         $stf = [];
         $staffs = DB::table('adjustment_staff')->select('id','name')->where('supervisor', auth()->guard('staffs')->user()->id)->where('status', 1)->orderBy('name','asc')->get();
         foreach($staffs as $stif)
         {
             
             $check = DB::table('subordinate_rating')->where('adjustment_staff_id', $stif->id)->where('added_by',auth()->guard('staffs')->user()->id)->first();
             if(!isset($check->id))
             {
                 $stf[] = ['id' => $stif->id, 'name' => $stif->name];
             }
            
           
         }
         return $stf;
     }
     
     public static function checkRt($quarter)
     {
         $data = '0';
        
         $staffs = DB::table('adjustment_staff')->select('id')->where('supervisor', auth()->guard('staffs')->user()->id)->where('status', 1)->orderBy('name','asc')->get();
        //dd($staffs);
         foreach($staffs as $staff)
         {
             $check = DB::table('subordinate_rating')->where('adjustment_staff_id', $staff->id)->where('added_by',auth()->guard('staffs')->user()->id)->where('created_at', 'LIKE', $quarter.'%')->count();
             if($check == 0)
             {
                 $data = '1';
                 break;
             }
         }
         
         
        
         return $data;
     }
     public static function checkAllRating()
     {
        $data = '0';
        
         $staffs = DB::table('adjustment_staff')->select('id')->where('supervisor', auth()->guard('staffs')->user()->id)->where('status', 1)->orderBy('name','asc')->get();
        //dd($staffs);
         foreach($staffs as $staff)
         {
             $check = DB::table('subordinate_rating')->where('adjustment_staff_id', $staff->id)->where('added_by',auth()->guard('staffs')->user()->id)->count();
             if($check == 0)
             {
                
                 $data = '1';
                 break;
             }
         }
        
         
        
         return $data;
     }
     
     public static function checkSupRating($quarter)
     {
         return DB::table('subordinate_rating')->where('adjustment_staff_id', auth()->guard('staffs')->user()->supervisor)->where('added_by', auth()->guard('staffs')->user()->id)->where('created_at', 'LIKE', $quarter.'%')->count();
         
     }
     
     public static function checkPerformance($title,$branch)
     {
         return DB::table('performance_setting')->where('branch_id',$branch)->where('title',$title)->where('parameter','>','0')->count();
     }
     
     public static function getDuration($title,$branch)
     {
         $return = '';
         $data =  DB::table('performance_setting')->where('branch_id',$branch)->where('title',$title)->where('parameter','>','0')->first();
         if(isset($data->duration))
         {
             $return  = $data->duration;
         }
         return $return;
     }
     
     public static function getParameter($title,$branch)
     {
         $return = '';
         $data =  DB::table('performance_setting')->where('branch_id',$branch)->where('title',$title)->where('parameter','>','0')->first();
         if(isset($data->parameter))
         {
             $return  = $data->parameter;
         }
         return $return;
     }
     
     public static function getOtherPer($branch)
     {
         $data = [];
         $set = DB::table('branch_setting')->where('branch_id', $branch)->first();
         if(isset($set->performance_rater)){
             if($set->performance_rater == auth()->guard('staffs')->user()->id){
                 
          
         $titles = ['Task','KPIs','Discipline','Punctuality','Subordinate Rating', 'Achievement'];
         $others =  DB::table('performance_setting')->where('branch_id',$branch)->whereNotIn('title',$titles)->where('parameter','>','0')->get();
         //dd($others);
         $staffs = DB::table('adjustment_staff')->where('branch',auth()->guard('staffs')->user()->branch)->count();
         $tot = $staffs - 1;
         foreach($others as $other){
             //dd($other);
             $check = DB::table('performance_rating')->where('performance_setting_id',$other->id)->where('rating_date','LIKE',date('Y-m').'%')->count();
             
             
             if($tot > $check)
             {
                 $data = $other;
                 break;
             }
         }
             }
         }
         return $data;
        
     }
     
     public static function checkPerformanceRating($id)
     {
         
         return  DB::table('performance_rating')->where('performance_setting_id',$id)->where('rating_date','LIKE',date('Y-m').'%')->count();
        
     }
     
     public static function getPerformanceRatingStaffs($id)
     {
         $data = [];
         $staffs = DB::table('adjustment_staff')->where('branch',auth()->guard('staffs')->user()->branch)->orderBy('name','asc')->get();
         foreach($staffs as $staff)
         {
             $check = DB::table('performance_rating')->where('performance_setting_id',$id)->where('adjustment_staff_id', $staff->id)->where('rating_date','LIKE',date('Y-m').'%')->count();
             if($check < 1){
                 $data[] = ['id' => $staff->id, 'name' => $staff->name];
             }
         }
         return $data;
        
     }

     public static function checkAllServey()
     {
         return DB::table('staff_survey')->where('adjustment_staff_id', auth()->guard('staffs')->user()->id)->count();
     }

     public static function checkServey()
     {
        $data = '1';
        $months = ['3','6','9','12'];
        $nm = date('m');
        if (in_array($nm, $months)) {
            $data = DB::table('staff_survey')->where('adjustment_staff_id', auth()->guard('staffs')->user()->id)->where('year', date('Y'))->where('month', $nm)->count();
        }
         return $data;
     }

     public static function getMySubOrdinate()
     {
        return Adjustment_staff::where('branch', auth()->guard('staffs')->user()->branch)
                    ->where('supervisor', auth()->guard('staffs')->user()->id)
                    ->where('status', 1)
                    ->select('id','name', 'branch')
                    ->orderBy('name', 'asc')
                    ->get();
     }

     //HR metrics
    public static function turnoverRate() //done yes
    {
        $num_of_staff_resigned_per_year = Adjustment_staff::where('status',2)
                                        ->where('branch', auth()->guard('staffs')->user()->branch)
                                        ->whereYear('resign_date','=',Carbon::now()->year)
                                        // ->whereYear('created_at','<=',Carbon::now()->endOfYear())
                                        ->count();
        
        $avg_of_staff_present = Adjustment_staff::where('status', 1)->where('branch', auth()->guard('staffs')->user()->branch)->count();
        $turnover = ($num_of_staff_resigned_per_year / $avg_of_staff_present) * 100;
        return round($turnover,1);
    }
    public static function averageTenure() //done yes
    {
        $user = Adjustment_staff::where('branch', auth()->guard('staffs')->user()->branch)->sum('tenure');
        $num_of_staff = Adjustment_staff::where('status', 1)->where('branch', auth()->guard('staffs')->user()->branch)->count();
        $value = round(($user / $num_of_staff) ,1);
        return $value;
    }
    public static function jobSatisfaction() //done yes
    { 
        $satisfy_user = StaffSurvey::where('branch_id', auth()->guard('staffs')->user()->branch)->whereYear('created_at','=',Carbon::now()->year)->get();
        $count = 0;
        foreach($satisfy_user as $s_user){
            $datas = json_decode($s_user->others);
            foreach($datas as $data)
            {
                if($data->title == 'How happy are you working here?'){
                    if($data->answer >= 8){
                        $count++;
                    }
                }
            }
        }
        $num_of_staff = Adjustment_staff::where('status', 1)->where('branch', auth()->guard('staffs')->user()->branch)->count();
        $value = round(($count / $num_of_staff) * 100, 1);
        return $value;
    }
    public static function employeeNPS() //done yes
    {
        $overall_rating = OrgRating::whereYear('created_at','=',Carbon::now()->year)->avg('overal_rating') * 10;
        return round($overall_rating,1);
    }
    public static function hrEmployeeRatio() //done yes
    {
        $num_of_staff = Adjustment_staff::where('status', 1)
                        ->where('branch', auth()->guard('staffs')->user()->branch)
                        ->count();
        $hr = Adjustment_staff::where('status', 1)
                        ->where('branch', auth()->guard('staffs')->user()->branch)
                        ->where('department', 7)
                        ->count();
        if($hr > 0)
        {
            $value = round(($num_of_staff / $hr),1);
        }else{
            $value = 0;
        }
        return $value;
    }
    public static function abseentism() //done yes
    {
        $leave_days = LeaveRequest::where('branch_id', auth()->guard('staffs')->user()->branch)
                                    ->where('supervisor_approval', 1)
                                    ->where('hr_approval', 1)
                                    ->where('chairman_approval', 1)
                                    ->whereYear('created_at','=',Carbon::now()->year)
                                    // ->groupBy(DB::raw('YEAR(created_at)'))
                                    ->sum('duration');
        $present_days = Attendance::where('branch_id', auth()->guard('staffs')->user()->branch)->whereYear('created_at','=',Carbon::now()->year)->count();
        // $present_days = Attendance::groupBy(DB::raw('YEAR(created_at)'))->count();
        if($present_days > 0){
        $value = round(($leave_days / $present_days)*100, 1);
        } else{
            $value = 0;
        }
        return $value;
    }
    public static function interviewRate() //done yes
    {
        $interview_user_count = ExitInterview::where('branch_id', auth()->guard('staffs')->user()->branch)->whereYear('created_at','=',Carbon::now()->year)->count();
        $num_of_staff = Adjustment_staff::where('status', 1)->where('branch', auth()->guard('staffs')->user()->branch)->count();
        $value = round(($interview_user_count / $num_of_staff) * 100 ,2);
        return $value;
    }
    public static function ghostRate() //done yes
    {
        $failed_interview = OnBoardStaff::where('branch_id', auth()->guard('staffs')->user()->branch)
                            ->where('supervisor_approval', 'accepted')
                            ->where('hr_approval', 'accepted')
                            ->whereYear('created_at','=',Carbon::now()->year)
                            ->get();
        $countFailedOnBoardStaff = 0;
        foreach($failed_interview as $f){
            if(!Adjustment_staff::where('email', $f->email)->first()){
                $countFailedOnBoardStaff++;
            }
        }
        // $total_onboard_staff = OnBoardStaff::count();
        $total_onboard_staff = OnBoardStaff::where('branch_id', auth()->guard('staffs')->user()->branch)->whereYear('created_at','=',Carbon::now()->year)->count();
        if($total_onboard_staff > 0){
            $value = round(($countFailedOnBoardStaff / $total_onboard_staff ) * 100 , 1);
            return $value;
        }else{
            return 100;
        }
    }
    public static function otPercentage() //done yes
    {
        $overTime = Otrequest::where('branch_id',auth()->guard('staffs')->user()->branch)->where('status',2)->whereYear('created_at','=',Carbon::now()->year)->get();
        // $hours_of_ot =carbon::parse('00:00:00')->format('H:i:s');
        $hours_of_ot = 0;
        foreach($overTime as $ot){
            // $hour = Carbon::parse($ot->ot_hour)->format('H');
            $minute = Carbon::parse($ot->ot_hour)->format('i')/60;
            $hour = Carbon::parse($ot->ot_hour)->hour + $minute;
            $hours_of_ot += $hour; 
        }
        $staff = Adjustment_staff::where('status', 1)->where('branch', auth()->guard('staffs')->user()->branch);
        $total_staff = $staff->count();
        $staffs = $staff->get();
        //loop staffs and sum total number of hours spend by each staff
        $total_staff_time = 0;
        foreach($staffs as $staff)
        {
            if($staff->shiftTime){
                $shift = Shifttime::where('id', $staff->shiftTime)->first();
                $minute = Carbon::parse($shift->to)->diffInMinutes(Carbon::parse($shift->from)) / 60;
                $hour = Carbon::parse($shift->to)->diffInHours(Carbon::parse($shift->from)) + $minute;
                $total_staff_time += $hour;
            }
        } 
        $value = round(($hours_of_ot / $total_staff_time) * 100 , 1);
        return $value;
    }
    public static function performer() //done yes
    {
        // $staffs =  Adjustment_staff::where('branch', auth()->guard('staffs')->user()->branch)->where('status', 1)->get();
        // $total_staff_ratio = 0;
        // foreach($staffs as $staff){
        //     $data = \App\Adjustment_staff::getAvergePoint($staff->id);
        //     if($data['ratio'] >= 8){
        //         $total_staff_ratio++;
        //     }
        // }
        // $num_of_staff =Adjustment_staff::where('status', 1)->where('branch', auth()->guard('staffs')->user()->branch)->count();
        // $value = round(($total_staff_ratio / $num_of_staff) * 100, 1);
        // return $value;
        return 100;
    }
    public static function hireFailRate() //done yes
    {
        $failed_staff = Adjustment_staff::where('branch', auth()->guard('staffs')->user()->branch)->where('status','!=',1)->get();
        $count = 0;
        foreach($failed_staff as $fs){
            $month = Carbon::parse($fs->resign_date)->diffInMonths(Carbon::parse($fs->joindate));
            if($month <= 3){
                $count++;
            }
        }
        return $count;
    }
    public static function grievance() //done yes
    {
        $grievance_closed = SuggestionBox::where('branch_id', auth()->guard('staffs')->user()->branch)->where('status',1)->whereYear('created_at','=',Carbon::now()->year)->count();
        $total_grievance = SuggestionBox::where('branch_id', auth()->guard('staffs')->user()->branch)->whereYear('created_at','=',Carbon::now()->year)->count();
        if($total_grievance > 0){
        $value = round(($grievance_closed / $total_grievance) * 100, 1);
        } else{
            $value = 0;
        }
        return $value;
    }
    public static function costPerEmployee() //done yes
    {
        $division = Division::all();
        $total_expense = 0;
        foreach($division as $d){
            $divisionRevenue = DivisionRevenue::where('branch_id', auth()->guard('staffs')->user()->branch)->where('division_id',$d->id)->latest()->first();
            if(isset($divisionRevenue->direct_expenses) && isset($divisionRevenue->indirect_expenses) ){
                $total_expense += ($divisionRevenue->direct_expenses + $divisionRevenue->indirect_expenses);
            }
        }
        $num_of_staff = Adjustment_staff::where('status', 1)->where('branch', auth()->guard('staffs')->user()->branch)->count();
        $value = round(($total_expense / $num_of_staff),1);
        return $value;
    }
    public static function revenue() //done yes
    {
        $division = Division::all();
        $total_revenue = 0;
        foreach($division as $d){
            $divisionRevenue = DivisionRevenue::where('branch_id', auth()->guard('staffs')->user()->branch)->where('division_id',$d->id)->latest()->first();
            if(isset($divisionRevenue->revenue)){
                $total_revenue += $divisionRevenue->revenue;
            }
        }
        $num_of_staff = Adjustment_staff::where('status', 1)->where('branch', auth()->guard('staffs')->user()->branch)->count();
        $value = round(($total_revenue / $num_of_staff),1);
        return $value;
    }
    public static function productivity()
    {
        return 100;
    }
    public static function timeSheet() //not done
    {
        // $work_in_time_sheet = 0.0;
        // $task_time = DailyRoutine::where('finish_time','!=','')
        //                             // ->where('created_at', Carbon::today()->format('Y-m-d'))
        //                             ->get();
        // foreach($task_time as $tt){
        //     if(isset($tt->adjustment_staff->branch) && $tt->adjustment_staff->branch == auth()->guard('staffs')->user()->branch){
        //         $minute = (Carbon::parse($tt->finish_time)->diffInMinutes(Carbon::parse($tt->start_time)) / 60);
        //         $hour = (Carbon::parse($tt->finish_time)->diffInHours(Carbon::parse($tt->start_time)) + $minute);
        //         $work_in_time_sheet += $hour;
        //     }
        // }

        // $total_clock_in_time_of_attendance = 0.0;
        // $attendance = Attendance::where('branch_id', auth()->guard('staffs')->user()->branch)->where('out_time','!=', '')->select('in_time','out_time')->get();
        // foreach($attendance as $a){
        //     $minute = (Carbon::parse($a->out_time)->diffInMinutes(Carbon::parse($a->in_time)) / 60);
        //     $total_clock_in_time_of_attendance += (Carbon::parse($a->out_time)->diffInHours(Carbon::parse($a->in_time)) + $minute);
        // }
        // if($total_clock_in_time_of_attendance > 0){
        // $value = round(($work_in_time_sheet / $total_clock_in_time_of_attendance) * 100,1);
        // } else{
        //     $value = 0;
        // }
        // return $value;
        return 100;
    }


    public static function getPerfomanceSubordinate()
    {
        $quarter = Carbon::today()->format('Y-m');
        $stf = [];
        $staffs = DB::table('adjustment_staff')->select('id','name')->where('supervisor', auth()->guard('staffs')->user()->id)->where('status', 1)->orderBy('name','asc')->get();
        foreach($staffs as $stif)
        {
            $check = DB::table('performance')->where('performance_of', $stif->id)->where('comment_by',auth()->guard('staffs')->user()->id)->where('created_at', 'LIKE', '%'.$quarter.'%')->get();
            
            if(count($check) < 1)
            {
                $stf[] = ['id' => $stif->id, 'name' => $stif->name];
            }
        }
        return $stf;
    }

    public static function hasSubOrdinate()
    {
        $data = Adjustment_staff::where('supervisor', auth()->guard('staffs')->user()->id)->get();
        if(count($data) > 0){
            return TRUE;
        }
        return FALSE;
    }

    public static function isSMT()
    {
        $data = Adjustment_staff::where('id', auth()->guard('staffs')->user()->id)->where('department', 4)->first();
        if($data){
            return true;
        }
        return false;
    }
    public static function isSupervisor($id)
    {
        if(auth()->guard('staffs')->user()->id == $id){
            return true;
        }
        
        $staff = Adjustment_staff::select('id','name', 'supervisor')->find($id);
        if(auth()->guard('staffs')->user()->id == $staff->supervisor)
        {
            return true;
        }

        return false;
    }
}
