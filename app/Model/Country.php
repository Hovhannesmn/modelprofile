<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'tld', 'cc_iso', 'cc_fips','name'
    ];

//    public function product()
//    {
//        return $this->belongsToMany('App\Model\Product');
//    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
