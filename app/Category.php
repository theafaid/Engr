<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public static function boot(){
    	parent::boot();
    	static::deleting(function($category){
                $category->posts->each->forceDelete();
    	});

    }
    public function path(){
        return "/category/{$this->slug}/posts";
    }
    public function getRouteKeyName(){
    	return 'slug';	
    }
    public function posts(){
    	return $this->hasMany('App\Post');
    }
}
