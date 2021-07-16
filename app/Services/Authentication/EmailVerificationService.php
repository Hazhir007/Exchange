<?php


namespace App\Services\Authentication;


use App\Repositories\UserRepository\UserRepositoryInterface;
use Illuminate\Auth\Events\Verified;

class EmailVerificationService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }

    public function verifyEmail(array $userData): bool
    {
        $user = $this->userRepository->findByEmail($userData['email'])->first();

        if ($user && $user->email_verified_at === null &&
            $user->verification_code === $userData['verification_code']) {
            $user->markEmailAsVerified();
            event(new Verified($user));
            return true;
        }

        return false;
    }
}
