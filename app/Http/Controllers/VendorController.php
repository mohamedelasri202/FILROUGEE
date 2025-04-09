<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function showVendorDashboard()
    {
        return view('dashboard.vendor');
    }
}
