<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\ServicecartRepositoryInterface;
use App\Repositories\ShoopingcartRepositoryInterface;

class OrderController extends Controller
{
    protected $OrderRepository;

    public function __construct(OrderRepositoryInterface $OrderRepository, ServicecartRepositoryInterface $ServicecartRepository, ShoopingcartRepositoryInterface $shoopingcartRepository)
    {
        $this->OrderRepository = $OrderRepository;
    }

    public function add_order(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|numeric|digits_between:10,15',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'type' => 'required|string',
            'shoopingcart_id' => 'required|array',
            'shoopingcart_id.*' => 'required|numeric',
            'servicecart_id' => 'required|array',
            'servicecart_id.*' => 'required|numeric',
            'payment_method' => 'required|string',
            'quantity' => 'required|string',
            'status' => 'required|string',
            'total' => 'required|numeric'


        ]);




        $this->OrderRepository->add_order($request);

        return back()->with('success', 'Product added successfully!');
    }
}
