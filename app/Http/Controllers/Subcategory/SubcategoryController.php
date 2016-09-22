<?php

namespace App\Http\Controllers\Subcategory;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Subcategory;
use App\Model\Product;
use App\Model\Tag;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(11231);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id )
    {
        $perpage = $request->input('perpage');
            if(empty($perpage)) {
            $products = Product::where('subcat_id', $id)->paginate(3);

        }else{
            $products = Product::where('subcat_id', $id)->paginate($perpage);

        }
//        dd($id);
//        dd($products->currentPage());    //return carrent page id
//                dd($products->firstItem());    //return  product which is first in this page
//                dd($products->lastPage());    //return  last page id
        $tags = Tag::all();
        return view('subcat.index', compact('products', 'tags', 'perpage'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
