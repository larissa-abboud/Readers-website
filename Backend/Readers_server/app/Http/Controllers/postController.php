<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
    //

    function displayPosts(){

        $posts = Post::all();

        return response()->json([
            "result" => $posts 
        ]);
    }
    function displayAllUsers(){
        $userss = User::all();

        return response()->json([
            "result" => $users 
        ]);
    }
    

    function createPost(Request $request  ){
        $post = new Post;
        

        $post->user_id = $request->user_id;
        $post->type_id = $request->type_id;
        $post->content = $request->content;
        $post->likes = $request->likes;
        $post->comments = $request->comments;
        

    if($post->save()){
        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $user
        ], 201);
    }else{
        return response()->json([
            'success' => false,
            'message' => 'Fail',
        ], 400);
    }    
}
}
