<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/
//routes then controllers
* v1 Routes */
Route::group(['prefix' => 'v1'], function () {

    /* Authentication Routes */
   

    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);

    

    /* Middleware for authentication */
    Route::group(['middleware' => 'auth:api'], function () {

       //need authetication then we recive token that is used here

    });

});
