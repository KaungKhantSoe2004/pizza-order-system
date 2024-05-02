<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //direct contactPage
    public function contactPage(){
    // if(  isset($request->key)){
    //     dd($request->key);
    // }
        $data = Contact::when(request('key'), function($query){
            $query->orWhere('contacts.name', 'like', '%'.request('key')."%")->orWhere("contacts.message",'like','%'.request('key').'%');
        })
        ->paginate(6);
        // dd($data->toArray());
        return view("admin.contact.contact", compact('data'));
    }


    // delete Mail
    public function delete(Request $request){
$id = intval($request->contact_id);
Contact::where("contact_id",$id)->delete();
    return redirect()->route('admin#mailListPage')->with(["deleteSuccess"=>"One Mail deleted"]);
    }

// contact info
public function contactInfo(Request $request){
    $id = intval($request->contact_id);
    $data = Contact::where("contact_id",$id)->first();
    return view("admin.contact.eachInfo",compact('data'));
}

}
