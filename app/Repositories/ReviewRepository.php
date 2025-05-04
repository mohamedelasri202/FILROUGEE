<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Review;
use App\Repositories\ReviewRepositoryInterface;

class ReviewRepository implements ReviewRepositoryInterface
{

    public function add_review($request, $id)
    {
        $service = Order::findorfail();
    }
}
