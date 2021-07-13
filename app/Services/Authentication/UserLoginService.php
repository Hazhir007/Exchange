<?php


namespace App\Services\Authentication;


use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
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

        if (!$user || !Hash::check($userData['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.']
            ]);
        }

        $user->token = $user->createToken('Exchange Personal Access Client')->accessToken;

        return $user;
    }
}
