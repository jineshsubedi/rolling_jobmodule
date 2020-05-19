<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationChart extends Model
{
    protected $table = 'organization_chart';  
    protected $fillable = array('chart_data', 'name', 'title' ,'className', 'parent_id');
    protected $primaryKey = 'id';

    public function children()
    {
        return $this->hasMany(OrganizationChart::class, 'parent_id')->with('children');
    }
    public static function getMemberName($id)
    {
        $name = '';
        $member = OrganizationChart::find($id);
        if($member){
            $name = $member->name;
        }
        return $name;
    }
}
