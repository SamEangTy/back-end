<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerProduct extends Controller
{
  function addProduct (Request $req)
  {
   $product = new Product;
//    $price = DB::table('prices')->insert(['price'=>$req->price,'discount'=>$req->discount]);
//    $categery = DB::table('categeries')->insert(['categery_name'=>$req->categery_name]);
   $product->name = $req->input('name');
   $product->categery_id = $req->input('categery_id');

   $product->price_id = $req->input('price_id');
//    $product->discount = $req->input('discount');
   $product->image = $req->file('image')->store('product/products');
   $product->save();
   return $product;
  }
  function listProduct ()
    //   $discount = DB::table('products')
    //   ->select(DB::raw('price * (discount/100) - price AS discountPrice'))
    //   ->get();
    {
        $products = DB::select("
        SELECT price - price * (discount/100) AS discountPrice,
        id, name, price, discount, image,
        categeries.categery_name  FROM `products`
        INNER JOIN prices on  products.price_id = prices.price_id 
        INNER JOIN categeries on products.categery_id = categeries.categery_id");
      // $products = DB::table('products')
            
      //    //  ->select(DB::raw('price * (discount/100) - price AS discountPrice'))
      //     ->join('categeries','categeries.categery_id','=','products.categery_id')
      //     ->join('prices','prices.price_id','=','products.price_id')
      //    //  ->select('products.*', 'products')
      //   ->get(['id','categery_name','name','price','discount','image']);
        return  $products;
    }
    function updateProduct (Request $req, $id)
    {
      $product = Product::find($id);
      if($product){
        $product->update($req->all());
        $product->image = $req->file('image')->store('product/products');
        $product->save();
        return ["message"=>'Product Update Success', $product];
      }else{
        return ["message"=>'Product ID not found'];
      }
    }
    function deleteProduct ($id)
    { 
      $product = Product::find($id);
      $deleteProduct = Product::where('id',$id)->delete();
      if($deleteProduct)
      {

        return ['message'=>'Product delete succes','Product has been delete'=>$product];
      }else
      {
        return ['message'=>'Product not found!'];

      }
    }
}
