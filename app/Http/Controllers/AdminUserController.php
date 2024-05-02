<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\firstCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    //direct admin side user list page
    public function userListPage(){
        $data = User::where("role", 'user')->paginate(7);
        // dd($data->toArray());
        return view("admin.user.userListPage", compact('data'));
    }

// change Role
public function changeRole(Request $request){

    $data = User::where("id",$request->id)->update([
        'role'=> $request->role
    ]);

return response()->json();
}


// delete
 public function delete(Request $request){
$id = intval($request->id);
User::where("id",$id)->delete();
Cart::where("user_id",$id)->delete();
firstCart::where("user_id",$id)->delete();
Order::where("user_id",$id)->delete();
logger("ok");
return response()->json("success Delete", 200);
 }


 public function edit(Request $request){
    $id = intval($request->id);

$data = User::where("id",$id)->first();
return view("admin.user.userEditPage", compact('data'));
 }



// update
public function update(Request $request){
    $data = $this->getUpdatableData($request);
$id = intval($request->hiddenId);
$dd = User::where("id",$id)->first()->user_img;
if($dd!==null){
Storage::delete('public/'.$dd);
}

$path = uniqid().'kks'.$request->file('profile')->getClientOriginalName();
$request->file('profile')->storeAs('public/'.$path);
$data['user_img']=$path;
User::where("id",$id)->update($data);

return redirect()->route('admin#userListPage')->with(["updateSuccess"=>"Update success"]);
}

// private function updatable function
private function getUpdatableData ($request){
    $validatingRules = [
        "name"=>["required"],
        "email"=>["required","email"],
        "user_img"=> 'mimes:jpeg,jpg,gif|nullable',
        "phone"=>["required"],
        "address"=>["required"],
        "gender"=>["required"],
    ];
Validator::make($request->all(),$validatingRules)->validate();
return [

    "name"=> $request->name,
    "email"=> $request->email,
    "phone"=>$request->phone,
    "address"=>$request->address,
    "gender"=>$request->gender,
];
}

}
