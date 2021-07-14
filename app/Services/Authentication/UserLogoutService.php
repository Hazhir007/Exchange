<?php


namespace App\Services\Authentication;


use Illuminate\Support\Facades\Auth;

class UserLogoutService
{
    public function Logout(): bool
    {
        if (Auth::user()->currentAccessToken()->delete()) {
            return true;
        }

        return false;
    }
}
