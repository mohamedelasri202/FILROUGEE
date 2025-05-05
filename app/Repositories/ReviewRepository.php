<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ReviewRepositoryInterface;

class ReviewRepository implements ReviewRepositoryInterface
{

    public function add_review($data)
    {

        $service = Service::findOrFail($data['service_id']);

        return Review::create([
            'service_id' => $data['service_id'],
            'stars' => $data['stars'],
            'content' => $data['content'],
            'user_id' => Auth::id(),
        ]);
    }
    public function reviews()
    {
        $reviews = Review::join('services', 'reviews.service_id', '=', 'services.id')
            ->join('users', 'services.vendor_id', '=', 'users.id')
            ->select('reviews.*', 'services.title', 'users.name', 'users.lastname')->get();
        // dd($reviews);
        return $reviews;
    }
}
