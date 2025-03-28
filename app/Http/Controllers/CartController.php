<?php

namespace App\Http\Controllers;

use App\Repositories\ServicecartRepositoryInterface;
use App\Repositories\ShoopingcartRepository;
use App\Repositories\ShoopingcartRepositoryInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{

    protected $ServicecartRepository;
    protected $shoopingcartRepository;
    public function __construct(ServicecartRepositoryInterface $ServicecartRepository, ShoopingcartRepositoryInterface $shoopingcartRepository)
    {

        $this->ServicecartRepository = $ServicecartRepository;
        $this->shoopingcartRepository = $shoopingcartRepository;
    }
    public function index()
    {
        $services =  $this->ServicecartRepository->showservices();
        $service_count = $this->ServicecartRepository->countservices();
        //variables for products now 
        $products = $this->shoopingcartRepository->showproducts();
        $product_count = $this->shoopingcartRepository->countproduct();
        $cart_count =  $service_count +  $product_count;
        // logic to update the quantity 
        $totalproduct = 0;
        foreach ($products as $product) {
            $totalproduct += $product->quantity * $product->price;
        }
        $totalservice = 0;
        foreach ($services as $service) {
            $totalservice += $service->price;
        }
        // logic to count the total 
        if ($product_count == 0) {
            $total = $totalproduct + $totalservice + 5.00 + 1.92;
        } else {
            $total = $totalproduct + $totalservice + 1.92 + 5;
        };


        return view('cart.cartservprod', compact('service_count', 'services', 'products', 'product_count', 'cart_count', 'totalproduct', 'totalservice', 'total'));
    }
}
