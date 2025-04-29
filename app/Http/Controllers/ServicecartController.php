<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ServicecartRepositoryInterface;
use App\Repositories\ServicecartRepository;

class ServicecartController extends Controller
{
    protected $ServicecartRepository;


    public function __construct(ServicecartRepositoryInterface $ServicecartRepository)
    {
        $this->ServicecartRepository = $ServicecartRepository;
    }
    public function addservicecart(Request $request)
    {
        try {
            $services = $request->validate([
                'service_id' => 'required|integer',
                'status' => 'required|string',
                'booking_date' => 'required|date',
                'booking_time' => 'required|date_format:H:i:s'
            ]);

            $this->ServicecartRepository->addservicecart($request);
            return redirect()->back()->with('success', 'Service was added successfully to the cart.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }












    public function deleteservicecart($id)
    {
        $this->ServicecartRepository->deleteservicecart($id);
        return back()->with('success', 'the service  is removed');
    }
}
