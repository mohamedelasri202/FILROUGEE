<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Repositories\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    public function add_order($request)
    {

        // Create the main order
        $order = Order::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'address' => $request['address'],
            'city' => $request['city'],
            'phone' => $request['phone'],
            'payment_method' => $request['payment_method'],
            'quantity' => $request['quantity'],
            'status' => $request['status'],
            'user_id' => auth()->id(),
            'total' => $request['total'],
        ]);

        // Create order_items for shoopingcart items
        $productIds = $request['shoopingcart_id'] ?? [];

        foreach ($productIds as $productId) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $productId,
                'type' => 'product', // or 'shoopingcart' if that's your convention
            ]);
        }

        // Create order_items for servicecart items
        $serviceIds = $request['servicecart_id'] ?? [];
        foreach ($serviceIds as $serviceId) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $serviceId,
                'type' => 'service',
            ]);
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

    public function showstatistic()
    {
        $revenue = Order::sum('total');
        return $revenue;
    }
}
