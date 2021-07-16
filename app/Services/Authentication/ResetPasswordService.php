<?php


namespace App\Services\Authentication;


use App\Repositories\UserRepository\UserRepositoryInterface;

class ResetPasswordService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }

    public function updatePassword(array $userData): bool
    {
        $user = $this->userRepository->findByEmail($userData['email'])->first();

        if ($user) {
            $resetRequestedUser = $this->userRepository->getResetPasswordData($user->email)->first();
            if ($resetRequestedUser &&
                $resetRequestedUser->email === $user->email &&
                $resetRequestedUser->token ===  hash('sha256', $userData['verification_code'].$resetRequestedUser->email)) {

                $data['email'] = $resetRequestedUser->email;

                $data['password'] = $userData['password'];
                $this->userRepository->updatePassword($data);
                $this->userRepository->deletePasswordResetToken($resetRequestedUser->email);
//                event(new PasswordReset($user));
                return true;
            }
            return false;
        }
        return false;
    }
}
