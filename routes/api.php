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

    /*
        Api Génération de Clé
    */
        Route::get("set-token", "App\Http\Controllers\Api\ApiController@setToken");
    /*
        Api Authentification
    */
        Route::post("auth/login", "App\Http\Controllers\Api\ApiAuthController@login");
        Route::post("auth/register", "App\Http\Controllers\Api\ApiAuthController@register");
        Route::post("auth/update-password", "App\Http\Controllers\Api\ApiAuthController@updatePassword");
        Route::post("auth/update-infos", "App\Http\Controllers\Api\ApiAuthController@updateInfos");
        Route::post("auth/update-avatar", "App\Http\Controllers\Api\ApiAuthController@updateAvatar");

        Route::post("reservations/add", "App\Http\Controllers\Api\ReservationController@add");
        Route::post("reservations/{id}", "App\Http\Controllers\Api\ReservationController@show");

        Route::post("feedback", "App\Http\Controllers\Api\ApiController@feedback");
