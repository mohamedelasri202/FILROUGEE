<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function login($request);
    public function register($request);
    public function updatesatatus($id, $status);
    public function editeprofile($request, $id);
    public function filterusers($request);
    public function myorders();
    public function myServiceOrders();
}
