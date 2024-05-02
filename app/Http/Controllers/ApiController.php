<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ApiController extends Controller
{
    //get category
    public function apiGetCategories(){
      $dat = Category::get();
      $produ = Product::get();
    //   return $data;
    $data = [
        'category'=>$dat,
        'product'=>$produ
    ];
      return response()->json($data, 200);
    }

    // new Category
    public function apiNewCategory(Request $request){
        $data = [
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ];
     $ans =   Category::create($data);
return response()->json($ans, 200);
    }

    public function apiDeleteCategory(Request $request){
       $id = $request->id;
    //    return $id;
    $data =   Category::where("category_id",$id)->delete();
    return response()->json($data, 200);
    }

    public function apiEditProduct(Request $request){
        $data = Product::where("product_id",$request->id)->first();
        $data = [
            'product'=> $data
        ];
        return response()->json($data, 200);
        // return '<h2>Hello</h2>';
    }

    public function apiUpdateProduct(Request $request){
        $id =intval( $request->id);
    $boo = Contact::where("contact_id",$id)->get();
    // return $boo;
        $updatableData = [
            'name'=> $request->name,
            'email'=>$request->email,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ];
        if(isset($boo)){
          $data =  Contact::where("contact_id",$id)->update($updatableData);
        return response()->json($data, 200);
        }
        return $updatableData;

    }

}
