<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderList;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list()
    {
        $orders = Order::select('Orders.*', 'users.id as user_id', 'users.name as user_name', 'users.phone as user_phone')
            ->when(request('key'), function ($query) {
                $query->where('Orders.order_code', 'like', '%' . request('key') . '%');
            })
            ->leftJoin('users', 'users.id', 'Orders.user_id')
            ->orderBy('created_at', 'desc')
            ->get();

        // $orders->appends(request()->all());
        return view("admin.product.orderList", compact("orders"));
    }

    // sort with ajax status
    public function changeStatus(Request $request)
    {
        $orders = Order::select('Orders.*', 'users.id as user_id', 'users.name as user_name', 'users.phone as user_phone')
            ->leftJoin('users', 'users.id', 'Orders.user_id')
            ->orderBy('created_at', 'desc');

        if ($request->orderStatus == null) {
            $orders = $orders->get();
        } else {
            $orders = $orders->where('orders.status', $request->orderStatus)->get();
        }
        return view("admin.product.orderList", compact("orders"));
    }
    // ajax change Status
    public function ajaxChangeStatus(Request $request){
        Order::where('id', $request->orderId)->update(['status'=> $request->status]);

        // $orders = Order::select('Orders.*', 'users.id as user_id', 'users.name as user_name', 'users.phone as user_phone')
        //     ->leftJoin('users', 'users.id', 'Orders.user_id')
        //     ->orderBy('created_at', 'desc');
        // return response()->json($orders, 200);
    }
    //order list info
    public function listInfo(Request $request, $orderCode){
        $order = Order::where('order_code', $orderCode)->first();
        $orderList = OrderList::select('order_lists.*', 'users.name as user_name','products.image as product_image','products.name as product_name')
        ->leftJoin('users', 'users.id','order_lists.user_id')
        ->leftJoin('products', 'products.id','order_lists.product_id')
        ->where('order_code', $orderCode)
        ->get();
        return view('admin.order.productList', compact('orderList','order'));
    }
}
