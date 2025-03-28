<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\ShoopingcartRepositoryInterface;
use App\Models\Shoopingcart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShoopingcartRepository implements ShoopingcartRepositoryInterface
{
    public function addToShoopingCart($data)
    {
        $productId = $data['product_id'];

        // Check if the product already exists in the user's shopping cart
        $existing = Shoopingcart::where('product_id', $productId)
            ->where('user_id', Auth::id())
            ->first();

        if ($existing) {
            // If exists, just update the quantity
            $existing->quantity += 1;
            $existing->save();
        } else {
            // If not, create new entry
            Shoopingcart::create([
                'product_id' => $productId,
                'quantity' => $data['quantity'],
                'type' => $data['type'],
                'user_id' => Auth::id()
            ]);
        }
    }

    public function showproducts()
    {
        $products = DB::table('products')
            ->join('shoopingcart', 'products.id', '=', 'shoopingcart.product_id')
            ->where('user_id', '=', Auth::id())
            ->select('products.*', 'shoopingcart.id as shooping_id', 'quantity')
            ->get();
        return $products;
    }

    public function removefromcart($id)
    {
        $rmv = Shoopingcart::findorFail($id);
        if ($rmv) {
            $rmv->delete();
        }
    }
    public function updat_quantity($request, $id)
    {
        $product = Shoopingcart::findOrFail($id);

        if ($request->action == 'down') {
            if ($product->quantity > 1) {
                $product->quantity -= 1;
            }
        } elseif ($request->action == 'up') {
            $product->quantity += 1;
        } else {
            $product->quantity = $request->quantity;
        }

        // $product->shooping_id = $id; // optional, if you still need this
        $product->user_id = Auth::id();
        $product->save();
    }
}
