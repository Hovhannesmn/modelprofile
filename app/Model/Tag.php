<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function categories(){
        return $this->belongsToMany('App\Model\Category');

    }

    public function product()
    {
        return $this->belongsToMany('App\Model\Product');
    }
  

}
