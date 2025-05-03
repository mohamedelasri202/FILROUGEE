<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function register($request)
    {
        $user = new User();
        $user->name = $request['name'];
        $user->lastname = $request['lastname'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->role = $request['role'];
        $user->save();
        return $user;
    }


    public function login($request) {}

    public function updatesatatus($id, $status)
    {
        $user = User::find($id);
        $user->status->update($status);
        $user->save();
        return $user;
    }
    public function editeprofile($id, $request)
    {

        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,

        ]);


        $user->update([
            'name' => $validatedData['name'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],

        ]);


        return $user;
    }
    public function filterusers($request)
    {
        $query = User::query();


        $query->where('role', '!=', 'admin');


        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $users = $query->get();

        return $users;
    }
    public function myorders()
    {

        $userId = auth()->id();

        $orderProducts = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('shoopingcart', 'order_items.item_id', '=', 'shoopingcart.id')
            ->join('products', 'shoopingcart.product_id', '=', 'products.id')
            ->where('orders.user_id', $userId)
            ->where('shoopingcart.status', 'confirmed')
            ->where('order_items.type', 'product') // ✅ New condition here
            ->select(
                'orders.id as order_id',
                'orders.created_at',
                'orders.total as order_total',
                'products.title',
                'products.image',
                'products.price',
                'shoopingcart.quantity'
            )
            ->orderBy('orders.id', 'desc')
            ->get()
            ->groupBy('order_id');

        return $orderProducts;
    }
}
