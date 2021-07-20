<?php

namespace App\Http\Controllers\Api\V1\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\AddOrderService;
use Illuminate\Http\Request;

class AddOrderController extends Controller
{
    public function __invoke(AddOrderService $service)
    {
        $service->addOrder();
    }
}
