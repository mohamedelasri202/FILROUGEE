<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Shoopingcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function addProduct($request, $imagePath)
    {

        $product = Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imagePath ? 'storage/' . $imagePath : null,
            'category' => $request->input('category'),
            'vendor_id' => Auth::id(),
        ]);
        return $product;
    }
    public function showALLproducts()
    {
        $procucts = Product::all();
        return $procucts;
    }
    public function updatproduct($data, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'category' => $data['category'],
        ]);
    }

    public function deleteproduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }
    public function tow_products()
    {
        $tow_products = DB::table('products')->limit(2)->get();
        return $tow_products;
    }
    public function showproduct($id)
    {
        $product = Product::findOrFail($id);

        $shoppingCartItems = DB::table('shoopingcart')
            ->join('products', 'shoopingcart.product_id', '=', 'products.id')
            ->select('shoopingcart.id', 'shoopingcart.quantity')
            ->where('shoopingcart.product_id', $product->id)
            ->where('shoopingcart.status', 'pending')
            ->limit(1)
            ->get();

        return [
            'product' => $product,
            'shopping_cart_items' => $shoppingCartItems
        ];
    }
}
