<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    

    protected $fillable = ['carSchedule_id','seat_number','departure_date'];

    protected $hidden = ['created_at', 'updated_at'];

}
