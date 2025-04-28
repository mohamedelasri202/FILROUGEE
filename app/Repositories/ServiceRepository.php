<?php

namespace App\Repositories;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function add_service($request, $imagePath)
    {
        return Service::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imagePath ? 'storage/' . $imagePath : null,
            'category' => $request->input('category'),
            'vendor_id' => Auth::id(),
        ]);
    }
    public function showALLservices()
    {
        $services = Service::all();
        return $services;
    }
    public function deleteservice($id)
    {
        $service = Service::findorFail($id);
        $service->delete();
    }
    public function updateservice($data, $id)
    {
        $service = Service::findorFail($id);
        if ($service) {
            $service->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'category' => $data['category'],
                'price' => $data['price']
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function tow_service()
    {
        $tow_services = DB::table('services')->limit(2)->get();
        return $tow_services;
    }
    public function service_detaills($id)
    {
        $service = service::findorfail($id);
        return $service;
    }
}
