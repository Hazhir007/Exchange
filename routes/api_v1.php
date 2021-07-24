<?php

use App\Http\Controllers\Api\V1\Authentication\EmailVerificationController;
use App\Http\Controllers\Api\V1\Authentication\EmailVerificationResendController;
use App\Http\Controllers\Api\V1\Authentication\UserForgotPasswordController;
use App\Http\Controllers\Api\V1\Authentication\UserLoginController;
use App\Http\Controllers\Api\V1\Authentication\UserLogoutController;
use App\Http\Controllers\Api\V1\Authentication\UserRegistrationController;
use App\Http\Controllers\Api\V1\Authentication\UserResetPasswordController;
use App\Http\Controllers\Api\V1\ExternalApi\NavasanApiController;
use App\Http\Controllers\Api\V1\MoneyConverter\MoneyConverterController;
use App\Http\Controllers\Api\V1\PayOrder\PayOrderController;
use App\Http\Controllers\Api\V1\Wallet\WalletCreateController;
use App\Http\Controllers\Api\V1\Wallet\DepositWalletController;
use App\Http\Controllers\Api\V1\Wallet\WithdrawWalletController;
use App\Http\Controllers\Api\V1\WelcomeController;
use Illuminate\Support\Facades\Route;







Route::get('welcome', WelcomeController::class);


Route::group(['middleware' => 'cors'], function () {

    Route::group(['prefix' => '/auth'], function() {
        Route::post('/register', UserRegistrationController::class);
        Route::post('/login', UserLoginController::class);
        Route::post('/email/verify', EmailVerificationController::class);
        Route::post('/email/resend', EmailVerificationResendController::class);
        Route::post('/forgot-password', UserForgotPasswordController::class);
        Route::post('/reset-password', UserResetPasswordController::class);
        Route::post('/logout', UserLogoutController::class);
    });


    Route::group(['middleware' => 'auth:api'], function () {

        Route::post('/currency-conversion/convert', MoneyConverterController::class);

        Route::post('/order/pay', PayOrderController::class);

        Route::post('/wallet/create', WalletCreateController::class);
        Route::post('/wallet/deposit', DepositWalletController::class);
        Route::post('/wallet/withdraw', WithdrawWalletController::class);


    });

    Route::get('/external-api/get-conversion-price', NavasanApiController::class);


});
