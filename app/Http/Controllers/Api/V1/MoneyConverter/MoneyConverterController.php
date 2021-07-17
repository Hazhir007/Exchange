<?php


namespace App\Http\Controllers\Api\V1\MoneyConverter;


use App\Domain\Money\Factory\MoneyFactoryInterface;
use App\Http\Controllers\Controller;
use App\Services\MoneyConverter\MoneyConverterServiceInterface;
use Illuminate\Http\Request;

class MoneyConverterController extends Controller
{
    public function __invoke(MoneyConverterServiceInterface $moneyConverter, Request $request): void
    {
//        $fromCurrency = new ('App\Domain\Money\Factory\Currencies\\'.strtoupper($request->from_currency))();
//        $toCurrency = new ('App\Domain\Money\Factory\Currencies\\'.strtoupper($request->to_currency))();
        $fromCurrency = resolve(strtoupper($request->from_currency));
        dd($fromCurrency->create());
        $toCurrency = resolve(strtoupper($request->to_currency));
//        dd($fromCurrency);
//        $toCurrency = resolve('EUR');
//        $fromCurrency->create(100);
//        dd($toCurrency);
        $fromCurrency->create(100);
        $toCurrency->create(0);
        $result = $moneyConverter->convert($fromCurrency, $toCurrency, 0.85, 0.001);
        dd($result);
    }
}
