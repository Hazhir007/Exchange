<?php


namespace App\Services\Authentication;

use App\Repositories\UserRepository\UserRepositoryInterface;
use Illuminate\Validation\ValidationException;

class UserForgotPasswordService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }

    /**
     * @throws ValidationException
     */
    public function sendResetPasswordEmail(array $userData): array
    {
        $user = $this->userRepository->findByEmail($userData['email'])->first();

        if (! $user) {

            throw ValidationException::withMessages([
                'message' => 'a user with this email does not exist',
                'status' => 'error'
            ]);

        }

        $user->token = $user->createToken('Exchange Personal Access Client')->plainTextToken;

        return $user;
    }
}
