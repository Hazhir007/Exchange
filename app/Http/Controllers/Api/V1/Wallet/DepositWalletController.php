<?php

namespace App\Http\Controllers\Api\V1\Wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositWalletController extends Controller
{
    public function __invoke()
    {
        return $this->JsonResponseSuccess('deposit success');
    }
}
