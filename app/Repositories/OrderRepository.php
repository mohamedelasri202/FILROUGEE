<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Repositories\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{

    public function add_order($request)
    {

        // Add each service
        if (!empty($request['servicecart_id'])) {
            foreach ($request['servicecart_id'] as $service_cart) {
                Order::create([
                    'name' => $request['name'],
                    'last_name' => $request['last_name'],
                    'email' => $request['email'],
                    'address' => $request['address'],
                    'city' => $request['city'],
                    'phone' => $request['phone'],
                    'payment_method' => $request['payment_method'],
                    'servicecart_id' => $service_cart,
                    'type' => $request['type'],
                    'quantity' => $request['quantity'],
                    'status' => $request['status'],
                    'user_id' => Auth::id(),
                    'total' => $request['total']
                ]);
            }
        }

        // Add only once for the product
        if (!empty($request['shoopingcart_id'])) {
            foreach ($request['shoopingcart_id'] as $shooping_id) {
                Order::create([
                    'name' => $request['name'],
                    'last_name' => $request['last_name'],
                    'email' => $request['email'],
                    'address' => $request['address'],
                    'city' => $request['city'],
                    'phone' => $request['phone'],
                    'payment_method' => $request['payment_method'],
                    'shoopingcart_id' => $shooping_id,
                    'type' => $request['type'],
                    'quantity' => $request['quantity'],
                    'status' => $request['status'],
                    'user_id' => Auth::id(),
                    'total' => $request['total']

                ]);
            }
        }
    }
    public function countorders_user()
    {

        $orders_count = DB::table('orders')
            ->join('shoopingcart', 'orders.shoopingcart_id', '=', 'shoopingcart.id')
            ->join('products', 'shoopingcart.product_id', '=', 'products.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->where('products.vendor_id', 26)
            ->whereNull('orders.servicecart_id')
            ->select('users.id as user_id', 'users.name', 'users.lastname', 'users.email', DB::raw('COUNT(orders.id) as total_orders'))
            ->groupBy('users.id', 'users.name', 'users.lastname')
            ->get();



        return $orders_count;
    }






    public function showorders()
    {
        $orders = DB::table('orders')
            ->join('shoopingcart', 'orders.shoopingcart_id', '=', 'shoopingcart.id')
            ->join('products', 'shoopingcart.product_id', '=', 'products.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->where('products.vendor_id', '=', Auth::id())
            ->select('orders.*', 'products.vendor_id', 'users.name as user_name', 'users.lastname as last_name')->latest()
            ->get();

        return $orders;
    }
}
