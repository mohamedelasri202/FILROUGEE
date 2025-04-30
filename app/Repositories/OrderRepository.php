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
        $usersWithOrders = User::select('name', 'lastname', 'email')
            ->withCount('orders')
            ->withSum('orders', 'total')
            ->withMax('orders', 'created_at')
            ->has('orders')
            ->get();

        return $usersWithOrders;
    }


    public function allOrders()
    {
        $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.id', 'orders.status', 'orders.total', 'orders.created_at', 'orders.name', 'orders.last_name', 'users.name', 'users.lastname') // select the order fields you want
            ->get();

        return $orders;
    }

    public function showstatistic()
    {
        $statistic = DB::table('orders')->selectRaw('COUNT(*) as total_orders, COUNT(DISTINCT user_id) as customers, SUM(total) as revenue,ROUND(AVG(total), 2)  as average_price')->first();


        return   $statistic;
    }
}
