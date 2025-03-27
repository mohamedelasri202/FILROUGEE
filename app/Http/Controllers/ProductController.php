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
    protected $shoopingcartRepository;
    public function __construct(ProductRepositoryInterface $ProductRepository, ShoopingcartRepositoryInterface $shoopingcartRepository)
    {
        $this->shoopingcartRepository = $shoopingcartRepository;
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

    public function updateproduct(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'price' => 'numeric',
            'category' => 'string'
        ]);

        $this->ProductRepository->updatproduct($data, $id);

        return redirect()->route('dashboard.vendor');
    }
    public function deleteproduct($id)
    {
        $this->ProductRepository->deleteproduct($id);
        return redirect()->route('dashboard.vendor');
    }
}
