<?php


namespace App\Services\Authentication;

use App\Repositories\UserRepository\UserRepositoryInterface;
use Illuminate\Auth\Events\Registered;

class UserRegistrationService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }

    public function register(array $userData)
    {
        $user = $this->userRepository->create($userData);
        event(new Registered($user));
        return $user->refresh();
    }
}
