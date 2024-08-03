<?php

namespace App\Http\Controllers\API;

use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class routeController extends Controller
{
    public function productList(){
        $product = Product::get();
        return response()->json($product,200);
    }
    public function categoryList(){
        $category = Category::get();
        return response()->json($category,200);
    }

    // Create category
    public function categoryCreate(Request $request){
        $data = $this->getCategoryData($request);

        $response  = Category::create($data);
        return response()->json($response,200);
    }

    // create contact
    public function contactCreate(Request $request){
        $data = [
            "name"=> $request->name,
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now()
        ];


        Contact::create($data);
        $contact =Contact::orderBy('created_at','desc')->get();
        return response()->json($contact,200);
    }

    //delete Data
    public function deleteCategory($id){
        $data = Category::where('id', $id)->first();

        if(isset($data)){
            Category::where('id', $id)->delete();
            return response()->json(['status'=> true, 'message'=>'delete success', 'deleteData'=>$data],200);
        }
        return response()->json(['status'=> false,'message'=> 'There is no category here!!'],200);
    }

    // details category
    public function detailsCategory($id){
        $category = Category::where('id', $id)->first();

        if(isset($category)){
            return response()->json(['status'=> true,'category'=> $category],200);
        }
        return response()->json(['status'=> false,'message'=> 'There is no cataegory here'],500);
    }

    // update category
    public function updateCategory(Request $request){
        $categoryId = $request->category_id;

        $dbSource =Category::where('id', $categoryId)->first();

        if(isset($dbSource)){
            $data = $this->getCategoryData($request);
            Category::where('id', $categoryId)->update($data);
            $response =  Category::where('id', $categoryId)->first();
            return response()->json(['status'=> true,'message'=>'category update success...','category'=> $response],200);
        }
        return response()->json(['status'=> false,'message'=> 'There is no cataegory for update here'],500);
    }

    //get contact data
    private function getContactData($request){

        return [
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'message' => $request->description,
            'user_id'=> $request->user_id
        ];

    }
    //get category data
    private function getCategoryData($request){
        return[
            'name'=> $request->category_name,
            'updated_at'=> Carbon::now()
        ];
    }
}
