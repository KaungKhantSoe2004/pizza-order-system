<?php

namespace App\Http\Controllers\user;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Models\firstCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    //
    public function homePage($category= "all"){

        $data = Product::when($category!=="all", function($query){
            $query->where("category_id",request("category"));
        })->paginate(9);

        $total = Cart::where("user_id",Auth::user()->id)->get();
        $total = count($total);
$orderTotal = Order::where("user_id",Auth::user()->id)->get();
$orderTotal = count($orderTotal);
        $categories = Category::get();
        // dd($data->total());
        return view("user.main.home", compact(["data",'categories', 'total',"orderTotal"]));
    }

    public function jPizza(Request $request){
        // logger($request->all());
        $data = Product::orderBy("created_at", $request->status)->get();
        return $data;
    }

// jClearCart
public function jClearCart(){
    Cart::where("user_id",Auth::user()->id)->delete();
}
// eachCartRemove
public function eachCartRemove(Request $request){

    $cartId = $request->cart_id;
    // logger($cartId);
    Cart::where("cart_id",$cartId)->delete();
}

// jquery viewCount
public function viewCount(Request $request){
    $id = intval($request->id);
  $viewCount = Product::where("product_id",$id)->first()->view_count;
  $view = 1+ $viewCount;
  Product::where("product_id",$id)->update([
    'view_count'=>$view
  ]);
  return response()->json("success", 200);
}
    public function jOrder(Request $request){
        // return "<h1>This is or blah blah.</h1>";
        logger($request->all());
        $total = 0;
        foreach ($request->all() as $each) {
       $data =    firstCart::create([
            "user_id"=> Auth::user()->id,
            "product_id"=>$each["product_id"],
            "order_code"=>$each["order_code"],
            "each_total"=>$each["each_total"],
            "qty"=>$each["qty"],
           ]);
           $total += $each["each_total"];
        }
        Cart::where("user_id",Auth::user()->id)->delete();
Order::create([
    "user_id"=> Auth::user()->id,
    "order_code"  =>$data->order_code,
    "total_price"=>$total+3000,
]);
return response()->json(
    [
        "status"=> "true",
    "message"=>"order_completed",

    ]
);
    }
// direct orderpage
public function orderPage(){
    $orders = Order::where("user_id",Auth::user()->id)->paginate(6);

    return view("user.main.order", compact('orders'));
}


// direct user Info
public function userInfo(Request $request){
    $product = Product::where("product_id", $request->productId)->first();
    $products = Product::paginate("5");
// $products = Product::get()->random();
// dd($products->toArray());
//    dd($products);
    $categoryName = Category::select("name")->where("category_id", $product->category_id)->first()->name;
    // dd($categoryName);
    return view("user.main.pizzaInfo", compact(["product","categoryName", "products"]));
}


// ajax delete order
public function deleteOrder(Request $request){
// logger($request->id);
$id = $request->id;
Order::where("order_id",$id)->delete();
return response()->json("success delete", 200);
}


// direct contact page
public function contactPage(){
return view("user.main.contact");
}
// contact user
public function contactUser(Request $request){
$data = $this->insertableArray($request);
// dd($data);
Contact::create($data);
return redirect()->route('user#contactPage')->with(["contactSuccess"=>"Message posted to Admin team. We will reply soon.Have a great Day!"]);
}


// private funciton get insertable Array
private function insertableArray($request){
    $validatingRules = [
        "name"=> ['required'],
        "email"=> ["email","required"],
        "message"=>["min:20", 'required']
    ];
    Validator::make($request->all(),$validatingRules)->validate();
    return [
        "name"=> $request->name,
        "email"=>$request->email,
        "message"=>$request->message
    ];
}
}
