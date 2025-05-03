<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\ServiceRepositoryInterface;
use App\Repositories\UserRepositoryInterface;

class AdminController extends Controller
{
    protected $orderRepository;
    protected $serviceRepository;
    protected $userRepository;
    public function __construct(OrderRepositoryInterface $orderRepository, ServiceRepositoryInterface $serviceRepository, UserRepositoryInterface $userRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->serviceRepository = $serviceRepository;
        $this->userRepository = $userRepository;
    }

    public function showAdminDashboard(Request $request)
    {


        // Pass the request to filterusers method
        $filterusers = $this->userRepository->filterusers($request); // Now we get the filtered users/orders

        // Fetch other necessary data
        $vendors = DB::table('users')->where('role', 'vendor')->count();
        $serviceProviders = DB::table('users')->where('role', 'service_provider')->count();
        $numberofusers = DB::table('users')->where('role', 'user')->count();
        $revenue = $this->orderRepository->getrevenue();
        $services = $this->serviceRepository->showallbooking();
        $orders = $this->orderRepository->showallorders($request);

        // Return the data to the view
        return view('dashboard.admin', compact('numberofusers', 'vendors', 'serviceProviders', 'revenue', 'services', 'orders', 'filterusers'));
    }
}
