<?php


namespace App\Http\Controllers\Api\V1\MoneyConverter;


use App\Http\Controllers\Controller;
use App\Http\Resources\CurrencyConverterResources\CurrencyConverterResource;
use App\Services\MoneyConverter\MoneyConverterServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MoneyConverterController extends Controller
{
    public function __invoke(
        MoneyConverterServiceInterface $moneyConverter,
        Request $request): JsonResponse
    {
        $fromCurrency = resolve(strtoupper($request->from_currency));
        $toCurrency = resolve(strtoupper($request->to_currency));
        $fromCurrency = $fromCurrency->create($request->amount, 'user');
        $toCurrency = $toCurrency->create(0, null);
        $result = $moneyConverter->convert($fromCurrency, $toCurrency);

        return $this->JsonResponseSuccess('your order request has been submitted',
            200, new CurrencyConverterResource($result));
    }
}
