<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingNotice extends Model
{
    protected $table = 'training_notice';  

    protected $fillable = array('branch_id', 'program_id', 'training_id', 'date', 'submit_date', 'description', 'document');

    protected $primaryKey = 'id';

    public static function getNotice()
    {
    	$data = TrainingNotice::leftjoin('training', function($join){
    			$join->on('training_notice.training_id', '=', 'training.id');
    		})
    		->where('training.status', 1)
    		->where('training_notice.branch_id', auth()->guard('staffs')->user()->branch)
    		->whereDate('training_notice.date', '<=', Date('Y-m-d'))
    		->whereDate('training_notice.submit_date', '>=', Date('Y-m-d'))
    		->select('training_notice.*')
    		->get();

		return $data;
    }
}
