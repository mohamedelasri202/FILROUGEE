<?php


namespace App\Repositories;

interface ReviewRepositoryInterface
{

    public function add_review($data);
    public function reviews();
    public function reviews_stats();
}
