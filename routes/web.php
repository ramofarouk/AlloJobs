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

Route::match(['get', 'post'], '', 'App\Http\Controllers\Admin\AuthentificationController@login'); 
Route::match(['get', 'post'], 'policy', 'App\Http\Controllers\Admin\AuthentificationController@policy'); 


Route::prefix('admin')->group(function () {
    Route::match(['get', 'post'], '', 'App\Http\Controllers\Admin\AuthentificationController@login');
    Route::match(['get', 'post'], 'login', 'App\Http\Controllers\Admin\AuthentificationController@login');
    Route::match(['get', 'post'], 'forget-password', 'App\Http\Controllers\Admin\AuthentificationController@forgetPassword');


    Route::group(['middleware' => ['admin']], function () {
        Route::get('/dashboard', 'App\Http\Controllers\Admin\DashboardController@index');
        Route::match(['get', 'post'], '/change-password', 'App\Http\Controllers\Admin\DashboardController@changePassword');
        Route::match(['get', 'post'], '/profile', 'App\Http\Controllers\Admin\DashboardController@profile');
        Route::match(['get', 'post'], '/journaux', 'App\Http\Controllers\Admin\DashboardController@journaux');
        Route::match(['get', 'post'], '/candidats', 'App\Http\Controllers\Admin\DashboardController@candidats');
        Route::match(['get', 'post'], '/entreprises', 'App\Http\Controllers\Admin\DashboardController@entreprises');
        Route::match(['get', 'post'], '/entreprises/validate/{id}', 'App\Http\Controllers\Admin\DashboardController@validateSoumission');

        Route::match(['get', 'post'], '/admins', 'App\Http\Controllers\Admin\AdminController@show');
        Route::match(['get', 'post'], '/admins/add', 'App\Http\Controllers\Admin\AdminController@add');
        Route::match(['get', 'post'], '/admins/edit/{id}', 'App\Http\Controllers\Admin\AdminController@edit');
        Route::match(['get', 'post'], '/admins/delete/{id}', 'App\Http\Controllers\Admin\AdminController@delete');


        Route::match(['get', 'post'], '/parametres', 'App\Http\Controllers\Admin\ParametreController@show');
        Route::match(['get', 'post'], '/parametres/add', 'App\Http\Controllers\Admin\ParametreController@add');
        Route::match(['get', 'post'], '/parametres/edit/{id}', 'App\Http\Controllers\Admin\ParametreController@edit');
        Route::match(['get', 'post'], '/parametres/delete/{id}', 'App\Http\Controllers\Admin\ParametreController@delete');

        
        Route::match(['get', 'post'], '/soumissions', 'App\Http\Controllers\Admin\SoumissionController@show');
         Route::match(['get', 'post'], '/soumissions/validate/{id}', 'App\Http\Controllers\Admin\SoumissionController@validateSoumission');

        Route::get('/logout', 'App\Http\Controllers\Admin\DashboardController@logout');    
    });

});

// For others functionality
Route::get('/migrate-fresh', function () {

    Artisan::call('migrate:fresh');

    Artisan::call('db:seed');

    Artisan::call('config:cache');

    Artisan::call('config:clear');

    Artisan::call('cache:clear');

    Artisan::call('route:clear');

    Artisan::call('view:clear');

    Artisan::call('clear-compiled');

    return "OK.";
});

Route::get('/clear-cache', function () {

    Artisan::call('config:cache');

    Artisan::call('config:clear');

    Artisan::call('cache:clear');

    Artisan::call('route:clear');

    Artisan::call('view:clear');

    Artisan::call('clear-compiled');

    return "OK.";
});