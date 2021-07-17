<?php

use App\Http\Controllers\Api\V1\Authentication\EmailVerificationController;
use App\Http\Controllers\Api\V1\Authentication\EmailVerificationResendController;
use App\Http\Controllers\Api\V1\Authentication\UserForgotPasswordController;
use App\Http\Controllers\Api\V1\Authentication\UserLoginController;
use App\Http\Controllers\Api\V1\Authentication\UserLogoutController;
use App\Http\Controllers\Api\V1\Authentication\UserRegistrationController;
use App\Http\Controllers\Api\V1\Authentication\UserResetPasswordController;
use App\Http\Controllers\Api\V1\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

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
});
