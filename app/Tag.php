<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function getRouteKeyName(){return 'name';}
    
    public function posts(){
    	return $this->belongsToMany('App\Post');
    }
}
