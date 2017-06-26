<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = ['customer_id','paymentMethod_id','payment_status','image_name','mime','original_image_name'];

    protected $hidden = ['created_at', 'updated_at'];
}
