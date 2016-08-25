<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::resource('home', 'HomeController');
Route::resource('/', 'WelcomeController');
Route::resource('contact', 'ContactController');
Route::resource('category', 'Category\CategoryController');
Route::resource('tag', 'Tag\TagController');
Route::resource('subcat', 'Subcategory\SubcategoryController');
Route::resource('galery', 'Galery\GaleryController');
Route::resource('search', 'Search\SearchController');




Route::auth();
//if (Auth::guest()) {
    Route::get('item/{product_id}', 'Product\ProductController@showproduct');

//}

//Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=>'adminOnly'], function() {
Route::group([  'middleware'=>'auth'], function() {
    Route::get('/home', 'HomeController@index');
    Route::resource('product', 'Product\ProductController');
    Route::resource('{product_id}/galery', 'Galery\GaleryController');
});
