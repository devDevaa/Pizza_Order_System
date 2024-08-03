<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    // sorting data with ajax
    public function pizzaList(Request $request)
    {
        // logger($request->status);
        if ($request->status == "desc") {
            $data = Product::orderBy("created_at", "desc")->get();
        } else {
            $data = Product::orderBy("created_at", "asc")->get();
        }

        return response()->json($data, 200);
    }

    // add to cart with ajax
    public function addCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                "status" => "error",
                "message" => "Unauthorized"
            ], 401);
        }

        $data = $this->getOrderData($request);
        // logger($data);
        Cart::create($data);

        $response = [
            "status" => "success",
            "message" => "Add to Cart complete"
        ];
        return response()->json($response, 200);
    }



    //order
    public function order(Request $request)
    {
        $total = 0;
        foreach ($request->all() as $item) {
            $data = OrderList::create([
                'user_id' => $item['userId'],
                'product_id' => $item['productId'],
                'qty' => $item['qty'],
                'total' => $item['total'],
                'order_code' => $item['orderCode'],
            ]);
            $total += $data->total;
        }

        Cart::where('user_id', Auth::user()->id)->delete();

        Order::create([
            'user_id' => Auth::user()->id,
            'order_code' => $data->order_code,
            'total_price' => $total + 3000
        ]);


        return response()->json([
            'status' => 'success',
            'message' => 'order completed'
        ], 200);
    }


    // clear cart
    public function clearCart()
    {
        Cart::where('user_id', Auth::user()->id)->delete();
    }


    // clear current product
    public function clearCurrentProduct(Request $request)
    {
        Cart::where('user_id', Auth::user()->id)
            ->where('product_id', $request->productId)
            ->where('id', $request->orderId)
            ->delete();
    }


    // increase viewCount
    public function increaseViewCount(Request $request){
        $pizza = Product::where('id', $request->productId)->first();
        $viewCount = [
            'view_count'=> $pizza->view_count +1
        ];
        Product::where('id', $request->productId)->update($viewCount);
    }


    // get order data from the ajax resquest (use for add cart method)
    private function getOrderData(Request $request)
    {
        return [
            'user_id' => $request->user()->id,
            'product_id' => $request->pizzaId,
            'qty' => $request->count,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
