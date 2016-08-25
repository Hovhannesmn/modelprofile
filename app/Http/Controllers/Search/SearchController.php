<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Subcategory;
use App\Model\Category;
use Response;
use App\Model\Tag;
//use  Illuminate\Pagination
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (empty($request->all())) {
            $perpage = $request->input('perpage');

            if (empty($perpage)) {
                $products = Product::select('id', 'name', 'price')->paginate(3);

            } else {
                $products = Product::select('id', 'name', 'price')->paginate($perpage);

            }
//        dd($products->currentPage());    //return carrent page id
//                dd($products->firstItem());    //return  product which is first in this page
//                dd($products->lastPage());    //return  last page id

            return view('search.index', compact('products',  'perpage'));
        }
        else{

            $data= $request->all();
            $subcat_name =(!empty($data['subcat'])  ? htmlspecialchars_decode($data['subcat']) : '') ;
            $madein  =  (!empty($data['made_in'])  ? htmlspecialchars_decode($data['made_in']) : '') ;
            $sizes =  (!empty($data['size'])  ? $data['size'] : '');
            $colors =  (!empty($data['color'])  ? $data['color'] : '');
            $tags  = (!empty($data['tag'])  ? $data['tag'] : '');
            $prices = (!empty($data['price'])  ? $data['price'] : '');
            $prices = explode("-", $prices);
            $perpage = $request->input('perpage');
            if ($request->ajax() || $request->wantsJson()) {


                $products= Product::select('products.name', 'products.id','products.description','products.price')->ofSubcat($subcat_name, $request)->
                            ofTag($tags, $request)->
                            ofSize($sizes, $request)->
                            ofColor($colors, $request)->
                            ofMade_in($madein, $request)->
                            ofPrice($prices, $request) ->
                          groupBy('products.id')->
//                        toSql();
//                        get();
                        orderBy('id', 'desc')->paginate(5);
//                $products = $products1->toArray();


                foreach ($products as $key=>$product){
                    $products[$key]['image'] = $products[$key]->image->url;
                }
                return Response::json(array(
                'success' => true,
                'products'   => $products
            ));
            } else {


//                dd($data);
                $products= Product::select('products.name', 'products.id','products.description','products.price')->ofSubcat($subcat_name, $request)->
                ofTag($tags, $request)->
                ofSize($sizes, $request)->
                ofColor($colors, $request)->
                ofMade_in($madein, $request)->
                groupBy('products.id')->
//                        toSql();
                paginate(5);



                return view('search.index', compact('products', 'perpage'));
            }
//


        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(1);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
