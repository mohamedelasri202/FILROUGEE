<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function login($request);
    public function register($request);
}
