<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;

class UserLoginController extends Controller
{
    public function __invoke()
    {
        return $this->json("ok");
    }
}
