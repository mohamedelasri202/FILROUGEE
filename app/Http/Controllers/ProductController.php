<?php

namespace App\Http\Controllers;

use App\Models\Shoopingcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ShoopingcartRepositoryInterface;

class ProductController extends Controller

{
    protected $ProductRepository;

    public function __construct(ProductRepositoryInterface $ProductRepository, ShoopingcartRepositoryInterface $shoopingcartRepository)
    {

        $this->ProductRepository = $ProductRepository;
    }

    public function addproduct(Request $request)
    {
        $imagePath = null;

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'category' => 'required|string'

        ]);



        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $this->ProductRepository->addProduct($request, $imagePath);

        return redirect()->route('dashboard.vendor')->with('success', 'Product added successfully!');
    }

    public function showALLproducts()
    {
        $this->ProductRepository->showALLproducts();
    }
}
