<?php


namespace App\Services\Authentication;


use App\Models\User;
use App\Repositories\UserRepository\UserRepositoryInterface;
use Illuminate\Validation\ValidationException;

class UserLoginService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }

    /**
     * @throws ValidationException
     */
    public function login(array $userData): User
    {
        $user = $this->userRepository->findByEmail($userData['email'])->first();


        if (! $user || !password_verify($userData['password'], $user->password)) {
            throw ValidationException::withMessages([
                'message' => 'The provided credentials are incorrect.',
            ]);
        }

        if (! $user->hasVerifiedEmail()) {
            throw ValidationException::withMessages([
                'message' => 'please verify your email first',
            ]);
        }

        $user->token = $user->createToken('Exchange Personal Access ClientRequest')->accessToken;

        return $user;
    }
}
