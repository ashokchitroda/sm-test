<?php

use Illuminate\Http\Request;

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
Route::post('/scrape', [
    'as' => 'scrape.index',
    'uses' => 'Api\ScrapeController@index'
]);

Route::post('/is_english', [
    'as' => 'language.index',
    'uses' => 'Api\LanguageController@index'
]);

Route::post('/add_address', [
    'as' => 'address.index',
    'uses' => 'Api\AddressController@store'
]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
