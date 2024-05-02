<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

        public function cartPage(){
            $data = Cart::where("user_id", Auth::user()->id)
            ->leftJoin("products", "carts.product_id", "products.product_id")
            ->get();
            // dd($data->toArray());
            $total = 0;
foreach ($data as $each) {
 $total += $each->price * $each->qty;

}
// dd($total);
            return view("user.main.cart", compact("data", 'total'));
        }
        public function cart(Request $request){

$data = $this->getCart($request);
logger($data);
Cart::create($data);
$response = [
    "message"=>"Add to Cart Success",
    "status"=> "true"
];
 return response()->json($response, 200);
        }
        private function getCart($request){
            return [
                "user_id"=> $request->user,
                "product_id"=>$request->product,
                "qty"=> $request->qty
            ];
        }
    }

