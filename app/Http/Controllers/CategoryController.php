<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // direct catgory list page
    public function list(){
        // return "<h1>hello world</h1>";
        $data = Category::when(request('key'), function($query){
            $query->where("name", 'like', '%'.request("key").'%');
        })
        ->orderBy("category_id", 'desc')->paginate(5);
        // dd($data->toArray());
      return view('admin.category.list', compact("data"));
    }

    // direct category create page
    public function createPage(){
        return view('admin.category.create');
    }

    // create Category
    public function createCategory(Request $request){
        // dd($request->all());
$data = $this->getCreatableCategory($request);
Category::create($data);
 return Redirect::route("category#list")->with(['createSuccess'=>"Category Creation Succeded..."]);
// dd($data);
    }

// delete Category
public function deleteCategory($id){
// dd($id);
Category::where("category_id", $id)->delete();
return redirect()->route("category#list")->with(['deleteCategory'=>"Category Deleted..."]);
}


// edit category Page
public function editCategoryPage(){
    $category_id = request('id');
    $updatableCategory = Category::where("category_id", $category_id)->first();
    // dd($updatableCategory->toArray());

    return view("admin.category.edit", compact("updatableCategory"));
}

// edit category
public function editCategory(Request $request){
 $data = $this->getUpdatableCategory($request);
Category::where("category_id",$request->category_id)->update($data);
return redirect()->route("category#list");
}

    // private function
    private function getCreatableCategory ($request){
Validator::make($request->all(), ["categoryName"=> "required|unique:categories,name"], [
    'categoryName.required'=>'You need to Fill',
'categoryName.unique'=> 'Category You have filled already exist.'
])->validate();
        return [
            "name"=> $request->categoryName
        ];
    }



// edit private function
private function getUpdatableCategory($request){
    $validatingRules = [
        "categoryName"=>['required',Rule::unique("categories","name")->ignore($request->category_id,'category_id')]
    ];
    Validator::make($request->all(),$validatingRules)->validate();
    return [
        "name"=> $request->categoryName
    ];
}


}
