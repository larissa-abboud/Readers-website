<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class actionPostController extends Controller
{
    //update comment count
    //update like count
    function updateLikes($id){

        $post = Post::find($id);
        $post->likes = $post->likes +1;
        
        $post->save();

        return response()->json([
            "result" => true 
        ]);
    }
    function updateComments($id){

        $post = Post::find($id);
        $post->comments = $post->comments +1;
        
        $post->save();

        return response()->json([
            "result" => true 
        ]);
    }

}
