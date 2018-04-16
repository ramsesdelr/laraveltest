<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'vendors_id', 'types_id', 'sku', 'release_date', 'price', 'weight', 'color','users_id','photo','tags'
    ];

    /**
     * Get the vendor record associated with the item.
     * 
     */
    public function vendor()
    {
        return $this->belongsTo('App\Vendors', 'vendors_id');
    }

}
