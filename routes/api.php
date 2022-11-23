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
        Route::post("auth/register-entreprise", "App\Http\Controllers\Api\ApiAuthController@registerEntreprise");
        Route::post("auth/update-entreprise", "App\Http\Controllers\Api\ApiAuthController@updateEntreprise");
        Route::post("auth/check", "App\Http\Controllers\Api\ApiAuthController@check");
        Route::post("auth/update-password", "App\Http\Controllers\Api\ApiAuthController@updatePassword");
        Route::post("auth/update-infos", "App\Http\Controllers\Api\ApiAuthController@updateInfos");
        Route::post("auth/update-avatar", "App\Http\Controllers\Api\ApiAuthController@updateAvatar");

        Route::get("chat/{id}/{id2}", "App\Http\Controllers\Api\ApiController@discussion");
        Route::post("chat/send/{id}/{id2}", "App\Http\Controllers\Api\ApiController@send");

        Route::get("candidats", "App\Http\Controllers\Api\ApiController@candidats");
        Route::get("entreprises", "App\Http\Controllers\Api\ApiController@entreprises");

        Route::post("soumission/add", "App\Http\Controllers\Api\SoumissionController@add");
        Route::post("soumision/{id}", "App\Http\Controllers\Api\SoumissionController@show");

        Route::post("feedback", "App\Http\Controllers\Api\ApiController@feedback");
