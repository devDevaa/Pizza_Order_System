<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function home()
    {
        $pizza = Product::orderBy("created_at", "desc")->get();
        $category = Category::get();
        $cart = Cart::where("user_id", Auth::user()->id)->get();
        $history = Order::where('user_id', Auth::user()->id)->get();
        return view("user.main.home", compact("pizza", "category", "cart", "history"));
    }


    //password change page
    public function changePassword()
    {
        return view("user.password.change");
    }
    //change password
    public function change(Request $request)
    {
        $this->passwordValidationCheck($request);
        $user = User::select('password')
            ->where('id', Auth::user()->id)->first();
        $dbHashValue = $user->password;
        if (Hash::check($request->oldPassword, $dbHashValue)) {
            $data = [
                'password' => Hash::make($request->newPassword)
            ];
            User::where('id', Auth::user()->id)->update($data);

            // if this need to logout
            // Auth::logout();
            // return redirect()->route('auth#loginPage');
            return back()->with(['changePassword' => 'Changed Successfully']);
        }
        return back()->with(['notMatch' => 'password not match']);
    }

    //account details
    public function details()
    {
        return view('user.account.details');
    }
    //account update
    public function update(Request $request, $id)
    {
        $this->accountValidationCheck($request);
        $data = $this->getUserData($request);
        if ($request->hasFile('image')) {
            //1 old image name | check =>delete | store
            $dbImage = User::where('id', $id)->first();
            $dbImage = $dbImage->image;

            if ($dbImage != null) {
                Storage::delete('public/' . $dbImage);
            }

            $fileNmae = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileNmae);
            $data['image'] = $fileNmae;
        }
        User::where('id', $id)->update($data);
        return back()->with(['updateSuccess' => 'User Account Updated...']);
    }

    //filter category
    public function filter($categoryId)
    {
        $pizza = Product::where('category_id', $categoryId)->orderBy("created_at", "desc")->get();
        $category = Category::get();
        $cart = Cart::where("user_id", Auth::user()->id)->get();
        $history = Order::where('user_id', Auth::user()->id)->get();
        return view("user.main.home", compact("pizza", "category", "cart", "history"));
    }

    //pizza Details
    public function pizzaDetails($productId)
    {
        $pizza = Product::where("id", $productId)->first();
        $pizzaList = Product::get();
        return view("user.main.details", compact("pizza", "pizzaList"));
    }


    // cart list
    public function cartList()
    {
        $cartList = Cart::select('carts.*', 'products.id as product_id', 'products.name as pizza_name', 'products.price as pizza_price', 'products.image as pizza_image')
            ->leftJoin("products", "products.id", "carts.product_id")
            ->where('user_id', Auth::user()->id)->get();

        $totalPrice = 0;
        foreach ($cartList as $cart) {
            $totalPrice += $cart->pizza_price * $cart->qty;
        }
        return view("user.main.cart", compact("cartList", "totalPrice"));
    }

    // history list
    public function history()
    {
        $order = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate('6');
        return view('user.main.history', compact('order'));
    }

    //get user data
    private function getUserData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ];
    }

    private function accountValidationCheck($request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'image' => 'mimes:png,jpg,jpeg,HEIC,avif,heic,psd|file',
            'address' => 'required'
        ], [])->validate();
    }
    private function passwordValidationCheck($request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:8',
            'newPassword' => 'required|min:8',
            'confirmPassword' => 'required|min:8|same:newPassword'
        ], [
            'oldPassword.required' => 'this field must be fill in.',
            'newPassword.required' => 'this field must be fill in.',
            'confirmPassword.required' => 'this field must be fill in.'
        ])->validate();
    }
}
