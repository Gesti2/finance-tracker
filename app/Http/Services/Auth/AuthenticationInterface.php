<?php

namespace App\Http\Services\Auth;

use Illuminate\ContractsAuth\Authenticatable;
use Illuminate\Http\JsonResponse;

interface AuthenticationInterface
{
    public function check();

    public function user();

    public function register(array $fields);

    public function login(array $fields);

    public function logout();
}
