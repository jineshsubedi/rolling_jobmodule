<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelExpense extends Model
{
    protected $table = 'travel_expense';  

    protected $fillable = array('travel_id', 'destination_id', 'type', 'ticket', 'lodging', 'phone', 'local_conveyance', 'breakfast', 'lunch', 'dinner', 'others', 'total', 'date', 'description');
    protected $primaryKey = 'id';

    public static function getTravelExpextedExpense($id)
    {
        $data = TravelExpense::where('travel_id', $id)->orderBy('id', 'asc')->get();
        return $data;
    }

    public static function getExpectedTotalExpense($id)
    {
    	$data = TravelExpense::where('travel_id', $id)->where('type', 1)->sum('total');
    	return $data;
    }
    public static function getTotalExpense($id)
    {
        $data = TravelExpense::where('travel_id', $id)->where('type', 2)->sum('total');
        return $data;
    }
    public static function countTravelExpense($id)
    {
    	$data = TravelExpense::where('travel_id', $id)->count();
    	return $data;
    }

}
