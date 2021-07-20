<?php


namespace App\Http\Controllers\Api\V1\Wallet;


use App\Http\Controllers\Controller;
use App\Http\Resources\Wallet\WalletCreationResource;
use App\Services\Wallet\WalletCreateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WalletCreateController extends Controller
{
    public function __invoke(WalletCreateService $service, Request $request): JsonResponse
    {
        $wallet = $service->createWallet($request->currency_code);

        if ($wallet) {
            return $this->JsonResponseSuccess(
                'your wallet for hs been created successfully',
                201, new WalletCreationResource($wallet));
        }

        return $this->JsonResponseError('could not create the wallet at the moment please contact support');
    }
}
