<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    protected $table = 'survey_question';

    public static function getQuestion($id)
    {
        return SurveyQuestion::where('id', $id)->first();
    }
    public static function getQuestionBySurveyId($id)
    {
        return SurveyQuestion::where('survey_id' , $id)->get();
    }
    
}
