<?php

namespace App\Repositories;


interface ServiceRepositoryInterface
{
    public function add_service($data, $imagePath);
    public function deleteservice($id);
    public function updateservice($data, $id);
    public function showALLservices();
    public function tow_service();
    public function  service_detaills($id);
    public function upcomingbooking();
}
