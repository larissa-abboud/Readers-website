<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;

class UserController extends Controller
{
//login
//regsiter  
//both need to be authenticated
//save acces token after log in
 public function login(Request $request) {

    $validator = Validator::make($request->all(), [
      /*  'email' => 'required|email',
        'password' => 'required|string',*/
        //add attributes

    ]);
    if ($validator->fails()) {
        return response()->json($validator->errors(), 202); 
    }
    if (! $token = auth()->attempt($validator->validated())) {
        return response()->json(['error' => 'Unauthorized'], 200); 
    }
    return $this->respondWithToken($token);
}
 protected function respondWithToken($token) {
    return response()->json([
        'access_token' => $token,
        'user' => Auth::user(),
        'token_type' => 'bearer',
        'expires_in' => auth()->factory()->getTTL() * 60
    ]);
}


}
