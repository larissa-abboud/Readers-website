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
         * (display post type to add into a list and choose from)//get
         * display all psots//get
         * display all users//get
         * display specific user //get
         * update like//post
         * udpate comment//post
         * 
         * edit profile//post
         * display profile //get
         * add genre //post
         * add book in library//post
         * 
         */

         //post
         Route::post("createPost/{id?}", [postController::class, "createPost"]); //takes user id 
         Route::post("updateLike/{id?}", [postController::class, "updateLikes"]);//takes id of post
         Route::post("updatecomments/{id?}", [postController::class, "updatecomments"]);//takes id of post
         Route::get("displayFeed/", [postController::class, "displayPosts"]); //display all post in db
        
         


 


       //need authetication then we recive token that is used here

    });

});
