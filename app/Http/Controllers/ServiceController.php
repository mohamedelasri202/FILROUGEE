<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\ServiceRepository;
use App\Repositories\ServiceRepositoryInterface;

class ServiceController extends Controller
{
    protected $ServiceRepository;

    public function __construct(ServiceRepository $ServiceRepository)
    {
        $this->ServiceRepository = $ServiceRepository;
    }




    public function index()
    {
        $services = $this->ServiceRepository->showALLservices();
        return view('dashboard.service_provider', compact('services'));
    }
}
