<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            

            
        } catch (\Throwable $th) {
            //return response(['error'=>'No valid data']);
        } 
        $validationData= $request-> validate
        (
            [
                'name'=>'required|max:55',
                'email'=>'email|require|unique:users',
                'password'=>'required|confirmed',
            ]
        );
        $user = User::create($validationData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=>$user,'accessToken'=>$accessToken]);
}

    public function login()
    { 
        
    }

    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 

    public function test()
    {
        return (['Test'=>'12345','hola'=>'BD']);
    }
}
