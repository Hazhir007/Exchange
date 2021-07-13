<?php

use App\Http\Controllers\Api\V2\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('welcome', WelcomeController::class);
