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
Route::get('/paypal', function (){
    return view('paypal');
});
Route::post('/payments', function (){
    $host = "localhost"; //database location
    $user = ""; //database username
    $pass = ""; //database password
    $db_name = ""; //database name
    // PayPal settings
    $paypal_email = 'user@domain.com';
    $return_url = 'http://domain.com/payment-successful.html';
    $cancel_url = 'http://domain.com/payment-cancelled.html';
    $notify_url = 'http://domain.com/payments.php';

    $item_name = 'Test Item';
    $item_amount = 5.00;

// Include Functions
//    include("functions.php");

        $querystring = '';

        // Firstly Append paypal account to querystring
        $querystring .= "?business=".urlencode($paypal_email)."&amp;amp;amp;amp;amp;amp;";

        // Append amount&amp;amp;amp;amp;amp;amp; currency (£) to quersytring so it cannot be edited in html

        //The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
        $querystring .= "item_name=".urlencode($item_name)."&amp;amp;amp;amp;amp;amp;";
        $querystring .= "amount=".urlencode($item_amount)."&amp;amp;amp;amp;amp;amp;";

        //loop for posted values and append to querystring
        foreach($_POST as $key => $value) {
            $value = urlencode(stripslashes($value));
            $querystring .= "$key=$value&amp;amp;amp;amp;amp;amp;";
        }
//     Append paypal return addresses
    $querystring .= "return=".urlencode(stripslashes($return_url))."&amp;amp;amp;amp;amp;amp;";
    $querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&amp;amp;amp;amp;amp;amp;";
    $querystring .= "notify_url=".urlencode($notify_url);

//     Append querystring with custom field
    $querystring .= "&amp;amp;amp;amp;amp;amp;custom=1";
    dd($querystring);

//     Redirect to paypal IPN
    header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);

    exit();

});




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
