<?php


namespace App\Services\Authentication;


use Illuminate\Support\Facades\Auth;
use Laravel\Passport\TokenRepository;

class UserLogoutService
{
    public function __construct(private TokenRepository $tokenRepository)
    {

    }

    public function Logout($tokenId): bool
    {

//        if (Auth::user()->currentAccessToken()->delete()) {
        if ($this->tokenRepository->revokeAccessToken($tokenId)) {
            return true;
        }

        return false;
    }
}
