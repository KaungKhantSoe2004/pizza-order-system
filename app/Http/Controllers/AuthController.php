<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
// direct dashboard
public function dashboard(){
    if(Auth::user()->role === "admin"){
return redirect(route("category#list"));
    }elseif (Auth::user()->role === "user") {
  return redirect(route("user#home"));
    }
}

    // direct login Page
    public function loginPage(){
        return view("login");
    }

 //   direct register Page
    public function registerPage(){
        return view("register");
    }


    // changePassword Page direct
    public function changePasswordPage(){
        return view("admin.password.changePassword");
    }
// change Password
public function changePassword(Request $request){
   $data =  Auth::user()->password;
if(Hash::check($request->oldPassword,$data)){
    $changablePassword = $this->getNewChangablePassword($request);
    //  dd($changablePassword, Auth::user()->id);

$user = User::where("id",Auth::user()->id)->update($changablePassword);

    Auth::logout();
    return redirect()->route("auth#loginPage");
}else{
    return redirect()->route("changePasswordPage")->with(["passwordDifferent"=>"Old password doesn't match Your Password"]);
}

}


// private function for change Password
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

public function details(){
    return view("admin.account.details");
}

}
