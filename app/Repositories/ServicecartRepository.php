<?php

namespace App\Repositories;

use App\Models\ServiceCart;
use App\Models\Shoopingcart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ServicecartRepositoryInterface;

class ServicecartRepository implements ServicecartRepositoryInterface
{
    public function addservicecart($request)
    {
        $serviceid = $request['service_id'];

        $existe_service = ServiceCart::where('service_id', $serviceid)
            ->where('booking_time', $request['booking_time'])
            ->where('booking_date', $request['booking_date'])
            ->where('status', 'pending')
            ->first();

        if ($existe_service) {
            throw new \Exception('Sorry, this service is already booked for the selected time and date. Please choose another time.');
        }

        return ServiceCart::create([
            'service_id' => $request['service_id'],
            'user_id' => Auth::id(),
            'status' => $request['status'],
            'booking_date' => $request['booking_date'],
            'booking_time' => $request['booking_time'],
        ]);
    }

    public function showservices()
    {
        $services = ServiceCart::join('services', 'servicecart.service_id', '=', 'services.id')
            ->where('servicecart.user_id', '=', Auth::id())
            ->where('servicecart.status', '=', 'pending')
            ->select('services.*', 'servicecart.id as servicecart_id', 'servicecart.booking_date', 'servicecart.booking_time')
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
        $service_count = DB::table('servicecart')->where('user_id', '=', Auth::id())->where('servicecart.status', '=', 'pending')->count();
        return $service_count;
    }
}
