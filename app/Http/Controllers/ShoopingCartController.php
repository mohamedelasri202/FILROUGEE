<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoopingCartController extends Controller
{
    public function showshoopingcart()
    {

        return view('shoopingcart');
    }
}
