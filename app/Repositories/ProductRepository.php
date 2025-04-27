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
        return Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imagePath ? 'storage/' . $imagePath : null,
            'category' => $request->input('category'),
            'vendor_id' => Auth::id(),
        ]);
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
}
