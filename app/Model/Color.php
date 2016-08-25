<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'color_code'
    ];

    public function product()
    {
        return $this->belongsToMany('App\Model\Product');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
