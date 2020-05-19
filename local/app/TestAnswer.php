<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
    protected $table = 'test_answer';  

    protected $fillable = array('test_id', 'adjustment_staff_id', 'questions', 'marks', 'title', 'duration', 'answer_date', 'right_answer');
    protected $primaryKey = 'id';

    public function TestExam()
    {
    	return $this->belongsTo('App\TestExam', 'test_id');
    }
    public function adjustment_staff()
    {
    	return $this->belongsTo('App\Adjustment_staff', 'adjustment_staff_id');
    }
}
