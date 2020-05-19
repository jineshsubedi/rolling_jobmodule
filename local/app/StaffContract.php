<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffContract extends Model
{
    protected $table = 'staff_contract';

    protected $fillable = ['staff_id', 'from', 'to', 'document'];

    public static function countContractNearToExpire()
    {
        $staffs = \App\Adjustment_staff::where('branch', auth()->guard('staffs')->user()->branch)->where('status', 1)->select('id', 'name')->get();
        $count = 0;
        foreach($staffs as $staff)
        {
            $contract = \App\StaffContract::where('staff_id', $staff->id)->latest()->first();
            if($contract){
                $day = \Carbon\Carbon::parse($contract->to)->diffInDays(\Carbon\Carbon::parse($contract->from));
                if(\Carbon\Carbon::parse($contract->to) > \Carbon\Carbon::today()  && $day < 25 ){
                    $count++;
                }
            }
        }
        return $count;
    }
    public static function getStaffContractNearToExpire()
    {
        $staffs = \App\Adjustment_staff::where('branch', auth()->guard('staffs')->user()->branch)->where('status', 1)->select('id', 'name')->get();
        $lows = [];
        $count = 0;
        foreach($staffs as $staff)
        {
            $contract = \App\StaffContract::where('staff_id', $staff->id)->latest()->first();
            if($contract){
                $day = \Carbon\Carbon::parse($contract->to)->diffInDays(\Carbon\Carbon::parse($contract->from));
                if(\Carbon\Carbon::parse($contract->to) > \Carbon\Carbon::today()  && $day < 25 ){
                    $lows[$count] = $contract;
                    $count++;
                }
            }
        }
        return $lows;
    }
}
