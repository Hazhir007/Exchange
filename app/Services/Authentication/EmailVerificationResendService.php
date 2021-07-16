<?php


namespace App\Services\Authentication;


use App\Repositories\UserRepository\UserRepositoryInterface;

class EmailVerificationResendService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }

    public function resendEmail(array $userData): bool
    {
        $user = $this->userRepository->findByEmail($userData['email'])->first();

        if ($user && $user->email_verified_at === null) {
            $user->sendEmailVerificationNotification();
            return true;
        }

        return false;
    }
}
