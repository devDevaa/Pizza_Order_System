<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // pizza list
    public function list()
    {
        $pizzas = Product::select('products.*', 'categories.name as category_name')
            ->when(request('key'), function ($query) {
                $query->where('products.name', 'like', '%' . request('key') . '%');
            })
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->orderBy('products.created_at', 'desc')
            ->paginate(3);
        $pizzas->appends(request()->all());
        return view('admin.product.pizzaList', compact('pizzas'));
    }
    //direct pizza create page
    public function createPage()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.product.createPage', compact('categories'));
    }

    // create function with photo handling
    public function create(Request $request)
    {
        $this->productValidationCheck($request, 'create');
        $data = $this->requestProductInfo($request);

        // generate unique pizza image name with the client name for database
        $fileName = uniqid() . $request->file('pizzaImage')->getClientOriginalName();
        // store pizza in storage
        $request->file('pizzaImage')->storeAs('public', $fileName);
        // for data base
        $data['image'] = $fileName;

        // store to database
        Product::create($data);
        return redirect()->route('product#list');
    }
    //direct pizza delete page
    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('product#list')->with(['deleteSuccess' => 'Prouduct Delete Success....']);
    }
    //pizza edit page
    public function edit($id)
    {
        $pizza = Product::select('products.*', 'categories.name as category_name')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->where('products.id', $id)->first();
        return view('admin.product.edit', compact('pizza'));
    }

    //product update page
    public function updatePage($id)
    {
        $pizza = Product::where('id', $id)->first();
        $categories = Category::get();
        return view('admin.product.update', compact('pizza', 'categories'));
    }

    //Product Update
    public function update(Request $request)
    {
        $this->productValidationCheck($request, 'update');
        $data = $this->requestProductInfo($request);

        if ($request->hasFile('pizzaImage')) {
            $oldImageName = Product::where('id', $request->pizzaId)->first();
            $oldImageName = $oldImageName->image;

            if ($oldImageName != null) {
                Storage::delete('public/' . $oldImageName);
            }

            $fileName = uniqid() . $request->file('pizzaImage')->getClientOriginalName();
            $request->file('pizzaImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }
        Product::where('id', $request->pizzaId)->update($data);
        return redirect()->route('product#list');
    }

    // Product Details to array to add in database
    private function requestProductInfo($request)
    {
        return [
            'category_id' => $request->pizzaCategory,
            'name' => $request->pizzaName,
            'description' => $request->pizzaDescription,
            'price' => $request->pizzaPrice,
            'waiting_time' => $request->waitingTime
        ];
    }
    // validation check
    private function productValidationCheck($request, $action)
    {
        $validatationRules = [
            'pizzaName' => 'required|min:5|unique:products,name,' . $request->pizzaId,
            'pizzaCategory' => 'required',
            'pizzaDescription' => 'required',
            'pizzaPrice' => 'required',
            'waitingTime' => 'required'
        ];
        $validatationRules['pizzaImage'] = $action == "create" ? "required|mimes:jpg,jpeg,png,avif,webp|file" : "mimes:jpg,jpeg,png,avif,webp|file";

        Validator::make($request->all(), $validatationRules)->validate();

    }
}
