<?php

namespace App\Repositories;

interface OrderRepositoryInterface
{
    public function add_order($request);
    public function showorders();
}
