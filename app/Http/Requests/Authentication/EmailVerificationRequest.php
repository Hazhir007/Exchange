<?php


namespace App\Http\Requests\Authentication;


use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest as BaseEmailVerificationRequest;

class EmailVerificationRequest extends BaseEmailVerificationRequest
{
    public function authorize(): bool
    {
        $user = User::query()->findOrFail($this->route('id'));

        if (!hash_equals((string)$this->route('hash'),
            sha1($user->getEmailForVerification()))) {
            return false;
        }

        $this->setUserResolver(function () use ($user) {
            return $user;
        });

        return true;
    }
}
