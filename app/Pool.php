<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    //
    protected $fillable = ['name', 'display_name', 'description', 'address', 'city','image_name','mime','original_image_name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function destinations() 
    {
    	return $this->belongsToMany('App\Pool','routes','origin_id','destination_id')->withTimestamps();
    }

    public function origins() 
    {
    	return $this->belongsToMany('App\Pool','routes','destination_id','origin_id');
    }
}
