<?php

namespace App\Http\Controllers\Api\V1\Wallet;

use App\Http\Controllers\Controller;
use App\Http\Resources\Wallet\WithdrawCurrencyResource;
use App\Services\Wallet\WalletWithdrawService;
use Illuminate\Http\Request;

class WithdrawWalletController extends Controller
{
    public function __invoke(WalletWithdrawService $service, Request $request)
    {
        $from_currency = resolve(strtoupper($request->currency_code));
        $money = $from_currency->create($request->amount, 'user');
        $result = $service->withdraw($money);
        return $this->JsonResponseSuccess('withdraw success', 201, new WithdrawCurrencyResource($result));
    }
}
