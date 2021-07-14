<?php


namespace App\Services\Authentication;




use App\Models\User;
use App\Repositories\UserRepository\UserRepositoryInterface;
use Illuminate\Auth\Events\Verified;

class EmailVerificationService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }

    public function verifyEmail($id): bool
    {
        $user = $this->userRepository->find($id);

        if (! $user->hasVerifidEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
            return true;
        }

        return false;
    }
}
