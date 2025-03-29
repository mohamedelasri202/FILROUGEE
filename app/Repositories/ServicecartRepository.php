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

        return ServiceCart::create([
            'service_id' => $request['service_id'],
            'user_id' => Auth::id(),
        ]);
    }
}
