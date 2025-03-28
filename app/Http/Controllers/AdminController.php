<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showAdminDashboard()
    {
        $vendors = DB::table('users')->where('role', 'vendor')->get();
        $serviceProviders = DB::table('users')->where('role', 'service_provider')->get();
        $numberofusers = DB::table('users')->where('role', 'user')->count();
        return view('dashboard.admin', compact('numberofusers', 'vendors', 'serviceProviders'));
    }
    public function showUsers()
    {
        $users = DB::table('users')->where('role',  'service_provider')->get();
        return view('dashboard.dashboard_users', compact('users'));
    }
}
