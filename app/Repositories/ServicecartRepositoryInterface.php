<?php

namespace App\Repositories;

interface ServicecartRepositoryInterface
{
    public function addservicecart($request);
    public function showservices();
    public function deleteservicecart($id);
    public function countservices();
}
