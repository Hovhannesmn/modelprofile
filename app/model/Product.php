<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'origin_id', 'producted_id',  'price', 'description', 'subcat_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'origin_id', 'id');
    }

    
    public function size()
    {
        return $this->belongsToMany('App\Model\Size');
    }
    
    public function color()
    {
        return $this->belongsToMany('App\Model\Color', 'product_color');
    }
    

    public function images()
    {
        return $this->hasMany('App\Model\Image', 'product_id', 'id')->where('is_general', 0);
    }
    
    public function image()
    {
        return $this->hasOne('App\Model\Image')->where('is_general', 1);
    }

    public function origin()
    {
        return $this->belongsTo('App\Model\Country', 'origin_id', 'id');
    }
    public function producted()
    {
        return $this->belongsTo('App\Model\Country', 'producted_id', 'id');
    }
    public function subcat()
    {
        return $this->belongsTo('App\Model\Subcategory');
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function scopeOfOrigin($query, $country_id, $request)
    {
        if ($request->has('origin')) {
            return  $query->where('location_id', $country_id );


        }
    }
    public function scopeOfSubcat($query, $subcat_name, $request)
    {

        if ($request->has('subcat')) {
            return
                $query->join('subcategories', function ($join) use ($subcat_name) {
                    $join->on('products.subcat_id', '=', 'subcategories.id')
                    ->where('subcategories.name', '=',  $subcat_name );
            });

        }
    }

    public function scopeofMade_in($query, $madein, $request)
    {

        if ($request->has('made_in')) {
            return
                $query->join('countries', function ($join) use ($madein) {
                    $join->on('products.origin_id', '=', 'countries.id')
                        ->where('countries.name', '=', $madein  );
                });

        }
    }

    public function scopeOfSize($query, $sizes, $request)
    {
        if ($request->has('size') && !empty($sizes[0])) {
            return
                $query->leftJoin('product_size', 'products.id', '=', 'product_size.product_id')
                    ->join('sizes', 'sizes.id', '=', 'product_size.size_id')
//                 ->where('subscriptions.id', Auth::user()->subscription_id);

                    ->where(function($where) use ($sizes) {
                        foreach ($sizes as $key=>$size) {
                            if ($key==0) {
                                $where->where('sizes.name', '=', $size);
                            }else{
                                $where->orWhere('sizes.name', '=', $size);

                            }
                        }
                    } );
        }
    }


    public function scopeOfColor($query, $colors    , $request)
    {
        if ($request->has('color') && !empty($colors[0])) {
            return
                $query->leftJoin('product_color', 'products.id', '=', 'product_color.product_id')
                    ->join('colors', 'colors.id', '=', 'product_color.color_id')
                    ->where(function($where) use ($colors) {
                foreach ($colors as $key=>$color) {
                    if ($key==0) {
                        $where->where('colors.name', '=', $color);
                    }else{
                        $where->orWhere('colors.name', '=', $color);

                    }
                }
            } );
        }
    }

    public function scopeOfTag($query, $tags, $request)
    {
        if ($request->has('tag') && !empty($tags[0])) {
            return
                $query->leftJoin('product_tag', 'products.id', '=', 'product_tag.product_id')
                    ->join('tags', 'tags.id', '=', 'product_tag.tag_id')
                    ->where(function($where) use ($tags) {
                        foreach ($tags as $key=>$tag) {
                            if ($key==0) {
                                $where->where('tags.name', '=', $tag);
                            }else{
                                $where->orWhere('tags.name', '=', $tag);

                            }
                        }
                    } );
        }
    }
    public function scopeOfPrice($query, $prices, $request)
    {
        if ($request->has('price') && !empty($prices[0])) {
            return
                $query->whereBetween('price', [$prices[0], $prices[1]]);
        }
    }

//SELECT products.id FROM `products` INNER JOIN product_size ON product_size.product_id = products.id
//INNER JOIN sizes ON product_size.size_id = sizes.id WHERE sizes.name='S' OR 'M'


    public function scopeOfFieldValue($query, $field_value, $field_type_id)
    {
        if (isset($field_value) && !empty($field_value)) {
            foreach ($field_value as $key => $value) {
                if (isset($value) && !empty($value)) {
                    $query->join('products_fields as ' . $key, $key . '.product_id', '=', 'products.id')->
                    where($key . '.field_value', 'like', '%' . $value . '%')->
                    where($key . '.field_types_id', $field_type_id[$key]);
                }
            }
        }

    }
    
    
}
