<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    protected $fillable = ['name','display_name','description','image_name','mime','original_image_name'];

    protected $hidden = ['created_at', 'updated_at','mime','image_name'];
}
