<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ServiceCart;
use App\Models\Shoopingcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\ServicecartRepositoryInterface;
use App\Repositories\ShoopingcartRepositoryInterface;

class OrderController extends Controller
{
    protected $OrderRepository;
    protected $ServicecartRepository;
    protected $shoopingcartRepository;
    public function __construct(OrderRepositoryInterface $OrderRepository, ServicecartRepositoryInterface $ServicecartRepository, ShoopingcartRepositoryInterface $shoopingcartRepository)
    {
        $this->OrderRepository = $OrderRepository;

        $this->ServicecartRepository = $ServicecartRepository;
        $this->shoopingcartRepository = $shoopingcartRepository;
    }
    public function checkout()
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
            $total = $totalproduct + $totalservice + 1.95 + 5.00;
        };




        return view('cart.checkout', compact('service_count', 'services', 'products', 'product_count', 'cart_count', 'totalproduct', 'totalservice', 'total'));
    }
    public function add_order(Request $request)
    {
        DB::beginTransaction();
        try {

            $validatedData = $request->validate([
                'name' => 'required|string',
                'last_name' => 'required|string',
                'phone' => 'required|numeric|digits_between:10,15',
                'email' => 'required|email',
                'address' => 'required|string',
                'city' => 'required|string',
                'type' => 'required|string',
                'payment_method' => 'required|string',
                'quantity' => 'nullable|string',
                'status' => 'required|string',
                'total' => 'required|numeric',
                'shoopingcart_id' => 'nullable|array',
                'shoopingcart_id.*' => 'nullable|numeric',
                'servicecart_id' => 'nullable|array',
                'servicecart_id.*' => 'nullable|numeric',
            ]);

            ServiceCart::where('user_id', auth()->id())
                ->where('status', 'pending')
                ->update(['status' => 'confirmed']);



            $product = Shoopingcart::where('user_id', auth()->id())
                ->where('status', 'pending')
                ->update(['status' => 'confirmed']);

            $this->OrderRepository->add_order($request);

            DB::commit();
            return back()->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('succes', 'There was a problem placing your order.');
        }
    }
}
