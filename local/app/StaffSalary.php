<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffSalary extends Model
{
    protected $table = 'staff_salary';

    protected $fillable = ['staff_id', 'base_salary', 'basic_salary', 'da', 'con_a','daily_a','pf','wf','ot','total_salary','salary_date', 'incentive', 'fuel_a', 'mobile_a', 'project_a', 'others', 'cit', 'insurance', 'petty_cash', 'advance', 'advance_canteen'];

     public function adjustment_staff()
     {
         return $this->belongsTo('\App\Adjustment_staff', 'staff_id');
     }
     public static function getStaffSalary($id){
        return StaffSalary::where('staff_id', $id)->latest()->first();
     }
}
