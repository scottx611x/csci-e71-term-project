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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/asset/search', 'AssetController@search');
    Route::get('/asset/create', 'AssetController@create');
    Route::get('/asset/export', 'AssetController@export');
    Route::post('/asset', 'AssetController@store');
    Route::get('/asset/{id?}', 'AssetController@index');
    Route::get('/asset/{id?}/edit', 'AssetController@edit');
    Route::get('/asset/{id?}/export', 'AssetController@export');
    Route::put('/asset/{id?}', 'AssetController@update');
    Route::get('/asset/{id?}/delete', 'AssetController@delete');
    Route::delete('/asset/{id}', 'AssetController@destroy');

    Route::get('/computertype/create', 'ComputerTypeController@create');
    Route::post('/computertype', 'ComputerTypeController@store');
    Route::get('/computertype/{id?}', 'ComputerTypeController@index');
    Route::get('/computertype/{id?}/edit', 'ComputerTypeController@edit');
    Route::put('/computertype/{id?}', 'ComputerTypeController@update');

    Route::get('/assetrepairs/{id?}', 'AssetRepairController@index');
    Route::get('/computer/{id?}', 'ComputerController@index');
    Route::get('/computertype/{id?}', 'ComputerTypeController@index');
    Route::get('/group/{id?}', 'GroupController@index');
    Route::get('/location/{id?}', 'LocationController@index');
    Route::get('/outofservicecode/{id?}', 'OutOfServiceCodeController@index');
    Route::get('/vendor/{id?}', 'VendorController@index');
    Route::get('/warranty/{id?}', 'WarrantyController@index');
    Route::get('/keyword/{id?}', 'KeywordController@index');
});

Auth::routes();
