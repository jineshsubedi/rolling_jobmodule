<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LeaveRequest;
use Carbon\Carbon;

class SalarySheet extends Model
{
    protected $table = 'salary_sheet';
    

    protected $fillable = ['staff_id', 'designation', 'marital_status', 'gender', 'bank', 'account_no', 'month', 'pay_month', 'working_day', 'work_day', 'unpaid_leave', 'unpaid_leave_amount', 'monthly_slab', 'daily_rate', 'overtime', 'overtime_amount', 'advance', 'advance_canteen', 'pf', 'allowances','branch_id', 'en_year', 'en_month', 'np_year', 'np_month', 'tax', 'grand_amount','name','total_deduction','net_salary', 'incentive', 'fuel_a', 'mobile_a', 'project_a', 'others', 'monthly_amount', 'gross_salary','annual_gross_salary', 'taxable_amount', 'net_paybale_tax', 'tax_slab', 'encashment'];

    public static function get_nepali_month($m)
    {
        $n_month = false;

        switch ($m) {
            case 1:
                $n_month = "बैशाख";
                break;

            case 2:
                $n_month = "जेठ";
                break;

            case 3:
                $n_month = "आषाढ़";
                break;

            case 4:
                $n_month = "श्रावण";
                break;

            case 5:
                $n_month = "भाद्र";
                break;
            case 6:
                $n_month = "असोज";
                break;
            case 7:
                $n_month = "कार्तिक";
                break;
            case 8:
                $n_month = "मंसिर";
                break;
            case 9:
                $n_month = "पुष";
                break;
            case 10:
                $n_month = "माघ";
                break;
            case 11:
                $n_month = "फाल्गुन";
                break;
            case 12:
                $n_month = "चैत्र";
                break;
        }
        return $n_month;
    }

    public static function get_english_month($m)
    {
        $eMonth = false;
        switch ($m) {
            case 1:
                $eMonth = "January";
                break;
            case 2:
                $eMonth = "February";
                break;
            case 3:
                $eMonth = "March";
                break;
            case 4:
                $eMonth = "April";
                break;
            case 5:
                $eMonth = "May";
                break;
            case 6:
                $eMonth = "June";
                break;
            case 7:
                $eMonth = "July";
                break;
            case 8:
                $eMonth = "August";
                break;
            case 9:
                $eMonth = "September";
                break;
            case 10:
                $eMonth = "October";
                break;
            case 11:
                $eMonth = "November";
                break;
            case 12:
                $eMonth = "December";
        }
        return $eMonth;
    }

    public static function totalLeave($id,$fstart,$fend)
    {
    	$total_request = LeaveRequest::where('requested_by', $id)->where('full_day', 1)->where('supervisor_approval', 1)->where('hr_approval', 1)->where('start_date', '>=', $fstart)->where('start_date', '<=', $fend)->sum('duration');

            $total_half_request = LeaveRequest::where('requested_by', $id)->where('full_day', 3)->where('supervisor_approval', 1)->where('hr_approval', 1)->where('start_date', '>=', $fstart)->where('start_date', '<=', $fend)->sum('duration');

            $total_quarter_request = LeaveRequest::where('requested_by', $id)->where('full_day', 2)->where('supervisor_approval', 1)->where('hr_approval', 1)->where('start_date', '>=', $fstart)->where('start_date', '<=', $fend)->sum('duration');
            $lastyear = Carbon::parse($fstart)->subDays(1);
            $pre = LeaveRequest::where('requested_by', $id)->where('supervisor_approval', 1)->where('hr_approval', 1)->where('end_date', '>=', $lastyear)->where('start_date', '<=', $lastyear)->first();

            $total_pre = 0;
            if (isset($pre->id)) {
                $end_date = Carbon::parse($pre->end_date);
                $start_date = Carbon::parse($lastyear);
                $t_pre = $end_date->diffInDays($start_date);
                if ($pre->full_day == 1) {
                    $total_pre = $t_pre;
                }elseif ($pre->full_day == 2) {
                    $total_pre = $t_pre / 4;
                }elseif ($pre->full_day == 3) {
                    $total_pre = $t_pre / 2;
                }
            }
            $halfreq = $total_half_request / 2;
            $quarterreq = $total_quarter_request / 4;
            $total = $total_request + $total_pre + $halfreq + $quarterreq;
            return $total;
    }
    
}
