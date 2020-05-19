<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $table = 'travel';  

    protected $fillable = array('branch_id', 'unique_id', 'from', 'to', 'assigned_to', 'assigned_from', 'purpose', 'type', 'status', 'assignment_type', 'assignment_category', 'mode_of_transport', 'payment_mode', 'road_sub', 'reimbursement', 'position', 'grade', 'per_diem_amount', 'account_name', 'account_number', 'bank_name', 'advance_required', 'supervisor_approval', 'supervisor_remark', 'hr_approval', 'hr_remark', 'chairman_approval', 'chairman_remark', 'account_approval', 'account_remark', 'supervisor_expense_approval', 'supervisor_expense_remark', 'account_expense_approval', 'account_expense_remark', 'hr_expense_approval', 'hr_expense_remark', 'chairman_expense_approval', 'chairman_expense_remark', 'accept_status');

    protected $primaryKey = 'id';

    public function travel_expense()
    {
      return $this->hasMany('\App\TravelExpense', 'travel_id');
    }

    public static function countApprovalWaiting()
    {
      $setting = \App\LeaveSetting::where('branch_id', auth()->guard('staffs')->user()->branch)->first();

      $ids = \App\Adjustment_staff::select('id')->where('supervisor', auth()->guard('staffs')->user()->id)->get();
        $id = [];
        foreach ($ids as $key => $value) {
          $id[]= $value->id;
        }

      $data = DB::table('travel')->where('supervisor_approval', 0)->whereIn('assigned_to', $id)->count();
      if(\App\BranchSetting::isAccountHandler()){
        $data += DB::table('travel')->where('supervisor_approval', 1)->where('account_approval', 0)->count();
        
      }elseif($setting->approve_person == auth()->guard('staffs')->user()->id)
      {
        $data += DB::table('travel')->where('account_approval', 1)->where('hr_approval', 0)->count();
        
      } elseif ($setting->chairman == auth()->guard('staffs')->user()->id) {
        $data += DB::table('travel')->where('supervisor_approval', 1)->where('hr_approval', 1)->where('chairman_approval', 0)->count();

      } 
      return $data;
    }
    public static function countExpenseApprovalWaiting()
    {
      $setting = \App\LeaveSetting::where('branch_id', auth()->guard('staffs')->user()->branch)->first();

      $ids = \App\Adjustment_staff::select('id')->where('supervisor', auth()->guard('staffs')->user()->id)->get();
        $id = [];
        foreach ($ids as $key => $value) {
          $id[]= $value->id;
        }

      $data = DB::table('travel')->where('branch_id', auth()->guard('staffs')->user()->branch)->where('chairman_approval', 1)->where('supervisor_expense_approval', 0)->whereIn('assigned_to', $id)->count();
      if(\App\BranchSetting::isAccountHandler()){
        $data += DB::table('travel')->where('branch_id', auth()->guard('staffs')->user()->branch)->where('chairman_approval', 1)->where('supervisor_expense_approval', 1)->where('account_expense_approval', 0)->count();
      }elseif($setting->approve_person == auth()->guard('staffs')->user()->id)
      {
        $data += DB::table('travel')->where('branch_id', auth()->guard('staffs')->user()->branch)->where('account_expense_approval', 1)->where('hr_expense_approval', 0)->count();
        
      } elseif ($setting->chairman == auth()->guard('staffs')->user()->id) {
        $data += DB::table('travel')->where('branch_id', auth()->guard('staffs')->user()->branch)->where('hr_expense_approval', 1)->where('chairman_expense_approval', 0)->count();

      } 
      return $data;
    }

    public static function getUniqueId($id)
    {
      $data = Travel::find($id);
      if($data){
        return $data->unique_id;
      }
      return '';
    }
    public static function getRoadSub($id)
    {
      $data = Travel::find($id);
      if($data){
        return $data->road_sub;
      }
      return '';
    }
    public static function getType($id)
    {
      $data = Travel::find($id);
      if($data){
        return $data->type;
      }
      return '';
    }
    public static function getMyTravel()
    {
      $data = Travel::where('branch_id', auth()->guard('staffs')->user()->branch)
                  ->where('assigned_to', auth()->guard('staffs')->user()->id)
                  ->where('chairman_approval', 1)
                  ->where('to','<=', Date('Y-m-d'))
                  ->with('travel_expense')
                  ->get();

      if($data)
      {
        return $data;
      }
        $data = [];
        return $data;
    }
}
