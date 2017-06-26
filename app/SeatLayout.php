<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeatLayout extends Model
{
    //

    protected $table = 'seatlayouts';

    protected $fillable = ['carType_id','seat_number','row','column'];

    protected $hidden = ['id','created_at', 'updated_at'];
}
