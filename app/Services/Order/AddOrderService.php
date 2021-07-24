<?php


namespace App\Services\Order;


use App\Repositories\OrderRepository\OrderRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;

class AddOrderService
{
    /**
     * AddOrderService constructor.
     * @param Authenticatable $user //this is an interface
     */
    public function __construct(
        private Authenticatable $user,
        private OrderRepositoryInterface $repository)
    {

    }

    public function addOrder($orderData)
    {
        if ($this->user) {
            $this->repository->addOrder($orderData, $this->user->id);
        }
    }
}
