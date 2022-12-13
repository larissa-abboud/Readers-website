<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
    //

    function displayPosts(){

        $users = User::all();

        return response()->json([
            "result" => $users 
        ]);
    }
    
}
