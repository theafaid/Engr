<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password', 'admin'
    ];

    protected $with= ['profile'];

       public static function boot(){
        parent::boot();
        static::created(function($user){
            // create profile for user
            $user->profile()->create(['user_id' => $user->id]);
        });
        static::deleting(function($user){
            // delete user posts
            $user->posts->each->delete();
            // delete user profile
            $user->profile->delete();
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(){
        return $this->hasOne('App\Profile');
    }

    /**
     * @return string
     */
    public function image(){
         $value = $this->profile->avatar;
        if(filter_var($value, FILTER_VALIDATE_URL) !== false) return $value; // image is link
        return $value ? "/storage/{$value}" : "/design/user.jpg";
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
