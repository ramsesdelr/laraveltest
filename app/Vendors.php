<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','users_id'
    ];
}
