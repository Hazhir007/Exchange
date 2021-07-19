<?php


namespace App\Services\GetPairConversionRatio\Navasan;



use App\Domain\ExternalApi\ExchangeExternalApiInterface;

class ReturnStructuredResult
{
    public function __construct(private ExchangeExternalApiInterface $navasanApiService) {}

    public function getStructuredResult(): array
    {
        $USD = null;
        $EUR = null;
        $structuredResult = [];

        $result = $this->navasanApiService->getPriceList();

        $currencies = json_decode($result);

        foreach ($currencies as $currency => $value) {

            if ($currency === 'harat_naghdi_sell') {

                $USD = $value->value;

                $structuredResult[] = [
                    'pair' => 'USDIRR',
                    'from_currency' => 'USD',
                    'to_currency' => 'IRR',
                    'conversion_ratio' => $value->value * 10
                ];

                $structuredResult[] = [
                    'pair' => 'IRRUSD',
                    'from_currency' => 'IRR',
                    'to_currency' => 'USD',
                    'conversion_ratio' => number_format(1/$value->value*10, 6)
                ];
            }

            if ($currency === 'eur') {

                $EUR = $value->value;

                 $structuredResult[] = [
                     'pair' => 'EURIRR',
                     'from_currency' => 'EUR',
                     'to_currency' => 'IRR',
                     'conversion_ratio' => $value->value * 10
                ];

                $structuredResult[] =[
                    'pair' => 'IRREUR',
                    'from_currency' => 'IRR',
                    'to_currency' => 'EUR',
                    'conversion_ratio' => number_format(1/$value->value*10, 6)
                ];
            }
        }


        if ($USD && $EUR) {

            $structuredResult[] = [
                'pair' => 'USDEUR',
                'from_currency' => 'USD',
                'to_currency' => 'EUR',
                'conversion_ratio' => $USD / $EUR
            ];

            $structuredResult[] = [
                'pair' => 'EURUSD',
                'from_currency' => 'EUR',
                'to_currency' => 'USD',
                'conversion_ratio' => $EUR / $USD
            ];

        }

        return $structuredResult;
    }
}
