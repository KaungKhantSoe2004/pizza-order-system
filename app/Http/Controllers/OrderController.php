<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\firstCart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderListPage(){

// direct order list Page
if(request('status')=== null){

$status = 'all';
}else{
    $status = request("status");
}
        $data = Order::leftJoin("users", 'orders.user_id', 'users.id')
        ->when($status !== "all", function($q){
$q->where('orders.status', intval(request('status')));
        })
        ->orderBy("orders.created_at", 'desc')
        // ->get();
        ->paginate(5);
        // dd($data->toArray());
        return view("admin.order.orderList", compact('data'));
    }


// jquery change status
public function changeStatus(Request $request){
    // logger($request->all());
//   $updatableOrder =  Order::where("order_id",$request->orderId)->update([
//         "status" => $request->status
//     ]);
$orderId = $request->orderId;
$status = intval($request->status);
$data = Order::where("order_id",$orderId)->update([
    'status'=>$status
]);
    logger($data->toArray());

}

// direct eachOrder Page
public function eachOrderPage(){
    $orderCode = request("orderCode");
    $allTotal = Order::where("order_code",$orderCode)->first()->total_price;

    // dd($orderCode);
    $data = firstCart::select('first_carts.*', 'users.name', "products.name as products_name", 'products.product_img')
    ->leftJoin("products", 'first_carts.product_id','products.product_id')
    ->leftJoin("users", 'first_carts.user_id', 'users.id')

    ->where("order_code",$orderCode)
    ->get();
    // dd($data->toArray());
    return view("admin.order.eachOrder", compact(['data','allTotal']));
}

}
