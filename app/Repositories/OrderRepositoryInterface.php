<?php

namespace App\Repositories;

interface OrderRepositoryInterface
{
    public function add_order($request);
    public function allOrders();
    public function ordercount();
    public function showstatistic();
    public function allbookings();
    public function bookings();
    public function countbookings();
    public function statistics();
    public function getrevenue();
    public function showallorders($request);
}
