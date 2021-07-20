<?php

namespace App\Http\Resources\CurrencyConverterResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyConverterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $amount = $this->getAmount();
        return [
//            'from_currency_name' => $this->fromCurrencyName,
//            'from_currency_code' => $this->fromCurrencyCode,
            'conversion_ratio' => $this->conversionRatio,
//            'from_currency_amount' => $this->formCurrencyaAmount,
            'to_currency_amount' => $this->getFormattedAmount($amount),
            'fee_amount' => $this->getFormattedFeeAmount(),
            'to_currency_name' => $this->getCurrency()->getName(),
            'to_currency_code' => $this->getCurrency()->getCode(),
        ];
    }
}
