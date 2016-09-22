<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category_id', 'slug', 
    ];

    public function members(){
        return [
            0 => 'all',
            1 => 'men',
            2 => 'women',
            3 => 'kids'
        ];
    }
     public function category(){
         return $this->belongsTo('App\Model\Category');
     }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
