<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //direct product list page
     public function list(){
        $data = Product::select("products.*", "categories.name as category_name")
        ->when(request("key"), function($query){
$query->where("products.name", "like","%".request('key')."%");
        })->leftJoin('categories', "products.category_id", "categories.category_id")
        ->orderBy("products.created_at","desc")->paginate(5);
        // dd($data->toArray());
        return view("admin.product.list", compact("data"));
     }
    //  direct product create Page
     public function createPage(){
        $categories = Category::select("category_id",'name')->get();
        // dd($categories->toArray());
        return view("admin.product.create", compact("categories"));
     }
// create
public function create(Request $request){
    // return dd($request->all());
    $data = $this->getCreatableData($request);
    // dd($data);
    $path = uniqid()."pizza".$request->file("productImg")->getClientOriginalName();
    $request->file("productImg")->storeAs("public/".$path);
    $data["product_img"]= $path;
    Product::create($data);
    return redirect()->route('product#list')->with(["created"=>"New Product created successfully."]);
    // dd($data);
}
// product delete
 public function delete(){
    $id = request("id");
    $product = Product::where("product_id",$id)->first();

    Storage::delete("public/".$product->product_img);
Product::where("product_id",$id)->delete();

return redirect()->route("product#list")->with(["deleted"=>"Product Deleted"]);
 }
//  direct details page
public function detailsPage(){
    $id = request("id");
    $data = Product::where("product_id", $id)->first();
    // dd($data->product_img);
    $category = Category::select("name")->where("category_id",$data->category_id)->first();
    $category = $category->name;
    return view("admin.product.details", compact(["data","category"]));
}
// direct edit page
public function editPage(){
    $id = request('id');
    $data = Product::where("product_id",$id)->first();
    $categoryData = Category::get();

    return view("admin.product.edit", compact(['data',"categoryData"]));
}

// edit
 public function edit(Request $request){
    // dd($request->all());
    $data = $this->getUpdatableData($request);

    // dd($data);
    if($request->file("productImg")){
       $path =uniqid()."pizza".$request->file("productImg")->getClientOriginalName();
       $img = Product::select("product_img")->where("product_id",$request->product_id)->first()->product_img;
      if($img){
        Storage::delete("public/".$img);
      }
      $request->file("productImg")->storeAs("public/".$path);
      $data["product_img"]= $path;

    }
    Product::where("product_id",$request->product_id)->update($data);
    return redirect()->route("product#list")->with(["updated"=>"Product Updated"]);
 }
// getUpdatable function
 private function getUpdatableData($request){
    $validatingRules = [
        "productName"=> ["required",Rule::unique("products","name")->ignore($request->product_id,'product_id')],
        "productPrice"=>["required"],
        "productDescription"=>["required"],
        "productWaitingTime"=>["required"],
        "productImg"=> ["mimes:jpeg,jpg,png,gif"],
"categoryId"=>["required"],
    ];
    Validator::make($request->all(),$validatingRules)->validate();
    return [
        'category_id'=> $request->categoryId,
        "name"=> $request->productName,
        "description"=> $request->productDescription,
        "price"=> $request->productPrice,
        "waiting_time"=>$request->productWaitingTime,
    ];
 }
// getCreatableData function
private function getCreatableData($request){
    $validatingRules = [
        "productName"=> ["required","unique:products,name"],
        "productPrice"=>["required"],
        "productDescription"=> ["required", "min:10"],
        "productImg"=> ["required", "mimes:jpeg,jpg,png"],
        "waitingTime"=> ["required"],
        "productCategory"=> ["required"],
    ];
    Validator::make($request->all(),$validatingRules)->validate();
    return [
        "category_id"=> $request->productCategory,
        "name"=> $request->productName,
        "description"=> $request->productDescription,
        "price"=> $request->productPrice,
        "waiting_time"=> $request->waitingTime
    ];
}
}
