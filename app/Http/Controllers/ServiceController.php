<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;

use App\Repositories\ServiceRepository;
use App\Repositories\ServiceRepositoryInterface;

class ServiceController extends Controller
{
    protected $ServiceRepository;
    protected $orderRepository;

    public function __construct(ServiceRepository $ServiceRepository, OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->ServiceRepository = $ServiceRepository;
    }




    public function index()
    {
        $allbookings = $this->orderRepository->allbookings();
        $services = $this->ServiceRepository->showALLservices();
        $upcomingdate = $this->ServiceRepository->upcomingbooking();
        $bookings = $this->orderRepository->bookings();

        return view('dashboard.service_provider', compact('services', 'allbookings', 'upcomingdate'));
    }
    public function add_service(Request $request)
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

        $this->ServiceRepository->add_service($request, $imagePath);

        return redirect()->route('dashboard.service_provider')->with('success', 'Product added successfully!');
    }
    public function deleteservice($id)
    {
        $this->ServiceRepository->deleteservice($id);
        return redirect()->route('dashboard.service_provider')->with('success', 'Service deleted successfully!');
    }
    public function updateservice(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'price' => 'numeric',
            'category' => 'string'
        ]);
        $this->ServiceRepository->updateservice($data, $id);

        return redirect()->route('dashboard.service_provider');
    }
    public function book_service($id)
    {
        $service = $this->ServiceRepository->service_detaills($id);

        return view('cart.booking_service', compact('service'));
    }
}
