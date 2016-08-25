<?php

namespace App\Http\Controllers\Galery;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Model\Image;
use App\Http\Requests;
use Validator;
use Response;
use App\Http\Controllers\Controller;
class GaleryController extends Controller
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
        dd(1);
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
        $files = array('image' => $request->file('file'));

        $rules = array('image' => 'required|mimes:jpg,jpeg,bmp,png|max:10000'); //mimes:jpeg,bmp,png and for max size max:10000

        $validator = Validator::make($files, $rules);

        if ($validator->fails()) {
            return Response::make($validator->errors()->first(), 400);
        }

        $file = $request->file('file');
        $product_id = $request->input('product_id');


//        $product = new Product();

//        if ($file->isValid()) {
            
            $fileName = rand(11111,99999) . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'uploads/product/' . $product_id; // upload path
            $file->move($destinationPath, $fileName);

            $image = new Image();
            $image->url = '/' . $destinationPath . '/' . $fileName;
            $image->product_id = $product_id;

            $image->save();
            print_r(json_encode($image->toArray()));
            exit;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =  Product::findOrfail($id);
//        dd($product);
        return view("galery.show")->with(["product" => $product ]);
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
        dd($id + "edit");

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($product_id, $id)
    {

        $profile = Product::findOrFail($product_id);

        $main_image = $profile->image;
        $image = $profile->images()->whereIn('id', explode('-', $id))->first();
        if(!empty($image->url)){
            $main_image->is_general = 0;
            $main_image->save();
            $image->is_general = 1;
            $image->save();
            return Response::json(array(
                'success' => true,
                'image_id'   => $image->id
            ));
            die();
        } else{
            return Response::json(array(
                'success' => false,
                'image_id'   => $image->id
            ));
//    print_r(json_encode(succer));

        }








    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $id)
    {

        $profile = Product::findOrFail($product_id);

        $images = $profile->images()->whereIn('id', explode('-', $id))->get();

        foreach ($images as $image) {
            $image->delete();
        }

        return $images;
    }
}
