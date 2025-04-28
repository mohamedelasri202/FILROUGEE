<?php

namespace App\Repositories;

use App\Models\ServiceCart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ServicecartRepositoryInterface;

class ServicecartRepository implements ServicecartRepositoryInterface
{
    public function addservicecart($request)
    {

        $services = ServiceCart::create([
            'service_id' => $request['service_id'],
            'user_id' => Auth::id(),
            'status' => $request['status'],
            'booking_date' => $request['booking_date'],
            'booking_time' => $request['booking_time'],
        ]);

        return $services;
    }
    public function showservices()
    {
        $services = DB::table('servicecart')
            ->join('services', 'servicecart.service_id', '=', 'services.id')
            ->where('servicecart.user_id', '=', Auth::id())
            ->select('services.*', 'servicecart.id as servicecart_id', 'booking_date', 'booking_time')
            ->get();
        return $services;
    }
    public function deleteservicecart($id)
    {

        $service = ServiceCart::findOrFail($id);
        $service->delete();
        return back()->with('success', 'Item removed from your cart.');
    }
    public function countservices()
    {
        $service_count = DB::table('servicecart')->where('user_id', '=', Auth::id())->count();
        return $service_count;
    }
}
