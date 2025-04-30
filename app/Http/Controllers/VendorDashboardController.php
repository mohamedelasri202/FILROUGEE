<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepositoryInterface;

class VendorDashboardController extends Controller
{
    protected $Userrepository;
    protected $ProductRepository;
    protected $OrderRepository;
    public function __construct(ProductRepository $ProductRepository, OrderRepositoryInterface $OrderRepository, UserRepositoryInterface $userRepository)
    {
        $this->Userrepository = $userRepository;
        $this->OrderRepository = $OrderRepository;
        $this->ProductRepository = $ProductRepository;
    }
    public function index()
    {
        $statistics = $this->OrderRepository->showstatistic();
        $products = $this->ProductRepository->showALLproducts();
        $usersWithOrders = $this->OrderRepository->allOrders();
        $customers = $this->OrderRepository->ordercount();

        return view(' dashboard.vendor ', compact('products', 'usersWithOrders', 'customers', 'statistics'));
    }

    public function editeprofile(Request $request, $id)
    {
        $this->Userrepository->editeprofile($request, $id);
    }
}
