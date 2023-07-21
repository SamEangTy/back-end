<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControllerUser extends Controller
{
    function login (Request $req){
        $user = User::where('email',$req->email)->first();
        if(!$user){
            return ["message" =>"Email incorrect!"];
        } else if(!Hash::check($req->password,$user->password)){
            return ["message" =>"Password incorrect!"];
        } else{
            return ['user'=>$user,'message'=>'Login Success'];
        }
    }
    function register (Request $req){
       $user = User::where('email',$req->email)->first();
       if($user){
        return ['message'=>'User existing! Please sign up another email.'];
       }else{
           $req->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:6',
           ]);
    
           $user = new User([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
           ]);
           $user->save();
           return response()->json(['message'=>'User has been registered',$user]);
       }
    }
}
