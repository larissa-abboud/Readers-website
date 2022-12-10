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

Route::group(['prefix' => 'v1'], function () {

    /* Authentication Routes */
   

    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);

    

    /* Middleware for authentication */
    Route::group(['middleware' => 'auth:api'], function () {
        

    });

    /* User Routes */
    Route::group(['prefix' => 'user'], function () {
        
        /**
         * create post //post
         * display all psots//get
         * display all users//get
         * display specific user //get
         * update like//post
         * udpate comment//post
         * 
         * edit profile//post
         * display profile //get
         * 
         */

 


       //need authetication then we recive token that is used here

    });

});
