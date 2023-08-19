<?php

namespace App\Http\Controllers;

use App\Models\Categery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerCategery extends Controller
{
    function listCategery()
    {
        return Categery::all();
    }
    function getOne($id)
    {
        $categery = DB::select('select * from categeries where categery_id = ?', [$id]);
        // $categery = Categery::find($id);
        return $categery;
    }
    function addCategery(Request $req)
    {
        $categery = new Categery;
        $categery->categery_name = $req->input('categery_name');
        $categery->save();
        return $categery;
    }
    function updateCategery(Request $req,$id)
    {
        $categery = Categery::find($id); 
        if($categery){
            $categery->update($req->all());
            $categery->categery_name = $req->input('categery_name');
            $categery->save();
                return response(['message'=> 'update success', 'data'=>$categery]);
            }else{
                return response(['message'=>"Categery ID not found!"]);
            }
        return $categery;
    }
    function deleteCategery($id)
    {
        $categery = Categery::find($id);
        $deleteCategery = Categery::where('categery_id',$id)->delete();
        if($deleteCategery)
        {
  
          return ['message'=>'Categery delete succes','Categery has been delete'=>$categery];
        }else
        {
          return ['message'=>'Categery not found!'];
  
        }
    }
}
