<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentHistory extends Model
{
    protected $table = 'employment_history';  
    protected $fillable = array('staff_id', 'type', 'department', 'previous', 'current', 'promoted_date');
    protected $primaryKey = 'id';

    public function adjustment_staff(){
        return $this->belongsTo('App\Adjustment_staff','staff_id');
    }
    public function getHistory($id)
    {
        return EmploymentHistory::findOrFail($id);
    }
    public function getHistoryByStaffId($id)
    {
        return EmploymentHistory::where('staff_id',$id)->orderBy('created_at','desc')->get();
    }
    public function getStaffHistoryById($id, $historyId)
    {
        return EmploymentHistory::where('staff_id',$id)->where('id',$historyId)->first();
    }
    public function checkStaffDataInHistory($staffId, $designation, $department)
    {
        return EmploymentHistory::where('staff_id',$staffId)
                                    ->where('designation',$designation)
                                    ->where('department',$department)
                                    ->first();
    }
}
