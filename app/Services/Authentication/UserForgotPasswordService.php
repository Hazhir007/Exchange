<?php


namespace App\Services\Authentication;

use App\Repositories\UserRepository\UserRepositoryInterface;

class UserForgotPasswordService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }

    public function sendResetPasswordEmail(array $userData): bool
    {
        $user = $this->userRepository->findByEmail($userData['email'])->first();

        if (! $user || $user->email_verified_at === null) {
            return false;
        }

        $token = hash('sha256', $user->verification_code.$user->email);


        $userData['token'] = $token;

        $user->sendPasswordResetNotification($token);
        $this->userRepository->saveResetPasswordData($userData);

//        Password::sendResetLink($userData);

        return true;
    }
}
