<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('/admin')->group(function () 
{
	Route::resource('events', 'EventController');
	Route::post('eventlist', 'EventController@ajaxlist');
	Route::get('eventdelete/{uuid}', 'EventController@eventdelete');
	Route::get('changestatus/{uuid}/{status}', 'EventController@changestatus');

});
//Route::get('/user/list', 'EmployeeController@index')->name('userlist');
