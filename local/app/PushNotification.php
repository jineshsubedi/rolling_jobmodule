<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{
    protected $table = 'push_notification';  

    protected $fillable = array('number_of_message', 'title', 'message','send_by','branch_id' );

   
}
