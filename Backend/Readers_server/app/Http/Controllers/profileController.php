<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileController extends Controller
{
    //edits profile bio
    function editMain(Request $request ,$id){ 
        $profile = Profile::find($id);
        $profile->Bio= $request->Bio;
   
    
        if($profile->save()){
        return response()->json([
            "result" => true 
        ]);}
    }
    
}
