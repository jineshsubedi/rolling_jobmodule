<?php

namespace App;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    protected $table = 'voting';  

    protected $fillable = array('branch_id', 'sub_category_id', 'candidate_one', 'candidate_two', 'vote_by', 'year');
    protected $primaryKey = 'id';

    public static function getCandidateOne($sub_category_id)
    {
        $year = Carbon::today()->year-1;
        $votes = Adjustment_staff::leftjoin('voting', function($join){
            $join->on('adjustment_staff.id','=','voting.candidate_one');
        })->where('voting.sub_category_id', $sub_category_id)
        ->where('voting.year', $year)
        ->where('voting.branch_id', auth()->guard('staffs')->user()->branch)
        ->groupBy('voting.candidate_one')
        ->select('voting.*', DB::raw('COUNT(candidate_one) as vote'))
        ->orderBy('vote','desc')
        ->limit(3)
        ->get();
        return $votes;
    }
    public static function getCandidateTwo($sub_category_id)
    {
        $year = Carbon::today()->year-1;
        $votes = Adjustment_staff::leftjoin('voting', function($join){
            $join->on('adjustment_staff.id','=','voting.candidate_two');
        })->where('voting.sub_category_id', $sub_category_id)
        ->where('voting.year', $year)
        ->where('voting.branch_id', auth()->guard('staffs')->user()->branch)
        ->groupBy('voting.candidate_two')
        ->select('voting.*', DB::raw('COUNT(candidate_two) as vote'))
        ->orderBy('vote','desc')
        ->limit(3)
        ->get();
        return $votes;
    }
}
