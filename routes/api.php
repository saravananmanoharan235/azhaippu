<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, Authorization, X-CSRF-Token');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::post('sendotp', 'API\UserController@sendotp');

Route::group(['middleware' => 'auth:api'], function(){

	//Users
	Route::post('userinfo', 'API\UserController@userinfo');
	Route::post('invite_friends', 'API\UserController@invite_friends');
	Route::post('logout','API\UserController@logoutApi');


	//Events
	Route::get('getevents', 'API\EventController@getevents');
	Route::post('addevent','API\EventController@addevent');
	Route::post('addeventphoto','API\EventController@addeventphoto');

});
