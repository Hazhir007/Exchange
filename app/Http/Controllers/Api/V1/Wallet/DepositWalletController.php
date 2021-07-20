<?php

namespace App\Http\Controllers\Api\V1\Wallet;

use App\Http\Controllers\Controller;
use App\Services\Wallet\Deposit\WalletDepositService;
use Illuminate\Http\Request;

class DepositWalletController extends Controller
{
    public function __invoke(WalletDepositService $service, Request $request)
    {

        $service->deposit($request->amount);

        return $this->JsonResponseSuccess('deposit success');
    }
}
