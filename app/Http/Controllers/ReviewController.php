<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\ReviewRepositoryInterface;

class ReviewController extends Controller
{
    protected $ReviewRepository;


    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {

        $this->ReviewRepository = $reviewRepository;
    }
    public function add_review(Request $request)
    {

        $data = $request->validate([
            'service_id' => 'required|integer',
            'stars' => 'required|integer|min:1|max:5',
            'content' => 'required|string'
        ]);

        $this->ReviewRepository->add_review($data);
        return redirect()->back()->with('success', 'Review submitted!');
    }
}
