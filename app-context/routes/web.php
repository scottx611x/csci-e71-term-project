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

Route::get('/asset/create', 'AssetController@create');
Route::post('/asset', 'AssetController@store');
Route::get('/asset/{id?}', 'AssetController@index');
Route::get('/asset/{id?}/edit', 'AssetController@edit');
Route::put('/asset/{id?}', 'AssetController@update');


Route::get('/assetrepairs/{id?}', 'AssetRepairController@index');
Route::get('/computers/{id?}', 'ComputerController@index');
Route::get('/computertypes/{id?}', 'ComputerTypeController@index');
Route::get('/groups/{id?}', 'GroupController@index');
Route::get('/locations/{id?}', 'LocationController@index');
Route::get('/outofservicecodes/{id?}', 'OutOfServiceCodeController@index');
Route::get('/vendors/{id?}', 'VendorController@index');
Route::get('/warranties/{id?}', 'WarrantyController@index');
