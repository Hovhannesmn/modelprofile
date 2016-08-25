<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
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
    public function subcat(){
        return $this->hasMany('App\Model\Subcategory', 'category_id', 'id');

    }
    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag');
    }
  

}
