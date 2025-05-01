<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepositoryInterface;
use App\Repositories\ServiceRepositoryInterface;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{

    protected $serviceReposiotry;
    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceReposiotry = $serviceRepository;
    }
    public function update(Request $request, $id)
    {

        $update = $this->serviceReposiotry->updatestatus($request, $id);
        return back();
    }
}
