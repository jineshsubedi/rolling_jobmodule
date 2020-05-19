<?php
namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Adjustment_staff;
use App\Adjustmentrequest;
use App\Otrequest;
use App\Imagetool;
use Image;
use File;
use App\Faculty;
use App\EducationLevel;
use Carbon\Carbon;
use App\LeaveType;
use App\LeaveRequest;
use App\LeaveSetting;
use App\DivisionRevenue;
use App\Division;
use App\Attendance;
use App\AttendanceMeeting;
use App\StickerNote;
use App\InformationDocuments;
use App\MostStaff;
use App\StaffTask;
use App\StaffKpi;
use App\KpiRating;
use App\HelpDesk;
use App\StaffRating;
use App\Achievements;
use App\CompensatoryOff;
use App\library\NepaliDateApi;
use App\BookingStaffs;
use App\BookingHall;
use App\DailyRoutine;
use App\OnBoardStaff;
use App\Shifttime;
use App\Reminder;
use App\StaffAllowance;
use App\StaffSalary;

class BranchAdminController extends Controller
{
      
    use NepaliDateApi;
    public function __construct()
    {
        $this->middleware('branchadmin');
        $this->middleware('onboard');
    }

    public function autoBirthdayWish()
    {
      $bday_staff = \App\Adjustment_staff::where('status', 1)
      ->whereMonth('dob', '=', Date('m'))
      ->whereDay('dob', '=', Date('d'))
      ->select('id','name','branch', 'image')
      ->get();

      foreach($bday_staff as $staff)
      {
        $setting = \App\BranchSetting::where('branch_id', $staff->branch)->first();
        if(isset($setting->hr_handler)){
          $hr_handler = \App\Adjustment_staff::select('id', 'name', 'branch')->find($setting->hr_handler);

          $image = 'blank-image.png';
          if($staff->image){
            if (is_file(DIR_IMAGE.$staff->image)) {
             $image = $staff->image;
            }
          }

          $imageUrl = asset('image/'.$image);

          $title = 'HAPPY BIRTHDAY';
          $background = asset("image/newsfeed/birthday.jpg");
          $message = 'Happy birthday! May your day be filled with lots of love and happiness.';

          $html = '<div style="width:100%; background-image: url('.$background.'); background-repeat: no-repeat; background-size: cover;">
          <div class="text-center" style="padding-top: 50px;padding-bottom: 50px;">
              <h3>'.$title.'</h3>
              <img alt="profile picture" class="img-circle" src="'.$imageUrl.'" style="width: 100px; height: 100px; object-fit:contain; border: 1px solid #9f9fd2;">
              <div>
                  <span style="font-size: 30px; font-family: cursive; padding: 5px;">'.$staff->name.'</span>
                  <br>
                  <span style="font-size: 20px; font-family: cursive; text-align: center; padding: 5px;">'.$message.'</span>
              </div>
          </div>
          </div>';


          if(!\App\NewsFeed::where('branch_id', $staff->branch)->where('staff_id', $hr_handler->id)->where('to_staff', $staff->id)->first())
          {
            $newsfeed = \App\NewsFeed::create([
              'staff_id'=> $hr_handler->id, 
              'to_staff'=> $staff->id, 
              'branch_id'=> $staff->branch, 
              'event' => json_encode($html)
            ]);

            \App\NewsFeedNotification::create([
                'newsfeed_id' => $newsfeed->id,
                'staff_id' => $hr_handler->id,
                'branch_id' => $hr_handler->branch,
                'type' => 'post',
                'message' => '<b>'.$hr_handler->name.'</b> has created '.$staff->name.' birthday post'
            ]);
          }
        }
      }
    }

    public function dashboard(Request $request)
    {
      $this->autoBirthdayWish(); //birthday wish function call
      
      $datas['skills'][0] = \App\StaffSkills::where('title', 'Internet Ability')->orderBy('score', 'desc')->first();
      $datas['skills'][1] = \App\StaffSkills::where('title', 'Quantitative Ability')->orderBy('score', 'desc')->first();
      $datas['skills'][2] = \App\StaffSkills::where('title', 'English comprehension')->orderBy('score', 'desc')->first();
      $datas['skills'][3] = \App\StaffSkills::where('title', 'WriteX - Essay Writing')->orderBy('score', 'desc')->first();
      $datas['skills'][4] = \App\StaffSkills::where('title', 'Typing')->orderBy('score', 'desc')->first();
      $datas['skills'][5] = \App\StaffSkills::where('title', 'Critical Reasoning')->orderBy('score', 'desc')->first();

      $datas['events'] = \App\NewEvent::where('from', '>=', Date('Y-m-d'))
                            ->orderBy('from','asc')
                            ->limit(10)
                            ->get();
      $datas['full_time_employee'] = Adjustment_staff::where('status', 1)->where('branch', auth()->guard('staffs')->user()->branch)->where('employmentType', 1)->count();
      $datas['part_time_employee'] = Adjustment_staff::where('status', 1)->where('branch', auth()->guard('staffs')->user()->branch)->where('employmentType', 2)->count();
       

      $staff_query = Adjustment_staff::where('branch',auth()->guard('staffs')->user()->branch);
      $now  = Carbon::now();
      $setting = LeaveSetting::where('branch_id', auth()->guard('staffs')->user()->branch)->first();

      $datas['subordinates'] = Adjustment_staff::where('status', 1)->where('branch', auth()->guard('staffs')->user()->branch)->where('supervisor', auth()->guard('staffs')->user()->id)->select('id', 'name')->orderBy('name', 'asc')->get();
        
      $avpoints = Adjustment_staff::getAvergePoint(auth()->guard('staffs')->user()->id);

      $avp = $avpoints['ratio'] - $avpoints['crossed_ratio'];
      MostStaff::where('staff_id', auth()->guard('staffs')->user()->id)->update(['av_point' => $avp]);

      $datas['currently_working'] = $staff_query->where('status', 1)->orderBy('name', 'asc')->count();

      $datas['resigned'] = $staff_query->where('status', 2)->orderBy('name', 'asc')->count();
      $datas['absconding'] = $staff_query->where('status', 3)->orderBy('name', 'asc')->count();
      $datas['terminated'] = $staff_query->where('status', 4)->orderBy('name', 'asc')->count();
        
      $datas['first_day'] = Carbon::now()->startOfMonth()->toDateString();
      $datas['month_end'] = Carbon::now()->endOfMonth()->toDateString();
      $datas['total_adjustment_request']  = Adjustmentrequest::where('branch_id',auth()->guard('staffs')->user()->branch)->where('status', 0)->count();
       
      $datas['total_ot_request']  = OtRequest::where('branch_id',auth()->guard('staffs')->user()->branch)->where('status', 0)->count();
        
      $datas['user'] = auth()->guard('staffs')->user();


      $datas['latest_adjustment_request'] = Adjustmentrequest::where('branch_id',auth()->guard('staffs')->user()->branch)->where('status', 0)->orderBy('id', 'desc')->limit(10)->get();

      $datas['latest_ot_request']  = OtRequest::where('branch_id',auth()->guard('staffs')->user()->branch)->where('status', 0)->orderBy('id', 'desc')->limit(10)->get();

      $datas['re_ot_request'] = OtRequest::where('branch_id',auth()->guard('staffs')->user()->branch)->where('status', 0)->count();
      $datas['re_ad_request'] = Adjustmentrequest::where('branch_id',auth()->guard('staffs')->user()->branch)->where('status', 0)->count();
       
       
       
      $datas['total_male'] = $staff_query->where('gender', 'Male')->count();
      $datas['total_female'] = $staff_query->where('gender', 'Female')->count();

      $datas['total_married'] = $staff_query->where('marital_status', '1')->count();
      $datas['total_unmarried'] = $staff_query->where('marital_status', '2')->count();

      $districts = $staff_query->select('district')->where('district', '!=', '')->groupBy('district')->get();
      $datas['district'] = [];
      foreach ($districts as $district) {
          $total = $staff_query->where('district', $district->district)->count();
          $datas['district'][] = [
            'title' => $district->district,
            'total' => $total,
          ];
      }
      
      $datas['age'][] = [
          'title' => '18-',
          'total' => $staff_query->where('age', '<', '18')->where('age', '!=', '0:00')->count(),
          'color' => '#f56954',
          
      ];
      $datas['age'][] = [
          'title' => '18-22',
          'total' => $staff_query->where('age', '>=', '18')->where('age', '<', '22')->count(),
          'color' => '#00a65a',
          
      ];

      $datas['age'][] = [
          'title' => '22-26',
          'total' => $staff_query->where('age', '>=', '22')->where('age', '<', '26')->count(),
          'color' => '#f39c12',
          
      ];
      $datas['age'][] = [
          'title' => '26-30',
          'total' => $staff_query->where('age', '>=', '26')->where('age', '<', '30')->count(),
          'color' => '#00c0ef',
          
      ];
      $datas['age'][] = [
          'title' => '30-40',
          'total' => $staff_query->where('age', '>=', '30')->where('age', '<', '40')->count(),
          'color' => '#3c8dbc',
          
      ];
      $datas['age'][] = [
          'title' => '40-50',
          'total' => $staff_query->where('age', '>=', '40')->where('age', '<=', '50')->count(),
          'color' => '#d2d6de',
          
      ];
      $datas['age'][] = [
          'title' => '50+',
          'total' => $staff_query->where('age', '>', '50')->count(),
          'color' => '#43e96e',
          
      ];
        
        $todayleaves = LeaveRequest::where('branch_id', auth()->guard('staffs')->user()->branch)->where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'));
        if($setting->supervisor_required == 1){
          $todayleaves->where('supervisor_approval', 1);
        }
        if($setting->approval_required == 1){
          $todayleaves->where('hr_approval', 1);
        }
        if($setting->chairman_required == 1){
          $todayleaves->where('chairman_approval',1);
        }
        $todayleaverequests = $todayleaves->get();
        $datas['today_leave'] = [];
        $leave_ids = [];
        foreach ($todayleaverequests as $key => $todayleave) {
          $leave_ids[] = $todayleave->requested_by;
          if ($todayleave->full_day == 1) {
            $full_day = 'Full Day';
          } elseif ($todayleave->full_day == 2) {
            $full_day = 'Quearter Day';
          } else{
            $full_day = 'Half Day';
          }
          $datas['today_leave'][] = [
            'id' => $todayleave->id,
            'staff_name' => Adjustment_staff::getName($todayleave->requested_by),
            'leave_type' => LeaveType::getTitle($todayleave->leave_type),
            'full_day' => $full_day,
            'image' => Adjustment_staff::getImage($todayleave->requested_by),
            'duration' => $todayleave->start_date.' - '.$todayleave->end_date,
          ];
        }
        $datas['hr_admin'] = 0;
        $datas['waiting_approval'] = [];
        if ($setting->approve_person == auth()->guard('staffs')->user()->id) {
          $datas['hr_admin'] = 1;
           $datas['waiting_approval'] = LeaveRequest::where('supervisor_approval', 1)->where('hr_approval', 0)->get();
        }

        $active_staffs = $staff_query->select('id','name','image','dob','joindate','age')->where('status', 1)->get();
        $datas['active_staff'] = [];
        $datas['duty_staff'] = [];
        $datas['absent_staff'] = [];
        $datas['meeting_staff'] = [];
        $datas['this_week_birthday'] = [];
        $datas['next_week_birthday'] = [];

        $datas['this_week_aniver'] = [];
        $datas['next_week_aniver'] = [];
         $staff = [];
        foreach ($active_staffs as $key => $active_staff) {
          $staff[] = $active_staff->id;

          $thisweek = Carbon::now()->weekOfYear;
            $nextweek = $thisweek + 1;

            if (is_file(DIR_IMAGE.$active_staff->image)) {
                $staff_image = asset(Imagetool::mycrop($active_staff->image,100,100));
              } else{
                  $staff_image = asset(Imagetool::mycrop('blank-image.png',100,100));
              }
              
         //active staff check
          if ($active_staff->isOnline()) {
            $datas['active_staff'][] = [
                'name' => $active_staff->name,
                'image' => $staff_image
            ];
          }

          //duty staffs
          $duty = Attendance::where('adjustment_staff_id', $active_staff->id)->where('attendance_date', date('Y-m-d'))->first();
          if (isset($duty->id)) {
            $datas['duty_staff'][] = [
                'name' => $active_staff->name,
                'image' => $staff_image
            ];
          }

          //absent Staffs
          if (!isset($duty->id) && !in_array($active_staff->id, $leave_ids)) {
             $datas['absent_staff'][] = [
                'name' => $active_staff->name,
                'image' => $staff_image
            ];
          }

          // in Meeting Check
          $meeting = AttendanceMeeting::checkOutMeeting($active_staff->id);
          if ($meeting > 0) {
            $datas['meeting_staff'][] = [
                'name' => $active_staff->name,
                'image' => $staff_image
            ];
          }
          if ($active_staff->dob != '') {
            $bdweek = Carbon::parse($active_staff->dob)->weekOfYear;

            

           
            if ($bdweek == $thisweek) {
              $datas['this_week_birthday'][] = [
                'name' => $active_staff->name,
                'image' => $staff_image,
                'bday' => $active_staff->dob,
                'age' => floor($active_staff->age)
              ];
            }

            if ($bdweek == $nextweek) {
              $datas['next_week_birthday'][] = [
                'name' => $active_staff->name,
                'image' => $staff_image,
                'bday' => $active_staff->dob,
                'age' => floor($active_staff->age)  + 1
              ];
            }

          }

           if ($active_staff->joindate != '') {
            $jweek = Carbon::parse($active_staff->joindate)->weekOfYear;

             $jdate = Carbon::parse($active_staff->joindate);
             
             $jdays = $jdate->diffInDays($now);
             $jyear = $jdays / 365;
           if($jdate->year != date('Y')){
            if ($jweek == $thisweek) {
              $datas['this_week_aniver'][] = [
                'name' => $active_staff->name,
                'image' => $staff_image,
                'bday' => $active_staff->joindate,
                'year' => floor($jyear)
              ];
            }

            if ($jweek == $nextweek) {
              $datas['next_week_aniver'][] = [
                'name' => $active_staff->name,
                'image' => $staff_image,
                'bday' => $active_staff->joindate,
                'year' => floor($jyear)  + 1
              ];
            }
           }

          }
        }

        
        
        $datas['waiting_sapproval'] = LeaveRequest::where('supervisor_approval', 0)->whereIn('requested_by',$staff)->get();
        
        
         
        $datas['divisions'] = [];
        $datas['dates'] = [];
        $datas['filter_date'] = '';
        if(auth()->guard('staffs')->user()->branch == 2){
            $divisions = Division::orderBy('title', 'asc')->get();
      $datas['dates'] = DivisionRevenue::where('branch_id', auth()->guard('staffs')->user()->branch)->groupBy('add_date')->orderBy('add_date', 'asc')->get();
        foreach ($divisions as $key => $division) {
            
           $revenueee = DivisionRevenue::where('division_id', $division->id)->where('branch_id', auth()->guard('staffs')->user()->branch);
          if (isset($request->filter_date)) {
            $revenue = $revenueee->where('add_date', $request->filter_date)->first();
            $datas['filter_date'] = $request->filter_date;
          } else {
            $revenue = $revenueee->orderBy('id','desc')->first();
          }
          if (isset($revenue->id)) {
            $revenues = $revenue->revenue;
            $direct_expenses = $revenue->direct_expenses;
            $indirect_expenses = $revenue->indirect_expenses;
            $net_profit = $revenue->net_profit;
            $date_added = $revenue->add_date;
          } else{
            $revenues = '';
            $direct_expenses = '';
            $indirect_expenses = '';
            $net_profit = '';
            $date_added = '';
          }
          $datas['divisions'][] = [
            'id' => $division->id,
            'title' => $division->title,
            'revenue' => $revenues,
            'direct_expenses' => $direct_expenses,
            'indirect_expenses' => $indirect_expenses,
            'net_profit' => $net_profit,
            'date_added' => $date_added
          ];
        }
    }
       
        $datas['in_time'] = '';
        $datas['lunch_start'] = '';
        $datas['lunch_end'] = '';
        $datas['out_time'] = '';

        $datas['in_distance'] = '';
        $datas['out_distance'] = '';
        $datas['in_class'] = '';
        $datas['out_class'] = '';

        $datas['in_away_location'] = false;
        $datas['out_away_location'] = false;
        $datas['attendance_id'] = '';

        $datas['in_map'] = '';
        $datas['out_map'] = '';
        $datas['lunch_start_map'] = '';
        $datas['lunch_end_map'] = '';

        $attendance = Attendance::where('adjustment_staff_id', auth()->guard('staffs')->user()->id)->where('attendance_date', date('Y-m-d'))->first();

        if (isset($attendance->id)) {
        
        if($attendance->in_time != ''){

          $datas['in_time'] = $attendance->in_time;
          $inlocation = explode(',', $attendance->in_location);
          $primary = explode(',', auth()->guard('staffs')->user()->primary_location);
          $secondary = explode(',', auth()->guard('staffs')->user()->secondary_location);
          $primarylat = '';
          $primarylong = '';
          $secondarylat = '';
          $secondarylong = '';
          if (isset($primary[0])) {
            $primarylat = $primary[0];
          }
          if (isset($primary[1])) {
            $primarylong = $primary[1];
          }
          if (isset($secondary[0])) {
            $secondarylat = $secondary[0];
          }
          if (isset($secondary[1])) {
            $secondarylong = $secondary[1];
          }
          //dd($inlocation);
          $inlat2 = $inlocation[0];
          $inlong2 = $inlocation[1];
          $sdis = '';
         
          $distance = Attendance::getDistance($primarylat,$primarylong, $inlocation[0], $inlocation[1], 'K');
          //dd($distance);
          if ($distance > '0.3') {
              if($secondarylat != '' && $secondarylong != ''){
            $sdistance = Attendance::getDistance($secondarylat,$secondarylong, $inlocation[0], $inlocation[1], 'K');
            if ($sdistance > '0.3') {
              $class = 'label-danger';
              $sdis = $sdistance;
            }else{
              $class = 'label-success';
            }
              }
              $class = 'label-danger';
            
          } else{
            $class = 'label-success';
          }
          if ($sdis < $distance) {
            $sdis = $sdis;
          } else{
            $sdis = $distance;
          }
          if ($sdis != '') {
            $sdis = number_format($sdis, 2, '.', '').' KM';
          }

          $datas['in_distance'] = $sdis;
          $datas['in_location'] = $attendance->in_location;
          $datas['in_class'] = $class;
          }

          if($attendance->out_time != ''){

            $datas['out_time'] = $attendance->out_time;
            $outlocation = explode(',', $attendance->out_location);
            $primary = explode(',', auth()->guard('staffs')->user()->primary_location);
            $secondary = explode(',', auth()->guard('staffs')->user()->secondary_location);
            $primarylat = '';
            $primarylong = '';
            $secondarylat = '';
            $secondarylong = '';
            if (isset($primary[0])) {
              $primarylat = $primary[0];
            }
            if (isset($primary[1])) {
              $primarylong = $primary[1];
            }
            if (isset($secondary[0])) {
              $secondarylat = $secondary[0];
            }
            if (isset($secondary[1])) {
              $secondarylong = $secondary[1];
            }
            //dd($outlocation);
            $inlat2 = $outlocation[0];
            $inlong2 = $outlocation[1];
            $outdis = '';
            
            $odistance = Attendance::getDistance($primarylat,$primarylong, $outlocation[0], $outlocation[1], 'K');
            //dd($distance);
            if ($odistance > '0.3') {
                if($secondarylat != '' && $secondarylong != ''){
              $outdistance = Attendance::getDistance($secondarylat,$secondarylong, $outlocation[0], $outlocation[1], 'K');
              if ($outdistance > '0.3') {
                $out_class = 'label-danger';
                $outdis = $outdistance;
              }else{
                $out_class = 'label-success';
              }
              
                }
                $out_class = 'label-danger';
              
            } else{
              $out_class = 'label-success';
            }
            if ($outdis < $odistance) {
              $outdis = $outdis;
            } else{
              $outdis = $odistance;
            }
            if ($outdis != '') {
              $outdis = number_format($outdis, 2, '.', '').' KM';
            }

            $datas['out_distance'] = $outdis;
            $datas['out_location'] = $attendance->out_location;
            $datas['out_class'] = $out_class;
        }

          $datas['attendance_id'] = $attendance->id;
            if($datas['in_class'] == 'label-danger' && $attendance->in_away_location == null){
              $datas['in_away_location'] = true;
            }else{
              $datas['in_away_location'] = false;
            }
            if($datas['out_class'] == 'label-danger' && $attendance->out_away_location == null){
              $datas['out_away_location'] = true;
            }else{
              $datas['out_away_location'] = false;
            }

        if($attendance->lunch_start != ''){

          $datas['lunch_start'] = $attendance->lunch_start;
          

          
          $datas['lunch_start_location'] = $attendance->lunch_start_location;
          
          }
          if($attendance->lunch_end != ''){

          $datas['lunch_end'] = $attendance->lunch_end;
          

          
          $datas['lunch_end_location'] = $attendance->lunch_end_location;
          
          }

        }

        $datas['todaysmeeting'] = AttendanceMeeting::where('adjustment_staff_id', auth()->guard('staffs')->user()->id)->where('meeting_date', date('Y-m-d'))->get();
        $datas['sticky_note'] = StickerNote::where('branch_id', auth()->guard('staffs')->user()->branch)->where('added_by', auth()->guard('staffs')->user()->id)->orderBy('id','desc')->get();
        $datas['documents'] = InformationDocuments::select('id','title')->where('branch_id', auth()->guard('staffs')->user()->branch)->get();
        
        $datas['onboarding'] = OnBoardStaff::where('joining_date', '>=', date('Y-m-d'))->get();
        $datas['resignation'] = \App\ResignationStaff::leftjoin('adjustment_staff', function($join){
        $join->on('resignation_staff.staff_id', '=', 'adjustment_staff.id');
       })
          ->where('resignation_staff.status', 'approved')
          ->where('resignation_staff.offBoarding_date','>=',Date('Y-m-d'))
          ->select('resignation_staff.*', 'adjustment_staff.name as staff_name', 'adjustment_staff.image')
          ->orderBy('resignation_staff.offBoarding_date')
          ->limit(5)
          ->get()->toArray();

        $datas['terminate'] = \App\TerminationStaff::leftjoin('adjustment_staff', function($join){
          $join->on('termination_staff.staff_id', '=', 'adjustment_staff.id');
        })
          ->where('termination_staff.status', 'terminate')
          ->where('termination_staff.offBoarding_date','>=',Date('Y-m-d'))
          ->select('termination_staff.*','adjustment_staff.name as staff_name', 'adjustment_staff.image as image')
          ->orderBy('termination_staff.offBoarding_date')
          ->limit(5)
          ->get()->toArray();

         $datas['masters'] = \App\Award::getAward();
        $datas['staff_workmode'] = [
          'full_time' => $staff_query->where('employmentType', 1)->count(),
          'part_time' => $staff_query->where('employmentType', 2)->count(),
          'probation' => $staff_query->where('employmentType', 3)->count(),
          'intern' => $staff_query->where('employmentType', 4)->count(),
        ];

        $average_in = Attendance::where('attendance_date', 'LIKE', date('Y').'%')->where('branch_id', auth()->guard('staffs')->user()->branch)->selectRaw('AVG(TIME_TO_SEC(in_time)) as in_time')->first();
        $average_out = Attendance::where('attendance_date', 'LIKE', date('Y').'%')->where('branch_id', auth()->guard('staffs')->user()->branch)->selectRaw('AVG(TIME_TO_SEC(out_time)) as out_time')->first();
        

        $average_lunch = Attendance::where('attendance_date', 'LIKE', date('Y').'%')->where('branch_id', auth()->guard('staffs')->user()->branch)->selectRaw('AVG(TIME_TO_SEC(lunch_start)) as lunch_start')->first();
        

        $datas['avg_in'] = floor($average_in->in_time/3600).':'.floor(($average_in->in_time%3600)/60);
        $datas['avg_out'] = floor($average_out->out_time/3600).':'.floor(($average_out->out_time%3600)/60);
         $datas['avg_lunch'] = floor($average_lunch->lunch_start/3600).':'.floor(($average_lunch->lunch_start%3600)/60);
        
        $datas['branches'] = \App\Branch::count();
        $datas['departments'] = \App\Department::where('branch_id', auth()->guard('staffs')->user()->branch)->count();
        $tda = date('Y-m-d');

        // $late_ins = Attendance::where('attendance_date', date('Y-m-d'))->where('branch_id', auth()->guard('staffs')->user()->branch)->where('created_at', '>', $tda.' 9:30')->get();
        // $early_ins = Attendance::where('attendance_date', date('Y-m-d'))->where('branch_id', auth()->guard('staffs')->user()->branch)->where('created_at', '<', $tda.' 9:30')->get();
        $users = $staff_query->where('status', 1)
                            ->get();
        $late_ins = [];
        $early_ins = [];
        foreach($users as $user){
          $shiftTime = Shifttime::where('id', $user->shiftTime)->select('from')->first();
          if(isset($shiftTime->from)){
          $late = Attendance::where('attendance_date', date('Y-m-d'))->where('adjustment_staff_id', $user->id)->where('created_at', '>', $tda.' '.$shiftTime->from)->first();
          $early = Attendance::where('attendance_date', date('Y-m-d'))->where('adjustment_staff_id', $user->id)->where('created_at', '<', $tda.' '.$shiftTime->from)->first();
          if(!empty($late)){
            array_push($late_ins, $late);
          }
          if(!empty($early)){
            array_push($early_ins, $early);
          }
          }
        }
        
        $above_thirtys = Attendance::where('attendance_date', date('Y-m-d'))->where('branch_id', auth()->guard('staffs')->user()->branch)->where('created_at', '>', $tda.' 10:00')->get();
        $datas['late_in'] = [];
        $datas['early_in'] = [];
        $datas['above_thirty'] = [];
        foreach ($late_ins as $key => $late_in) {
          $datas['late_in'][] = [
            'name' => Adjustment_staff::getName($late_in->adjustment_staff_id),
            'image' => Adjustment_staff::getImage($late_in->adjustment_staff_id),
            'in_time' => $late_in->in_time
          ];

        }

        foreach ($early_ins as $key => $early_in) {
          $datas['early_in'][] = [
            'name' => Adjustment_staff::getName($early_in->adjustment_staff_id),
            'image' => Adjustment_staff::getImage($early_in->adjustment_staff_id),
            'in_time' => $early_in->in_time
          ];

        }
        foreach ($above_thirtys as $key => $above_thirty) {
          $datas['above_thirty'][] = [
            'name' => Adjustment_staff::getName($above_thirty->adjustment_staff_id),
            'image' => Adjustment_staff::getImage($above_thirty->adjustment_staff_id),
            'in_time' => $above_thirty->in_time
          ];

        }

        $today = Carbon::now();
        $lwld = $today->startOfWeek()->subDays(1)->toDateString();
        $lmld = $today->startOfMonth()->subDays(1);
        $yesterday = Carbon::yesterday()->toDateString();
        
        $last_week = Carbon::parse($lwld);
        $lwfd = $last_week->startOfWeek()->toDateString();

        $lmfd = $lmld->year.'-'.$lmld->month.'-01';

        $lmlday = $lmld->toDateString();


        $y_overtime = Otrequest::where('branch_id',auth()->guard('staffs')->user()->branch)->where('ot_date',$yesterday)->selectRaw('SEC_TO_TIME( SUM( TIME_TO_SEC( `ot_hour` ) ) ) AS total_time')
        ->get();

        $lw_overtime = Otrequest::where('branch_id',auth()->guard('staffs')->user()->branch)->where('ot_date','>=', $lwfd)->where('ot_date','<=', $lwld)->selectRaw('SEC_TO_TIME( SUM( TIME_TO_SEC( `ot_hour` ) ) ) AS total_time')
        ->get();

         $lm_overtime = Otrequest::where('branch_id',auth()->guard('staffs')->user()->branch)->where('ot_date','>=', $lmfd)->where('ot_date','<=', $lmlday)->selectRaw('SEC_TO_TIME( SUM( TIME_TO_SEC( `ot_hour` ) ) ) AS total_time')
        ->get();
        //yesterday Overtime
        $total_y_overtime = $y_overtime[0]->total_time;
       
        $y_time = explode(':',$total_y_overtime);
        
         if(isset($y_time[0]))
        {
            $y_hrs= $y_time[0];
        } else{
            $y_hrs = 0;
        }
        
        if(isset($y_time[1]))
        {
            $y_min= $y_time[1];
        } else{
            $y_min = 0;
        }
        //Last Week Overtime
        $total_lw_ot = $lw_overtime[0]->total_time;
       
        $lw_time = explode(':',$total_lw_ot);
        
         if(isset($lw_time[0]))
        {
            $lw_hrs= $lw_time[0];
        } else{
            $lw_hrs = 0;
        }
        
        if(isset($lw_time[1]))
        {
            $lw_min= $lw_time[1];
        } else{
            $lw_min = 0;
        }
        //lastmonth overtime
         $total_lm_ot = $lm_overtime[0]->total_time;
       
        $lm_time = explode(':',$total_lm_ot);
        
         if(isset($lm_time[0]))
        {
            $lm_hrs= $lm_time[0];
        } else{
            $lm_hrs = 0;
        }
        
        if(isset($lm_time[1]))
        {
            $lm_min= $lm_time[1];
        } else{
            $lm_min = 0;
        }
        
        $datas['lmot'] = $lm_hrs.' : '.$lm_min;
        $datas['lwot'] = $lw_hrs.' : '.$lw_min;
        $datas['yot'] = $y_hrs.' : '.$y_min;
        
        
        $meetings = BookingStaffs::where('staff_id', auth()->guard('staffs')->user()->id)->where('status',1)->where('created_at', 'LIKE', date('Y').'%')->get();
      $datas['daily_routine'] = [];
       $begain_time = Carbon::parse(date('Y-m-d').' 07:00:00');
       foreach ($meetings as $key => $meeting) {
        $booking = \App\HallBooking::where('id',$meeting->booking_id)->first();
        if($booking->booking_date == date('Y-m-d'))
        {
         $hall = \App\BookingHall::getTitle($booking->hall_id);
        $bdate = Carbon::parse($booking->booking_date.' '.$booking->booking_time);
        $fdate = Carbon::parse($booking->booking_date.' '.$booking->to_time);

        $m_hour = $bdate->diff($fdate)->format('%H');
        $m_minute = $bdate->diff($fdate)->format('%I');
        $mtdif = $m_hour + ($m_minute / 60);
        $bdif_hour = $begain_time->diff($bdate)->format('%H');
        $bdif_min = $begain_time->diff($bdate)->format('%I');
        $mwidth = $mtdif * 8.33;
        $mdif = $bdif_hour + ($bdif_min /60);
        $mmargin = $mdif * 8.33;

        $datas['daily_routine'][] = [
          'id' => $meeting->id,
          'title' => 'Meeting in '.$hall,
          
          'start_hour' => $bdate->hour.':'.$bdate->minute,
          'finish_time' => $fdate->hour.':'.$fdate->minute,
        
          'width' => $mwidth,
          'margin' => $mmargin,
          'type' => 'Meeting',
          'data_type' => ''
          
        ];
        }
       }

       $daily_routines = DailyRoutine::where('staff_id', auth()->guard('staffs')->user()->id)->where('en_year', date('Y'))->where('en_month',date('m'))->where('en_day',date('d'))->get();
       
       foreach ($daily_routines as $key => $daily_routine) {
        $wsd = Carbon::parse($daily_routine->start_time);
        if($daily_routine->finish_time != '0000-00-00 00:00:00'){
          $wfd = Carbon::parse($daily_routine->finish_time);
        } else{
          $wfd = Carbon::parse(date('Y-m-d H:i:s'));
        }
        $interval_hour = $wsd->diff($wfd)->format('%H');
        $interval_minute = $wsd->diff($wfd)->format('%I');
        $timedif = $interval_hour + ($interval_minute / 60);
        $first_dif_hour = $begain_time->diff($wsd)->format('%H');
        $first_dif_min = $begain_time->diff($wsd)->format('%I');
        $width = $timedif * 8.33;
        $bfdif = $first_dif_hour  + ($first_dif_min /60);
        $margin = $bfdif * 8.33;
        $datas['daily_routine'][] = [
          'id' => $daily_routine->id,
          'title' => $daily_routine->description,
          
          'start_hour' => $wsd->hour.':'.$wsd->minute,
          'finish_time' => $wfd->hour.':'.$wfd->minute,
        
          'width' => $width,
          'margin' => $margin,
          'type' => 'Daily',
          'data_type' => $daily_routine->type
        ];
        
       }

       $timebookings = \App\TimeBooking::where('booked_by', auth()->guard('staffs')->user()->id)->where('booking_date', date('Y-m-d'))->get();
       foreach ($timebookings as $key => $timebooking) {
        $bsd = Carbon::parse($timebooking->booking_date.' '.$timebooking->booking_time);
        if($timebooking->to_date != ''){
          if($timebooking->to_date == date('Y-m-d')){
            $tfd = Carbon::parse($timebooking->to_date.' '.$timebooking->to_time);
          } else{
            $tfd = Carbon::parse($timebooking->to_date.' 18:59:00');
          }

        } else{
          $tfd = Carbon::parse(date('Y-m-d h:i:s'));
        }
        $bi_hour = $bsd->diff($tfd)->format('%H');
        $bi_min = $bsd->diff($tfd)->format('%I');
        $bt_dif = $bi_hour + ($bi_min / 60);
        $fdh = $begain_time->diff($bsd)->format('%H');
        $fdm = $begain_time->diff($bsd)->format('%I');
        $tw = $bt_dif * 8.33;
        $tfdif = $fdh  + ($fdm /60);
        $tm = $tfdif * 8.33;
        $datas['daily_routine'][] = [
          'id' => $timebooking->id,
          'title' => $timebooking->place.' '.$timebooking->description,
          
          'start_hour' => $timebooking->booking_date.' '.$bsd->hour.':'.$bsd->minute,
          'finish_time' => $timebooking->to_date.' '.$tfd->hour.':'.$tfd->minute,
        
          'width' => $tw,
          'margin' => $tm,
          'type' => 'Time',
          'data_type' => ''
        ];
        
       }

       $ltbookings = \App\TimeBooking::where('booked_by', auth()->guard('staffs')->user()->id)->where('booking_date', '<', date('Y-m-d'))->where('to_date', '>=', date('Y-m-d'))->get();
       foreach ($ltbookings as $key => $ltbooking) {
        $lbsd = Carbon::parse(date('Y-m-d 07:00:00'));
        if($ltbooking->to_date != ''){
          if($ltbooking->to_date == date('Y-m-d')){
            $ltfd = Carbon::parse($ltbooking->to_date.' '.$ltbooking->to_time);
          } else{
            $ltfd = Carbon::parse($ltbooking->to_date.' 18:59:00');
          }

        } else{
          $ltfd = Carbon::parse(date('Y-m-d h:i:s'));
        }
        $lbi_hour = $lbsd->diff($ltfd)->format('%H');
        $lbi_min = $lbsd->diff($ltfd)->format('%I');
        $lbt_dif = $lbi_hour + ($lbi_min / 60);
        $lfdh = $begain_time->diff($lbsd)->format('%H');
        $lfdm = $begain_time->diff($lbsd)->format('%I');
        $ltw = $lbt_dif * 8.33;
        $ltfdif = $lfdh  + ($lfdm /60);
        $ltm = $ltfdif * 8.33;
        $datas['daily_routine'][] = [
          'id' => $ltbooking->id,
          'title' => $ltbooking->place.' '.$ltbooking->description,
          
          'start_hour' => $ltbooking->booking_date.' '.$lbsd->hour.':'.$lbsd->minute,
          'finish_time' => $ltbooking->to_date.' '.$ltfd->hour.':'.$ltfd->minute,
        
          'width' => $ltw,
          'margin' => $ltm,
          'type' => 'Time',
          'data_type' => ''
        ];
        
       }
       
       //dd($datas);

       $datas['kra'] = \App\StaffKra::where('staff_id', auth()->guard('staffs')->user()->id)->get();

       $datas['total_staff'] = Adjustment_staff::where('status', 1)->count();
       $datas['completed_task'] = StaffTask::where('personal', 0)->where('branch_id', auth()->guard('staffs')->user()->branch)->where('complete_status',1)->count();
       $datas['crossed_task'] = StaffTask::where('personal', 0)->where('branch_id', auth()->guard('staffs')->user()->branch)->where('complete_status', '!=', 1)->where('finish_time', '<=', date('Y-m-d h:i:s'))->count();
       $datas['inprocess_task'] = StaffTask::where('personal', 0)->where('branch_id', auth()->guard('staffs')->user()->branch)->where('accept_status', 1)->where('complete_status', '!=', 1)->where('finish_time', '>=', date('Y-m-d h:i:s'))->count();
       $datas['notaccepted_task'] = StaffTask::where('personal', 0)->where('branch_id', auth()->guard('staffs')->user()->branch)->where('accept_status', 0)->count();

       $datas['completed_help'] = HelpDesk::where('branch_id', auth()->guard('staffs')->user()->branch)->where('complete_status',1)->count();
       $datas['crossed_help'] = HelpDesk::where('branch_id', auth()->guard('staffs')->user()->branch)->where('complete_status', '!=', 1)->where('finish_time', '<=', date('Y-m-d h:i:s'))->count();
       $datas['inprocess_help'] = HelpDesk::where('branch_id', auth()->guard('staffs')->user()->branch)->where('accept_status', 1)->where('complete_status', '!=', 1)->where('finish_time', '>=', date('Y-m-d h:i:s'))->count();
       $datas['notaccepted_help'] = HelpDesk::where('branch_id', auth()->guard('staffs')->user()->branch)->where('accept_status',0 )->count();
       
       $datas['bstaffs'] = \App\Branch::select('name','staffs')->orderBy('staffs','desc')->limit(4)->get();
       $datas['placeholder'] = Imagetool::mycrop('blank-image.png', 200,200);

       $Adjust_staff = \App\Adjustment_staff::select('id', 'name', 'joindate', 'probation_end_date', 'supervisor', 'designation', 'department')->where('id', auth()->guard('staffs')->user()->id)->latest()->first();
        $probation = \App\ProbationEvaluation::where('staff_id', auth()->guard('staffs')->user()->id)
                      ->latest()->first();
        $avgMonth = (Carbon::parse($Adjust_staff->joindate)->format('m') + Carbon::parse($Adjust_staff->probation_end_date)->format('m')) / 2;
        // $avgDate = Carbon::parse($Adjust_staff->joindate)->format('Y').'-'.$avgMonth.'-'.Carbon::parse($Adjust_staff->probation_end)->format('d');
        $avgDate = Carbon::parse($Adjust_staff->joindate)->addMonths($avgMonth)->format('Y-m-d');
        $status = 'NONE';
        $isFinalMonth = FALSE;
        $isMidMonth = FALSE;
        if($Adjust_staff->probation_end_date <= Date("Y-m-d")){
            if(isset($probation) && $probation->staff_final_comment == NULL){
                $status = 'FINAL';
                $isFinalMonth = TRUE;
            }
        }else{
            if($Adjust_staff->probation_end_date <= $avgDate){
                if(isset($probation) && $probation->staff_mid_comment == NULL){
                  $status = 'MID';
                  $isMidMonth = TRUE;
                }
            }
        }
        if($probation){
          $attribute = json_decode($probation->attribute);
          $conclusion = json_decode($probation->conclusion);
      }else{
          $attribute = [];
          $conclusion = [];
      }
        $staff = $Adjust_staff;
        return view('branchadmin.dashboard', compact('status', 'probation', 'attribute', 'conclusion', 'avgDate', 'isFinalMonth', 'isMidMonth', 'staff'))->with('data', $datas);
    }


    public function profile(Request $request)
    {
        $staff = Adjustment_staff::where('id', auth()->guard('staffs')->user()->id)->first();
  $data['branchadmin']= $staff;


 
  $data['marital_status'][] = ['value' => '1','Title' => 'Married'];
  $data['marital_status'][] = ['value' => '2','Title' => 'Unmarried'];

  $data['status'][] = ['value' => '1','Title' => 'Completed'];
$data['status'][] = ['value' => '2','Title' => 'Not Completed'];

  
  $data['gender'][] = ['value' => 'Male','Title' => 'Male'];
  $data['gender'][] = ['value' => 'Female','Title' => 'Female'];


  
$data['education_level'][] = ['value' => '1','Title' => 'S.L.C'];
$data['education_level'][] = ['value' => '2','Title' => 'Intermediate'];
$data['education_level'][] = ['value' => '3','Title' => 'Bachelor\'s'];
$data['education_level'][] = ['value' => '4','Title' => 'Master\'s'];


 

  $data['placeholder'] = Imagetool::mycrop('back.png', 200,200);
  if($staff->image != ''){

    $data['image'] = Imagetool::mycrop($staff->image, 200,200);
  }
  else {
    $data['image'] = Imagetool::mycrop('back.png', 200,200);
  }

  


  $data['faculty'] = Faculty::where('level_id', $staff->education_level)->orderBy('name', 'asc')->get();
  
  
  $data['education_level'] = EducationLevel::get();
  $data['employment_history'] = \App\EmploymentHistory::where('staff_id', auth()->guard('staffs')->user()->id)->orderBy('promoted_date', 'desc')->get();

  if($staff) {  
    return view('branchadmin.editform')->with('datas', $data);
  } else {

   \Session::flash('alert-danger','You choosed wrong data');
   return redirect('branchadmin'); 
 }
    }

    

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
                'id' => 'required|integer',
                'email'=>'required|email|unique:employers,email,'.$request->id.',id',
                'password' => 'confirmed|min:6',
            ]);
        Adjustment_staff::where('id', $request->id)->update(['email' => $request->email, 'password' => bcrypt($request->password)]);
                \Session::flash('alert-success','Record have been saved Successfully');
                    return redirect('branchadmin');
    }


    public function getfaculty(Request $request)
    {
        if (isset($request->id)) {
            $datas = Faculty::where('level_id', $request->id)->orderBy('name', 'asc')->get();
            return $datas;
            // return view('admin.faculty.faculties')->with('datas', $datas);
        }
    }


    public function deleteFile(Request $request){

        $ofile = Adjustment_staff::where('id', $request->id)->first();
        if(isset($ofile->id)){
          if ($request->title == 'resume') {
            $fname = DIR_IMAGE.$ofile->resume;
          } elseif ($request->title == 'offer_letter') {
            $fname = DIR_IMAGE.$ofile->offer_letter;
          }
          elseif ($request->title == 'contract') {
            $fname = DIR_IMAGE.$ofile->contract;
          }
          elseif ($request->title == 'id_proof') {
            $fname = DIR_IMAGE.$ofile->id_proof;
          } else{
            $fname = '';
          }
          
          if(is_file($fname)){
            File::delete($fname);
          }

        Adjustment_staff::where('id', $request->id)->update([$request->title => '']);

        return 'Success';

        }
        else{
          return '';
        }

    }

    public function uploadImage(Request $request)
    {
        $directory = DIR_IMAGE . 'catalog/staffs/'.auth()->guard('staffs')->user()->id;

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        if ($request->hasFile('file')) {
         $v= Validator::make($request->all(),
                        [
                    'file'=>'mimes:jpeg,jpg,png,gif|required|max:1000',
                   
                        ]);
                 if($v->fails())
                    {
                        \Session::flash('alert-danger','Your file type did not match or your file size is too big.');
                    return redirect()->back();        
                    } 
        $user_profile = Adjustment_staff::where('id', auth()->guard('staffs')->user()->id)->first();
        if (isset($user_profile->image)) {

            if (is_file(DIR_IMAGE.$user_profile->image)) {
                    File::delete(DIR_IMAGE.$user_profile->image);

                
                }
        }
        $file = $request->File('file');
        $str = preg_replace('/\s+/', '', $file->getClientOriginalName());
            $path = $directory.'/' . $str;
            
            Image::make($file->getRealPath())->save($path);
            Adjustment_staff::where('id',auth()->guard('staffs')->user()->id)->update(['image' => 'catalog/staffs/'.auth()->guard('staffs')->user()->id.'/'.$str]);
        \Session::flash('alert-success','Record have been updated Successfully');
                    return redirect()->back();
                }
                else {
                     \Session::flash('alert-danger','File did not found.');
                    return redirect()->back(); 
                }
    }


    public function updateProfile(Request $request)
        {
         

        
         $v= Validator::make($request->all(),
          [
            
            'name' => 'required|min:3',
            'gender' => 'required',
             'afile*' => 'mimes:pdf,doc,docx|max:10000',

          ]);
       


       
        if($v->fails())
        {
          return redirect()->back()->withErrors($v)
          ->withInput();
        } else 
        {
          $staff = Adjustment_staff::select('resume', 'offer_letter', 'id', 'contract', 'id_proof')->where('id', $request->id)->first();
        $resume = $staff->resume;
          $offer_letter = $staff->offer_letter;
          $contract  = $staff->contract;
          $id_proof = $staff->id_proof;
          if($request->hasFile('resume')){
            $this->validate($request, [
              'resume' => 'mimes:pdf,doc,docx|max:10000'
            ]);
            $rfile = DIR_IMAGE.$staff->resume;
            if (is_file($rfile)) {
              File::delete($rfile);
            }
            $directory = DIR_IMAGE . 'file';
            if(!is_dir($directory)){
                   mkdir($directory); 
                 }
                $file = $request->File('resume');
                 $ext = $file->getClientOriginalExtension();
                 $resume = 'file/'.rand().'.'.$ext;
                 $path = $directory.'/';
                 $file->move($path, $resume);       

               
              
           }
           if($request->hasFile('offer_letter')){
            $this->validate($request, [
              'offer_letter' => 'mimes:pdf,doc,docx,jpg,jpeg|max:10000'
            ]);

             $ofile = DIR_IMAGE.$staff->offer_letter;
            if (is_file($ofile)) {
              File::delete($ofile);
            }
            $directory = DIR_IMAGE . 'file';
            if(!is_dir($directory)){
                   mkdir($directory); 
                 }
                $file = $request->File('offer_letter');
                 $ext = $file->getClientOriginalExtension();
                 $offer_letter = 'file/'.rand().'.'.$ext;
                 $path = $directory.'/';
                 $file->move($path, $offer_letter);       

               
              
           }

           if($request->hasFile('contract')){
            $this->validate($request, [
              'contract' => 'mimes:pdf,doc,docx,jpg,jpeg|max:10000'
            ]);
             $cfile = DIR_IMAGE.$staff->contract;
            if (is_file($cfile)) {
              File::delete($cfile);
            }
            $directory = DIR_IMAGE . 'file';
            if(!is_dir($directory)){
                   mkdir($directory); 
                 }
                $file = $request->File('contract');
                 $ext = $file->getClientOriginalExtension();
                 $contract = 'file/'.rand().'.'.$ext;
                 $path = $directory.'/';
                 $file->move($path, $contract);         
              
           }

           if($request->hasFile('id_proof')){
            $this->validate($request, [
              'id_proof' => 'mimes:pdf,doc,docx,jpg,jpeg|max:10000'
            ]);
             $ifile = DIR_IMAGE.$staff->id_proof;
            if (is_file($ifile)) {
              File::delete($ifile);
            }
            $directory = DIR_IMAGE . 'file';
            if(!is_dir($directory)){
                   mkdir($directory); 
                 }
                $file = $request->File('id_proof');
                 $ext = $file->getClientOriginalExtension();
                 $id_proof = 'file/'.rand().'.'.$ext;
                 $path = $directory.'/';
                 $file->move($path, $id_proof);       

               
              
           }

          $newdata = array(
            
            'name' => $request->name,
            'f_name' => $request->f_name,
            'gender' => $request->gender,            
            'dob' =>  $request->dob,
            'permanent_address' =>  $request->permanent_address,
            'temporary_address' =>  $request->temporary_address,
            'account_number' =>  $request->account_number,
            'bank_name' =>  $request->bank_name,
            'blood_group' =>  $request->blood_group,
            'marital_status' =>  $request->marital_status,
            'resume' => $resume,
            'offer_letter' => $offer_letter,
            'contract' => $contract,
            'id_proof' => $id_proof,
            'education_level' => $request->education_level,
            'faculty' => $request->faculty,
            'phone' => $request->phone,
          );



         $member = Adjustment_staff::where('id', $request->id)->update($newdata);



         if($member)
         {
             
           
          \Session::flash('alert-success','Record have been updated Successfully');
          return redirect('branchadmin');

        } else {

          \Session::flash('alert-danger','Something Went Wrong on updating data');
          return redirect()->back(); 

        }



        }


        }

    public function changepassword(Request $request)
    {
        return view('branchadmin.changepassword');
    }


  //save reminder
  public function saveReminder(Request $request)
  {
    $this->validate($request, [
        'note_id' => 'required|integer',
        'reminder_detail' => 'required',
        'reminder_date' => 'required',
        'reminder_time' => 'required',
    ]);
    $datas = [
      'staff_id' => auth()->guard('staffs')->user()->id, 
      'note_id' => $request->note_id,
      'description' => $request->reminder_detail,
      'date' => $request->reminder_date,
      'time' => $request->reminder_time,
      'status' => 0
    ];
    $data = Reminder::where('note_id', $request->note_id)->where('staff_id', auth()->guard('staffs')->user()->id)->first();
    if($data)
    {
      $data = Reminder::where('note_id', $request->note_id)->where('staff_id', auth()->guard('staffs')->user()->id)->update($datas);
    }else{
      $data = Reminder::create($datas);
    }
    $data = Reminder::where('note_id', $request->note_id)->first();
    $response = array(
        'status' => 'success',
        'msg' => $data
    );
    return response()->json($response);
  }

  public function getReminder(Request $request)
  {
    $data = Reminder::where('staff_id', auth()->guard('staffs')->user()->id)
                      ->where('date', Carbon::today()->format('Y-m-d'))
                      ->where('time', '<=', Carbon::now()->format('H:i'))
                      ->where('status', 0)
                      ->with('user')
                      ->get();
    if(count($data) == 0){
      $data = '';
    }
    $response = array(
        'status' => 'success',
        'msg' => $data
    );
    return response()->json($response);
  }

  public function updateReminder(Request $request)
  {
    $data = Reminder::where('note_id', $request->note_id)->where('staff_id', auth()->guard('staffs')->user()->id)->update(['status' => 1]);
    $data = Reminder::where('note_id', $request->note_id)->first();
    $response = array(
        'status' => 'success',
        'msg' => $data
    );
    return response()->json($response);
  }
  public function snoozeReminder(Request $request)
  {
    $data = Reminder::where('note_id', $request->note_id)->where('staff_id', auth()->guard('staffs')->user()->id)->first();
    $date = Carbon::today()->format('Y-m-d');
    $time = Carbon::now()->addHours(1)->format('H:i:s');
    $data->date = $date;
    $data->time = $time;
    $data->save();
    $response = array(
        'status' => 'success',
        'msg' => $data
    );
    return response()->json($response);
  }
  public function saveStickyTitle(Request $request)
  {
    $data = StickerNote::where('id', $request->id)->where('added_by', auth()->guard('staffs')->user()->id)->update(['title' => $request->title]);
    $data = StickerNote::find($request->id);
    $response = array(
        'status' => 'success',
        'msg' => $data
    );
    return response()->json($response);
  }
  public function checkReminderForSticky(Request $request)
  {
    $data = Reminder::where('note_id', $request->id)->first();
    $response = array(
        'status' => 'success',
        'msg' => $data
    );
    return response()->json($response);
  }



  //staff add salary
  public function getStaffForSalary(Request $request)
  {
    $url = '';
    $datas['filter_name'] = '';
    // return $request->filter_name;
    $staff = Adjustment_staff::select('name', 'id', 'employmentType')->where('branch',auth()->guard('staffs')->user()->branch)->where('status', 1);
    if (isset($request->filter_name)) {
      return $request->filter_name;
      $datas['filter_name'] = $request->filter_name;
      $url .= '&filter_name='.$request->filter_name;
      $staff->where('name', 'LIKE', $request->filter_name.'%');
    }
    
    $datas['staffs'] = $staff->orderBy('name', 'asc')->paginate(100)->setPath('/staffs/staff_salary?'.$url);
    $datas['url'] = $url;
    return view('branchadmin.salary.staffSalary.index')->with('datas', $datas);
  }
  public function viewStaffForSalary($staff_id)
  {
    $staff = $staff_id;
    $salaries = \App\StaffSalary::where('staff_id', $staff_id)->paginate(10);
    return view('branchadmin.salary.staffSalary.viewSalary', compact('salaries', 'staff'));
  }
public function addSalary($id, Request $request)
{
  $data['yn'][] = ['value' => 1, 'title' => 'Yes'];
  $data['yn'][] = ['value' => 2, 'title' => 'No'];

  $data['sad'][] = ['value' => 1, 'title' => 'Add'];
  $data['sad'][] = ['value' => 2, 'title' => 'Subtract'];
  $salary_id = '0';

  $data['salary'] = [
      'salary_id' => $salary_id,
      'staff_id' => $id, 
      'base_salary' => '0.00', 
      'basic_salary' => '0.00', 
      'incentive' => '0.00', 
      'da' => '0.00', 
      'con_a' => '0.00',
      'daily_a' => '0.00',
      'fuel_a' => '0.00',
      'mobile_a' => '0.00',
      'project_a' => '0.00',
      'pf' => '0',
      'cit' => '0.00',
      'insurance' => '0.00',
      'petty_cash' => '0.00',
      'advance' => '0.00',
      'advance_canteen' => '0.00',
      'ot' => '0',
      'salary_date' => Carbon::today()->format('Y-m-d'),
      'others' => '0.00',
  ];
  $salary = StaffSalary::where('staff_id', $id)->orderBy('id','desc')->first();
  if (isset($salary->id)) {
    $salary_id = $salary->id;
    $data['salary'] = [
      'salary_id' => '0',
      'staff_id' => $salary->staff_id, 
      'base_salary' => $salary->base_salary, 
      'basic_salary' => $salary->basic_salary, 
      'incentive' => $salary->incentive, 
      'da' => $salary->da, 
      'con_a' => $salary->con_a,
      'daily_a' => $salary->daily_a,
      'fuel_a' => $salary->fuel_a,
      'mobile_a' => $salary->mobile_a,
      'project_a' => $salary->project_a,
      'pf' => $salary->pf,
      'cit' => $salary->cit,
      'insurance' => $salary->insurance,
      'petty_cash' => $salary->petty_cash,
      'advance' => $salary->advance,
      'advance_canteen' => $salary->advance_canteen,
      'ot' => $salary->ot,
      'salary_date' => $salary->salary_date,
      'others' => $salary->others,
    ];
  }
  $data['staff_allowance'] = StaffAllowance::where('salary_id', $salary_id)->get();
  return view('branchadmin.salary.staffSalary.createSalary')->with('data', $data);
}

public function editSalary($id, Request $request)
{
  $data['yn'][] = ['value' => 1, 'title' => 'Yes'];
  $data['yn'][] = ['value' => 2, 'title' => 'No'];

  $data['sad'][] = ['value' => 1, 'title' => 'Add'];
  $data['sad'][] = ['value' => 2, 'title' => 'Subtract'];

  $salary = StaffSalary::where('id', $id)->orderBy('id','desc')->first();
  if (!isset($salary->id)) {
    \Session::flash('alert-danger', 'salary detail not found');
  }
  
  $data['salary'] = [
    'salary_id' => $salary->id,
    'staff_id' => $salary->staff_id, 
    'base_salary' => $salary->base_salary, 
    'basic_salary' => $salary->basic_salary, 
    'incentive' => $salary->incentive, 
    'da' => $salary->da, 
    'con_a' => $salary->con_a,
    'daily_a' => $salary->daily_a,
    'fuel_a' => $salary->fuel_a,
    'mobile_a' => $salary->mobile_a,
    'project_a' => $salary->project_a,
    'pf' => $salary->pf,
    'cit' => $salary->cit,
    'advance' => $salary->advance,
    'advance_canteen' => $salary->advance_canteen,
    'petty_cash' => $salary->petty_cash,
    'insurance' => $salary->insurance,
    'ot' => $salary->ot,
    'salary_date' => $salary->salary_date,
    'others' => $salary->others,
  ];

  $data['staff_allowance'] = StaffAllowance::where('staff_id', $id)->get();
  return view('branchadmin.salary.staffSalary.createSalary')->with('data', $data);  
}

public function salarySave(Request $request)
{
  $this->validate($request, [
      'salary_id' => 'required|integer',
      'staff_id' => 'required|integer', 
      'base_salary' => 'required', 
      'basic_salary' => 'required', 
      'incentive' => 'required', 
      'da' => 'required', 
      'con_a' => 'required',
      'daily_a' => 'required',
      'fuel_a' => 'required',
      'mobile_a' => 'required',
      'project_a' => 'required',
      'pf' => 'required',
      'cit' => 'required',
      'ot' => 'required',
      'insurance' => 'required',
      'advance' => 'required',
      'advance_canteen' => 'required',
      'petty_cash' => 'required',
      'salary_date' => 'required',
      'others' => 'required',
  ]);
  $total_amount = $request->incentive + $request->fuel_a + $request->mobile_a + $request->project_a + $request->con_a + $request->daily_a + $request->da;
  $data = [
      'staff_id' => $request->staff_id, 
      'base_salary' => $request->base_salary, 
      'basic_salary' => $request->basic_salary, 
      'incentive' => $request->incentive, 
      'da' => $request->da, 
      'con_a' => $request->con_a,
      'daily_a' => $request->daily_a,
      'fuel_a' => $request->fuel_a,
      'mobile_a' => $request->mobile_a,
      'project_a' => $request->project_a,
      'pf' => $request->pf,
      'cit' => $request->cit,
      'advance' => $request->advance,
      'advance_canteen' => $request->advance_canteen,
      'petty_cash' => $request->petty_cash,
      'insurance' => $request->insurance,
      'ot' => $request->ot,
      'salary_date' => $request->salary_date,
      'others' => $request->others,
  ];
  if ($request->salary_id > 0) {
    StaffSalary::where('id', $request->salary_id)->update($data);
    StaffAllowance::where('staff_id', $request->staff_id)->delete();
    foreach ($request->allowance as $key => $value) {
      if($value['amount'] != null && $value['amount'] > 0){
        $data= [
          'salary_id' => $request->salary_id,
          'staff_id' => $request->staff_id,
          'title' => $value['title'],
          'amount' => $value['amount'],
          'type' => $value['type']
        ];
        $total_amount += $value['amount'];
        StaffAllowance::create($data);
      }
    }
    StaffSalary::where('id', $request->salary_id)->update(['total_salary' => $total_amount]);

  } else{
    $salary = StaffSalary::create($data);
      foreach ($request->allowance as $key => $value) {
        if($value['amount'] != null && $value['amount'] > 0){
          $data= [
            'salary_id' => $salary->id,
            'staff_id' => $request->staff_id,
            'title' => $value['title'],
            'amount' => $value['amount'],
            'type' => $value['type']
          ];
          $total_amount += $value['amount'];
          StaffAllowance::create($data);
        }
      }
    StaffSalary::where('id', $salary->id)->update(['total_salary' => $total_amount]);

    //save employee history of salary
    $history = \App\EmploymentHistory::where('type', 5)->where('staff_id', $request->staff_id)->orderBy('id','desc')->first();
    $staff = \App\Adjustment_staff::select('id', 'department')->find($request->staff_id);
    $department = \App\Department::getTitle($staff->department);
    $current_salary = $salary->basic_salary + $total_amount;
    if(isset($history)){
      $data = [
        'staff_id' => $staff->id,
        'type' => 5,
        'department' => $department,
        'previous' => $history->current,
        'current' => $current_salary,
        'promoted_date' => Date('Y-m-d')
      ];
      \App\EmploymentHistory::create($data);
    }else{
      $prevSalary = StaffSalary::where('id', '!=', $salary->id)->orderBy('salary_date', 'desc')->first();
      if($prevSalary){
        $pcsalary = $prevSalary->basic_salary + $prevSalary->total_salary;
        $data = [
          'staff_id' => $staff->id,
          'type' => 5,
          'department' => $department,
          'previous' => $pcsalary,
          'current' => $current_salary,
          'promoted_date' => Date('Y-m-d')
        ];
      }else{
        $data = [
          'staff_id' => $staff->id,
          'type' => 5,
          'department' => $department,
          'previous' => '',
          'current' => $current_salary,
          'promoted_date' => Date('Y-m-d')
        ];
      }
      
      \App\EmploymentHistory::create($data);
    }
  }
  \Session::flash('alert-success', 'Data Added Successfully');
  return redirect('/branchadmin/staff_salary/'.$request->staff_id);
}

public function DeleteSalary($id='')
{
  StaffSalary::where('id', $id)->delete();
  StaffAllowance::where('salary_id', $id)->delete();
  \Session::flash('alert-success', 'Data Deleted Successfully');
  return redirect()->back();
}
   
public function welcomeComment(Request $request)
{
  $data = [
    'staff_id' => auth()->guard('staffs')->user()->id,
    'newsfeed_id' => (int)$request->newsfeed,
    'description' => $request->description,
  ];
  \App\NewsFeedComment::create($data);
  $response = array(
      'status' => 'success',
      'data' => $data,
  );
  return response()->json($response);
}    

public function getStaffList(Request $request)
{
  if (isset($request->term)) {
    $data = \App\Adjustment_staff::where('status', 1)
                ->where('branch', auth()->guard('staffs')->user()->branch)
                ->select('id', 'name', 'image');
    if(auth()->guard('staffs')->user()->department != 4)
    {
      $data = $data->where('supervisor', auth()->guard('staffs')->user()->id);
    }
    $data = $data->where('name', 'LIKE', $request->term.'%')
                ->skip(0)->take(10)
                ->get();
    
        $result = array();
        
        foreach ($data as $key => $v) {
          $name = $v->name;
          $image = 'blank-image.png';
          if($v->image){
            $image = $v->image;
          }
          $url = url('/branchadmin').'/otstaff/reports'.'/'.$v->id;
          $staff['id']    = $v->id;
          $staff['value'] = $name;
          $staff['url'] = $url;
          $staff['label'] = '
          <a href="'.$url.'">
              <img src="'.asset("image/".$image).'" style="width:50px; height: 50px; object-fit:contain;"/>
              <span>'.$name.'</span>
          </a>';
          array_push($result, $staff);
        }
       return response()->json($result);
   }
}


    
    
}