<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepositoryInterface;
use App\Repositories\ServiceRepositoryInterface;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    protected $orderRepository;
    protected $serviceReposiotry;
    public function __construct(OrderRepositoryInterface $orderRepository, ServiceRepositoryInterface $serviceRepository)
    {
        $this->orderRepository = $orderRepository;
    }
}
