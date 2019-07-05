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

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('riders', 'RiderController');
Route::post('/userslist', 'RiderController@usersajax')->name('usersajax');
Route::get('riderdelete/{uuid}', 'RiderController@riderdelete');
Route::get('changestatus/{uuid}/{status}', 'RiderController@changestatus');


//Route::get('/user/list', 'EmployeeController@index')->name('userlist');
