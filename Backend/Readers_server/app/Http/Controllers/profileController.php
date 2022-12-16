<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileController extends Controller
{
     //creates profile when user registers
    function creatProfile(Request $request,$id){
        $user_id = User::find($id);
        $profile = new Profile;
        $profile->user_id = $user_id;
        $profile->Bio = $request->Bio;
        $profile->followers = 0;
        $profile->following = 0;
        $profile->Books_list = $request->Books_list;
        $profile->genres_list = $request->genres_list;

        if($profile->save()){
            return response()->json([
                'success' => true,
                'message' => 'Success',
                'data' => $profile
            ], 201);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Fail',
            ], 400);
        }
    
    }
    //edits profile bio
    function editMain(Request $request ,$id){ 
        $profile = Profile::find($id);
        $profile->Bio= $request->Bio;
   
    
        if($profile->save()){
        return response()->json([
            "result" => true 
        ]);}
    }
    //edit genre list
    function editGernre(Request $request ,$id){ 
        $profile = Profile::find($id);
        $profile->genres_list =$profile->genres_list+ ';'+$request->genres_list;
        
    
        if($profile->save()){
        return response()->json([
            "result" => true 
        ]);}
    }
    //edit books list
    function editLibrary(Request $request ,$id){ 
        $profile = Profile::find($id);
        $profile->Books_list=$profile->Books_list + ';'+$request->Books_list;
        
    
        if($profile->save()){
        return response()->json([
            "result" => true 
        ]);}
    }
    
}
