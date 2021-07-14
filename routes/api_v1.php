<?php

use App\Http\Controllers\Api\V1\Authentication\EmailVerificationController;
use App\Http\Controllers\Api\V1\Authentication\EmailVerificationResendController;
use App\Http\Controllers\Api\V1\Authentication\UserForgotPasswordController;
use App\Http\Controllers\Api\V1\Authentication\UserLoginController;
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

Route::group(['middleware' => 'cors'], function () {

    Route::group(['prefix' => '/auth'], function() {
        Route::post('/register', UserRegistrationController::class);
        Route::post('/login', UserLoginController::class)->middleware('guest');;
        Route::post('/forgot-password', UserForgotPasswordController::class)->middleware('guest')->name('password.email');
        Route::post('/reset-password', UserResetPasswordController::class)->middleware('guest')->name('password.reset');
        Route::get('/email/verify/{id}/{hash}', EmailVerificationController::class)->middleware('auth:api')->name('verification.verify');
        Route::get('/email/resend', EmailVerificationResendController::class)->name('verification.send');
//        Route::get('/logout', UserLogoutController::class)->middleware(['auth:api']);
    });

    Route::get('welcome', WelcomeController::class);

});
