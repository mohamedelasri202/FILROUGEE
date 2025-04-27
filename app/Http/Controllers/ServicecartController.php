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
        $services = $request->validate([
            'service_id' => 'required|integer'

        ]);
        $this->ServicecartRepository->addservicecart($request);
        return redirect()->route('services');
    }

    public 
}
