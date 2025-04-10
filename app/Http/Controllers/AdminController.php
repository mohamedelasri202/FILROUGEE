<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showAdminDashboard()
    {
        $users = DB::table('users')->where('role', 'user')->get();
        $vendors = DB::table('users')->where('role', 'vendor')->get();
        $serviceProviders = DB::table('users')->where('role', 'service_provider')->get();
        $numberofusers = DB::table('users')->where('role', 'user')->count();
        return view('dashboard.admin', compact('users', 'numberofusers', 'vendors', 'serviceProviders'));
    }
}
