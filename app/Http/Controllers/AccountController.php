<?php

namespace App\Http\Controllers;
use Storage;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
// direct account list
public function list(){
    $data = User::when(request("key"), function ($query){
        $query->orWhere("name", "like", "%".request('key')."%")
        ->orWhere("email", "like", "%".request('key')."%")
        ->orWhere("gender", "like", "%".request('key')."%")
        ->orWhere("phone", "like", "%".request('key')."%")
        ->orWhere("address", "like", "%".request('key')."%");
    })
    ->where("role", "admin")
    ->paginate(3);
// dd($data->toArray());

    return view("admin.account.list", compact('data'));
}

// delete admin account
 public function delete($id){
   if($id === Auth::user()->id){
    return redirect()->route("account#list")->with(["notAvilable"=> "Sorry You can't delete your account"]);
   }
   User::where("id", $id)->delete();
   return redirect()->route("account#list")->with(["accountDeleted"=> "Account deleted!"]);
 }

    // direct account details

    public function details(){
        return view("admin.account.details");
    }
    // direct account editPage
    public function editPage(){

        return view("admin.account.edit");
    }
    // edit account function
    public function edit(Request $request){

$data = $this->getUpdatableData($request);

if($request->hasFile('profile')){

    if(Auth::user()->user_img!==null){
Storage::delete('public/'.Auth::user()->user_img);
    }
$path =  uniqid().'kks'.$request->file("profile")->getClientOriginalName();
// dd($path);
$request->file("profile")->storeAs('public/'.$path);
$data["user_img"] = $path;
}
$id = Auth::user()->id;
User::where("id",$id)->update($data);
return redirect()->route("account#details")->with((["updateSuccess"=>"Account Updating Success!"]));
    }

// admin end

// user start

public function userChangePasswordPage(){
    return view("user.account.changePassword");
}
public function userProfilePage(){
    return view("user.account.profile");
}

public function userChangePassword(Request $request){
    $data =  Auth::user()->password;
 if(Hash::check($request->oldPassword,$data)){
     $changablePassword = $this->getNewChangablePassword($request);
     //  dd($changablePassword, Auth::user()->id);

 $user = User::where("id",Auth::user()->id)->update($changablePassword);

    //  Auth::logout();
     return redirect()->route("user#home");
 }else{
     return redirect()->route("user#changePasswordPage")->with(["passwordDifferent"=>"Old password doesn't match Your Password"]);
 }

 }

// direct edit profile page
 public function editProfilePage(){
    return view('user.account.editProfile');

 }

public function demote(Request $request){
   User::where("id", $request->id)->update([
    'role'=> 'user'
   ]);
return response()->json("ok");
    // logger($request->all());
}

//  user edit
 public function userEdit(Request $request){
$data = $this->getUpdatableData($request);
// dd($data);
// if(Auth::user()->user_img !== null){
// Storage::delete('public/'.Auth::user()->user_img);
// }
if($request->file("profile") !== null){
    if(Auth::user()->user_img !== null){
        Storage::delete('public/'.Auth::user()->user_img);
        }
    $path = uniqid()."kks".$request->file("profile")->getClientOriginalName();
    $request->file("profile")->storeAs("public/".$path);
    $data["user_img"] = $path;
}

$id = Auth::user()->id;
User::where("id", $id)->update($data);
return redirect()->route("user#profilePage")->with((["updateSuccess"=>"Account Updating Success!"]));
 }

// private function for change password
private function getNewChangablePassword($request){

    $validatingRules = [
        "oldPassword"=> ["required","min:6", "max:12"],
        "newPassword"=> ["required", "min:6", "max:12"],
        "confirmPassword"=> ["required", "same:newPassword"]
        // 'oldPassword'=> 'required|min:6',
        // 'newPassword'=> 'required|min:6',
        // 'confirmPassword'=> 'required'
    ];
    // $validatingRules =[
    //     "oldPassword"=> ["requried"],
    //     "newPassword"=> ["requried"],
    //     "confirmPassword"=> ["requried",]
    // ];
Validator::make($request->all(),$validatingRules)->validate();
return [
    "name"=> Auth::user()->name,
    "email"=>Auth::user()->email,
    "phone"=>Auth::user()->phone,
    'address'=>Auth::user()->address,
    "role"=>Auth::user()->role,
    "password"=> Hash::make($request->newPassword)
];
}




// private function for update
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
