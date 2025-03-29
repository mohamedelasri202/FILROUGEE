<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function addproduct(Request $request, $imagePath);
    public function showALLproducts();
    public function updatproduct($id, Request $request,);
}
