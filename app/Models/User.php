<?php

namespace App\Models;

use App\Notifications\UserEmailVerifyNotification;
use App\Notifications\UserForgotPasswordNotification;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword;

    private static string $verificationCode;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Overriding the default email verification notification
     *
     * @return void
     * @throws \Exception
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new UserEmailVerifyNotification(self::$verificationCode));
        $this->verification_code = self::$verificationCode;
        $this->save();
    }

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new UserForgotPasswordNotification($this->verification_code));
        $this->verification_code = self::$verificationCode;
        $this->save();
    }

    /**
     * Hashing the user password before creating the user
     *
     * @return void
     * @throws \Exception
     */
    public static function boot(): void
    {
        self::$verificationCode = random_int(111111, 999999);
        parent::boot();
        static::creating(function ($user) {
            $user->password = bcrypt($user->password);
        });
    }

    /**
     * Get the UserInformation of the user.
     *
     * @return HasOne
     */
    public function information(): HasOne
    {
        return $this->hasOne(UserInformation::class);
    }

    /**
     * Get the BankInformation of the user.
     *
     * @return HasMany
     */
    public function bankInfo(): HasMany
    {
        return $this->hasMany(UserBankInfo::class);
    }

    /**
     * Get the wallets for the user.
     *
     * @return HasMany
     */
    public function wallets(): HasMany
    {
        return $this->hasMany(Wallet::class);
    }

    /**
     * Get the orders for the user.
     *
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
