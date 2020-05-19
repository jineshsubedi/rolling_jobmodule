<?php

namespace App\Console\Commands;

use Mail;
use App\Adjustment_staff;
use App\OnBoardStaff;
use App\Attendance;
use App\StaffTask;
use App\StaffKpi;
use App\KpiRating;
use App\HelpDesk;
use App\StaffRating;
use App\Achievements;
use App\LeaveSetting;
use App\CompensatoryOff;
use App\MostStaff;
use App\LeaveRequest;
use App\Otrequest;
use Carbon\Carbon;
use App\library\NepaliDateApi;
use Illuminate\Console\Command;

class BranchAdminCron extends Command
{
    use NepaliDateApi;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'branchAdmin:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $onboardingstaffs = OnBoardStaff::where('joining_date', '<=', date('Y-m-d'))->where('hr_approval','accepted')->get();
        foreach ($onboardingstaffs as $key => $ostaff) {
            $chst = Adjustment_staff::where('email', $ostaff->email)->count();
            if($ostaff->nature_of_job == 1){
              $employmentType = 1;
            }else{
              $employmentType = 2;
            }
            if($ostaff->nature_of_employment == 'Permanent'){
                $staffStatus = 1;
            }else{
                $staffStatus = 0;
            }
            if($chst < 1){
                $sdt = [
                'branch' => $ostaff->branch_id,
                'supervisor' => $ostaff->supervisor_id,
                'name' => $ostaff->name,
                'email' => $ostaff->email,
                'salary' => $ostaff->salary,
                'password' => bcrypt('rolling@123'),
                'joindate' => $ostaff->joining_date,
                'staffType'=>$ostaff->staffType,
                'employmentType'=>$employmentType,
                'nature_of_employment' => $staffStatus,
                'status' => 1,
                'on_board' => 0,
                'on_board_date' => null,
                'agrement' => 0
                ];
                Adjustment_staff::create($sdt);
            }
        }


        $travels = \App\Travel::where('from', '<=', Date('Y-m-d'))->where('to', '>=', Date('Y-m-d'))->get();
        foreach($travels as $travel)
        {
          $staff = \App\Adjustment_staff::select('id', 'name', 'branch', 'shifttime', 'primary_location', 'secondary_location')->find($travel->assigned_to);
          $shift = \App\Shifttime::find($staff->shifttime);
          $date = $this->eng_to_nep(Date('Y'), Date('m'), Date('d'));
          $nepali_year = $date['year'];
          $nepali_month = $date['month'];
          $nepali_day = $date['date'];
          $data = [
            'adjustment_staff_id' => $staff->id,
            'branch_id' => $staff->branch,
            'attendance_date' => Date('Y-m-d'),
            'in_time' => $shift->from,
            'out_time' => $shift->to,
            'in_location' => isset($staff->primary_location) ? $staff->primary_location : '',
            'out_location' => isset($staff->primary_location) ? $staff->primary_location : '',
            'np_year' => $nepali_year,
            'np_month' => $nepali_month,
            'np_date' => $nepali_day,
            'approve' => 1,
            'manual' => 1,
            'remarks' => 'Travel Attendance',
          ];
          if(!\App\Attendance::where('adjustment_staff_id', $staff->id)->where('attendance_date', Date('Y-m-d'))->first())
          {
            \App\Attendance::create($data);
          }
        }

        

        // $npatts = Attendance::where('np_year','')->get();
        // foreach ($npatts as $key => $nptt) {
        //   $attendance_date = Carbon::parse($nptt->attendance_date);
        //   $nep_date = $this->eng_to_nep($attendance_date->year, $attendance_date->month, $attendance_date->day);
        //   $data = [
        //     'np_year' => $nep_date['year'],
        //     'np_month' => $nep_date['month'],
        //     'np_date' => $nep_date['date'],
        //   ];
        //   Attendance::where('id', $nptt->id)->update($data);
        // }
        // $now  = Carbon::now();
        // $staffs = Adjustment_staff::select('id','dob','name')->where('dob', '!=', '0000-00-00')->get();
        // foreach($staffs as $staff)
        // {
        //     $dt = Carbon::parse($staff->dob);
        //     $day = $dt->diffInDays($now);
        //     $year = $day / 365;
        //     Adjustment_staff::where('id', $staff->id)->update(['age' => $year]);
        // }

        // $most_staffs = Adjustment_staff::select('id','staffType', 'branch')->where('status', 1)->get();
        // foreach ($most_staffs as $key => $ms) {
        //   $total_sick_leave = LeaveRequest::where('requested_by',$ms->id)->where('leave_type',1)->where('start_date', 'LIKE', date('Y').'%')->count();
        //   $total_personal_leave = LeaveRequest::where('requested_by',$ms->id)->where('leave_type',2)->where('start_date', 'LIKE', date('Y').'%')->count();
        //   $wow = StaffTask::where('task_to', $ms->id)->where('personal', 0)->where('supervisor_mark', '>=', '9')->where('start_time', 'LIKE', date('Y').'%')->count();
        //   $kp = [];
        //   $kpis = StaffKpi::where('staff_id', $ms->id)->get();
        //   foreach ($kpis as $key => $kpi) {
        //     $kp[] = $kpi->id;
        //   }
        //   $avg_kpi = KpiRating::whereIn('kpi_id',$kp)->where('created_at', 'LIKE', date('Y').'%')->avg('rating');
        //   $help_desk = HelpDesk::where('task_to',$ms->id)->where('finish_time', 'LIKE', date('Y').'%')->where('complete', 1)->count();
        //   $attendance = Attendance::where('adjustment_staff_id', $ms->id)->where('attendance_date', 'LIKE', date('Y').'%')->count();
        //   $client_rating = StaffRating::where('adjustment_staff_id', $ms->id)->where('year',date('Y'))->avg('overal_rating');
        //   $achievement = Achievements::where('adjustment_staff_id', $ms->id)->where('achievement_date', 'LIKE', date('Y').'%')->count();
        //   $comp_off = CompensatoryOff::where('requested_by', $ms->id)->where('work_day', 'LIKE', date('Y').'%')->where('status',1)->count();
        //   $ot = Otrequest::where('adjustment_staff_id', $ms->id)->where('ot_date', 'LIKE', date('Y').'%')->count();
        //   if ($avg_kpi > 0) {
        //     $avkpi = $avg_kpi;
        //   }else{
        //     $avkpi = 0;
        //   }
        //   if ($client_rating > 0) {
        //     $crating = $client_rating;
        //   } else {
        //     $crating = 0;
        //   }
        //   $check = MostStaff::where('staff_id',$ms->id)->count();
        //   if ($check > 0) {
        //     $data = [
        //       'branch_id' => $ms->branch,
        //       'sick_leave' => $total_sick_leave, 
        //       'personal_leave' => $total_personal_leave, 
        //       'wow_rating' => $wow, 
        //       'kpi_rating' => $avkpi, 
        //       'help_desk' => $help_desk, 
        //       'attendance' => $attendance, 
        //       'client_rating' => $crating,
        //       'achievement' => $achievement,
        //       'comp_off' => $comp_off,
        //       'overtime' => $ot,
        //       'staff_type' => $ms->staffType,
        //     ];
        //     MostStaff::where('staff_id', $ms->id)->update($data);
        //   } else {
        //      $data = [
        //       'branch_id' => $ms->branch,
        //       'staff_id' => $ms->id,
        //       'sick_leave' => $total_sick_leave, 
        //       'personal_leave' => $total_personal_leave, 
        //       'wow_rating' => $wow, 
        //       'kpi_rating' => $avkpi, 
        //       'help_desk' => $help_desk, 
        //       'attendance' => $attendance, 
        //       'client_rating' => $crating,
        //       'achievement' => $achievement,
        //       'comp_off' => $comp_off,
        //       'overtime' => $ot,
        //       'staff_type' => $ms->staffType,
        //     ];
        //     MostStaff::create($data);
        //   }
        // }
    }
}
