<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class VendorDashboardController extends Controller
{
    protected $ProductRepository;
    protected $OrderRepository;
    public function __construct(ProductRepository $ProductRepository, OrderRepositoryInterface $OrderRepository)
    {
        $this->OrderRepository = $OrderRepository;
        $this->ProductRepository = $ProductRepository;
    }
    public function index()
    {
        $orders_count =  $this->OrderRepository->countorders_user();
        $orders = $this->OrderRepository->showorders();
        $products = $this->ProductRepository->showALLproducts();
        return view('dashboard.vendor', compact('products', 'orders', 'orders_count'));
    }
}
