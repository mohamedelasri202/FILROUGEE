<?php

namespace App\Repositories;



interface ShoopingcartRepositoryInterface
{
    public function  addtoshoopingcart($data);
    public function showproducts();
    public function countproduct();
    public function removefromcart($id);
    public function updat_quantity($request, $id);
}
