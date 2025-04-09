<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    public function showServiceProviderDashboard()
    {
        return view('dashboard.service_provider');
    }
}
