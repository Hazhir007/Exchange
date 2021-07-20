<?php


namespace App\Services\Order;


use App\Repositories\UserRepository\UserRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;

class AddOrderService
{
    /**
     * AddOrderService constructor.
     * @param Authenticatable $user //this is an interface
     */
    public function __construct(
        private Authenticatable $user,
        private UserRepositoryInterface $repository)
    {

    }

    public function addOrder(array $orderData)
    {

        if ($this->user) {
            $this->repository->addOrder(
                $orderData['user_id']
            );
        }
    }
}
