<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;
class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public static function boot(){
        parent::boot();
        static::addGlobalScope('user', function($builder){
            return $builder->with('user');
        });

        static::addGlobalScope('category', function($builder){
            return $builder->with('category');
        });
    }
    
    public function getRouteKeyName(){
        return 'slug';
    }

    public function path(){
        return "/category/{$this->category->slug}/posts/{$this->slug}";
    }
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    
    public function setSlugAttribute($value){
    	if(static::whereSlug($slug = str_slug($value))->exists()){
            $this->attributes['slug'] = $slug . "_" . time();
            return ;
        }

        $this->attributes['slug'] = $slug;
    }

    public function getCreatedAtAttribute($value){
        return \Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $value)->diffForHumans();
    }

    public function image(){
        $value = $this->image;
        if(filter_var($value, FILTER_VALIDATE_URL) !== false) return $value;
        return $value ? "/storage/{$value}" : "/design/post.jpg";
    }

    public function uploadImage($fileName, $type = 'store'){
        $type == 'update' ? Storage::delete($this->image) : '';
        return request()->file($fileName)->store('posts');
    }

    public function recordVisit(){
        $this->increment('views');
    }
}
