<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    //
    protected $fillable = ['name','phone','address','image_name','mime','original_image_name'];

    protected $hidden = ['created_at', 'updated_at'];
}
