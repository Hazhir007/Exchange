<?php


namespace App\Services\Order;


use App\Repositories\UserRepository\UserRepositoryInterface;

class PayOrderService
{
    public function __construct(private UserRepositoryInterface $user)
    {

    }

    public function pay()
    {

    }
}
