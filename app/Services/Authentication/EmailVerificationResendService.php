<?php


namespace App\Services\Authentication;


use Illuminate\Support\Facades\Auth;

class EmailVerificationResendService
{
    public function resendEmail(): bool
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return false;
        }

        Auth::user()->sendEmailVerificationNotification();
        return true;
    }
}
