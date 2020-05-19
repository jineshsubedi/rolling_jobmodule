<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    protected $table = 'survey_answer';

    public function adjustment_staff(){
        return $this->belongsTo('App\Adjustment_staff','adjustment_staff_id');
    }
    public function survey()
    {
    	return $this->belongsTo('App\Survey', 'survey_id');
    }
    public static function getAnswer($id)
    {
        return SurveyAnswer::where('question_id', $id)->where('adjustment_staff_id', auth()->guard('staffs')->user()->id)->select('description')->first();
    }
    public static function getAnswerBranchadmin($id, $staffId)
    {
        return SurveyAnswer::where('question_id', $id)->where('adjustment_staff_id', $staffId)->select('description')->first();
    }
    public static function countSurveyDone($id)
    {
        return SurveyAnswer::where('survey_id', $id)->groupBy('survey_id', 'adjustment_staff_id')->select('adjustment_staff_id')->get();
    }
}
