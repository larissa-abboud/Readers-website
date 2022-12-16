<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/
//routes then controllers

Route::group(['prefix' => 'v1'], function () {

    /* Authentication Routes */
   

    Route::post('/login', [UserController::class,'login']);
    Route::post('/register', [UserController::class,'register']);
    
//api worker becuase :
/**
 * http://127.0.0.1:8000/api/
 * added use in composer.json for the jwt token
 */
    

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
         * get comments//get
         * 
         * edit profile//post
         * display profile //get
         * add genre //post
         * add book in library//post
         * 
         */

         //post
         Route::group(['prefix' => 'posts'], function (){
            Route::post('/createPost', [postController::class, 'createPost']); 
            Route::post('/updateLike/{id?}', [actionPostController::class, 'updateLikes']);//takes id of post
            Route::post('/updatecomments/{id?}', [actionPostController::class, 'updatecomments']);//takes id of post
            Route::post('/addComment', [actionPostController::class, 'addComment']); //add comment from user to a certain post
            Route::get('/displayFeed', [postController::class, 'displayPosts']); //display all post in db
            Route::get('/displayUser', [postController::class, 'displayUser']); //display user details (visit profile?)
            Route::get('/displayAllUsers', [postController::class, 'displayAllUsers']); //display user details (visit profile?)
         });
         Route::group(['prefix' => 'profile'], function (){
            Route::post('/createProfile', [profileController::class, 'createProfile']);
            Route::group(['prefix' => 'editprofile'], function (){
                Route::post('/editMain', [profileController::class, 'editMain']); //bio
                Route::post('/editGenre', [profileController::class, 'editGenre']);
                Route::post('/editLibrary', [profileController::class, 'editLibrary']);
                //follower increase
                //following increase

            });
            Route::get('/displayUserProfile', [profileController::class, 'displayProfile']);
            //dispaly all details
            
            
         });
         
         //prrofile
         
        
         


 


       //need authetication then we recive token that is used here

    });

});
