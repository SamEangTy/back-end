<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request as HttpRequest;

class ControllerHome extends Controller
{
    function homepage(){
        
        return Home::all();
        }
    function updateHome(HttpRequest $request,$id){
        $home = Home::find($id); 
        if($home){
            $home->update($request->all());
            $home->file_path = $request->file("file_path")->store('product');
            $home->save();
                return response(['message'=> 'update success', 'data'=>$home]);
            }else{
                return response(['message'=>"home not found!"]);
            }
        // return $home;
           }
}
