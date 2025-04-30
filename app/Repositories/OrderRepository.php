<?php

namespace App\Repositories;

use App\Models\User;
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

        $productIds = $request['shoopingcart_id'] ?? [];

        foreach ($productIds as $productId) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $productId,
                'type' => 'product',
            ]);
        }


        $serviceIds = $request['servicecart_id'] ?? [];
        foreach ($serviceIds as $serviceId) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $serviceId,
                'type' => 'service',
            ]);
        }
    }



    public function ordercount()
    {
        $usersWithOrders = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->where('order_items.type', 'product')
            ->select(
                'users.name',
                'users.lastname',
                'users.email',
                DB::raw('COUNT(DISTINCT orders.id) as product_orders_count'),
                DB::raw('SUM(orders.total) as product_orders_total'),
                DB::raw('MAX(orders.created_at) as latest_product_order')
            )
            ->groupBy('users.id', 'users.name', 'users.lastname', 'users.email')
            ->get();


        return $usersWithOrders;
    }


    public function allOrders()
    {
        $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->select(
                'orders.id',
                'orders.status',
                'orders.total',
                'orders.created_at',
                'orders.name',
                'orders.last_name',
                'users.name as user_name',
                'users.lastname as user_lastname',

            )
            ->where('order_items.type', 'product')
            ->get();


        return $orders;
    }

    public function showstatistic()
    {
        $statistic = DB::table('orders')->join('order_items', 'orders.id', '=', 'order_items.order_id')->selectRaw('COUNT(*) as total_orders, COUNT(DISTINCT user_id) as customers, SUM(total) as revenue,ROUND(AVG(total), 2)  as average_price')->where('order_items.type', '=', 'product')->first();


        return   $statistic;
    }
    public function allbookings()
    {

        $bookings = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->select(
                'orders.id',
                'orders.status',
                'orders.total',
                'orders.created_at',
                'users.name as user_name',
                'users.lastname as user_lastname',

            )
            ->where('order_items.type', 'service')
            ->get();


        return $bookings;
    }
}
