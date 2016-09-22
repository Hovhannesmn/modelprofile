<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'product_id', 'user_id', 'is_general', 'url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
