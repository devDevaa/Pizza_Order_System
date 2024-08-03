<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    //direct category list page with data searching function
    public function list(){
        $categories = Category::when(request('key'),function($query){
                            $query->where('name','like','%'.request('key').'%');
                            })
                            ->orderBy('id','desc')->paginate(4);

        return view('admin.category.list',compact('categories'));
    }

    //direct category create page
    public function createPage(){
        return view('admin.category.create');
    }

    //create category
    public function create(Request $request){
        $this->categoryValidationCheck($request);
        $data= $this->requestCategoryData($request);
        Category::create($data);
        return redirect()->route('category#list');
    }

    //delete category
    public function delete($id){
        Category::where('id',$id)->delete();
        return redirect()->route('category#list')->with(['deleteSuccess'=>'Deleted Success..']);
    }

    //edit page
    public function edit($id){
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit',compact('category'));

    }

    //update page
    public function update($id, Request $request){
        $this->categoryValidationCheck($request);
        $updatedata= $this->requestCategoryData($request);
        // $request->categoryId is hidden value from the form
        Category::where('id',$request->categoryId)->update($updatedata);
        return redirect()->route('category#list');
    }


    // --- Validation --- //
    private function requestCategoryData($request){
        return[
            'name'=>$request->categoryName
        ];
    }
    private function categoryValidationCheck($request){
       Validator::make($request->all(),[
        'categoryName'=> 'required  | unique:categories,name,'.$request->categoryId
       ])->validate();
    }
}
