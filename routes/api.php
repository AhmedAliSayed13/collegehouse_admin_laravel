<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', function () {
    return [
        'result' => true,
    ];
});

// Get list of meetings.
Route::get('/meetings', 'Zoom\MeetingController@list');

// Create meeting room using topic, agenda, start_time.
Route::post('/meetings', 'Zoom\MeetingController@create');

// Get information of the meeting room by ID.
Route::get('/meetings/{id}', 'Zoom\MeetingController@get')->where('id', '[0-9]+');
Route::patch('/meetings/{id}', 'Zoom\MeetingController@update')->where('id', '[0-9]+');
Route::delete('/meetings/{id}', 'Zoom\MeetingController@delete')->where('id', '[0-9]+');





// terpx login
Route::post('register', 'api\AuthController@register');
Route::post('login', 'api\AuthController@login');



Route::group(['middleware' => ['APIMiddleware']], function(){
    Route::get('types', 'api\TypeController@index');
    Route::get('types/{id}', 'api\TypeController@show');
    Route::post('types', 'api\TypeController@store');
    Route::put('types/{id}', 'api\TypeController@update');
    Route::delete('types/{id}', 'api\TypeController@delete');
});




Route::get('categories', 'api\CategoryController@index');
Route::get('categories/{id}', 'api\CategoryController@show');
Route::post('categories', 'api\CategoryController@store');
Route::put('categories/{id}', 'api\CategoryController@update');
Route::delete('categories/{id}', 'api\CategoryController@delete');


Route::get('products', 'api\ProductController@index');
Route::get('products/{id}', 'api\ProductController@show');
Route::post('products', 'api\ProductController@store');
Route::put('products/{id}', 'api\ProductController@update');
Route::delete('products/{id}', 'api\ProductController@delete');


// Route::post('login', 'AuthController@login');
// Route::post('register', 'AuthController@register');





    Route::group(['middleware' => ['jwt.verify']], function() {
        Route::get('user', 'api\AuthController@getAuthenticatedUser');
        Route::post('user/update', 'api\AuthController@updateUser');
        Route::get('closed','api\AuthController@closed');


        Route::get('products', 'api\ProductController@index');
        Route::get('product/{id}', 'api\ProductController@show');
        Route::post('product', 'api\ProductController@store');
        Route::delete('products/{id}', 'api\ProductController@delete');
        Route::get('my-products', 'api\ProductController@myproducts');


        Route::get('favourite-user', 'api\FavouriteController@favourite_user');
        Route::get('favourite-product/{id}', 'api\FavouriteController@favourite_product');



        Route::get('rates', 'api\RateController@index');
        Route::get('rate/{id}', 'api\RateController@show');
        Route::post('rate', 'api\RateController@store');
        Route::delete('rates/{id}', 'api\RateController@delete');
        // Route::get('my-products', 'api\ProductController@myproducts');


    });

// Route::get('users/categories', 'api\UserController@GetCategories');