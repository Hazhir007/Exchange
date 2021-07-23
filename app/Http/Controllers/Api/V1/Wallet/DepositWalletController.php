<?php

namespace App\Http\Controllers\Api\V1\Wallet;

use App\Http\Controllers\Controller;
use App\Http\Resources\Wallet\DepositCurrencyResource;
use App\Services\Wallet\WalletDepositService;
use Illuminate\Http\Request;

class DepositWalletController extends Controller
{
    public function __invoke(WalletDepositService $service, Request $request)
    {
        $from_currency = resolve(strtoupper($request->currency_code));
        $money = $from_currency->create($request->amount, 'user');
        $result = $service->deposit($money);
        return $this->JsonResponseSuccess('deposit success', 201, new DepositCurrencyResource($result));
    }
}
