<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingFeedback extends Model
{
    protected $table = 'training_feedback';  

    protected $fillable = array('training_id', 'staff_id', 'comment');
    protected $primaryKey = 'id';

    public function staff()
    {
        return $this->belongsTo('\App\Adjustment_staff', 'staff_id')->select('id', 'name', 'image');
    }

    public static function getMyFeedback($id)
    {
        $data = TrainingFeedback::where('training_id', $id)->where('staff_id', auth()->guard('staffs')->user()->id)->orderBy('id', 'desc')->with('staff')->get();
        return $data;
    }
    public static function getAllFeedback($id)
    {
        $data = TrainingFeedback::where('training_id', $id)->orderBy('id', 'desc')->with('staff')->get();
        return $data;
    }
}
