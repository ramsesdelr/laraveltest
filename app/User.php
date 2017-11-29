<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get items that belongs to this user
     *
     *  @return array
     */
    public function items()
    {
        return $this->hasMany('App\Items', 'users_id','id');
    }

     /**
     * Get vendors that belongs to this user
     *
     *  @return array
     */
    public function vendors()
    {
        return $this->hasMany('App\Vendors', 'users_id','id');
    }

       /**
     * Get vendors that belongs to this user
     *
     *  @return array
     */
    public function types()
    {
        return $this->hasMany('App\Types', 'users_id','id');
    }
}
