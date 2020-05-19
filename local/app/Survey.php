<?php

namespace App;

use Carbon\Carbon;
use App\SurveyAnswer;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = 'survey';  
    public function branch()
    {
    	return $this->belongsTo('App\Branch');
    }
    public static function checkSurvey()
    {
        $survey = Survey::whereDate('publish_date','<=',Carbon::today()->format('Y-m-d'))
                        ->whereDate('end_date','>=',Carbon::today()->format('Y-m-d'))
                        ->where('branch_id', auth()->guard('staffs')->user()->branch)
                        ->get();
        $sur = null;
        foreach($survey as $s)
        {
            $check = SurveyAnswer::where('survey_id', $s->id)->where('adjustment_staff_id', auth()->guard('staffs')->user()->id)->first();
            if(!$check){
                return $s;
            }
        }
        return null;
    }
}
