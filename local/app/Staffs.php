<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Staffs extends Authenticatable
{
 
    protected $table = 'adjustment_staff';
    protected $fillable = [
        'branch', 'staffType','name','gender','email','password','employmentType','shifttime','remember_token'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}