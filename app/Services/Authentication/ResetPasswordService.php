<?php


namespace App\Services\Authentication;


use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordService
{
    public function __construct()
    {

    }

    public function updatePassword(array $userData): bool
    {
        $result = Password::reset(
            $validatedRequest,
            function ($user, $password) use ($userData) {
                $user->forceFill(
                    ['password' => bcrypt($userData['password'])]
                )->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        if ($result == Password::INVALID_TOKEN) {
            return false;
        }

        return true;
    }
}
