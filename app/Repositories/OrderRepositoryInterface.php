<?php

namespace App\Repositories;

interface OrderRepositoryInterface
{
    public function add_order($request);
    public function showorders();
    public function countorders_user();
    public function showstatistic();
}
