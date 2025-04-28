<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ServiceRepository;
use App\Repositories\ShoopingcartRepository;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ServiceRepositoryInterface;
use App\Repositories\ServicecartRepositoryInterface;
use App\Repositories\ShoopingcartRepositoryInterface;

class CartController extends Controller
{
    protected $serviceRepository;
    protected $productRepository;
    protected $ServicecartRepository;
    protected $shoopingcartRepository;
    public function __construct(ServicecartRepositoryInterface $ServicecartRepository, ShoopingcartRepositoryInterface $shoopingcartRepository, ProductRepositoryInterface $productRepository, ServiceRepositoryInterface $serviceRepository)
    {

        $this->ServicecartRepository = $ServicecartRepository;
        $this->shoopingcartRepository = $shoopingcartRepository;
        $this->productRepository = $productRepository;
        $this->serviceRepository = $serviceRepository;
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
            $total = $totalproduct + $totalservice + 5.00 + 1.95;
        } else {
            $total = $totalproduct + $totalservice + 1.95 + 5;
        };

        // get tow of the prdudcts 

        $tow_products = $this->productRepository->tow_products();
        $tow_services = $this->serviceRepository->tow_service();
        // dd($tow_services);


        return view('cart.cartservprod', compact('service_count', 'services', 'products', 'product_count', 'cart_count', 'totalproduct', 'totalservice', 'total', 'tow_products', 'tow_services'));
    }
    public function removefromcart($id)
    {
        $this->shoopingcartRepository->removefromcart($id);
        return redirect()->back()->with('success');
    }
    public function updat_quantity(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'integer|min:1', // correct spelling + prevent negatives
            'shooping_id' => 'integer',
            'action' => 'string'
        ]);

        $quntity = $this->shoopingcartRepository->updat_quantity($request, $id);
        return redirect()->back();
    }
}
