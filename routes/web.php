<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes(['register' => config('app.isft')]);

Route::get('storage/{filepath}/{filename}', function ($filepath,$filename)
{
	$path = storage_path('app/public/'.$filepath.'/'.$filename);
	if (!File::exists($path)) {
		abort(404);
	}
	$file = File::get($path);
	$type = File::mimeType($path);
	$response = Response::make($file, 200);
	$response->header("Content-Type", $type);
	return $response;
}); 
   

Route::group(['middleware' => ['auth']], function () {
    Route::post('/foodtypestore', 'FoodtypeController@store');
    Route::post('/foodtypeupdate', 'FoodtypeController@update');
    Route::get('/foodtypes', 'FoodtypeController@index');
    Route::get('/foodtypestoredelete/{id}', 'FoodtypeController@destroy');
    Route::get('/foodtypestatus/{id}/{status}', 'FoodtypeController@changestatus');
	
});
