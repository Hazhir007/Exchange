<?php

use App\Http\Controllers\API\V2\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('welcome', WelcomeController::class);
