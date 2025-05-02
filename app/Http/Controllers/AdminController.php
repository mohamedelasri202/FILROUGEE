<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    protected $orderRepository;
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function showAdminDashboard()
    {
        $vendors = DB::table('users')->where('role', 'vendor')->count();
        $serviceProviders = DB::table('users')->where('role', 'service_provider')->count();
        $numberofusers = DB::table('users')->where('role', 'user')->count();
        $revenue = $this->orderRepository->getrevenue();
        $users = DB::table('users')->where('role', '!=', 'admin')->get();

        return view('dashboard.admin', compact('numberofusers', 'vendors', 'serviceProviders', 'revenue', 'users'));
    }
}
