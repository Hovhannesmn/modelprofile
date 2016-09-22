<?php

namespace App\Http\Controllers\Product;
use Illuminate\Support\Facades\Auth;
use App\Model\Category;
use App\Model\Country;
use App\Model\Image;
use App\Model\Product;
use App\Model\Size;
use App\Model\Subcategory;
use App\Model\Tag;
use App\User;
use Illuminate\Http\Request;
use Response;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

    }

    public function index()
    {

        $products = Product::where('user_id', Auth::user()->id)->select('name', 'price', 'id')->simplePaginate(6);
//        dd($products[0]->size()->toSql());
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags =  Tag::select('name', 'id')->get();
        $catgories = Category::select('name', 'id')->get();
        $subcats = Subcategory::select('name', 'id')->get();
        $countries = Country::select('name', 'id')->get();
        return view('products.create', compact('tags', 'catgories', 'subcats', 'countries') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private function validator(array $data)
    {
        return Validator::make($data, [
            'tags' => 'required|max:255',
            'name' => 'required|max:255',
            'origin' => 'required|max:255',
            'description' => 'required',
            'sub_cat' => 'required|max:255',
            'producted' => 'required|max:255',
            'sizes' => 'required|max:255',
            'colors' => 'required|max:255',
            'price' => 'required|numeric',



        ]);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $sizes = array();
        $colors = array();
        $data['description'] = trim($request->input('description'));
        $productModel  = new Product();
        $validator = $this->validator($data);

        if ($validator->fails()) {

            $this->throwValidationException(
                $request, $validator
            );
        }

        $productModel->subcat_id = $data['sub_cat'];
        $productModel->name = $data['name'];
        $productModel->origin_id = $data['origin'];
        $productModel->producted_id = $data['producted'];
        $productModel->price = $data['price'];
        $productModel->description = $data['description'];
        $productModel->user_id = Auth::user()->id;
        $productModel->save();


        $colors = $request->input('colors');
        $itemcolor = array();
        foreach ($colors as $key=>$color){
            $itemcolor[$key] = [
                'product_id' => $productModel->id,
                'color_id' => $color
            ];

        }
        \DB::table('product_color')->insert(
           $itemcolor
        );
        $sizes = $request->input('sizes');
        $itemsize = array();
        foreach ($sizes as $key=>$size){
            $itemsize[$key] = [
                'product_id' => $productModel->id,
                'size_id' => $size
            ];

        }
        \DB::table('product_size')->insert(
           $itemsize
        );
        $tags = $request->input('tags');
        $itemtag = array();
        foreach ($tags as $key=>$tag){
            $itemtag[$key] = [
                'product_id' => $productModel->id,
                'tag_id' => $tag
            ];

        }
        \DB::table('product_tag')->insert(
            $itemtag
        );
        $main_image = new Image();
        $main_image->url  = "/assets/images/no_images.png";
        $main_image->is_general = 1;
        $main_image->product_id = $productModel->id;

        $main_image->save();
        return redirect()->to('galery/'.$productModel->id );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        
//
//        $product = Product::findOrFail($id);
//
//        $categories = Category::all();
//        $tags = Tag::all();
//      return view("products.show", compact('product', 'categories', 'tags'));
//    }
    public function showproduct($id)
    {


        $product = Product::findOrFail($id);

        $categories = Category::all();
        $tags = Tag::all();
        return view("products.show", compact('product', 'categories', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tags =  Tag::select('name', 'id')->get();
        $catgories = Category::select('name', 'id')->get();
        $subcats = Subcategory::select('name', 'id')->get();
        $countries = Country::select('name', 'id')->get();
        $product = Product::findOrFail($id);

        $pr_colors = $product->color()->select('id')->get()->toArray();

        $arrColors = array();
        foreach ($pr_colors as $item){
            $arrColors[]  = $item['id'];
        }
        $pr_sizes = $product->size()->select('id')->get()->toArray();

        $arrSizes = array();
        foreach ($pr_sizes as $item){
            $arrSizes[]  = $item['id'];
        }

//        $pr_tags = $product->subcat->category->tag()->select('id')->get()->toArray();
//        $pr_tags = $product->subcat->category->tags()->select('id')->get()->toArray();
//        dd($pr_tags);
        $pr_tags = $product->tags()->select('id')->get()->toArray();

        $arrTags = array();
        foreach ($pr_tags as $item){
            $arrTags[]  = $item['id'];
        }
        return view('products.edit', compact('tags', 'catgories', 'subcats', 'countries', 'product', 'arrColors', 'arrSizes' , 'arrTags'    ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $productModel, Request $request, $id)
    {
        $data = $request->all();
      
        $productModel = $productModel->where('id', $id)->first();
        $sizes = array();
        $colors = array();
        $tags = array();
        $data['description'] = trim($request->input('description'));
        $validator = $this->validator($data);

        if ($validator->fails()) {

            $this->throwValidationException(
                $request, $validator
            );
        }

        $productModel->subcat_id = $data['sub_cat'];
        $productModel->name = $data['name'];
        $productModel->origin_id = $data['origin'];
        $productModel->producted_id = $data['producted'];
        $productModel->price = $data['price'];
        $productModel->description = $data['description'];
        $productModel->user_id = Auth::user()->id;
        $productModel->save();

        $colors = $request->input('colors');
        $itemcolor = array();

        \DB::table('product_tag')->where('product_id', '=', $productModel->id)->delete();
        \DB::table('product_color')->where('product_id', '=', $productModel->id)->delete();
        \DB::table('product_size')->where('product_id', '=', $productModel->id)->delete();
        $tags = $request->input('tags');
        $itemtag = array();
        foreach ($tags as $key=>$tag){
            $itemtag[$key] = [
                'product_id' => $productModel->id,
                'tag_id' => $tag
            ];

        }

        foreach ($colors as $key=>$color){
            $itemcolor[$key] = [
                'product_id' => $productModel->id,
                'color_id' => $color
            ];

        }
        \DB::table('product_tag')->insert(
            $itemtag
        );
        \DB::table('product_color')->insert(
            $itemcolor
        );
        $sizes = $request->input('sizes');
        $itemsize = array();
        foreach ($sizes as $key=>$size){
            $itemsize[$key] = [
                'product_id' => $productModel->id,
                'size_id' => $size
            ];

        }
        \DB::table('product_size')->insert(
            $itemsize
        );
        return Response::json(array(
            'success' => true,
            'product_id'   => $id
        ));
//        return redirect()->to('galery/'.$productModel->id );
//        return redirect()->action('Galery\GaleryController@show', ['product_id' => $productModel->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_produjcts = Auth::user()->product;
        foreach ($user_produjcts as $item) {
            if ($item->id == $id) {
                Product::destroy($id);
                return Response::json(array(
                    'success' => true,

                ));
            }
        }
        return Response::json(array(
            'success' => false,

        ));
    }
}
